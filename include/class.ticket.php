<?php
/*********************************************************************
    class.ticket.php

    The most important class! Don't play with fire please.

    Peter Rotich <peter@osticket.com>
    Copyright (c)  2006-2010 osTicket
    http://www.osticket.com

    Released under the GNU General Public License WITHOUT ANY WARRANTY.
    See LICENSE.TXT for details.

    vim: expandtab sw=4 ts=4 sts=4:
    $Id: $
**********************************************************************/
include_once(INCLUDE_DIR.'class.staff.php');
include_once(INCLUDE_DIR.'class.email.php');
include_once(INCLUDE_DIR.'class.dept.php');
include_once(INCLUDE_DIR.'class.topic.php');
include_once(INCLUDE_DIR.'class.lock.php');
include_once(INCLUDE_DIR.'class.banlist.php');


class Ticket{

    var $id;
    var $extid;
    var $email;
    var $status;
    var $created;
    var $updated;
    var $lastrespdate;
    var $lastmsgdate;
    var $duedate;
    var $priority;
    var $priority_id;
    var $fullname;
    var $staff_id;
    var $dept_id;
    var $topic_id;
    var $dept_name;
    var $subject;
    var $helptopic;
    var $overdue;

    var $lastMsgId;
    
    var $dept;  //Dept class
    var $staff; //Staff class
    var $topic; //Topic class
    var $tlock; //TicketLock class
    
    function Ticket($id,$exid=false){
        $this->load($id);
    }
    
    function load($id) {
       
       
        $sql =' SELECT  ticket.*,topic.topic_id as topicId,lock_id,dept_name,priority_desc FROM '.TICKET_TABLE.' ticket '.
              ' LEFT JOIN '.DEPT_TABLE.' dept ON ticket.dept_id=dept.dept_id '.
              ' LEFT JOIN '.TICKET_PRIORITY_TABLE.' pri ON ticket.priority_id=pri.priority_id '.
              ' LEFT JOIN '.TOPIC_TABLE.' topic ON ticket.topic_id=topic.topic_id '.
              ' LEFT JOIN '.TICKET_LOCK_TABLE.' tlock ON ticket.ticket_id=tlock.ticket_id AND tlock.expire>NOW() '.
              ' WHERE ticket.ticket_id='.db_input($id); 
        //echo $sql;
        if(($res=db_query($sql)) && db_num_rows($res)):
            $row=db_fetch_array($res);
            $this->id       =$row['ticket_id'];
            $this->extid    =$row['ticketID'];
            $this->email    =$row['email'];
            $this->fullname =$row['name'];
            $this->status   =$row['status'];
            $this->created  =$row['created'];
            $this->updated  =$row['updated'];
            $this->duedate  =$row['duedate'];
            $this->closed   =$row['closed'];
            $this->lastmsgdate  =$row['lastmessagedate'];
            $this->lastrespdate  =$row['lastresponsedate'];
            $this->lock_id  =$row['lock_id'];
            $this->priority_id=$row['priority_id'];
            $this->priority=$row['priority_desc'];
            $this->staff_id =$row['staff_id'];
            $this->dept_id  =$row['dept_id'];
            $this->topic_id  =$row['topicId']; //Note that we're actually joining the topic table to make the topic is not deleted (long story!).
            $this->dept_name    =$row['dept_name'];
            $this->subject =$row['subject'];
            $this->helptopic =$row['helptopic'];
            $this->overdue =$row['isoverdue'];
            $this->row=$row;
            //Reset the sub classes (initiated ondemand)...good for reloads.
            $this->staff=array();
            $this->dept=array();
            return true;
        endif;
        return false;
    }
        
    function reload() {
        return $this->load($this->id);
    }
    
    function isOpen(){
        return (strcasecmp($this->getStatus(),'Open')==0)?true:false;
    }

    function isClosed() {
        return (strcasecmp($this->getStatus(),'Closed')==0)?true:false;
    }

    function isAssigned() {
        return $this->getStaffId()?true:false;
    }

    function isOverdue() {
        return $this->overdue?true:false;
    }
    
    function isLocked() {
        return $this->lock_id?true:false;
    }
     
    //GET
    function getId(){
        return  $this->id;
    }

    function getExtId(){
        return  $this->extid;
    }
   
    function getEmail(){
        return $this->email;
    }

    function getName(){
        return $this->fullname;
    }

    function getSubject() {
        return $this->subject;
    }

    function getHelpTopic() {
        if($this->topic_id && ($topic=$this->getTopic()))
            return $topic->getName();
            
        return $this->helptopic;
    }
   
    function getCreateDate(){
        return $this->created;
    }    
    
    function getUpdateDate(){
        return $this->updated;
    }

    function getDueDate(){
        return $this->duedate;
    }

    function getCloseDate(){
        return $this->closed;
    }

    function getStatus(){
        return $this->status;
    }
   
    function getDeptId(){
       return $this->dept_id;
    }
   
    function getDeptName(){
       return $this->dept_name;
    }

    function getPriorityId() {
        return $this->priority_id;
    }
    
    function getPriority() {
        return $this->priority;
    }
     
    function getPhone() {
        return $this->row['phone'];
    }

    function getPhoneExt() {
        return $this->row['phone_ext'];
    }

    function getPhoneNumber(){
        $phone=Format::phone($this->getPhone());
        if(($ext=$this->getPhoneExt()))
            $phone.=" $ext";

        return $phone;
    }

    function getSource() {
        return $this->row['source'];
    }
    
    function getIP() {
        return $this->row['ip_address'];
    }
    
    function getLock(){
        
        if(!$this->tlock && $this->lock_id)
            $this->tlock= new TicketLock($this->lock_id);
        
        return $this->tlock;
    }
    
    function acquireLock() {
        global $thisuser,$cfg;
       
        if(!$thisuser or !$cfg->getLockTime()) //Lockig disabled?
            return null;

        //Check if the ticket is already locked.
        if(($lock=$this->getLock()) && !$lock->isExpired()) {
            if($lock->getStaffId()!=$thisuser->getId()) //someone else locked the ticket.
                return null;
            //Lock already exits...renew it
            $lock->renew(); //New clock baby.
            
            return $lock;
        }
        //No lock on the ticket or it is expired
        $this->tlock=null; //clear crap
        $this->lock_id=TicketLock::acquire($this->getId(),$thisuser->getId()); //Create a new lock..
        //load and return the newly created lock if any!
        return $this->getLock();
    }
    
    function getDept(){
        
        if(!$this->dept && $this->dept_id)
            $this->dept= new Dept($this->dept_id);
        return $this->dept;
    }
    
    function getStaffId(){
        return $this->staff_id;
    }

    function getStaff(){

        if(!$this->staff && $this->staff_id)
            $this->staff= new Staff($this->staff_id);
        return $this->staff;
    }

    function getTopicId(){
        return $this->topic_id;
    }

    function getTopic(){

        if(!$this->topic && $this->topic_id)
            $this->topic= new Topic($this->topic_id);

        return $this->topic;
    }

    function getLastRespondent() {

        $sql ='SELECT  resp.staff_id FROM '.TICKET_RESPONSE_TABLE.' resp LEFT JOIN '.STAFF_TABLE. ' USING(staff_id) '.
            ' WHERE  resp.ticket_id='.db_input($this->getId()).' AND resp.staff_id>0  ORDER BY resp.created DESC LIMIT 1';
        $res=db_query($sql);
        if($res && db_num_rows($res))
            list($id)=db_fetch_row($res);

        return ($id)?new Staff($id):null;

    }

    function getLastMessageDate() {


        if($this->lastmsgdate)
            return $this->lastmsgdate;

        //for old versions...
        $createDate=0;
        $sql ='SELECT created FROM '.TICKET_MESSAGE_TABLE.' WHERE ticket_id='.db_input($this->getId()).' ORDER BY created DESC LIMIT 1';
        if(($res=db_query($sql)) && db_num_rows($res))
            list($createDate)=db_fetch_row($res);

        return $createDate;
    }

