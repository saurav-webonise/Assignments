<?php
	function uniqueThenReverse($originalString)
	{
		$reverseString=strrev($originalString);
		$stringToArray=str_split($reverseString);
		$uniqueString=array_unique($stringToArray);
		$uniqueThenReverse=implode('',$uniqueString);
		echo "<br/>Unique And Reversed String : ".$uniqueThenReverse;
	}
	$originalString="aabdceaaabbbcd";
	echo "Original String : ".$originalString;
	uniqueThenReverse($originalString);
?>