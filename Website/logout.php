<?php
//session_start();
include('connection.php');

session_start();
session_unset();
if(session_destroy()) // Destroying All Sessions
{
			//echo "You've gone offline now!";
			$update_status_query = mysql_query("INSERT INTO logins (UserGUID, SessionEnd) VALUES ([userid], CURRENT_TIMESTAMP)");
		
	
		
	// TAKES YOU TO INDEX.PHP if the session is destroyed
	header("Location: login.php"); // Redirecting To Home Page
}
?>
