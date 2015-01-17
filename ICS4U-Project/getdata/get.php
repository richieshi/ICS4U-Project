<?php
    $books = array();
    $list = fopen('wordlist.txt', 'r');	//opens the list of words for the search engine to search

    while (!feof($list)) {
        $term[] = fgets($list);		//gets the list of words to search with the search engine
    }
    
    for ($i = 0; $i < count($term); $i++) {
    	$site = fopen('http://ipac.tdsb.on.ca/ipac20/ipac.jsp?session=1368F21J6114Q.253&menu=search&aspect=keyword&npp=1000&ipp=20&profile=1232&ri=3&source=172.22.11.33%40!east&index=.TW&term='.$term.'&x=0&y=0&aspect=keyword', 'r');	//searches through the library with the list of words

        for ($j = 0; $j < 310; $j++) {
           $nothing = fgets ($site); 
        }
        
        $k = 0;
        do {
            $books[$k] = fgets($site);
            $k++;
        } while (!strstr($books[$k-1], '"javascript">'));
		
        fclose($site);
		
		$htmllist = fopen('out.txt', 'w'); //opens the file to write the list of books with the html tags

        for ($i = 0; $i < count($term); $i++) {
            fwrite ($booklist, $books[$i] . '\r\n'); //writes to the text file the list of books with the html tags
        }

        fclose($htmllist);//closes the list of books with html tags

        $hlist = fopen('out.txt', 'r'); //opens file of books with html tags for reading from the top of the file
    
	    while (!feof($hlist)) {
            $lbooks[] = $fgetss($hlist); //reads in the list of books without html tags
        }
    
        fclose($hlist);

        $booklist = fopen('books.txt', 'a'); //opens file to write in books without html tags

        for ($i = 0; $i < count($lbooks); $i++) {
            fwrite($booklist, $lbooks[$i]);
        }

        fclose($booklist); //closes the text files containing the list of books
    }
    
    fclose($list); //closes the dictionary list

    /*$htmllist = fopen('out.txt', 'w'); //opens the file to write the list of books with the html tags

    for ($i = 0; $i < count($term); $i++) {
        fwrite ($booklist, $books[$i] . '\r\n'); //writes to the text file the list of books with the html tags
    }

    fclose($htmllist);//closes the list of books with html tags

    $hlist = fopen('out.txt', 'r'); //opens file of books with html tags for reading from the top of the file
    
    while (!feof($hlist)) {
        $lbooks[] = $fgetss($hlist); //reads in the list of books without html tags
    }
    
    fclose($hlist);

    $booklist = fopen('books.txt', 'w'); //opens file to write in books without html tags

    for ($i = 0; $i < count($lbooks); $i++) {
        fwrite($booklist, $lbooks[$i]);
    }

    fclose($booklist) //closes the text files containing the list of books*/
?>
