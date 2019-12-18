<?php
include "../config/database.php";
$dbh->exec("USE camagrudb");
//
session_start();
// var_dump($_SESSION);
// exit();
if (isset($_POST['imageid']) && !empty($_SESSION)) {

	$imageid = $_POST['imageid'];
	$userid = htmlEntities($_SESSION['id']);
	//		exit();
	if (isset($_SESSION['id']))
	{
		try
		{
			$sqlUpdate = "SELECT * FROM `likes` WHERE userid = ? AND imageid = ?";
			$stmt = $dbh->prepare($sqlUpdate);
			$stmt->bindParam(1, $userid);
			$stmt->bindParam(2, $imageid);
			$stmt->execute();
			if (!$stmt->rowCount())
			{
				$sql = "SELECT likes, userid FROM `image` WHERE id = ?";
				$stmt = $dbh->prepare($sql);
				$stmt->bindParam(1, $imageid);
				$stmt->execute();
				if ($stmt->rowCount())
				{
					$row = $stmt->fetch();
					$ownerid = $row['userid'];
					$likes = $row['likes'] + 1;

					$sql = "SELECT email, `notification` FROM `user` WHERE id = ?";
					$stmt = $dbh->prepare($sql);
					$stmt->bindParam(1, $ownerid);
					$stmt->execute();

					$row = $stmt->fetch();
					$email = $row['email'];
					$notify = $row['notification'];

					$sqlUpdate = "UPDATE `image` SET likes = ? WHERE id = ?";
					$stmt = $dbh->prepare($sqlUpdate);
					$stmt->bindParam(1, $likes);
					$stmt->bindParam(2, $imageid);
					$stmt->execute();

					$sqlUpdate = "INSERT INTO `likes` (userid, imageid) VALUES (?, ?)";
					$stmt = $dbh->prepare($sqlUpdate);
					$stmt->bindParam(1, $userid);
					$stmt->bindParam(2, $imageid);
					$stmt->execute();
					if ($notify == 1)
					{
						mail($email, "Liked Picture","Someone liked your picture","admin@camagru.co.za");
					}
					header("location: ../");
				}
			}
		} catch (PDOException $e) {
			echo $sqlUpdate . '<br>' . $e->getMessage();
		}
	}
}
header("location: ../");
?>
