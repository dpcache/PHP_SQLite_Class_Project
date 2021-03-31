<!-- 
Jiaying Lin
Oct 12, 2020
-->


<nav>
	<a href="index.php">
		<img src="usio.png" alt="A logo of the organization, a globe." style="width:25px; height:25px;"/>
	</a>
	<a href="index.php">Home</a> 
	<a href="about.php">About</a>
	<a href="events.php">Events</a>
	<!-- <a href="membership.php">Membership</a>  WILL MOVE. AFTER USER LOGIN. WORK IN PROGRESS. -->
	<a href="resources.php">Resources</a>
	<a href="registration.php">Registration</a>
	<?php
		if (isset($_SESSION['logged_in'])) {
			echo "<a href=\"logout_action.php\">Logout</a>";
		} else {
			echo "<a href=\"login.php\">Login</a>";
		}
		
	?>
</nav>