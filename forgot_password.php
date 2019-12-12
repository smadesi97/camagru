<?php
	include "config/setup.php";
	if (isset($_POST["forgotPassword"])){
		$email = $_POST["email"];
		try{
			$sql = "SELECT * FROM user WHERE email = ?";
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(1, $email);
			$stmt->execute();
			$results = $stmt->fetch();

			if ($results == NULL)
			{
				header("Location: forgot_password.php");
			}
			else
			{
				$str1 =  "QWERTYUIOPASDFGHJKLMNBVCXZ";
				$str2 = "qwertyuioplkjhgfdsazxcvbnm";
				$str3 = "1234567890";
				$str4 = "!@#$%^&*()_+";
				$str1 = str_shuffle($str1);
				$str2 = str_shuffle($str2);
				$str3 = str_shuffle($str3);
				$str4 = str_shuffle($str4);
				$new_pass = substr($str1, 0, 3).substr($str2, 0, 3).substr($str3, 0, 2).substr($str4, 0, 1);
				$hash = password_hash($new_pass, PASSWORD_DEFAULT);

				$sql = "UPDATE user SET `password`=? WHERE email = ?";
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(1, $hash);
				$stmt->bindParam(2, $email);
				$stmt->execute();

				$body = "Your new password is: ".$new_pass;
				mail($email, "PASSWORD RESET", $body, "admin@camagru.co.za");
				header("Location: login.php");
			}
		}
		catch(PDOException $e){
				echo "<br/>error " .$e->getMessage();
		}
	}
?>
<html>
	<body>
		<form action="forgot_password.php" method="POST">
			<input type="email" name="email" placeholder="Email"><br>
			<input type="submit" name="forgotPassword" value="Request Password"/>
		</form>
	</body>
</html>
