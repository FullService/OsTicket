<?php
/*************************************************************************
    tickets.php
    
    Handles all tickets related actions.
 
    Peter Rotich <peter@osticket.com>
    Copyright (c)  2006-2010 osTicket
    http://www.osticket.com

    Released under the GNU General Public License WITHOUT ANY WARRANTY.
    See LICENSE.TXT for details.

    vim: expandtab sw=4 ts=4 sts=4:
    $Id: tickets.php,v 1.1.2.1 2009/08/17 19:27:49 carlos.delfino Exp $
**********************************************************************/

require('staff.inc.php');
require_once(INCLUDE_DIR.'class.ticket.php');
require_once(INCLUDE_DIR.'class.dept.php');
require_once(INCLUDE_DIR.'class.banlist.php');


$page='';
$ticket=null; //clean start.
//LOCKDOWN...See if the id provided is actually valid and if the user has access.
if(!$errors && ($id=$_REQUEST['id']?$_REQUEST['id']:$_POST['ticket_id']) && is_numeric($id)) {
    $deptID=0;
    $ticket= new Ticket($id);
    if(!$ticket or !$ticket->getDeptId())
        $errors['err']='Unknown ticket ID#'.$id; //Sucker...invalid id
    elseif(!$thisuser->isAdmin()  && (!$thisuser->canAccessDept($ticket->getDeptId()) && $thisuser->getId()!=$ticket->getStaffId()))
        $errors['err']='Access denied. Contact admin if you believe this is in error';

    if(!$errors && $ticket->getId()==$id)
        $page='viewticket.inc.php'; //Default - view

    if(!$errors && $_REQUEST['a']=='edit') { //If it's an edit  check permission.
        if($thisuser->canEditTickets() || ($thisuser->isManager() && $ticket->getDeptId()==$thisuser->getDeptId()))
            $page='editticket.inc.php';
        else
            $errors['err']='Access denied. You are not allowed to edit this ticket. Contact admin if you believe this is in error';
    }

}elseif($_REQUEST['a']=='open') {
    //TODO: Check perm here..
    $page='newticket.inc.php';
}
//At this stage we know the access status. we can process the post.
if($_POST && !$errors):

    if($ticket && $ticket->getId()) {
        //More tea please.
        $errors=array();
        $lock=$ticket->getLock(); //Ticket lock if any
        $statusKeys=array('open'=>'Open','Reopen'=>'Open','Close'=>'Closed');
        switch(strtolower($_POST['a'])):
        case 'reply':
            $fields=array();
            $fields['msg_id']       = array('type'=>'int',  'required'=>1, 'error'=>'Missing message ID');
            $fields['response']     = array('type'=>'text', 'required'=>1, 'error'=>'Response message required');
            $params = new Validator($fields);
            if(!$params->validate($_POST)){
                $errors=array_merge($errors,$params->errors());
            }
            //Use locks to avoid double replies
            if($lock && $lock->getStaffId()!=$thisuser->getId())
                $errors['err']='Action Denied. Ticket is locked by someone else!';

            //Check attachments restrictions.
            if($_FILES['attachment'] && $_FILES['attachment']['size']) {
                if(!$_FILES['attachment']['name'] || !$_FILES['attachment']['tmp_name'])
                    $errors['attachment']='Invalid attachment';
                elseif(!$cfg->canUploadFiles()) //TODO: saved vs emailed attachments...admin config??
                    $errors['attachment']='upload dir invalid. Contact admin.';
                elseif(!$cfg->canUploadFileType($_FILES['attachment']['name']))
                    $errors['attachment']='Invalid file type';
            }

            //Make sure the email is not banned
            if(!$errors && BanList::isbanned($ticket->getEmail()))
                $errors['err']='Email is in banlist. Must be removed to reply';

            //If no error...do the do.
            if(!$errors && ($respId=$ticket->postResponse($_POST['msg_id'],$_POST['response'],$_POST['signature'],$_FILES['attachment']))){
                $msg=$trl->_t('TEXT_RESPONSE_POSTED_SUCCESSFULLY');
                //Set status if any.
                $wasOpen=$ticket->isOpen();
                if(isset($_POST['ticket_status']) && $_POST['ticket_status']) {
                   if($ticket->setStatus($_POST['ticket_status']) && $ticket->reload()) {
                       $note=sprintf('%s %s the ticket on reply',$thisuser->getName(),$ticket->isOpen()?'reopened':'closed');
                       $ticket->logActivity('Ticket status changed to '.($ticket->isOpen()?'Open':'Closed'),$note);
                   }
                }
                //Finally upload attachment if any
                if($_FILES['attachment'] && $_FILES['attachment']['size']){
                    $ticket->uploadAttachment($_FILES['attachment'],$respId,'R');
                }
                $ticket->reload();
                //Mark the ticket answered if OPEN.
                if($ticket->isopen()){
                    $ticket->markAnswered();
                }elseif($wasOpen) { //Closed on response???
                    $page=$ticket=null; //Going back to main listing.
                }
            }elseif(!$errors['err']){
                $errors['err']='Unable to post the response.';
            }
            break;
        case 'transfer':
            $fields=array();
            $fields['dept_id']      = array('type'=>'int',  'required'=>1, 'error'=>'Select Department');
            $fields['message']      = array('type'=>'text',  'required'=>1, 'error'=>'Note/Message required');
            $params = new Validator($fields);
            if(!$params->validate($_POST)){
                $errors=array_merge($errors,$params->errors());
            }

            if(!$errors && ($_POST['dept_id']==$ticket->getDeptId()))
                $errors['dept_id']='Ticket already in the Dept.';
       
            if(!$errors && !$thisuser->canTransferTickets())
                $errors['err']='Action Denied. You are not allowed to transfer tickets.';
            
            if(!$errors && $ticket->transfer($_POST['dept_id'])){
                 $olddept=$ticket->getDeptName();
                 $ticket->reload(); //dept manager changed!
                //Send out alerts?? - for now yes....part of internal note!
                $title='Dept. Transfer from '.$olddept.' to '.$ticket->getDeptName();
                $ticket->postNote($title,$_POST['message']);
                $msg=$trl->_t('TEXT_TICKET_TRANSFERED_SUCESSFULLY_TO_DEPT',$ticket->getDeptName());
                if(!$thisuser->canAccessDept($_POST['dept_id']) && $ticket->getStaffId()!=$thisuser->getId()) { //Check access.
                    //Staff doesn't have access to the new department.
                    $page='tickets.inc.php';
                    $ticket=null;
                }
            }elseif(!$errors['err']){
                $errors['err']='Unable to complete the transfer';
            }
            break;
        case 'assign':
            $fields=array();
            $fields['staffId']          = array('type'=>'int',  'required'=>1, 'error'=>'Select assignee');
            $fields['assign_message']   = array('type'=>'text',  'required'=>1, 'error'=>'Message required');
            $params = new Validator($fields);
            if(!$params->validate($_POST)){
                $errors=array_merge($errors,$params->errors());
            }
            if(!$errors && $ticket->isAssigned()){
                if($_POST['staffId']==$ticket->getStaffId())
                    $errors['staffId']='Ticket already assigned to the staff.';
            }
            //if already assigned.
            if(!$errors && $ticket->isAssigned()) { //Re assigning.
                //Already assigned to the user?
                if($_POST['staffId']==$ticket->getStaffId())
                    $errors['staffId']='Ticket already assigned to the staff.';
                //Admin, Dept manager (any) or current assigneee ONLY can reassign
                if(!$thisuser->isadmin()  && !$thisuser->isManager() && $thisuser->getId()!=$ticket->getStaffId())
                    $errors['err']='Ticket already assigned. You do not have permission to re-assign assigned tickets';
            }
            if(!$errors && $ticket->assignStaff($_POST['staffId'],$_POST['assign_message'])){
                $staff=$ticket->getStaff();
                $msg=$trl->_('TEXT_TICKET_ASSIGNED_TO_STAFF',($staff?$staff->getName():$trl->_t('LABEL_STAFF')));
                //Remove all the logs and go back to index page.
                TicketLock::removeStaffLocks($thisuser->getId(),$ticket->getId());
                $page='tickets.inc.php';
                $ticket=null;
            }elseif(!$errors['err']) {
                $errors['err']='Unable to assign the ticket';
            }
            break; 
        case 'postnote':
            $fields=array();
            $fields['title']    = array('type'=>'string',   'required'=>1, 'error'=>'Title required');
            $fields['note']     = array('type'=>'string',   'required'=>1, 'error'=>'Note message required');
            $params = new Validator($fields);
            if(!$params->validate($_POST))
                $errors=array_merge($errors,$params->errors());

            if(!$errors && $ticket->postNote($_POST['title'],$_POST['note'])){
                $msg=$trl->_t('TEXT_INTERNAL_NOTE_POSTED');
                if(isset($_POST['ticket_status']) && $_POST['ticket_status']){
                    if($ticket->setStatus($_POST['ticket_status']) && $ticket->reload()){
                        $msg.=$trl->_t('TEXT_AND_STATUS_SET_TO',($ticket->isClosed()?$trl->_t('LABEL_CLOSED'):$trl->_t('LABEL_OPEN')));
                        if($ticket->isClosed())
                            $page=$ticket=null; //Going back to main listing.
                    }
                }
            }elseif(!$errors['err']) {
                $errors['err']='Error(s) occured. Unable to post the note.';
            }
            break;
        case 'update':
            $page='editticket.inc.php';
            if(!$ticket || !$thisuser->canEditTickets())
                $errors['err']='Perm. Denied. You are not allowed to edit tickets';
            elseif($ticket->update($_POST,$errors)){
                $msg=$trl->_t('TEXT_TICKET_UPDATED_SUCCESSFULLY');
                $page='viewticket.inc.php';
            }elseif(!$errors['err']) {
                $errors['err']='Error(s) occured! Try again.';
            }
            break;
        case 'process':
            $isdeptmanager=($ticket->getDeptId()==$thisuser->getDeptId())?true:false;
            switch(strtolower($_POST['do'])):
                case 'change_priority':
                    if(!$thisuser->canManageTickets() && !$thisuser->isManager()){
                        $errors['err']='Perm. Denied. You are not allowed to change ticket\'s priority';
                    }elseif(!$_POST['ticket_priority'] or !is_numeric($_POST['ticket_priority'])){
                        $errors['err']='You must select priority';
                    }
                    if(!$errors){
                        if($ticket->setPriority($_POST['ticket_priority'])){
                            $msg=$trl->_t('TEXT_PRIORITY_CHANGED_SUCCESSFULLY');
                            $ticket->reload();
                            $note='Ticket priority set to "'.$ticket->getPriority().'" by '.$thisuser->getName();
                            $ticket->logActivity('Priority Changed',$note);
                        }else{
                            $errors['err']='Problems changing priority. Try again';
                        }
                    }
                    break;
                case 'close':
                    if(!$thisuser->isadmin() && !$thisuser->canCloseTickets()){
                        $errors['err']='Perm. Denied. You are not allowed to close tickets.';
                    }else{
                        if($ticket->close()){
                            $msg=$trl->_t('TEXT_TICKET_NUM_STATUS_SET_CLOSED',$ticket->getExtId());
                            $note='Ticket closed without response by '.$thisuser->getName();
                            $ticket->logActivity('Ticket Closed',$note);
                            $page=$ticket=null; //Going back to main listing.
                        }else{
                            $errors['err']='Problems closing the ticket. Try again';
                        }
                    }
                    break;
                case 'reopen':
                    //if they can close...then assume they can reopen.
                    if(!$thisuser->isadmin() && !$thisuser->canCloseTickets()){
                        $errors['err']='Perm. Denied. You are not allowed to reopen tickets.';
                    }else{
                        if($ticket->reopen()){
                            $msg=$trl->_t('TEXT_TICKET_STATUS_SET_TO_OPEN');
                            $note='Ticket reopened (without comments)';
                            if($_POST['ticket_priority']) {
                                $ticket->setPriority($_POST['ticket_priority']);
                                $ticket->reload();
                                $note.=' and status set to '.$ticket->getPriority();
                            }
                            $note.=' by '.$thisuser->getName();
                            $ticket->logActivity('Ticket Reopened',$note);
                        }else{
                            $errors['err']='Problems reopening the ticket. Try again';
                        }
                    }
                    break;
                case 'release':
                    if(!($staff=$ticket->getStaff()))
                        $errors['err']='Ticket is not assigned!';
                    elseif($ticket->release()) {
                        $msg='Ticket released (unassigned) from '.$staff->getName().' by '.$thisuser->getName();;
                        $ticket->logActivity('Ticket unassigned',$msg);
                    }else
                        $errors['err']='Problems releasing the ticket. Try again';
                    break;
                case 'overdue':
                    //Mark the ticket as overdue
                    if(!$thisuser->isadmin() && !$thisuser->isManager()){
                        $errors['err']='Perm. Denied. You are not allowed to flag tickets overdue';
                    }else{
                        if($ticket->markOverdue()){
                            $msg=$trl->_t('TEXT_TICKET_FLAGGED_AS_OVERDUE');
                            $note=$msg;
                            if($_POST['ticket_priority']) {
                                $ticket->setPriority($_POST['ticket_priority']);
                                $ticket->reload();
                                $note.=' and status set to '.$ticket->getPriority();
                            }
                            $note.=' by '.$thisuser->getName();
                            $ticket->logActivity('Ticket Marked Overdue',$note);
                        }else{
                            $errors['err']='Problems marking the the ticket overdue. Try again';
                        }
                    }
                    break;
                case 'banemail':
                    if(!$thisuser->isadmin() && !$thisuser->canManageBanList()){
                        $errors['err']='Perm. Denied. You are not allowed to ban emails';
                    }elseif(Banlist::add($ticket->getEmail(),$thisuser->getName())){
                        $msg=$trl->_t('TEXT_EMAIL_ADDED_TO_BANLIST',$ticket->getEmail());;
                        if($ticket->isOpen() && $ticket->close()) {
                            $msg.=$trl->_t('TEXT_AND_TICKET_STATUS_SET_TO_CLOSED');
                            $ticket->logActivity('Ticket Closed',$msg);
                            $page=$ticket=null; //Going back to main listing.
                        }
                    }else{
                        $errors['err']='Unable to add the email to banlist';
                    }
                    break;
                case 'unbanemail':
                    if(!$thisuser->isadmin() && !$thisuser->canManageBanList()){
                        $errors['err']='Perm. Denied. You are not allowed to remove emails from banlist.';
                    }elseif(Banlist::remove($ticket->getEmail())){
                        $msg=$trl->_t('TEXT_EMAIL_REMOVED_FROM_BANLIST');
                    }else{
                        $errors['err']='Unable to remove the email from banlist. Try again.';
                    }
                    break;
                case 'delete': // Dude what are you trying to hide? bad customer support??
                    if(!$thisuser->isadmin() && !$thisuser->canDeleteTickets()){
                        $errors['err']='Perm. Denied. You are not allowed to DELETE tickets!!';
                    }else{
                        if($ticket->delete()){
                            $page='tickets.inc.php'; //ticket is gone...go back to the listing.
                            $msg=$trl->_t('TEXT_TICKET_DELETED_FOREVER');
                            $ticket=null; //clear the object.
                        }else{
                            $errors['err']='Problems deleting the ticket. Try again';
                        }
                    }
                    break;
                default:
                    $errors['err']='You must select action to perform';
            endswitch;
            break;
        default:
            $errors['err']='Unknown action';
        endswitch;
        if($ticket && is_object($ticket))
            $ticket->reload();//Reload ticket info following post processing
    }elseif($_POST['a']) {
        switch($_POST['a']) {
            case 'mass_process':
                if(!$thisuser->canManageTickets())
                    $errors['err']='You do not have permission to mass manage tickets. Contact admin for such access';    
                elseif(!$_POST['tids'] || !is_array($_POST['tids']))
                    $errors['err']='No tickets selected. You must select at least one ticket.';
                elseif(($_POST['reopen'] || $_POST['close']) && !$thisuser->canCloseTickets())
                    $errors['err']='You do not have permission to close/reopen tickets';
                elseif($_POST['delete'] && !$thisuser->canDeleteTickets())
                    $errors['err']='You do not have permission to delete tickets';
                elseif(!$_POST['tids'] || !is_array($_POST['tids']))
                    $errors['err']='You must select at least one ticket';
        
                if(!$errors) {
                    $count=count($_POST['tids']);
                    if(isset($_POST['reopen'])){
                        $i=0;
                        $note='Ticket reopened by '.$thisuser->getName();
                        foreach($_POST['tids'] as $k=>$v) {
                            $t = new Ticket($v);
                            if($t && @$t->reopen()) {
                                $i++;
                                $t->logActivity('Ticket Reopened',$note,false,'System');
                            }
                        }
                        $msg=$trl->_t('TEXT_OF_SELECTED_TICKETS_REOPENED',array($i,$count));
                    }elseif(isset($_POST['close'])){
                        $i=0;
                        $note='Ticket closed without response by '.$thisuser->getName();
                        foreach($_POST['tids'] as $k=>$v) {
                            $t = new Ticket($v);
                            if($t && @$t->close()){ 
                                $i++;
                                $t->logActivity('Ticket Closed',$note,false,'System');
                            }
                        }
                        $msg=$trl->_t('TEXT_OF_SELECTED_TICKETS_CLOSED',array($i,$count));
                    }elseif(isset($_POST['overdue'])){
                        $i=0;
                        $note='Ticket flagged as overdue by '.$thisuser->getName();
                        foreach($_POST['tids'] as $k=>$v) {
                            $t = new Ticket($v);
                            if($t && !$t->isoverdue())
                                if($t->markOverdue()) { 
                                    $i++;
                                    $t->logActivity('Ticket Marked Overdue',$note,false,'System');
                                }
                        }
                        $$msg=$trl->_t('TEXT_OF_SELECTED_TICKETS_MARKED_OVERDUE',array($i,$count));
                    }elseif(isset($_POST['delete'])){
                        $i=0;
                        foreach($_POST['tids'] as $k=>$v) {
                            $t = new Ticket($v);
                            if($t && @$t->delete()) $i++;
                        }
                        $msg=$trl->_t('TEXT_OF_SELECTED_TICKETS_DELETED',array($i,$count));
                    }
                }
                break;
            case 'open':
                $ticket=null;
                //TODO: check if the user is allowed to create a ticet.
                if(($ticket=Ticket::create_by_staff($_POST,$errors))) {
                    $ticket->reload();
                    $msg=$trl->_t('TEXT_TICKET_CREATED_SUCCESSFULLY');
                    if($thisuser->canAccessDept($ticket->getDeptId()) || $ticket->getStaffId()==$thisuser->getId()) {
                        //View the sucker
                        $page='viewticket.inc.php';
                    }else {
                        //Staff doesn't have access to the newly created ticket's department.
                        $page='tickets.inc.php';
                        $ticket=null;
                    }
                }elseif(!$errors['err']) {
                    $errors['err']='Unable to create the ticket. Correct the error(s) and try again';
                }
                break;
        }
    }
    $crap='';
