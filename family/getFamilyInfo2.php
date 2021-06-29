<!DOCTYPE html>
<html>
<head>
  <title>Display all records from Database</title>
</head>
<body>

<h2>Family Details</h2>

<table border="2">
  <tr>
    <td>Family ID</td>
    <td>Contact 1 First Name</td>
	<td>Contact 1 First Name</td>
	<td>Contact 2 First Name</td>
	<td>Contact 2 First Name</td>
    <td>Address Line 1</td>
	<td>Address Line 2</td>
    <td>City</td>
    <td>state</td>
	<td>Zip</td>
    <td>Phone</td>
    <td>Email</td>
  </tr>

<?php
// Get a connection for the database
require_once('../mysqli_connect.php');
//include "../mysqli_connect.php"; // Using database connection file here

$records = mysqli_query($dbc,"select * from family;"); // fetch data from database

while($data = mysqli_fetch_array($records))
{
?>
  <tr>
    <td><?php echo $data['familyID']; ?></td>
    <td><?php echo $data['contact1FirstName']; ?></td>
	<td><?php echo $data['contact1LastName']; ?></td>
	<td><?php echo $data['contact2FirstName']; ?></td>
	<td><?php echo $data['contact2LastName']; ?></td>
    <td><?php echo $data['addressLine1']; ?></td>
    <td><?php echo $data['addressLine2']; ?></td>
	<td><?php echo $data['city']; ?></td>
	<td><?php echo $data['state']; ?></td>
	<td><?php echo $data['zipCode']; ?></td>
	<td><?php echo $data['PrimaryPhone']; ?></td>
	<td><?php echo $data['email']; ?></td>
	<td><a href="editFamilyInfo.php?id=<?php echo $data['familyID']; ?>">Edit</a></td>
	<td><a href="..\player\add_playerInfo.php?id=<?php echo $data['familyID']; ?>">Add Player</a></td>
  </tr>	
<?php
}
?>
</table>

</body>
</html>