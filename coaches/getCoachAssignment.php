<!DOCTYPE html>
<html>
<head>
  <title>Display Coach records from Database</title>
</head>
<body>

<h2>Coach Team Assignments</h2>
<h4><a href="http://localhost/leagueTracker/index.html">Return to Main Menu</a></h4>
</br>

<?php
// Get a connection for the database
require_once('../mysqli_connect.php');
//include "../mysqli_connect.php"; // Using database connection file here

$id = $_GET['id']; // get id through query string

$qry1 = mysqli_query($dbc,"Select coachID, coachLastName, coachFirstName, coachType from coach where coachID = $id;");
$coachInfo = mysqli_fetch_array($qry1); // fetch data

$sql = "select team.teamID as teamID, Concat(divisionName,' - ',teamName) as team from coach_has_team
join coach on coach.coachID = coach_has_team.coachID
join team on team.teamID= coach_has_team.teamID
join division on team.divisionID = division.divisionID
where coach_has_team.coachID = $id;"; // fetch data from database

$result = $dbc->query($sql);

?>

<p><b>Coach Last Name : <?php echo $coachInfo['coachLastName'] ?> </b></p>
<p><b>Coach First Name : <?php echo $coachInfo['coachFirstName'] ?> </b></p>
<p><b>Coach Type : <?php echo $coachInfo['coachType'] ?> </b></p>

<table border="2">
  <tr>
    <td>Assigned Teams</td>
  </tr>


  <?php 
        		
            if ($result -> num_rows > 0) 
            {
                
                while ($row = $result->fetch_assoc()) {
                          echo "<tr>";
                          echo "<td>",$row['team'],"</td>";
                          echo "<td><a href=\"deleteTeamAssignment.php?cid=",$coachInfo['coachID'],"&tid=",$row['teamID'],"\">Remove</a></td>";
                          echo "</tr>";
                      }
               
            }
            else {
                      echo "<p class='lead'> No teams assigned </p>";
                  }
        ?>


</table>

</body>
</html>