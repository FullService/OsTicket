<?php
/*********************************************************************
    class.staff.php

    Everything about staff.

    Peter Rotich <peter@osticket.com>
    Copyright (c)  2006,2007,2008,2009 osTicket
    http://www.osticket.com

    Released under the GNU General Public License WITHOUT ANY WARRANTY.
    See LICENSE.TXT for details.

    vim: expandtab sw=4 ts=4 sts=4:
    $Id: class.staff.php,v 1.1.2.1 2009/08/17 18:38:50 carlos.delfino Exp $
**********************************************************************/
class Staff {
    
    var $udata;
    var $group_id;
    var $dept_id;
    var $passwd;
    var $id;
    var $fullname;
    var $username;
    var $email;

    var $firstname;
    var $lastname;
    var $signature;

    var $dept;
    
    function Staff($var){
        $this->id =0;
        return ($this->lookup($var));
    }

    function lookup($var){

        $sql=sprintf("SELECT * FROM ".STAFF_TABLE." LEFT JOIN ".GROUP_TABLE." USING(group_id) WHERE %s=%s ",
                        is_numeric($var)?'staff_id':'username',db_input($var));

        $res=db_query($sql);
        if(!$res || !db_num_rows($res))
            return NULL;

        $row=db_fetch_array($res);
        $this->udata=$row;
        $this->id         = $row['staff_id'];
        $this->group_id   = $row['group_id'];
        $this->dept_id    = $row['dept_id'];
        $this->firstname  = ucfirst($row['firstname']);
        $this->lastname  = ucfirst($row['lastname']);
        $this->fullname   = ucfirst($row['firstname'].' '.$row['lastname']);
        $this->passwd     = $row['passwd'];
        $this->username   = $row['username'];
        $this->email      = $row['email'];
        $this->signature  = $row['signature'];

        return($this->id);
    }

    function reload(){
        $this->lookup($this->id);
    }

    function getInfo() {
        return $this->udata;
    }

    /*compares user password*/
    function check_passwd($password){
        return (strlen($this->passwd) && strcmp($this->passwd, MD5($password))==0)?(TRUE):(FALSE);
    }

    function getTZoffset(){
        global $cfg;

        $offset=$this->udata['timezone_offset'];
        return $offset?$offset:$cfg->getTZoffset();
    }

    function observeDaylight() {
        return $this->udata['daylight_saving']?true:false;
    }

    function getRefreshRate(){
        return $this->udata['auto_refresh_rate'];
    }

    function getPageLimit() {
        global $cfg;
        $limit=$this->udata['max_page_size'];
        return $limit?$limit:$cfg->getPageSize();
    }

    function getData(){
        return($this->udata);
    }

    function getId(){
        return $this->id;
    }

    function getEmail(){
        return($this->email);
    }

    function getUserName(){
        return($this->username);
    }

    function getName(){
        return($this->fullname);
    }
        
    function getFirstName(){
        return $this->firstname;
    }
        
    function getLastName(){
        return $this->lastname;
    }
    
    function getDeptId(){
        return $this->dept_id;
    }   

    function getGroupId(){
        return $this->group_id;
    }

    function getSignature(){
        return($this->signature);
    }

    function appendMySignature(){
        return $this->signature?true:false;
    }

    function forcePasswdChange(){
        return $this->udata['change_passwd']?true:false;        
    }

    function getDepts(){
        //Departments the user is allowed to access...based on the group they belong to + user's dept.
        return array_filter(array_unique(array_merge(explode(',',$this->udata['dept_access']),array($this->dept_id)))); //Neptune help us
    }

    function getDept(){

        if(!$this->dept && $this->dept_id)
            $this->dept= new Dept($this->dept_id);

        return $this->dept;
    }


    function isManager() {
        return (($dept=$this->getDept()) && $dept->getManagerId()==$this->getId())?true:false;
    }

    function isStaff(){
        return TRUE;
    }

    function isGroupActive() {
        return ($this->udata['group_enabled'])?true:false;
    }

    function isactive(){
        return ($this->udata['isactive'])?true:false;
    }

    function isVisible(){
         return ($this->udata['isvisible'])?true:false;
    }
        
    function onVacation(){
        return ($this->udata['onvacation'])?true:false;
    }

    function isAvailable() {
        return (!$this->isactive() || !$this->isGroupActive() || $this->onVacation())?false:true;
    }
   
    function isadmin(){
        return ($this->udata['isadmin'])?true:false;
    }
   
   /* canDos' logic explained 
        1) First check id the user is super admin...if yes...super..allow
        2) Check if the user is allowed to do the Do...or a manager in some cases -- if yes...allow
        3) Check if he user's group is allowed...if yes...allow
        5) If I-2-3 fails...it is a NO.. you can cry yourself to sleep.
    */

    function canAccessDept($deptid){
        return ($this->isadmin() ||in_array($deptid,$this->getDepts()))?true:false;
    }

