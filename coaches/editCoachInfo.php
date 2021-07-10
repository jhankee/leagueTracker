<?php
// Get a connection for the database
require_once('../mysqli_connect.php');

$id = $_GET['id']; // get id through query string

$qry = mysqli_query($dbc,"select * from coach where coachId='$id'"); // select query

$data = mysqli_fetch_array($qry); // fetch data

if(isset($_POST['update'])) // when click on Update button
{
    $coachFirstName = $_POST['coachFirstName'];
	$coachLastName = $_POST['coachLastName'];
	$coachType = $_POST['coachType'];
    $hasClearances = $_POST['hasClearances'];

    $edit = mysqli_query($dbc,"update coach set coachFirstName='$coachFirstName',
	coachLastName='$coachLastName',
	coachType='$coachType',
    hasClearances='$hasClearances'
	where coachId ='$id';");
	
    
    if($edit)
    {
        mysqli_close($dbc); // Close connection
        header("location:getCoachInfo2.php"); // redirects to all records page
        exit;
    }
    else
    {
        echo mysqli_error();
    }    	
}
?>

<h3>Update Coach Data</h3>
<h4><a href="http://localhost/leagueTracker/index.html">Return to Main Menu</a></h4>
</br>

<form method="POST">
  <p>
  <p>
  Coach First Name:
  <input type="text" name="coachFirstName" value="<?php echo $data['coachFirstName'] ?>" Required></p>
  <p>
  Coach Last Name:
  <input type="text" name="coachLastName" value="<?php echo $data['coachLastName'] ?>" Required></p>
  <p>
  Coach type:*:
  <select name="coachType">
            <option value="Manager">Manager</option>
            <option value="Assistant">Assistant</option>
            <option value="Hitting">Hitting</option>
		    <option value="Pitching">Pitching</option>
        </select>
    <p>
  Coach has Clearances:
  <select name="hasClearances"> value="<?php echo $data['hasClearances'] ?>"
        
        <option value="False">No</option>
        <option value="True">Yes</option>
	</select>
    </p>
  
  <p><input type="submit" name="update" value="Update"></p>
</form>