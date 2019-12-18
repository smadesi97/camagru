<?php
$dbh->exec("USE camagrudb");
		try {
			$userid = $_SESSION['id'];
			$imgpath = $imag;
				//$date = date('Y-m-d H:i:s');

				$sqlInsert = "INSERT INTO image (`imagepath`, `userid`) VALUES (?,?)";
				$stmt = $dbh->prepare($sqlInsert);
				$stmt->bindParam(1, $imgpath);
				$stmt->bindParam(2, $userid);
				$stmt->execute();
				//$result = "<p style='padding: 20px; color: green;'> Comment successful </p>";
				//echo"random";
		} catch (PDOException $e) {
			echo $sqlInsert . '<br>' . $e->getMessage();
			echo "update failed";
		}
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
