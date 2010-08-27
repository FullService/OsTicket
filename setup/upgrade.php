<?php
/*********************************************************************
    upgrade.php

    osTicket upgrade script

    Peter Rotich <peter@osticket.com>
    Copyright (c)  2006,2007,2008,2009 osTicket
    http://www.osticket.com

    Released under the GNU General Public License WITHOUT ANY WARRANTY.
    See LICENSE.TXT for details.

    vim: expandtab sw=4 ts=4 sts=4:
    $Id: upgrade.php,v 1.1.2.1 2009/08/17 19:22:54 carlos.delfino Exp $
**********************************************************************/
if(!file_exists('../main.inc.php')) die('Fatal error..get tech support');
require_once('../main.inc.php');
require_once('setup.inc.php');
require_once(INCLUDE_DIR.'class.staff.php');

//Only admins can upgrade the system.
$thisuser = new StaffSession($_SESSION['_staff']['userID']); /*always reload???*/
if(!is_object($thisuser) || !$thisuser->getId() || !$thisuser->isValid() || !$thisuser->isadmin()){
    $_SESSION['_staff']['auth']['dest']=THISPAGE;
    $_SESSION['_staff']['auth']['msg']='Admin access level required.';
    session_write_close();
    session_regenerate_id();
    header('Location: ../scp/login.php');
    exit;
}

//Let's roll.
$errors=array();
$fp=null;
define('VERSION','1.6 RC5'); //Current version number
define('SCHEMAFILE','./inc/v16rc5.sql'); //osTicket upgrade SQL schema.
define('PREFIX',TABLE_PREFIX);

