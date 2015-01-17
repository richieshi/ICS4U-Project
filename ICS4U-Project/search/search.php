<!DOCTYPE HTML>

<!--
search.php
Created by Howard Chen on May 11, 2013
Last Modified June 2, 2013
-->

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="account/style.css" />
		<title>Search</title>
	</head>

	<body>
		<div id="container">
		<div id="header">
		<h1><span class="off">&nbsp;&nbsp;Search</span></h1>
		</div>
		<div id="leftmenu">

        <div id="leftmenu_top"></div>

				<div id="leftmenu_main">    
                
                <h2><font face="veranda" color="white">Navigation Bar</font></h2>
                        
                <ul>
                    <li><a href="..\index.php">Home</a></li>
					<li><a href="search.php">Browse Books</a></li>
					<li><a href="..\AwardList.php">Book Awards</a></li>
					<?php
						session_start();
						if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
							echo'
							<li><a href="..\mybooks.php">My Books</a></li>
							<li><a href="..\account.php">My Account</a></li>
							<li><a href="..\settings.php">Settings</a></li>
							<li><a href="..\signout.php">Sign out</a></li>
							';
						} else {
							echo'
							<li><a href="..\signin.php">Sign In</a></li>
							<li><a href="..\register.php">Register</a></li>
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
		<!-- ================================================================= -->
		<form action='test1.php' method='GET'>
		<table border=1 cellpadding=3>
			<tr>
				<td>Order By:</td>
				<td><select name="order">
					<option value="title">Title</option>
					<option value="author">Author</option>
				</td>
				<td>
					<input type="radio" name="dec" value="ASC" checked>Increment</input><br/>
					<input type="radio" name="dec" value="DESC">Decrement</input>
				</td>
			</tr>
			<tr>
				<td>Search:</td><td colspan=2><input type="text" name="search"></td>
			</tr>
			<tr>
				<td colspan=3><input type="submit" value="Submit"></td>
			</tr>
			<tr>
				<td colspan=3><a href=adv.php>Advanced Search</a></td>
			</tr>
		</table>
		</form>
		<br><br><br><br><br><br><br><br><br><br><br><br>
		<hr/>
		&copy; 2013 Howard Chen, Michael Liu, Raymond Nie, Richie Shi <br/>
		Created: May 11, 2013 <br/>
		Last Modified: June 2, 2013
		
		</div>
		<div id="content_bottom"></div>
	</div></div>
</body>
</html>