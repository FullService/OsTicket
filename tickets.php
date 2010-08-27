<?php
/*********************************************************************
    tickets.php

    Main client/user interface.
    Note that we are using external ID. The real (local) ids are hidden from user.

    Peter Rotich <peter@osticket.com>
    Copyright (c)  2006-2010 osTicket
    http://www.osticket.com

    Released under the GNU General Public License WITHOUT ANY WARRANTY.
    See LICENSE.TXT for details.

    vim: expandtab sw=4 ts=4 sts=4:
    $Id: $
**********************************************************************/
require('secure.inc.php');
if(!is_object($thisclient) || !$thisclient->isValid()) die('Access denied'); //Double check again.

require_once(INCLUDE_DIR.'class.ticket.php');
$ticket=null;
$inc='tickets.inc.php'; //Default page...show all tickets.
//Check if any id is given...
if(($id=$_REQUEST['id']?$_REQUEST['id']:$_POST['ticket_id']) && is_numeric($id)) {
    //id given fetch the ticket info and check perm.
    $ticket= new Ticket(Ticket::getIdByExtId((int)$id));
    if(!$ticket or !$ticket->getEmail()) {
        $ticket=null; //clear.
        $errors['err']=$trl->translate('ERROR_ACCESS_DENIED_INVALID_TICKET');
    }elseif(strcasecmp($thisclient->getEmail(),$ticket->getEmail())){
        $errors['err']=$trl->translate('ERROR_SECURITY_VIOLATION_YOUR_ACCOUNT_WILL_LOCKED');
        $ticket=null; //clear.
    }else{
        //Everything checked out.
        $inc='viewticket.inc.php';
    }
}
//Process post...depends on $ticket object above.
if($_POST && is_object($ticket) && $ticket->getId()):
    $errors=array();
    switch(strtolower($_POST['a'])){
    case 'postmessage':
        if(strcasecmp($thisclient->getEmail(),$ticket->getEmail())) { //double check perm again!
            $errors['err']=$trl->translate('ERROR_ACCESS_DENIED_INVALID_TICKET');
            $inc='tickets.inc.php'; //Show the tickets.               
        }

        if(!$_POST['message'])
            $errors['message']=$trl->translate('ERROR_MESSAGE_REQUIRED');
        //check attachment..if any is set
        if($_FILES['attachment']['name']) {
            if(!$cfg->allowOnlineAttachments()) //Something wrong with the form...user shouldn't have an option to attach
            	$errors['attachment']=$trl->translate('TEXT_FILE_REJECTED',$_FILES['attachment']['name']);           
            elseif(!$cfg->canUploadFileType($_FILES['attachment']['name']))
                $errors['attachment']=$trl->translate('TEXT_INVALID_FILE_TYPE',$_FILES['attachment']['name']);
            elseif($_FILES['attachment']['size']>$cfg->getMaxFileSize())
                $errors['attachment']=$trl->translate('TEXT_FILE_IS_TOO_BIG',$cfg->getMaxFileSize()); 
        }
                    
        if(!$errors){
            //Everything checked out...do the magic.
            if(($msgid=$ticket->postMessage($_POST['message'],'Web'))) {
                if($_FILES['attachment']['name'] && $cfg->canUploadFiles() && $cfg->allowOnlineAttachments())
                    $ticket->uploadAttachment($_FILES['attachment'],$msgid,'M');
                    
                $msg=$trl->translate('TEXT_MESSAGE_POSTED_SUCESSFULY');
            }else{
                $errors['err']=$trl->translate('ERROR_UNABLE_TO_POST_MESSAGE');
            }
        }else{
            $errors['err']=$errors['err']?$errors['err']:$trl->translate('ERROR_OCCURED_TRY_AGAIN');
        }
        break;
    default:
        $errors['err']=$trl->translate('ERROR_UNKNOW_ACTION');
    }
    $ticket->reload();
endif;
include(CLIENTINC_DIR.'header.inc.php');
include(CLIENTINC_DIR.$inc);
include(CLIENTINC_DIR.'footer.inc.php');
?>
