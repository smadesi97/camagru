<?php
// Initialize the session
session_start();
include("config/database.php");

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
	//header("location: login.php");
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
	<link rel="stylesheet" type="text/css" href="css/w3.css">
</head>

<body>
	<!-- This is my navigation bar -->
	<?php
	include("views/includes/nav.php");
	?>
	<!-- This is my navigation ending -->

	<?php
	if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
		echo "<p>
 		<a href='signup.php' class='btn btn-warning'>signup</a>
 		<a href='login.php' class='btn btn-danger'>login</a>
 	</p>";
	} else {
		echo "<p>
 		<a href='reset_pswrd.php' class='btn btn-warning'>Reset Your Password</a>
 		<a href='views/logout.php' class='btn btn-danger'>Sign Out of Your Account</a>
 	</p>";
	}
	?>

	<div class="w3-container">
		<h1 class="center"><b><?php //echo htmlspecialchars($_SESSION["username"]);
						?></b> Welcome to Camagru!</h1>
		<?php

		try {
			$limit = 5;
			$sql1 = "SELECT * FROM `image`";
			$pagination = $dbh->prepare($sql1);
			$pagination->execute();
			$total_results = $pagination->rowCount();
			$total_pages = ceil($total_results / $limit);
			if (!isset($_GET['page'])) {
				$page = 1;
			} else {
				$page = $_GET['page'];
			}
			$starting_limit = ($page - 1) * $limit;

			$sql = "SELECT * FROM image ORDER BY creationdate DESC LIMIT $starting_limit, $limit";
			$s = $dbh->prepare($sql);
			$s->execute();
			if ($s == false) {
				echo "Error: Could not execute the database";
			} else {
				foreach ($s as $data) {
					//echo '<div class="w3-container">';
						//echo '<div class="w3-card-4">';
							echo '<img class="w3-border w3-padding" style="padding:10px;" src="views/includes/uploads/' . $data["imagepath"] . '" width="300px" height="300px"/>';
						//echo '</div>';
					//echo '</div>';
				}
			}
		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
		}

		?>
		<?php
		echo '<br/><br/><br/>';
		for ($page = 1; $page <= $total_pages; $page++) : ?>
			<ul class="pagination" style="list-style-type:none; display:inline-block">
				<li style="color:white; background:blue; padding:10px; font-size:14px"><a href='<?php echo "?page=$page"; ?>' class="links"><?php echo $page; ?> </a></li>
			</ul>
		<?php endfor;
		echo '<br/><br/><br/>';
		?>
	</div>
	<!-- <p> -->
	<!-- <a href="reset_pswrd.php" class="btn btn-warning">Reset Your Password</a> -->
	<!-- <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a> -->
	<!-- </p> -->
	<?php
	include("views/includes/footer.php");
	?>
</body>
</html>
