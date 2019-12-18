<?php
// Initialize the session
session_start();
include_once "config/database.php";
$dbh->exec("USE camagrudb");

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
<!-- This is my navigation bar -->
<?php
include("views/includes/nav.php");
?>
<!-- This is my navigation bar -->
<?php
// if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
// 	echo "<p>
// 	<a href='signup.php' class='btn btn-warning'>signup</a>
// 	<a href='login.php' class='btn btn-danger'>login</a>
// </p>";
// } else {
// 	echo "<p>
// 	<a href='reset_pswrd.php' class='btn btn-warning'>Reset Your Password</a>
// 	<a href='views/logout.php' class='btn btn-danger'>Sign Out of Your Account</a>
// </p>";
// }
$userid = htmlEntities($_SESSION['id']);
$notify;
$email;
$username;
try {
	$sqlUpdate = "SELECT * FROM user WHERE id = ?";
	$stmt = $dbh->prepare($sqlUpdate);
	$stmt->bindParam(1, $userid);
	$stmt->execute();
	if ($stmt->rowCount()) {
		$row = $stmt->fetch();
		$notify = $row['notification'];
		$email = $row['email'];
		$username = $row['username'];
	}
} catch (PDOException $ex) {
	echo "Error : " . $ex->getMessage();
}
?>
<div class="row">
	<div class="w3-container">
		<div class="w3-display-middle">
			<?php
			if (isset($_GET['error'])) {
				echo "<br/>" . $_GET['error'];
			}
			?>
			<div class="col">
				<form action="scripts/update_user.php" method="post">
					<div class="form-group">
						<label class="w3-text-blue"><b>Username</b></label>
						<input type="text" name="username" class="w3-input w3-border" value="<?php echo $username; ?>">
						<br>
						<div class="form-group">
							<input type="submit" class="w3-btn w3-blue" value="Update username" name="usernamebtn">
						</div>
						<br><br>
					</div>
					<div class="form-group">
						<label class="w3-text-blue"><b>Email</b></label>
						<input type="email" name="email" class="w3-input w3-border" value="<?php echo $email; ?>">
						<br>
						<div class="form-group">
							<input type="submit" class="w3-btn w3-blue" value="Update email" name="emailbtn">
						</div>
						<br><br>
					</div>

				</form>
				<form action="scripts/update_user.php" method="post">
					<div class="form-group ">
						<label class="w3-text-blue"><b>New Password</b></label>
						<input type="password" name="new_password" class="w3-input w3-border" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
						<br>
						<span class="help-block"></span>
					</div>
					<div class="form-group ">
						<label class="w3-text-blue"><b>Re enter Password</b></label>
						<input type="password" name="reenter_password" class="w3-input w3-border" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
						<br>
						<span class="help-block"></span>
					</div>
					<div class="form-group">
						<input type="submit" class="w3-btn w3-blue" name="passwordbtn" value="Update password">
					</div>
					<label>
					</label>
				</form>
				<form action="scripts/update_notify.php" method="post" class="w3-container">
					<br>
					<input type="checkbox" <?php if ($notify) {
																									echo 'checked="checked"';
																								} ?>" name="notifications" onchange="this.form.submit()"> Notifications
					<input type="hidden" name="notify" value="<?php if ($notify) {
																									echo "1";
																								} else {
																									echo "0";
																								} ?>" />
				</form>
			</div>
		</div>
	</div>
</div>
<?php
																								include("views/includes/footer.php");
?>
</body>

</html>
