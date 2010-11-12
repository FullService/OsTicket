<? if(!defined('OSTSCPINC') || !is_object($thisuser) || !$thisuser->isStaff() || !is_object($nav)) die('Access Denied'); 
$trl->sendHeader();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="<?php echo $trl->getLang(); ?>">
<head>
<meta http-equiv="content-type" content="text/html; charset=<?php echo $trl->getCodePage();?>">
<?php
if(defined('AUTO_REFRESH') && is_numeric(AUTO_REFRESH_RATE) && AUTO_REFRESH_RATE>0){ //Refresh rate
echo '<meta http-equiv="refresh" content="'.AUTO_REFRESH_RATE.'" />';
}
?>
<title>osTicket :: Staff Control Panel</title>
<link rel="stylesheet" href="css/main.css" media="screen">
<link rel="stylesheet" href="css/style.css" media="screen">
<link rel="stylesheet" href="css/tabs.css" type="text/css">
<link rel="stylesheet" href="css/autosuggest_inquisitor.css" type="text/css" media="screen" charset="utf-8" />
<script type="text/javascript" src="js/ajax.js"></script>
<script type="text/javascript" src="js/scp.js"></script>
<script type="text/javascript" src="js/tabber.js"></script>
<script type="text/javascript" src="js/calendar.js"></script>
<script type="text/javascript" src="js/bsn.AutoSuggest_2.1.3.js" charset="utf-8"></script>
<?php
if($cfg && $cfg->getLockTime()) { //autoLocking enabled.?>
<script type="text/javascript" src="js/autolock.js" charset="utf-8"></script>
<?}?>
</head>
<body>
<?php
if($sysnotice){?>
<div id="system_notice"><?php echo $sysnotice; ?></div>
<?php 
}?>
<div id="container">
    <div id="header">
        <a id="logo" href="index.php" title="osTicket"><img src="images/ostlogo.jpg" width="188" height="72" alt="osTicket"></a>
        <p id="info"><?php echo $trl->translate('TEXT_WELCOME_BACK_STAFF',$thisuser->getUsername()); ?> 
           <?php
            if($thisuser->isAdmin() && !defined('ADMINPAGE')) { ?>
            | <a href="admin.php">Admin Panel</a> 
            <?}else{?>
            | <a href="index.php">Staff Panel</a>
            <?}?>
            | <a href="profile.php?t=pref">My Preference</a> | <a href="logout.php">Log Out</a></p>
    </div>
    <div id="nav">
        <ul id="main_nav" <?=!defined('ADMINPAGE')?'class="dist"':''?>>
            <?
            if(($tabs=$nav->getTabs()) && is_array($tabs)){
             foreach($tabs as $tab) { ?>
                <li><a <?=$tab['active']?'class="active"':''?> href="<?=$tab['href']?>" title="<?=$tab['title']?>"><?=$tab['desc']?></a></li>
            <?}
            }else{ //?? ?>
                <li><a href="profile.php" title="My Preference">My Account</a></li>
            <?}?>
        </ul>
        <ul id="sub_nav">
            <?php
            if(($subnav=$nav->getSubMenu()) && is_array($subnav)){
              foreach($subnav as $item) { ?>
                <li><a class="<?=$item['iconclass']?>" href="<?=$item['href']?>" title="<?=$item['title']?>"><?=$item['desc']?></a></li>
              <?}
            }?>
        </ul>
    </div>
    <div class="clear"></div>
    <div id="content" width="100%">

