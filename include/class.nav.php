<?php
/*********************************************************************
 class.nav.php

 Navigation helper classes. Pointless BUT helps keep navigation clean and free from errors.

 Peter Rotich <peter@osticket.com>
 Copyright (c)  2006-2010 osTicket
 http://www.osticket.com

 Released under the GNU General Public License WITHOUT ANY WARRANTY.
 See LICENSE.TXT for details.

 vim: expandtab sw=4 ts=4 sts=4:
 $Id: $
 **********************************************************************/
class StaffNav {
	var $tabs=array();
	var $submenu=array();

	var $activetab;
	var $ptype;

	function StaffNav($pagetype='staff'){
		global $thisuser;

		$trl = $_SESSION['trl'];

		$this->ptype=$pagetype;
		$tabs=array();
		if($thisuser->isAdmin() && strcasecmp($pagetype,'admin')==0) {
			$desc = $trl->translate("LABEL_DASHBOARD");
			$title = $trl->translate("LABEL_ADMIN_DASHBOARD");
			$tabs['dashboard']=array('desc'=>$trl,'href'=>'admin.php?t=dashboard','title'=>$tile);
			$tabs['settings']=array('desc'=>'Settings','href'=>'admin.php?t=settings','title'=>'System Settings');
			$tabs['emails']=array('desc'=>'Emails','href'=>'admin.php?t=email','title'=>'Email Settings');
			$tabs['topics']=array('desc'=>'Help Topics','href'=>'admin.php?t=topics','title'=>'Help Topics');
			$tabs['staff']=array('desc'=>'Staff','href'=>'admin.php?t=staff','title'=>'Staff Members');
			$tabs['depts']=array('desc'=>'Departments','href'=>'admin.php?t=depts','title'=>'Departments');
		}else {
			$tabs['tickets']=array('desc'=>'Tickets','href'=>'tickets.php','title'=>'Ticket Queue');
			if($thisuser && $thisuser->canManageKb()){
				$desc = $trl->translate('LABEL_KNOWLEDGE_BASE');
				$title = $trl->translate('LABEL_KNOWLEDGE_BASE_PREMATE');
				$tabs['kbase']=array('desc'=>$desc,'href'=>'kb.php','title'=>$title);
			}
			$desc = $trl->translate('LABEL_DIRECTORY');
			$title = $trl->translate('LABEL_DIRETORY_STAFF');
			$tabs['directory']=array('desc'=>$desc,'href'=>'directory.php','title'=>$title);
			$tabs['profile']=array('desc'=>'My Account','href'=>'profile.php','title'=>'My Profile');
		}
		$this->tabs=$tabs;
	}


	function setTabActive($tab){

		if($this->tabs[$tab]){
			$this->tabs[$tab]['active']=true;
			if($this->activetab && $this->activetab!=$tab && $this->tabs[$this->activetab])
			$this->tabs[$this->activetab]['active']=false;
			$this->activetab=$tab;
			return true;
		}
		return false;
	}

	function addSubMenu($item,$tab=null) {

		$tab=$tab?$tab:$this->activetab;
		$this->submenu[$tab][]=$item;
	}



	function getActiveTab(){
		return $this->activetab;
	}

	function getTabs(){
		return $this->tabs;
	}

	function getSubMenu($tab=null){

		$tab=$tab?$tab:$this->activetab;
		return $this->submenu[$tab];
	}

}
?>
