<?php
include_once('connection.php');

if(isset($_GET["cabbie_id"])) {
	$cabbie_id = $_GET["cabbie_id"];
}

$get_location_of_cabbie = "SELECT user_lat, user_long FROM user_cabbie_info WHERE user_id='$cabbie_id'";
$get_location_of_cabbie_result = mysql_query($get_location_of_cabbie) or die();

while($row=mysql_fetch_array($get_location_of_cabbie_result)){
	$user_lat = $row['user_lat'];
	$user_long = $row['user_long'];
}


echo $user_lat.'#'.$user_long;

?>