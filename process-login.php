<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  try{
    require ('mysqli_connect.php');    
  // Validate the email address
  // Check for an email address:
    $username = filter_var( $_POST['email'], FILTER_SANITIZE_EMAIL);
    if((empty($username)) || (!filter_var($username, FILTER_VALIDATE_EMAIL))) {
        $errors[] = 'You forgot to enter your email address';
        $errors[] = ' or the e-mail format is incorrect.';
    }
    // Validate the password
    $password = filter_var( $_POST['password'], FILTER_SANITIZE_STRING);
    if(empty($password)) {
        $errors[] = 'You forgot to enter your password.';
    }

    if (empty($errors)) 
    { // If everything's OK.                             
      $query = "SELECT id, password, username FROM users WHERE email=?";
      $q = mysqli_stmt_init($dbcon);
      mysqli_stmt_prepare($q, $query);
      mysqli_stmt_bind_param($q, "s", $username);
      mysqli_stmt_execute($q);
      $result = mysqli_stmt_get_result($q);
      $row = mysqli_fetch_array($result, MYSQLI_NUM);  
      // $rowAssoc = mysqli_fetch_array($result, MYSQLI_ASSOC);
      if (mysqli_num_rows($result) == 1) 
      {
          if (password_verify($password, $row[1])) 
          {                         
              session_start();
              $_SESSION['current_user'] =  $row[0];
              $_SESSION['user_name'] =  $row[2];

              $url = "index.php";   
              header('Location: ' . $url);
          }
          else 
          { // No password match was made.                              
              $errors[] = 'E-mail/Password entered does not match our records. ';
              $errors[] = 'Perhaps you need to register, just click the Sugh Up button';
          }
      } 
      else 
      { // No e-mail match was made.
          $errors[] = 'E-mail/Password entered does not match our records. ';
          $errors[] = 'Perhaps you need to register,just click the Sugh Up button';
      }

        mysqli_stmt_free_result($q);
        mysqli_stmt_close($q);
    }

    if (!empty($errors)) 
    {
      $errorstring = "Error! <br /> The following error(s) occurred:<br>";
        foreach ($errors as $msg) { // Print each error.
          $errorstring .= " $msg<br>\n";
        }
      $errorstring .= "Please try again.<br>";
      echo "<p class=' text-center' style='color:red'>$errorstring</p>";
    }
        
  }
  catch(Exception $e) 
  {
    print "The system is busy please try later";
  }
  catch(Error $e)
  {
    print "The system is busy please try again later.";
  }
} 

?>