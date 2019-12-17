<?php
session_start();
//print_r($_POST);
//print_r($_SESSION);

include_once "../config/setup.php";
//get users ID for SQL WHERE clause

$notify_value =  $_POST['notify'];
$userid = htmlEntities($_SESSION['id']);

try {
	if ($notify_value)
	{
		$notify_value = 0;
	}else
	{
		$notify_value = 1;
	}
	$sqlUpdate = "UPDATE user SET `notification` = ? WHERE id = ?";
	$stmt = $dbh->prepare($sqlUpdate);
	$stmt->bindParam(1, $notify_value);
	$stmt->bindParam(2, $userid);
	$stmt->execute();
	header("location: ../views/logout.php");
} catch (PDOException $e) {

	echo $sqlUpdate . '<br>' . $e->getMessage();
	echo "update failed";
}

