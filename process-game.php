<?php 
session_start();
$_SESSION['current_user'];
$_SESSION['user_name'];

include("mysqli_connect.php");
include("choices_class.php");

if(isset($_POST['processGame']) || isset($_GET['uc']) ){ //uc = user choice
	
	$userChoice = $_GET['uc'];
	$options = ['rock','scissors','paper'];
	$randNum = rand(0,2);
	$compChoice = $options[$randNum];

	$message;
	$messageColor;	
	
	$xp = 2; //set xp to earn or lose 

//-------------T_E_S_T__S_E_C_T_I_O_N__start-------------------
	$uc_test = new Choices();
	$uc_test->set_choice($_GET['uc']);

	$botch_test = new Choices();
	$botch_test->set_choice($compChoice);

//-------------T_E_S_T__S_E_C_T_I_O_N__end-------------------

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
			$query = "UPDATE users set wins = wins + 1, credits = credits +".$xp." where id = ".$_SESSION['current_user'];
			$sign = "<span style='margin-top: auto;margin-bottom: auto;flex: 1;font-size: 115px;'> > </span>";
			$message = "<tr><td><h2> +".$xp."xp</h2></td></tr>";
			$message .="<tr><td><h2> You Won! </h2></td></tr>";
			$messageColor = '#03b300';

			$themeColor = $uc_test->themeColor; //test beta ----------------
		}
		//user LOSES
		elseif(!$userWon){
			$query = "UPDATE users set loses = loses + 1, credits = credits -".$xp." where id = ". $_SESSION['current_user'];
			$sign = "<span style='margin-top: auto;margin-bottom: auto;flex: 1;font-size: 115px;'> < </span>";
			$message = "<tr><td><h2> -".$xp."xp</h2></td></tr>";
			$message .= "<tr><td><h2> You Lost </h2></td></tr>";
			$messageColor = '#f90000';

			$themeColor = $botch_test->themeColor; //test beta ----------------
		}
		$q = mysqli_stmt_init($dbcon);                                                //#9
	    mysqli_stmt_prepare($q, $query);
	    mysqli_stmt_execute($q);    
	    mysqli_stmt_affected_rows($q);
	}
	// A DRAW
	elseif(!isset($userWon)){
		$sign = "<span style='margin-top: auto;margin-bottom: auto;flex: 1;font-size: 115px'> = </span>";
		$message = "<tr><td><h2> +0xp </h2></td></tr>";
		$message .= "<tr><td><h2> Draw </h2></td></tr>";
		$messageColor = 'black';

		$themeColor = "black";//test beta ----------------
	}

    $output = "<div class='name-indicator' style='float:left'>";
    $output .= "<p>".$_SESSION['user_name']."</p>";
	$output .= "<div class='icon-holder-small' themecolor='".$themeColor."' style='background:url(\"images/".$userChoice.".png\");'> </div> </div>";
	$output .= $sign;

	$output .= "<div class='name-indicator' style='float:right'>"; 
	$output .= "<p>Bot</p>";
	$output .= "<div class='icon-holder-small' style='background:url(\"images/".$compChoice.".png\");'></div> </div>";
	// $output .= $message;
	$output .= "<table style='text-align:center; color:".$messageColor." '>".$message."</table>";

	$output .= "<input type='button' id='closeModal_btn' class='btn btn-primary btn-lg' style='position: absolute;bottom: 0;' value='OK'>";
	 
			                                        // 
			                                        // padding: 10px 30px;
			                                        // color:white;
			                                        // background-color: #19aba0'
	echo $output;
	
}
else{
	echo "Error!";
}

?>