    function getLastResponseDate() {

               
        if($this->lastrespdate)
            return $this->lastrespdate;

        $createDate=0;
        $sql ='SELECT created FROM '.TICKET_RESPONSE_TABLE.' WHERE ticket_id='.db_input($this->getId()).' ORDER BY created DESC LIMIT 1';
        if(($res=db_query($sql)) && db_num_rows($res))
            list($createDate)=db_fetch_row($res);

        return $createDate;
    }

    function getRelatedTicketsCount(){

        $num=0;
        $sql='SELECT count(*)  FROM '.TICKET_TABLE.' WHERE email='.db_input($this->getEmail());
        if(($res=db_query($sql)) && db_num_rows($res))
            list($num)=db_fetch_row($res);

        return $num;
    }

    function getLastMsgId() {
        return $this->lastMsgId;
    }

    //SET

    function setLastMsgId($msgid) {
        return $this->lastMsgId=$msgid;
    }
    function setPriority($priority_id){
        
        if(!$priority_id) 
            return false;
        
        $sql='UPDATE '.TICKET_TABLE.' SET priority_id='.db_input($priority_id).',updated=NOW() WHERE ticket_id='.db_input($this->getId());
        if(db_query($sql) && db_affected_rows($res)){
           //TODO: escalate the ticket params??
            return true;
        }
        return false;

    }
    //DeptId can NOT be 0. No orphans please!
    function setDeptId($deptId){
        
        if(!$deptId)
            return false;
        
        $sql= 'UPDATE '.TICKET_TABLE.' SET dept_id='.db_input($deptId).' WHERE ticket_id='.db_input($this->getId());
        return (db_query($sql) && db_affected_rows())?true:false;
    }
 
    //set staff ID...assign/unassign/release (staff id can be 0)
    function setStaffId($staffId){
      $sql= 'UPDATE '.TICKET_TABLE.' SET staff_id='.db_input($staffId).' WHERE ticket_id='.db_input($this->getId());
      return (db_query($sql)  && db_affected_rows())?true:false;
    }


    //Status helper.
    function setStatus($status){

        if(strcasecmp($this->getStatus(),$status)==0)
            return true; //No changes needed.

        switch(strtolower($status)):
        case 'reopen':
        case 'open':
            return $this->reopen();
            break;
        case 'close':
            return $this->close();
         break;
        endswitch;

        return false;
    }

    function setAnswerState($isanswered) {
        db_query('UPDATE '.TICKET_TABLE.' SET isanswered='.db_input($isanswered).' WHERE ticket_id='.db_input($this->getId()));
    }

    //Close the ticket
    function close(){
        
        $sql= 'UPDATE '.TICKET_TABLE.' SET status='.db_input('closed').',staff_id=0,isoverdue=0,duedate=NULL,updated=NOW(),closed=NOW() '.
              ' WHERE ticket_id='.db_input($this->getId());
        return (db_query($sql) && db_affected_rows())?true:false;
    }
    //set status to open on a closed ticket.
    function reopen($isanswered=0){
        global $thisuser;
        $sql= 'UPDATE '.TICKET_TABLE.' SET status='.db_input('open').',isanswered=0,updated=NOW(),reopened=NOW() WHERE ticket_id='.db_input($this->getId());
        return (db_query($sql) && db_affected_rows())?true:false;
    }


    //TODO: Move alerts here (need PHP 5 for protected fnc)...and add stats collection...for now we are simply doing house cleaning and syncs
    function onResponse(){
        db_query('UPDATE '.TICKET_TABLE.' SET isanswered=1,lastresponse=NOW(), updated=NOW() WHERE ticket_id='.db_input($this->getId()));
    }

    function onMessage(){
        db_query('UPDATE '.TICKET_TABLE.' SET isanswered=0,lastmessage=NOW() WHERE ticket_id='.db_input($this->getId()));
    }

    function onNote(){

    }

    function onOverdue() {

    }

    //Replace base variables.
    function replaceTemplateVars($text){
        global $cfg;

        $dept = $this->getDept();
        $staff= $this->getStaff();

        $search = array('/%id/','/%ticket/','/%email/','/%name/','/%subject/','/%topic/','/%phone/','/%status/','/%priority/',
                        '/%dept/','/%assigned_staff/','/%createdate/','/%duedate/','/%closedate/','/%url/');
        $replace = array($this->getId(),
                         $this->getExtId(),
                         $this->getEmail(),
                         $this->getName(),
                         $this->getSubject(),
                         $this->getHelpTopic(),
                         $this->getPhoneNumber(),
                         $this->getStatus(),
                         $this->getPriority(),
                         ($dept?$dept->getName():''),
                         ($staff?$staff->getName():''),
                         Format::db_daydatetime($this->getCreateDate()),
                         Format::db_daydatetime($this->getDueDate()),
                         Format::db_daydatetime($this->getCloseDate()),
                         $cfg->getBaseUrl());
        return preg_replace($search,$replace,$text);
    }




    function markUnAnswered() {
        $this->setAnswerState(0);
    }

    function markAnswered(){
        $this->setAnswerState(1);
    }

    function markOverdue($bitch=false) {
        global $cfg;

        if($this->isOverdue())
            return true;

        $sql= 'UPDATE '.TICKET_TABLE.' SET isoverdue=1,updated=NOW() WHERE ticket_id='.db_input($this->getId());
        if(db_query($sql) && db_affected_rows()) {
            //echo $sql;
            $dept=$this->getDept();

            if(!$dept || !($tplId=$dept->getTemplateId()))
                $tplId=$cfg->getDefaultTemplateId();
         
            //if requested && enabled fire nasty alerts.
            if($bitch && $cfg->alertONOverdueTicket()){
                $sql='SELECT ticket_overdue_subj,ticket_overdue_body FROM '.EMAIL_TEMPLATE_TABLE.
                     ' WHERE cfg_id='.db_input($cfg->getId()).' AND tpl_id='.db_input($tplId);
                if(($resp=db_query($sql)) && db_num_rows($resp) && list($subj,$body)=db_fetch_row($resp)){

                    $body=$this->replaceTemplateVars($body);
                    $subj=$this->replaceTemplateVars($subj);

                    if(!($email=$cfg->getAlertEmail()))
                        $email=$cfg->getDefaultEmail();

                    if($email && $email->getId()) {
                        //Fire and email to admin. No questions asked.
                        $alert = str_replace("%staff",'Admin',$body);
                        $email->send($cfg->getAdminEmail(),$subj,$alert);

                        /*** Build list of recipients and fire the alerts ***/
                        $recipients=array();
                        //Assigned staff... if any
                        if($this->isAssigned() && $cfg->alertAssignedONOverdueTicket()){
                            $recipients[]=$this->getStaff();
                        }elseif($cfg->alertDeptMembersONOverdueTicket()){ //Alert assigned or dept members not both
                            //All dept members.
                            $sql='SELECT staff_id FROM '.STAFF_TABLE.' WHERE dept_id='.db_input($dept->getId());
                            if(($users=db_query($sql)) && db_num_rows($users)) {
                                while(list($id)=db_fetch_row($users))
                                    $recipients[]= new Staff($id);     //possible mem issues with a large number of staff?
                            }
                        }
                        //Always blame the manager
                        if($cfg->alertDeptManagerONOverdueTicket() && $dept) {
                            $recipients[]=$dept->getManager();
                        }
                        //Ok...we are ready to go....
                        $sentlist=array();
                        foreach( $recipients as $k=>$staff){
                            if(!$staff || !is_object($staff) || !$staff->isAvailable()) continue;
                            if(in_array($staff->getEmail(),$sentlist)) continue; //avoid duplicate emails.
                            $alert = str_replace("%staff",$staff->getFirstName(),$body);
                            $email->send($staff->getEmail(),$subj,$alert);
                        }
                    }
                }else {
                    Sys::log(LOG_WARNING,'Template Fetch Error',"Unable to fetch 'overdue' alert template #$tplId");
                }
            }
            return true;
        }
        return false;
    }


