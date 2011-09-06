<?php
/*********************************************************************
    class.lock.php

    Ticket lock handle.

    Peter Rotich <peter@osticket.com>
    Copyright (c)  2006-2010 osTicket
    http://www.osticket.com

    Released under the GNU General Public License WITHOUT ANY WARRANTY.
    See LICENSE.TXT for details.

    vim: expandtab sw=4 ts=4 sts=4:
    $Id: class.lock.php,v 1.1.2.1 2009/08/17 18:35:46 carlos.delfino Exp $
**********************************************************************/

/*
 * Mainly used as a helper...
 */

class TicketLock {
    var $id;
    var $staff_id;
    var $created;
    var $expire;
    var $expiretime;
    
    function TicketLock($id,$load=true){
        $this->id=$id;
        if($load) $this->load();
    }

    function load() {

        if(!$this->id)
            return false;
      
        $sql='SELECT *,TIME_TO_SEC(TIMEDIFF(expire,NOW())) as timeleft FROM '.TICKET_LOCK_TABLE.' WHERE lock_id='.db_input($this->id);
        if(($res=db_query($sql)) && db_num_rows($res)) {
            $info=db_fetch_array($res);
            $this->id=$info['lock_id'];
            $this->staff_id=$info['staff_id'];
            $this->created=$info['created'];
            $this->expire=$info['expire'];
            $this->expiretime=time()+$info['timeleft'];
            return true;
        }
        $this->id=0;  
        return false;
    }
  
    function reload() {
        return $this->load();
    }

    //Create a ticket lock...this function assumes the caller check for access & validity of ticket & staff x-ship.    
    function acquire($ticketId,$staffId) {
        global $cfg;

        if(!$ticketId or !$staffId or !$cfg->getLockTime())
            return 0;

        //Cleanup any expired locks on the ticket.
        db_query('DELETE FROM '.TICKET_LOCK_TABLE.' WHERE ticket_id='.db_input($ticketId).' AND expire<NOW()');
        //TODO: cleanup any other locks owned by the user? (NOT a good idea.. could be working on 2 tickets at once??)
        $sql='INSERT IGNORE INTO '.TICKET_LOCK_TABLE.' SET created=NOW() '.
            ',ticket_id='.db_input($ticketId).
            ',staff_id='.db_input($staffId).
            ',expire=DATE_ADD(NOW(),INTERVAL '.$cfg->getLockTime().' MINUTE) ';
        
        return db_query($sql)?db_insert_id():0;
    }
   
    //Renew existing lock.
    function renew() {
        global $cfg;

        $sql='UPDATE '.TICKET_LOCK_TABLE.' SET expire=DATE_ADD(NOW(),INTERVAL '.$cfg->getLockTime().' MINUTE) '.
            ' WHERE lock_id='.db_input($this->getId());
        //echo $sql;
        if(db_query($sql) && db_affected_rows()) {
            $this->reload();
            return true;
        }
        return false;
    }

    //release aka delete a lock.
    function release(){
        //FORCED release - we don't give a ....
        $sql='DELETE FROM '.TICKET_LOCK_TABLE.' WHERE lock_id='.db_input($this->getId());
        return (db_query($sql) && db_affected_rows())?true:false;
    }

    function getId(){
        return $this->id;
    }
    
    function getStaffId(){
        return $this->staff_id;
    }

    function getCreateTime() {
        return $this->created;
    }

    function getExpireTime() {
        return $this->expire;
    }
    //Get remaiming time before the lock expires
    function getTime() {
        return $this->isExpired()?0:($this->expiretime-time());
    }
    
    //Should we be doing realtime check here? (Ans: not really....expiretime is local & based on loadtime)
    function isExpired(){
        return (time()>$this->expiretime)?true:false;
    }

    //Simply remove ALL locks a user (staff) holds on a ticket(s).
    function removeStaffLocks($staffId,$ticketId=0) {
        $sql='DELETE FROM '.TICKET_LOCK_TABLE.' WHERE staff_id='.db_input($staffId);
        if($ticketId)
            $sql.=' AND ticket_id='.db_input($ticketId);

        return db_query($sql)?true:false;
    }

    //Called  via cron 
    function cleanup() {
        //Cleanup any expired locks.
        db_query('DELETE FROM '.TICKET_LOCK_TABLE.' WHERE expire<NOW()');
        @db_query('OPTIMIZE TABLE '.TICKET_LOCK_TABLE);
    }
}
?>
