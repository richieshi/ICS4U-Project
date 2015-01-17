<?php
	//connect to database
	include('common.php');
	myconnect();
	set_time_limit(99999999999999999999);
	$seperate = array();
	$file = fopen('books.txt' , 'r');
	while (!feof($file)) {
		$bookauthor[] = fgets($file);
	}
	
	for ($i = 0; $i < count($bookauthor); $i++) {
		$seperate = explode(" by ", $bookauthor[$i]);
		$total = rand(1,4);
		$sql_query = "INSERT INTO `books` ";
		$sql_query .= "(`title`, `author`, `total`, `in`, `out`, `hold`) ";
		$sql_query .= "VALUES (";
		$sql_query .= "'" . $seperate[0] . "' , ";
		$sql_query .= "'" . $seperate[1] . "' , ";
		$sql_query .= "'$total' , ";
		$sql_query .= "'$total' , ";
		$sql_query .= "'0' , ";
		$sql_query .= "'0' )";
		$result = mysql_query($sql_query);
	}
?>