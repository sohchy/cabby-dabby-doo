<?php
	if(!$_SESSION){
		session_start();
	}
	include_once('connection.php');


	// get user id now
	
	if(isset($_SESSION["temp_user_session_var"])){
		$session_tmp = $_SESSION["temp_user_session_var"];
	}
	
	
	$get_user_id = "SELECT user_id FROM user_cabbie_info WHERE user_session = '$session_tmp'";
	$get_user_result = mysql_query($get_user_id) or die(mysql_error());

	while($row_2=mysql_fetch_array($get_user_result)) {
	
		$user_id_enduser = $row_2['user_id'];
	}
	
	echo 'user id :' . $user_id_enduser;

// might as well calculate distances here between this user and all cabbies, and save to db.
	
	$get_cabbie_location = "SELECT user_id, user_lat, user_long FROM user_cabbie_info WHERE user_status='free' AND user_type ='cabbie'";
	$get_cabbie_result = mysql_query($get_cabbie_location) or die(mysql_error());
	
	while($row=mysql_fetch_array($get_cabbie_result)) {
	
		$cab_lat = $row['user_lat'];
		$cab_long = $row['user_long'];
		$cab_id = $row['user_id'];
		
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
				
				alert(trip_distance, trip_duration);
				
				$.ajax({
					url: "add_distance_to_db.php",
					data: "user_id_enduser="+'<?php echo $user_id_enduser; ?>'+"&user_id_cabbie="+'<?php echo $cab_id; ?>'+"&distance="+trip_distance+"&time="+trip_duration,
					success: function(data) {
						console.log(data);
					}
					
				});
				
			}
		
		</script>

	<?php

	}
	
	?>
		