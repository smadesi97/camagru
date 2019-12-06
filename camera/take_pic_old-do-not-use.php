<?php
include '../config/statup.php';
require_once("../views/comment.php");
/*$img = $target_dir . basename($_FILES["pic"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
	$check = getimagesize($_FILES["pic"]["tmp_name"]);
	if ($check !== false) {
		echo "File is an image - " . $check["mime"] . ".";
		$uploadOk = 1;
	} else {
		echo "File is not an image.";
		$uploadOk = 0;
	}
}
// Check if file already exists
if (file_exists($target_file)) {
	echo "Sorry, file already exists.";
	$uploadOk = 0;
}
// Check file size
if ($_FILES["pic"]["size"] > 500000) {
	echo "Sorry, your file is too large.";
	$uploadOk = 0;
}
// Allow certain file formats
if ($imageFileType != "png") {
	echo "Sorry, only PNG files are allowed.";
	$uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
	echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
} else {
	if (move_uploaded_file($_FILES["pic"]["tmp_name"], $target_file)) {
		echo "The file " . basename($_FILES["pic"]["name"]) . " has been uploaded.";
	} else {
		echo "Sorry, there was an error uploading your file.";
	}
}*/

?>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<title>Webcam</title>
	<link rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" type="text/css" href="../css/w3.css">
</head>

<body>
	<?php
	include("nav.php");
	?>
	<div class="navbar">
		<h1>Camsnapper</h1>
	</div>
	<div class="container">
		<div class="top-container">
			<video id="video">Stream not available...</video>
			<img id='img' width='400' height='400' />
			<button id="photo-button">Take photo</button>
			<input type="file" id="file_choose" accept="image/*" />
			<button select="clear-button">Clear</button>
			<canvas id="canvas"></canvas>

		</div>
		<div class="right-container">
			<ul id="photos">
			</ul>
			<form action="../views/comment.php" method="POST">
				<lable>comment</lable>
				<input type="text" name="comment" class="w3-input w3-border"></input>
				<button name="commentsave">comment</button>
			</form>
		</div>
	</div>




	<hr>
	<hr>
	<hr>
	<form action="" method="POST" enctype="multipart/form-data">
		select image to upload:
		<input type="file" name="fileToUpload" id="fileToUpload">
		<input type="submit" value="upload Image" name="submit">
	</form>
	<script src="js/main.js"></script>
</body>
