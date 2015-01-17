<!--
takeout.php
Name: Richie Shi
Created: June 2, 2013
Last Modified: June 2, 2013
Allows users to borrow books.
-->

<?php
	$id = $_REQUEST['book'];
	
	//connects to database
	include('..\common.php');
	include('duedate.php');
	myconnect();
	//starts session for global variables
	session_start();
	
	if(isset($_SESSION['uname'])) {
	$sql_query = "SELECT * FROM `books` WHERE `id` = $id";
	$result = mysql_query($sql_query);
	$title = mysql_fetch_array($result);
	
	$date = get_date();
	$due_date  =  calc_due_date($date, 'day', 14);
	
	$in = $title['in'] - 1;
	$out = $title['out'] + 1;
	
	$sql_query = "INSERT INTO `" . $_SESSION['uname'] . "` ";
	$sql_query .= "(`id` , `book`, `author`, `due`, `fine`, `hold`) ";
	$sql_query .= "VALUES ( $id , '" . $title['title'] . "' , '" . $title['author'] . "' , '" . $due_date . "' , 0, 0 )";
	$result = mysql_query($sql_query) or die("You have taken this book out already.<br><a href=..\mybooks.php>Go back</a>"); //executes the query
	$sql_query = "UPDATE `books` SET `in` = " . $in . ", `out` = " . $out . " WHERE `id` = $id";
	$result = mysql_query($sql_query) or die("Failed to update row.");
	
	echo "Book successfully taken out.";
	header("Refresh:3; url=..\mybooks.php"); //redirects back to mybooks.php after 3 seconds
	} else {
		echo "Please sign in to borrow out books.";
		header("Refresh:3; url=..\signin.php"); //redirects back to mybooks.php after 3 seconds
	}
?>