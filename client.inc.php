<?php
/*********************************************************************
    client.inc.php

    File included on every client page

    Peter Rotich <peter@osticket.com>
    Copyright (c)  2006-2010 osTicket
    http://www.osticket.com

    Released under the GNU General Public License WITHOUT ANY WARRANTY.
    See LICENSE.TXT for details.

    vim: expandtab sw=4 ts=4 sts=4:
    $Id: $
**********************************************************************/
if(!strcasecmp(basename($_SERVER['SCRIPT_NAME']),basename(__FILE__))) die('kwaheri rafiki!');

if(!file_exists('main.inc.php')) die('Fatal Error.');

require_once('main.inc.php');

if(!defined('INCLUDE_DIR')) die('Fatal error');

/*Some more include defines specific to client only */
define('CLIENTINC_DIR',INCLUDE_DIR.'client/');
define('OSTCLIENTINC',TRUE);

//Check the status of the HelpDesk.
if(!is_object($cfg) || !$cfg->getId() || $cfg->isHelpDeskOffline()) {
    include('./offline.php');
    exit;
}

//Forced upgrade? Version mismatch.
if(defined('THIS_VERSION') && strcasecmp($cfg->getVersion(),THIS_VERSION)) {
    die('System is offline for an upgrade.');
    exit;
}

/* include what is needed on client stuff */
require_once(INCLUDE_DIR.'class.client.php');
require_once(INCLUDE_DIR.'class.ticket.php');
require_once(INCLUDE_DIR.'class.dept.php');

//clear some vars
$errors=array();
$msg='';
$thisclient=null;
//Make sure the user is valid..before doing anything else.
if($_SESSION['_client']['userID'] && $_SESSION['_client']['key'])
    $thisclient = new ClientSession($_SESSION['_client']['userID'],$_SESSION['_client']['key']);

//print_r($_SESSION);
//is the user logged in?
if($thisclient && $thisclient->getId() && $thisclient->isValid()){
     $thisclient->refreshSession();
}

?>
