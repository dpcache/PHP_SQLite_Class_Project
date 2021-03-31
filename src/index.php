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
	<title>UISO - Home</title>
	<link rel="shortcut icon" href="logo.ico" type="image/x-icon">
	<link href="std.css" rel="stylesheet">
	<link href="index.css" rel="stylesheet">

</head>
  
<body>

<?php
   //Check if the message is set.
   if (isset($_SESSION['message'])) { 
      // if session message exists
      echo "<div class=\"backendErrorMsg\">";
	  echo "<p>";
      echo $_SESSION['message'];  // display message
	  echo "</p>";
      echo "</div>";
	  unset($_SESSION['message']);
   }
?>
<?php include 'header.php';?>
<?php include 'menu.php';?>


<main>
	<div>
		<!-- Main content -->
		<h1>Welcome!</h1>
		<p>At USIO, we welcome all international students within the United States.<br> USIO provides many resources and has many objectives to bring international students together and help international become successful and comfortable in the United States.</p>
		<div id="imgContainer">
			<img src="banner.jpg" alt="Image of international students." width="800" height="500">
		</div>
		<h1>About UISO</h1>
		<p>USIO is an international student organization created by and for international students across the United States.</p>
		<h1>Why UISO?</h1>
		<ul>
		  <li>USIO is the only organization that connects all international students in the United States together.</li>
		  <li>USIO is the only organization that enables international students to exchange information and share insights online.</li>
		  <li>USIO provides both virtual events and in-person events for celebration and training.</li>
		</ul>  
	</div>
</main>

<?php include 'footer.php';?>

</body>
  
</html>