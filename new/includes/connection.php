<?php

	$db_user = 'jlicozck_admin1';
	$db_password = 'b0ndf1re';
	$db_hostname = 'localhost';
	
	$db_name = 'jlicozck_db1';
	
	$db_connect = mysql_connect($db_hostname, $db_user, $db_password);
	
	$db_select = mysql_select_db($db_name, $db_connect);

?>