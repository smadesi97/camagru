<?php
	if (isset($_POST['image_url']))
	{
		$filteredData = str_replace("data:image/png;base64,", "", $_POST['image_url']);
		$filteredData = str_replace(" ", "+", $filteredData);
		$unencodedData = base64_decode($filteredData);
		$name = time() . '.png';
		file_put_contents('../camera/img/' . $name, $unencodedData);
	/*function super_impose($src, $dest, $added)
	{
		$base = imagecreatefrompng($src);
		$superpose = imagecreatefrompng($added);
		list($width, $height) = getimagesize($src);
		list($width_small, $height_small) = getimagesize($added);
		imagecopyresampled($base, $superpose,  20, 20, 0, 0, 100, 100, $width_small, $height_small);
		imagepng($base, $dest);
	}
	super_impose("../img/" . $name, "../img/" . $name, "../img/" . $_POST['image']);*/
	echo "success";
	}
?>

