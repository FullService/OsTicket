<?php
/*********************************************************************
 class.config.php

 osTicket config info manager.

 Peter Rotich <peter@osticket.com>
    Copyright (c)  2006-2010 osTicket
 http://www.osticket.com

 Released under the GNU General Public License WITHOUT ANY WARRANTY.
 See LICENSE.TXT for details.

 vim: expandtab sw=4 ts=4 sts=4:
 $Id: class.config.php,v 1.2.2.8 2009/10/26 15:39:02 carlos.delfino Exp $
 **********************************************************************/

require_once(INCLUDE_DIR.'class.email.php');

class Config {

	var $id=0;
	var $mysqltzoffset=0;
	var $config=array();

	var $defaultDept;   //Default Department
	var $defaultEmail;  //Default Email
	var $alertEmail;  //Alert Email
	var $defaultSMTPEmail; //Default  SMTP Email 


	function Config($id) {
		$this->load($id);
	}

	function load($id) {

		if($id && is_numeric($id)):
		$this->id=$id;
		$this->config=array();
		$res=db_query('SELECT * FROM '.CONFIG_TABLE.' WHERE id='.$id);
		if($res && db_num_rows($res))
		$this->config=db_fetch_array($res);
		endif;
		return $this->config?true:false;
	}

	//Initialize some default values.
	function init(){
		list($mysqltz)=db_fetch_row(db_query('SELECT @@session.time_zone '));
		$this->setMysqlTZ($mysqltz);
	}

	function reload() {
		if($this->load($this->id))
		$this->init();
	}


	function isHelpDeskOffline() {
		return $this->config['isonline']?false:true;
	}

	function getLanguage(){

		$language =  $this->config['OSTLANG'];
		if (!$language)
		{
			if(defined('OSTLANG')){ 
				$language = OSTLANG;
			}else{
				$language = 'us';
			} 
			$this->setLanguage($language);
		}
		return $language;
	}

	function setLanguage($language='us') {
		$this->config['OSTLANG'] = $language;
	}

	function getAPIPassphrase(){
		return $this->config['api_passphrase'];
	}

	function getVersion(){
		return $this->config['ostversion'];
	}

	function setMysqlTZ($tz){
		//TODO: Combine the 2 replace regex
		$this->mysqltzoffset=($tz=='SYSTEM')?preg_replace('/([+-]\d{2})(\d{2})/','\1',date('O')):preg_replace('/([+-]\d{2})(:)(\d{2})/','\1',$tz);
	}

	function getMysqlTZoffset() {
		return $this->mysqltzoffset;
	}

	/* Date & Time Formats */
	function observeDaylightSaving() {
		return $this->config['enable_daylight_saving']?true:false;
	}
	function getTimeFormat(){
		return $this->config['time_format'];
	}
	function getDateFormat(){
		return $this->config['date_format'];
	}

	function getDateTimeFormat(){
		return $this->config['datetime_format'];
	}

	function getDayDateTimeFormat(){
		return $this->config['daydatetime_format'];
	}

	function getId() {
		return $this->config['id'];
	}

	function getTitle() {
		return $this->config['helpdesk_title'];
	}

	function getUrl() {
		return $this->config['helpdesk_url'];
	}

	function getBaseUrl(){ //Same as above with no trailing slash.
		return rtrim($this->getUrl(),'/');
	}

	function getConfig() {
		return $this->config;
	}

	function getTZOffset(){
		return $this->config['timezone_offset'];
	}

	function getPageSize() {
		return $this->config['max_page_size'];
	}

	function getGracePeriod() {
		return $this->config['overdue_grace_period'];
	}


	function getClientTimeout() {
		return $this->getClientSessionTimeout();
	}

	function getClientSessionTimeout() {
		return $this->config['client_session_timeout']*60;
	}

	function getClientLoginTimeout() {
		return $this->config['client_login_timeout']*60;
	}

	function getClientMaxLogins() {
		return $this->config['client_max_logins'];
	}

	function getStaffTimeout() {
		return $this->getStaffSessionTimeout();
	}

	function getStaffSessionTimeout() {
		return $this->config['staff_session_timeout']*60;
	}

	function getStaffLoginTimeout() {
		return $this->config['staff_login_timeout']*60;
	}

	function getStaffMaxLogins() {
		return $this->config['staff_max_logins'];
	}

