<?php
	/*
	changeemail.php
	Name: Richie Shi
	Created: June 1, 2013
	Last Modified: June 1, 2013
	Used to allow users to change their email used
	*/
	//gets user input
	$email = $_REQUEST['email'];
	
	//connects to database
	include('common.php');
	myconnect();
	//starts session for global variables
	session_start();
	
	$sql_query = "UPDATE `users` SET `email` = '" . $email . "' WHERE `uname` = '" . $_SESSION['uname'] . "'"; //updates email
	$result = mysql_query($sql_query);
	echo "Email successfully changed. Redirecting back..."; //tells user that the change was successful
	header("Refresh:3; url=settings.php"); //redirects back to settings.php
?>