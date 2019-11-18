<?php
// this is my nav
include("views/includes/nav.php");
?>
<div class="w3-display-middle">
	<div class="header">
		<h1>Signup to Camagru!</h1>
	</div>
	<form method="post" action="../scripts/signup_script.php">
		<table>
			<tr>
				<td class="w3-text-blue">Username:</td>
				<td><input type="text" name="username" class="w3-input w3-border" required></td>
			</tr>
			<tr>
				<td class="w3-text-blue">Email:</td>
				<td><input type="email" name="email" class="w3-input w3-border" required></td>
			</tr>
			<tr>
				<td class="w3-text-blue">Password:</td>
				<td><input type="password" name="password" class="w3-input w3-border" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required></td>
			</tr>
			<tr>
				<td class="w3-text-blue">Re-type password:</td>
				<td><input type="password" name="password2" class="w3-input w3-border" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required></td>
			</tr>
			<tr>
				<td></td>
				<td><input class="w3-btn w3-blue" type="submit" name="signup" value="Signup"></td>
			</tr>
		</table>
	</form>
</div>
</body>
</html>
