<?php
if(!defined('OSTADMININC') || !$thisuser->isadmin()) die('Access Denied');
$info=null;
if($dept && $_REQUEST['a']!='new'){
    //Editing Department.
    $title='Update Department';
    $action='update';
    $info=$dept->getInfo();
}else {
    $title='New Department';
    $action='create';
    $info['ispublic']=isset($info['ispublic'])?$info['ispublic']:1;
    $info['ticket_auto_response']=isset($info['ticket_auto_response'])?$info['ticket_auto_response']:1;
    $info['message_auto_response']=isset($info['message_auto_response'])?$info['message_auto_response']:1;
}
$info=($errors && $_POST)?Format::input($_POST):Format::htmlchars($info);

?>
<div class="msg"><?=$title?></div>
<table width="100%" border="0" cellspacing=0 cellpadding=0>
 <form action="admin.php?t=dept&id=<?=$info['dept_id']?>" method="POST" name="dept">
 <input type="hidden" name="do" value="<?=$action?>">
 <input type="hidden" name="a" value="<?=Format::htmlchars($_REQUEST['a'])?>">
 <input type="hidden" name="t" value="dept">
 <input type="hidden" name="dept_id" value="<?=$info['dept_id']?>">
 <tr><td>
    <table width="100%" border="0" cellspacing=0 cellpadding=2 class="tform">
        <tr class="header"><td colspan=2>Department</td></tr>
        <tr class="subheader"><td colspan=2 >Dept depends on email &amp; help topics settings for incoming tickets.</td></tr>
        <tr><th>Dept Name:</th>
            <td><input type="text" name="dept_name" size=25 value="<?=$info['dept_name']?>">
                &nbsp;<font class="error">*&nbsp;<?=$errors['dept_name']?></font>
                    
            </td>
        </tr>
        <tr>
            <th>Dept Email:</th>
            <td>
                <select name="email_id">
                    <option value=""><?= $trl->translate('TEXT_SELECT_ONE_TOPIC') ?></option>
                    <?
                    $emails=db_query('SELECT email_id,email,name,smtp_active FROM '.EMAIL_TABLE);
                    while (list($id,$email,$name,$smtp) = db_fetch_row($emails)){
                        $email=$name?"$name &lt;$email&gt;":$email;
                        if($smtp)
                            $email.=' (SMTP)';
                        ?>
                     <option value="<?=$id?>"<?=($info['email_id']==$id)?'selected':''?>><?=$email?></option>
                    <?
                    }?>
                 </select>
                 &nbsp;<font class="error">*&nbsp;<?=$errors['email_id']?></font>&nbsp;(outgoing email)
            </td>
        </tr>    
        <? if($info['dept_id']) { //update 
            $users= db_query('SELECT staff_id,CONCAT_WS(" ",firstname,lastname) as name FROM '.STAFF_TABLE.' WHERE dept_id='.db_input($info['dept_id']));
            ?>
        <tr>
            <th>Dep Manager:</th>
            <td>
                <?if($users && db_num_rows($users)) {?>
                <select name="manager_id">
                    <option value=0 >-------None-------</option>
                    <option value=0 disabled >Select Manager (optional)</option>
                     <?
                     while (list($id,$name) = db_fetch_row($users)){ ?>
                        <option value="<?=$id?>"<?=($info['manager_id']==$id)?'selected':''?>><?=$name?></option>
                     <?}?>
                     
                </select>
                 <?}else {?>
                       No Users (Add Users)
                       <input type="hidden" name="manager_id"  value="0" />
                 <?}?>
                    &nbsp;<font class="error">&nbsp;<?=$errors['manager_id']?></font>
            </td>
        </tr>
        <?}?>
        <tr><th>Dept Type</th>
            <td>
                <input type="radio" name="ispublic"  value="1"   <?=$info['ispublic']?'checked':''?> />Public
                <input type="radio" name="ispublic"  value="0"   <?=!$info['ispublic']?'checked':''?> />Private (Hidden)
                &nbsp;<font class="error"><?=$errors['ispublic']?></font>
            </td>
        </tr>
        <tr>
            <th valign="top"><br/>Dept Signature:</th>
            <td>
                <i>Required when Dept is public</i>&nbsp;&nbsp;&nbsp;<font class="error"><?=$errors['dept_signature']?></font><br/>
                <textarea name="dept_signature" cols="21" rows="5" style="width: 60%;"><?=$info['dept_signature']?></textarea>
                <br>
                <input type="checkbox" name="can_append_signature" <?=$info['can_append_signature'] ?'checked':''?> > 
                can be appended to responses.&nbsp;(available as a choice for public departments)  
            </td>
        </tr>
        <tr><th>Email Templates:</th>
            <td>
                <select name="tpl_id">
                    <option value=0 disabled>Select Template</option>
                    <option value="0" selected="selected">System Default</option>
                    <?
                    $templates=db_query('SELECT tpl_id,name FROM '.EMAIL_TEMPLATE_TABLE.' WHERE tpl_id!='.db_input($cfg->getDefaultTemplateId()));
                    while (list($id,$name) = db_fetch_row($templates)){
                        $selected = ($info['tpl_id']==$id)?'SELECTED':''; ?>
                        <option value="<?=$id?>"<?=$selected?>><?=Format::htmlchars($name)?></option>
                    <?
                    }?>
                </select><font class="error">&nbsp;<?=$errors['tpl_id']?></font><br/>
                <i>Used for outgoing emails,alerts and notices to user and staff.</i>
            </td>
        </tr>
        <tr class="header"><td colspan=2>Autoresponders</td></tr>
        <tr class="subheader"><td colspan=2>
            Global auto-response settings in preference section must be enabled for Dept 'Enable' setting to take effect.
            </td>
        </tr>
        <tr><th>New Ticket:</th>
            <td>
                <input type="radio" name="ticket_auto_response"  value="1"   <?=$info['ticket_auto_response']?'checked':''?> />Enable
                <input type="radio" name="ticket_auto_response"  value="0"   <?=!$info['ticket_auto_response']?'checked':''?> />Disable
            </td>
        </tr>
        <tr><th>New Message:</th>
            <td>
                <input type="radio" name="message_auto_response"  value="1"   <?=$info['message_auto_response']?'checked':''?> />Enable
                <input type="radio" name="message_auto_response"  value="0"   <?=!$info['message_auto_response']?'checked':''?> />Disable
            </td>
        </tr>
        <tr>
            <th>Auto Response Email:</th>
            <td>
                <select name="autoresp_email_id">
                    <option value="0" disabled><?= $trl->translate('TEXT_SELECT_ONE_TOPIC') ?></option>
                    <option value="0" selected="selected">Dept Email (above)</option>
                    <?
                    $emails=db_query('SELECT email_id,email,name,smtp_active FROM '.EMAIL_TABLE.' WHERE email_id!='.db_input($info['email_id']));
                    if($emails && db_num_rows($emails)) {
                        while (list($id,$email,$name,$smtp) = db_fetch_row($emails)){
                            $email=$name?"$name &lt;$email&gt;":$email;
                            if($smtp)
                                $email.=' (SMTP)';
                            ?>
                            <option value="<?=$id?>"<?=($info['autoresp_email_id']==$id)?'selected':''?>><?=$email?></option>
                        <?
                        }
                    }?>
                 </select>
                 &nbsp;<font class="error">&nbsp;<?=$errors['autoresp_email_id']?></font>&nbsp;<br/>
                 <i>Email address used to send auto-responses, if enabled.</i>
            </td>
        </tr>
    </table>
    </td></tr>
    <tr><td style="padding:10px 0 10px 200px;">
        <input class="button" type="submit" name="submit" value="Submit">
        <input class="button" type="reset" name="reset" value="Reset">
        <input class="button" type="button" name="cancel" value="Cancel" onClick='window.location.href="admin.php?t=dept"'>
    </td></tr>
    </form>
</table>
