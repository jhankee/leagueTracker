<!DOCTYPE html>
<html>
<head>
  <title>Full Roster Listing</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>

<div style="text-align:center">
  <h2 style="text-align:center">Full Roster Listing</h2>

  <h3><a href="http://localhost/leagueTracker/index.html">Click Here to Return to Home Page</a></h3>
</br>

<!-- <h2>Full Roster Listing</h2> -->


<table class="table table-dark" border="2">
 <tr>
    <td>Division Name</td>
    <td>Team Name</td>
	  <td>Player Name</td>
  </tr>

<?php
// Get a connection for the database
require_once('../mysqli_connect.php');
//include "../mysqli_connect.php"; // Using database connection file here

$records = mysqli_query($dbc,"select * from v_all_rosters;"); // fetch data from database

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