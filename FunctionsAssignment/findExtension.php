<?php
	function findExtensionWithoutFunction($fileName)
	{
		$ext = end(explode('.', $fileName));
		echo "<br/>Without Function : ".$ext;
	}
	function findExtensionWithFunction($fileName)
	{
		$ext = pathinfo($fileName, PATHINFO_EXTENSION);
		echo "<br/>With Function : ".$ext;
	}
	$fileName="Mypage.php.js";
	echo "File Name : ".$fileName;
	findExtensionWithoutFunction($fileName);
	findExtensionWithFunction($fileName);
?>