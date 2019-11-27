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
    	case 'rock': $this->themeColor = 'blue';
    	break;
    	case 'paper': $this->themeColor = 'red';
    	break;
    	case 'scissors': $this->themeColor = 'green';
    	break;
    }

  }

}


 ?>