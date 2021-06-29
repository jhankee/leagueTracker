<?php
$id = $_GET['id']; // get id through query string
//echo "ID=",$id." ";

if(isset($_POST['update'])) // when click on Update button
{
	// Get a connection for the database
	require_once('../mysqli_connect.php');
	    
	$playerFirstName = $_POST['playerFirstName'];
	$playerLastName = $_POST['playerLastName'];
	$dob = $_POST['dob'];
	$registrationDate = date("Y-m-d");

		$query = "INSERT INTO player (playerFirstName, playerLastName, dateOfBirth, family_familyID, registrationDate) VALUES ( ?, ?, ?, ?, ?)";
    //echo  $playerFirstName, " " , $playerLastName, " ", $dob, " ", $id, " ", $registrationDate;
	    $stmt = mysqli_prepare($dbc, $query);
        
        //i Integers
        //d Doubles
        //b Blobs
        //s Everything Else
		        
        mysqli_stmt_bind_param($stmt,"sssis", $playerFirstName, $playerLastName, $dob, $id, $registrationDate);
		        
        mysqli_stmt_execute($stmt);
	  	
}
?>

<h3>Enter Player Information</h3>

<form method="POST">
  <p>
  <p><input type="text" name="playerFirstName" value="" Required></p>
  <p><input type="text" name="playerLastName" value="" Required></p>
  <p><input type="date" name="dob" value="" Required></p>
    
  <p><input type="submit" name="update" value="Update"></p>
</form>