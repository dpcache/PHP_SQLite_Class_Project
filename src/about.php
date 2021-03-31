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
	<title>UISO - About</title>
	<link rel="shortcut icon" href="logo.ico" type="image/x-icon">
	<link href="std.css" rel="stylesheet">
	<link href="about.css" rel="stylesheet">
</head>
  
<body>

<?php include 'header.php';?>
<?php include 'menu.php';?>


<main>
	<div>
		<h1>About UISO</h1>
		<img id="founder" src="founder.jpg" alt="Image of the founder of the organization.">
		<p>United International Student Organization (USIO) is founded in 2020 by Elon Must. USIO is an international community designed to help international students within the United States.</p>
		<img src="rocket.png" alt="Image of a rocket" width="100" height="100"/>
		<h2>Mission</h2>
		<p>This organization's objective is to bring international students in the United States together and aims to be a place for international students to exchange information and share insights while providing the resources they need to be successful and comfortable in the United States.</p>
		<img src="goal.png" alt="Image of a soccer." width="125" height="100">
		<h2>Goal</h2>
		<p>The goal of USIO is to become a well-known organization shape by organization members and international students while providing new features and cutting edge technologies to connect students.</p>
		<img src="usio.png" alt="Image of the logo of the organization, a globe." width="100" height="100"/>
		<h2>Founder</h2>
		<p>Elon Must was an international student at Imagery University. When he first moved here from South Africa, he had a tough time communicating with the students and professors while also having trouble finding jobs and a community within the United States. After graduation, Elon Must started this organization to help international students and connect them together to help them achieve their dreams.</p>
		<br>
	</div>
</main>

<?php include 'footer.php';?>

</body>
  
</html>