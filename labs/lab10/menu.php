<?php 
session_start();
if($_SESSION['user'] !== 'logged'){
	header("Location:login.php");
}


 ?>

 <a href="logout.php">Logout</a>