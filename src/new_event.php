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
	<title>UISO - New Event</title>
	<link rel="shortcut icon" href="logo.ico" type="image/x-icon">
	<link href="std.css" rel="stylesheet">
	<link href="membership.css" rel="stylesheet">
	<script src="validateForm.js"></script>
</head>
  
<body>

<?php
if (!isset($_SESSION['logged_in'])) {
	$messages = array();
	$messages[] = "Please login";
	$_SESSION['message'] = $messages;
	header('Location: login.php');
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
		<h1>Add Event</h1>
		<h3>Administrator ONLY!</h3>
	</div>
	
	<hr>
	
	<form action="new_event_action.php" method="post" id="subForm" 
	onsubmit="return validateFormEventTime()">
		
		
		<label for="eventname">Event: </label><br>
		<input type="text" id="eventname" name="eventname" placeholder="Christmas Festival" 
		pattern = "^[^\s].{2,24}$">
		
		<br>
		<br>	
		
		<label for="sponsor">Sponsor:</label><br>
		<input type="text" id="sponsor" name="sponsor" placeholder = "IMX Inc." 
		pattern = "^[^\s].{2,24}$">
		
		<br>
		<br>	
		
		<label for="eventDate">Date:</label>
		<input type="date" id="eventDate" name="eventDate">
		<p id = "validateDateMsg"></p>
		<br>
		<br>
		
		<label for="eventTime">Time:</label>
		<input type="time" id="eventTime" name="eventTime" min="00:00" max="23:59" required>
		<p id = "validateTimeMsg"></p>
		<br>  
		<br> 

		<label for="description">Description:</label>	<br> 
		<textarea id="description" name="description" rows="4" cols="40"></textarea>

		<br>  
		<br> 

		<input type="submit" value="Submit">
		<input type="reset" value="Reset">

	</form> 
	
	
</main>

<?php include 'footer.php';?>

</body>
  
</html>