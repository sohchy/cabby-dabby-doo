<?php
	include_once('includes/connection.php');
	include_once('includes/functions.php');
?>

<!DOCTYPE HTML>
<html>

	<head>
		<link href="css/all.css" style="text/css" rel="stylesheet" />
		<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=true&libraries=places"></script>
	</head>
	<body>
		<div id="page_container">
		
			<span id="page_login">Login/Register</span>
			
			<span id="page_logout">Logout</span>
		
			<div id="login_div">
				<input type="text" name="enduser_email" id="login_div_email" />Email
				<input type="password" name="enduser_pwd" id="login_div_pwd" />Password
				<input type="submit" value="Login or Register" id="login_div_submit" />
			</div>
		
			<div id="left_panel">
				<input id="searchTextField" type="text" size="50">
			</div>
			<div id="map_canvas">
			</div>
			
			<div class="clear_divs"></div>
		</div>	
		
		
	</body>
	<script type="text/javascript" src="js/jquery164.js"></script>
	<script type="text/javascript" src="js/all4.js"></script>

</html>