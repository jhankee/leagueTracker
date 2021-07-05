<!DOCTYPE html>
<html>
<head>
  <title>Baseball Team Information</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>

<div style="text-align:center">
  <h2 style="text-align:center">Team Information</h2>

  <h3><a href="http://localhost/leagueTracker/index.html">Click Here to Return to Home Page</a></h3>
</br>

<!-- <h2>Team Informaton</h2> -->


<table class="table table-dark" border="2">
 <tr>
    <td>Division Name</td>
    <td>Team Name</td>
	  <td>Roster Size</td>
	</tr>

<?php
// Get a connection for the database
require_once('../mysqli_connect.php');
//include "../mysqli_connect.php"; // Using database connection file here

$records = mysqli_query($dbc,"select division.divisionname as divisionName,team.teamName as teamName, v_team_roster_size.RosterSize as RosterSize from team
join division on team.divisionID = division.divisionID
left join v_team_roster_size on team.teamID = v_team_roster_size.teamID
order by division.divisionname ;"); // fetch data from database

while($data = mysqli_fetch_array($records))
{
?>
  <tr>
    <td><?php echo $data['divisionName']; ?></td>
    <td><?php echo $data['teamName']; ?></td>
	  <td><?php echo $data['RosterSize']; ?></td>
    <!--
	  <td><a href="editDivisionInfo.php?id=<?php echo $data['divisionID']; ?>">Edit</a></td>
	  <td><a href="..\team\add_TeamInfo2.php?id=<?php echo $data['divisionID']; ?>">Add Team</a></td>
    -->
  </tr>	
<?php
}
?>
</table>

</body>
</html>