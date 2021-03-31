<?php  

/*
Jiaying Lin 
Oct, 12 2020
*/

$messages = array();
$error = FALSE;

$name = $_POST['name'];
$email = $_POST['email'];
$age = $_POST['age'];
$gender = '';
$fromM = '';
$account = $_POST['account'];
$account2 = $_POST['account2'];
$routing = $_POST['routing'];
$routing2 = $_POST['routing2'];

// Create validation for each input field and error messages for all validation errors.
if ( empty($name) || ! preg_match('/(?![\s.]+$)[a-zA-Z\s.]{2,25}$/', $name) )
{
	$error = TRUE;
	$messages[] = "Error: The name field is required, and can contain only letters, and spaces (limited to 25 characters).";
}

if ( empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL))
{
	$error = TRUE;
	$messages[] = "Error: A valid email address is required.";
}

if ( empty($age) || ! preg_match('/^[0-9]{1,3}+$/', $age) )
{
	$error = TRUE;
	$messages[] = "Error: A valid age is required.";
}

if ( !empty($_POST['gender']) ){
	$gender = $_POST['gender'];
} else {
	$error = TRUE;
	$messages[] = "Error: Please select your gender!";
}

if( !empty($_POST['fromM']) ){
	$fromM = $_POST['fromM'];
} else {
	$error = TRUE;
	$messages[] = "Error: Make a selection from data list.";
}

if ( empty($account) || empty($account2) ||  ! preg_match('/^\d{12}$/', $account) || $account != $account2 ){
	$error = TRUE;
	$messages[] = "Error: Please fill out both account number field the same. (12 digits only)";
}

if ( empty($routing) || empty($routing2)){
	$error = TRUE;
	$messages[] = "Error: Please fill out both routing number field.";
}

if (! preg_match('/^\d{9}$/', $routing)){
	$error = TRUE;
	$messages[] = "Error: Routing number 9 digits only! ";
}

if ($routing != $routing2){
	$error = TRUE;
	$messages[] = "Error: Routing number is not the same! ";
}



// Add a welcome message if the parameters are valid
if( ! $error ) {
	$messages[] = "Welcome, " . $name . "!";
	$messages[] = "We are processing your payment.";
	$messages[] = "Thank you!";
}



// Save the registration if the parameters are valid
if (! $error) {  
	$regfile = fopen("subscribe_data.txt", "a") or die("Unable to open file!");
	$txt =  str_replace("|", "-", $name) . "|" 
			. str_replace("|", "-", $email) . "|" 
			. str_replace("|", "-", $age) . "|" 
			. str_replace("|", "-", $gender) . "|" 
			. str_replace("|", "-", $fromM) . "|"
			. str_replace("|", "-", $account) . "|"
			. str_replace("|", "-", $routing) . "\n";
	fwrite($regfile, $txt);
	fclose($regfile);
}
?>

<!-- HTML Result page for the users. -->
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en"> 

<head>
  <title>Registration Result</title>
  <meta charset="UTF-8" />
  <style>body { font-family: sans-serif}</style>
</head> 

<body>
	<h2>Registration Result</h2>

	<?php
	// Echo the collected messages 
	  foreach ($messages as $message) {
		echo "<p>", $message, "</p>"; 
	  }
	?>

</body> 
</html>