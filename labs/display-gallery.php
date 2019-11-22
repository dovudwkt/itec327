<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Photo Gallry</title>
<style type="text/css">
	a{
		float: left;
    	margin: 18px;
	}
	div{
		width: 200px;
	    height: 200px;
	    background-size: cover;
	    background-position: center;
	}
</style>
</head>
<body>

<?php

	include('mysqli_connect.php');
	$query = "SELECT * FROM gallery";
	$stmt = mysqli_stmt_init($dbcon);
	if(!mysqli_stmt_prepare($stmt, $query)){
		echo "SQL failed in displayGallery()";
	}
	else{
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		while($row = mysqli_fetch_assoc($result)){
			echo '<a href=#>
				<div style="background-image: url(photos/'. $row['imgFullName'] .' )"></div>
				<h3> '.$row['title'] .' </h3>
				<p> '.$row['description'] .'  </p>
			</a>';
		}
	}
?>
</body>
</html>