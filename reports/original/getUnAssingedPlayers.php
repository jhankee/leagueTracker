<!DOCTYPE html>
<html>
<head>
  <title>Unassigned Players</title>
</head>
<body>

<h2>Unassigned Players</h2>
<h4><a href="http://localhost/leagueTracker/index.html">Return to Main Menu</a></h4>
</br>

<table border="2">
 <tr>
    <td>Player First Name </td>
    <td>Player Last Name</td>
	  <td>Is Invoice Paid</td>
	  <td>Amount Due</td>
  </tr>

<?php
// Get a connection for the database
require_once('../mysqli_connect.php');
//include "../mysqli_connect.php"; // Using database connection file here

$records = mysqli_query($dbc,"select * from v_unassign_players;"); // fetch data from database

while($data = mysqli_fetch_array($records))
{
?>
  <tr>
    <td><?php echo $data['playerFirstName']; ?></td>
    <td><?php echo $data['playerLastName']; ?></td>
	  <td><?php echo $data['dateOfBirth']; ?></td>
	  <td><a href="..\player\assignTeam.php?id=<?php echo $data['playerID']; ?>">Assign Team</a></td>
  </tr>	
<?php
}
?>
</table>

</body>
</html>