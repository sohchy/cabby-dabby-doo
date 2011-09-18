<head>

		<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=true&libraries=places"></script>

</head>

<div id="map_canvas"></div>

<?php
include_once('connection.php');

if(isset($_GET["user_id"]) && isset($_GET["user_lat"]) && isset($_GET["user_long"]) ) {
	
	$user_id = $_GET["user_id"];
	$user_lat = $_GET["user_lat"];
	$user_long = $_GET["user_long"];
}

//$get_cabbies_query = "SELECT user_id FROM user_info WHERE user_type='cabbie'";

//$get_cabbies_result = mysql_query($get_cabbies_query) or die(mysql_error());

//while($row=mysql_fetch_array($get_cabbies_result)) {

	$get_cabbie_location = "SELECT cabbie_id, cabbie_location_lat, cabbie_location_long,timestamp FROM cabbie_session WHERE status='free'";
	$get_cabbie_result = mysql_query($get_cabbie_location) or die(mysql_error());
	
	while($row=mysql_fetch_array($get_cabbie_result)) {
	
		$cab_lat = $row['cabbie_location_lat'];
		$cab_long = $row['cabbie_location_long'];
		
		$timestamp = $row['timestamp'];
		$cab_id = $row['cabbie_id'];
		
		$current_time = time();
		
		// calculate each distance
		?>
		
		
		<script type="text/javascript">
		
			var mapOptions = {
				//center: new google.maps.LatLng(-33.8688,151.2195),
				zoom:13,
				mapTypeId: google.maps.MapTypeId.ROADMAP
			};
				
			var map = new google.maps.Map(document.getElementById("map_canvas"),mapOptions);

		
		
		
	  		var initialLocation = new google.maps.LatLng('<?php echo $cab_lat;?>','<?php echo $cab_long; ?>');
			var address = new google.maps.LatLng('<?php echo $user_lat; ?>','<?php echo $user_long; ?>');
		
			var origins = '';
			var service = new google.maps.DistanceMatrixService();
			service.getDistanceMatrix({
				origins: [initialLocation],
				destinations: [address],
				travelMode: google.maps.TravelMode.DRIVING,
				unitSystem: google.maps.UnitSystem.IMPERIAL,
				avoidHighways: false,
				avoidTolls: false,	
			}, callback_calculate);
					
			function callback_calculate(response,status) {
				if(status == google.maps.DistanceMatrixStatus.OK) {
					var origins_array = response.originAddresses;
					var destination_array = response.destinationAddresses;
					
					for(var i=0;i<origins_array.length;i++){
						var results = response.rows[i].elements;
						for(var j=0;j<results.length;j++){
							var element=results[j];
							trip_distance = element.distance.text;
							trip_duration = element.duration.text;
							
							var from = origins_array[i];
							var to = destination_array[j];
						}
					}								
				}
				
				alert('Distance' + trip_distance+'Time'+trip_duration);
				
			}
		
		</script>
		
		
		
		
		<?php
		
	
	}
	
	


//}

	


?>