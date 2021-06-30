<!DOCTYPE html>
<html>
<head>
  <title>Full Roster Listing</title>
</head>
<body>

<h2>Full Roster Listing</h2>


<table border="2">
 <tr>
    <td>Division Name</td>
    <td>Team Name</td>
	  <td>Player Name</td>
  </tr>

<?php
// Get a connection for the database
require_once('../mysqli_connect.php');
//include "../mysqli_connect.php"; // Using database connection file here

$records = mysqli_query($dbc,"select * from v_All_rosters;"); // fetch data from database

while($data = mysqli_fetch_array($records))
{
?>
  <tr>
    <td><?php echo $data['Division Name']; ?></td>
    <td><?php echo $data['Team Name']; ?></td>
	  <td><?php echo $data['Player Name']; ?></td>
	</tr>	
<?php
}
?>
</table>

</body>
</html>