	function getLockTime() {
		return $this->config['autolock_minutes'];
	}

	function getDefaultDeptId(){
		return $this->config['default_dept_id'];
	}

	function getDefaultDept(){

		if(!$this->defaultDept && $this->getDefaultDeptId())
		$this->defaultDept= new Dept($this->getDefaultDeptId());
		return $this->defaultDept;
	}

	function getDefaultEmailId(){
		return $this->config['default_email_id'];
	}

	function getDefaultEmail(){

		if(!$this->defaultEmail && $this->getDefaultEmailId())
		$this->defaultEmail= new Email($this->getDefaultEmailId());
		return $this->defaultEmail;
	}

	function getDefaultEmailAddress() {
		$email=$this->getDefaultEmail();
		return $email?$email->getAddress():null;
	}

	function getAlertEmailId() {
		return $this->config['alert_email_id'];
	}

	function getAlertEmail(){

		if(!$this->alertEmail && $this->config['alert_email_id'])
		$this->alertEmail= new Email($this->config['alert_email_id']);
		return $this->alertEmail;
	}

	function getDefaultSMTPEmail(){

		if(!$this->defaultSMTPEmail && $this->config['default_smtp_id'])
		$this->defaultSMTPEmail= new Email($this->config['default_smtp_id']);
		return $this->defaultSMTPEmail;
	}

	function allowSMTPSpoofing() {
		return $this->config['spoof_default_smtp'];
	}

	function getDefaultPriorityId(){
		return $this->config['default_priority_id'];
	}

	function getDefaultTemplateId() {
		return $this->config['default_template_id'];
	}

	function getMaxOpenTickets() {
		return $this->config['max_open_tickets'];
	}

	function getMaxFileSize(){
		return $this->config['max_file_size'];
	}

	function getLogLevel(){
		return $this->config['log_level'];
	}

	function getLogGracePeriod(){
		return $this->config['log_graceperiod'];
	}

    function logTicketActivity(){
        return $this->config['log_ticket_activity'];
    }

	function clickableURLS() {
		return $this->config['clickable_urls']?true:false;
	}

	function canFetchMail() {
		return $this->config['enable_mail_fetch']?true:false;
	}

    function enableStaffIPBinding(){
        return $this->config['staff_ip_binding']?true:false;
    }

    function enableCaptcha() {
        
        //Checking it in real time!
        if(!extension_loaded('gd') || !function_exists('gd_info'))
            return false;

        return $this->config['enable_captcha']?true:false;
    }

	function enableAutoCron() {
		return $this->config['enable_auto_cron']?true:false;
	}

	function enableEmailPiping() {
		return $this->config['enable_email_piping']?true:false;
	}

	function allowPriorityChange() {
		return $this->config['allow_priority_change']?true:false;
	}


	function useEmailPriority() {
		return $this->config['use_email_priority']?true:false;
	}

	function getAdminEmail(){
		return $this->config['admin_email'];
	}

	function getReplySeparator() {
		return $this->config['reply_separator'];
	}

	function stripQuotedReply() {
		return $this->config['strip_quoted_reply']?true:false;
	}

	function saveEmailHeaders() {
		return true; //No longer an option...hint: big plans for headers coming!!
	}

	function useRandomIds() {
		return $this->config['random_ticket_ids']?true:false;
	}

	/* autoresponders  & Alerts */
	function autoRespONNewTicket() {
		return $this->config['ticket_autoresponder']?true:false;
	}

	function autoRespONNewMessage() {
		return $this->config['message_autoresponder']?true:false;
	}

    function notifyONNewStaffTicket(){
        return $this->config['ticket_notice_active']?true:false;
    }

	function alertONNewMessage() {
		return $this->config['message_alert_active']?true:false;
	}

	function alertLastRespondentONNewMessage() {
		return $this->config['message_alert_laststaff']?true:false;
	}

	function alertAssignedONNewMessage() {
		return $this->config['message_alert_assigned']?true:false;
	}

	function alertDeptManagerONNewMessage() {
		return $this->config['message_alert_dept_manager']?true:false;
	}

	function alertONNewNote() {
		return $this->config['note_alert_active']?true:false;
	}

	function alertLastRespondentONNewNote() {
		return $this->config['note_alert_laststaff']?true:false;
	}

