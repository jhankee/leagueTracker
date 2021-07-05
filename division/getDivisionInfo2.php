<!DOCTYPE html>
<html>
<head>
  <title>Baseball Division Maintanence</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>


<div style="text-align:center">
  <h2 style="text-align:center">Division Informaton</h2>
<!-- <h2>Division Informaton</h2> -->

<h3><a href="http://localhost/leagueTracker/index.html">Click Here to Return to Home Page</a></h3>
</br>

<table class="table table-dark" border="2">
 <tr>
    <td>Division Name</td>
    <td>Oldest Date of Birth</td>
	  <td>Youngest Date of Birth</td>
	  <td>Cost</td>
  </tr>

<?php
// Get a connection for the database
require_once('../mysqli_connect.php');
//include "../mysqli_connect.php"; // Using database connection file here

$records = mysqli_query($dbc,"select * from division order by startAgeDOB ;"); // fetch data from database

while($data = mysqli_fetch_array($records))
{
?>
  <tr>
    <td><?php echo $data['divisionName']; ?></td>
    <td><?php echo $data['startAgeDOB']; ?></td>
	  <td><?php echo $data['endAgeDOB']; ?></td>
	  <td><?php echo $data['cost']; ?></td>
	  <td><a href="editDivisionInfo.php?id=<?php echo $data['divisionID']; ?>">Edit</a></td>
	  <td><a href="..\team\add_TeamInfo2.php?id=<?php echo $data['divisionID']; ?>">Add Team</a></td>
  </tr>	
<?php
}
?>
</table>

</body>
</html>