<!DOCTYPE html>
<html>
<head>
	<title>User Sign_up </title>
	<!-- This is to indicate that the style is in style.css -->
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
	<div class="header">
		<h1>Signup to Camagru!</h1>
	</div>
	<form method="post" action="../scripts/signup_script.php">
		<table>
			<tr>
				<td>Username:</td>
				<td><input type="text" name="username" class="textInput" required></td>
			</tr>
			<tr>
				<td>Email:</td>
				<td><input type="email" name="email" class="textInput" required></td>
			</tr>
			<tr>
				<td>Password:</td>
				<td><input type="password" name="password" class="textInput" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
				title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required></td>
			</tr>
			<tr>
				<td>Re-type password:</td>
				<td><input type="password" name="password2" class="textInput" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
				title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="signup" value="Signup"></td>
			</tr>
		</table>
	</form>
</body>
</html>
