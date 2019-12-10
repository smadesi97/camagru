<?php
include('login.php');
// Initialize the session
session_start();
// Check if the user is already logged in, if yes then redirect him to welcome page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
	header("location: ../index.php");
	exit;
}
// Include config file
require_once "../config/statup.php";
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// Check if username is empty
	if (empty(trim($_POST["username"]))) {
		$username_err = "Please enter username.";
	} else {
		$username = trim($_POST["username"]);
	}
	// Check if password is empty
	if (empty(trim($_POST["password"]))) {
		$password_err = "Please enter your password.";
	} else {
		$password = hash('md5',trim($_POST["password"]), false);
	}
	// Validate credentials
	if (empty($username_err) && empty($password_err))
	{
		try{
		// Prepare a select statement
		$sql = "SELECT id, username, password FROM user WHERE username = :username";

		if ($stmt = $dbh->prepare($sql)) {
			// Bind variables to the prepared statement as parameters
			$stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
			// Set parameters
			$param_username = trim($_POST["username"]);
			// Attempt to execute the prepared statement
			if ($stmt->execute())
			{
				// Check if username exists, if yes then verify password
				if ($stmt->rowCount() == 1)
				{
					if ($row = $stmt->fetch())
					{
						$id = $row["id"];
						$username = $row["username"];
						$email = $row["email"];
						$hashed_password = $row["password"];
						if($password == $hashed_password) {
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
							// Display an error message if password is not valid
							$password_err = "The password you entered was not valid.";
							echo "<br/>The password you entered was not valid.";
						}
					}
				}
				else
				{
					// Display an error message if username doesn't exist
					$username_err = "No account found with that username.";
				}
			}
			else
			{
				echo "Oops! Something went wrong. Please try again later.";
			}
		}
		// Close statement
		unset($stmt);
		}
		catch(PDOException $ex)
		{
			echo "Error : ".$ex->getMessage();
		}
	}
	// Close connection
	unset($pdo);
}
