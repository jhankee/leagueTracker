<!DOCTYPE html>
<html>
<head>
  <title>Coaches Missing Clearances</title>
</head>
<body>

<h2>Coaches Missing Clearances</h2>


<table border="2">
 <tr>
    <td>Coach First Name </td>
    <td>Coach Last Name</td>
	  <td>Has Clearances</td>
  </tr>

<?php
// Get a connection for the database
require_once('../mysqli_connect.php');
//include "../mysqli_connect.php"; // Using database connection file here

$records = mysqli_query($dbc,"select * from v_coach_missing_clearances;"); // fetch data from database

while($data = mysqli_fetch_array($records))
{
?>
  <tr>
    <td><?php echo $data['coachFirstName']; ?></td>
    <td><?php echo $data['coachLastName']; ?></td>
	  <td><?php echo $data['hasClearances']; ?></td>
	</tr>	
<?php
}
?>
</table>

</body>
</html>