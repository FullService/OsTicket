<?php
if(!defined('OSTCLIENTINC') || !is_object($thisclient) || !$thisclient->isValid()) die('Kwaheri');

global $trl; 

//Get ready for some deep shit.
$qstr='&'; //Query string collector
$status=null;
if($_REQUEST['status']) { //Query string status has nothing to do with the real status used below.
    $qstr.='status='.urlencode($_REQUEST['status']);
    //Status we are actually going to use on the query...making sure it is clean!
    switch(strtolower($_REQUEST['status'])) {
     case 'open':
     case 'closed':
        $status=$_REQUEST['status'];
        break;
     default:
        $status=''; //ignore
    }
}

//Restrict based on email of the user...STRICT!
$qwhere =' WHERE email='.db_input($thisclient->getEmail());

//STATUS
if($status){
    $qwhere.=' AND status='.db_input($status);    
}
//Admit this crap sucks...but who cares??
$sortOptions=array('date'=>'ticket.created','ID'=>'ticketID','pri'=>'priority_id','dept'=>'dept_name');
$orderWays=array('DESC'=>'DESC','ASC'=>'ASC');

//Sorting options...
if($_REQUEST['sort']) {
        $order_by =$sortOptions[$_REQUEST['sort']];
}
if($_REQUEST['order']) {
    $order=$orderWays[$_REQUEST['order']];
}
if($_GET['limit']){
    $qstr.='&limit='.urlencode($_GET['limit']);
}

$order_by =$order_by?$order_by:'ticket.created';
$order=$order?$order:'DESC';
$pagelimit=$_GET['limit']?$_GET['limit']:PAGE_LIMIT;
$page=($_GET['p'] && is_numeric($_GET['p']))?$_GET['p']:1;

$qselect = 'SELECT ticket.ticket_id,ticket.ticketID,ticket.dept_id,isanswered,ispublic,subject,name,email '.
           ',dept_name,status,source,priority_id ,ticket.created ';
$qfrom=' FROM '.TICKET_TABLE.' ticket LEFT JOIN '.DEPT_TABLE.' dept ON ticket.dept_id=dept.dept_id ';
//Pagenation stuff....wish MYSQL could auto pagenate (something better than limit)
$total=db_count('SELECT count(*) '.$qfrom.' '.$qwhere);
$pageNav=new Pagenate($total,$page,$pagelimit,$trl);
$pageNav->setURL('view.php',$qstr.'&sort='.urlencode($_REQUEST['sort']).'&order='.urlencode($_REQUEST['order']));

