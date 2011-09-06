<?php
/*********************************************************************
    cron.php

    File to handle cron job calls (local and remote).

    Peter Rotich <peter@osticket.com>
    Copyright (c)  2006-2010 osTicket
    http://www.osticket.com

    Released under the GNU General Public License WITHOUT ANY WARRANTY.
    See LICENSE.TXT for details.

    vim: expandtab sw=4 ts=4 sts=4:
    $Id: cron.php,v 1.1.2.1 2009/08/17 18:25:57 carlos.delfino Exp $
**********************************************************************/
@chdir(realpath(dirname(__FILE__)).'/'); //Change dir.
require('api.inc.php');
require_once(INCLUDE_DIR.'class.cron.php');
Cron::run();
Sys::log(LOG_DEBUG,'Cron Job','External cron job executed ['.$_SERVER['REMOTE_ADDR'].']');
?>
