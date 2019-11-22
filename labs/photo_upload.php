<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Uploading a Photo</title>
</head>
<body>
<?php
if ( isset( $_POST["sendPhoto"] ) ) {
 processForm();
} else {
 displayForm();
}

function processForm() {
	if ( isset( $_FILES["photo"] ) and $_FILES["photo"]["error"] == UPLOAD_ERR_OK ) {
		$path_parts = pathinfo( basename( $_FILES["photo"]["name"]));
		$imgExtension = $path_parts['extension'];
		$imgFullName = basename( $_FILES["photo"]["name"], '.'.$imgExtension).'-'.uniqid().'.'.$imgExtension;

		$title = $_POST['imgTitle'];
		$desc = $_POST['imgDescription'];
		$order = 3;
		// print_r($imgFullName);

		include_once('mysqli_connect.php');
		$query = "INSERT INTO gallery(title, description, imgFullName, orderGallery) VALUES (?,?,?,?)";
		$stmt = mysqli_stmt_init($dbcon);

		if(!mysqli_stmt_prepare($stmt, $query)){
			echo "Sql failed";
		}
		else{
			echo "SQL SUCCESS";
			mysqli_stmt_bind_param($stmt,"ssss", $title, $desc, $imgFullName, $order);
			mysqli_stmt_execute($stmt);

		}

		move_uploaded_file( $_FILES["photo"]["tmp_name"], "photos/" . $imgFullName);
		displayThanks(); 
	


	}
	else{
		switch( $_FILES["photo"]["error"] ) {
			case UPLOAD_ERR_INI_SIZE:
			$message = "The photo is larger than the server allows.";
			break;
			case UPLOAD_ERR_FORM_SIZE:
			$message = "The photo is larger than the script allows.";
			break;
			case UPLOAD_ERR_NO_FILE:
			$message = "No file was uploaded. Make sure you choose a file to
			upload.";
			break;
		}
		echo "<p>Sorry, there was a problem uploading that photo.</p>" .$_FILES["photo"]["error"] ;
	}
}

// function displayGallery(){
// 	// include('mysqli_connect.php');
// 	$query = "SELECT * FROM gallery";
// 	// $stmt = mysqli_stmt_init($dbcon);
// 	if(!mysqli_stmt_prepare($stmt, $query)){
// 		echo "SQL failed in displayGallery()";
// 	}
// 	else{
// 		mysqli_stmt_execute($stmt);
// 		$result = mysqli_stmt_get_result($stmt);
// 		while($row = mysqli_fetch_assoc($result)){
// 			echo '<a href=#>
// 				<div style="background-image: url(photos/'. $row['imgFullName'] .' )"></div>
// 				<h3> '.$row['title'] .' </h3>
// 				<p> '.$row['description'] .'  </p>
// 			</a>';
// 		}
// 	}
// }

function displayForm() {
?>
<h1>Uploading a Photo</h1>
<p>Please enter your name and choose a photo to upload, then click
Send Photo.</p>
<form action="photo_upload.php" method="post" enctype="multipart/form-data">
<!-- <input type="hidden" name="MAX_FILE_SIZE" value="50000" /> -->
<label for="visitorName">Your name</label>
<input type="text" name="visitorName" id="visitorName" value="" /><br/>
<label for="imgTitle">Title</label>
<input type="text" name="imgTitle" id="imgTitle" value="" /><br/>
<label for="imgDescription">Description</label>
<input type="text" name="imgDescription" id="imgDescription" value="" /><br/>
<label for="photo">Your photo</label>
<input type="file" name="photo" id="photo" value="" /><br/>

<input type="submit" name="sendPhoto" value="Send Photo" />

</form>
<?php
}
function displayThanks() {
?>
<h1>Thank You</h1>
<p>Thanks for uploading your photo<?php if ( $_POST["visitorName"] )
echo ", " . $_POST["visitorName"] ?>!</p>
<p>Here’s your photo:</p>
<?php
$path_parts = pathinfo( basename( $_FILES["photo"]["name"]));
	echo basename( $_FILES["photo"]["name"], "jpg")."</br>";
	echo basename( $_FILES["photo"]["name"], ".jpg")."</br>";

	echo $_FILES["photo"]["name"]."</br>";
?>
<!-- <p><img src="photos/<?php echo $_FILES["photo"]["name"] ?>" alt="Photo"/></p> -->
<?php
}
?>
</body>
</html>