<!--
display.php
Created by Richie Shi on June 2, 2013
Last Modified June 2, 2013
-->
<?php 
	function advdisplay ($query) {
		$result = mysql_query($query) or die ("nothing was entered
		<br><br><br><br><br><br><br><br><br><br><br><br>
		<hr/>
		&copy; 2013 Howard Chen <br/>
		Created: May 11, 2013 <br/>
		Last Modified: June 2, 2013
		
		</div>
		<div id='content_bottom'></div>
		</div>
		</div>
	</body>
</html>");
		echo "<table border = 0>";
		for($i = 1; $row = mysql_fetch_array($result); $i++) {
			echo "<tr><td>" . $row['title'] . "</td><td>by " . $row['author'] . "</td><td> Avaliable: " . $row['in'] . "</td>";
			if ($row['in'] > 0) {
				echo "
				<td>
				<form method=POST action=takeout.php?book='" . $row['id'] . "'>
					<input type=submit value='Take out' style='float: right;'>
				</form>
				</td>";
			} else {
				echo "
				<td>
				<form method=POST action=..\hold.php?book='" . $row['id'] . "'>
					<input type=submit value='Place on hold' style='float: right;'>
				</form>
				</td>";
			}
			echo "</tr>";
		}
		echo "</table>";
	}
?>