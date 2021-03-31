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
	<title>UISO - Resources</title>
	<link rel="shortcut icon" href="logo.ico" type="image/x-icon">
	<link href="std.css" rel="stylesheet">
	<link href="resouces.css" rel="stylesheet">
	
</head>
  
<body>

<?php include 'header.php';?>
<?php include 'menu.php';?>


<main>
	<!-- Bottom Content : Resources -->
	<div id="bottomBox">
		<a href="https://studyinthestates.dhs.gov/students/study/driving-in-the-united-states">
			<div>
				<h2>Driver License</h2>
				<img src="drive.jpg" alt="A image of a truck vehicle." width="200" height="200">
			</div>
		</a>
		
		<a href="https://travel.state.gov/content/travel/en/us-visas/study/student-visa.html">
			<div>
				<h2>Student Visa</h2>
				<img src="visa.png" alt="A image of visa on a passport" width="200" height="200">
			</div>
		</a>
		
		<a href="https://www.uscis.gov/working-in-the-united-states">
			<div>
				<h2>Working in U.S.</h2>
				<img src="work.jpg" alt="A image of workers in dress." width="200" height="200">
			</div>
		</a>
	</div>
	
	<br>
	
	<div id="bottomBox2">
		<a href="https://travel.usnews.com/rankings/best-usa-vacations/">
			<div>
				<h2>Best Places to Visit</h2>
				<img src="grandcanyon.jpg" alt="A image of Grand Canyon top down view" width="200" height="200">
			</div>
		</a>
		
		<a href="https://career.berkeley.edu/IntnlStudents/IS-employers">
			<div>
				<h2>Job Oppunities</h2>
				<img src="worker.jpg" alt="A image of city with statues and a large building" width="200" height="200">
			</div>
		</a>
		
		<a href="https://www.today.com/food/best-restaurants-us-2019-according-tripadvisor-t165245">
			<div>
				<h2>Top Restaurants to Try</h2>
				<img src="food.jpg" alt="A image plates and food" width="200" height="200">
			</div>
		</a>
	</div>
	
</main>

<?php include 'footer.php';?>

</body>
  
</html>