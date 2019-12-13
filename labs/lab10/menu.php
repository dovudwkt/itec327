<?php 
session_start();
if(!isset($_SESSION['user']) || $_SESSION['user'] !== 'logged'){
	header("Location:login.php");
}


 ?>
<a href="#">Add users</a>
<br>
<a href="mysecret.php">My secret</a>
<br><br>
<a href="logout.php">Logout</a>