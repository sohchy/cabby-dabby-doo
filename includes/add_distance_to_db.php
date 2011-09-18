<?php

if(isset($_GET["user_id_enduser"]) && isset($_GET["user_id_cabbie"]) && isset($_GET["distance"]) && isset($_GET["time"]) ) {

	$user_id_enduser = $_GET["user_id_enduser"];
	$user_id_cabbie = $_GET["user_id_cabbie"];
	$distance = $_GET["distance"];
	$time = $_GET["time"];
	
	$insert_query = "INSERT INTO user_cabbie_relation (user_id_enduser,user_id_cabbie,distance,time) VALUES ('$user_id_enduser','$user_id_cabbie','$distance','$time')";
	$insert_result = mysql_query($insert_query) or die(mysql_error());

	echo 'successfully added distance, time to db';

}

?>