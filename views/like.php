<?php
include "../config/setup.php";
	// var_dump($_POST);
	session_start();
	echo "okay";
	if (isset($_POST['imageid'])){

		$imageid = $_POST['imageid'];
		$userid = htmlEntities($_SESSION['id']);
//		exit();

	try {
		$sqlUpdate = "INSERT INTO `likes` (userid, imageid) VALUES (?, ?)";
		$stmt = $dbh->prepare($sqlUpdate);
		$stmt->bindParam(1, intval($userid));
		$stmt->bindParam(2, intval($imageid));
		$stmt->execute();
	} catch (PDOException $e) {

		echo $sqlUpdate . '<br>' . $e->getMessage();
	}
}
?>
