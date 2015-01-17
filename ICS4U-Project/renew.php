<!--
renew.php
Name: Richie Shi
Created: June 2, 2013
Last Modified: June 2, 2013
Allows users to renew their books.
-->

<?php
	$id = $_REQUEST['book'];
	
	//connects to database
	include('common.php');
	include('search/duedate.php');
	myconnect();
	//starts session for global variables
	session_start();
	
	$sql_query = "SELECT `due` FROM `" . $_SESSION['uname'] . "` WHERE `id` = $id";
	$result = mysql_query($sql_query);
	$duedate = mysql_fetch_array($result);
	
	$new = calc_due_date($duedate['due'], 'day', 14); //adds 14 days to due date
	
	$sql_query = "UPDATE `" . $_SESSION['uname'] . "` SET `due` = '" . $new . "' WHERE `id` = $id"; //renew the book
	$result = mysql_query($sql_query); //executes the query
	
	echo "Book successfully renewed";
	header("Refresh:3; url=mybooks.php"); //redirects back to mybooks.php after 3 seconds
?>