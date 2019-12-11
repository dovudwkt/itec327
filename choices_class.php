<?php 
$myCh = 'paper';

class Choices {
  public $userChoice;
  public $themeColor;

  function set_choice($choice) {
    $this->userChoice = $choice;
    $this->setThemeColor();
  }
  function setThemeColor(){
  	 switch($this->userChoice){
    	case 'rock': $this->themeColor = '#19aba0';
    	break;
    	case 'paper': $this->themeColor = '#e2122c';
    	break;
    	case 'scissors': $this->themeColor = '#b3cc33';
    	break;
    }

  }

}


 ?>