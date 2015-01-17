<!--
register.php
Name: Richie Shi
Created: May 14, 2013
Last Modified: May 30, 2013
The page for users to make their accounts.
-->
<html>
    <head>
        <title>Register</title>
        <link href="style.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div id="container">
		<div id="header">
        	<h1>&nbsp;&nbsp;&nbsp;&nbsp;<span class="off">&nbsp;&nbsp;Register</span></h1>
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
        if (isset($_SESSION['user']) && !$_SESSION['user']) { // checks if the username they want is already taken
            echo "<center>Username is already taken.</center><br>";
			$_SESSION['user'] = true;
        } else if (isset($_SESSION['pass']) && !$_SESSION['pass']) { //checks if passwords do not match
			echo "<center>Passwords do not match.</center><br>";
			$_SESSION['pass'] = true;
		} else if (isset($_SESSION['error']) && $_SESSION['error']) { //checks if an error of some sort occurred
			echo "<center>An error has occurred (Username cannot be used, Password cannot be blank, E-mail cannot be blank)<br>";
			$_SESSION['error'] = false;
		}
        echo"
		<table align=center>
        <form method=POST action=rcheck.php>
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
                <td>
                    Re-type Password:
                </td>
                <td>
                    <input type=password name=pword2>
                </td>
            </tr>
			<tr>
                <td>
                    E-mail:
                </td>
                <td>
                    <input type=email name=email>
                </td>
            </tr>
            <tr>
               <td colspan=2 align=right>
                   <input type=submit value="Register">
				   <input type=reset>
               </td>
            </tr>
        </form>
        </table>
		<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		<hr>
        &copy; 2013 Howard Chen, Michael Liu, Raymond Nie, Richie Shi <br>
        Created: May 15, 2013<br>
        Last Modified: June 1, 2013
		</div>
        <div id="content_bottom"></div>
		</div>
		</div>
    </body>
</html>