<?php

// Get a connection for the database
require_once('../mysqli_connect.php');

$cid = $_GET['fid']; // get id through query string

$sql = "delete from family where familyID = '$fid';"; 


$del = mysqli_query($dbc,$sql); // delete query

if($del)
{
    echo "Success deleting record";
    mysqli_close($dbc); // Close connection
    header("location:getFamilyInfo2.php"); // redirects to all records page
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
?>