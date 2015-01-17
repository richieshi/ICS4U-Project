<?php
	$file = fopen ('book.txt', 'r'); // opens the file for reading
	
	while (!feof($file)) {
		$books[] = fgets($file); // reads from the file until end of file
	}
	
	for ($i = 0; $i < count($books); $i++) {
		str_replace(substr($books[$i], strpos($books[$i], " ("), 7), " ", $books[$i]); //gets rid of useless info
	}
	
	fclose($file); //closes file
	
	$file = fopen ('book.txt', 'w'); // opens the file for writing
	
	for ($i = 0; $i < count($books); $i++) {
		fwrite($file, rtrim($books[$i], " ") . "\r\n");
	}
	
	fclose($file);
?>