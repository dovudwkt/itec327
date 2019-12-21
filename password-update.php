<?php 
if(isset($_POST['updt_pswd'])){

	// $username = $_POST['username'];
	$email = $_POST['email'];
	$old_pswd = $_POST['old_password'];
	$new_pswd = $_POST['new_password'];

	$hashed_passcode = password_hash($new_pswd, PASSWORD_DEFAULT); 

	include("mysqli_connect.php");

 	$query = "SELECT password, username FROM users WHERE email = ?";
    $q = mysqli_stmt_init($dbcon);
	mysqli_stmt_prepare($q, $query);
	mysqli_stmt_bind_param($q, "s", $email);
	mysqli_stmt_execute($q);
	$result = mysqli_stmt_get_result($q);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC) ;
	
	if($result){
		if (mysqli_num_rows($result) == 1) 
		{
			if (password_verify($old_pswd, $row['password']) ) 
			{          
				$query = "UPDATE users SET password = '".$hashed_passcode."' WHERE email = '".$email."'";
				mysqli_query($dbcon, $query);
				if(mysqli_affected_rows($dbcon) == 1){
					echo "Password has been udpdated";		
					header("Location: login.php");
				}
				else{
					$errMsg = "<p class='text-center'>Password could not be udpdated, try again</p> <br/>";
				}
			
			}else{
				$errMsg = "<p class='text-center'>Current password does not match, try again</p> <br/>";	
			}
		}
		else{
		$errMsg = "<p class='text-center'>No user with email '".$email."', try again </p> <br/>";
		}
	}

	mysqli_close($dbcon);

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Template for an interactive web page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" 
  href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" 
  integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" 
  crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="styles/settings.css">
</head>
<body>
<p class="btn btn-primary" ><a href="index.php" style='color:white'>Home</a></p>
<div class="container" style="margin-top:30px">
<!-- <div class="row" style="padding-left: 0px;"> -->
<div class="row" style="padding-left: 0px;">

<div class="col-sm-6 mx-auto" >

<h2 class="h2 text-center">Update Password</h2>
<div class="box">
	<?php if(isset($errMsg)) echo $errMsg; ?>
  <form action="password-update.php" method="post" name="regform" id="regform">
    <div class="form-group row">
      <label for="email" class="col-sm-4 col-form-label">E-mail:</label>
      <div class="col-sm-6">
        <input type="email" class="form-control" id="email" name="email" 
      placeholder="E-mail" maxlength="60" required value="<?php if(isset($email))echo $email ?>">
      </div>
    </div>
    <div class="form-group row">
      <label for="old_password" class="col-sm-4 col-form-label">Current Password:</label>
      <div class="col-sm-6">
        <input type="password" class="form-control" name="old_password" 
      placeholder="Current Password" minlength="8" maxlength="20" required>
      <span id='message'>Between 8 and 12 characters.</span>
      </div>
    </div>
    <div class="form-group row">
      <label for="new_password" class="col-sm-4 col-form-label">New Password:</label>
      <div class="col-sm-6">
         <input type="password" class="form-control" name="new_password" 
      placeholder="New Password" minlength="8" maxlength="20" required>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-4 mx-auto" >
      	<input id="" class="btn btn-primary" type="submit" name="updt_pswd" value="Update Password">
      </div>
    </div>
  </form>
</div> <!-- end .box -->

</div>

</div>
</body>
</html>