endif;
//Navigation 
$submenu=array();
/*quick stats...*/
$sql='SELECT count(open.ticket_id) as open, count(answered.ticket_id) as answered '.
     ',count(overdue.ticket_id) as overdue, count(assigned.ticket_id) as assigned '.
     ' FROM '.TICKET_TABLE.' ticket '.
     'LEFT JOIN '.TICKET_TABLE.' open ON open.ticket_id=ticket.ticket_id AND open.status=\'open\' AND open.isanswered=0 '.
     'LEFT JOIN '.TICKET_TABLE.' answered ON answered.ticket_id=ticket.ticket_id AND answered.status=\'open\' AND answered.isanswered=1 '.
     'LEFT JOIN '.TICKET_TABLE.' overdue ON overdue.ticket_id=ticket.ticket_id AND overdue.status=\'open\' AND overdue.isoverdue=1 '.
     'LEFT JOIN '.TICKET_TABLE.' assigned ON assigned.ticket_id=ticket.ticket_id AND assigned.staff_id='.db_input($thisuser->getId());
if(!$thisuser->isAdmin()){
    $sql.=' WHERE ticket.dept_id IN('.implode(',',$thisuser->getDepts()).') OR ticket.staff_id='.db_input($thisuser->getId());
}
//echo $sql;

