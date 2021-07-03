<?php
// Get a connection for the database
// http://localhost/leagueTracker/reports/updateInvoiceTeam.php?id=6
require_once('../mysqli_connect.php');

$id = $_GET['id']; // get id through query string

$qry = mysqli_query($dbc,
"Select invoiceID,contact1FirstName,Contact1LastName,paidStatus, amount 
from family join invoice on invoice.familyID = family.familyID 
where invoice.paidStatus = 'False' and invoiceID='$id' ;"); // select query

$data = mysqli_fetch_array($qry); // fetch data


if(isset($_POST['update'])) // when click on Update button
{
    $contact1FirstName = $data['contact1FirstName'];
	$Contact1LastName = $data['Contact1LastName'];
	$paidStatus = $_POST['paidStatus'];
	
	$edit = mysqli_query($dbc,"update invoice set paidStatus='$paidStatus' where invoiceID = $id;");
	
	
    if($edit)
    {
        mysqli_close($dbc); // Close connection
        header("location:getUnpaidinvoices.php"); // redirects to all records page
        exit;
    }
    else
    {
        echo mysqli_error();
    } 
   	
}
?>

<h3>Invioce Maintanence</h3>

<form method="POST">
  <p>
	<p><b>Conatct Last Name : <?php echo $data['contact1FirstName'] ?> </b></p>
	<p><b>Contact First Name : <?php echo $data['Contact1LastName'] ?> </b></p>
	<p><b>Amount : <?php echo $data['amount'] ?> </b></p>
	<select name="paidStatus">
		<option value="True">Paid</option>
		<option value="False">Unpaid</option>
	</select>
	
	<p><input type="submit" name="update" value="Update"></p>
</form>