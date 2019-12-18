<?php
include "../config/database.php";
    // $dbh = new PDO($DB_CONN_STRING_LIGHT, $DB_USER, $DB_PASSWORD);
    // set the PDO error mode to exception
    // $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbh->exec("USE camagrudb");
var_dump($_POST);
// include "../config/setup.php";
	if (isset($_POST["signup"])){
		$username = $_POST["username"];
		$email = $_POST["email"];
		$password = $_POST["password"];
		$password2 = $_POST["password2"];

		if (empty($username) || empty($email) || empty($password) || empty($password2))
		{
			echo "<br/>All fields are required.";
			header("location: ../signup.php");
		}
		else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			header("location: ../signup.php?error=Invalid email");
		}
		else{
			try{
				$hashed_passwd = password_hash($password, PASSWORD_DEFAULT);
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
					header("location: ../signup.php?success=true");
				}
				else{
					echo "<br/>Not registered!";
				}
			}
			catch(PDOException $e){
				echo "<br/>error ".$e;
			}
		}
	}
?>
