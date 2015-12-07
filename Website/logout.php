<?php
include("connection.php");


 
 mysqli_query($dbc, "INSERT INTO logins (UserGUID, SessionEnd) VALUES ([userid], CURRENT_TIMESTAMP)");

 
 
header("location:login.php");

session_start();
session_unset();
session_destroy();

exit();


?>
