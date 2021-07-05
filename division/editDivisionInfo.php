<?php
// Get a connection for the database
require_once('../mysqli_connect.php');

$id = $_GET['id']; // get id through query string

$qry = mysqli_query($dbc,"select * from division where divisionID='$id'"); // select query

$data = mysqli_fetch_array($qry); // fetch data

if(isset($_POST['update'])) // when click on Update button
{
    $divisionName = $_POST['divisionName'];
	$startAgeDOB = $_POST['startAgeDOB'];
	$endAgeDOB = $_POST['endAgeDOB'];
	$cost = $_POST['cost'];

    $edit = mysqli_query($dbc,"update division set divisionName='$divisionName',
	startAgeDOB='$startAgeDOB',
	endAgeDOB='$endAgeDOB',
	cost='$cost'
	where divisionID ='$id';");
	
    if($edit)
    {
        mysqli_close($dbc); // Close connection
        header("location:getDivisionInfo2.php"); // redirects to all records page
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

<title>Update Division Data</title>
</head>
<body>

<div style="text-align:center" class="form-group d-flex justify-content-center"> 
<div class="row">
<div class="col-2"></div>
<div class="col-8">

<div class="row d-flex justify-content-center">
                <h3><b>Update Division Data</b></h3>
</div>

<!-- <h3>Update Division Data</h3> -->


<form method="POST">
  <!-- <p>
  <p>
  Division Name:
  <input type="text" name="divisionName" value="<?php echo $data['divisionName'] ?>" placeholder="Enter Contact 1 First Name" Required></p>
  <p>
  Oldest Player DOB:
  <input type="date" name="startAgeDOB" value="<?php echo $data['startAgeDOB'] ?>" placeholder="Enter Contact 1 Last Name" Required></p>
  <p>
  Youngest PLayer DOB:
  <input type="date" name="endAgeDOB" value="<?php echo $data['endAgeDOB'] ?>" placeholder="Enter Contact 2 First Name" Required></p>
  <p>
  Cost:
  <input type="text" name="cost" value="<?php echo $data['cost'] ?>" placeholder="Enter Contact 2 Last Name" Required></p>
  <p>
  
  
  <p><input type="submit" name="update" value="Update"></p> -->

  <label>Division Name:*:<input class="form-control" type="text" name="divisionName" size="30" value="<?php echo $data['divisionName'] ?>" placeholder="Player First Name*" required/></label>
  <label>Oldest Player DOB:*:<input class="form-control" type="date" name="startAgeDOB" size="30" value="<?php echo $data['startAgeDOB'] ?>" placeholder="" required/></label>
  <label>Youngest PLayer DOB:*:<input class="form-control" type="date" name="endAgeDOB" size="50" value="<?php echo $data['endAgeDOB'] ?>" placeholder="" required/></label>
  <label>Cost:*:<input class="form-control" type="text" name="cost" size="30" value="<?php echo $data['cost'] ?>" placeholder="cost" required/></label>
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