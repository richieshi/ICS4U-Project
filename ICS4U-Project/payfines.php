<!--
payfiness.php
Created by Richie Shi on June 2, 2013
Last Modified June 2, 2013
-->

<?php
	//connects to database
	include('common.php');
	myconnect();
	//starts session for global variables
	session_start();
	
	$sql_query = "UPDATE `" . $_SESSION['uname'] . "` SET `fine` = 0 WHERE `id` = 0"; //sets fines to 0
	$result = mysql_query($sql_query);
	
	echo "Fines have been paid."; //tells users that fines have been paid
	header("Refresh:3; url=account.php"); //redirects back to account.php after 3 seconds
?>