<?php
	$file = fopen('books.txt', 'r');
	
	while (!feof($file)) {
		$books[] = fgets($file);
	}
	
	fclose($file);
	
	$file = fopen('numberedbooks.txt', 'w');
	
	for ($i = 0; $i < count($books); $i++) {
		fwrite($file, $i+1 . "." . $books[$i]);
	}
	
	fclose($file);
?>