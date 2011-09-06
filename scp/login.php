<?php
/*********************************************************************
    login.php

    Handles staff authentication/logins

    Peter Rotich <peter@osticket.com>
    Copyright (c)  2006-2010 osTicket
    http://www.osticket.com

    Released under the GNU General Public License WITHOUT ANY WARRANTY.
    See LICENSE.TXT for details.

    vim: expandtab sw=4 ts=4 sts=4:
    $Id: login.php,v 1.2.2.6 2009/10/26 19:14:42 carlos.delfino Exp $
**********************************************************************/
require_once('../main.inc.php');
if(!defined('INCLUDE_DIR')) die('Fatal Error. Kwaheri!');

require_once(INCLUDE_DIR.'class.staff.php');

$msg=$_SESSION['_staff']['auth']['msg'];
$cfg=$_SESSION['cfg'];
$trl=$_SESSION['trl'];

$msg=$msg?$msg:$trl->translate('TEXT_AUTHENTICATION_REQUIRED');
$labelUsername = $trl->translate('LABEL_USERNAME');
$labelPassword = $trl->translate('LABEL_PASSWORD');

if($_POST && (!empty($_POST['username']) && !empty($_POST['passwd']))){
    //$_SESSION['_staff']=array(); #Uncomment to disable login strikes.
    $msg=$trl->translate('TEXT_INVALID_LOGIN');
    if($_SESSION['_staff']['laststrike']) {
       $fatorLastStrike = (time()-$_SESSION['_staff']['laststrike']);
	   if($fatorLastStrike<$cfg->getStaffLoginTimeout()) {
           $msg=$trl->translate('TEXT_EXCESSIVE_FAILED_LOGIN_ATTEMPTS');
            $errors['err']=$trl->translate('TEXT_YOUVE_REACHED_MAXIMUM_FAILED_LOGIN_ATTEMPTS_ALLOWED',$fatorLastStrike);
        }else{ //Timeout is over.
            //Reset the counter for next round of attempts after the timeout.
            $_SESSION['_staff']['laststrike']=null;
            $_SESSION['_staff']['strikes']=0;
        }
    }
    if(!$errors && ($user=new StaffSession($_POST['username'])) && $user->getId() && $user->check_passwd($_POST['passwd'])){
        //update last login.
        db_query('UPDATE '.STAFF_TABLE.' SET lastlogin=NOW() WHERE staff_id='.db_input($user->getId()));
        //Figure out where the user is headed - destination!
        $dest=$_SESSION['_staff']['auth']['dest'];
        //Now set session crap and lets roll baby!
        $_SESSION['_staff']=array(); //clear.
        $_SESSION['_staff']['userID']=$_POST['username'];
        $user->refreshSession(); //set the hash.
        $_SESSION['TZ_OFFSET']=$user->getTZoffset();
        $_SESSION['daylight']=$user->observeDaylight();
        Sys::log(LOG_DEBUG,'Staff login',sprintf("%s logged in [%s]",$user->getUserName(),$_SERVER['REMOTE_ADDR'])); //Debug.
        //Redirect to the original destination. (make sure it is not redirecting to login page.)
        $dest=($dest && (!strstr($dest,'login.php') && !strstr($dest,'ajax.php')))?$dest:'index.php';
        session_write_close();
        session_regenerate_id();
        @header("Location: $dest");
        require_once('index.php'); //Just incase header is messed up.
        exit;
    }
    //If we get to this point we know the login failed.
    $_SESSION['_staff']['strikes']+=1;
    if(!$errors && $_SESSION['_staff']['strikes']>$cfg->getStaffMaxLogins()) {
        $msg=$trl->translate("TEXT_ACCESS_DENIED");
        $errors['err']='Forgot your login info? Contact IT Dept.';
        $_SESSION['_staff']['laststrike']=time();
        $alert='Excessive login attempts by a staff member?'."\n".
               'Username: '.$_POST['username']."\n".'IP: '.$_SERVER['REMOTE_ADDR']."\n".'TIME: '.date('M j, Y, g:i a T')."\n\n".
               'Attempts #'.$_SESSION['_staff']['strikes']."\n".'Timeout: '.($cfg->getStaffLoginTimeout()/60)." minutes \n\n";
        Sys::log(LOG_ALERT,'Excessive login attempts (staff)',$alert,($cfg->alertONLoginError()));
    }elseif($_SESSION['_staff']['strikes']%2==0){ //Log every other failed login attempt as a warning.
        $alert='Username: '.$_POST['username']."\n".'IP: '.$_SERVER['REMOTE_ADDR'].
               "\n".'TIME: '.date('M j, Y, g:i a T')."\n\n".'Attempts #'.$_SESSION['_staff']['strikes'];
        Sys::log(LOG_WARNING,'Failed login attempt (staff)',$alert);
    }
}
define("OSTSCPINC",TRUE); //Make includes happy!
$login_err=($_POST)?true:false; //error displayed only on post
include_once(INCLUDE_DIR.'staff/login.tpl.php');
?>
