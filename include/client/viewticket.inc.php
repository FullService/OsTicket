<?php
if(!defined('OSTCLIENTINC') || !is_object($thisclient) || !is_object($ticket)) die('Kwaheri'); //bye..see ya
//Double check access one last time...
if(strcasecmp($thisclient->getEmail(),$ticket->getEmail())) die($trl->translate("TEXT_ACCESS_DENIED"));

$info=($_POST && $errors)?Format::input($_POST):array(); //Re-use the post info on error...savekeyboards.org

$dept = $ticket->getDept();
//Making sure we don't leak out internal dept names
$dept=($dept && $dept->isPublic())?$dept:$cfg->getDefaultDept();
//We roll like that...
?>
<table width="100%" cellpadding="1" cellspacing="0" border="0">
    <tr><td colspan=2 width=100% class="msg"><?= $trl->translate('TEXT_TICKET_NUMBER')?> <?=$ticket->getExtId()?> 
        &nbsp;<a href="view.php?id=<?=$ticket->getExtId()?>" title="Reload"><span class="Icon refresh">&nbsp;</span></a></td></tr> 
    <tr>
       <td width=50%>	
        <table align="center" class="infotable" cellspacing="1" cellpadding="3" width="100%" border=0>
	        <tr>
				<th width="100" ><?= $trl->translate('LABEL_TICKET_NUMBER')?>:</th>
				<td><?=$ticket->getStatus()?></td>
			</tr>
            <tr>
                <th><?= $trl->translate('LABEL_DEPARTMENT')?>:</th>
                <td><?=Format::htmlchars($dept->getName())?></td>
            </tr>
			<tr>
                <th><?= $trl->translate('LABEL_CREATE_DATE')?>:</th>
                <td><?=Format::db_datetime($ticket->getCreateDate())?></td>
            </tr>
		</table>
	   </td>
	   <td width=50% valign="top">
        <table align="center" class="infotable" cellspacing="1" cellpadding="3" width="100%" border=0>
            <tr>
                <th width="100"><?= $trl->translate('LABEL_NAME')?>:</th>
                <td><?=Format::htmlchars($ticket->getName())?></td>
            </tr>
            <tr>
                <th width="100"><?= $trl->translate('LABEL_EMAIL')?>:</th>
                <td><?=$ticket->getEmail()?></td>
            </tr>
            <tr>
                <th><?= $trl->translate('LABEL_PHONE')?>:</th>
                <td><?=Format::phone($ticket->getPhoneNumber())?></td>
            </tr>
        </table>
       </td>
    </tr>
</table>
<div class="msg"><?= $trl->translate('LABEL_SUBJECT')?>: <?=Format::htmlchars($ticket->getSubject())?></div>
<div>
    <?if($errors['err']) {?>
        <p align="center" id="errormessage"><?=$errors['err']?></p>
    <?}elseif($msg) {?>
        <p align="center" id="infomessage"><?=$msg?></p>
    <?}?>