    function canCreateTickets(){
        return ($this->isadmin() || $this->udata['can_create_tickets'])?true:false;
    }

    function canEditTickets(){
        return ($this->isadmin() || $this->udata['can_edit_tickets'])?true:false;
    }
    
    function canDeleteTickets(){
        return ($this->isadmin() || $this->udata['can_delete_tickets'])?true:false;
    }
   
    function canCloseTickets(){
        return ($this->isadmin() || $this->udata['can_close_tickets'])?true:false;
    }

    function canTransferTickets() {
        return ($this->isadmin() || $this->isManager() || $this->udata['can_transfer_tickets'])?true:false;
    }

    function canManageBanList() {
        return ($this->isadmin() || $this->isManager() || $this->udata['can_ban_emails'])?true:false;
    }
  
    function canManageTickets() {
        return ($this->isadmin()
                || $this->canDeleteTickets()
                || $this->canManageBanList()
                || $this->canCloseTickets())?true:false;
    }

    function canManageKb() { //kb = knowledge base.
        return ($this->isadmin() || $this->udata['can_manage_kb'])?true:false;
    }

    function update($vars,&$errors) {
        if($this->save($this->getId(),$vars,$errors)){
            $this->reload();
            return true;
        }
        return false;
    }

    function create($vars,&$errors) {
        return Staff::save(0,$vars,$errors);
    }


    function save($id,$vars,&$errors) {
                
        include_once(INCLUDE_DIR.'class.dept.php');

        if($id && $id!=$vars['staff_id'])
            $errors['err']='Internal Error';
            
        if(!$vars['firstname'] || !$vars['lastname'])
            $errors['name']='First and last name required';
            
        if(!$vars['username'] || strlen($vars['username'])<3)
            $errors['username']='Username required';
        else{
            //check if the username is already in-use.
            $sql='SELECT staff_id FROM '.STAFF_TABLE.' WHERE username='.db_input($vars['username']);
            if($id)
                $sql.=' AND staff_id!='.db_input($id);
                
            if(db_num_rows(db_query($sql)))
                $errors['username']='Username already in-use';
        }
        
        if(!$vars['email'] || !Validator::is_email($vars['email']))
            $errors['email']='Valid email required';
        elseif(Email::getIdByEmail($vars['email']))
            $errors['email']='Already in-use system email';
        
        if($vars['phone'] && !Validator::is_phone($vars['phone']))
            $errors['phone']='Valid number required';
        
        if($vars['mobile'] && !Validator::is_phone($vars['mobile']))
            $errors['mobile']='Valid number required';

        if($vars['npassword'] || $vars['vpassword'] || !$id){
            if(!$vars['npassword'] && !$id)
                $errors['npassword']='Temp password required';
            elseif($vars['npassword'] && strcmp($vars['npassword'],$vars['vpassword']))
                $errors['vpassword']='Password(s) do not match';
            elseif($vars['npassword'] && strlen($vars['npassword'])<6)
                $errors['npassword']='Must be at least 6 characters';
        }
        
        if(!$vars['dept_id'])
            $errors['dept']='Department required';
            
        if(!$vars['group_id'])
            $errors['group']='Group required';


        if(!$errors){
            
            $sql=' SET updated=NOW() '.
                 ',isadmin='.db_input($vars['isadmin']).
                 ',isactive='.db_input($vars['isactive']).
                 ',isvisible='.db_input(isset($vars['isvisible'])?1:0).
                 ',onvacation='.db_input(isset($vars['onvacation'])?1:0).
                 ',dept_id='.db_input($vars['dept_id']).
                 ',group_id='.db_input($vars['group_id']).
                 ',username='.db_input(Format::striptags($vars['username'])).
                 ',firstname='.db_input(Format::striptags($vars['firstname'])).
                 ',lastname='.db_input(Format::striptags($vars['lastname'])).
                 ',email='.db_input($vars['email']).
                 ',phone="'.db_input($vars['phone'],false).'"'.
                 ',phone_ext='.db_input($vars['phone_ext']).
                 ',mobile="'.db_input($vars['mobile'],false).'"'.
                 ',signature='.db_input(Format::striptags($vars['signature']));

            if($vars['npassword'])
                $sql.=',passwd='.db_input(md5($vars['npassword']));
                
            if(isset($vars['resetpasswd']))
                $sql.=',change_passwd=1';

            if($id) {
                $sql='UPDATE '.STAFF_TABLE.' '.$sql.' WHERE staff_id='.db_input($id);
                if(!db_query($sql) || !db_affected_rows())
                    $errors['err']='Unable to update the user. Internal error occured';
            }else{
                $sql='INSERT INTO '.STAFF_TABLE.' '.$sql.',created=NOW()';
                if(db_query($sql) && ($uID=db_insert_id()))
                    return $uID;

                $errors['err']='Unable to create user. Internal error';
            }
        }

        return $errors?false:true;
    }
}
?>
