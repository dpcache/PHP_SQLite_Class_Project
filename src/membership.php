<!-- 
Jiaying Lin 
Oct 12, 2020
-->

<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>UISO - Membership</title>
	<link rel="shortcut icon" href="logo.ico" type="image/x-icon">
	<link href="std.css" rel="stylesheet">
	<link href="membership.css" rel="stylesheet">
</head>
  
<body>

<?php include 'header.php';?>
<?php include 'menu.php';?>


<main>
	<div>
		<h1>Membership</h1>
			<h2>Join the organization and make a global impact!</h2>
			<p>Your support will help to keep the organization running. As a member, you will get a member tag in the discussion forums as well as member only events that will set the direction of the organization.</p>
		<h2>Membership Rates</h2>
			<p>$100.00/year</p>
	</div>
	
	<hr>
	
	
	<div id = "imageBox">
		<img src="check.png" alt="Example of a check" width="500" height="300">
	</div>
	
	<form action="subscribe_action.php" method="post" id="subForm">

		<h1 class="center">Signup</h1>

		<label for="name">Name: </label><br>
		<input type="text" id="name" name="name" placeholder="Potato John" pattern="^(?![\s.]+$)[a-zA-Z\s.]{2,25}$">
		<p>(limited to 25 characters)</p>
		<br>

		<label for="email">E-mail:</label><br>
		<input type="text" id="email" name="email" placeholder="email@ads.com">

		<br>
		<br>

		<label for="age">Age:</label><br>
		<input type="number" id="age" name="age" min="0" max="150" placeholder ="21">

		<br>
		<br> 
		
		<p>Please select your gender:</p>
		<input type="radio" id="male" name="gender" value="male">
		<label for="male">Male</label><br>
		<input type="radio" id="female" name="gender" value="female">
		<label for="female">Female</label><br>
		<input type="radio" id="other" name="gender" value="other">
		<label for="other">Other</label>

		<br>  
		<br> 

		<label for="fromM">How Did You Hear About Us:</label>
		<select name="fromM" id="fromM">
		<option value="">Select</option>
		<option value="na">N/A</option>
		<option value="web">Web</option>
		<option value="friend">Friend</option>
		<option value="radio">Radio</option>
		</select>

		<br>  
		<br>
		
		<h3> Payment </h3>
		
		<label for="account">Account Number:</label><br>
		<p>(limited to 12 digits)</p>
		<input type="password" id="account" name="account"  pattern="^\d{12}$" placeholder ="000123456789">
		<br>
		<label for="account2">Confirm Account Number:</label><br>
		<input type="password" id="account2" name="account2" pattern="^\d{12}$" >
		
		<br>
		<br>	
		
		<label for="routing">Routing Number:</label><br>
		<p>(limited to 9 digits)</p>
		<input type="number" id="routing" name="routing" placeholder = "123456789">
		<br>
		<label for="routing2">Confirm Routing Number:</label><br>
		<input type="number" id="routing2" name="routing2">
		
		
		<br>	
		<br>
		
		<br>
		<input type="submit" value="Submit">
		<input type="reset" value="Reset">

	</form> 
	
	
</main>

<?php include 'footer.php';?>

</body>
  
</html>