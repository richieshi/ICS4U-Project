<?php
	$file = fopen('books.txt', 'r');
	
	while (!feof($file)) {
		$books[] = fgets($file);
	}
	
	$unique = array_unique($books);
	
	fclose($file);
	$file = fopen('books.txt', 'w');
	
	for ($i = 0; $i < count($unique); $i++) {
		fwrite($file, $unique[$i]);
	}
	
	fclose($file);	
?>