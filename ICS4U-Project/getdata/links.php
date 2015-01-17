<?php
	/*
	Name: Richie Shi
	Created: June 1, 2013
	Last Modified: June 2, 2013
	*/
	$file = fopen('books.txt', 'r');
	set_time_limit(99999999999999999999);
	
	while (!feof($file)) {
		$books[] = fgets($file);
	}
	
	fclose($file);
	for ($i = 0; $i < count($books); $i++) {
		$site = fopen('http://www.iblist.com/search/search.php?item=' . $books[$i] . '&submit=Search', 'r');
		for ($i = 0; $i < 162; $i++) {
			$asdf = fgets($site);
		}
		
		$input = fgets($site);
		$link = substr($input, 19, strpos($input, 'htm')-16);
		fclose($site);
		
		$file = fopen('links.txt' , 'a');
		fwrite($file, $link . "\r\n");
		fclose($file);
	}
?>