$stats=db_fetch_array(db_query($sql));
//print_r($stats);
$nav->setTabActive('tickets');

if($cfg->showAnsweredTickets()) {
	$desc = $trl->translate("TEXT_TOTAL_OPEN_TICKETS",($stats['open']+$stats['answered']));
	$title = $trl->translate("LABEL_OPEN_TICKETS");
    $nav->addSubMenu(array('desc'=>$desc
                            ,'title'=>$title, 'href'=>'tickets.php', 'iconclass'=>'Ticket'));
}else{
    if($stats['open'])
    	$desc = $trl->translate("TEXT_TOTAL_OPEN_TICKETS",$stats['open']);
    	$title = $trl->translate("TEXT_OPEN_TICKETS");
        $nav->addSubMenu(array('desc'=>$desc,'title'=>$title, 'href'=>'tickets.php', 'iconclass'=>'Ticket'));
    if($stats['answered']) {
    	$desc = $trl->translate("TEXT_TOTAL_ANSWERED_TICKETS",$stats['answered']);
    	$title = $trl->translate("TEXT_ANSWERED_TICKETS");
        $nav->addSubMenu(array('desc'=>$desc,
                           'title'=>$title, 'href'=>'tickets.php?status=answered', 'iconclass'=>'answeredTickets')); 
    }
}

