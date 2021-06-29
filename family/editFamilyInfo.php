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

<h3>Update Family Data</h3>

<form method="POST">
  <p>
  <p><input type="text" name="contact1FirstName" value="<?php echo $data['contact1FirstName'] ?>" placeholder="Enter Contact 1 First Name" Required></p>
  <p><input type="text" name="contact1LastName" value="<?php echo $data['contact1LastName'] ?>" placeholder="Enter Contact 1 Last Name" Required></p>
  <p><input type="text" name="contact2FirstName" value="<?php echo $data['contact2FirstName'] ?>" placeholder="Enter Contact 2 First Name" Required></p>
  <p><input type="text" name="contact2LastName" value="<?php echo $data['contact2LastName'] ?>" placeholder="Enter Contact 2 Last Name" Required></p>
  <p><input type="text" name="addressLine1" value="<?php echo $data['addressLine1'] ?>" placeholder="Enter Address Line 1" Required></p>
  <p><input type="text" name="addressLine2" value="<?php echo $data['addressLine2'] ?>" placeholder="Enter Address Line 2" ></p>
  <p><input type="text" name="city" value="<?php echo $data['city'] ?>" placeholder="Enter City" Required></p>
  <p><input type="text" name="state" value="<?php echo $data['state'] ?>" placeholder="Enter State" Required></p>
  <p><input type="text" name="zipCode" value="<?php echo $data['zipCode'] ?>" placeholder="Enter Zip Code" Required></p>
  <p><input type="text" name="PrimaryPhone" value="<?php echo $data['PrimaryPhone'] ?>" placeholder="Enter Primary Phone" Required></p>
  <p><input type="text" name="email" value="<?php echo $data['email'] ?>" placeholder="Enter Email Address" Required></p>

  
  
  <p><input type="submit" name="update" value="Update"></p>
</form>