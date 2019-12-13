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

		<button id="save" type="button" name="submit" formaction="views/includes/upload.php">Save</button>
		<div>
			<img src="camera/img/sticker1.png" alt="emoji1" height="42" width="42" onclick="placeEmoji(1)">
			<img src="camera/img/sticker2.png" alt="emoji2" height="42" width="42" onclick="placeEmoji(2)">
			<img src="camera/img/sticker3.png" alt="emoji3" height="42" width="42" onclick="placeEmoji(3)">
			<img src="camera/img/sticker4.png" alt="emoji3" height="42" width="42" onclick="placeEmoji(4)">
			<input type="hidden" id="stickerName" />
			<input type="hidden" id="taken" value="false" />
			<input type="hidden" id="from_pc" value="false" />
			<img id="imgUpload" width="500px" height="400px" />
		</div>
		<canvas id="canvas"></canvas>
		<form action="uploadpicture.php" method="POST" enctype="multipart/form-data">
			select image to upload:
			<input type="file" name="fileToUpload" id="fileToUpload">
		</form>
	</div>
	<div class="right-container">
		<?php
		include("config/setup.php");
		$list = '<ul id="photos">';
		$userid = $_SESSION['id'];

		try {
			$sql = "SELECT * FROM `image` WHERE userid = ? ORDER BY id DESC";
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(1, $userid);
			$stmt->execute();
			if ($stmt->rowCount()) {
				foreach ($stmt as $image) {
					$list .= '<li class = "nav-item"><img class = "user-images" src = "views/includes/uploads/' . $image['source'] . '"/><input type="button" onclick = "removeImg(\''.$image['source'].'\')" value="Delete"/></li>';
				}
			}
			$list .= '</ul>';
			echo $list;
		} catch (PDOException $e) { }
		?>
		</ul>
	</div>
	<?php
	include("views/includes/footer.php");
	?>
	<script src="camera/js/main.js"></script>
</body>

</html>