if($stats['assigned']) {
    if(!$sysnotice && $stats['assigned']>10)
        $sysnotice=$stats['assigned'].' assigned to you!';

    $desc = $trl->translate('TEXT_TOTAL_MY_TICKETS',$stats['assigned']);
    $title = $trl->translate('LABLE_ASSIGNED_TICKETS');
    $nav->addSubMenu(array('desc'=>$desc,'title'=>$title,
                    'href'=>'tickets.php?status=assigned','iconclass'=>'assignedTickets'));
}

if($stats['overdue']) {
    $nav->addSubMenu(array('desc'=>'Overdue ('.$stats['overdue'].')','title'=>'Stale Tickets',
                    'href'=>'tickets.php?status=overdue','iconclass'=>'overdueTickets'));

    if(!$sysnotice && $stats['overdue']>10)
        $sysnotice=$stats['overdue'] .' overdue tickets!';
}

$desc = $trl->translate('LABEL_CLOSED_TICKETS');
$nav->addSubMenu(array('desc'=>$desc,'title'=>$desc, 'href'=>'tickets.php?status=closed', 'iconclass'=>'closedTickets'));


if($thisuser->canCreateTickets()) {
	$desc = $trl->translate('LABEL_NEW_TICKET');
    $nav->addSubMenu(array('desc'=>$desc,'href'=>'tickets.php?a=open','iconclass'=>'newTicket'));    
}

//Render the page...
$inc=$page?$page:'tickets.inc.php';

//If we're on tickets page...set refresh rate if the user has it configured. No refresh on search and POST to avoid repost.
if(!$_POST && $_REQUEST['a']!='search' && !strcmp($inc,'tickets.inc.php') && ($min=$thisuser->getRefreshRate())){ 
    define('AUTO_REFRESH',1);
}

require_once(STAFFINC_DIR.'header.inc.php');
require_once(STAFFINC_DIR.$inc);
require_once(STAFFINC_DIR.'footer.inc.php');
?>