	function alertAssignedONNewNote() {
		return $this->config['note_alert_assigned']?true:false;
	}

	function alertDeptManagerONNewNote() {
		return $this->config['note_alert_dept_manager']?true:false;
	}

	function alertONNewTicket() {
		return $this->config['ticket_alert_active']?true:false;
	}

	function alertAdminONNewTicket() {
		return $this->config['ticket_alert_admin']?true:false;
	}

	function alertDeptManagerONNewTicket() {
		return $this->config['ticket_alert_dept_manager']?true:false;
	}

	function alertDeptMembersONNewTicket() {
		return $this->config['ticket_alert_dept_members']?true:false;
	}

	function alertONOverdueTicket() {
		return $this->config['overdue_alert_active']?true:false;
	}

	function alertAssignedONOverdueTicket() {
		return $this->config['overdue_alert_assigned']?true:false;
	}

	function alertDeptManagerONOverdueTicket() {
		return $this->config['overdue_alert_dept_manager']?true:false;
	}

	function alertDeptMembersONOverdueTicket() {
		return $this->config['overdue_alert_dept_members']?true:false;
	}

	function autoAssignReopenedTickets() {
		return $this->config['auto_assign_reopened_tickets']?true:false;
	}

	function showAssignedTickets() {
		return $this->config['show_assigned_tickets']?true:false;
	}

	function showAnsweredTickets() {
		return $this->config['show_answered_tickets']?true:false;
	}

	function hideStaffName() {
		return $this->config['hide_staff_name']?true:false;
	}

	function sendOverLimitNotice() {
		return $this->config['overlimit_notice_active']?true:false;
	}

	/* Error alerts sent to admin email when enabled */
	function alertONSQLError() {
		return $this->config['send_sql_errors']?true:false;
	}
	function alertONLoginError() {
		return $this->config['send_login_errors']?true:false;
	}

	function alertONMailParseError() {
		return $this->config['send_mailparse_errors']?true:false;
	}



	/* Attachments */

	function emailAttachments() {
		return $this->config['email_attachments']?true:false;
	}

	function allowAttachments() {
		return $this->config['allow_attachments']?true:false;
	}

	function allowOnlineAttachments() {
		return ($this->allowAttachments() && $this->config['allow_online_attachments'])?true:false;
	}

	function allowAttachmentsOnlogin() {
		return ($this->allowOnlineAttachments() && $this->config['allow_online_attachments_onlogin'])?true:false;
	}

	function allowEmailAttachments() {
		return ($this->allowAttachments() && $this->config['allow_email_attachments'])?true:false;
	}

	function getUploadDir() {
		return $this->config['upload_dir'];
	}

	//simply checking if destination dir is usable..nothing to do with permission to upload!
	function canUploadFiles() {
		$dir=$this->config['upload_dir'];
		return ($dir && is_writable($dir))?TRUE:FALSE;
	}

	function canUploadFileType($filename) {
		$ext = strtolower(preg_replace("/.*\.(.{3,4})$/", "$1", $filename));
		$allowed=$this->config['allowed_filetypes']?array_map('trim',explode(',',strtolower($this->config['allowed_filetypes']))):null;
		return ($ext && is_array($allowed) && (in_array(".$ext",$allowed) || in_array(".*",$allowed)))?TRUE:FALSE;
	}

