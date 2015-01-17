<?php
	/*
	rcheck.php
	Name: Richie Shi
	Created: March 15, 2013
	Last modified: June 1, 2013
	register.php is connected to here to insert the information that the users input to make their account. This also checks whether or not
	usernames exist and passwords match.
	*/
	include('common.php'); // connects to mysql database
	myconnect();
	session_start();
	
	$uname = $_REQUEST['uname']; // gets the username the user wants
	$pword = $_REQUEST['pword']; // gets the password the user wants
	$pword2 = $_REQUEST['pword2']; // gets the password that confirms that the first password is right
	$email = $_REQUEST['email']; // gets the user's email
	$pwordcheck = false;
	
	if ($uname == "" || $uname == "book awards" || $uname == "users" || $uname == "books" || $pword == "" || $email == "") {
		$_SESSION['error'] = true;
		header("Location: register.php");
	}
	
	$sql_query = "SELECT `uname` FROM `users` WHERE `uname` = '" . $uname . "'"; //gets username that is equal to the one the user entered
    $result = mysql_query($sql_query); //executes the mysql command
	$user = mysql_fetch_array($result); //gets the information from $result
	
	if ($pword == $pword2) {
		$pwordcheck = true;
	} else {
		$pwordcheck = false;
	}
	
	//inserts user info into `user` and creates a table named the user's username
	if ($user == "" && $pwordcheck && $pword != "" && $email != "") {
		$sql_query = "CREATE TABLE `" . $uname . "` ( `id` INT(3), `book` VARCHAR(100), `author` VARCHAR(100), `due` VARCHAR(20), `fine` DOUBLE, `hold` int(1), PRIMARY KEY (`id`))";
		$result = mysql_query($sql_query) or die("Failed to create table.");
		$sql_query = "INSERT INTO `" . $uname . "` ";
		$sql_query .= "(`id` , `book`, `author`, `due`, `fine`, `hold`) ";
		$sql_query .= "VALUES ( ";
		$sql_query .= "0 , ";
		$sql_query .= "'' , ";
		$sql_query .= "'' , ";
		$sql_query .= "0 , ";
		$sql_query .= "0 , ";
		$sql_query .= "0 )";
		$result = mysql_query($sql_query) or die("Failed to insert information.");
		$sql_query = "INSERT INTO `users` ";
		$sql_query .= "(`uname` , `pword`, `email`) ";
		$sql_query .= "VALUES ( ";
		$sql_query .= "'$uname' , ";
		$sql_query .= "'$pword' , ";
		$sql_query .= "'$email' )";
		$result = mysql_query($sql_query) or die("Failed to insert information.");
		$_SESSION['reg'] = true;
		header ("Location: signin.php");
	} else if ($user != "") { //username taken
		$_SESSION['user'] = false;
		header ("Location: register.php");
	} else if (!$pwordcheck) { //password does not match
		$_SESSION['pass'] = false;
		header ("Location: register.php");
	}
?>