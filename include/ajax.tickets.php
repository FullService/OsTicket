<?php
/*********************************************************************
    ajax.tickets.php

    AJAX interface for tickets

    Peter Rotich <peter@osticket.com>
    Copyright (c)  2006-2010 osTicket
    http://www.osticket.com

    Released under the GNU General Public License WITHOUT ANY WARRANTY.
    See LICENSE.TXT for details.

    vim: expandtab sw=4 ts=4 sts=4:
    $Id: ajax.tickets.php,v 1.1.2.1 2009/08/17 18:35:47 carlos.delfino Exp $
**********************************************************************/

if(!defined('OSTAJAXINC') || !defined('INCLUDE_DIR')) die('403');

include_once(INCLUDE_DIR.'class.ticket.php');

class TicketsAjaxAPI{
   
    function searchbyemail($params) {
	
        $input = db_input(strtolower($params['input']),false);
        $len = strlen($input);
        $limit = isset($params['limit']) ? (int) $params['limit']:25;
        $items=array();
        $sql='SELECT DISTINCT email,name FROM '.TICKET_TABLE.' WHERE email LIKE \''.$input.'%\' ORDER BY created LIMIT '.$limit;
        $resp=db_query($sql);
        if($resp && db_num_rows($resp)){
            while(list($email,$name)=db_fetch_row($resp)) {
                $name=(strpos($name,'@')===false)?$name:'';
                $items[] ='{"id": "'.$email.'", "value": "'.$email.'", "info": "'.$name.'"}';
            }
        }
        $result= '{"results": ['.implode(", ", $items).']}';
        return $result;
    }

    function search($params) {

        $input = db_input(strtolower($params['input']),false);
        $len = strlen($input);
        $limit = isset($params['limit']) ? (int) $params['limit']:25;
        $items=array();
        $ticketid=false;
        if(is_numeric($input)) {
            $WHERE=' WHERE ticketID LIKE \''.$input.'%\'';
            $ticketid=true;
        }else{
            $WHERE=' WHERE email LIKE \''.$input.'%\'';
        }
        $sql='SELECT DISTINCT ticketID,email FROM '.TICKET_TABLE.' '.$WHERE.' ORDER BY created LIMIT '.$limit;
        $resp=db_query($sql);
        if($resp && db_num_rows($resp)){
            while(list($id,$email)=db_fetch_row($resp)) {
                $info=($ticketid)?$email:$id;
                $id=($ticketid)?$id:$email;
                $items[] ='{"id": "'.$id.'", "value": "'.$id.'", "info": "'.$info.'"}';
            }
        }
        $result= '{"results": ['.implode(", ", $items).']}';
        return $result;
    }

    function acquireLock($params) {
        global $cfg,$thisuser;
        
        if(!$params['tid'] or !is_numeric($params['tid'])) 
            return 0;
       
        $ticket = new Ticket($params['tid']);
        
        if(!$ticket || (!$thisuser->canAccessDept($ticket->getDeptId()) && ($ticket->isAssigned() && $thisuser->getId()!=$ticket->getStaffId())))
             return '{"id":0, "retry":false}';
        
        //is the ticket already locked?
        if($ticket->isLocked() && ($lock=$ticket->getLock()) && !$lock->isExpired()) {
            /*Note: Ticket->acquireLock does the same logic...but we need it here since we need to know who owns the lock up front*/
            
            //Ticket is locked by someone else.??
            if($lock->getStaffId()!=$thisuser->getId())
                return '{"id":0, "retry":false}';
            
            //Ticket already locked by staff...try renewing it.
            $lock->renew(); //New clock baby!
            
            return '{"id":'.$lock->getId().', "time":'.$lock->getTime().'}';
        }
        
        //Ticket is not locked or the lock is expired...try locking it...
        if(($lock=$ticket->acquireLock())) //Set the lock.
            return '{"id":'.$lock->getId().', "time":'.$lock->getTime().'}';
        
        //unable to obtain the lock..for some really weired reason!
        return '{"id":0, "retry":true}'; //Client should watch for possible loop on retries. Max attempts?
    }

    function renewLock($params) {
        global $thisuser;

        if(!$params['id'] or !is_numeric($params['id']))
            return '{"id":0, "retry":true}';
       
        $lock= new TicketLock($params['id']);
        
        if(!$lock->load() || !$lock->getStaffId() || $lock->isExpired()) //Said lock doesn't exist or is is expired
            return TicketsAjaxAPI::acquireLock($params); //acquire the lock
        
        if($lock->getStaffId()!=$thisuser->getId()) //user doesn't own the lock anymore??? sorry...try to next time.
            return '{"id":0, "retry":false}'; //Give up...
   
        //Renew the lock.
        $lock->renew(); //Failure here is not an issue since the lock is not expired yet..
        
        return '{"id":'.$lock->getId().', "time":'.$lock->getTime().'}';
    }

    function releaseLock($params) {
        global $thisuser;

        if($params['id'] && is_numeric($params['id'])){ //Lock Id provided!
        
            $lock= new TicketLock($params['id']);
            //Already gone?
            if(!$lock->load() || !$lock->getStaffId() || $lock->isExpired()) //Said lock doesn't exist or is is expired
                return 1;
        
            //make sure the user actually owns the lock before releasing it.
            return ($lock->getStaffId()==$thisuser->getId() && $lock->release())?1:0;

        }elseif($params['tid']){ //release all the locks the user owns on the ticket.
            return TicketLock::removeStaffLocks($thisuser->getId(),$params['tid'])?1:0;
        }

        return 0;
    }
}
?>
