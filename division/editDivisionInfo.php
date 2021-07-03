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

<h3>Update Division Data</h3>


<form method="POST">
  <p>
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
  
  
  <p><input type="submit" name="update" value="Update"></p>
</form>