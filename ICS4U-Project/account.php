<!--
account.php
Created by Richie Shi on May 12, 2013
Last Modified June 2, 2013
-->
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
<title>My Account</title>
</head>

<body>
<div id="container">
		<div id="header">
        	<h1><span class="off">&nbsp;&nbsp;My Account</span></h1>
        </div>          
        
        <div id="leftmenu">

        <div id="leftmenu_top"></div>

				<div id="leftmenu_main">
                
                <h2><font face="veranda" color="white">Navigation Bar</font></h2>
                        
                <ul>
					<li><a href="index.php">Home</a></li>
                    <li><a href="search/search.php">Browse Books</a></li>
					<li><a href="AwardList.php">Book Awards</a></li>
					<li><a href="mybooks.php">My Books</a></li>
					<li><a href="account.php">My Account</a></li>
                    <li><a href="settings.php">Settings</a></li>
                    <li><a href="signout.php">Sign Out</a></li>                    
                </ul>
</div>
                
                
              <div id="leftmenu_bottom"></div>
        </div>
        
        <div id="content">
        
        <div id="content_top"></div>
        <div id="content_main">
			<img src="avatars/1.png">
				<?php
				$total = 0;
				//connects to database
				include('common.php');
				myconnect();
				//starts session to access global variables
				session_start();
				
				//gets data from database
				$sql_query = "SELECT COUNT(*) AS `book` FROM `" . $_SESSION['uname'] . "` WHERE hold = 0"; //gets number of books the user has borrowed out
				$result = mysql_query($sql_query);
				$books = mysql_fetch_array($result);
				$sql_query = "SELECT COUNT(*) AS `hold` FROM `" . $_SESSION['uname'] . "` WHERE hold >= 1"; //gets number of books the user has on hold
				$result = mysql_query($sql_query);
				$holds = mysql_fetch_array($result);
				$sql_query = "SELECT COUNT(*) AS `due` FROM `" . $_SESSION['uname'] . "` WHERE due = 0"; //gets number of books the user has borrowed out
				$result = mysql_query($sql_query);
				$due = mysql_fetch_array($result);
				$sql_query = "SELECT * FROM `" . $_SESSION['uname'] . "` WHERE `id` = 0"; //gets number of books the user has borrowed out
				$result = mysql_query($sql_query);
				$total = mysql_fetch_array($result);
				$tbooks = $books['book'] - 1;

				echo'
				<table border="1" width="100%">
					<tr>
						<td>Books signed out:</td>
						<td>' . $tbooks . '</td>
					</tr>
					<tr>
					<tr>
						<td>Books on hold:</td>
						<td>' . $holds['hold'] . '</td>
					</tr>
					<tr>
						<td>Books due:</td>
						<td>' . $total['due'] . '</td>
					</tr>
					<tr>
						<td>Total Fine:</td>
						<td>';
				printf('$%0.2f', $total['fine']);
				echo
				'</td>
					</tr>
				</table>
				';
				?>
				<form method=POST action=payfines.php>
					<input type=submit value="Pay Fines">
				</form>
				<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
				<hr>
				&copy; 2013 Howard Chen, Michael Liu, Raymond Nie, Richie Shi<br>
				Created: May 1, 2013<br>
				Last Modified: June 1, 2013
        </div>
        <div id="content_bottom"></div>
      </div>
   </div>
</body>
</html>