<?php

	include_once('functions.php');

	$front_page_html = 
		'<html>
			<head>
				<link href="http://fonts.googleapis.com/css?family=Quattrocento" rel="stylesheet" type="text/css">
				<link href="css/all.css" rel="stylesheet" type="text/css" />
				<link href="css/reset.css" rel="stylesheet" type="text/css" />
				<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script> 
				<script type="text/javascript" src="js/jquery164.js"></script>
				<script type="text/javascript" src="js/all.js"></script>
			</head>
			<body>'.return_body_content().'</body>
		</html>';


	echo $front_page_html;


?>