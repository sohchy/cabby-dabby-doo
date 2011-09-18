<?php
	ob_start();
	if(!$_SESSION) {
		session_start();
	}

	include_once('connection.php');
	
	if(isset($_POST["email"]) && isset($_POST["pwd"]) && isset($_POST["lat"]) && isset($_POST["long"])   ) {
	
		$lat = $_POST["lat"];
		$long = $_POST["long"];
		
		$email = mysql_real_escape_string($_POST["email"]);
		$pwd = mysql_real_escape_string($_POST["pwd"]);
	
		$check_user_query = "SELECT user_id, user_type FROM user_info WHERE user_email='$email' AND user_pwd='$pwd'";
		$check_user_result = mysql_query($check_user_query) or die(mysql_error());
		
		if(mysql_num_rows($check_user_result) == 0) {
			// register new user
			$add_user_query = "INSERT INTO user_info (user_email, user_pwd, user_type) VALUES ('$email', '$pwd', 'enduser')";
			$add_user_result = mysql_query($add_user_query) or die(mysql_error());
			
			echo 'user_added';
			
			$get_user_id_query = "SELECT user_id FROM user_info WHERE user_email='$email' AND user_pwd='$pwd'";
			$get_user_id_result = mysql_query($add_user_id_query) or die(mysql_error());
			
			while($row=mysql_fetch_array($get_user_id_result)) {
				$user_id = $row['user_id'];
			}
			
			
		} else if(mysql_num_rows($check_user_result) == 1){
			// user is registered already, find out type
			
			while($row=mysql_fetch_array($check_user_result)) {
				$user_type = $row['user_type'];
				$user_id   = $row['user_id'];
			}
			
			echo 'registered';
			
		}
	
		// register session
		$tmp_time = time();
		$add_user_session_query = "INSERT INTO user_session (user_id, user_session_variable, user_location_lat, user_location_long, timestamp, status) VALUES ('$user_id', 'a','$lat', '$long', '$tmp_time', 'blank' )";
		$add_user_session_result = mysql_query($add_user_session_query) or die(mysql_error());
		
		/*	
		$_SESSION["user_session_variable"] = uniqid();
		setcookie("user_session_variable_cookie", $_SESSION["user_session_variable"],time()+3600);
	
		$add_user_session_query = "INSERT INTO user_session (user_id, user_session, user_location_lat, user_location_long) VALUES ('$user_id', ".$_SESSION["user_session_variable"]. ",'$lat', '$long' )";
		//$add_user_session_result = mysql_query($add_user_session_query) or die(mysql_error());
		
		*/
	
	
	}
	
	
	ob_end_flush();	
?>