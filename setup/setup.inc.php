<?php
/*********************************************************************
    setup.inc.php

    Master include file for setup/install scripts.

    Peter Rotich <peter@osticket.com>
    Copyright (c)  2006,2007,2008,2009 osTicket
    http://www.osticket.com

    Released under the GNU General Public License WITHOUT ANY WARRANTY.
    See LICENSE.TXT for details.

    vim: expandtab sw=4 ts=4 sts=4:
    $Id: setup.inc.php,v 1.1.2.4 2009/10/09 11:36:32 carlos.delfino Exp $
**********************************************************************/
#define paths
define('SETUPINC',true);

if(!defined('INCLUDE_DIR')):
define('ROOT_PATH','../');
define('ROOT_DIR','../');
define('INCLUDE_DIR',ROOT_DIR.'include/');
endif;

#required files
require_once(INCLUDE_DIR.'mysql.php');
require_once(INCLUDE_DIR.'class.validator.php');
require_once(INCLUDE_DIR.'class.format.php');
require_once(INCLUDE_DIR.'class.misc.php');
require_once(INCLUDE_DIR.'class.translator.php');

#Table Prefix: TABLE_PREFIX must be defined by the caller 
function replace_table_prefix($query) {
    return str_replace('%TABLE_PREFIX%',PREFIX, $query);
}

#Some messages....

ob_start();
echo "
Thank you for choosing osTicket.
    
Make sure you join osTicket forums http://osticket.com/forums to stay upto date on the latest news, security alerts and updates. osTicket forums is also a great place to get assistance, guidance, tips and help from osTicket users. In addition to the forums, osTicket wiki provides useful collection of educational materials, documentation, and notes from the community. Your contribution to osTicket community will be appreciated!

If you are looking for greater level of support, we provide professional services and commercial support with guaranteed response times, and access to the core development team. We can also help customize or even add new features to the system to meet your unique needs.

For more information or to discuss your needs, please contact us today at http://osticket.com/support/. Any feedback will be appreciated!

osTicket Team";
$msg1 = ob_get_contents();
ob_end_clean();
define('OSTICKET_INSTALLED',trim($msg1));

ob_start();
echo "
osTicket upgraded!

Please make sure you join osTicket forums http://osticket.com/forums, if you haven't done so already, to stay upto date on the latest news, security alerts and updates. Your contribution to osTicket community will be appreciated!

osTicket team is committed to providing support to all users through our free online resources and a full range of commercial support packages and services. For more information or to discuss your needs, please contact us today at http://osticket.com/support/. Any feedback will be appreciated!

osTicket Team";
$msg2 = ob_get_contents();
ob_end_clean();
define('OSTICKET_UPGRADED',trim($msg2));


$msg='';
$errors=array();
?>
