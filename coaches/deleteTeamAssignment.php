<?php

// Get a connection for the database
require_once('../mysqli_connect.php');

$cid = $_GET['cid']; // get id through query string
$tid = $_GET['tid']; // get id through query string

echo "delete from coach_has_team where teamid = '$tid' AND coachID = '$cid';";
$sql = "delete from coach_has_team where teamid = '$tid' AND coachID = '$cid';"; //," AND coachID = ", $cid, ";" ;


$del = mysqli_query($dbc,$sql); // delete query

if($del)
{
    echo "Success deleting record";
    mysqli_close($dbc); // Close connection
    header("location:getCoachAssignment.php?id=$cid"); // redirects to all records page
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
?>