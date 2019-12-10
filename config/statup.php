<?php
include 'database.php';
// Connecting to mysql and create database
$dbh;
try {
        // Here we are accessing data in mysql database and connecting to the server.
        $dbh = new PDO($DB_CONN_STRING_LIGHT, $DB_USER, $DB_PASSWORD);
        // set the PDO error mode to exception
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //sql to create database
        $sql = "CREATE DATABASE IF NOT EXISTS `".$DB."`";
        //excecute sql
        $dbh->exec($sql);
        // echo "Database was created successfully\n";
    } catch (PDOException $e) {
        echo "<br>" . $e->getMessage()."<br>";
    }
// Connect to the created db and create user table
try {
    $dbh = new PDO($DB_CONN_STRING, $DB_USER, $DB_PASSWORD);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //sql to create user table
    $sql = "CREATE TABLE IF NOT EXISTS user(
        id int not null primary KEY AUTO_INCREMENT,
        username varchar(25) not null UNIQUE,
        `password` varchar(255) not null,
        picture_source varchar(255) null,
        verified tinyint(1) not null DEFAULT 0,
        veri_code varchar(10000) not null,
        email varchar(100) not null
    )";
    $dbh->exec($sql);
    // echo "<br>User table created successfully\n";
} catch (PDOException $e) {
    echo "<br>" . $e->getMessage()."<br>";
}
// Connect to the created db and create image table
try {
    $dbh = new PDO($DB_CONN_STRING, $DB_USER, $DB_PASSWORD);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //sql to create image table
    $sql = "CREATE TABLE IF NOT EXISTS `image`(
        id int not null primary KEY AUTO_INCREMENT,
        source varchar(255) not null,
        creationdate timestamp DEFAULT CURRENT_TIMESTAMP,
        userid int not null,
        foreign key(userid) references user(id) on delete cascade
    )";
    //Cascade on delete: this is when deleting a user with his/her pictures
    $dbh->exec($sql);
    // echo "<br>Image table created successfully\n";
} catch (PDOException $e) {
    echo "<br>" . $e->getMessage()."<br>";
}
//Connect to the created db and create comment table
try {
    $dbh = new PDO($DB_CONN_STRING, $DB_USER, $DB_PASSWORD);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //sql to create comment table
    $sql = "CREATE TABLE IF NOT EXISTS comment(
        id int not null primary key AUTO_INCREMENT,
        userid int not null,
        imageid int not null,
        `text` varchar(100) not null,
        `date` int not null,
        foreign key(userid) references user(id) on delete cascade,
        foreign key(imageid) references image(id) on delete cascade
    )";
    //Cascade on delete: this is when deleting a user with his/her pictures
    $dbh->exec($sql);
    // echo "<br>Comment table created successfully\n";
} catch (PDOException $e) {
    echo "<br>" . $e->getMessage()."<br>";
}
//Connect to the created db and create likes table
try {
    $dbh = new PDO($DB_CONN_STRING, $DB_USER, $DB_PASSWORD);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //sql to create likes table
    $sql = "CREATE TABLE IF NOT EXISTS likes(
        id int not null primary key AUTO_INCREMENT,
        userid int not null,
        imageid int not null,
        foreign key(userid) references user(id) on delete cascade,
        foreign key(imageid) references image(id) on delete cascade
    )";
    //Cascade on delete: this is when deleting a user with his/her pictures
    $dbh->exec($sql);
    // echo "<br>Likes table created successfully\n";
} catch (PDOException $e) {
    echo "<br>" . $e->getMessage()."<br>";
}
?>
