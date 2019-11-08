<?php
// Initialize the session
session_start();
// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
	header("location: login.php");

		/*echo "<p>
		<a href='reset_pswrd.php' class='btn btn-warning'>Reset Your Password</a>
		<a href='logout.php' class='btn btn-danger'>Sign Out of Your Account</a>
	</p>";*/
	//exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Welcome</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
	<div class="page-header">
		<h1>Hello, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to my Camagru!</h1>
	</div>
<?php
 if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
 	echo "<p>
 		<a href='signup.php' class='btn btn-warning'>signup</a>
 		<a href='login.php' class='btn btn-danger'>login</a>
 	</p>";
 }else{
 	echo "<p>
 		<a href='reset_pswrd.php' class='btn btn-warning'>Reset Your Password</a>
 		<a href='logout.php' class='btn btn-danger'>Sign Out of Your Account</a>
 	</p>";
 }
?>
	<!-- <p> -->
		<!-- <a href="reset_pswrd.php" class="btn btn-warning">Reset Your Password</a> -->
		<!-- <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a> -->
	<!-- </p> -->
</body>
</html>
