<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="../styless.css">

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
        
        require_once('../mysqli_connect.php');
        
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

<form action="http://localhost/leagueTracker/family/familyadded.php" method="post">

<div style="text-align:center" class="form-group d-flex justify-content-center">    
    <div class="row">
    <div class="col-2"></div>
        <div class="col-8">
            <div class="row d-flex justify-content-center">
                <h3><b>Add a New Family </b></h3>
            </div>

            <div class="row d-flex justify-content-center">
            <h3><a href="http://localhost/leagueTracker/family/getfamilyInfo2.php">Return to Family Maintanence</a></h3>
                </br>
            </div>
            <div class="row d-flex justify-content-center">
                <!-- <p>Contact 1 First Name: -->
                <label>Contact 1 First Name*:<input class="form-control" type="text" name="contact1FirstName" size="30" value="" placeholder="Contact 1 First Name*" required/></label>
                
                <!-- </p> -->

                <!-- <p>Contact 1 Last Name: -->
                <label>Contact 1 Last Name*:<input class="form-control" type="text" name="contact1LastName" size="30" value="" placeholder="Contact 1 Last Name*" required/></label>
                <!-- </p> -->

                <!-- <p>Contact 2 First Name: -->
                <label>Contact 2 First Name:<input type="text" class="form-control" name="contact2FirstName" size="30" value="" placeholder="Contact 2 First Name" /></label>
                <!-- </p> -->

                <!-- <p>Contact 2 Last Name: -->
                <label>Contact 2 Last Name:<input type="text" class="form-control" name="contact2LastName" size="30" value="" placeholder="Contact 2 Last Name" /></label>
                <!-- </p> -->

                <!-- <p>Address Line 1: -->
                <label>Address Line 1*:<input type="text" class="form-control" name="addressLine1" size="30" value="" placeholder="Address Line 1" required/></label>
                <!-- </p> -->

                <!-- <p>Address Line 2: -->
                <label>Address Line 2:<input type="text" class="form-control" name="addressLine2" size="30" value="" placeholder="Address Line 2" /></label>
                <!-- </p> -->

                <!-- <p>City: -->
                <label>City*:<input type="text" class="form-control" name="city" size="30" value="" placeholder="City" required/></label>
                <!-- </p> -->

                <!-- <p>State (2 Characters): -->
                <label>State (2 Characters)*:<input type="text" class="form-control" name="state" size="30" maxlength="2" value="" placeholder="State (2 Characters)" required/></label>
                <!-- </p> -->

                <!-- <p>Zip Code: -->
                <label>Zip Code*:<input type="text" class="form-control" name="zipCode" size="30" maxlength="5" value="" placeholder="Zip Code" required/></label>
                <!-- </p> -->

                <!-- <p>Phone Number: -->
                <label>Phone Number*:<input type="text" class="form-control" name="PrimaryPhone" size="30" value="" placeholder="Phone Number" required/></label>
                <!-- </p> -->

                <!-- <p>Email: -->
                <label>Email*:<input type="text" class="form-control" name="email" size="30" value="" placeholder="Email" required/></label>
                <!-- </p> -->

                <!-- <p class="padding-top-15">
                    <input class="bg-success" type="submit" name="submit" value="Add Family" />
                </p> -->
            </div>
            <div class="row">     
                <div class="col-6"></div>           
                <p class="padding-top-15">
                    <input class="bg-success" type="submit" name="submit" value="Add Family" />
                </p>
            </div>
        </div>
        <div class="col-2"></div>
    </div>
</div>    
</form>
</body>
</html>