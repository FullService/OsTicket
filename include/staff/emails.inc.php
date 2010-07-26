<?php
if(!defined('OSTADMININC') || !$thisuser->isadmin()) die('Access Denied');
//List all EMAILS
$sql='SELECT email.email_id,email,name,email.noautoresp,email.dept_id,dept_name,priority_desc,email.created,email.updated '.
     ' FROM '.EMAIL_TABLE.' email '.
     ' LEFT JOIN '.DEPT_TABLE.' dept ON dept.dept_id=email.dept_id '.
     ' LEFT JOIN '.TICKET_PRIORITY_TABLE.' pri ON pri.priority_id=email.priority_id ';
$emails=db_query($sql.' ORDER BY email'); 
?>
 <div class="msg">Emails</div>
 <table width="100%" border="0" cellspacing=0 cellpadding=0>
    <form action="admin.php?t=email" method="POST" name="email" onSubmit="return checkbox_checker(document.forms['email'],1,0);">
    <input type='hidden' name='t' value='email'>
    <input type=hidden name='do' value='mass_process'>
    <tr><td>
    <table border="0" cellspacing=0 cellpadding=2 class="dtable" align="center" width="100%">
        <tr>
	        <th width="7px">&nbsp;</th>
	        <th>Email Address</th>
            <th>AutoResp.</th>
            <th>Department</th>
            <th>Priority</th>
	        <th>Last Updated</th>
        </tr>
        <?
        $class = 'row1';
        $total=0;
        $ids=($errors && is_array($_POST['ids']))?$_POST['ids']:null;
        if($emails && db_num_rows($emails)):
            $defaultID=$cfg->getDefaultEmailId();
            while ($row = db_fetch_array($emails)) {
                $sel=false;
                if($ids && in_array($row['email_id'],$ids)){
                    $class="$class highlight";
                    $sel=true;
                }
                if($row['name']) {
                    $row['email']=$row['name'].' <'.$row['email'].'>';
                }
                ?>
            <tr class="<?=$class?>" id="<?=$row['email_id']?>">
                <td width=7px>
                 <input type="checkbox" name="ids[]" value="<?=$row['email_id']?>" <?=$sel?'checked':''?>  
                    <?=($defaultID==$row['email_id'])?'disabled':''?>   onClick="highLight(this.value,this.checked);">
                <td><a href="admin.php?t=email&id=<?=$row['email_id']?>"><?=Format::htmlchars($row['email'])?></a></td>
                <td>&nbsp;&nbsp;<?=$row['noautoresp']?'No':'<b>Yes</b>'?></td>
                <td><a href="admin.php?t=dept&id=<?=$row['dept_id']?>"><?=Format::htmlchars($row['dept_name'])?></a></td>
                <td><?=$row['priority_desc']?></td>
                <td><?=Format::db_datetime($row['updated'])?></td>
            </tr>
            <?
            $class = ($class =='row2') ?'row1':'row2';
            } //end of while.
        else: ?> 
            <tr class="<?=$class?>"><td colspan=6><b>Query returned 0 results</b></td></tr>
        <?
        endif; ?>
    </table>
   </td></tr>
    <?
    if(db_num_rows($emails)>0): //Show options..
     ?>
    <tr>
        <td style="padding-left:20px">
            Select:&nbsp;
            <a href="#" onclick="return select_all(document.forms['email'],true)">All</a>&nbsp;
            <a href="#" onclick="return reset_all(document.forms['email'])">None</a>&nbsp;
            <a href="#" onclick="return toogle_all(document.forms['email'],true)">Toggle</a>&nbsp;
        </td>
    </tr>
    <tr>
        <td align="center">
            <input class="button" type="submit" name="delete" value="Delete Selected Emails" 
                onClick=' return confirm("Are you sure you want to DELETE selected emails?");'>
        </td>
    </tr>
    <?
    endif;
    ?>
  </form>
</table>