</div>
<br>
<div align="left">
    <span class="Icon thread"><?= $trl->translate('TEXT_TICKET_THREAD')?></span>
    <div id="ticketthread">
        <?
	    //get messages
        $sql='SELECT msg.*, count(attach_id) as attachments  FROM '.TICKET_MESSAGE_TABLE.' msg '.
            ' LEFT JOIN '.TICKET_ATTACHMENT_TABLE.' attach ON  msg.ticket_id=attach.ticket_id AND msg.msg_id=attach.ref_id AND ref_type=\'M\' '.
            ' WHERE  msg.ticket_id='.db_input($ticket->getId()).
            ' GROUP BY msg.msg_id ORDER BY created';
	    $msgres =db_query($sql);
	    while ($msg_row = db_fetch_array($msgres)):
		    ?>
		    <table align="center" class="message" cellspacing="0" cellpadding="1" width="100%" border=0>
		        <tr><th><?=Format::db_daydatetime($msg_row['created'])?></th></tr>
                <?if($msg_row['attachments']>0){ ?>
                <tr class="header"><td><?=$ticket->getAttachmentStr($msg_row['msg_id'],'M')?></td></tr> 
                <?}?>
                <tr class="info">
                    <td><?=Format::display($msg_row['message'])?></td></tr>
		    </table>
            <?
            //get answers for messages
            $sql='SELECT resp.*,count(attach_id) as attachments FROM '.TICKET_RESPONSE_TABLE.' resp '.
                ' LEFT JOIN '.TICKET_ATTACHMENT_TABLE.' attach ON  resp.ticket_id=attach.ticket_id AND resp.response_id=attach.ref_id AND ref_type=\'R\' '.
                ' WHERE msg_id='.db_input($msg_row['msg_id']).' AND resp.ticket_id='.db_input($ticket->getId()).
                ' GROUP BY resp.response_id ORDER BY created';
            //echo $sql;
		    $resp =db_query($sql);
		    while ($resp_row = db_fetch_array($resp)) {
                $respID=$resp_row['response_id'];
                $name=$cfg->hideStaffName()?'staff':Format::htmlchars($resp_row['staff_name']);
                ?>
    		    <table align="center" class="response" cellspacing="0" cellpadding="1" width="100%" border=0>
    		        <tr>
    			        <th><?=Format::db_daydatetime($resp_row['created'])?>&nbsp;-&nbsp;<?=$name?></th></tr>
                    <?if($resp_row['attachments']>0){ ?>
                    <tr class="header">
                        <td><?=$ticket->getAttachmentStr($respID,'R')?></td></tr>
                                    
                    <?}?>
			        <tr class="info">
				        <td> <?=Format::display($resp_row['response'])?></td></tr>
		        </table>
		    <?
		    } //endwhile...response loop.
            $msgid =$msg_row['msg_id'];
        endwhile; //message loop.
     ?>
    </div>
</div>
<div>
    <div align="center">
        <?if($_POST && $errors['err']) {?>
            <p align="center" id="errormessage"><?=$errors['err']?></p>
        <?}elseif($msg) {?>
            <p align="center" id="infomessage"><?=$msg?></p>
        <?}?>
    </div> 
    <div id="reply" style="padding:10px 0 20px 40px;">
        <?if($ticket->isClosed()) {?>
        <div class="msg"><?= $trl->translate('TEXT_TICKET_WILL_REOPEN_NEW_POST')?></div>
        <?}?>
        <form action="view.php?id=<?=$id?>#reply" name="reply" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?=$ticket->getExtId()?>">
            <input type="hidden" name="respid" value="<?=$respID?>">
            <input type="hidden" name="a" value="postmessage">
            <div align="left">
                <?= $trl->translate('TEXT_ENTER_MESSAGE')?> <font class="error">*&nbsp;<?=$errors['message']?></font><br/>
                <textarea name="message" id="message" cols="60" rows="7" wrap="soft"><?=$info['message']?></textarea>
            </div>
            <? if($cfg->allowOnlineAttachments()) {?>
            <div align="left">
                <?= $trl->translate('TEXT_ATTACH_FILE')?><br><input type="file" name="attachment" id="attachment" size=30px value="<?=$info['attachment']?>" /> 
                    <font class="error">&nbsp;<?=$errors['attachment']?></font>
            </div>
            <?}?>
            <div align="left"  style="padding:10px 0 10px 0;">
                <input class="button" type='submit' value='<?= $trl->translate('LABEL_POST_REPLY')?>' />
                <input class="button" type='reset' value='<?= $trl->translate('LABEL_RESET')?>' />
                <input class="button" type='button' value='<?= $trl->translate('LABEL_CANCEL')?>' onClick='window.location.href="view.php"' />
            </div>
        </form>
    </div>
</div>
<br><br>
