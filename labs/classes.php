<?php
class MyClass{
	protected function myFunc() { 
		echo "MyClass::myFunc()</br>"; 
	}
	public function callf(){
		myFunc();
	}
}
class OtherClass extends MyClass{
// Override parent's definition 
	public function myFunc(){
	// But still call the parent function
		// parent::myFunc(); 
		echo "OtherClass::myFunc()</br>";
		// parent::myFunc(); 
	}
}
$class = new OtherClass();
$class2 = new MyClass();

$class->myFunc();
$class2->callf();
?>


