<h1>Upgrade Aborted</h1>
<p>Upgrade aborted due to errors. Any errors at this stage are fatal, note the error(s) below and contact us for help.</p>
<ul class="error">   
<?php
foreach($errors as $k=>$error) {
    if($k!='err') echo sprintf('<li>%s</li>',$error);    
}?>
</ul>
<br><br><br><br>

  
