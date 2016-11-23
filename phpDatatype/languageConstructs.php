<?php
	$a="";
	print("In Print ".$a);
	echo "<br/>IsSet : ".isset($a);
	echo "<br/>Empty : ".empty($a);
//	var_dump(include("untitled.php"));
//	var_dump(require("untitled.php")) ;
	echo "<br/>Before Unset : ".$a;
	unset($a);
	echo "<br/>After Unset : ".$a;
?>