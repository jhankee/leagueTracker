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
	
    echo "update player set playerFirstName='$playerFirstName',playerLastName='$playerLastName',	dateOfBirth='$dob',	where playerId ='$id';";


    if($edit)
    {
        mysqli_close($dbc); // Close connection
        header("location:getPlayerInfo2.php"); // redirects to all records page
        exit;
    }
    else
    {
        echo mysqli_error();
    }    	
}
?>

<h3>Update Payer Data</h3>

<form method="POST">
  <p>
  <p>
  Player First Name:
  <input type="text" name="playerFirstName" value="<?php echo $data['playerFirstName'] ?>" Required></p>
  <p>
  Player Last Name:
  <input type="text" name="playerLastName" value="<?php echo $data['playerLastName'] ?>" Required></p>
  <p>
  Player Date of Birth:
  <input type="date" name="dob" value="<?php echo $data['dateOfBirth'] ?>" Required></p>

  
  
  <p><input type="submit" name="update" value="Update"></p>
</form>