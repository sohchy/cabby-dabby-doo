<?php

	include_once('connection.php');

	function return_body_content() {
	
		
		// if request is from user
		return return_user_body_content();
	
	}

	function return_user_body_content() {
	
	
		$user_html = '	<div id="user_destination_div">
							<input type="text" id="user_destination_txtbox"	/>	
						</div>';
						
		
		
		
		return $user_html;				
	
	
	
	}	



?>


