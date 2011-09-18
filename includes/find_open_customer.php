<?php
include_once('connection.php');


$customer_spotlight_query = "SELECT * FROM customer_spotlight";
$customer_spotlight_result = mysql_query($customer_spotlight_query) or die();

while($row= mysql_fetch_array($customer_spotlight_result)) {

	$user_id_enduser = $row['user_id_enduser'];
	$user_status_free_taken = $row['user_status_free_taken'];
}

if($user_status_free_taken == 'free') {
	echo 'customer_found#'.$user_id_enduser;
} else {
	echo 'negative';
}




?>