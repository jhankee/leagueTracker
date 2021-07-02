<!DOCTYPE html>
<html>
<head>
  <title>Unpaid Invoices Information</title>
</head>
<body>

<h2>Unpaid Invoices Information</h2>


<table border="2">
 <tr>
    <td>Contact First Name </td>
    <td>Contact Last Name</td>
	  <td>Is Invoice Paid</td>
	  <td>Amount Due</td>
  </tr>

<?php
// Get a connection for the database
require_once('../mysqli_connect.php');
//include "../mysqli_connect.php"; // Using database connection file here

$records = mysqli_query($dbc,"Select invoiceID,contact1FirstName,Contact1LastName,paidStatus, sum(amount)as amount
from family 
join invoice on invoice.familyID = family.familyID 
where invoice.paidStatus = 'False'
group by family.familyID;"); // fetch data from database

while($data = mysqli_fetch_array($records))
{
?>
  <tr>
    <td><?php echo $data['contact1FirstName']; ?></td>
    <td><?php echo $data['Contact1LastName']; ?></td>
	  <td><?php echo $data['paidStatus']; ?></td>
    <td><?php echo $data['amount']; ?></td>
	  <td><a href="updateInvoiceTeam.php?id=<?php echo $data['invoiceID']; ?>">Update Paid Status</a></td>
  </tr>	
<?php
}
?>
</table>

</body>
</html>