<h1>Configuration file permission settings</h1>
<p>osTicket installer requires ability to write to the configuration file. A template copy of the file, <i>settings.php</i>, is located in the <i>include</i> directory (<i>include/settings.php</i>). Please follow the instructions below to give read and write access to the web server.</p>
<h4>Shh/Telnet</h4>
<p>chmod 777 include/settings.php</p>
<h4>FTP</h4>
<p>Using WS_FTP this would be right hand clicking on the file settings.php , selecting chmod, and then giving all permissions to the file.</p>
<h4>Cpanel</h4>
<p>Click on the file, select change permission, and then giving all permissions to the file.</p>
<br/>
<div align="center"><b><a href="install.php">Done? Continue&raquo;</a></b></div>
