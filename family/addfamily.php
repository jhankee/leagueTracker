<html>
<head>
<title>Add Family</title>
</head>
<body>
<form action="http://localhost/leagueTracker/family/familyadded.php" method="post">

<b>Add a New Family</b>

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
<input type="text" name="contact2LastName" size="30" value="" />
</p>

<p>Address Line 1:
<input type="text" name="addressLine1" size="30" value="" />
</p>

<p>Address Line 2:
<input type="text" name="addressLine2" size="30" value="" />
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