<?php
// Get a connection for the database
require_once('../mysqli_connect.php');

$id = $_GET['id']; // get id through query string

$qry = mysqli_query($dbc,"select playerLastName,playerFirstName,registrationDate,teamName from player left join teams on player.teams_teamID = teams.teamID where playerId='$id' ;"); // select query
$sql = "select teamName, teamID from teams where divisions_divisionID = (select divisionId from divisions where startAgeDOB < (select dateOfBirth from player where playerID='$id') and endAgeDOB >(select dateOfBirth from player where playerID='$id')) and teamID NOT IN (select teams_teamID from player group by teams_teamID having count(teams_teamID) >= 12)";    

$data = mysqli_fetch_array($qry); // fetch data


if(isset($_POST['update'])) // when click on Update button
{
    $playerLastName = $_POST['playerLastName'];
	$playerFirstName = $_POST['playerFirstName'];
	$teamID = $_POST['newTeam'];

    $edit = mysqli_query($dbc,"update player set teams_teamID='$teamID' where playerID = $id;");
	
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
                // output data of each row
					while ($row = $result->fetch_assoc()) {
                    echo "<option value=\"$row[teamID]\">$row[teamName]</option>";
                }
                echo "</select>";
			}
			else {
                echo "<p class='lead'> No teams available </p>";
            }
			
            $dbc->close();
	?>	
	</p>	
	
	<p><input type="submit" name="update" value="Update"></p>
</form>