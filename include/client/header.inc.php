<?php
if($cfg && is_object($cfg)){
	$cfgTitle = $cfg->getTitle();
	$title=$cfgTitle;
	$dirTitle = 'ltr';
}else{
	$title = $trl->translate('TEXT_HEADER_TITLE');
	$dirTitle = $trl->dir();
}
$dir = $trl->dir();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html dir="<?php echo $dir; ?>">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title dir="<?php echo $dirTitle;?>"><?=Format::htmlchars($title)?></title>
    <link rel="stylesheet" href="./styles/main.css" media="screen">
    <link rel="stylesheet" href="./styles/colors.css" media="screen">
    <style type="text/css">body {
	direction: <?php echo $dir; ?>;
}</style>
</head>
<body dir="<?php echo $dir; ?>">
<div id="container">
    <div id="header">
        <a id="logo" href="index.php" title="<?= $trl->translate('TEXT_SUPPORT_CENTER'); ?>"><img src="./images/logo2.jpg" border=0 alt="Support Center"></a>
        <p><?= $trl->translate('TEXT_SUPPORT_TICKET_SISTEM'); ?></p>
    </div>
    <ul id="nav">
         <?                    
         if($thisclient && is_object($thisclient) && $thisclient->isValid()) {?>
         <li><a class="log_out" href="logout.php"><?= $trl->translate('TEXT_LOG_OUT'); ?></a></li>
         <?}else {?>
         <li><a class="ticket_status" href="tickets.php"><?= $trl->translate('TEXT_TICKETS_STATUS'); ?></a></li>
         <?}?>
         <li><a class="new_ticket" href="open.php"><?= $trl->translate('TEXT_NEW_TICKET'); ?></a></li>
         <li><a class="home" href="index.php"><?= $trl->translate('TEXT_HOME'); ?></a></li>
    </ul>
    <div id="content">
