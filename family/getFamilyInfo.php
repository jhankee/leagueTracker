<html>
<head>
<title>Update Family</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>
<body>
<?php
// Get a connection for the database
require_once('../mysqli_connect.php');

// Create a query for the database
$query = "SELECT familyID,contact1FirstName,contact1LastName,contact2FirstName,contact2LastName,addressLine1,addressLine2,city,state,zipCode,PrimaryPhone,email FROM family ORDER BY contact1LastName";

// Get a response from the database by sending the connection
// and the query
$response = @mysqli_query($dbc, $query);

// If the query executed properly proceed
if($response){

echo '<table align="left"
cellspacing="5" cellpadding="8">

<tr>
<td align="left"><b>familyID</b></td>
<td align="left"><b>contact1FirstName</b></td>
<td align="left"><b>contact1LastName</b></td>
<td align="left"><b>contact2FirstName</b></td>
<td align="left"><b>contact2LastName</b></td>
<td align="left"><b>addressLine1</b></td>
<td align="left"><b>addressLine2</b></td>
<td align="left"><b>City</b></td>
<td align="left"><b>State</b></td>
<td align="left"><b>Zip</b></td>
<td align="left"><b>Phone</b></td>
<td align="left"><b>email</b></td>
</tr>';

// mysqli_fetch_array will return a row of data from the query
// until no further data is available
while($row = mysqli_fetch_array($response)){

echo '<tr><td align="left">' . 
$row['familyID'] . '</td><td align="left">' .
$row['contact1FirstName'] . '</td><td align="left">' . 
$row['contact1LastName'] . '</td><td align="left">' .
$row['contact2FirstName'] . '</td><td align="left">' . 
$row['contact2LastName'] . '</td><td align="left">' .
$row['addressLine1'] . '</td><td align="left">' .
$row['addressLine2'] . '</td><td align="left">' .
$row['city'] . '</td><td align="left">' . 
$row['state'] . '</td><td align="left">' .
$row['zipCode'] . '</td><td align="left">' . 
$row['PrimaryPhone'] . '</td><td align="left">' .
$row['email'] . '</td><td align="left">' .
'<td><a href="./editFamilyInfo.php?id=<?php echo $data['familyId']; ?>">Edit</a></td>';




echo '</tr>';
}

echo '</table>';

} else {

echo "Couldn't issue database query<br />";

echo mysqli_error($dbc);

}

// Close connection to the database
mysqli_close($dbc);

?>