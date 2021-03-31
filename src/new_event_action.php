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
$eventname = '';
$sponsor = '';
$eventDate = '';
$eventTime = '';
$description = '';

if ( !empty($_POST) ) {
	date_default_timezone_set('America/New_York');
	$eventname = $_POST['eventname'];
	$sponsor = $_POST['sponsor'];
	$eventDate = $_POST['eventDate'];
	$eventTime = $_POST['eventTime'];
	$userDate = $eventDate;
	$userTime = $eventTime;
	$description = $_POST['description'];
	$description = preg_replace( "/\r|\n/", " ", $description);
	$systemDate = date("Ymd");
	$systemTime = date("Hi");
	$db = new SQLite3('event.db');
	$query = "SELECT eventname FROM event WHERE eventname='" . $eventname . "'"; // eventname already in database
	$result = $db->query($query);
	if ($result->fetchArray()[0] != null) {
       $db->close();
       $messages[] = "Event already exists!";
	   $error = TRUE;
	   //require('register.php');
       //return;
    }
}
$_POST = array();

// Create validation for each input field and error messages for all validation errors.
if ( empty($eventname) || ! preg_match('/^[^\s][a-zA-Z0-9.?&:;*!,()*_\s-]{2,24}$/', $eventname) )
{
	$error = TRUE;
	$messages[] = "Event Field Error: No space in the front allowed. Only the following special characters allowed (.?&:;*!,()*_\-), and spaces (limited 3 to 25 characters).";
}

if ( empty($sponsor) || ! preg_match('/^[^\s][a-zA-Z0-9.?&:;*!,()*_\s-]{2,24}$/', $sponsor) )
{
	$error = TRUE;
	$messages[] = "Sponsor Field Error: No space in the front allowed. Only the following special characters allowed (.?&:;*!,()*_\-), and spaces (limited 3 to 25 characters).";
}

if ( empty($eventDate) )  
{
	$error = TRUE;	
	$messages[] = "Event Date Field Error: can not be empty";
	
} else {
	$eventDate = str_replace('-', '', $eventDate);
	if(! preg_match('/[0-9]{8,8}/', $eventDate)) {
		
		$error = TRUE;
		$messages[] = "Event Date Field Error: Format XXXX-XX-XX";

	} else if ($eventDate < $systemDate){
		
		$error = TRUE;
		$messages[] = "Event Date Field Error: New event date can't not be prior to current date. " ;
	} else if ($eventDate == $systemDate && !empty($eventTime)) {
		
		$eventTime = str_replace(':', '', $eventTime);
		if($eventTime < $systemTime){
			$error = TRUE;
			$messages[] = "Event Time Field Error: time can't not be prior to current time. " ;
		}

	}
}

if ( empty($eventTime) ) {
	$messages[] = "Event Time Field Error: cannot be empty!";
}

if ( empty($description) || ! preg_match('/[a-zA-Z0-9.?&:;*!,()*_\s-]{0,254}$/', $description))
{
	$error = TRUE;
	$messages[] = "Description can not be empty!";
}

if (! preg_match('/[a-zA-Z0-9.?&:;*!,()*_\s-]{0,254}$/', $description))
{
	$error = TRUE;
	$messages[] = "Description: only the following special characters allowed (.?&:;*!,()*_\-)! 255 Character Limit!";
}

// Save the registration if the parameters are valid
if (! $error) {  

    $command = "INSERT INTO event VALUES(
	'" . $eventname . "', 
	'" . $sponsor . "' , 
	'" . $eventDate . "' , 
	'" . $eventTime . "' ,
	'" . $description . "' 
	)";
    $result = $db->exec($command);
	if ($result) {
      // event added success
      $_SESSION['message'] = "Event Successfully Added!";;
      require('index.php');
    } else {
      $_SESSION['message'] = "Event Registration failed";
      require('new_event.php');
	}
} else {
	$_SESSION['message'] = $messages;
	require('new_event.php');
}
?>