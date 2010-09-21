<?php
/*********************************************************************
    logout.php

    Log out staff
    Destroy the session and redirect to login.php

    Peter Rotich <peter@osticket.com>
    Copyright (c)  2006-2010 osTicket
    http://www.osticket.com

    Released under the GNU General Public License WITHOUT ANY WARRANTY.
    See LICENSE.TXT for details.

    vim: expandtab sw=4 ts=4 sts=4:
    $Id: $
**********************************************************************/
require('staff.inc.php');
Sys::log(LOG_DEBUG,'Staff logout',sprintf("%s logged out [%s]",$thisuser->getUserName(),$_SERVER['REMOTE_ADDR'])); //Debug.
$_SESSION['_staff']=array();
session_unset();
session_destroy();
@header('Location: login.php');
require('login.php');
?>
