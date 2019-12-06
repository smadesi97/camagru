<?php


////////
//put this in its own php file


// include '../../config/database.php';
// session_start();
// // var_dump($_FILES);
// // exit();
// // $con = mysqli_connect("localhost", "root", "123456", "camagrudb");
// // // Check connection
// // if (mysqli_connect_errno()) {
// // 	echo "Failed to connect to MySQL: " . mysqli_connect_error();
// // }

// // mysqli_query($con, "INSERT INTO image (source)
// // VALUES ('uploads/png-transparent-images-1.png')");

// // target_dir shows the placement of the file in the directory
// $target_dir = "uploads/";
// // target_file shows the path of the file to be uploaded
// $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

// $uploadOk = 1;
// // imagefiletype holds the file extension in lower cases.
// $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// // Check if image file is a actual image or fake image
// if (isset($_POST["submit"])) {
// 	$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
// 	if ($check != false) {
// 		echo "File is an image - " . $check["mime"] . ".";
// 		$uploadOk = 1;
// 	} else {
// 		echo "File is not an image.";
// 		$uploadOk = 0;
// 	}
// }
// // Check if file already exists
// if (file_exists($target_file)) {
// 	echo "Sorry, file already exists.";
// 	$uploadOk = 0;
// }
// // Check file size
// if ($_FILES["fileToUpload"]["size"] > 500000) {
// 	echo "Sorry, your file is too large.";
// 	$uploadOk = 0;
// }
// // Allow certain file formats
// if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
// 	echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
// 	$uploadOk = 0;
// }
// // Check if $uploadOk is set to 0 by an error
// if ($uploadOk == 0) {
// 	echo "Sorry, your file was not uploaded.";
// 	// if everything is ok, try to upload file
// } else {
// 	if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
// 		echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
// 		$imag = basename($_FILES["fileToUpload"]["name"]);


// 		try {
// 			$userid = $_SESSION['id'];
// 			$imgpath = $imag;
// 				//$date = date('Y-m-d H:i:s');

// 				$sqlInsert = "INSERT INTO image (`imagepath`, `userid`) VALUES (?,?)";
// 				$stmt = $dbh->prepare($sqlInsert);
// 				$stmt->bindParam(1, $imgpath);
// 				$stmt->bindParam(2, $userid);
// 				$stmt->execute();
// 				//$result = "<p style='padding: 20px; color: green;'> Comment successful </p>";
// 				//echo"random";
// 		} catch (PDOException $e) {
// 			echo $sqlInsert . '<br>' . $e->getMessage();
// 			echo "update failed";
// 		}
// 	}
// }

////////
//end of put this in its own php file
?>
<!DOCTYPE html>
<!-- This is for a user to choose the image they wanna upload -->
<html>
<body>
	<form action="" method="POST" enctype="multipart/form-data">
		select image to upload:
		<input type="file" name="fileToUpload" id="fileToUpload">
		<input type="submit" value="upload Image" name="submit">
	</form>
</body>
</html>
