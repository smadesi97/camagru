<?php
// Initialize the session
session_start();
// var_dump($_SESSION);
// Unset all of the session variables
$_SESSION = array();
// Destroy the session.
session_destroy();
session_unset();
// var_dump($_SESSION);
// Redirect to login page
header("location: ../index.php");
exit;
?>
