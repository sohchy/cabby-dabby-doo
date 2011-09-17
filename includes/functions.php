<?php
	if(!isset($_SESSION)) {
		session_start();
	}

	include_once('connection.php');

	function return_body_content() {
	
		
		// if request is from user
		return return_user_body_content();
	
	}

	function return_user_body_content() {
	
	
		$user_html = '	<div id="user_destination_div">
							
							<input type="text" id="user_destination_txtbox" value="destination?" />
		
		
		
							
							<input type="text" id="user_destination_txtbox_lat"	/>
							
							<input type="text" id="user_destination_txtbox_long"	/>
							
							<input type="submit" id="user_destination_submit" />
							
						</div>
						<div id="user_map">
						
						</div>
						
						';
						
		// CHECK FOR EXISTING COOKIE VALUE
		
		
		// identify user from this session value
		$_SESSION["user_session_variable"] = uniqid();
		
		$user_html .= strlen($_SESSION["user_session_variable"]);
		
		setcookie("user_session_variable_cookie", $_SESSION["user_session"],time()+3600);
		
		
		
		
		
		return $user_html;				
	
	
	
	}	



?>