	function updatePref($var,&$errors) {

		if(!$var || $errors)
		return false;

		$f=array();
		$f['helpdesk_url']=array('type'=>'string',   'required'=>1, 'error'=>'Helpdesk URl required'); //TODO: Add url validation
		$f['helpdesk_title']=array('type'=>'string',   'required'=>1, 'error'=>'Helpdesk title required');
		$f['default_dept_id']=array('type'=>'int',   'required'=>1, 'error'=>'Default Dept. required');
		$f['default_email_id']=array('type'=>'int',   'required'=>1, 'error'=>'Default email required');
		$f['default_template_id']=array('type'=>'int',   'required'=>1, 'error'=>'You must select template.');
		$f['staff_session_timeout']=array('type'=>'int',   'required'=>1, 'error'=>'Enter idle time in minutes');
		$f['client_session_timeout']=array('type'=>'int',   'required'=>1, 'error'=>'Enter idle time in minutes');
		$f['time_format']=array('type'=>'string',   'required'=>1, 'error'=>'Time format required'); //TODO: Add date format validation
		$f['date_format']=array('type'=>'string',   'required'=>1, 'error'=>'Date format required');
		$f['datetime_format']=array('type'=>'string',   'required'=>1, 'error'=>'Datetime format required');
		$f['daydatetime_format']=array('type'=>'string',   'required'=>1, 'error'=>'Day, Datetime format required');
		$f['admin_email']=array('type'=>'email',   'required'=>1, 'error'=>'Valid email required');
		$f['autolock_minutes']=array('type'=>'int',   'required'=>1, 'error'=>'Enter lock time in minutes');
		//TODO: check option fields for validity.

		//do the validation.
		$val = new Validator();
		$val->setFields($f);
		if(!$val->validate($var)){
			$errors=array_merge($errors,$val->errors());
		}

		if($var['ticket_alert_active']
		&& (!isset($var['ticket_alert_admin'])
		&& !isset($var['ticket_alert_dept_manager'])
		&& !isset($var['ticket_alert_dept_members']))){
			$errors['ticket_alert_active']='No target recipient(s) selected';
		}
		if($var['message_alert_active']
		&& (!isset($var['message_alert_laststaff'])
		&& !isset($var['message_alert_assigned'])
		&& !isset($var['message_alert_dept_manager']))){
			$errors['message_alert_active']='No target recipient(s) selected';
		}

		if($var['note_alert_active']
		&& (!isset($var['note_alert_laststaff'])
		&& !isset($var['note_alert_assigned'])
		&& !isset($var['note_alert_dept_manager']))){
			$errors['note_alert_active']='No target recipient(s) selected';
		}

		if($var['strip_quoted_reply'] && !$var['reply_separator'])
		$errors['reply_separator']='Reply separator required (?)';

        if($var['enable_captcha']){
            if (!extension_loaded('gd'))
                $errors['enable_captcha']='The GD extension required';
            elseif(!function_exists('imagepng'))
                $errors['enable_captcha']='PNG support required for Image Captcha';
        }

        if(!$errors['admin_email'] && Email::getIdByEmail($var['admin_email'])) //Make sure admin email is not also a system email.
            $errors['admin_email']='Email already setup as system email';




		if($errors) return false; //No go!

		//We are good to go...blanket update!
		$sql= 'UPDATE '.CONFIG_TABLE.' SET isonline='.db_input($var['isonline']).
            ',timezone_offset='.db_input($var['timezone_offset']).
            ',enable_daylight_saving='.db_input(isset($var['enable_daylight_saving'])?1:0).
            ',staff_ip_binding='.db_input(isset($var['staff_ip_binding'])?1:0).
            ',staff_max_logins='.db_input($var['staff_max_logins']).
            ',staff_login_timeout='.db_input($var['staff_login_timeout']).
            ',staff_session_timeout='.db_input($var['staff_session_timeout']).
            ',client_max_logins='.db_input($var['client_max_logins']).
            ',client_login_timeout='.db_input($var['client_login_timeout']).
            ',client_session_timeout='.db_input($var['client_session_timeout']).
            ',max_page_size='.db_input($var['max_page_size']).
            ',log_level='.db_input($var['log_level']).
            ',log_graceperiod='.db_input($var['log_graceperiod']).
            ',max_open_tickets='.db_input($var['max_open_tickets']).
            ',autolock_minutes='.db_input($var['autolock_minutes']).
            ',overdue_grace_period='.db_input($var['overdue_grace_period']).
            ',alert_email_id='.db_input($var['alert_email_id']).
            ',default_email_id='.db_input($var['default_email_id']).
            ',default_dept_id='.db_input($var['default_dept_id']).
            ',default_priority_id='.db_input($var['default_priority_id']).
            ',default_template_id='.db_input($var['default_template_id']).
            ',default_smtp_id='.db_input($var['default_smtp_id']).
            ',spoof_default_smtp='.db_input(($var['default_smtp'] && isset($var['spoof_default_smtp']))?1:0).
            ',clickable_urls='.db_input(isset($var['clickable_urls'])?1:0).
            ',allow_priority_change='.db_input(isset($var['allow_priority_change'])?1:0).
            ',use_email_priority='.db_input(isset($var['use_email_priority'])?1:0).
            ',enable_captcha='.db_input(isset($var['enable_captcha'])?1:0).
            ',enable_auto_cron='.db_input(isset($var['enable_auto_cron'])?1:0).
            ',enable_mail_fetch='.db_input(isset($var['enable_mail_fetch'])?1:0).
            ',enable_email_piping='.db_input(isset($var['enable_email_piping'])?1:0).
            ',send_sql_errors='.db_input(isset($var['send_sql_errors'])?1:0).
            ',send_login_errors='.db_input(isset($var['send_login_errors'])?1:0).
            ',save_email_headers='.db_input(isset($var['save_email_headers'])?1:0).
            ',strip_quoted_reply='.db_input(isset($var['strip_quoted_reply'])?1:0).
            ',log_ticket_activity='.db_input(isset($var['log_ticket_activity'])?1:0).
            ',ticket_autoresponder='.db_input($var['ticket_autoresponder']).
            ',message_autoresponder='.db_input($var['message_autoresponder']).
            ',ticket_notice_active='.db_input($var['ticket_notice_active']).
            ',ticket_alert_active='.db_input($var['ticket_alert_active']).
            ',ticket_alert_admin='.db_input(isset($var['ticket_alert_admin'])?1:0).
            ',ticket_alert_dept_manager='.db_input(isset($var['ticket_alert_dept_manager'])?1:0).
            ',ticket_alert_dept_members='.db_input(isset($var['ticket_alert_dept_members'])?1:0).
            ',message_alert_active='.db_input($var['message_alert_active']).
            ',message_alert_laststaff='.db_input(isset($var['message_alert_laststaff'])?1:0).
            ',message_alert_assigned='.db_input(isset($var['message_alert_assigned'])?1:0).
            ',message_alert_dept_manager='.db_input(isset($var['message_alert_dept_manager'])?1:0).
            ',note_alert_active='.db_input($var['note_alert_active']).
            ',note_alert_laststaff='.db_input(isset($var['note_alert_laststaff'])?1:0).
            ',note_alert_assigned='.db_input(isset($var['note_alert_assigned'])?1:0).
            ',note_alert_dept_manager='.db_input(isset($var['note_alert_dept_manager'])?1:0).
            ',overdue_alert_active='.db_input($var['overdue_alert_active']).
            ',overdue_alert_assigned='.db_input(isset($var['overdue_alert_assigned'])?1:0).
            ',overdue_alert_dept_manager='.db_input(isset($var['overdue_alert_dept_manager'])?1:0).
            ',overdue_alert_dept_members='.db_input(isset($var['overdue_alert_dept_members'])?1:0).
            ',auto_assign_reopened_tickets='.db_input(isset($var['auto_assign_reopened_tickets'])?1:0).
            ',show_assigned_tickets='.db_input(isset($var['show_assigned_tickets'])?1:0).
            ',show_answered_tickets='.db_input(isset($var['show_answered_tickets'])?1:0).
            ',hide_staff_name='.db_input(isset($var['hide_staff_name'])?1:0).
            ',overlimit_notice_active='.db_input($var['overlimit_notice_active']).
            ',random_ticket_ids='.db_input($var['random_ticket_ids']).
            ',time_format='.db_input($var['time_format']).
            ',date_format='.db_input($var['date_format']).
            ',datetime_format='.db_input($var['datetime_format']).
            ',daydatetime_format='.db_input($var['daydatetime_format']).
            ',reply_separator='.db_input(trim($var['reply_separator'])).
            ',admin_email='.db_input($var['admin_email']).
            ',helpdesk_title='.db_input($var['helpdesk_title']).
            ',helpdesk_url='.db_input($var['helpdesk_url']).
            ' WHERE id='.$this->getId();
		//echo $sql;
		if(db_query($sql)) {
			if(db_affected_rows()) {//Something actually changed!!!!
				$this->reload();//Reload the new info.
				require_once(INCLUDE_DIR.'class.cron.php');
				Sys::purgeLogs(); //Cleanup the logs --- too bad if it was a mistaken config.
				Cron::TicketMonitor(); //Age & cleanup
			}
			return true;
		}
		return false;
	}

	function setTranslator($trl) {
		$this->translator = $trl;
	}

	function translate($str, $replace=null){
		$trl = $this->translator;
		$msg = $trl->translate($str,$replace);
		return $msg;
	}
	function image($str){
		$trl = $this->translator;
		$img = $trl->image($str);
		return $img;
	}
}
?>
