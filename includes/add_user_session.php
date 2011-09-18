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
	
	$add_user_session_query = "INSERT INTO user_cabbie_info (user_lat, user_long, user_type, user_session, timestamp, trip_distance,trip_duration) VALUES('$lat','$long','$type','$session_tmp','$timestamp_tmp', '$distance', '$duration')";
	
	$add_user_session_result = mysql_query($add_user_session_query, $db_connect) or die(mysql_error());
	
	echo 'successfully added to db';

}

?>