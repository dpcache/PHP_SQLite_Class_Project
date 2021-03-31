<?php  

/*
Jiaying Lin 
Oct, 12 2020 - Nov, 14 2020
*/
if(!isset($_SESSION)){
    session_start();
}

//Getting data from form.
//Avoid Error Reporting in Firefox and IE... (Notice: Undefined index:...)
$messages = array();
$error = FALSE;

$name = '';
$username = '';
$passcode1 = '';
$passcode2 = '';
$email = '';
$pnumber = '';
$age = '';
$gender = '';

if ( !empty($_POST) ) {
	$name = $_POST['name'];
	$username = $_POST['username'];
	$passcode1 = $_POST['passcode1'];
	$passcode2 = $_POST['passcode2'];
	$email = $_POST['email'];
	$pnumber = $_POST['pnumber'];
	$age = $_POST['age'];
	$gender = $_POST['gender'];
	$db = new SQLite3('user.db');
	$query = "SELECT username FROM user WHERE username='" . $username . "'"; // username already in database
	$result = $db->query($query);
	if ($result->fetchArray()[0] != null) {
       $db->close();
       $messages[] = "Username already exists!";
	   $error = TRUE;
    }
}

$_POST = array();

// Create validation for each input field and error messages for all validation errors.
if ( empty($name) || ! preg_match('/^[^\s][a-zA-Z\s]{2,14}$/', $name) )
{
	$error = TRUE;
	$messages[] = "A valid name is required. (Letters Only)";
}

if ( empty($username) || ! preg_match('/^[^\s][a-zA-Z0-9]{5,25}$/', $username) )
{
	$error = TRUE;
	$messages[] = "A valid username is required. (limited 6 to 24 characters, no special characters).";
}

if ( empty($passcode1) )
{
	$error = TRUE;
	$messages[] = "Empty Passcode.";
} 

if (! preg_match('/^[^\s][a-zA-Z0-9!@]{2,24}$/', $passcode1))
{	
	$error = TRUE;
	$messages[] = "A valid password is required. (limited 3 to 23 characters, ONLY !@ special characters allowed).";

}

if ($passcode1 != $passcode2) 
{
	$error = TRUE;
	$messages[] = "Password does not match.";
}



if ( empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL))
{
	$error = TRUE;
	$messages[] = "A valid email address is required.";
}

if ( empty($pnumber) || ! preg_match('/^\d{10}$/', $pnumber) )
{
	$error = TRUE;
	$messages[] = "A valid phone number is required (10 digits).";
}

if ( empty($age) || ! preg_match('/^[0-9]{1,3}+$/', $age) )
{
	$error = TRUE;
	$messages[] = "A valid age is required.";
}

if ( empty($gender) )
{
	$error = TRUE;
	$messages[] = "A valid gender is required.";
}

// Save the registration if the parameters are valid
if ( !$error ) { 
	// generate password hash 
	$hash = password_hash($passcode1, PASSWORD_DEFAULT);
	 // add to database
    $command = "INSERT INTO user VALUES(
	'" . $name . "', 
	'" . $username . "' , 
	'" . $hash . "' , 
	'" . $pnumber . "' ,
	'" . $email . "' , 
	'" . $age . "' , 
	'" . $gender . "'  )";
    $result = $db->exec($command);  
	if ($result) {
      // registration success
      $_SESSION['message'] = "Registration Successfully Added!";
      require('index.php');
    } else {
      $_SESSION['message'] = "Registration failed";
      require('register.php');
    }
} else {
	$_SESSION['message'] = $messages;
	require('registration.php');
}
?>