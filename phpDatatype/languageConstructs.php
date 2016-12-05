<?php
	$a="";
	print("In Print ".$a);
	echo "<br/>IsSet : ".isset($a);
	echo "<br/>Empty : ".empty($a);
	echo "<br/>Before Unset : ".$a;
	unset($a);
	echo "<br/>After Unset : ".$a;
?>
