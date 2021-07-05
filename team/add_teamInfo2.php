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

<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="../styless.css">

<title>New Team</title>
</head>
<body>

<div style="text-align:center" class="form-group d-flex justify-content-center"> 
<div class="row">
<div class="col-2"></div>
<div class="col-9">

<div class="row d-flex justify-content-center">
                <h3><b>Enter New Team Name</b></h3>
</div>

<!-- <h3>Enter New Team Name</h3> -->

<form method="POST">
  <!-- <p>
  <p>
  Enter New Team Name:
  <input type="text" name="teamName" value="" Required></p>

    
  <p><input type="submit" name="update" value="Update"></p> -->


  <label>New Team Name:*:<input class="form-control" type="text" name="teamName" size="30" value="" placeholder="New Team Name*:" required/></label>
  </div>
</div>
</div>
<div class="row">     
                <div class="col-6"></div>           
                <p class="padding-top-15">
                    <input class="bg-success" type="submit" name="update" value="Update" />
                </p>
            </div>


</form>