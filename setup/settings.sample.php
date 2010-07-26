<?php
/*********************************************************************
    setttings.php

    Static osTicket configuration file. Mainly useful for mysql login info.
    Created during installation process and shouldn't change even on upgrades.
   
    Peter Rotich <peter@osticket.com>
    Copyright (c)  2006,2007,2008,2009 osTicket
    http://www.osticket.com

    Released under the GNU General Public License WITHOUT ANY WARRANTY.
    See LICENSE.TXT for details.

    vim: expandtab sw=4 ts=4 sts=4:
    $Id: settings.sample.php,v 1.1.2.3 2009/10/06 18:35:31 carlos.delfino Exp $
**********************************************************************/

#Disable direct access.
if(!strcasecmp(basename($_SERVER['SCRIPT_NAME']),basename(__FILE__)) || !defined('ROOT_PATH')) die('kwaheri rafiki!');

#Install flag
define('OSTINSTALLED',FALSE);
if(OSTINSTALLED!=TRUE){
    if(!file_exists(ROOT_PATH.'setup/install.php')) die('Error: Contact system admin.'); //Something is really wrong!
    //Invoke the installer.
    header('Location: '.ROOT_PATH.'setup/install.php');
    exit;
}

# Encrypt/Decrypt secret key - randomly generated during installation.
define('SECRET_SALT','%CONFIG-SIRI');

#Default admin email. Used only on db connection issues and related alerts.
define('ADMIN_EMAIL','%ADMIN-EMAIL');

#Mysql Login info
define('DBTYPE','mysql');
define('DBHOST','%CONFIG-DBHOST'); 
define('DBNAME','%CONFIG-DBNAME');
define('DBUSER','%CONFIG-DBUSER');
define('DBPASS','%CONFIG-DBPASS');

#Table prefix
define('TABLE_PREFIX','%CONFIG-PREFIX');

#Translator Configure
define('OSTLANG','%CONFIG-OSTLANG');

?>