//Ok..lets roll...create the actual query
$qselect.=' ,count(attach_id) as attachments ';
$qfrom.=' LEFT JOIN '.TICKET_ATTACHMENT_TABLE.' attach ON  ticket.ticket_id=attach.ticket_id ';
$qgroup=' GROUP BY ticket.ticket_id';
$query="$qselect $qfrom $qwhere $qgroup ORDER BY $order_by $order LIMIT ".$pageNav->getStart().",".$pageNav->getLimit();
//echo $query;
$tickets_res = db_query($query);
$showing=db_num_rows($tickets_res)?$pageNav->showing():"";
$results_type=($status)?ucfirst($status).' Tickets':' All Tickets';
$negorder=$order=='DESC'?'ASC':'DESC'; //Negate the sorting..
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
<div style="margin: 10px 0 60px 0;">
 <table width="100%" border="0" cellspacing=0 cellpadding=0 align="center">
    <tr>
        <td width="60%" class="msg"><?=$showing?>&nbsp;&nbsp;<?=$results_type?></td>
        <td nowrap >
            <a href="view.php?status=open"><img src="images/view_open_btn.gif" alt="<?= $trl->translate('TEXT_VIEW_OPEN')?>" border=0></a>            
            <a href="view.php?status=closed"><img src="images/view_closed_btn.gif" alt="<?= $trl->translate('TEXT_VIEW_CLOSED')?>" border=0></a>            
            <a href=""><img src="<?php tei('IMAGE_STAFF_REFRESH')?>" alt="<?= $trl->translate('TEXT_REFRESH')?>" border=0></a>
        </td>
    </tr>
 </table>
 <table width="100%" border="0" cellspacing=0 cellpadding=2>
    <tr><td>
     <table border="0" cellspacing=0 cellpadding=2 class="tgrid" align="center">
        <tr>
	        <th width="70" nowrap>
                <a href="view.php?sort=ID&order=<?=$negorder?><?=$qstr?>" title="<?= $trl->translate('TEXT_SORT_BY_TICKET_ID')?> <?=$negorder?>"><?= $trl->translate('LABEL_TICKET_NUMBER')?></a></th>
	        <th width="100">
                <a href="view.php?sort=date&order=<?=$negorder?><?=$qstr?>" title="<?= $trl->translate('TEXT_SORT_BY_DATE')?> <?=$negorder?>"><?= $trl->translate('LABEL_CREATE_DATE')?></a></th>
            <th width="60"><?= $trl->translate('LABEL_TICKET_STATUS')?></th>
            <th width="240"><?= $trl->translate('LABEL_SUBJECT')?></th>
            <th width="150">
                <a href="view.php?sort=dept&order=<?=$negorder?><?=$qstr?>" title="<?= $trl->translate('TEXT_SORT_BY_DEPARTMENT')?> <?=$negorder?>"><?= $trl->translate('LABEL_DEPARTMENT')?></a></th>
            <th width="150"><?= $trl->translate('LABEL_EMAIL')?></th>
        </tr>
        <?
        $class = "row1";
        $total=0;
        if($tickets_res && ($num=db_num_rows($tickets_res))):
            $defaultDept=Dept::getDefaultDeptName();
            while ($row = db_fetch_array($tickets_res)) {
                $dept=$row['ispublic']?$row['dept_name']:$defaultDept; //Don't show hidden/non-public depts.
                $subject=Format::htmlchars(Format::truncate($row['subject'],40));
                $ticketID=$row['ticketID'];
                if($row['isanswered'] && !strcasecmp($row['status'],'open')) {
                    $subject="<b>$subject</b>";
                    $ticketID="<b>$ticketID</b>";
                }
                ?>
            <tr class="<?=$class?> " id="<?=$row['ticketID']?>">
                <td align="center" title="<?=$row['email']?>" nowrap>
                    <a class="Icon <?=strtolower($row['source'])?>Ticket" title="<?=$row['email']?>" href="view.php?id=<?=$row['ticketID']?>">
                        <?=$ticketID?></a></td>
                <td nowrap>&nbsp;<?=Format::db_date($row['created'])?></td>
                <td>&nbsp;<?=ucfirst($row['status'])?></td>
                <td>&nbsp;<a href="view.php?id=<?=$row['ticketID']?>"><?=$subject?></a>
                    &nbsp;<?=$row['attachments']?"<span class='Icon file'>&nbsp;</span>":''?></td>
                <td nowrap>&nbsp;<?=Format::truncate($dept,30)?></td>
                <td>&nbsp;<?=Format::truncate($row['email'],40)?></td>
            </tr>
            <?
            $class = ($class =='row2') ?'row1':'row2';
            } //end of while.
        else: //not tickets found!! ?> 
            <tr class="<?=$class?>"><td colspan=7><b><?= $trl->translate('TEXT_NO_TICKETS_FOUND')?></b></td></tr>
        <?
        endif; ?>
     </table>
    </td></tr>
    <tr><td>
    <?
    if($num>0 && $pageNav->getNumPages()>1){ //if we actually had any tickets returned?>
     <tr><td style="text-align:left;padding-left:20px">page:<?=$pageNav->getPageLinks()?>&nbsp;</td></tr>
    <?}?>
 </table>
</div>
<?