    //Dept Tranfer...with alert..
    function transfer($deptId){
        global $cfg;
        /*
        TODO:
            1) Figure out what to do when ticket is assigned
                Is the assignee allowed to access target dept?  (At the moment assignee will have access to the ticket anyways regardless of Dept)
            2) Send alerts to new Dept manager/members??
            3) Other crap I don't have time to think about at the moment.
        */
        return $this->setDeptId($deptId)?true:false;
    }

    //Assign: staff
    function assignStaff($staffId,$message,$alertstaff=true) {
        global $thisuser,$cfg;


        $staff = new Staff($staffId);
        if(!$staff || !$staff->isAvailable() || !$thisuser)
            return false;

        if($this->setStaffId($staff->getId())){
            //Reopen the ticket if cloed.                
            if($this->isClosed()) //Assigned ticket Must be open.
                $this->reopen();
            $this->reload(); //
            //Send Notice + Message to assignee. (if directed)
            if($alertstaff && ($thisuser && $staff->getId()!=$thisuser->getId())) { //No alerts for self assigned.
                //Send Notice + Message to assignee.
                $dept=$this->getDept();
                if(!$dept || !($tplId=$dept->getTemplateId()))
                    $tplId=$cfg->getDefaultTemplateId();

                $sql='SELECT assigned_alert_subj,assigned_alert_body FROM '.EMAIL_TEMPLATE_TABLE.
                 ' WHERE cfg_id='.db_input($cfg->getId()).' AND tpl_id='.db_input($tplId);
                if(($resp=db_query($sql)) && db_num_rows($resp) && list($subj,$body)=db_fetch_row($resp)){

                    $body=$this->replaceTemplateVars($body);
                    $subj=$this->replaceTemplateVars($subj);
                    $body = str_replace('%note',$message,$body);
                    $body = str_replace("%message", $message,$body); //Previous versions used message.
                    $body = str_replace("%assignee", $staff->getName(),$body);
                    $body = str_replace("%assigner", ($thisuser)?$thisuser->getName():'System',$body);

                    if(!($email=$cfg->getAlertEmail()))
                        $email=$cfg->getDefaultEmail();

                    if($email) {
                        $email->send($staff->getEmail(),$subj,$body);
                    }
                }else {
                    Sys::log(LOG_WARNING,'Template Fetch Error',"Unable to fetch 'assigned' alert template #$tplId");
                }
            }
            $message=$message?$message:'Ticket assigned';
            //Save the message as internal note...(record).
            $this->postNote('Ticket Assigned to '.$staff->getName(),$message,false); //Notice that we are disabling note alerts!
            return true;
        }
        return false;
    }
    //unassign
    function release(){
        global $thisuser;

        if(!$this->isAssigned()) //We can't release what is not assigned buddy!
            return true;

        return $this->setStaffId(0)?true:false;
    }

    //Insert message from client
    function postMessage($msg,$source='',$msgid=NULL,$headers='',$newticket=false){
        global $cfg;
       
        if(!$this->getId())
            return 0;
        
        //We don't really care much about the source at message level
        $source=$source?$source:$_SERVER['REMOTE_ADDR'];
        
        $sql='INSERT INTO '.TICKET_MESSAGE_TABLE.' SET created=NOW() '.
             ',ticket_id='.db_input($this->getId()).
             ',messageId='.db_input($msgid).
             ',message='.db_input(Format::striptags($msg)). //Tags/code stripped...meaning client can not send in code..etc
             ',headers='.db_input($headers). //Raw header.
             ',source='.db_input($source).
             ',ip_address='.db_input($_SERVER['REMOTE_ADDR']);
    
        if(db_query($sql) && ($msgid=db_insert_id())) {
            $this->setLastMsgId($msgid);
            $this->onMessage();
            if(!$newticket){
                //Success and the message is being appended to previously opened ticket.
                //Alerts for new tickets are sent on create.
                $dept =$this->getDept();
                //Reopen if the status is closed...
                if(!$this->isOpen()) {
                    $this->reopen();
                    //If enabled..auto-assign the ticket to last respondent...if they still have access to the Dept.
                    if($cfg->autoAssignReopenedTickets() && ($lastrep=$this->getLastRespondent())) {
                        //3 months elapsed time limit on auto-assign. Must be available and have access to Dept.
                        if($lastrep->isAvailable() && $lastrep->canAccessDept($this->getDeptId()) 
                                && (time()-strtotime($this->getLastResponseDate()))<=90*24*3600) {
                            $this->setStaffId($lastrep->getId()); //Direct Re-assign!!!!????
                        }
                        //TODO: Worry about availability...may be lastlogin also? send an alert??
                    }
                }

                //get the template ID
                if(!$dept || !($tplId=$dept->getTemplateId()))
                    $tplId=$cfg->getDefaultTemplateId();
               
                
                $autorespond=true; //if anabled.
                //See if the incoming email is local - no autoresponse.
                if(Email::getIdByEmail($this->getEmail())) //Loop control---mainly for emailed tickets.
                    $autorespond=false;
                elseif(strpos(strtolower($var['email']),'mailer-daemon@')!==false || strpos(strtolower($var['email']),'postmaster@')!==false)
                    $autorespond=false;

                //TODO: check how many messages haven't been answered...

                //If enabled...send confirmation to user. ( New Message AutoResponse)
                if($autorespond && $cfg->autoRespONNewMessage() && $dept && $dept->autoRespONNewMessage()){
                     
                    $sql='SELECT message_autoresp_subj,message_autoresp_body FROM '.EMAIL_TEMPLATE_TABLE.
                         ' WHERE cfg_id='.db_input($cfg->getId()).' AND tpl_id='.db_input($tplId);
                    if(($resp=db_query($sql)) && db_num_rows($resp) && list($subj,$body)=db_fetch_row($resp)){
                    
                        $body=$this->replaceTemplateVars($body);
                        $subj=$this->replaceTemplateVars($subj);
                        $body = str_replace('%signature',($dept && $dept->isPublic())?$dept->getSignature():'',$body);
                        //Reply separator tag.
                        if($cfg->stripQuotedReply() && ($tag=$cfg->getReplySeparator()))
                            $body ="\n$tag\n\n".$body;
                        
                        if(!$dept || !($email=$dept->getAutoRespEmail()))
                            $email=$cfg->getDefaultEmail();

                        if($email) {
                            $email->send($this->getEMail(),$subj,$body);
                        }

                    }else {
                        Sys::log(LOG_WARNING,'Template Fetch Error',"Unable to fetch 'new message' auto response template #$tplId");
                    }
                }
                //If enabled...send alert to staff (New Message Alert)
                if($cfg->alertONNewMessage()){
                    $sql='SELECT message_alert_subj,message_alert_body FROM '.EMAIL_TEMPLATE_TABLE.
                         ' WHERE cfg_id='.db_input($cfg->getId()).' AND tpl_id='.db_input($tplId);

                    $resp=db_query($sql);
                    if(($resp=db_query($sql)) && db_num_rows($resp) && list($subj,$body)=db_fetch_row($resp)){

                        $body=$this->replaceTemplateVars($body);
                        $subj=$this->replaceTemplateVars($subj);
                        $body = str_replace("%message", $msg,$body);

                        if(!($email=$cfg->getAlertEmail()))
                            $email =$cfg->getDefaultEmail();
                    
                        if($email && $email->getId()) {
                            //Build list of recipients and fire the alerts.
                            $recipients=array();
                            //Last respondent.
                            if($cfg->alertLastRespondentONNewMessage() || $cfg->alertAssignedONNewMessage())
                                $recipients[]=$this->getLastRespondent();
                            //Assigned staff if any...could be the last respondent
                            if($this->isAssigned())
                                $recipients[]=$this->getStaff();
                            //Dept manager
                            if($cfg->alertDeptManagerONNewMessage() && $dept)
                                $recipients[]=$dept->getManager();
                    
                            //Baby we are ready...take me
                            $sentlist=array(); //I know it sucks...but..it works.
                            foreach( $recipients as $k=>$staff){
                                //TODO: log error messages.
                                if(!$staff || !is_object($staff) || !$staff->getEmail() || !$staff->isAvailable()) continue;
                                if(in_array($staff->getEmail(),$sentlist)) continue; //avoid duplicate emails.
                                $alert = str_replace("%staff",$staff->getFirstName(),$body);
                                $email->send($staff->getEmail(),$subj,$alert);
                                $sentlist[]=$staff->getEmail();
                            }
                        }
                    }else {
                        Sys::log(LOG_WARNING,'Template Fetch Error',"Unable to fetch 'new message' alert template #$tplId");
                    }
                }

            }
        } 
        return $msgid;
    }

