<?php
	/*
	changepassword.php
	Name: Richie Shi
	Created: June 1, 2013
	Last Modified: June 1, 2013
	Used to allow users to change their password
	*/
	//gets user input
	$old = $_REQUEST['old'];
	$new = $_REQUEST['new'];
	$cnew = $_REQUEST['cnew'];
	
	//connects to database
	include('common.php');
	myconnect();
	//starts session for global variables
	session_start();
	
	//gets the old password
	$sql_query = "SELECT `pword` FROM `users` WHERE `uname` = '" . $_SESSION['uname'] . "'";
	$result = mysql_query($sql_query);
	$pword = mysql_fetch_array($result);
	
	//checks if all inputs are correct
	if ($old == $pword['pword'] && $new == $cnew) {
		$sql_query = "UPDATE `users` SET `pword` = '" . $new . "' WHERE `uname` = '" . $_SESSION['uname'] . "'"; //changes the password
		$result = mysql_query($sql_query);
		echo "Password successfully changed. Redirecting back..."; //tells user that the change was successful
		header("Refresh:3; url=settings.php"); //redirects back to settings.php
	} else if ($old != $pword['pword']) {
		echo "Old password is incorrect. Redirecting back..."; //tells user what wrong
		header("Refresh:3; url=settings.php"); //redirects back to settings.php
	} else if ($new != $cnew) {
		echo "New passwords do not match. Redirecting back..."; //tells user what is wrong
		header("Refresh:3; url=settings.php"); //redirects back to settings.php
	}
?>