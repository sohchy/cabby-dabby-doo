<?php

	include_once('connection.php');

	if(isset($_GET["lat"]) && isset($_GET["long"])) {
	
		$lat = mysql_real_escape_string($_GET["lat"];
		$long = mysql_real_escape_string($_GET["long"]);
		
	
	} else {
	
		echo "ERROR - did not receive lat, long values";
	}



?>