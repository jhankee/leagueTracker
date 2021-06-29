<?php
// Get a connection for the database
require_once('../mysqli_connect.php');

if(isset($_POST['update'])) // when click on Update button
{
    $playerFirstName = $_POST['playerFirstName'];
	$playerLastName = $_POST['playerLastName'];
	$dob = $_POST['dob'];
	$registrationDate = date("Y-m-d");
	$id = $_GET['id']; // get id through query string

	//echo "insert into player (playerFirstName,playerLastName,dateOfBirth,family_familyID,registrationDate,teams_teamID) VALUES ($playerFirstName,$playerLastName,$dob,$id,$registrationDate,'1')";
    //$edit = mysqli_query($dbc,"insert into player (playerFirstName,playerLastName,dateOfBirth,family_familyID,registrationDate) VALUES ($playerFirstName,$playerLastName,$dob,$id,$registrationDate)");
	
	$sql = "insert into player (playerFirstName,playerLastName,dateOfBirth,family_familyID,registrationDate) VALUES ($playerFirstName,$playerLastName,$dob,$id,$registrationDate)";
	$edit = mysqli_query($dbc,$sql);
	
    if($edit)
    {
        mysqli_close($dbc); // Close connection
        header("location:getFamilyInfo2.php"); // redirects to all records page
        exit;
    }
    else
    {
        echo mysqli_error();
    }    	
}
?>

<h3>Enter Player Data</h3>

<form method="POST">
  <p>
  <p><input type="text" name="playerFirstName" value="" Required></p>
  <p><input type="text" name="playerLastName" value="" Required></p>
  <p><input type="date" name="dob" value="" Required></p>
  
  <p><input type="submit" name="update" value="Update"></p>
</form>