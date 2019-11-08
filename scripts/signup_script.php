<?php
	include_once "../config/statup.php";
	if (isset($_POST["signup"])){
		// ctreate a variables and assign from _POST.
		$username = $_POST["username"];
		$email = $_POST["email"];
		$password = $_POST["password"];
		$password2 = $_POST["password2"];
		//echo $username;
		//echo $email;
		if (empty($username) || empty($email) || empty($password) || empty($password2))
		{
			echo "<br/>All fields are required.";
			header("location: ../views/signup.php");
		}
		else{
			try{
				// To hide the user's password
				$hashed_passwd = hash('md5', $password, FALSE);
				$code = hash('md5', rand(10,100000), FALSE);

				$sql = "INSERT INTO user (username, email, `password`, veri_code) VALUES (?, ?, ?, ?)";
				$statement = $dbh->prepare($sql);
				$statement->bindParam(1, $username);
				$statement->bindParam(2, $email);
				$statement->bindParam(3, $hashed_passwd);
				$statement->bindParam(4, $code);
				$statement->execute();

				if ($statement->rowCount())
				{
					echo "<br/>User registered successfully!";
					$body = "http://localhost:8081/camagru/scripts/verify_scripts.php?email=$email&code=$code";
					mail($email,"Verify your Camagru Acount", $body, "admin@camagru.co.za");
					echo "<br/>Please check your email to verify the account!";
				}
				else{
					echo "<br/>Not registered!";
				}
			}
			catch(PDOException $e){
				echo "<br/>error " .$e->getMessage();
			}
		}
	}
?>