    //Insert Staff Reply
    function postResponse($msgid,$response,$signature='none',$attachment=false,$canalert=true){
        global $thisuser,$cfg;

        if(!$thisuser || !$thisuser->getId() || !$thisuser->isStaff()) //just incase
            return 0;

    
        $sql= 'INSERT INTO '.TICKET_RESPONSE_TABLE.' SET created=NOW() '.
                ',ticket_id='.db_input($this->getId()).
                ',msg_id='.db_input($msgid).
                ',response='.db_input(Format::striptags($response)).
                ',staff_id='.db_input($thisuser->getId()).
                ',staff_name='.db_input($thisuser->getName()).
                ',ip_address='.db_input($thisuser->getIP());
        $resp_id=0;
        //echo $sql;
        if(db_query($sql) && ($resp_id=db_insert_id())):
            $this->onResponse(); //do house cleaning..
            if(!$canalert) //No alert/response 
                return $resp_id;
                
            $dept=$this->getDept();
            if(!$dept || !($tplId=$dept->getTemplateId()))
                $tplId=$cfg->getDefaultTemplateId();

            //Send Response to client...based on the template...
            //TODO: check department level templates...if set.
            $sql='SELECT ticket_reply_subj,ticket_reply_body FROM '.EMAIL_TEMPLATE_TABLE.
                ' WHERE cfg_id='.db_input($cfg->getId()).' AND tpl_id='.db_input($tplId);
            if(($resp=db_query($sql)) && db_num_rows($resp) && list($subj,$body)=db_fetch_row($resp)){

                $body=$this->replaceTemplateVars($body);
                $subj=$this->replaceTemplateVars($subj);
                $body = str_replace('%response',$response,$body);
                //$body = str_replace('%message',$response,$body); //Previously used!
                
                //Figure out the signature to use...if any.
                switch(strtolower($signature)):
                case 'mine';
                $signature=$thisuser->getSignature();
                break;
                case 'dept':
                $signature=($dept && $dept->isPublic())?$dept->getSignature():''; //make sure it is public
                break;
                case 'none';
                default:
                $signature='';
                break;
                endswitch;
                $body = str_replace("%signature",$signature,$body);
                
                //Email attachment when attached AND if emailed attachments are allowed!
                $file=null;
                if(($attachment && is_file($attachment['tmp_name'])) && $cfg->emailAttachments()) {
                    $file=array('file'=>$attachment['tmp_name'], 'name'=>$attachment['name'], 'type'=>$attachment['type']);
                }
                
                if($cfg->stripQuotedReply() && ($tag=$cfg->getReplySeparator()))
                    $body ="\n$tag\n\n".$body;

                if(!$dept || !($email=$dept->getEmail()))
                    $email =$cfg->getDefaultEmail();

                if($email && $email->getId()) {
                    $email->send($this->getEmail(),$subj,$body,$file);
                }
            }else{
                //We have a big problem...alert admin...
                $msg='Problems fetching response template for ticket#'.$this->getId().' Possible config error - template #'.$tplId;
                Sys::alertAdmin('System Error',$msg);
            }
            return $resp_id;
        endif;
        
        return 0;
    }

    //Activity log - saved as internal notes WHEN enabled!!
    function logActivity($title,$note){
        global $cfg;

        if(!$cfg || !$cfg->logTicketActivity())
            return 0;

        return $this->postNote($title,$note,false,'system');
    }

    //Insert Internal Notes 
    function postNote($title,$note,$alert=true,$poster='') {        
        global $thisuser,$cfg;

        $sql= 'INSERT INTO '.TICKET_NOTE_TABLE.' SET created=NOW() '.
                ',ticket_id='.db_input($this->getId()).
                ',title='.db_input(Format::striptags($title)).
                ',note='.db_input(Format::striptags($note)).
                ',staff_id='.db_input($thisuser?$thisuser->getId():0).
                ',source='.db_input(($poster || !$thisuser)?$poster:$thisuser->getName());
        //echo $sql;
        if(db_query($sql) && ($id=db_insert_id())) {
            //If enabled...send alert to staff (Internal Note Alert)
            if($alert && $cfg->alertONNewNote()){
                $dept=$this->getDept();
                if(!$dept || !($tplId=$dept->getTemplateId()))
                    $tplId=$cfg->getDefaultTemplateId();

                $sql='SELECT note_alert_subj,note_alert_body FROM '.EMAIL_TEMPLATE_TABLE.
                     ' WHERE cfg_id='.db_input($cfg->getId()).' AND tpl_id='.db_input($tplId);
                if(($resp=db_query($sql)) && db_num_rows($resp) && list($subj,$body)=db_fetch_row($resp)){
                    $body=$this->replaceTemplateVars($body);
                    $subj=$this->replaceTemplateVars($subj);
                    $body = str_replace('%note',"$title\n\n$note",$body);

                    if(!($email=$cfg->getAlertEmail()))
                        $email =$cfg->getDefaultEmail();
                    
                    if($email && $email->getId()) {
                        //Build list of recipients and fire the alerts.
                        $recipients=array();
                        //Last respondent.
                        if($cfg->alertLastRespondentONNewNote() || $cfg->alertAssignedONNewNote())
                            $recipients[]=$this->getLastRespondent();
                        //Assigned staff if any...could be the last respondent
                        if($this->isAssigned())
                            $recipients[]=$this->getStaff();
                        //Dept manager
                        if($cfg->alertDeptManagerONNewNote() && $dept)
                            $recipients[]=$dept->getManager();
                    
                        $sentlist=array(); //I know it sucks...but..it works.
                        foreach( $recipients as $k=>$staff){
                            //TODO: log error messages.
                            if(!$staff || !is_object($staff) || !$staff->getEmail() || !$staff->isAvailable()) continue;
                            if(in_array($staff->getEmail(),$sentlist) || ($thisuser && $thisuser->getId()==$staff->getId())) continue; 
                            $alert = str_replace('%staff',$staff->getFirstName(),$body);
                            $email->send($staff->getEmail(),$subj,$alert);
                            $sentlist[]=$staff->getEmail();
                        }
                    }
                }else {
                    Sys::log(LOG_WARNING,'Template Fetch Error',"Unable to fetch 'new note' alert template #$tplId");
                }
                    
            }
        }
        return $id;
    }