$info='<strong>Need help?</strong> <a href="http://www.osticket.com/support/" target="_blank">Don\'t panic - Professional Upgrade Available!</a>';
//Basic checks 
$inc='upgrade.inc.php';
if(!strcasecmp($cfg->getVersion(),VERSION)) {
    $errors['err']=' Nothing to do! System already upgraded';
    $inc='upgradedone.inc.php';
}elseif($_SESSION['abort']){
    die('Upgrade already aborted! Restore previous version and start all over again (logout required) or get help.');
}elseif((double)phpversion()<4.3){ //Old PHP installation
    $errors['err']='PHP installation seriously out of date';
    $inc='php.inc.php';
}elseif(!ini_get('short_open_tag')) {
    $errors['err']='Short open tag disabled! - osTicket requires it turned on.';
    $inc='shortopentag.inc.php';
}elseif($_POST && !$errors){
    $vars=$errors=array();
    //Get database schema
    if(!file_exists(SCHEMAFILE) || !($schema=file_get_contents(SCHEMAFILE))) {
        $errors['err']='Internal error. Please make sure your download is the latest';
        $errors[]='Error accessing SQL schema';
    }else{
        //Loadup SQL schema.
        $queries =array_map('replace_table_prefix',array_filter(array_map('trim',explode(';',$schema)))); //Don't fail me bro!
        if($queries && count($queries)) {
            //get info we need from DB b4 we start altering it.
            $result=db_query('SELECT alert_email,noreply_email,api_whitelist,api_key,default_dept FROM '.CONFIG_TABLE.' WHERE id=1');
            if($result && db_num_rows($result)) {
                $vars=db_fetch_array($result);
                @mysql_query('SET SESSION SQL_MODE =""');
                foreach($queries as $k=>$sql) {
                    if(!mysql_query($sql)){
                        //Aborting on error.
                        $errors['err']='Invalid SQL schema. Get help from Developers';
                        $errors['sql']="[$sql] - ".mysql_error();
                        break;
                    }
                }
            }else{
                $errors['err']='Error accessing current config table';
            }
        }else{
            $errors['err']='Error parsing SQL schema! Get help from developers';
        }
   
        if(!$errors) {
            
            //update version.
            db_query('UPDATE '.CONFIG_TABLE.' SET ostversion='.db_input(VERSION));
            //API keys
            $ips=array_filter(explode(',',ereg_replace(' ','',$vars['api_whitelist'])));
            foreach($ips as $ip) {
                $sql='INSERT INTO '.PREFIX.'api_key SET created=NOW(), updated=NOW(), isactive=1 '.
                     ',ipaddr='.db_input($ip).
                     ',apikey='.db_input(strtoupper(md5($ip.md5($vars['api_key']))));
                db_query($sql);
            }

            //get pop info into the improved table.
            $sql='SELECT pop3.* FROM '.PREFIX.'email email INNER JOIN '.PREFIX.'email_pop3 pop3 USING(email_id)';
            if(($result=db_query($sql)) && db_num_rows($result)) {
                //We are disabling mail fetching on purpose
                while($row=db_fetch_array($result)) {
                    $sql='UPDATE '.EMAIL_TABLE.' SET updated=NOW(), mail_protocol="POP",mail_encryption="NONE",mail_port=110,mail_active=0 '.
                         ',mail_host='.db_input($row['pophost']).
                         ',mail_fetchfreq='.db_input($row['fetchfreq']).
                         ',mail_delete='.db_input($row['delete_msgs']).
                         ',userid='.db_input($row['popuser']).
                         ',userpass='.db_input($row['poppasswd']?Misc::encrypt($row['poppasswd'],SECRET_SALT):'').
                         ' WHERE email_id='.db_input($row['email_id']);
                    db_query($sql);
                }
            }

            $deptId=$vars['default_dept']?$vars['default_dept']:1; //Default dept.
            //Move alert and noreply emails to email table.
            $sql='INSERT INTO '.PREFIX.'email SET created=NOW(), updated=NOW(), priority_id=2 '.
                 ',dept_id='.db_input($deptId).',name='.db_input('osTicket Alerts').',email='.db_input($vars['alert_email']);
            if(db_query($sql) && ($alertId=db_insert_id()))
                db_query('UPDATE '.PREFIX.'config SET alert_email_id='.db_input($alertId));

            $sql='INSERT INTO '.PREFIX.'email SET created=NOW(), updated=NOW(), priority_id=2 '.
                 ',dept_id='.db_input($deptId).',name='.db_input('').',email='.db_input($vars['noreply_email']);
            if(db_query($sql) && ($noreplyId=db_insert_id()))
                db_query('UPDATE '.PREFIX.'department  SET autoresp_email_id='.db_input($noreplyId).' WHERE noreply_autoresp=1');

            //Url path & variables changes on templates.
            $sql='SELECT tpl_id,ticket_autoresp_body,message_autoresp_body,ticket_overlimit_body,ticket_reply_body FROM '.PREFIX.'email_template';
            if(($result=db_query($sql)) && db_num_rows($result)) {
                while($row=db_fetch_array($result)) {
                    $ticket_reply=str_replace('%message','%response',str_replace('view.php','tickets.php',$row['ticket_reply_body']));
                    $sql='UPDATE '.PREFIX.'email_template SET updated=NOW() '.
                         ',ticket_autoresp_body='.db_input(str_replace('view.php','tickets.php',$row['ticket_autoresp_body'])).
                         ',message_autoresp_body='.db_input(str_replace('view.php','tickets.php',$row['message_autoresp_body'])).
                         ',ticket_overlimit_body='.db_input(str_replace('view.php','tickets.php',$row['ticket_overlimit_body'])).
                         ',ticket_reply_body='.db_input($ticket_reply).
                         ' WHERE tpl_id='.db_input($row['tpl_id']);
                    db_query($sql);
                }
            }

            //Drops.
            db_query('ALTER TABLE '.PREFIX.'department DROP `noreply_autoresp`');
            db_query('ALTER TABLE '.PREFIX.'config DROP `noreply_email` ,DROP `alert_email` ,DROP `api_whitelist`');
            db_query('TRUNCATE TABLE '.PREFIX.'email_pop3');
            db_query('DROP TABLE '.PREFIX.'email_pop3');

            //Log a message.
            $log=sprintf("Congratulations osTicket upgraded to version %s by %s \n\nThank you for choosing osTicket!",VERSION,$thisuser->getName());
            $sql='INSERT INTO '.PREFIX.'syslog SET created=NOW(),updated=NOW() '.
                 ',title="osTicket installed!",log_type="Debug" '.
                 ',log='.db_input($log).
                 ',ip_address='.db_input($_SERVER['REMOTE_ADDR']);
            mysql_query($sql);

            //Create a ticket
            $sql='INSERT INTO '.PREFIX.'ticket SET created=NOW(),ticketID='.db_input(Misc::randNumber(6)).
                 ',dept_id='.db_input($cfg->getDefaultDeptId()).
                 ",priority_id=2,email='support@osticket.com',name='osTicket Support' ".
                 ",subject='osTicket Upgraded!',topic='osTicket Support',status='open',source='Web'";
            if(db_query($sql) && ($id=db_insert_id())){
                $sql='INSERT INTO '.PREFIX.'ticket_message SET created=NOW(), updated=NOW(), source="Web" '.
                     ',ticket_id='.db_input($id).
                     ',message='.db_input(OSTICKET_UPGRADED);
                db_query($sql);
            }

            //Report the good news.
            $inc='upgradedone.inc.php';
            $msg='osTicket upgraded to version '.VERSION;
        }
        
        if($errors) { //Something really bad went wrong...
             $inc='abortedupgrade.inc.php';
             $errors['err']=$errors['err']?$errors['err']:'Yikes! upgrade error(s) occured';
             $_SESSION['abort']=true;
        }

    }
}
$title=sprintf('osTicket upgrade wizard v %s',VERSION);
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<title>osTicket upgrade wizard</title>
<link rel="stylesheet" href="style.css" media="screen">
</head>
<body>
<div id="container">
    <div id="header">
        <a id="logo" href="#" title="osTicket"><img src="images/ostlogo.jpg" width="188" height="72" alt="osTicket Upgrade Wizard"></a>
        <p id="info"><?=$info?></p>
    </div>
    <div id="nav">
        <ul id="sub_nav">
            <li><?=$title?></li>
        </ul>
    </div>
    <div class="clear"></div>
    <div id="content" width="100%" height="100%">
       <div>
            <?if($errors['err']) {?>
                <p align="center" id="errormessage"><?=$errors['err']?></p>
            <?}elseif($msg) {?>
                <p align="center" id="infomessage"><?=$msg?></p>
            <?}elseif($warn) {?>
                <p align="center" id="warnmessage"><?=$warn?></p>
            <?}?>
        </div>
        <div style="padding:0 3px 5px 3px;">
        <?php
            if(file_exists("./inc/$inc"))
                require("./inc/$inc");
            else
                echo '<span class="error">Invalid path - get technical support</span>';
        ?>
        </div>
    </div>
    <div id="footer">Copyright &copy; <?=date('Y')?>&nbsp;osTicket.com. &nbsp;All Rights Reserved.</div>
</div>
</body>
</html>
