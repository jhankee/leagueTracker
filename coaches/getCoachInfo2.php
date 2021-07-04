<!DOCTYPE html>
<html>
<head>
  <title>Display Coach records from Database</title>
</head>
<body>

<h2>Coach Details</h2>
<h4><a href="http://localhost/leagueTracker/index.html">Return to Main Menu</a></h4>
</br>
<table border="2">
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
	  <td><a href="editCoachInfo.php?id=<?php echo $data['coachID']; ?>">Edit</a></td>
	  <td><a href="assignTeam.php?id=<?php echo $data['coachID']; ?>">Assign to Team</a></td>
  </tr>	
<?php
}
?>
</table>

</body>
</html>