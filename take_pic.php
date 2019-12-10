<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<title>Webcam</title>
	<link rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" type="text/css" href="css/w3.css">
</head>

<body>
	<?php
	session_start();
	include("views/includes/nav.php");
	?>
	<br><br>
	<div class="navbar">
		<h1>Camsnapper</h1>
	</div>

	<div class="top-container">
		<video id="video">Stream not available...</video>
		<button id="photo-button">Take photo</button>
		<button select="clear-button">Clear</button>
		<!-- <button id="emojis" name="emojis" onclick="placeEmoji(1,2,3)">Emojis</button> -->
		<button id="save" type="button" name="submit" formaction="views/includes/upload.php">Save</button>

		<canvas id="canvas"></canvas>
		<div class="right-container">
			<ul id="photos">
			</ul>
		</div>
		<div>
			<img src="camera/img/sticker1.png" alt="emoji1" height="42" width="42" onclick="placeEmoji(1)">
			<img src="camera/img/sticker2.png" alt="emoji2" height="42" width="42" onclick="placeEmoji(2)">
			<img src="camera/img/sticker3.png" alt="emoji3" height="42" width="42" onclick="placeEmoji(3)">
			<img src="camera/img/sticker4.png" alt="emoji3" height="42" width="42" onclick="placeEmoji(4)">
			<input type="hidden" id="stickerName">
		</div>
	</div>
	<script src="camera/js/main.js"></script>

	<!-- upload trial one -->
	<!-- <script>
		var $our_image = canvas.toDataURL("image/png");
	</script> -->

	<form action="uploadpicture.php" method="POST" enctype="multipart/form-data">
		select image to upload:
		<input type="file" name="fileToUpload" id="fileToUpload">
		<input type="submit" value="upload Image" name="submit">
	</form>
</body>

</html>
