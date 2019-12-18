<?php
session_start();
//print_r($_POST);
//print_r($_SESSION);

include_once "../config/database.php";
$dbh->exec("USE camagrudb");
//get users ID for SQL WHERE clause

if (isset($_POST['usernamebtn'])) {

		$new_username = htmlEntities($_POST['username']);
		$userid = htmlEntities($_SESSION['id']);
		if(empty($new_username))
		{
			header("location: ../profile.php?error=Insert a proper username");
		}
		else
		{

			try
			{
				$sqlUpdate = "UPDATE user SET `username` = ? WHERE id = ?";
				$stmt = $dbh->prepare($sqlUpdate);
				$stmt->bindParam(1, $new_username);
				$stmt->bindParam(2, $userid);
				$stmt->execute();
				header("location: ../views/logout.php");
			}
			catch (PDOException $e)
			{

				// echo $sqlUpdate . '<br>' . $e->getMessage();
				echo '<script>alert("Username length should be")</script>';
				echo '<script>window.location = "../profile.php"</script>';
				// echo "update failed";
			}
	}
		//$result = "<p style='padding: 20px; color: green;'> Comment successful </p>";
	}
	else if (isset($_POST['emailbtn']))
	{
		$new_email = htmlEntities($_POST['email']);
		$userid = htmlEntities($_SESSION['id']);
		if (!filter_var($new_email, FILTER_VALIDATE_EMAIL)) {
			header("location: ../profile.php?error=Invalid email");
		}
		else if(empty($new_email))
		{
			header("location: ../profile.php?error=Insert email address");
		}
		else
		{
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
	}
	else if (isset($_POST['passwordbtn']))
	{
		$password = $_POST["new_password"];
		$password2 = $_POST["reenter_password"];
		$userid = htmlEntities($_SESSION['id']);
		if (empty($password) || empty($password2))
		{
			header("location: ../profile.php?error=Fill in both passwords");
		}
		else if ($password == $password2)
		{
			$hashed_passwd = password_hash($password, PASSWORD_DEFAULT);
			try
			{
				$sqlUpdate = "UPDATE user SET `password` = ? WHERE id = ?";
				$store = $dbh->prepare($sqlUpdate);
				$store->bindParam(1, $hashed_passwd);
				$store->bindParam(2, $userid);
				$store->execute();
				header("location: ../views/logout.php");
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
