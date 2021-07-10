<?php
// Get a connection for the database
// http://localhost/leagueTracker/reports/updateInvoiceTeam.php?id=6
require_once('../mysqli_connect.php');

$id = $_GET['id']; // get id through query string

$qry = mysqli_query($dbc,
"Select invoiceID,contact1FirstName,Contact1LastName,paidStatus, sum(amount) as amount
from family join invoice on invoice.familyID = family.familyID 
where invoice.paidStatus = 'False' and invoice.familyID ='$id' group By family.familyID;"); // select query

$data = mysqli_fetch_array($qry); // fetch data


if(isset($_POST['update'])) // when click on Update button
{
    $contact1FirstName = $data['contact1FirstName'];
	$Contact1LastName = $data['Contact1LastName'];
	$paidStatus = $_POST['paidStatus'];
	
	$edit = mysqli_query($dbc,"update invoice set paidStatus='$paidStatus' where familyID ='$id';");
	
	
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

<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="../styless.css">

<title>Invoice Maintanence</title>
</head>
<body>

<div style="text-align:center" class="form-group d-flex justify-content-center"> 
<div class="row">
<div class="col-2"></div>
<div class="col-12">

<div class="row d-flex justify-content-center">
                <h3><b>Invoice Maintanence</b></h3>
</div>

<!-- <h3>Invoice Maintanence</h3> -->

<form method="POST">
  <p>
	<p><b>Conatct Last Name : <?php echo $data['contact1FirstName'] ?> </b></p>
	<p><b>Contact First Name : <?php echo $data['Contact1LastName'] ?> </b></p>
	<p><b>Amount : $ <?php echo $data['amount'] ?> </b></p>
	<select name="paidStatus">
        <option value="False">Unpaid</option>
        <option value="True">Paid</option>
	</select>
	
	<p><input class="bg-success" type="submit" name="update" value="Update"></p>
</form>