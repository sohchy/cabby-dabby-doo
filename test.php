<?php
	if(!$_SESSION){
		session_start();
	}

	include_once('includes/connection.php');
	include_once('includes/functions.php');
?>




<!DOCTYPE HTML>
<html>
	<head>
		<link href="css/all5.css" style="text/css" rel="stylesheet" />
		<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=true&libraries=places"></script>
	</head>
	<body>
		<div id="page_container">
		
			<input id="searchTextField" type="text" size="50">

			
			<div id="left_panel">
			
				<div id="pick_me_up_current_address" class="left_panel_enduser">
					<span>Some current address</span>
				</div>	
				
				<div id="my_destination_address" class="left_panel_enduser">
					<span>Some destination address</span>
				</div>
				
				<div id="pinging_the_server_enduser" class="left_panel_enduser">
					<span>Trying to find a cab near you ...</span>
				</div>
				
				
			
			
			</div>
			<div id="map_canvas">
			</div>
			
			<div class="clear_divs"></div>
		</div>	
		
		
	</body>
	<script type="text/javascript" src="js/all5.js"></script>

</html>