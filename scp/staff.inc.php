<?php
/*************************************************************************
    staff.inc.php
    
    File included on every staff page...handles logins (security) and file path issues.

    Peter Rotich <peter@osticket.com>
    Copyright (c)  2006-2010 osTicket
    http://www.osticket.com

    Released under the GNU General Public License WITHOUT ANY WARRANTY.
    See LICENSE.TXT for details.

    vim: expandtab sw=4 ts=4 sts=4:
    $Id: staff.inc.php,v 1.2.2.4 2009/11/29 22:05:02 carlos.delfino Exp $
**********************************************************************/
if(basename($_SERVER['SCRIPT_NAME'])==basename(__FILE__)) die('Kwaheri rafiki!'); //Say hi to our friend..
if(!file_exists('../main.inc.php')) die('Fatal error..get tech support');
define('ROOT_PATH','../'); //Path to the root dir.
require_once('../main.inc.php');

if(!defined('INCLUDE_DIR')) die('Fatal error');

/*Some more include defines specific to staff only */
define('STAFFINC_DIR',INCLUDE_DIR.'staff/');
define('SCP_DIR',str_replace('//','/',dirname(__FILE__).'/'));

/* Define tag that included files can check */
define('OSTSCPINC',TRUE);
define('OSTSTAFFINC',TRUE);

/* Tables used by staff only */
define('KB_PREMADE_TABLE',TABLE_PREFIX.'kb_premade');


/* include what is needed on staff control panel */

require_once(INCLUDE_DIR.'class.staff.php');
require_once(INCLUDE_DIR.'class.nav.php');


/* First order of the day is see if the user is logged in and with a valid session.
   User must be valid beyond this point 
   ONLY super admins can access the helpdesk on offline state.
*/

function staffLoginPage($msg) {
    $_SESSION['_staff']['auth']['dest']=THISPAGE;
    $_SESSION['_staff']['auth']['msg']=$msg;
    require(SCP_DIR.'login.php');
    exit;
}

$thisuser = new StaffSession($_SESSION['_staff']['userID']); /*always reload???*/

//1) is the user Logged in for real && is staff.
if(!is_object($thisuser) || !$thisuser->getId() || !$thisuser->isValid()){
    $msg=(!$thisuser || !$thisuser->isValid())?$trl->translate('TEXT_AUTHENTICATION_REQUIRED'):$trl->translate('TEXT_SESSION_TIMED_OUT_DUE_TO_INACTIVITY_DUE_TO_INACTIVITY');
    staffLoginPage($msg);
    exit;
}

//2) if not super admin..check system and group status
if(!$thisuser->isadmin()){
    if($cfg->isHelpDeskOffline()){
        staffLoginPage('System Offline');
        exit;
    }

    if(!$thisuser->isactive() || !$thisuser->isGroupActive()) {
        staffLoginPage('Access Denied. Contact Admin');
        exit;
    }
}

//Keep the session activity alive
$thisuser->refreshSession();
//Set staff's timezone offset.
$_SESSION['TZ_OFFSET']=$thisuser->getTZoffset();
//Clear some vars. we use in all pages.
$errors=array();
$msg=$warn=$sysnotice='';

$tabs=array();
$submenu=array();

if(defined('THIS_VERSION') && strcasecmp($cfg->getVersion(),THIS_VERSION)) {
    $errors['err']=$sysnotice=sprintf('The script is version %s while the database is version %s',THIS_VERSION,$cfg->getVersion());
}elseif($cfg->isHelpDeskOffline()){
    $sysnotice=$trl->translate('TEXT_SYSTEM_IS_OFF_LINE');
    $sysnotice.=' <a href="admin.php?t=pref">'.$trl->translate('LABEL_ENABLE_SYSTEM_OFF_LINE').'</a>.';
}

$nav = new StaffNav(strcasecmp(basename($_SERVER['SCRIPT_NAME']),'admin.php')?'staff':'admin',$trl);
//Check for forced password change.
if($thisuser->forcePasswdChange()){
    require('profile.php'); //profile.php must request this file as require_once to avoid problems.
    exit;
}
?>