<?php
include_once '../config/database.php';
// Here we are accessing data in mysql database and connecting to the server.

try{
    if (isset($_POST['commentsave'])){
        $post_id = $_POST['imageid'];
		$comment = $_POST['text'];
        $username = $_SESSION['username'];
		//$date = date('Y-m-d H:i:s');

		$sqlInsert = "INSERT INTO comment (username, `imageid`, `text`)
						VALUES ('?,?,?')";
			$stmt = $dbh->prepare($sqlInsert);
			$stmt->bindParam(1, $username);
			$stmt->bindParam(2, $post_id);
			$stmt->bindParam(3, $comment);
			$stmt->execute();
            //$result = "<p style='padding: 20px; color: green;'> Comment successful </p>";
			//echo"random";
		}
	}
	catch (PDOException $e)
	{
		echo $sqlInsert.'<br>'.$e->getMessage();
		echo "update failed";
	}
?>
