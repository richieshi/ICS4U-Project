<!--
settings.php
Created by Richie Shi on May 12, 2013
Last Modified June 2, 2013
-->
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
<title>Settings</title>
</head>

<body>
<div id="container">
		<div id="header">
        	<h1><span class="off">&nbsp;&nbsp;Settings</span></h1>
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
				<form method=POST action=changepass.php>
				<font size=3><b>Change Password:</b></font><br><br>
				<table border="0" width="100%">
					<tr>
						<td>Old Password: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=password name=old></td>
					</tr>
					<tr>
						<td>New Password: &nbsp;&nbsp;&nbsp;&nbsp;<input type=password name=new></td>
					</tr>
					<tr>
						<td>Confirm New Password: &nbsp;<input type=password name=cnew></td>
					</tr>
					<tr>
						<td><input type=Submit value="Change Password"></td>
					</tr>
				</table>
				</form>
				<br><hr><br>
				<font size=3><b>Change Email:</b></font><br><br>
				<form method=POST action=changeemail.php>
				<table border="0" width="100%">
					<tr>
						<td>Old Email: 
						<?php
							include('common.php');
							myconnect();
							session_start();
							
							$sql_query = "SELECT `email` FROM `users` WHERE `uname` = '" . $_SESSION['uname'] . "'"; //get the current email of the user
							$result = mysql_query($sql_query);
							$email = mysql_fetch_array($result);
							
							echo $email['email'];
						?>
						</td>
					</tr>
					<tr>
						<td>New Email: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=email name=email></td>
					</tr>
					<tr>
						<td><input type=Submit value="Change Email"></td>
					</tr>
				</table>
				</form>
				<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
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