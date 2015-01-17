<!--
signin.php
Name: Richie Shi
Created: May 1, 2013
Last Modified: May 30, 2013
Allows users to sign in to their accounts.
-->
<html>
    <head>
        <title>Sign In</title>
        <link href="style.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div id="container">
		<div id="header">
        	<h1>&nbsp;&nbsp;&nbsp;&nbsp;<span class="off">&nbsp;&nbsp;Sign in</span></h1>
        </div>          
        
        <div id="leftmenu">

        <div id="leftmenu_top"></div>

				<div id="leftmenu_main">
                
                <h2><font face="veranda" color="white">Navigation Bar</font></h2>
                        
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="search/search.php">Browse Books</a></li>
					<li><a href="AwardList.php">Book Awards</a></li>
                    <li><a href="signin.php">Sign In</a></li>
                    <li><a href="register.php">Register</a></li>
                </ul>
				</div>
                
                
              <div id="leftmenu_bottom"></div>
        </div>
		<div id="content">
        <div id="content_top"></div>
        <div id="content_main">
        <?php
			session_start();
            if (isset($_SESSION['check']) && !$_SESSION['check']) {
                echo "<center>Username or password is incorrect.</center><br>"; // tells user they failed to log in
				$_SESSION['check'] = true;
            }
			
			if (isset($_SESSION['reg']) && $_SESSION['reg']) {
				echo "<center>Registration complete. Please sign in.<br>";
				$_SESSION['reg'] = false;
			}
            echo"
        <table align=center>
        <form method=POST action=check.php>
            <tr>
                <td>
                    Username:
                </td>
                ";
        ?>
                <td>
                    <input type=text name=uname>
                </td>
            </tr>
            <tr>
                <td>
                    Password:
                </td>
                <td>
                    <input type=password name=pword>
                </td>
            </tr>
            <tr>
               <td colspan=2 align=right>
					<input type=submit value="Sign In">
               </td>
            </tr>
        </form>
        </table>
		<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		<hr>
		&copy; 2013<br>
        Created: May 1, 2013<br>
        Last Modified: June 1, 2013
		</div>
        <div id="content_bottom"></div>
		</div>
		</div>        
    </body>
</html>