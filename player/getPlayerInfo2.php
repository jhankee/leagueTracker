<!DOCTYPE html>
<html>
<head>
  <title>Display all Players</title>
</head>
<body>

<h2>Player Details</h2>

<table border="2">
  <tr>
    <td>Player Last Name</td>
	  <td>Player First Name</td>
	  <td>Registration Date</td>
    <td>Assigned Team</td>
	  </tr>

<?php
// Get a connection for the database
require_once('../mysqli_connect.php');
//include "../mysqli_connect.php"; // Using database connection file here

$records = mysqli_query($dbc,"Select playerID,playerLastName,playerFirstName,registrationDate,teamName from player left join team on player.teamID = team.teamID order by playerLastName;"); // fetch data from database

while($data = mysqli_fetch_array($records))
{
?>
  <tr>
    <td><?php echo $data['playerLastName']; ?></td>
    <td><?php echo $data['playerFirstName']; ?></td>
	  <td><?php echo $data['registrationDate']; ?></td>
	  <td><?php echo $data['teamName']; ?></td>
    <td><a href="..\player\editPlayerInfo.php?id=<?php echo $data['playerID']; ?>">Edit</a></td>
    <td><a href="..\player\assignTeam.php?id=<?php echo $data['playerID']; ?>">Assign Team</a></td>
    
  </tr>	
<?php
}
?>
</table>

</body>
</html>