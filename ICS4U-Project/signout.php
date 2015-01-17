<?php
	/*
	signout.php
    Name: Richie Shi
    Created: May 15, 2013
    Last Modified: May 30, 2013
	Signs the user out of their account.
    */
	include("signedin.php"); // connects to the file that says whether or not the user is logged in
	session_start();
	$_SESSION['loggedin'] = false; // variable that checks if the user is logged in (set to false means logged out
	$_SESSION['uname'] = "";
	header("Location: index.php"); // redirects user to the main page
?>