<?php 
session_start();
$_SESSION['current_user'];
 // $dbcon = new mysqli('localhost', 'root', '', 'game');
include("mysqli_connect.php");  	
  $query = "SELECT username, email, credits, wins, loses FROM users where id =". $_SESSION['current_user'];
	$result = mysqli_query($dbcon, $query);
	if($result) {
		echo "<table class='table table-md table-sm table-striped text-center'>"; 
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
			echo "<tr class='table-primary'><th >Username</th><td>".$row['username']."</td></tr>";
			echo "<tr class='table-primary'><th >Email</th><td>".$row['email']."</td></tr>";
			echo "<tr class='table-info'><th>Credits</th><td>".$row['credits']."</td></tr>";
			echo "<tr class='table-success'><th>Wins</th><td>".$row['wins']."</td></tr>";
			echo "<tr class='table-danger'><th>Loses</th><td>".$row['loses']."</td></tr>";
		}
		echo "</table>";
	}


 ?> 