<?php
// Get a connection for the database
require_once('../mysqli_connect.php');

$id = $_GET['id']; // get id through query string

$qry = mysqli_query($dbc,"select playerLastName,playerFirstName,registrationDate,teamName from player left join team on player.teamID = team.teamID where playerId='$id' ;"); // select query

$sql = "select team.teamName,team.teamID from team
where divisionID = (select divisionId from division where 
(date(startAgeDOB) < (select date(dateOfBirth) from player where playerId='$id')
and date(endAgeDOB) >(select date(dateOfBirth) from player where playerId='$id')))
and team.teamID not in (select team.teamID from team
left join player on player.teamID = team.teamID
group by teamID having count(playerID) >= 12)";


$data = mysqli_fetch_array($qry); // fetch data


if(isset($_POST['update'])) // when click on Update button
{
    $playerLastName = $data['playerLastName'];
	$playerFirstName = $data['playerFirstName'];
	$teamID = $_POST['newTeam'];
	
	if ($teamID <> 'Null')
	{
		$edit = mysqli_query($dbc,"update player set teamID='$teamID' where playerID = $id;");
	}
	else
	{
		$edit = mysqli_query($dbc,"update player set teamID=null where playerID = $id;");
	}
	
    if($edit)
    {
        mysqli_close($dbc); // Close connection
        header("location:getPlayerInfo2.php"); // redirects to all records page
        exit;
    }
    else
    {
        echo mysqli_error();
    } 
   	
}
?>

<h3>Team Assignment</h3>

<form method="POST">
  <p>
	<p><b>Player Last Name : <?php echo $data['playerLastName'] ?> </b></p>
	<p><b>Player First Name : <?php echo $data['playerFirstName'] ?> </b></p>
	<p><b>Current Team Assignment : <?php echo $data['teamName'] ?> </b></p>
	
	<?php 
            $result = $dbc->query($sql);
		
			if ($result -> num_rows > 0) 
			{

                echo "<select name=\"newTeam\">";
					echo "<option value=\"none\" selected disabled hidden> Select an Option";
					while ($row = $result->fetch_assoc()) {
                    echo "<option value=\"$row[teamID]\">$row[teamName]</option>";
                }
					echo "<option value=\"Null\">UnAssign</option>";
                echo "</select>";
			}
			else {
                echo "<p class='lead'> No teams available </p>";
            }
	?>	
	</p>	
	
	<p><input type="submit" name="update" value="Update"></p>
</form>