    //online based attached files.
    function uploadAttachment($file,$refid,$type){
        global $cfg;
     
        if(!$file['tmp_name'] || !$refid || !$type)
            return 0;
        
        $dir=$cfg->getUploadDir();
        $rand=Misc::randCode(16);
        $file['name']=Format::file_name($file['name']);
        $month=date('my',strtotime($this->getCreateDate()));

        //try creating the directory if it doesn't exists.
        if(!file_exists(rtrim($dir,'/').'/'.$month))
            @mkdir(rtrim($dir,'/').'/'.$month,0777);

        if(is_writable(rtrim($dir,'/').'/'.$month))
            $filename=sprintf("%s/%s/%s_%s",rtrim($dir,'/'),$month,$rand,$file['name']);
        else
            $filename=sprintf("%s/%s_%s",rtrim($dir,'/'),$rand,$file['name']);

        if(move_uploaded_file($file['tmp_name'],$filename)){
            $sql ='INSERT INTO '.TICKET_ATTACHMENT_TABLE.' SET created=NOW() '.
                  ',ticket_id='.db_input($this->getId()).
                  ',ref_id='.db_input($refid).
                  ',ref_type='.db_input($type).
                  ',file_size='.db_input($file['size']).
                  ',file_name='.db_input($file['name']).
                  ',file_key='.db_input($rand);
            if(db_query($sql) && ($id=db_insert_id()))
                return $id;
            //DB  insert failed!--remove the file..
            @unlink($filename);
        }
        return 0;
    }
    
    //incoming email or json/xml bases attachments.
    function saveAttachment($name,$data,$refid,$type){
       global $cfg;
        
        if(!$refid ||!$name || !$data)
            return 0;

        $dir=$cfg->getUploadDir();
        $rand=Misc::randCode(16);
        $name=Format::file_name($name);
        $month=date('my',strtotime($this->getCreateDate()));

        //try creating the directory if it doesn't exists.
        if(!file_exists(rtrim($dir,'/').'/'.$month))
            @mkdir(rtrim($dir,'/').'/'.$month,0777);

        if(is_writable(rtrim($dir,'/').'/'.$month))
            $filename=sprintf("%s/%s/%s_%s",rtrim($dir,'/'),$month,$rand,$name);
        else
            $filename=rtrim($dir,'/').'/'.$rand.'_'.$name;

        if(($fp=fopen($filename,'w'))) {
            fwrite($fp,$data);
            fclose($fp);
            $size=@filesize($filename);
            $sql ='INSERT INTO '.TICKET_ATTACHMENT_TABLE.' SET created=NOW() '.
                  ',ticket_id='.db_input($this->getId()).
                  ',ref_id='.db_input($refid).
                  ',ref_type='.db_input($type).
                  ',file_size='.db_input($size).
                  ',file_name='.db_input($name).
                  ',file_key='.db_input($rand);
            if(db_query($sql) && ($id=db_insert_id())) 
                return $id;

             @unlink($filename); //insert failed...remove the link.
        }
        return 0;
    }

    function delete(){
        
        
        if(db_query('DELETE FROM '.TICKET_TABLE.' WHERE ticket_id='.$this->getId()) && db_affected_rows()):
            db_query('DELETE FROM '.TICKET_MESSAGE_TABLE.' WHERE ticket_id='.db_input($this->getId()));
            db_query('DELETE FROM '.TICKET_RESPONSE_TABLE.' WHERE ticket_id='.db_input($this->getId()));
            db_query('DELETE FROM '.TICKET_NOTE_TABLE.' WHERE ticket_id='.db_input($this->getId()));
            $this->deleteAttachments();
            return TRUE;
        endif;
  
        return FALSE;
    }
   
    function fixAttachments(){
        global $cfg;

        $sql='SELECT attach_id,file_name,file_key FROM '.TICKET_ATTACHMENT_TABLE.' WHERE ticket_id='.db_input($this->getId());
        $res=db_query($sql);
        if($res && db_num_rows($res)) {
            $dir=$cfg->getUploadDir();
            $month=date('my',strtotime($this->getCreateDate()));
            while(list($id,$name,$key)=db_fetch_row($res)){
                $origfilename=sprintf("%s/%s_%s",rtrim($dir,'/'),$key,$name);
                if(!file_exists($origfilename)) continue;

                if(!file_exists(rtrim($dir,'/').'/'.$month))
                    @mkdir(rtrim($dir,'/').'/'.$month,0777);
                if(!is_writable(rtrim($dir,'/').'/'.$month)) continue; //cannot create the new dir???

                $filename=sprintf("%s/%s/%s_%s",rtrim($dir,'/'),$month,$key,$name); //new destination.
                if(rename($origfilename,$filename) && file_exists($filename)) {
                    @unlink($origfilename);
                }
            }

        }
    }

    function deleteAttachments(){
        global $cfg;
        
        $sql='SELECT attach_id,file_name,file_key FROM '.TICKET_ATTACHMENT_TABLE.' WHERE ticket_id='.db_input($this->getId());
        $res=db_query($sql);
        if($res && db_num_rows($res)) {
            $dir=$cfg->getUploadDir();
            $month=date('my',strtotime($this->getCreateDate()));
            $ids=array();
            while(list($id,$name,$key)=db_fetch_row($res)){
                $filename=sprintf("%s/%s/%s_%s",rtrim($dir,'/'),$month,$key,$name);
                if(!file_exists($filename))
                    $filename=sprintf("%s/%s_%s",rtrim($dir,'/'),$key,$name);
                @unlink($filename);
                $ids[]=$id;
            }
            if($ids){
                db_query('DELETE FROM '.TICKET_ATTACHMENT_TABLE.' WHERE attach_id IN('.implode(',',$ids).') AND ticket_id='.db_input($this->getId()));
            }
            return TRUE;
        }
        return FALSE;
    }
    
    function getAttachmentStr($refid,$type){
        
        $sql ='SELECT attach_id,file_size,file_name FROM '.TICKET_ATTACHMENT_TABLE.
             ' WHERE deleted=0 AND ticket_id='.db_input($this->getId()).' AND ref_id='.db_input($refid).' AND ref_type='.db_input($type);
        $res=db_query($sql);
        if($res && db_num_rows($res)){
            while(list($id,$size,$name)=db_fetch_row($res)){
                $hash=MD5($this->getId()*$refid.session_id());
                $size=Format::file_size($size);
                $name=Format::htmlchars($name);
                $attachstr.= "<a class='Icon file' href='attachment.php?id=$id&ref=$hash' target='_blank'><b>$name</b></a>&nbsp;(<i>$size</i>)&nbsp;&nbsp;";
            }
        }
        return ($attachstr);
    }

   /*============== Functions below do not require an instance of the class to be used. To call it use Ticket::function(params); ==================*/
    function getIdByExtId($extid) {
        $sql ='SELECT  ticket_id FROM '.TICKET_TABLE.' ticket WHERE ticketID='.db_input($extid);
        $res=db_query($sql);
        if($res && db_num_rows($res))
            list($id)=db_fetch_row($res);

        return $id;
    }

    function genExtRandID() {
        global $cfg;

        //We can allow collissions...extId and email must be unique ...so same id with diff emails is ok..
        // But for clarity...we are going to make sure it is unique.
        $id=Misc::randNumber(EXT_TICKET_ID_LEN);
        if(db_num_rows(db_query('SELECT ticket_id FROM '.TICKET_TABLE.' WHERE ticketID='.db_input($id))))
            return Ticket::genExtRandID();

        return $id;
    }

    function getIdByMessageId($mid,$email) {

        if(!$mid || !$email)
            return 0;

        $sql='SELECT ticket.ticket_id FROM '.TICKET_TABLE. ' ticket '.
             ' LEFT JOIN '.TICKET_MESSAGE_TABLE.' msg USING(ticket_id) '.
             ' WHERE messageId='.db_input($mid).' AND email='.db_input($email);
        $id=0;
        if(($res=db_query($sql)) && db_num_rows($res))
            list($id)=db_fetch_row($res);

        return $id;
    }


    function getOpenTicketsByEmail($email){

        $sql='SELECT count(*) as open FROM '.TICKET_TABLE.' WHERE status='.db_input('open').' AND email='.db_input($email);
        if(($res=db_query($sql)) && db_num_rows($res))
            list($num)=db_fetch_row($res);

        return $num;
    }

