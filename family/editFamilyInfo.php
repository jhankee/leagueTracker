<?php
// Get a connection for the database
require_once('../mysqli_connect.php');

$id = $_GET['id']; // get id through query string

$qry = mysqli_query($dbc,"select * from family where familyId='$id'"); // select query

$data = mysqli_fetch_array($qry); // fetch data

if(isset($_POST['update'])) // when click on Update button
{
    $contact1FirstName = $_POST['contact1FirstName'];
	$contact1LastName = $_POST['contact1LastName'];
	$contact2FirstName = $_POST['contact2FirstName'];
	$contact2LastName = $_POST['contact2LastName'];
	$addressLine1 = $_POST['addressLine1'];
	$addressLine2 = $_POST['addressLine2'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$zipCode = $_POST['zipCode'];
	$PrimaryPhone = $_POST['PrimaryPhone'];
	$email = $_POST['email'];

    $edit = mysqli_query($dbc,"update family set contact1FirstName='$contact1FirstName',
	contact1LastName='$contact1LastName',
	contact2FirstName='$contact2FirstName',
	contact2LastName='$contact2LastName',
	addressLine1='$addressLine1',
	addressLine2='$addressLine2',
	city='$city',
	state='$state',
	zipCode='$zipCode',
	PrimaryPhone='$PrimaryPhone',
	email='$email' where familyId ='$id';");
	
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

<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="../styless.css">

<title>Add Family</title>
</head>
<body>


<div style="text-align:center" class="form-group d-flex justify-content-center">
<div class="row">
<div class="col-2"></div>
<div class="col-8">
    <div class="row d-flex justify-content-center">
        <h3><b>Update Family Data</b></h3>
    </div>

    <div class="row d-flex justify-content-center">
            <h3><a href="http://localhost/leagueTracker/family/getfamilyInfo2.php">Return to Family Maintanence</a></h3>
                </br>
    </div>

    <div class="row d-flex justify-content-center">


<!-- <h3>Update Family Data</h3> -->

<form method="POST">
  <p>
  <p>
  <!-- Contact 1 First Name: -->
  <!-- <input type="text" name="contact1FirstName" value="<?php echo $data['contact1FirstName'] ?>" placeholder="Enter Contact 1 First Name" Required></p> -->
  <!-- <p> -->


<label>Contact 1 First Name*:<input class="form-control" type="text" name="contact1FirstName" size="30"value="<?php echo $data['contact1FirstName'] ?>" placeholder="Contact 1 First Name" required/></label>

<label>Contact 1 Last Name*:<input class="form-control" type="text" name="contact1LastName" size="30" value="<?php echo $data['contact1LastName'] ?>" placeholder="Contact 1 Last Name" required/></label>

<label>Contact 2 First Name:<input type="text" class="form-control" name="contact2FirstName" size="30" value="<?php echo $data['contact2FirstName'] ?>" placeholder="Contact 2 First Name" /></label>

<label>Contact 2 Last Name:<input type="text" class="form-control" name="contact2LastName" size="30" value="<?php echo $data['contact2LastName'] ?>" placeholder="Contact 2 Last Name" /></label>

<label>Address Line 1*:<input type="text" class="form-control" name="addressLine1" size="30" value="<?php echo $data['addressLine1'] ?>" placeholder="Address Line 1" required/></label>

<label>Address Line 2:<input type="text" class="form-control" name="addressLine2" size="30" value="<?php echo $data['addressLine2'] ?>" placeholder="Address Line 2" /></label>

<label>City*:<input type="text" class="form-control" name="city" size="30"  value="<?php echo $data['city'] ?>" placeholder="City" required/></label>

<label>State (2 Characters)*:<input type="text" class="form-control" name="state" size="30" maxlength="2" value="<?php echo $data['state'] ?>" placeholder="State (2 Characters)" required/></label>

<label>Zip Code*:<input type="text" class="form-control" name="zipCode" size="30" maxlength="5" value="<?php echo $data['zipCode'] ?>" placeholder="Zip Code" required/></label>

<label>Phone Number*:<input type="text" class="form-control" name="PrimaryPhone" size="30" value="<?php echo $data['PrimaryPhone'] ?>" placeholder="Phone Number" required/></label>

<label>Email*:<input type="text" class="form-control" name="email" size="30" value="<?php echo $data['email'] ?>" placeholder="Email" required/></label>



  <!-- Contact 1 Last Name:
  <input type="text" name="contact1LastName" value="<?php echo $data['contact1LastName'] ?>" placeholder="Enter Contact 1 Last Name" Required></p>
  <p>
  Contact 2 First Name:
  <input type="text" name="contact2FirstName" value="<?php echo $data['contact2FirstName'] ?>" placeholder="Enter Contact 2 First Name" Required></p>
  <p>
  Contact 2 Last Name:
  <input type="text" name="contact2LastName" value="<?php echo $data['contact2LastName'] ?>" placeholder="Enter Contact 2 Last Name" Required></p>
  <p>
  Address line 1:
  <input type="text" name="addressLine1" value="<?php echo $data['addressLine1'] ?>" placeholder="Enter Address Line 1" Required></p>
  <p>
  Address Line 2:
  <input type="text" name="addressLine2" value="<?php echo $data['addressLine2'] ?>" placeholder="Enter Address Line 2" ></p>
  <p>
  City:
  <input type="text" name="city" value="<?php echo $data['city'] ?>" placeholder="Enter City" Required></p>
  <p>
  State:
  <input type="text" name="state" value="<?php echo $data['state'] ?>" placeholder="Enter State" Required></p>
  <p>
  Zip Code:
  <input type="text" name="zipCode" value="<?php echo $data['zipCode'] ?>" placeholder="Enter Zip Code" Required></p>
  <p>
  Primary Phone:
  <input type="text" name="PrimaryPhone" value="<?php echo $data['PrimaryPhone'] ?>" placeholder="Enter Primary Phone" Required></p>
  <p>
  Email Address:
  <input type="text" name="email" value="<?php echo $data['email'] ?>" placeholder="Enter Email Address" Required></p> -->
  
  <!-- <p><input type="submit" name="update" value="Update"></p> -->

  <div class="row submit">     
                <div class="col-6"></div>           
                <p class="padding-top-15">
                    <input class="bg-success" type="submit" name="update" value="Update" />
                </p>
            </div>
</form>

</div>


</body>