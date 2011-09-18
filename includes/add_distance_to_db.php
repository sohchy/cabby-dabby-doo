<?php
include_once('connection.php');

if(isset($_GET["user_id_enduser"]) && isset($_GET["user_id_cabbie"]) && isset($_GET["distance"]) && isset($_GET["time"]) ) {

	$user_id_enduser = $_GET["user_id_enduser"];
	$user_id_cabbie = $_GET["user_id_cabbie"];
	$distance = $_GET["distance"];
	$time = $_GET["time"];
	
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
	
	
	
	$insert_query = "INSERT INTO user_cabbie_relation (user_id_enduser,user_id_cabbie,distance,time) VALUES ('$user_id_enduser','$user_id_cabbie','$distance','$total_time')";
	$insert_result = mysql_query($insert_query) or die(mysql_error());

	echo 'successfully added distance, time to db';

}

?>