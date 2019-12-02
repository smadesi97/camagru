<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<title>Webcam</title>
	<link rel="stylesheet" href="../../css/style.css" />
	<link rel="stylesheet" type="text/css" href="../../css/w3.css">
</head>

<body>
	<?php
	session_start();
	include("../nav.php");
	?>
	<br><br>
	<div class="navbar">
		<h1>Camsnapper</h1>
	</div>

	<div class="top-container">
		<video id="video">Stream not available...</video>
		<button id="photo-button">Take photo</button>
		<button select="clear-button">Clear</button>
		<button id="emojis" name="emojis" onclick="placeEmoji()">Emojis</button>
		<button id="save">Save</button>

		
		<canvas id="canvas"></canvas>
		<div class="right-container">
			<ul id="photos">
			</ul>
		</div>
		<div>
			<img src="../img/images.jpeg" alt="emoji1" height="42" width="42" onclick="placeEmoji(1)">
			<img src="../img/png-transparent-images-1.png" alt="emoji2" height="42" width="42" onclick="placeEmoji(2)">
			<img src="../img/st,small,215x235-pad,210x230,f8f8f8.u3.jpg" alt="emoji3" height="42" width="42" onclick="placeEmoji(3)">
		</div>
	</div>
	<script src="main.js"></script>
</body>

</html>
