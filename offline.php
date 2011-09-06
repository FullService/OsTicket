<?php
/*********************************************************************
    offline.php

    Offline page...modify to fit your needs.

    Peter Rotich <peter@osticket.com>
    Copyright (c)  2006-2010 osTicket
    http://www.osticket.com

    Released under the GNU General Public License WITHOUT ANY WARRANTY.
    See LICENSE.TXT for details.

    vim: expandtab sw=4 ts=4 sts=4:
    $Id: $
**********************************************************************/
require_once('client.inc.php');
if($cfg && !$cfg->isHelpDeskOffline()) { 
    @header('Location: index.php'); //Redirect if the system is online.
    include('index.php');
    exit;
}
?>
<html>
<head>
<title><?php echo $trl->translate('TITLE_BAR_OFFLINE'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $trl->getCharset();?>">
</head>
<body bgcolor="#FFFFFF" text="#000000" leftmargin="0" rightmargin="0" topmargin="0">
<table width="60%" cellpadding="5" cellspacing="0" border="0">
	<tr>
		<td>
         <h3><?php echo $trl->translate('TITLE_OFFLINE'); ?></h3>
        <p>
         <?php echo $trl->translate('TEXT_OFFLINE'); ?>
        </p>
    </td></tr>
</table>
</body>
</html>
