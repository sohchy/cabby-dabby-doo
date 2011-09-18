<?php
if(!$_SESSION){
	session_start();
}

include_once('connection.php');

if(isset($_GET["lat"]) && isset($_GET["long"]) && isset($_GET["type"]) && isset($_GET["trip_distance"]) && isset($_GET["trip_duration"])   ){

	$lat = $_GET["lat"];
	$long = $_GET["long"];
	$type = $_GET["type"];
	$distance = $_GET["trip_distance"];
	$duration = $_GET["trip_duration"];
}

if(isset($_SESSION["user_logged_in"])) {

	$user_id = $_SESSION["user_logged_in"];
			
} else {

	$_SESSION["temp_user_session_var"] = uniqid();
	
	$session_tmp = $_SESSION["temp_user_session_var"];
	$timestamp_tmp = time();
	
	$time = $duration;
	$total_time = '';


	if(strpos($time, "hours") >0) {
	
		$hours = substr($time,0,1);
		$total_time = $hours*60;
		
		$minutes = substr($time,6,7);
		
		$total_time += $minutes;
		
	} else if(strpos($time, "hour") >0) {
		$hours = substr($time,0,1);
		
		$total_time = $hours*60;
		
		$minutes = substr($time,5,6);
		
		$total_time += $minutes;
	
	
	} else {
		$minutes = substr($time,0,1);
		
		$total_time = $minutes;
	}
	
	
	
	$add_user_session_query = "INSERT INTO user_cabbie_info (user_lat, user_long, user_type, user_session, timestamp, trip_distance,trip_duration) VALUES('$lat','$long','$type','$session_tmp','$timestamp_tmp', '$distance', '$total_time')";
	
	$add_user_session_result = mysql_query($add_user_session_query, $db_connect) or die(mysql_error());
	
	$array_pass = 'successfully added to db#';

	// get user id now
	
	if(isset($_SESSION["temp_user_session_var"])){
		$session_tmp = $_SESSION["temp_user_session_var"];
	}
	
	
	$get_user_id = "SELECT user_id FROM user_cabbie_info WHERE user_session = '$session_tmp'";
	$get_user_result = mysql_query($get_user_id) or die(mysql_error());

	while($row_2=mysql_fetch_array($get_user_result)) {
	
		$user_id_enduser = $row_2['user_id'];
	}
	

	$array_pass .= $user_id_enduser.'#';

	$array_pass .= $lat.'#'.$long.'#';

// might as well calculate distances here between this user and all cabbies, and save to db.
	
	$get_cabbie_location = "SELECT user_id, user_lat, user_long FROM user_cabbie_info WHERE user_status='free' AND user_type ='cabbie'";
	$get_cabbie_result = mysql_query($get_cabbie_location) or die(mysql_error());
	
	while($row=mysql_fetch_array($get_cabbie_result)) {
	
		$cab_lat = $row['user_lat'];
		$cab_long = $row['user_long'];
		$cab_id = $row['user_id'];
		
		$array_pass .= $cab_id.'#'.$cab_lat.'#'.$cab_long.'#';
		
		
	}
	$array_pass .= ' ';
	
	echo $array_pass;

}

?>