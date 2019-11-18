<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<title>Webcam</title>
	<link rel="stylesheet" href="../../css/style.css" />
</head>

<body>
	<div class="navbar">
		<h1>Camsnapper</h1>
	</div>
	<div class="top-container">
		<video id="video">Stream not available...</video>
		<button id="photo-button">Take photo</button>
		<button select="clear-button">Clear</button>
		<button id="emojis" name="emojis" onclick="placeEmoji()">Emojis</button>
		<button id="save">SAVE</button>

		<canvas id="canvas"></canvas>
		<div class="right-container">
			<ul id="photos">
			</ul>
		</div>
	</div>
	<script src="main.js"></script>
</body>
</html>
