<?php
/*********************************************************************
    ajax.php

    Ajax utils interface.

    Peter Rotich <peter@osticket.com>
    Copyright (c)  2006-2010 osTicket
    http://www.osticket.com

    Released under the GNU General Public License WITHOUT ANY WARRANTY.
    See LICENSE.TXT for details.

    vim: expandtab sw=4 ts=4 sts=4:
    $Id: ajax.php,v 1.1.2.1 2009/08/17 19:27:49 carlos.delfino Exp $
**********************************************************************/

require('staff.inc.php');

//Clean house...don't let the world see your crap.
ini_set('display_errors','0'); //Disable error display
ini_set('display_startup_errors','0');

//TODO: disable direct access via the browser? i,e All request must have REFER? 

if(!defined('INCLUDE_DIR'))	Http::response(500,'config error');

if(!$thisuser || !$thisuser->isValid()) {
	Http::response(401,'Access Denied. IP '.$_SERVER['REMOTE_ADDR']);
	exit;
}

//---------check required global vars --------//
if(!$_REQUEST['api'] || !$_REQUEST['f']){
    Http::response(416,'Invalid params');
    exit;
}
//------Do the AJAX Dance ----------------//
define('OSTAJAXINC',TRUE);
$file='ajax.'.Format::file_name(strtolower($_REQUEST['api'])).'.php';
if(!file_exists(INCLUDE_DIR.$file)){
Http::response(405,'invalid method');
exit;
}

$class=ucfirst(strtolower($_REQUEST['api'])).'AjaxAPI';
$func=$_REQUEST['f'];

if(is_callable($func)){ //if the function is callable B4 we include the source file..play with the user...
Http::response(500,'This is secure ajax assjax '.$_SERVER['REMOTE_ADDR']);
exit;
}
require(INCLUDE_DIR.$file);

if(!is_callable(array($class,$func))){
 Http::response(416,'invalid method/call '.Format::htmlchars($func));
 exit;
}

$response=@call_user_func(array($class,$func),$_REQUEST);
Http::response(200,$response);
exit;
?>
