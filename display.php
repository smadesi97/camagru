<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Display my sql images</title>
</head>
<body>
	<?php
	$mysqli = new mysqli('localhost', 'root', '123456', 'image')
	or die($mysqli->connect_error);
	$table = 'image';
	$results = $mysqli->query("SELECT * FROM $table") or die($mysqli->error);
	while ($data = $result->fetch_assoc()){
		echo "<img src='{$data['imagepath']}' width = '40%' height = '40%'>";
	}
	?>
</body>
</html>
