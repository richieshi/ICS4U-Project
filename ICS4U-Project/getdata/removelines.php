<?php
        file_put_contents('books.txt', implode(PHP_EOL, file('books.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES)));
?>