<!--
mybook.php
Created by Richie Shi on May 12, 2013
Last Modified June 2, 2013
-->
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
<title>User Account</title>
</head>

<body>
	<div id="container">
		<div id="header">
        	<h1><span class="off">&nbsp;&nbsp;My Books</span></h1>
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
				<table border="0" width="100%">
					<tr>
						<th colspan=2>Borrowed<hr></th>
					</tr>
					<?php
						//connect to database
						include('common.php');
						myconnect();
						//start session for global variables
						session_start();
						
						$sql_query = "SELECT * FROM `" . $_SESSION['uname'] . "` WHERE `id` > 1"; //gets all info about the user's account
						$result = mysql_query($sql_query);				
						for ($i = 0; $books = mysql_fetch_array($result); $i++) { //prints out the books that the user has borrowed out
							echo "
							<tr>
							<td>" . $books['book'] . "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp by " . $books['author'] . "</td>
							</tr>	
							<tr>
							<td>
							Due: " . $books['due'] . "
							</td>
							<td>
							<form method=POST action=renew.php?book=" . $books['id'] . ">
							<input type=submit value=Renew style='float: right;'><!--renew button-->
							</form>
							</td>
							</tr>
							<tr>
							<td colspan=2>
							<form method=POST action=return.php?book=" . $books['id'] . ">
							<input type=submit value=Return style='float: right;'><!--return button-->
							</form>
							</td>
							</tr>
							<tr>
							<td colspan=2>
							<hr>
							</td>
							</tr>
							";
						}
					?>
				</table>
				<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		<hr/>
		&copy; 2013 Howard Chen, Michael Liu, Raymond Nie, Richie Shi<br/>
		Created: May 11, 2013 <br/>
		Last Modified: June 2, 2013
		</div>
		<div id="content_bottom"></div>
	</div></div>
</body>
</html>