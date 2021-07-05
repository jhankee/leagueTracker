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

<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="../styless.css">

<title>Team Assignment</title>
</head>
<body>

<div style="text-align:center" class="form-group d-flex justify-content-center"> 
<div class="row">
<div class="col-2"></div>
<div class="col-12">

<div class="row d-flex justify-content-center">
                <h3><b>Team Assignment</b></h3>
</div>

<!-- <h3>Team Assignment</h3> -->

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
	
	<p><input class="bg-success" type="submit" name="update" value="Update"></p>
</form>