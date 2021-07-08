<?php

// Get a connection for the database
require_once('../mysqli_connect.php');

$cid = $_GET['pid']; // get id through query string

$sql = "delete from player where playerID = '$pid';"; 


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