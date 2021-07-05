<!DOCTYPE html>
<html>
<head>
  <title>Unassigned Players</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>

<div style="text-align:center">
  <h2 style="text-align:center">Unassigned Players</h2>

  <h3><a href="http://localhost/leagueTracker/index.html">Click Here to Return to Home Page</a></h3>
</br>

<!-- <h2>Unassigned Players</h2> -->


<table class="table table-dark" border="2">
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