<!DOCTYPE html>

<html>
<head>
	<meta charset="UTF-8">
	<title>Gadget Shop Advanced</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css"/>
	<meta name = "viewport" content = "width=device-width, initial-scale=1.0">
	<script type ="text/javascript" src = "assets/js/jq.js"></script>
	<script type ="text/javascript" src = "assets/js/index.js"></script>
</head>
<body>
	<div id="header">
		<div>
			<div id="logo">
				<a href="index.php"><img src="assets/images/logo.png" alt="Logo"></a>
			</div>
			<ul id ="meni">
				<?php
				include "models/menu/showMenu.php";
				?>
            </ul>
		</div>
		<div>
			<div id="figure">
				<div>
					
						<span id="background">
							<h1>Live Music</h1>
						</span>
					</div>	
				</div>
			</div>
	</div>
	