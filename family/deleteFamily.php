<?php

// Get a connection for the database
require_once('../mysqli_connect.php');

$fid = $_GET['id']; // get id through query string

$sql = "delete from family where familyID = '$fid';"; 


$del = mysqli_query($dbc,$sql); // delete query
$errorMsg = mysqli_error($dbc);

if($del)
{
    echo "Success deleting record";
    mysqli_close($dbc); // Close connection
    header("location:getFamilyInfo2.php"); // redirects to all records page
    exit;	
}
else
{
    echo $errorMsg;
}
?>