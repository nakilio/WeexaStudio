<?php 
mysql_connect('127.0.0.1','extremcr','19910617'); 
$query ="SELECT user_password FROM phpbb_users where username='Monofal'"; 
   $result = mysql_query($query);
echo $result;
?> 