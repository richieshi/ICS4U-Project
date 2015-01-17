<!--
return.php
Name: Richie Shi
Created: June 2, 2013
Last Modified: June 2, 2013
Allows users to return their books.
-->

<?php
	$id = $_REQUEST['book'];
	
	//connects to database
	include('common.php');
	myconnect();
	//starts session for global variables
	session_start();
	
	$sql_query = "DELETE FROM `" . $_SESSION['uname'] . "` WHERE `id` = $id"; //returns the book
	$result = mysql_query($sql_query); //executes the query
	
	$sql_query = "SELECT * FROM `books` WHERE `id` = $id";
	$result = mysql_query($sql_query);
	$title = mysql_fetch_array($result);
	
	$in = $title['in'] + 1; //lowers number of books in the library
	$out = $title['out'] - 1; //increases number of books taken out
	
	$sql_query = "UPDATE `books` SET `in` = '" . $in . "', `out` = '" . $out . "' WHERE id = $id";
	$result = mysql_query($sql_query);
	
	echo "Book successfully returned";
	header("Refresh:3; url=mybooks.php"); //redirects back to mybooks.php after 3 seconds
?>