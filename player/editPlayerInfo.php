<?php
// Get a connection for the database
require_once('../mysqli_connect.php');

$id = $_GET['id']; // get id through query string

$qry = mysqli_query($dbc,"select * from player where playerId='$id'"); // select query

$data = mysqli_fetch_array($qry); // fetch data

if(isset($_POST['update'])) // when click on Update button
{
    $playerFirstName = $_POST['playerFirstName'];
	$playerLastName = $_POST['playerLastName'];
	$dob = $_POST['dob'];

    $edit = mysqli_query($dbc,"update player set playerFirstName='$playerFirstName',
	playerLastName='$playerLastName',
	dateOfBirth='$dob'
	where playerId ='$id';");
	
    //echo "update player set playerFirstName='$playerFirstName',playerLastName='$playerLastName',	dateOfBirth='$dob',	where playerId ='$id';";
    $errorMsg = mysqli_error($dbc);



    if($edit)
    {
        mysqli_close($dbc); // Close connection
        header("location:getPlayerInfo2.php"); // redirects to all records page
        exit;
    }
    else
    {
        echo $errorMsg;
    }    	
}
?>

<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="../styless.css">

<title>Update Player</title>
</head>
<body>

<div style="text-align:center" class="form-group d-flex justify-content-center"> 
<div class="row">
<div class="col-2"></div>
<div class="col-8">

<div class="row d-flex justify-content-center">
                <h3><b>Update Player Data</b></h3>
</div>

<!-- <h3>Update Payer Data</h3> -->

<form method="POST">
  <!-- <p>
  <p>
  Player First Name:
  <input type="text" name="playerFirstName" value="<?php echo $data['playerFirstName'] ?>" Required></p>
  <p>
  Player Last Name:
  <input type="text" name="playerLastName" value="<?php echo $data['playerLastName'] ?>" Required></p>
  <p>
  Player Date of Birth:
  <input type="date" name="dob" value="<?php echo $data['dateOfBirth'] ?>" Required></p>

  <p><input type="submit" name="update" value="Update"></p> -->


  <label>Player First Name:*:<input class="form-control" type="text" name="playerFirstName" size="30" value="<?php echo $data['playerFirstName'] ?>" required/></label>
  <label>Player Last Name:*:<input class="form-control" type="text" name="playerLastName" size="30" value="<?php echo $data['playerLastName'] ?>" placeholder="" required/></label>
  <label>Player Date of Birth:*:<input class="form-control" type="date" name="dob" size="50" value="<?php echo $data['dateOfBirth'] ?>" placeholder="" required/></label>
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