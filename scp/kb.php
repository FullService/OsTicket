<?php
/*********************************************************************
    kb.php

    Knowledge Base handle

    Peter Rotich <peter@osticket.com>
    Copyright (c)  2006-2010 osTicket
    http://www.osticket.com

    Released under the GNU General Public License WITHOUT ANY WARRANTY.
    See LICENSE.TXT for details.

    vim: expandtab sw=4 ts=4 sts=4:
    $Id: kb.php,v 1.1.2.1 2009/08/17 19:27:49 carlos.delfino Exp $
**********************************************************************/

require('staff.inc.php');
if(!$thisuser->canManageKb() && !$thisuser->isadmin()) die($trl->translate("TEXT_ACCESS_DENIED"));

$page='';
$answer=null; //clean start.
if(($id=$_REQUEST['id']?$_REQUEST['id']:$_POST['id']) && is_numeric($id)) {
    $replyID=0;
    $resp=db_query('SELECT * FROM '.KB_PREMADE_TABLE.' WHERE premade_id='.db_input($id));
    if($resp && db_num_rows($resp))
        $answer=db_fetch_array($resp);
    else
        $errors['err']='Unknown ID#'.$id; //Sucker...invalid id
    
    if(!$errors && $answer['premade_id']==$id)
        $page='reply.inc.php';
}

if($_POST):
    $errors=array();
    switch(strtolower($_POST['a'])):
    case 'update':
    case 'add':
        if(!$_POST['id'] && $_POST['a']=='update')
            $errors['err']='Missing or invalid group ID';

        if(!$_POST['title'])
            $errors['title']='Title/subject required';
                
        if(!$_POST['answer'])
            $errors['answer']='Reply required';

        if(!$errors){
            $sql=' SET updated=NOW(),isenabled='.db_input($_POST['isenabled']).
                 ', dept_id='.db_input($_POST['dept_id']).
                 ', title='.db_input(Format::striptags($_POST['title'])).
                 ', answer='.db_input(Format::striptags($_POST['answer']));
            if($_POST['a']=='add'){ //create
                $res=db_query('INSERT INTO '.KB_PREMADE_TABLE.' '.$sql.',created=NOW()');
                if(!$res or !($replyID=db_insert_id()))
                    $errors['err']='Unable to create the reply. Internal error';
                else
                    $msg='Premade reply created';
            }elseif($_POST['a']=='update'){ //update
                $res=db_query('UPDATE '.KB_PREMADE_TABLE.' '.$sql.' WHERE premade_id='.db_input($_POST['id']));
                if($res && db_affected_rows()){
                    $msg='Premade reply updated';
                    $answer=db_fetch_array(db_query('SELECT * FROM '.KB_PREMADE_TABLE.' WHERE premade_id='.db_input($id)));
                }
                else
                    $errors['err']='Internal update error occured. Try again';
            }
            if($errors['err'] && db_errno()==1062)
                $errors['title']='Title already exists!';
            
        }else{
            $errors['err']=$errors['err']?$errors['err']:'Error(s) occured. Try again';
        }
        break;
    case 'process':
        if(!$_POST['canned'] || !is_array($_POST['canned']))
            $errors['err']='You must select at least one item';
        else{
            $msg='';
            $ids=implode(',',$_POST['canned']);
            $selected=count($_POST['canned']);
            if(isset($_POST['enable'])) {
                if(db_query('UPDATE '.KB_PREMADE_TABLE.' SET isenabled=1,updated=NOW() WHERE isenabled=0 AND premade_id IN('.$ids.')'))
                    $msg=db_affected_rows()." of  $selected selected replies enabled";
            }elseif(isset($_POST['disable'])) {
                if(db_query('UPDATE '.KB_PREMADE_TABLE.' SET isenabled=0, updated=NOW() WHERE isenabled=1 AND premade_id IN('.$ids.')'))
                    $msg=db_affected_rows()." of  $selected selected replies disabled";
            }elseif(isset($_POST['delete'])) {
                if(db_query('DELETE FROM '.KB_PREMADE_TABLE.' WHERE premade_id IN('.$ids.')'))
                    $msg=db_affected_rows()." of  $selected selected replies deleted";
            }

            if(!$msg)
                $errors['err']='Error occured. Try again';
        }
        break;
    default:
        $errors['err']='Unknown action';
    endswitch;
endif;
//new reply??
if(!$page && $_REQUEST['a']=='add' && !$replyID)
    $page='reply.inc.php';

    $inc=$page?$page:'premade.inc.php';

$nav->setTabActive('kbase');
$desc = $trl->translate('LABEL_PREMADE_REPLIES');
$nav->addSubMenu(array('desc'=>$desc,'href'=>'kb.php','iconclass'=>'premade'));
$desc = $trl->translate('LABEL_NEW_PREMADE_REPLY');
$nav->addSubMenu(array('desc'=>$desc,'href'=>'kb.php?a=add','iconclass'=>'newPremade'));
require_once(STAFFINC_DIR.'header.inc.php');
require_once(STAFFINC_DIR.$inc);
require_once(STAFFINC_DIR.'footer.inc.php');

?>
