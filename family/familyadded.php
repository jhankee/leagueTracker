<html>
<head>
<title>Add Family</title>
</head>
<body>
<?php

if(isset($_POST['submit'])){
    
    $data_missing = array();
    
    if(empty($_POST['contact1FirstName'])){

        // Adds name to array
        $data_missing[] = 'contact1FirstName';

    } else {

        // Trim white space from the name and store the name
        $c1f_name = trim($_POST['contact1FirstName']);

    }

    if(empty($_POST['contact1LastName'])){

        // Adds name to array
        $data_missing[] = 'contact1LastName';

    } else{

        // Trim white space from the name and store the name
        $c1l_name = trim($_POST['contact1LastName']);

    }
    if(empty($_POST['contact2FirstName'])){

        // Adds name to array
        $data_missing[] = 'contact2FirstName';

    } else {

        // Trim white space from the name and store the name
        $c2f_name = trim($_POST['contact2FirstName']);

    }

    if(empty($_POST['contact2LastName'])){

        // Adds name to array
        $data_missing[] = 'contact2LastName';

    } else{

        // Trim white space from the name and store the name
        $c2l_name = trim($_POST['contact2LastName']);

    }
    if(empty($_POST['email'])){

        // Adds name to array
        $data_missing[] = 'Email';

    } else {

        // Trim white space from the name and store the name
        $email = trim($_POST['email']);

    }

    if(empty($_POST['addressLine1'])){

        // Adds name to array
        $data_missing[] = 'addressLine1';

    } else {

        // Trim white space from the name and store the name
        $street1 = trim($_POST['addressLine1']);

    }
	    if(empty($_POST['addressLine2'])){

        // Adds name to array
        $data_missing[] = 'addressLine2';

    } else {

        // Trim white space from the name and store the name
        $street2 = trim($_POST['addressLine2']);

    }

    if(empty($_POST['city'])){

        // Adds name to array
        $data_missing[] = 'City';

    } else {

        // Trim white space from the name and store the name
        $city = trim($_POST['city']);

    }

    if(empty($_POST['state'])){

        // Adds name to array
        $data_missing[] = 'State';

    } else {

        // Trim white space from the name and store the name
        $state = trim($_POST['state']);

    }

    if(empty($_POST['zipCode'])){

        // Adds name to array
        $data_missing[] = 'Zip Code';

    } else {

        // Trim white space from the name and store the name
        $zip = trim($_POST['zipCode']);

    }

    if(empty($_POST['PrimaryPhone'])){

        // Adds name to array
        $data_missing[] = 'Phone Number';

    } else {

        // Trim white space from the name and store the name
        $phone = trim($_POST['PrimaryPhone']);

    }

   
    if(empty($data_missing)){
        
        require_once('../../mysqli_connect.php');
        
        $query = "INSERT INTO family (contact1FirstName,contact1LastName,contact2FirstName,contact2LastName,addressLine1,addressLine2,city,state,zipCode,PrimaryPhone,email,familyID) 
		VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, Null)";
        
        $stmt = mysqli_prepare($dbc, $query);
        
        //i Integers
        //d Doubles
        //b Blobs
        //s Everything Else
        
        mysqli_stmt_bind_param($stmt, "ssssssssssi", $c1f_name, $c1l_name, $c2f_name, $c2l_name, $street1, $street2, $city, $state, $zip, $phone, $email);
        
        mysqli_stmt_execute($stmt);
        
        $affected_rows = mysqli_stmt_affected_rows($stmt);
        
        if($affected_rows == 1){
            
            echo 'Family Entered';
            
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

<form action="http://localhost/leagueTracker/familyadded.php" method="post">
    
    <b>Add a Family Student</b>
    
<p>Contact 1 First Name:
<input type="text" name="contact1FirstName" size="30" value="" />
</p>

<p>Contact 1 Last Name:
<input type="text" name="contact1LastName" size="30" value="" />
</p>

<p>Contact 2 First Name:
<input type="text" name="contact2FirstName" size="30" value="" />
</p>

<p>Contact 2 Last Name:
<input type="text" name="contact1LastName" size="30" value="" />
</p>

<p>Street Line 1:
<input type="text" name="addressLine1" size="30" value="" />
</p>

<p>Street Line 1:
<input type="text" name="addressLine1" size="30" value="" />
</p>

<p>City:
<input type="text" name="city" size="30" value="" />
</p>

<p>State (2 Characters):
<input type="text" name="state" size="30" maxlength="2" value="" />
</p>

<p>Zip Code:
<input type="text" name="zipCode" size="30" maxlength="5" value="" />
</p>

<p>Phone Number:
<input type="text" name="PrimaryPhone" size="30" value="" />
</p>

<p>Email:
<input type="text" name="email" size="30" value="" />
</p>

<p>
    <input type="submit" name="submit" value="Add Family" />
</p>
    
</form>
</body>
</html>