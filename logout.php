<?php
/*********************************************************************
    logout.php

    Destroy clients session.

    Peter Rotich <peter@osticket.com>
    Copyright (c)  2006,2007,2008,2009 osTicket
    http://www.osticket.com

    Released under the GNU General Public License WITHOUT ANY WARRANTY.
    See LICENSE.TXT for details.

    vim: expandtab sw=4 ts=4 sts=4:
    $Id: logout.php,v 1.1.2.1 2009/08/17 19:17:58 carlos.delfino Exp $
**********************************************************************/

require('client.inc.php');
//We are checking to make sure the user is logged in before a logout to avoid session reset tricks on excess logins
$_SESSION['_client']=array();
session_unset();
session_destroy();
header('Location: index.php');
require('index.php');
?>
