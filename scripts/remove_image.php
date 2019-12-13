<?php
		include("../config/setup.php");
		session_start();
		// We wanna delete a picture from the database and folder
		if (isset($_POST['remove']))
		{
			$userid = $_SESSION['id'];
			$image = $_POST['image'];
			$path = "../views/includes/uploads/".$image;
			// Here we checking if the image exist
			if (is_file($path))
			{
				// We use the unlink funtion to delete the picture
				unlink($path);
			}
			try
			{
				$sql = "DELETE FROM `image` WHERE userid = ? AND source = ?";
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(1, $userid);
				$stmt->bindParam(2, $image);
				$stmt->execute();

				echo "image deleted";
			} catch (PDOException $e) {
				echo "Error : ".$e->getMessage();
			}
	}
?>
