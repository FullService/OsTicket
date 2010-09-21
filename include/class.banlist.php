<?php
/*********************************************************************
    class.banlist.php

    Banned emails handle.

    Peter Rotich <peter@osticket.com>
    Copyright (c)  2006-2010 osTicket
    http://www.osticket.com

    Released under the GNU General Public License WITHOUT ANY WARRANTY.
    See LICENSE.TXT for details.

    vim: expandtab sw=4 ts=4 sts=4:
    $Id: class.banlist.php,v 1.1.2.1 2009/08/17 18:35:47 carlos.delfino Exp $
**********************************************************************/

class Banlist {
    
    function add($email,$submitter='') {
        $sql='INSERT IGNORE INTO '.BANLIST_TABLE.' SET added=NOW(),email='.db_input($email).',submitter='.db_input($submitter);
        return (db_query($sql) && ($id=db_insert_id()))?$id:0;
    }
    
    function remove($email) {
        $sql='DELETE FROM '.BANLIST_TABLE.' WHERE email='.db_input($email);
        return (db_query($sql) && db_affected_rows())?true:false;
    }
    
    function isbanned($email) {
        return db_num_rows(db_query('SELECT id FROM '.BANLIST_TABLE.' WHERE email='.db_input($email)))?true:false;
    }
}
