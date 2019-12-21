<?php
try 
{
	$errors = array(); 
	
	// Check for a username name:                        
    $username = filter_var( $_POST['username'], FILTER_SANITIZE_STRING);	
	if (empty($username)) {
		$errors[] = 'You forgot to enter username.';
	}
	// Check for an email address:
	$email = filter_var( $_POST['email'], FILTER_SANITIZE_EMAIL);	
	if ((empty($email)) || (!filter_var($email, FILTER_VALIDATE_EMAIL))) {
		$errors[] = 'You forgot to enter your email address';
		$errors[] = ' or the e-mail format is incorrect.';
	}
	// Check for a password and match against the confirmed password:
	$password1 = filter_var( $_POST['password1'], FILTER_SANITIZE_STRING);
	$password2 = filter_var( $_POST['password2'], FILTER_SANITIZE_STRING);
	if (!empty($password1)) {
		if ($password1 !== $password2) { 
			$errors[] = 'Your two password did not match.';
		} 
	} else {
		$errors[] = 'You forgot to enter your password(s).';
	}

	include ('mysqli_connect.php'); // Connect to the db.     
	$query = "SELECT username, email FROM users";
	$result = mysqli_query($dbcon, $query);
    if (mysqli_num_rows($result) > 0) {
	    while( $row = mysqli_fetch_assoc($result) ){
	    	if($row['email'] == $email){
	    		$errors[] = "email $email is already registered";
	    	}
	    	if($row['username'] == $username){
	    		$errors[] = "Username $username already exists. Try another one.";
	    	}
	    }  
	}

	if (empty($errors)) { // If everything's OK.              
	    $hashed_passcode = password_hash($password1, PASSWORD_DEFAULT); 
		
		$query = "INSERT INTO users (id, username, email, password, registration_date) ";
		$query .="VALUES(' ', ?, ?, ?, NOW() )";		                
        $q = mysqli_stmt_init($dbcon);                                  
        mysqli_stmt_prepare($q, $query);
        mysqli_stmt_bind_param($q, 'sss', $username, $email, $hashed_passcode);
        mysqli_stmt_execute($q);

        if (mysqli_stmt_affected_rows($q) == 1) {	// One record inserted			
			header ("location: login.php"); 
			exit();
		} else { // If it did not run OK.
  		    mysqli_close($dbcon); // Close the database connection.
		    
		    $errorstring = "<p class='text-center' style='color:red'>";
			$errorstring .= "System Error<br />You could not be registered due ";
			$errorstring .= "to a system error. We apologize for any inconvenience.</p>"; 
			echo "<p class=' text-center' style='color:red'>$errorstring</p>";
  		
		// exit();
		}
	} else { // Report the errors.                             
			$errorstring = "Error! <br /> The following error(s) occurred:<br>";
			foreach ($errors as $msg) { // Print each error.
				$errorstring .= " - $msg<br>";
			}
			$errorstring .= "Please try again.<br>";
			echo "<p class=' text-center ' style='color:red'>$errorstring</p>";
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
?>