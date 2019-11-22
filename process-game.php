<?php 
session_start();
$_SESSION['current_user'];

include("mysqli_connect.php");

if(isset($_POST['processGame'])|| isset($_GET['uc'])  ){ //uc = user choice

	// $userChoice = $_POST['choice'];
	$userChoice = $_GET['uc'];
	$options = ['rock','scissors','paper'];
	$randNum = rand(0,2);
	$compChoice = $options[$randNum];
	// echo "<p>Your choice is $userChoice</p>";
	// echo "<p>Bot's choice is ".$compChoice."</p><br/>";

	$userWon = false;
	if($userChoice===$compChoice){
		unset($userWon);  // unset boolean in case of DRAW
	}else{
		if($userChoice === 'rock'){
			if($compChoice === 'scissors')
				$userWon = true;
		}
		else if($userChoice === 'paper'){
			if($compChoice === 'rock')
				$userWon = true;
		}
		else if($userChoice === 'scissors'){
			if($compChoice === 'paper')
				$userWon = true;
		}		
	}

	if(isset($userWon)){
		//user WINS
		if($userWon){
			$query = "UPDATE users set credits = credits + 1 where id = ".$_SESSION['current_user'];
			$message = "<p style='display:inline-block'>Congrats, You Won!</p><h2> +1xp </h2>";
			$sign = "<span style='margin-top: auto;margin-bottom: auto;flex: 1;font-size: 115px;'> > </span>";
		}
		//user LOSES
		elseif(!$userWon){
			$query = "UPDATE users set credits = credits - 1 where id = ". $_SESSION['current_user'];
			$message = "<p style='display:inline-block'>Sorry, but you lost this time :( </p><h2> -1xp </h2>";
			$sign = "<span style='margin-top: auto;margin-bottom: auto;flex: 1;font-size: 115px;'> < </span>";
		}
		$q = mysqli_stmt_init($dbcon);                                                //#9
	    mysqli_stmt_prepare($q, $query);
	    mysqli_stmt_execute($q);    
	    mysqli_stmt_affected_rows($q);
	}
	// A DRAW
	elseif(!isset($userWon)){
		$message = "<p style='display:inline-block'>Draw, at least not a loose</p><h2> +0xp </h2>";
		$sign = "<span style='margin-top: auto;margin-bottom: auto;flex: 1;font-size: 115px'> = </span>";
	}


 // <div class='name-indicator' style='float:left'>
 //      <p>Dovud</p>
 //      <div class='icon-holder-small' style='background:url(\'images/rock.png\');float:left'></div>
 //    </div>

 //    <div class='name-indicator' style='float:right'>
 //      <p>Bot</p>
 //      <div class='icon-holder-small' style='background:url(\'images/paper.png\');float:right'></div>
 //    </div>

    $output = "<div class='name-indicator' style='float:left'>";
    $output .= "<p>User</p>";
	$output .= "<div class='icon-holder-small' style='background:url(\"images/".$userChoice.".png\");'> </div> </div>";
	$output .= $sign;

	$output .= "<div class='name-indicator' style='float:right'>"; 
	$output .= "<p>Bot</p>";
	$output .= "<div class='icon-holder-small' style='background:url(\"images/".$compChoice.".png\");'></div> </div>";
	$output .= $message;

	$output .= "<button id='closeModal_btn' style='position: absolute;bottom: 0;margin-left: 41%;margin-right: 50%;' >OK</button>";
	echo $output;
	
}
else{
	echo "Error!";
}

?>