    function update($var,&$errors) {
         global $cfg,$thisuser;

         $fields=array();
         $fields['name']     = array('type'=>'string',   'required'=>1, 'error'=>'Name required');
         $fields['email']    = array('type'=>'email',    'required'=>1, 'error'=>'Email is required');
         $fields['note']     = array('type'=>'text',     'required'=>1, 'error'=>'Reason for the update required');
         $fields['subject']  = array('type'=>'string',   'required'=>1, 'error'=>'Subject required');
         $fields['topicId']  = array('type'=>'int',      'required'=>0, 'error'=>'Invalid Selection');
         $fields['pri']      = array('type'=>'int',      'required'=>0, 'error'=>'Invalid Priority');
         $fields['phone']    = array('type'=>'phone',    'required'=>0, 'error'=>'Valid phone # required');
         $fields['duedate']  = array('type'=>'date',     'required'=>0, 'error'=>'Invalid date - must be MM/DD/YY');

         
         $params = new Validator($fields);
         if(!$params->validate($var)){
             $errors=array_merge($errors,$params->errors());
         }

         if($var['duedate']){
             if($this->isClosed())
                 $errors['duedate']='Duedate can NOT be set on a closed ticket';
             elseif(!$var['time'] || strpos($var['time'],':')===false)
                 $errors['time']='Select time';
             elseif(strtotime($var['duedate'].' '.$var['time'])===false)
                 $errors['duedate']='Invalid duedate';
             elseif(strtotime($var['duedate'].' '.$var['time'])<=time())
                 $errors['duedate']='Due date must be in the future';
         }

        //Make sure phone extension is valid
        if($var['phone_ext'] ) {
            if(!is_numeric($var['phone_ext']) && !$errors['phone'])
                $errors['phone']='Invalid phone ext.';
            elseif(!$var['phone']) //make sure they just didn't enter ext without phone #
                $errors['phone']='Phone number required';
        }

        $cleartopic=false;
        $topicDesc='';
        if($var['topicId'] && ($topic= new Topic($var['topicId'])) && $topic->getId()) {
            $topicDesc=$topic->getName();
        }elseif(!$var['topicId'] && $this->getTopicId()){
            $topicDesc='';
            $cleartopic=true;
        }

 
         if(!$errors){
             $sql='UPDATE '.TICKET_TABLE.' SET updated=NOW() '.
                  ',email='.db_input($var['email']).
                  ',name='.db_input(Format::striptags($var['name'])).
                  ',subject='.db_input(Format::striptags($var['subject'])).
                  ',phone="'.db_input($var['phone'],false).'"'.
                  ',phone_ext='.db_input($var['phone_ext']?$var['phone_ext']:NULL).
                  ',priority_id='.db_input($var['pri']).
                  ',topic_id='.db_input($var['topicId']).
                  ',duedate='.($var['duedate']?db_input(date('Y-m-d G:i',Misc::dbtime($var['duedate'].' '.$var['time']))):'NULL');
             if($var['duedate']) { //We are setting new duedate...
                 $sql.=',isoverdue=0';
             }
             if($topicDesc || $cleartopic) { //we're overwriting previous topic.
                 $sql.=',helptopic='.db_input($topicDesc);
             }
             $sql.=' WHERE ticket_id='.db_input($this->getId());
             //echo $sql;
             if(db_query($sql)){
                 $this->postNote('Ticket Updated',$var['note']);
                 $this->reload();
                 return true;
             }
         }

         return false;
    }




