
</div> 
</div>
<div id="footer">Copyright &copy; 2006-<?=date('Y')?>&nbsp;osTicket.com. &nbsp;All Rights Reserved.</div>
<?if(is_object($thisuser) && $thisuser->isStaff()) {?>
<div>
    <!-- Do not remove <img src="autocron.php" alt="" width="1" height="1" border="0" /> or your auto cron will cease to function -->
    <img src="autocron.php" alt="" width="1" height="1" border="0" />
    <!-- Do not remove <img src="autocron.php" alt="" width="1" height="1" border="0" /> or your auto cron will cease to function -->
</div>
<?}?>
</div>
</body>
</html>
