<?php
// Get a connection for the database
require_once('../mysqli_connect.php');

$id = $_GET['id']; // get id through query string

$qry = mysqli_query($dbc,"select * from coach where coachId='$id' ;"); // select query

$sql = "select teamID, Concat(divisionName,' - ',teamName) as team from team
join division on team.divisionID = division.divisionID";


$data = mysqli_fetch_array($qry); // fetch data


if(isset($_POST['update'])) // when click on Update button
{
    $playerLastName = $data['playerLastName'];
	$playerFirstName = $data['playerFirstName'];
	$teamID = $_POST['newTeam'];
	
	if ($teamID <> 'Null')
	{
		$edit = mysqli_query($dbc,"update coach_has_team set teamID='$teamID' where coachID = $id;");
	}
	else
	{
		$edit = mysqli_query($dbc,"update coach_has_team set teamID=null where coachID = $id;");
	}
	
    if($edit)
    {
        mysqli_close($dbc); // Close connection
        header("location:getCoachInfo2.php"); // redirects to all records page
        exit;
    }
    else
    {
        echo mysqli_error();
    } 
   	
}
?>

<h3>Coach Team Assignment</h3>

<form method="POST">
  <p>
	<p><b>Coach Last Name : <?php echo $data['coachLastName'] ?> </b></p>
	<p><b>Coach First Name : <?php echo $data['coachFirstName'] ?> </b></p>
	<p><b>Coach Type : <?php echo $data['coachType'] ?> </b></p>
	
	<?php 
            $result = $dbc->query($sql);
		
			if ($result -> num_rows > 0) 
			{
                echo "<select name=\"newTeam\">";
					while ($row = $result->fetch_assoc()) {
                    echo "<option value=\"$row[teamID]\">$row[team]</option>";
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