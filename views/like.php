<?php
session_start();
$connect = mysql_connect("localhost", "root", "123456", "likes");
$query = "SELECT userid, imageid FROM likes";
// here we execute the query and store results in results function
$results = mysql_query($connect, $query);

while ($row = mysql_fetch_array($results))
{
    
}
?>
