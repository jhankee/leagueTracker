<html>
<head>
<title>Add Player</title>
</head>
<body>
<?php

$id = $_GET['id']; // get id through query string

if(isset($_POST['submit'])){
    
    $data_missing = array();
    
    if(empty($_POST['playerFirstName'])){

        // Adds name to array
        $data_missing[] = 'playerFirstName';

    } else {

        // Trim white space from the name and store the name
        $pf_name = trim($_POST['playerFirstName']);

    }

    if(empty($_POST['playerLastName'])){

        // Adds name to array
        $data_missing[] = 'playerLastName';

    } else{

        // Trim white space from the name and store the name
        $pl_name = trim($_POST['playerLastName']);

    }
    if(empty($_POST['dateOfBirth'])){

        // Adds name to array
        $data_missing[] = 'dateOfBirth';

    } else {

        // Trim white space from the name and store the name
        $dob = trim($_POST['dateOfBirth']);

    }

   
    if(empty($data_missing)){
        
        require_once('../mysqli_connect.php');
        
        $query = "INSERT INTO player (playerFirstName,playerLastName,dateOfBirth,family_familyID,registrationDate,playerID) 
		VALUES ( ?, ?, ?, ?, Now(), Null)";
        
        $stmt = mysqli_prepare($dbc, $query);
        
        //i Integers
        //d Doubles
        //b Blobs
        //s Everything Else
        
        mysqli_stmt_bind_param($stmt, "sssiisi", $pf_name, $pl_name, $dob, $id, $regDate);
        
        mysqli_stmt_execute($stmt);
        
        $affected_rows = mysqli_stmt_affected_rows($stmt);
        
        if($affected_rows == 1){
            
            echo 'Player Entered';
            
            mysqli_stmt_close($stmt);
            
            mysqli_close($dbc);
            
        } else {
            
            echo 'Error Occurred<br />';
            echo mysqli_error();
            
            mysqli_stmt_close($stmt);
            
            mysqli_close($dbc);
            
        }
        
    } else {
        
        echo 'You need to enter the following data<br />';
        
        foreach($data_missing as $missing){
            
            echo "$missing<br />";
            
        }
        
    }
    
}

?>

<form action="http://localhost/leagueTracker/player/playeradded.php" method="post">
    
<b>Add a New Player</b>

<p>Player First Name:
<input type="text" name="playerFirstName" size="30" value="" />
</p>

<p>Player Last Name:
<input type="text" name="playerLastName" size="30" value="" />
</p>

<p>Date of Birth:
<input type="date" name="dateOfBirth" size="30" value="" />
</p>



<p>
<input type="submit" name="submit" value="Add Player" />
</p>
    
</form>
</body>
</html>