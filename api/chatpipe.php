#!/usr/bin/php -q
<?php
/*********************************************************************
    chatpipe.php

    Converts piped chats to ticket. Both local and remote!

    Carlos Delfino <consultoria@carlosdelfino.eti.br>
    Copyright (c)  2009 osTicket
    http://www.full.srv.br

    Released under the GNU General Public License WITHOUT ANY WARRANTY.
    See LICENSE.TXT for details.

    vim: expandtab sw=4 ts=4 sts=4:
    $Id: chatpipe.php,v 1.1.2.2 2009/10/16 17:12:46 carlos.delfino Exp $
**********************************************************************/
@chdir(realpath(dirname(__FILE__)).'/'); //Change dir.
require('api.inc.php');
require_once(INCLUDE_DIR.'class.mailparse.php');
require_once(INCLUDE_DIR.'class.email.php');

ini_set('memory_limit', '256M'); //The concern here is having enough mem for emails with attachments.
//ini_set('allow_url_include', 1); //Allow file get contents.

//Make sure piping is enabled!
if(!$cfg->enableEmailPiping())
    api_exit(EX_UNAVAILABLE,$trl->translate('ERROR_SERVICES_NOT_AVAILABLE'));
//Get the input
$data=isset($_SERVER['HTTP_HOST'])?file_get_contents('php://input'):file_get_contents('php://stdin');
if(empty($data)){
    api_exit(EX_NOINPUT,'No data');
}
//Parse the email.
$parser= new Mail_Parse($data);
if(!$parser->decode()){ //Decode...returns false on decoding errors
    api_exit(EX_NOINPUT,$trl->translate('ERROR_EMAIL_PARSE_FAILED').'['.$parser->getError()."]\n\n".$data);    
}

//Check from address. make sure it is not a banned address.
$fromlist = $parser->getFromAddressList();

//Check for parsing errors on FROM address.
if(!$fromlist || PEAR::isError($fromlist)){
    api_exit(EX_DATAERR,$trl->translate('ERROR_INVALID_FROM_ADDRESS').' ['.$fromlist->getMessage()."]\n\n".$data);
}

//Try to figure out the email associated with the message.
$deptId=0;
$tolist = $parser->getToAddressList();
foreach ($tolist as $toaddr){
    if(($emailId=Email::getIdByEmail($toaddr->mailbox.'@'.$toaddr->host))){
        //We've found target email.
        break;
    }
}
if(!$emailId && ($cclist=$parser->getCcAddressList())) {
    foreach ($cclist as $ccaddr){
        if(($emailId=Email::getIdByEmail($ccaddr->mailbox.'@'.$ccaddr->host))){
            break;
        }
    }
}
//TODO: Options to reject emails without a matching To address in db? May be it was Bcc? Current Policy: If you pipe, we accept policy

require_once(INCLUDE_DIR.'class.ticket.php'); //We now need this bad boy!

$var=array();
$name=trim($fromlist[0]->personal,'"');
$subj=$parser->getSubject();

$var['email']=$fromlist[0]->mailbox.'@'.$fromlist[0]->host;
$var['name']=$name?$name:$var['email'];
$var['emailId']=$emailId?$emailId:$cfg->getDefaultEmailId();
$var['subject']=$subj?$subj:'[No Subject]';
$var['message']=Format::stripEmptyLines($parser->getBody());
$var['header']=$cfg->saveEmailHeaders()?$parser->getHeader():''; //TODO: Finish
$var['pri']=$cfg->useEmailPriority()?$parser->getPriority():0;
$ticlet=null;
if(ereg ("[[][#][0-9]{1,10}[]]",$var['subject'],$regs)) {
    $extid=trim(preg_replace("/[^0-9]/", "", $regs[0]));
    $ticket= new Ticket(Ticket::getIdByExtId($extid));
    //Allow mismatched emails?? For now hell NO.
    if(!is_object($ticket) || strcasecmp($ticket->getEmail(),$var['email']))
        $ticket=null;
}        
$errors=array();
$msgid=0;
if(!$ticket){ //New tickets...
    $ticket=Ticket::create($var,$errors,'email');
    if(!is_object($ticket) || $errors){
        api_exit(EX_DATAERR,$trl->translate('TEXT_CREATE_FAILED').' '.implode("\n",$errors)."\n\n");
    }
    $msgid=$ticket->getLastMsgId();
}else{
    $message=$var['message'];
    //Strip quoted reply...TODO: figure out how mail clients do it without special tag..
    if($cfg->stripQuotedReply() && ($tag=$cfg->getReplySeparator()) && strpos($var['message'],$tag))
        list($message)=split($tag,$var['message']);
    //post message....postMessage does the cleanup.
    if(!($msgid=$ticket->postMessage($message,$var['header'],'Email'))) {
        api_exit(EX_DATAERR,"post message failed \n\n $message\n");
    }
}
//Ticket created...save attachments if enabled.
$struct=$parser->getStruct();       
if($struct && $struct->parts && $cfg->allowEmailAttachments()) {                   
    for($i = 0; $i < count($struct->parts); $i++) {
        $part=$struct->parts[$i];
        if($part->disposition 
                && (!strcasecmp($part->disposition,'attachment') || !strcasecmp($part->disposition,'inline') || !strcasecmp($part->ctype_primary,'image'))){
            $filename=$part->d_parameters['filename'];
            if($filename && $cfg->canUploadFileType($filename)) {
                $ticket->saveAttachment($filename,$part->body,$msgid,'M');
            }
        }
    }
}
//print_r($var);
api_exit(EX_SUCCESS);
?>
