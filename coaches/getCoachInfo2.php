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
  <h3><a href="http://localhost/leagueTracker/coaches/add_coachInfo2.php">Click Here to Add New Coach</a></h3>
  </br>

<table class="table table-dark" border="2">
  <tr>
    <td>Coach Last Name</td>
    <td>Coach First Name</td>
    <td>Coach Type</td>
	  <td>has Coaching Clearances</td>
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
	  <td><a href="editCoachInfo.php?id=<?php echo $data['coachID']; ?>">Edit</a></td>
	  <td><a href="assignTeam.php?id=<?php echo $data['coachID']; ?>">Assign to Team</a></td>
    <td><a href="getCoachAssignment.php?id=<?php echo $data['coachID']; ?>">Current Teams</a></td>
  </tr>	
<?php
}
?>
</table>

</div>
</body>
</html>