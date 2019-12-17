<?php
include "config/setup.php";
if (isset($_POST["forgotPassword"])) {
	$email = $_POST["email"];
	try {
		$sql = "SELECT * FROM user WHERE email = ?";
		$stmt = $dbh->prepare($sql);
		$stmt->bindParam(1, $email);
		$stmt->execute();
		$results = $stmt->fetch();

		if ($results == NULL) {
			header("Location: forgot_password.php");
		} else {
			$str1 =  "QWERTYUIOPASDFGHJKLMNBVCXZ";
			$str2 = "qwertyuioplkjhgfdsazxcvbnm";
			$str3 = "1234567890";
			$str4 = "!@#$%^&*()_+";
			$str1 = str_shuffle($str1);
			$str2 = str_shuffle($str2);
			$str3 = str_shuffle($str3);
			$str4 = str_shuffle($str4);
			$new_pass = substr($str1, 0, 3) . substr($str2, 0, 3) . substr($str3, 0, 2) . substr($str4, 0, 1);
			$hash = password_hash($new_pass, PASSWORD_DEFAULT);

			$sql = "UPDATE user SET `password`=? WHERE email = ?";
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(1, $hash);
			$stmt->bindParam(2, $email);
			$stmt->execute();

			$body = "Your new password is: " . $new_pass;
			mail($email, "PASSWORD RESET", $body, "admin@camagru.co.za");
			header("Location: login.php");
		}
	} catch (PDOException $e) {
		echo "<br/>error " . $e->getMessage();
	}
}
?>

<?php
// this is my nav
include("views/includes/nav.php");
?>
<div class="w3-container">
	<!--	<div class="header">
			<h2>Login</h2>
			<p>Please fill in your credentials to login.</p>
		</div>-->
	<div class="w3-display-middle">
		<h2>Forgot Password</h2>
		<p>Please fill in your email address.</p>
		<form action="forgot_password.php" method="post" class="w3-container">
			<div class="form-group">
				<input type="email" name="email" placeholder="Email"><br/>
			</div>
			<div class="form-group">
				<input type="submit" name="forgotPassword" value="Request Password"/>
			</div>
		</form>
	</div>
</div>
<?php
include("views/includes/footer.php");
?>
</body>
