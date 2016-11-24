<?php
	function getExtensionWithoutFunction($fileName)
	{
		$ext = end(explode('.', $fileName));
		echo "Without Function : ".$ext;
	}
	function getExtensionWithFunction($fileName)
	{
		$ext = pathinfo($fileName, PATHINFO_EXTENSION);
		echo "<br/>With Function : ".$ext;
	}
	$fileName="Mypage.html";
	getExtensionWithoutFunction($fileName);
	getExtensionWithFunction($fileName);
?>