<?php

	include_once('functions.php');

	$front_page_html = 
		'<html>
			<head>
				<link href="css/all.css" ref="stylesheet" type="text/css" />
				<script type="text/javascript" src="js/jquery164.js"></script>
				<script type="text/javascript" src="js/all.js"></script>
			</head>
			<body>'.return_body_content().'</body>
		</html>';


	echo $front_page_html;


?>