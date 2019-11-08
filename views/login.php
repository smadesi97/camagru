<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>

<body>
	<div class="header">
		<h2>Login</h2>
		<p>Please fill in your credentials to login.</p>
	</div>
	<form action="../scripts/login_script.php" method="post">
		<div class="form-group">
			<label>Username</label>
			<input type="text" name="username" class="form-control" value="">
			<br><br>
			<span class="help-block"></span>
		</div>
		<div class="form-group ">
			<label>Password</label>
			<input type="password" name="password" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
			<br><br>
			<span class="help-block"></span>
		</div>
		<div class="form-group">
			<input type="submit" class="btn btn-primary" value="Login">
		</div>
		<label>
			<input type="checkbox" checked="checked" name="remember"> Remember me
		</label>
		<p>Don't have an account? <a href="signup.php">Sign up now</a>.</p>
	</form>

	<?php

	if (isset($_GET['notlogged'])) {
		if ($_GET['notlogged'] == 1) {
			echo "you must login to do that";
		}
	}
	?>

</body>

</html>
