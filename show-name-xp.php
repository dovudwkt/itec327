<?php 
session_start();
$_SESSION['current_user'];
 // $dbcon = new mysqli('localhost', 'root', '', 'game');
include("mysqli_connect.php");  	
  $query = "SELECT name, surname, credits FROM users where id =". $_SESSION['current_user'];
	$result = mysqli_query($dbcon, $query);
	if($result) { 
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			echo "<p>".$row['name']." ". $row['surname'] ." | ". $row['credits']. "xp</p>";
		}
	}


 ?> 