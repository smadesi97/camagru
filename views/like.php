<?php
include_once 'config/database.php';
include_once 'config/statup.php';
include_once 'home.php';
    $imageid = $_GET['usersimage'];
    $userid = $_SESSION['username'];
    $date = date('Y-m-d H:i:s');

    $sqlInsert = 'SELECT username FROM likes WHERE post_id = '.$imageid;
    $stmt = $conn->prepare($sqlInsert);
    $stmt->execute();
    $row = $stmt->fetchAll();
    $run_bool = 0;
    foreach ($row as $user){
        if (in_array($username, $user))
            $run_bool = 1;
    }
	if ($run_bool == 0)
	{
    $sqlInsert = "INSERT INTO likes (username, post_id, date) VALUES ('$userid', '$imageid', now())" ;
    $stmt->bindParam(':post_id', $imageid);
    $stmt = $conn->prepare($sqlInsert);
    $stmt->execute();
	}else
	{
        $del = 'DELETE FROM likes WHERE username = :username AND post_id = :post_id';
        $stmt = $conn->prepare($del);
        $stmt->execute(array(':username' => $username, ':post_id' => $imageid));
    }
    header('');
