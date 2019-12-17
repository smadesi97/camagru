<?php

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
	header("location: ../index.php");
	exit;
}
require_once "../config/database.php";
$username = $password = "";
$username_err = $password_err = "";
$message = "";
// Processing form data when form is
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty(trim($_POST["username"]))) {
		$message = "Please enter username.";
	} else {
		$username = trim($_POST["username"]);
	}
	if (empty(trim($_POST["password"]))) {
		$message = "Please enter your password.";
	} else {
		$password = $_POST['password'];
	}
	if (empty($message) && empty($message))
	{
		try{
		$sql = "SELECT id, username, `password`, email FROM user WHERE username = :username";

		if ($stmt = $dbh->prepare($sql)) {
			$stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
			$param_username = trim($_POST["username"]);
			if ($stmt->execute())
			{
				if ($stmt->rowCount() == 1)
				{
					if ($row = $stmt->fetch())
					{
						$id = $row["id"];
						$username = $row["username"];
						$email = $row["email"];
						$hashed_password = $row["password"];
						if(password_verify($password, $hashed_password)) {

							// Password is correct, so start a new session
							session_start();
							// Store data in session variables
							$_SESSION["loggedin"] = true;
							$_SESSION["id"] = $id;
							$_SESSION["username"] = $username;
							$_SESSION["email"] = $email;
							// Redirect user to welcome page
							header("location: ../index.php");
						}
						else
						{
							$message= "The password you entered was not valid.";
							echo "<br/>The password you entered was not valid.";
						}
					}
				}
				else
				{
					$message = "No account found with that username.";
				}
			}
			else
			{
					$message = "Oops! Something went wrong. Please try again later.";
			}
		}
		unset($stmt);
		}
		catch(PDOException $ex)
		{
			echo "Error : ".$ex;
		}
	}
	if (empty($message))
	{
		header("location: ../index.php");
	}
	else
	{
		header("location: ../login.php?message=".$message);
	}
	unset($pdo);
}
