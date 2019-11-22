
<?php
//Task 1
echo "<style>";


echo "</style>";
echo "<div>";
echo "<h2>Task 1</h2>";
$x = 80;
$y = 20;
echo "<p>The multiplication of ".$x." and ".$y." is ".$x*$y."</p>";
echo "<p>The division of ".$x." and ".$y." results ".$x/$y."</p>";
echo "<p>The remainder of ".$x." after division by ".$y." is " .$x%$y."</p>";
echo "<p>When ".$y." reduced from ".$x." the results is ".($x-$y)."</p>";
echo "<p>When we add ".$x." to ".$y." the results is ".($y+$x)."</p>";
echo "</div>";
//Task 2
echo "<div>";
echo "<hr><h2>Task 2</h2>";
$word = "rad";
echo $word."</br>";
echo ($word == rev($word)) ? "Yes, a palindrome.</br>" : "No, not palindrome</br>";

function rev($str){
	$rw = '';
	$c = 0;
	for($i = strlen($str)-1; $i >= 0; $i--){
 		$rw[$c] = $str[$i];
 		$c++;
	}
	return $rw;
}
echo "</div>";

//Task3
echo "<div>";
echo "<hr><h2>Task 3</h2>";
$x = 2;
$exp = 10;
echo "</br>The power of {$x}s";
for($i=0;$i<=$exp;$i++){
	echo "<p>" . $x."<sup>".$i."</sup> = " .pow($x, $i). "</p>";	
}
echo "</div>";

//Task 4
echo "<div>";
echo "<hr><h2>Task 4</h2>";
$txt= "He opened the file and saw that there were only thirty visible light images and twelve radar images of Deimos";
$str= "images";
$rplc= "problems";
$numofchars=10;
$occur="f";

echo '<p>The text includes "' . countVowels($txt) .'" vowels.</p>';
echo '<p>The text is formed from “'.str_word_count($txt).'" words.</p>';
echo str_replace($str, $rplc, $txt);

echo "<p>The first $numofchars of a string are: \"".substr($txt, 0, $numofchars)."\"";
echo "<p>The Last $numofchars of a string are: \"".substr($txt,-$numofchars)."\"";
echo "<p>The first occurance of '$occur' is ". strpos($txt, $occur, 0). " character</p>";
echo strtoupper($txt);
function countVowels($str){
	$num_vowels = 0;
	for($i=0; $i<strlen($str); $i++){
		switch($str[$i]){
			case 'A':
			case 'a':
			case 'E':
			case 'e':
			case 'I':
			case 'i':
			case 'O':
			case 'o':
			case 'U':
			case 'u':
			case 'Y':
			case 'Y':
				$num_vowels++;
			break;
		}
	}	
	return $num_vowels;
}

echo "</div>";



?>