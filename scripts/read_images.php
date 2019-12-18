<?php
    session_start();
    include '../config/database.php';
    $dbh->exec("USE camagrudb");
    if (!isset($_SESSION['id']))
    {
       header('location: ../login.php');
    }
    else if(isset($_POST['read_images']))
    {
        $path = "../views/includes/uploads/";
        $array = [];
        $images = scandir($path);
        $images = preg_grep('~^'.$_SESSION['username'].'.*\.png$~', $images);
        foreach($images as $img)
        {
            if($img === '.' || $img === '..')
            {
                continue;
            }
            if (preg_match('/.png/',$img))
            {
                $array[] = $img;
            }
            else
            {
                continue;
            }
        }
        echo json_encode($array);
    }
