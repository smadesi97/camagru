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
		<h2>Login</h2>
		<p>Please fill in your credentials to login.</p>
		<form action="scripts/login_script.php" method="post" class="w3-container">
			<div class="form-group">
				<label class="w3-text-blue"><b>Username</b></label>
				<input type="text" name="username" class="w3-input w3-border" value="">
				<br><br>
				<span class="help-block"></span>
			</div>
			<div class="form-group ">
				<label class="w3-text-blue"><b>Password</b></label>
				<input type="password" name="password" class="w3-input w3-border" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
				<br><br>
				<span class="help-block"></span>
			</div>
			<div class="form-group">
				<input type="submit" class="w3-btn w3-blue" value="Login">
			</div>
			<label>
				<input type="checkbox" checked="checked" name="remember"> Remember me
			</label>
			<p>Don't have an account? <a href="signup.php">Sign up now</a>.</p>
			<a href="forgot_password.php">Forgot your password?</a>
		</form>
	</div>
</div>
<?php
include("views/includes/footer.php");
?>
</body>

</html>
