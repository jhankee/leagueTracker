<!DOCTYPE html>
<html>
<head>
  <title>Display Coach records from Database</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>

<div style="text-align:center">
  <h2 style="text-align:center">Coach Details</h2>
<!-- <h2>Coach Details</h2> -->

<h3><a href="http://localhost/leagueTracker/index.html">Click Here to Return to Home Page</a></h3>
  </br>

<table class="table table-dark" border="2">
  <tr>
    <td>coachLastName</td>
    <td>coachFirstName</td>
    <td>coachType</td>
	  <td>hasClearances</td>
  </tr>

<?php
// Get a connection for the database
require_once('../mysqli_connect.php');
//include "../mysqli_connect.php"; // Using database connection file here

$records = mysqli_query($dbc,"select * from coach order by coachLastName;"); // fetch data from database

while($data = mysqli_fetch_array($records))
{

?>
  <tr>
    <td><?php echo $data['coachLastName']; ?></td>
    <td><?php echo $data['coachFirstName']; ?></td>
	  <td><?php echo $data['coachType']; ?></td>
    <td><?php echo $data['hasClearances']; ?></td>
	  <td><a href="editFamilyInfo.php?id=<?php echo $data['coachID']; ?>">Edit</a></td>
	  <td><a href="..\player\add_playerInfo2.php?id=<?php echo $data['coachID']; ?>">Add Player</a></td>
  </tr>	
<?php
}
?>
</table>

</div>
</body>
</html>