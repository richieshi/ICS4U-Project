<!--
index.php
Created by Richie Shi on May 1, 2013
Last Modified June 1, 2013
-->
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
<title>Library</title>
</head>

<body>
<div id="container">
		<div id="header">
        	<h1>&nbsp;&nbsp;&nbsp;&nbsp;<span class="off">&nbsp;&nbsp;Library</span></h1>
        </div>          
        
        <div id="leftmenu">

        <div id="leftmenu_top"></div>

			<div id="leftmenu_main">
                
                <h2><font face="veranda" color="white">Navigation Bar</font></h2>
                        
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="search/search.php">Browse Books</a></li>
					<li><a href="AwardList.php">Book Awards</a></li>
					<?php
						session_start();
						if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) { //shows these options if user is logged in
							echo'
							<li><a href="mybooks.php">My Books</a></li>
							<li><a href="account.php">My Account</a></li>
							<li><a href="settings.php">Settings</a></li>
							<li><a href="signout.php">Sign out</a></li>
							';
						} else { //shows these options if user is not logged in
							echo'
							<li><a href="signin.php">Sign In</a></li>
							<li><a href="register.php">Register</a></li>
							';
						}
					?>
                </ul>
			</div>
                
                
			<div id="leftmenu_bottom"></div>
        </div>
        <div id="content">
        <div id="content_top"></div>
        <div id="content_main">
		<font size=4>
		Welcome! You will be able to:
		<br><br>
		<ul>
			<li>Search for books</li>
			<li>Take out books</li>
			<li>Place books on hold</li>
			<li>Check the status of the books you have borrowed</li>
			<li>Renew books</li>
			<li>Pay fines</li>
		</ul>
		</font>
		<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		<hr>
		&copy; 2013 Howard Chen, Michael Liu, Raymond Nie, Richie Shi <br>
        Created: May 1, 2013<br>
        Last Modified: June 1, 2013
        </div>
        <div id="content_bottom"></div>
      </div>
   </div>
</body>
</html>
