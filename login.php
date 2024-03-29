<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha3849gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
   <script src="verify.js"></script>
<style type="text/css">
body{
  background: url("images/bg3.jpg");
  background-size: 105%;
  background-position: 50% 40%;
  background-repeat: no-repeat;
  color:white;
}
.box{
  margin-left: auto;
  margin-right: auto;
  border-radius: 7%;
  padding:22px;
  background: #67b1c9de;
  color: #f8f8f7;
}
#submit{
  padding: 0.375rem 3.75rem;
}

</style>
</head>
<body>
<div class="container" style="margin-top:30px">
  <div class="row col-10" style="padding-left: 0px;">
    <div class="col-sm-3">
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {                               //#1
     require('process-login.php');
    } 
    ?>
     </div>

    <div class="col-sm-7 mx-auto">
      <h2 class="h2 text-center" style="color:#f77623">Login</h2>
      <div class="box">
        <form action="login.php" method="post" name="loginform" id="loginform">
         
         <!--  <div class="form-group row collapse" id="username-login">
            <label for="username" class="col-sm-3 col-form-label">Username:</label>
            <div class="col-sm-8" >
              <input type="text" class="form-control" id="username" name="username"
                  placeholder="username" maxlength="30" required
                  value="<?php if (isset($_POST['username'])) echo $_POST['username']; ?>" >
                  <a href='#' id="email-login-btn" onclick="emailLogin()">or login by email</a>
            </div>
           
          </div> -->
          <div class="form-group row " id="email-login">
            <label for="email" class="col-sm-3 col-form-label">Email:</label>
            <div class="col-sm-8 ">
              <input type="text" class="form-control" id="email" name="email"
                  placeholder="email" maxlength="30" required
                  value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" >
                  <!-- <a href='#' >or login by Username</a> -->
            </div>
          </div>

          <div class="form-group row">
            <label for="password" class="col-sm-3 col-form-label">Password:</label>
            <div class="col-sm-8">
              <input type="password" class="form-control" id="password" name="password" placeholder="Password" maxlength="40" required
                  value=
                   "<?php if (isset($_POST['password'])) echo $_POST['password']; ?>">
                  <span>Between 8 and 12 characters.</span>
            </div>
          </div>
          <div class="form-group row">
              <div class="col-sx-2 mx-auto">
                  <input id="submit" class="btn btn-primary" type="submit" name="submit"
                  value="Login">
              </div>
          </div>
           <p class='text-center'><a href="forgot-password.php" style="color:#004590">Forgot password?</a></p>
          <p class='text-center'>Don't have an account?<a href="register.php" style="color:#004590"> Sign up</a></p>
        </form>
      </div>

    </div>

</div>

    <?php include ("myInfo.php")  ?>
<script type="text/javascript">
// function emailLogin(){
//   document.querySelector("#email-login").classList.remove("collapse");
//   document.querySelector("#username-login").classList.add("collapse");
// }
// function usernameLogin(){
//   document.querySelector("#username-login").classList.remove("collapse");
//   document.querySelector("#email-login").classList.add("collapse");;
// }

</script>
</body>
</html>
