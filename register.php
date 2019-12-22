<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
     <link rel="stylesheet" type="text/css" href="styles/settings.css">
</head>
<body>
<div class="container" style="margin-top:30px">

<div class="row " style="padding-left: 0px;">
<!--  <div class="col-sm-4">
 


  </div> 
 -->
<div class="col-sm-6 mx-auto" >

<h2 class="h2 text-center">Register</h2>
<div class="box">
  <form action="register.php" method="post" name="regform" id="regform">
    <div class="form-group row">
      <label for="username" class="col-sm-4 col-form-label">Username:</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="username" name="username" 
  	  placeholder="username" maxlength="30" required>
      </div>
    </div>
    <div class="form-group row">
      <label for="email" class="col-sm-4 col-form-label">E-mail:</label>
      <div class="col-sm-6">
        <input type="email" class="form-control" id="email" name="email" 
  	  placeholder="E-mail" maxlength="60" required>
      </div>
    </div>
    <div class="form-group row">
      <label for="password1" class="col-sm-4 col-form-label">Password:</label>
      <div class="col-sm-6">
        <input type="password" class="form-control" id="password1" name="password1" 
  	  placeholder="Password" minlength="8" maxlength="12" required>
  	  <span id='message'>Between 8 and 12 characters.</span>
      </div>
    </div>
    <div class="form-group row">
      <label for="password2" class="col-sm-4 col-form-label">Confirm Password:</label>
      <div class="col-sm-6">
        <input type="password" class="form-control" id="password2" name="password2" 
  	  placeholder="Confirm Password" minlength="8" maxlength="12" required>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-4 mx-auto" >
        <input id="submit" class="btn btn-primary" type="submit" name="submit" value="Register">
      </div>
    </div>
      <span id="message"><?php if ($_SERVER['REQUEST_METHOD'] == 'POST') {require('process-register.php');}?></span>
      <p class="col-sm-7 mx-auto">Already have an account?  <a href="login.php">Sign in</a></p>
  </form>
</div> <!-- end .box -->

</div>

</div>
</div>
<?php include ("myInfo.php")  ?>
</body>
</html>
