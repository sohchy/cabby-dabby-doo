<?php
include_once('connection.php');

if(isset($_GET["cabbie_id"]) && isset($_GET["enduser_id"])) {
	$cabbie_id = $_GET["cabbie_id"];
	$user_id_enduser = $_GET["enduser_id"];
}


$get_distance_from_customer = "SELECT distance FROM user_cabbie_relation WHERE user_id_cabbie = '$cabbie_id' AND user_id_enduser='$user_id_enduser'";
$get_distance_from_customer_result = mysql_query($get_distance_from_customer) or die();

while($row=mysql_fetch_array($get_distance_from_customer_result)) {

	$distance = $row['distance'];
}

$get_location_of_cabbie = "SELECT user_lat, user_long FROM user_cabbie_info WHERE user_id='$user_id_enduser'";
$get_location_of_cabbie_result = mysql_query($get_location_of_cabbie) or die();

while($row=mysql_fetch_array($get_location_of_cabbie_result)){
	$user_lat = $row['user_lat'];
	$user_long = $row['user_long'];
}


echo $distance.'#'.$user_lat.'#'.$user_long;

?>