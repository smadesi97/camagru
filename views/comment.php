<?php
include_once 'config/database.php';
include_once 'config/statup.php';

try{
    if (isset( $_POST['commentsave'])){
        $post_id = htmlEntities($_POST['image_id']);
        $comment = htmlEntities($_POST['comment']);
        $username = $_SESSION['username'];
        $date = date('Y-m-d H:i:s');


            $sqlInsert = "INSERT INTO comments (username, commentimg ,post_id, date)
                        VALUES ('$username', '$comment', '$post_id', now())";
            $stmt = $conn->prepare($sqlInsert);
            $stmt->bindParam(':post_id', $post_id);
            $stmt->execute();
            $result = "<p style='padding: 20px; color: green;'> Comment successful </p>";

    }
}
catch (PDOException $e)
{
    echo $sqlInsert.'<br>'.$e->getMessage();
    echo "update failed";
}
header('');
?>
