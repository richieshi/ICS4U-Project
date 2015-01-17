<?php
        $books = fopen ("book1.txt", 'r');
		set_time_limit(99999999999999999999);
		$titles = array();
        
        while (!feof($books)) {
            $book[] = fgets($books);
        }

        for ($i = 0; $i < count($book); $i++) {
            str_replace(' ', '+', $book[$i]);
        }

        for ($i = 0; $i < count($book); $i++) {
                $site = fopen('http://www.iblist.com/search/search.php?item=' . $book[$i] . '&submit=Search', 'r');
                for ($j = 0; $j < 162; $j++) {
                    $asdf = fgets($site);
                }
				
				$line = fgetss($site);
				$authors = trim($line);
                fclose($site);
				$bookauthor = fopen('bookauthor.txt', 'a');
				fwrite($bookauthor, $authors . "\r\n");
				fclose($bookauthor);
		}
?>