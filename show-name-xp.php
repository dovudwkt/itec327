<?php 
session_start();
$_SESSION['current_user'];
 // $dbcon = new mysqli('localhost', 'root', '', 'game');
include("mysqli_connect.php");  	
  $query = "SELECT username, credits FROM users where id =". $_SESSION['current_user'];
	$result = mysqli_query($dbcon, $query);
	if($result) { 
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			echo "<p>".$row['username']." | ". $row['credits']. "xp</p>";
		}
	}


 ?> 