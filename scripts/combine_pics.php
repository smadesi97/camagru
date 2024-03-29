<?php
include "../config/database.php";
$dbh->exec("USE camagrudb");
	session_start();
// This is the function that saves the picture to a folder
	// $name = $_SESSION['username'] . time() . '.png';
	if ($_POST['image_name'] || $_POST['taken'] == 'true')
	{
		$base_string = str_replace("data:image/png;base64,", "", $_POST['image_name']);
		$base_string = str_replace(" ", "+", $base_string);
		$decoded = base64_decode($base_string);
		$name = $_SESSION['username'].time() . '.png';
		file_put_contents('../views/includes/uploads/' . $name, $decoded);
	}
	// This is the function that combines a sticker to the picture
	function combine($source, $destination, $sticker)
	{
		$base = imagecreatefrompng($source);
		$superpose = imagecreatefrompng($sticker);
		list($width, $height) = getimagesize($source);
		list($width_small, $height_small) = getimagesize($sticker);
		imagecopyresampled($base, $superpose,  0, 0, 0, 0, 100, 100, $width_small, $height_small);
		imagepng($base, $destination);
	}
	if (!empty($_POST['sticker_name']))
	{
		combine("../views/includes/uploads/" . $name, "../views/includes/uploads/" . $name, "../camera/img/" . $_POST['sticker_name']);
	}

	if (isset($_POST['image_name'])) {

		$source = $name;
		$userid = htmlEntities($_SESSION['id']);

	try {
		$sqlUpdate = "INSERT INTO `image` (source, userid) VALUES (?, ?)";
		$stmt = $dbh->prepare($sqlUpdate);
		$stmt->bindParam(1, $source);
		$stmt->bindParam(2, $userid);
		$stmt->execute();
		echo $name;
	} catch (PDOException $e) {

		echo $sqlUpdate . '<br>' . $e->getMessage();
	}
}
?>
