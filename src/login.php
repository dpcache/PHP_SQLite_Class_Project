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
	<title>UISO - Login</title>
	<link rel="shortcut icon" href="logo.ico" type="image/x-icon">
	<link href="std.css" rel="stylesheet">
	<link href="membership.css" rel="stylesheet">
	<script src="validateForm.js"></script>
</head>
  
<body>

<?php
if (isset($_SESSION['logged_in'])) {
	$_SESSION['message'] = "Logged In";
	header('Location: index.php');
	exit;
}

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
		<h1>Login</h1>
		<h3>Welcome!</h3>
	</div>
	
	<hr>
	
	<form action="login_action.php" method="post" id="subForm">
		
		
		<label for="username"><b>Username</b></label>
		<input type="text" id="username" placeholder="Enter Username" name="username" 
		pattern="^[^\s][a-zA-Z0-9]{2,25}$" required>
		
		<br>  
		<br>

		<label for="password"><b>Password</b></label>
		<input type="password" id="password" placeholder="Enter Password" name="password" required>


		<br>  
		<br> 

		<input type="submit" value="Submit">
		<input type="reset" value="Reset">

	</form> 
	
	
</main>

<?php include 'footer.php';?>

</body>
  
</html>