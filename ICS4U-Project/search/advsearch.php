<!DOCTYPE HTML>

<!--
advsearh.php
Created by Howard Chen on May 28, 2013
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
		<p><a href=adv.php>Back</a></p>
		<?php
			if (!empty($_REQUEST['any']))
				$any = $_REQUEST['any'];
			else $any;
			if (!empty($_REQUEST['all']))
				$all = $_REQUEST['all'];
			else $all;
			if (!empty($_REQUEST['none']))
				$none = $_REQUEST['none'];
			else $none;
			$select = $_REQUEST['select'];
			
			include('display.php');
			
			//connects to database
			include('..\common.php');
			myconnect();
			
			//gets information from database
			if ($select != "*"){
				$query = "SELECT * FROM `books` WHERE ";
				if (!empty($any)){
					$pieces = explode (" ", $any);
					for ($i = 0; !empty($pieces[$i]); $i++){
						$query .= $select . " LIKE '%". $pieces[$i] . "%' OR ";
					}
				}
				if (!empty($all)){
					$pieces = explode (" ", $all);
					for ($i = 0; !empty($pieces[$i]); $i++){
						$query .= $select . " LIKE '%". $pieces[$i] . "%' AND ";
					}
				}
				if (!empty($none)){
					$pieces = explode (" ", $none);
					for ($i = 0; !empty($pieces[$i+1]); $i++){
						$query .= $select . " NOT LIKE '%". $pieces[$i] . "%' OR ";
					}
					$query .= $select . " NOT LIKE '%". $pieces[$i] . "%'";
				}
				$query .= ";";
			}
			else {
				$query = "SELECT * FROM `books` WHERE ";
				if (!empty($any)){
					$pieces = explode (" ", $any);
					for ($i = 0; !empty($pieces[$i+1]); $i++){
						$query .= "`title` LIKE '%". $pieces[$i] . "%' OR ";
					}
					$query .= "`title` LIKE '%". $pieces[$i] . "%'";
				}
				if (!empty($all)){
					$pieces = explode (" ", $all);
					for ($i = 0; !empty($pieces[$i+1]); $i++){
						$query .= "`title` LIKE '%". $pieces[$i] . "%' AND ";
					}
					$query .= "`title` LIKE '%". $pieces[$i] . "%'";
				}

				if (!empty($none)){
					$pieces = explode (" ", $none);
					for ($i = 0; !empty($pieces[$i+1]); $i++){
						$query .= "`title` NOT LIKE '%". $pieces[$i] . "%' AND ";
					}
					$query .= "`title` NOT LIKE '%". $pieces[$i] . "%'";
				}
				$query .= ";";

				advdisplay ($query);
				$query = "SELECT * FROM `books` WHERE ";
				if (!empty($any)){
					$pieces = explode (" ", $any);
					for ($i = 0; !empty($pieces[$i+1]); $i++){
						$query .= "`author` LIKE '%". $pieces[$i] . "%' OR ";
					}
					$query .= "`author` LIKE '%". $pieces[$i] . "%'";
				}
				if (!empty($all)){
					$pieces = explode (" ", $all);
					for ($i = 0; !empty($pieces[$i+1]); $i++){
						$query .= "`author` LIKE '%". $pieces[$i] . "%' AND ";
					}
					$query .= "`author` LIKE '%". $pieces[$i] . "%'";
				}

				if (!empty($none)){
					$pieces = explode (" ", $none);
					for ($i = 0; !empty($pieces[$i+1]); $i++){
						$query .= "`author` NOT LIKE '%". $pieces[$i] . "%' AND ";
					}
					$query .= "`author` NOT LIKE '%". $pieces[$i] . "%'";
				}
				$query .= ";";

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