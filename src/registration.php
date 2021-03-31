<!-- 
Jiaying Lin 
Oct 12, 2020
-->
<?php
if(!isset($_SESSION)){
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>UISO - Registration</title>
	<link rel="shortcut icon" href="logo.ico" type="image/x-icon">
	<link href="std.css" rel="stylesheet">
	<link href="membership.css" rel="stylesheet">
	<script src="validateForm.js"></script>
</head>
  
<body>

<?php
//Check if the message is set.
if (isset($_SESSION['message'])) { 
	// if session message exists
    echo "<div class=\"backendErrorMsg\">";
	$count = count($_SESSION['message']);
	for ($x = 0; $x < $count; $x++) {
		echo "<p>";
		echo $_SESSION['message'][$x]; 
		echo "\n</p>";
	}
	echo "</div>";
	unset($_SESSION['message']);
}
?>
<?php include 'header.php';?>
<?php include 'menu.php';?>


<main>
	<div>
		<h1>User Registration</h1>
		<h3>Connect, share and make a impact!</h3>
	</div>
	
	<hr>
	
	<form action="registration_action.php" method="post" id="subForm" onsubmit="return validateFormRegistration()">
		
		<!--Alphabets only, no white space infront-->
		<label for="name">Name: </label><br>
		<input type="text" id="name" name="name" placeholder="John Cena" pattern="^[^\s][a-zA-Z\s]{2,14}$">
		
		<br>
		<br>	
		<!--Numbers and alphabets, no white space infront and at the end-->
		<label for="username">Username:</label><br>
		<input type="text" id="username" name="username" placeholder = "A123456789"  
		pattern="^[^\s][a-zA-Z0-9]{2,25}$" >
		
		<br>
		<br>	
		
		<label for="passcode1">Password:</label><br>
		<input type="password" id="passcode1" name="passcode1" placeholder ="000123456789">
		<br>
		<label for="passcode2">Confirm Password:</label><br>
		<input type="password" id="passcode2" name="passcode2" >
		<p id="message"></p>
		<br>	
		<br>
		
		<label for="email">E-mail:</label><br>
		<input type="email" id="email" name="email" placeholder="email@usio.com">
		
		<br>
		<br>
		<!--Only 10 digits allowed.-->
		<label for="pnumber">Phone Number:</label><br>
		<input type="text" id="pnumber" name="pnumber" pattern="^\d{10}$" placeholder = "7572303242">
		
		<br>
		<br>
		
		
		<label for="age">Age:</label><br>
		<input type="number" id="age" name="age" min="12" max="120" placeholder ="21">
		
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

		
		
		<input type="submit" value="Submit">
		<input type="reset" value="Reset">

	</form> 
	
	
</main>

<?php include 'footer.php';?>

</body>
  
</html>