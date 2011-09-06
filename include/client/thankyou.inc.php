<?php
if(!defined('OSTCLIENTINC') || !is_object($ticket)) die('Kwaheri rafiki!'); //Say bye to our friend..

//Please customize the message below to fit your organization speak!
?>
<div>
    <?if($errors['err']) {?>
        <p align="center" id="errormessage"><?=$errors['err']?></p>
    <?}elseif($msg) {?>
        <p align="center" id="infomessage"><?=$msg?></p>
    <?}elseif($warn) {?>
        <p id="warnmessage"><?=$warn?></p>
    <?}?>
</div>
<div style="margin:5px 100px 100px 0;">
    <?=Format::htmlchars($ticket->getName())?>,<br>
    <p><?=$trl->translate('TEXT_THANKS_NEW_TICKET')?></p>
          
    <?if($cfg->autoRespONNewTicket()){ ?>
    <p><?=$trl->translate('TEXT_NEW_TICKET_AUTO_RESPONSE',$ticket->getEmail())?>
    </p>
    <?}?>
    <p><?=$trl->translate('TEXT_SUPPORT_TEAM')?></p>
</div>
<?
unset($_POST); //clear to avoid re-posting on back button??
?>
