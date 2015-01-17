<?php
    /*
	check.php
    Name: Richie Shi
    Created: May 1, 2013
    Last Modified: May 30, 2013
	signin.php is connected to here to insert the information that the users input to sign in. This checks whether or not the username
	exists.
    */
    include('common.php'); // connects to the file that says whether or not the user is logged in
    myconnect(); // connects to mysql
	session_start();

    $uname = $_REQUEST['uname']; // gets the username the user used to log in
    $pword = $_REQUEST['pword']; // gets the password the user used to log in

    $sql_query = "SELECT `pword` FROM `users` WHERE `uname` LIKE '" . $uname . "'"; //gets username that is equal to the one the user entered
    $result = mysql_query($sql_query); // executes the mysql command
	$pass = mysql_fetch_array($result); // gets the information from $result

    if ($pass['pword'] == $pword && !empty($pass) && !empty($pword)) {
	    $_SESSION['loggedin'] = true; // tells other pages that the user is logged in
		$_SESSION['uname'] = $uname; // tells other pages which user is logged in
        header("Location: index.php"); // redirects user to main page
    } else {
		$_SESSION['check'] = false;
        header("Location: signin.php");// redirect user back to sign in to tell them something went wrong
    }
?>