    /*
     * The mother of all functions...You break it you fix it!
     *
     *  $autorespond and $alertstaff overwrites config info...
     */      
    function create($var,&$errors,$origin,$autorespond=true,$alertstaff=true) {
        global $cfg,$trl,$thisclient,$_FILES;
       
       /* Coders never code so fully and joyfully as when they do it for free  - Peter Rotich */

        $id=0;
        $fields=array();
        $fields['name']     = array('type'=>'string',   'required'=>1, 'error'=>$trl->translate('ERROR_NAME_REQUIRED'));
        $fields['email']    = array('type'=>'email',    'required'=>1, 'error'=>'Valid email required');
        $fields['subject']  = array('type'=>'string',   'required'=>1, 'error'=>'Subject required');
        $fields['message']  = array('type'=>'text',     'required'=>1, 'error'=>$trl->translate('ERROR_MESSAGE_REQUIRED'));
        if(strcasecmp($origin,'web')==0) { //Help topic only applicable on web tickets.
            $fields['topicId']  = array('type'=>'int',      'required'=>1, 'error'=>'Select help topic');
        }elseif(strcasecmp($origin,'staff')==0){ //tickets created by staff...e.g on callins.
            $fields['deptId']   = array('type'=>'int',      'required'=>1, 'error'=>'Dept. required');
            $fields['source']   = array('type'=>'string',   'required'=>1, 'error'=>'Indicate source');
            $fields['duedate']  = array('type'=>'date',    'required'=>0, 'error'=>'Invalid date - must be MM/DD/YY');
        }else { //Incoming emails
            $fields['emailId']  = array('type'=>'int',  'required'=>1, 'error'=>'Email unknown');
        }
        $fields['pri']      = array('type'=>'int',      'required'=>0, 'error'=>'Invalid Priority');
        $fields['phone']    = array('type'=>'phone',    'required'=>0, 'error'=>'Valid phone # required');
        
        $validate = new Validator($fields);
        if(!$validate->validate($var)){
            $errors=array_merge($errors,$validate->errors());
        }
        
        //Make sure the email is not banned
        if(!$errors && BanList::isbanned($var['email'])) {
            $errors['err']='Ticket denied. Error #403'; //We don't want to tell the user the real reason...Psssst.
            Sys::log(LOG_WARNING,'Ticket denied','Banned email - '.$var['email']); //We need to let admin know which email got banned.
        }

        if(!$errors && $thisclient && strcasecmp($thisclient->getEmail(),$var['email']))
            $errors['email']='Email mismatch.';

        //Make sure phone extension is valid
        if($var['phone_ext'] ) {
            if(!is_numeric($var['phone_ext']) && !$errors['phone'])
                $errors['phone']='Invalid phone ext.';
            elseif(!$var['phone']) //make sure they just didn't enter ext without phone #
                $errors['phone']='Phone number required';
        }

        //Make sure the due date is valid
        if($var['duedate']){
            if(!$var['time'] || strpos($var['time'],':')===false)
                $errors['time']='Select time';
            elseif(strtotime($var['duedate'].' '.$var['time'])===false)
                $errors['duedate']='Invalid duedate';
            elseif(strtotime($var['duedate'].' '.$var['time'])<=time())
                $errors['duedate']='Due date must be in the future';
        }

        //check attachment..if any is set ...only set on webbased tickets..
        if($_FILES['attachment']['name'] && $cfg->allowOnlineAttachments()) {
            if(!$cfg->canUploadFileType($_FILES['attachment']['name']))
                $errors['attachment']='Invalid file type [ '.Format::htmlchars($_FILES['attachment']['name']).' ]';
            elseif($_FILES['attachment']['size']>$cfg->getMaxFileSize())
                $errors['attachment']='File is too big. Max '.$cfg->getMaxFileSize().' bytes allowed';
        }

        //check ticket limits..if limit set is >0 
        //TODO: Base ticket limits on SLA...
        if($var['email'] && !$errors && $cfg->getMaxOpenTickets()>0 && strcasecmp($origin,'staff')){
            $openTickets=Ticket::getOpenTicketsByEmail($var['email']);
            if($openTickets>=$cfg->getMaxOpenTickets()) {
                $errors['err']="You've reached the maximum open tickets allowed.";
                //Send the notice only once (when the limit is reached) incase of autoresponders at client end.
                if($cfg->getMaxOpenTickets()==$openTickets && $cfg->sendOverlimitNotice()) {
                    if($var['deptId'])
                        $dept = new Dept($var['deptId']);
                    
                    if(!$dept || !($tplId=$dept->getTemplateId()))
                        $tplId=$cfg->getDefaultTemplateId();

                    $sql='SELECT ticket_overlimit_subj,ticket_overlimit_body FROM '.EMAIL_TEMPLATE_TABLE.
                        ' WHERE cfg_id='.db_input($cfg->getId()).' AND tpl_id='.db_input($tplId);
                    $resp=db_query($sql);
                    if(db_num_rows($resp) && list($subj,$body)=db_fetch_row($resp)){

                        $body = str_replace("%name", $var['name'],$body);
                        $body = str_replace("%email",$var['email'],$body);
                        $body = str_replace("%url", $cfg->getBaseUrl(),$body);
                        $body = str_replace('%signature',($dept && $dept->isPublic())?$dept->getSignature():'',$body);

                        if(!$dept || !($email=$dept->getAutoRespEmail()))
                            $email=$cfg->getDefaultEmail();
                        
                        if($email)
                            $email->send($var['email'],$subj,$body);
                    }
                    //Alert admin...this might be spammy (no option to disable)...but it is helpful..I think.
                    $msg='Support ticket request denied for '.$var['email']."\n".
                         'Open ticket:'.$openTickets."\n".
                         'Max Allowed:'.$cfg->getMaxOpenTickets()."\n\nNotice only sent once";
                    Sys::alertAdmin('Overlimit Notice',$msg);
                }
            }
        }

        //Any error above is fatal.
        if($errors) { return 0; }
        
        // OK...just do it.
        $deptId=$var['deptId']; //pre-selected Dept if any.
        $priorityId=$var['pri'];
        $source=ucfirst($var['source']);
        $topic=NULL;
        // Intenal mapping magic...see if we need to overwrite anything
        if(isset($var['topicId'])) { //Ticket created via web by user/or staff

            if($var['topicId'] && ($topic= new Topic($var['topicId'])) && $topic->getId()) {
                $deptId=$deptId?$deptId:$topic->getDeptId();
                $priorityId=$priorityId?$priorityId:$topic->getPriorityId();
                $topicDesc=$topic->getName();
                if($autorespond)
                    $autorespond=$topic->autoRespond();
            }
            $source='Web';
        }elseif($var['emailId'] && !$var['deptId']) { //Emailed Tickets
            $email= new Email($var['emailId']);
            if($email && $email->getId()){
                $deptId=$email->getDeptId();
                $priorityId=$priorityId?$priorityId:$email->getPriorityId();
                if($autorespond)
                    $autorespond=$email->autoRespond();
            }
            $email=null;
            $source='Email';
        }elseif($var['deptId']){ //Opened by staff.
            $deptId=$var['deptId'];
            $source=ucfirst($var['source']);
        }

        //Don't auto respond to mailer daemons.
        if(strpos(strtolower($var['email']),'mailer-daemon@')!==false || strpos(strtolower($var['email']),'postmaster@')!==false)
            $autorespond=false;

        //Last minute checks
        $priorityId=$priorityId?$priorityId:$cfg->getDefaultPriorityId();
        $deptId=$deptId?$deptId:$cfg->getDefaultDeptId();
        $topicId=$var['topicId']?$var['topicId']:0;
        $ipaddress=$var['ip']?$var['ip']:$_SERVER['REMOTE_ADDR'];
        
        //We are ready son...hold on to the rails.
        $extId=Ticket::genExtRandID();
        $sql=   'INSERT INTO '.TICKET_TABLE.' SET created=NOW() '.
                ',ticketID='.db_input($extId).
                ',dept_id='.db_input($deptId).
                ',topic_id='.db_input($topicId).
                ',priority_id='.db_input($priorityId).
                ',email='.db_input($var['email']).
                ',name='.db_input(Format::striptags($var['name'])).
                ',subject='.db_input(Format::striptags($var['subject'])).
                ',helptopic='.db_input(Format::striptags($topicDesc)).
                ',phone="'.db_input($var['phone'],false).'"'.
                ',phone_ext='.db_input($var['phone_ext']?$var['phone_ext']:'').
                ',ip_address='.db_input($ipaddress).        
                ',source='.db_input($source);

        //Make sure the origin is staff - avoid firebug hack!
        if($var['duedate'] && !strcasecmp($origin,'staff'))
             $sql.=',duedate='.db_input(date('Y-m-d G:i',Misc::dbtime($var['duedate'].' '.$var['time'])));

        //echo $sql;
        $ticket=null;
        //return $ticket;
        if(db_query($sql) && ($id=db_insert_id())){

            if(!$cfg->useRandomIds()){
                //Sequential ticketIDs support really..really suck arse.
                $extId=$id; //To make things really easy we are going to use autoincrement ticket_id.
                db_query('UPDATE '.TICKET_TABLE.' SET ticketID='.db_input($extId).' WHERE ticket_id='.$id); 
                //TODO: RETHING what happens if this fails?? [At the moment on failure random ID is used...making stuff usable]
            }
            //Load newly created ticket.
            $ticket = new Ticket($id);
            //post the message.
            $msgid=$ticket->postMessage($var['message'],$source,$var['mid'],$var['header'],true);
            //TODO: recover from postMessage error??
            //Upload attachments...web based.
            if($_FILES['attachment']['name'] && $cfg->allowOnlineAttachments() && $msgid) {    
                if(!$cfg->allowAttachmentsOnlogin() || ($cfg->allowAttachmentsOnlogin() && ($thisclient && $thisclient->isValid()))) {
                    $ticket->uploadAttachment($_FILES['attachment'],$msgid,'M');
                    //TODO: recover from upload issues?
                }
            }
            
            $dept=$ticket->getDept();

            if(!$dept || !($tplId=$dept->getTemplateId()))
                $tplId=$cfg->getDefaultTemplateId();

            //Overwrite auto responder if the FROM email is one of the internal emails...loop control.
            if($autorespond && (Email::getIdByEmail($ticket->getEmail())))
                $autorespond=false;

            //SEND OUT NEW TICKET AUTORESP && ALERTS.
            //New Ticket AutoResponse..
            if($autorespond && $cfg->autoRespONNewTicket() && $dept->autoRespONNewTicket()){
                                                

                $sql='SELECT ticket_autoresp_subj,ticket_autoresp_body FROM '.EMAIL_TEMPLATE_TABLE.
                    ' WHERE cfg_id='.db_input($cfg->getId()).' AND tpl_id='.db_input($tplId);
                if(($resp=db_query($sql)) && db_num_rows($resp) && list($subj,$body)=db_fetch_row($resp)){
                    $body=$ticket->replaceTemplateVars($body);
                    $subj=$ticket->replaceTemplateVars($subj);
                    $body = str_replace('%message',($var['issue']?$var['issue']:$var['message']),$body);
                    $body = str_replace('%signature',($dept && $dept->isPublic())?$dept->getSignature():'',$body);

                    if(!$dept || !($email=$dept->getAutoRespEmail()))
                        $email=$cfg->getDefaultEmail();

                    if($email){
                        //Reply separator tag.                        
                        if($cfg->stripQuotedReply() && ($tag=$cfg->getReplySeparator()))
                            $body ="\n$tag\n\n".$body;
                        $email->send($ticket->getEmail(),$subj,$body);
                    }
                }else {
                    Sys::log(LOG_WARNING,'Template Fetch Error',"Unable to fetch autoresponse template #$tplId");
                }


            }

            //If enabled...send alert to staff (New Ticket Alert)
            if($alertstaff && $cfg->alertONNewTicket() && is_object($ticket)){

                $sql='SELECT ticket_alert_subj,ticket_alert_body FROM '.EMAIL_TEMPLATE_TABLE.
                    ' WHERE cfg_id='.db_input($cfg->getId()).' AND tpl_id='.db_input($tplId);
                if(($resp=db_query($sql)) && db_num_rows($resp) && list($subj,$body)=db_fetch_row($resp)){

                    $body=$ticket->replaceTemplateVars($body);
                    $subj=$ticket->replaceTemplateVars($subj);
                    $body = str_replace('%message',($var['issue']?$var['issue']:$var['message']),$body);
                    if(!($email=$cfg->getAlertEmail()))
                        $email =$cfg->getDefaultEmail();
                   
                    if($email && $email->getId()) {
                        $sentlist=array();
                        //Admin Alert.
                        if($cfg->alertAdminONNewTicket()){
                            $alert = str_replace("%staff",'Admin',$body);    
                            $email->send($cfg->getAdminEmail(),$subj,$alert);
                            $sentlist[]=$cfg->getAdminEmail();
                        }
                        //get the list
                        $recipients=array();
                        //Dept. Manager
                        if($cfg->alertDeptManagerONNewTicket()) {
                            $recipients[]=$dept->getManager();
                        }
                        //Staff members
                        if($cfg->alertDeptMembersONNewTicket()) {
                            $sql='SELECT staff_id FROM '.STAFF_TABLE.' WHERE onvacation=0 AND dept_id='.db_input($dept->getId());
                            if(($users=db_query($sql)) && db_num_rows($users)) {
                                while(list($id)=db_fetch_row($users))
                                    $recipients[]= new Staff($id);
                            }
                        }
                        foreach( $recipients as $k=>$staff){
                            if(!$staff || !is_object($staff) || !$staff->isAvailable()) continue;
                            if(in_array($staff->getEmail(),$sentlist)) continue; //avoid duplicate emails.
                            $alert = str_replace("%staff",$staff->getFirstName(),$body);
                            $email->send($staff->getEmail(),$subj,$alert);
                            $sentlist[]=$staff->getEmail();
                        }
                    }
                }else {
                    Sys::log(LOG_WARNING,'Template Fetch Error',"Unable to fetch 'new ticket' alert template #$tplId");
                }
            }
        }
        return $ticket;
    }

