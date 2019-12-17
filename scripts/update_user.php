<?php
session_start();
//print_r($_POST);
//print_r($_SESSION);

include_once "../config/setup.php";
//get users ID for SQL WHERE clause

if (isset($_POST['usernamebtn'])) {

		$new_username = htmlEntities($_POST['username']);
		$userid = htmlEntities($_SESSION['id']);

	try {
		$sqlUpdate = "UPDATE user SET `username` = ? WHERE id = ?";
		$stmt = $dbh->prepare($sqlUpdate);
		$stmt->bindParam(1, $new_username);
		$stmt->bindParam(2, $userid);
		$stmt->execute();
		header("location: ../views/logout.php");
	} catch (PDOException $e) {

		// echo $sqlUpdate . '<br>' . $e->getMessage();
		echo '<script>alert("Username length should be")</script>';
		echo '<script>window.location = "../profile.php"</script>';
		// echo "update failed";
	}
		//$result = "<p style='padding: 20px; color: green;'> Comment successful </p>";
	}
	else if (isset($_POST['emailbtn']))
	{
		$new_email = htmlEntities($_POST['email']);
		$userid = htmlEntities($_SESSION['id']);

		try{
			$sqlUpdate = "UPDATE user SET `email` = ? WHERE id = ?";
			$store = $dbh->prepare($sqlUpdate);
			$store->bindParam(1, $new_email);
			$store->bindParam(2, $userid);
			$store->execute();
			header("location: ../views/logout.php");
		}catch (PDOException $e)
		{
		// echo $sqlUpdate . '<br>' . $e->getMessage();
		// echo "update failed";
		echo '<script>alert("Update failed try again")</script>';
		echo '<script>window.location = "../profile.php"</script>';
		}
	}
	else if (isset($_POST['passwordbtn']))
	{
		$password = $_POST["new_password"];
		$password2 = $_POST["reenter_password"];
		$userid = htmlEntities($_SESSION['id']);
		if ($password == $password2)
		{
			$hashed_passwd = password_hash($password, PASSWORD_DEFAULT);
			try
			{
				$sqlUpdate = "UPDATE user SET `password` = ? WHERE id = ?";
				$store = $dbh->prepare($sqlUpdate);
				$store->bindParam(1, $password);
				$store->bindParam(2, $userid);
				$store->execute();
				header("location: ../index.php");
			}
			catch (PDOException $e)
			{
				echo '<script>alert("Did not meet password requirements")</script>';
				echo '<script>window.location = "../profile.php"</script>';
			 	// echo $sqlUpdate . '<br>' . $e->getMessage();
				// echo "Update failed";
			}
		}
		else
		{
			header("Location: ../profile.php?error=passdiff");
		}
	}
?>
