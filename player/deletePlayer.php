<?php

// Get a connection for the database
require_once('../mysqli_connect.php');

$pid = $_GET['id']; // get id through query string

$sql = "delete from player where playerID = '$pid';"; 


$del = mysqli_query($dbc,$sql); // delete query

if($del)
{
    echo "Success deleting record";
    mysqli_close($dbc); // Close connection
    header("location:getPlayerInfo2.php"); // redirects to all records page
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
?>