    function create_by_staff($var,&$errors) {
        global $_FILES,$thisuser,$cfg;

        //check if the staff is allowed to create tickets.
        if(!$thisuser || !$thisuser->getId() || !$thisuser->isStaff() || !$thisuser->canCreateTickets())
            $errors['err']='Permission denied';
        
        if(!$var['issue'])
            $errors['issue']='Summary of the issue required';
        if($var['source'] && !in_array(strtolower($var['source']),array('email','phone','other')))
            $errors['source']='Invalid source - '.Format::htmlchars($var['source']);

        $var['emailId']=0;//clean crap.
        $var['message']='Ticket created by staff';

        if(($ticket=Ticket::create($var,$errors,'staff',false,(!$var['staffId'])))){  //Staff are alerted only IF the ticket is not being assigned.
            //post issue as a response...
            $msgId=$ticket->getLastMsgId();
            $issue=$ticket->replaceTemplateVars($var['issue']);
            if(($respId=$ticket->postResponse($msgId,$issue,'none',null,false))) { //Note that we're overwriting alerts.
                //Mark the ticket unanswered - postResponse marks it answered which is not the desired state.
                $ticket->markUnAnswered();
                //Send Notice to user --- if requested AND enabled!!
                if($cfg->notifyONNewStaffTicket() && isset($var['alertuser'])) {
                    $dept=$ticket->getDept();
                    if(!$dept || !($tplId=$dept->getTemplateId()))
                        $tplId=$cfg->getDefaultTemplateId();

                    $sql='SELECT ticket_notice_subj,ticket_notice_body FROM '.EMAIL_TEMPLATE_TABLE.
                         ' WHERE cfg_id='.db_input($cfg->getId()).' AND tpl_id='.db_input($tplId);
                         
                    if(($resp=db_query($sql)) && db_num_rows($resp) && list($subj,$body)=db_fetch_row($resp)){
                        $body=$ticket->replaceTemplateVars($body);
                        $subj=$ticket->replaceTemplateVars($subj);
                        $body = str_replace('%message',$var['issue'],$body);
                        //Figure out the signature to use...if any.
                        switch(strtolower($var['signature'])):
                        case 'mine';
                            $signature=$thisuser->getSignature();
                            break;
                        case 'dept':
                            $signature=($dept && $dept->isPublic())?$dept->getSignature():''; //make sure it is public
                            break;
                        case 'none';
                        default:
                            $signature='';
                            break;
                        endswitch;
                        $body = str_replace("%signature",$signature,$body);
                        //Email attachment when attached AND if emailed attachments are allowed!
                        $file=null;
                        $attachment=$_FILES['attachment'];
                        if(($attachment && is_file($attachment['tmp_name'])) && $cfg->emailAttachments()) {
                            $file=array('file'=>$attachment['tmp_name'], 'name'=>$attachment['name'], 'type'=>$attachment['type']);
                        }
                        
                        if($cfg->stripQuotedReply() && ($tag=trim($cfg->getReplySeparator())))
                            $body ="\n$tag\n\n".$body;
                        
                        if(!$dept || !($email=$dept->getEmail()))
                            $email =$cfg->getDefaultEmail();
                        
                        if($email && $email->getId()) {
                            $email->send($ticket->getEmail(),$subj,$body,$file);
                        }
                    }else{
                        //We have a big problem...alert admin...
                        $msg='Problems fetching response template for ticket#'.$ticket->getId().' Possible config error - template #'.$tplId;
                        Sys::alertAdmin('System Error',$msg);
                    }
                    
                } //Send send alert.
                
                //Upload attachment if any...
                if($_FILES['attachment'] && $_FILES['attachment']['size']){
                    $ticket->uploadAttachment($_FILES['attachment'],$respId,'R');
                }
                
            }else{//end post response
                $errors['err']='Internal error - message/response post error.';
            }
            //post create actions
            if($var['staffId']) { //Assign ticket to staff if any. (internal note as message)
                $ticket->assignStaff($var['staffId'],$var['note'],(isset($var['alertstaff'])));
            }elseif($var['note']){ //Not assigned...save optional note if any
                $ticket->postNote('New Ticket',$var['note'],false);
            }else{ //Not assignment and no internal note - log activity 
                $ticket->logActivity('New Ticket by Staff','Ticket created by staff -'.$thisuser->getName());
            }
           
        }else{
            $errors['err']=$errors['err']?$errors['err']:'Unable to create the ticket. Correct the error(s) and try again';
        }

        return $ticket;
    
    }
   
    function checkOverdue(){
       
        global $cfg;

        if(($hrs=$cfg->getGracePeriod())) {
            $sec=$hrs*3600;
            $sql='SELECT ticket_id FROM '.TICKET_TABLE.' WHERE status=\'open\' AND isoverdue=0 '.
                 ' AND ((reopened is NULL AND duedate is NULL AND TIME_TO_SEC(TIMEDIFF(NOW(),created))>='.$sec.')  '.
                 ' OR (reopened is NOT NULL AND duedate is NULL AND TIME_TO_SEC(TIMEDIFF(NOW(),reopened))>='.$sec.') '.
                 ' OR (duedate is NOT NULL AND duedate<NOW()) '.
                 ') ORDER BY created LIMIT 50'; //Age upto 50 tickets at a time?
        }else{ //No aging....simply check duedates.
            $sql='SELECT ticket_id FROM '.TICKET_TABLE.' WHERE status=\'open\' AND isoverdue=0 '.
                 ' AND (duedate is NOT NULL AND duedate<NOW()) ORDER BY created LIMIT 100';
        }
        //echo $sql;
        if(($stale=db_query($sql)) && db_num_rows($stale)){
            while(list($id)=db_fetch_row($stale)){
                $ticket = new Ticket($id);
                if($ticket->markOverdue(true))
                    $ticket->logActivity('Ticket Marked Overdue','Ticket flagged as overdue by the system.');
            }
        }
   }
    
}
?>
