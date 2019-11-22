<?php
// current()
// key()
// next()
// prev()
// end()
// reset()
$myArr = ['a','b','c' ];
reset($myArr);
while(next($myArr) ){
	echo current($myArr);
}
reset($myArr);

//substr_replace()
$str = "i love fruits! I love vegetables!";
$healthy = array("fruits","vegetables");
$unhealthy = array("burgers","pizza");

// $pos = strpos($str, "bananas");
// echo "<br/>";
// echo "Pos $pos";
echo "<br/>";
echo $d =  ucwords(str_replace($healthy, $unhealthy, $str) );
echo "<br/>";
echo "word count: ".substr_count(strtolower($d), "pizza" );
echo "<br/>";
echo $_SERVER['PHP_SELF'];
echo "<br/>";
echo $_SERVER['HTTP_HOST'];
echo "<br/>";

echo "<p>lorem	ipsum with harani mulk co hregy fine lokky be </p>";

echo "<p>lorem	ipsum with harani mulk co hregy fine lokky be </p>";
$myBook = array( "title" => "The Grapes of Wrath",
		  "author" => "John Steinbeck",
		   "pubYear" => 1939 );
foreach ( $myBook as $key => $value ) {
echo " <dt> $key </dt> ";
echo " <dd> $value </dd> ";
}
$fruitString = "apple,pear,banana,strawberry,peach";
$fruitArray = explode( ",", $fruitString);
$fruitsr = implode("<br/>", $fruitArray);
// print_r($fruitArray);
echo $fruitsr;

?>
