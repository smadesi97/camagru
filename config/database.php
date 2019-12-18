<?php
//  include "setup.php";
//database details declaration
    $dbh;
    $DB = "camagrudb";
    $HOST = "localhost";
    $PORT = "8080";
    $DB_TYPE = "mysql";
    $DB_USER = "root";
    $DB_PASSWORD = "123456";

    //database connection strings
    $DB_CONN_STRING = $DB_TYPE.":"."host=".$HOST.";dbname=".$DB;
    $DB_CONN_STRING_LIGHT = $DB_TYPE.":"."host=".$HOST;

    $dbh = new PDO($DB_CONN_STRING_LIGHT, $DB_USER, $DB_PASSWORD);
    // // set the PDO error mode to exception
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // $dbh->exec("USE camagrudb");
?>
