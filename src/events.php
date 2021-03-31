<!-- 
Jiaying Lin 
Oct, 12 2020 - Nov, 14 2020
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
	<title>UISO - Events</title>
	<link rel="shortcut icon" href="logo.ico" type="image/x-icon">
	<link href="std.css" rel="stylesheet">
	<link href="events.css" rel="stylesheet">
	
</head>
  
<body>


<?php  
// open events.txt file for reading
$filename = "events.txt";
$regfile = fopen($filename, "r") or die("Unable to open $filename!");
?>

<?php include 'header.php';?>
<?php include 'menu.php';?>


<main>
	<div>
		<h1>Events</h1>
		<!-- Main content -->
		<?php
			$db = new SQLite3('event.db');  // open the DB
			$query = 'SELECT * FROM event ORDER BY eventDate ASC'; // get all pets
			$result = $db->query($query); // execute the query
			while ($event = $result->fetchArray(SQLITE3_ASSOC) ) {  // get next row
				$phpdate = strtotime( $event['eventDate'] );
				$mysqldate = date( 'Y-m-d', $phpdate );
				echo "<ul>";
				echo '<li class="title">' . $event['eventname'] .  '</li>';
				echo '<li>Sponsor: ' . $event['sponsor'] . '</li>';
				echo '<li>Date: ' .  $mysqldate  . ' ' . $event['eventTime'] . '</li>';
				echo '<li>Description: ' . $event['description'] . '</li>';
				echo "</ul><br>";
			}
			$db->close(); 
		?>
		
		<form style="display: inline" action="new_event.php" method="get">
			<button id="addEvent">Add Event</button>
		</form>
	</div>
		
</main>

<?php include 'footer.php';?>

</body>
  
</html>