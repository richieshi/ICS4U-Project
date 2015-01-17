<!DOCTYPE HTML>

<!--
test1.php
Created by Howard Chen on May 11, 2013
Last Modified June 2, 2013
-->

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="account/style.css" />
		<title>Results</title>
	</head>
	
	<body>
		<div id="container">
		<div id="header">
		<h1><span class="off">&nbsp;&nbsp;Results</span></h1>
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
		<!-- ================================================================= -->
		<p><a href=search.php>Back</a></p>
		<?php
			$order = $_REQUEST['order'];
			$dec = $_REQUEST['dec'];
			if (!empty($_REQUEST['search']))
				$search = $_REQUEST['search'];
			
			include('display.php');
			
			//connects to database
			include('../common.php');
			myconnect();
			
			//gets information from database
		if (empty($_REQUEST['search'])){
			$query = "SELECT * FROM `books` ORDER BY " . $order . " " . $dec . ";";
			
			advdisplay ($query);
		} else {
			$query = "SELECT * FROM `books` WHERE `title` LIKE '%" . $search . "%';";
			
			advdisplay ($query);
			$query = "SELECT * FROM `books` WHERE `author` LIKE '%" . $search . "%';";
			
			advdisplay ($query);
		}
		?>
		
		<br><br><br><br><br><br><br><br><br><br><br><br>
		<hr/>
		&copy; 2013 Howard Chen, Michael Liu, Raymond Nie, Richie Shi <br/>
		Created: May 11, 2013 <br/>
		Last Modified: June 2, 2013
		</div>
		<div id="content_bottom"></div>
		</div>
		</div>
	</body>
</html>