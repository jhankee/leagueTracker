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

		$query = "INSERT INTO player (playerFirstName, playerLastName, dateOfBirth, familyID, registrationDate) VALUES ( ?, ?, ?, ?, ?)";
    //echo  $playerFirstName, " " , $playerLastName, " ", $dob, " ", $id, " ", $registrationDate;
	    $stmt = mysqli_prepare($dbc, $query);
        
        //i Integers
        //d Doubles
        //b Blobs
        //s Everything Else
		        
        mysqli_stmt_bind_param($stmt,"sssis", $playerFirstName, $playerLastName, $dob, $id, $registrationDate);
		        
        mysqli_stmt_execute($stmt);

        if(mysqli_stmt_affected_rows($stmt) == 1)
        {
            mysqli_close($dbc); // Close connection
            header("location:getPlayerInfo2.php"); // redirects to all records page
            exit;
        }
        else
        {
            echo "Error: ", mysqli_stmt_error($stmt);
        } 
	  	
}
?>


<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="../styless.css">

<title>Add Player</title>
</head>
<body>

<div style="text-align:center" class="form-group d-flex justify-content-center"> 
<div class="row">
<div class="col-2"></div>
<div class="col-8">

<div class="row d-flex justify-content-center">
                <h3><b>Enter Player Information</b></h3>
</div>

<form method="POST">
  <!-- <p> -->
  <!-- <p>
  Player First Name:
  <input type="text" name="playerFirstName" value="" Required></p>
  <p> -->
  <!-- Player Last Name:
  <input type="text" name="playerLastName" value="" Required></p>
  <p> -->
  <!-- Player Date of Birth:
  <input type="date" name="dob" value="" Required></p> -->
    
  <!-- <p><input type="submit" name="update" value="Update"></p> -->

  <label>Player First Name:*:<input class="form-control" type="text" name="playerFirstName" size="30" value="" placeholder="Player First Name*" required/></label>

  <label>Player Last Name*:*:<input class="form-control" type="text" name="playerLastName" size="30" value="" placeholder="Player Last Name*" required/></label>

  <label>Player Date of Birth*:<input class="form-control" type="date" name="dob" size="30" value="" required/></label>
  </div>
</div>
</div>
<div class="row">     
                <div class="col-6"></div>           
                <p class="padding-top-15">
                    <input class="bg-success" type="submit" name="update" value="Add" />
                </p>
            </div>


</form>
</div>
</div>
</div>

</div>
</body>
</html>