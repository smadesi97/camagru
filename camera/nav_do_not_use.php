	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="UTF-8">
		<title>Login</title>
		<link rel="stylesheet" type="text/css" href="css/w3.css">
	</head>

	<body>
		<?php
		if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
			echo '<div class="w3-top">
		<div class="w3-bar w3-red">
		<a href="../../index.php" class="w3-bar-item w3-button">Home</a>
		<a href="../../profile.php" class="w3-bar-item w3-button">Profile</a>
		<a href="../../views/logout.php" class="w3-bar-item w3-button">Logout</a>
	</div>
	</div>';
		} else {
			echo '
	<div class="w3-top">
	<div class="w3-bar w3-red">
		<a href="../login.php" class="w3-bar-item w3-button">Login</a>
	</div>
	</div>
	';
		}
		?>
	</body>
