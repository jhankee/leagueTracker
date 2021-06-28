<?php
// Get a connection for the database
require_once('../../mysqli_connect.php');

// Create a query for the database
$query = "SELECT familyID,contact1FirstName,contact1LastName,contact2FirstName,contact2LastName,addressLine1,addressLine2,city,state,zipCode,PrimaryPhone,email FROM family";

// Get a response from the database by sending the connection
// and the query
$response = @mysqli_query($dbc, $query);

// If the query executed properly proceed
if($response){

echo '<table align="left"
cellspacing="5" cellpadding="8">

<tr><td align="left"><b>contact1FirstName</b></td>
<td align="left"><b>contact1LastName/b></td>
<td align="left"><b>contact2FirstName</b></td>
<td align="left"><b>contact2LastName</b></td>
<td align="left"><b>addressLine1</b></td>
<td align="left"><b>addressLine2</b></td>
<td align="left"><b>City</b></td>
<td align="left"><b>State</b></td>
<td align="left"><b>Zip</b></td>
<td align="left"><b>Phone</b></td>
<td align="left"><b>email</b></td></tr>';

// mysqli_fetch_array will return a row of data from the query
// until no further data is available
while($row = mysqli_fetch_array($response)){

echo '<tr><td align="left">' . 
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
$row['email'] . '</td><td align="left">';


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