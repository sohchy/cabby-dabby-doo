<?php
if(!$_SESSION){
	session_start();
}

include_once('includes/connection.php');

// what is the id of the cabbie/


//have a simple login page for cabbies to be whichever cabbie they want
if(isset($_GET["cabbie_id"])){
	$cabbie_id = $_GET["cabbie_id"];
} else {
	$cabbie_id = 83;
}


//echo "Distance between customer ($user_id_enduser) and me ($cabbie_id) is :" . $distance;



?>



<!DOCTYPE HTML>

<!-- GET LAT, LONG FROM DB and SHOW ACTUAL locations of cabbies -->
<html>
	<head>
		<link href="css/all5.css" style="text/css" rel="stylesheet" />
		<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=true&libraries=places"></script>
	</head>
	<body>
		<div id="page_container">
			
			<div id="who_am_i" class="who_am_i"><?php echo "I'm Cabbie #".$cabbie_id;  ?></div>
			
			<div id="left_panel">
			
				<div id="cab_at_current_address" class="left_panel_enduser">
					<span>Some current address</span>
				</div>	
				
				<div id="cab_destination_address" class="left_panel_enduser">
					<span>Some destination address</span>
				</div>
				
				<div id="pinging_the_server_cab" class="left_panel_enduser">
					<span>Trying to find you a customer, near you ...</span>
				</div>
				
				
			
			
			</div>
			<div id="map_canvas">
			</div>
			
			<div class="clear_divs"></div>
		</div>	
		
		
	</body>
	<script type="text/javascript" src="js/all5.js"></script>
	<script type="text/javascript" src="js/jquery164.js"></script>
	<script type="text/javascript" src="js/cab.js"></script>

</html>