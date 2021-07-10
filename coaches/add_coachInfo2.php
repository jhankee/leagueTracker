<?php


if(isset($_POST['update'])) // when click on Update button
{
	// Get a connection for the database
	require_once('../mysqli_connect.php');
	    
	$coachFirstName = $_POST['coachFirstName'];
	$coachLastName = $_POST['coachLastName'];
    $coachType = $_POST['coachType'];
    $hasClearances = $_POST['hasClearances'];


		$query = "INSERT INTO coach (coachFirstName, coachLastName, coachType, hasClearances) VALUES ( ?, ?, ?, ?)";
  
	    $stmt = mysqli_prepare($dbc, $query);
        
        //i Integers
        //d Doubles
        //b Blobs
        //s Everything Else
		        
        mysqli_stmt_bind_param($stmt,"ssss", $coachFirstName, $coachLastName, $coachType, $hasClearances);
		        
        mysqli_stmt_execute($stmt);

        if(mysqli_stmt_affected_rows($stmt) == 1)
        {
            mysqli_close($dbc); // Close connection
            header("location:getCoachInfo2.php"); // redirects to all records page
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

<title>Add Coach</title>
</head>
<body>

<div style="text-align:center" class="form-group d-flex justify-content-center"> 
<div class="row">
<div class="col-2"></div>
<div class="col-8">

<div class="row d-flex justify-content-center">
                <h3><b>Enter Coach Information</b></h3>
</div>

<form method="POST">
  <label>Coach First Name:*:<input class="form-control" type="text" name="coachFirstName" size="30" value="" placeholder="Coach First Name*" required/></label>

  <label>Coach Last Name*:*:<input class="form-control" type="text" name="coachLastName" size="30" value="" placeholder="Coach Last Name*" required/></label>

  <label>Coach type:*:
  <select name="coachType">
            <option value="Manager">Manager</option>
            <option value="Assistant">Assistant</option>
            <option value="Hitting">Hitting</option>
		    <option value="Pitching">Pitching</option>
        </select>
    </label>
  
  <label>Does Coach have Clearances:*:
        <select name="hasClearances">
            <option value="False">False</option>
            <option value="True">True</option>
        </select>
    
    </label>

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