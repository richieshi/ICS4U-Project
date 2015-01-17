<?php
/*
Name: Richie Shi
Created: May 1, 2013
Last Modified: May 1, 2013
common.php for accessing library database
*/
function myconnect()
{
   $id_link = mysql_connect('localhost', 'root', '');
   if (! $id_link)
      die( "The connection to the local MySQL server has failed.");
   $dbexists = mysql_select_db( "library" );
   if(! $dbexists)
      die("library database not found!");
} // end myconnect
?>