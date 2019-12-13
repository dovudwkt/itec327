<?php 
session_start();
if(!isset($_SESSION['user']) || $_SESSION['user'] !== 'logged'){
	header("Location:login.php");
}


?>

<p>My secret is that I am not a student, I am a secret agent</p>