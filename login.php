<?php
/*********************************************************************
    index.php

    Client Login 

    Peter Rotich <peter@osticket.com>
    Copyright (c)  2006-2010 osTicket
    http://www.osticket.com

    Released under the GNU General Public License WITHOUT ANY WARRANTY.
    See LICENSE.TXT for details.

    vim: expandtab sw=4 ts=4 sts=4:
    $Id: $
**********************************************************************/
require_once('main.inc.php');
if(!defined('INCLUDE_DIR')) die('Fatal Error');
define('CLIENTINC_DIR',INCLUDE_DIR.'client/');
define('OSTCLIENTINC',TRUE); //make includes happy

require_once(INCLUDE_DIR.'class.client.php');
require_once(INCLUDE_DIR.'class.ticket.php');
//We are ready baby
$loginmsg=$trl->translate('TEXT_AUTHENTICATION_REQUIRED');
if($_POST && (!empty($_POST['lemail']) && !empty($_POST['lticket']))):
    $loginmsg=$trl->translate('TEXT_AUTHENTICATION_REQUIRED');
    $email=trim($_POST['lemail']);
    $ticketID=trim($_POST['lticket']);
    //$_SESSION['_client']=array(); #Uncomment to disable login strikes.
    
    //Check time for last max failed login attempt strike.
    $loginmsg=$trl->translate('TEXT_INVALID_LOGIN');;
    if($_SESSION['_client']['laststrike']) {
        if((time()-$_SESSION['_client']['laststrike'])<$cfg->getClientLoginTimeout()) {
            $loginmsg=$trl->translate('ALERT_EXCESSIVE_LOGIN_ATTEMPTS_BY_CLIENT');
            $errors['err']=$trl->translate('ERROR_YOU_HAVE_REACHED_MAXIMUM_FAILED_LOGIN');
        }else{ //Timeout is over.
            //Reset the counter for next round of attempts after the timeout.
            $_SESSION['_client']['laststrike']=null;
            $_SESSION['_client']['strikes']=0;
        }
    }
    //See if we can fetch local ticket id associated with the ID given
    if(!$errors && is_numeric($ticketID) && Validator::is_email($email) && ($tid=Ticket::getIdByExtId($ticketID))) {
        //At this point we know the ticket is valid.
        $ticket= new Ticket($tid);
        //TODO: 1) Check how old the ticket is...3 months max?? 2) Must be the latest 5 tickets?? 
        //Check the email given.
        if($ticket->getId() && strcasecmp($ticket->getEMail(),$email)==0){
            //valid match...create session goodies for the client.
            $user = new ClientSession($email,$ticket->getId());
            $_SESSION['_client']=array(); //clear.
            $_SESSION['_client']['userID']   =$ticket->getEmail(); //Email
            $_SESSION['_client']['key']      =$ticket->getExtId(); //Ticket ID --acts as password when used with email. See above.
            $_SESSION['_client']['token']    =$user->getSessionToken();
            $_SESSION['TZ_OFFSET']=$cfg->getTZoffset();
            $_SESSION['daylight']=$cfg->observeDaylightSaving();
            //Log login info...
            $msg=sprintf("%s/%s logged in [%s]",$ticket->getEmail(),$ticket->getExtId(),$_SERVER['REMOTE_ADDR']);
            Sys::log(LOG_DEBUG,'User login',$msg);
            //Redirect tickets.php
            session_write_close();
            session_regenerate_id();
            @header("Location: tickets.php");
            require_once('tickets.php'); //Just incase. of header already sent error.
            exit;
        }
    }
    //If we get to this point we know the login failed.
    $_SESSION['_client']['strikes']+=1;
    if(!$errors && $_SESSION['_client']['strikes']>$cfg->getClientMaxLogins()) {
        $loginmsg=$trl->translate('TEXT_ACCESS_DENIED');
        $errors['err']=$trl->translate('TEXT_FORGOT_YOUR_LOGIN_INFO');
        $_SESSION['_client']['laststrike']=time();
        $param = array();
		$param[0] = $_POST['lemail'];
		$param[1] = $_POST['lticket'];
		$param[2] = $_SERVER['REMOTE_ADDR'];
		$param[3] = date('M j, Y, g:i a T');
		$param[4] = $_SESSION['_client']['strikes'];
        //$alert=$trl->translate('ALERT_EXCESSIVE_LOGIN_ATTEMPTS_BY_CLIENT',$param);
        $alert='Excessive login attempts by a client?'."\n".
                'Email: '.$_POST['lemail']."\n".'Ticket#: '.$_POST['lticket']."\n".
                'IP: '.$_SERVER['REMOTE_ADDR']."\n".'Time:'.date('M j, Y, g:i a T')."\n\n".
                'Attempts #'.$_SESSION['_client']['strikes'];
        Sys::log(LOG_ALERT,'Excessive login attempts (client)',$alert,($cfg->alertONLoginError()));
    }elseif($_SESSION['_client']['strikes']%2==0){ //Log every other failed login attempt as a warning.
        $alert='Email: '.$_POST['lemail']."\n".'Ticket #: '.$_POST['lticket']."\n".'IP: '.$_SERVER['REMOTE_ADDR'].
               "\n".'TIME: '.date('M j, Y, g:i a T')."\n\n".'Attempts #'.$_SESSION['_client']['strikes'];
        Sys::log(LOG_WARNING,'Failed login attempt (client)',$alert);
    }
endif;
require(CLIENTINC_DIR.'header.inc.php');
require(CLIENTINC_DIR.'login.inc.php');
require(CLIENTINC_DIR.'footer.inc.php');
?>
