<?php  

/*
Jiaying Lin 
Oct, 12 2020 - Nov, 14 2020 - Dec, 6 2020
*/
if(!isset($_SESSION)){
    session_start();
}

//Getting data from form.
//Avoid Error Reporting in Firefox and IE... (Notice: Undefined index:...)
$messages = array();
$error = FALSE;

$userid = '';
$password = '';

if ( !empty($_POST) ) {
	
	$username = $_POST['username'];
	$password = $_POST['password'];

	$db = new SQLite3('user.db');
	
	$_POST = array();
	
	if ( empty($username) || ! preg_match('/^[^\s][a-zA-Z0-9]{5,25}$/', $username) )
	{
		$error = TRUE;
		$messages[] = "A valid username is required. (limited 6 to 24 characters, no special characters).";
	}

	if ( empty($password) )
	{
		$error = TRUE;
		$messages[] = "Empty Passcode.";
	} 

	if (! preg_match('/^[^\s][a-zA-Z0-9!@]{2,24}$/', $password))
	{
		$error = TRUE;
		$messages[] = "A valid password is required. (limited 3 to 23 characters, ONLY !@ special characters allowed).";

	}
	
	if ( $error )
	{
		$_SESSION['message'] = $messages;
		require('login.php');
		exit;
	}
	
	// look for user in database
	$query = "SELECT username, passcode FROM user WHERE username='" . $username . "'";
	$result = $db->query($query);
	if ($result) {
		$row = $result->fetchArray(SQLITE3_ASSOC);
		$hash = $row['passcode'];
		$username = $row['username'];
		
		if (strlen($username) == 0 ){
			// userid not in database
			$messages[] = "Username not in database. Please register!";
			$_SESSION['message'] = $messages;
			$db->close();
			require('registration.php');
		} else { 
			// validate password
			$valid = password_verify($password, $hash);
			if ($valid) {
				$_SESSION['userid'] = $userid;
				$_SESSION['logged_in'] = TRUE;
				$_SESSION['message'] = $_SESSION['userid'] . "Logged In";
				$db->close();
				require('index.php');
			} else{
				// invalid password
				unset($_SESSION['userid']);
				unset($_SESSION['logged_in']);
				$messages[] = "Invalid password.";
				$_SESSION['message'] = $messages;
				require('login.php');
			}
		}
	}

	
} else {
	$messages[] = "Please login";
	$_SESSION['message'] = $messages;
    require('login.php');
    return;
}

?>