<?php

	include_once('functions.php');

	$front_page_html = 
		'<html>
			<head>
				<!-- for iphone? meta tag -->
				<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />

				<link href="http://fonts.googleapis.com/css?family=Quattrocento" rel="stylesheet" type="text/css">
				<link href="css/all.css" rel="stylesheet" type="text/css" />
				<link href="css/reset.css" rel="stylesheet" type="text/css" />
				<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script> 
				<script type="text/javascript" src="js/jquery164.js"></script>
				
			</head>
			<body><div id="map_canvas" style="width:100%; height:100%"></div> </body>
			
			<script type="text/javascript" src="js/all2.js"></script>
		</html>';


	echo $front_page_html;


?>