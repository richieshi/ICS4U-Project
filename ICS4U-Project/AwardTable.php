<!--
AwardTable.php
Created by Michael Liu and Raymond Nie on May 10, 2013
Last Modified June 2, 2013
-->
<html>
<head><title>Book Awards</title></head>
<body>
<a href="AwardList.php">< Go Back</a>
<H1 align=center>Award Names and Description<BR>(Unsorted)</H1>
<?php
include('common.php');
myconnect();
$value=$_GET['value'];
$sql_query = "SELECT * FROM `Book Awards` where id='$value'";
$result = mysql_query($sql_query ) or die ( "cannot find Book Awards");
   echo "<table border=1 align=center><th>Award Name</th><th>Description</th>";
for($i = 1; $row = mysql_fetch_array($result); $i++) {
   echo "<tr><td>".$row['AwardName']."</td><td>".$row['Description']."</td></tr>";
}
echo "</table>";
?>
<HR>
&copy; 2013 Raymond Nie, Michael Liu, Howard Chen, Richie Shi<BR>
Created 10 May 2013<BR>
</body>
</html>
