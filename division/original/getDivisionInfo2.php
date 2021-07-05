<!DOCTYPE html>
<html>
<head>
  <title>Baseball Division Maintanence</title>
</head>
<body>

<h2>Division Informaton</h2>


<table border="2">
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