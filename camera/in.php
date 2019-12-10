<?php
require_once("home.html");
	if (isset($_POST['img']))
	{
		$img = $_POST['img'];
		$img = str_replace(" ", "+", $img);
		$img = str_replace("data:image/png;base64,", "", $img);
		$img = base64_decode($img);
		$img = imagecreatefromstring($img);
		imagepng($img, $img);
	}
?>
