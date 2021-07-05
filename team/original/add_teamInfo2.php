<?php
$id = $_GET['id']; // get id through query string
//echo "ID=",$id." ";

if(isset($_POST['update'])) // when click on Update button
{
	// Get a connection for the database
	require_once('../mysqli_connect.php');

	$teamName = $_POST['teamName'];

		$query = "INSERT INTO team (teamName, divisionID) VALUES ( ?, ?)";
    
	    $stmt = mysqli_prepare($dbc, $query);
        
        //i Integers
        //d Doubles
        //b Blobs
        //s Everything Else
		        
        mysqli_stmt_bind_param($stmt,"si", $teamName, $id);
		        
        mysqli_stmt_execute($stmt);

        if($stmt)
        {
            mysqli_close($dbc); // Close connection
            header("location:getTeamInfo2.php"); // redirects to all records page
            exit;
        }
        else
        {
            echo mysqli_error();
        } 
	  	
}
?>

<h3>Enter New Team Name</h3>

<form method="POST">
  <p>
  <p>
  Enter New Team Name:
  <input type="text" name="teamName" value="" Required></p>

    
  <p><input type="submit" name="update" value="Update"></p>
</form>