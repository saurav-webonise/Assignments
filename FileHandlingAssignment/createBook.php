<?php
	include 'config.php';
	session_start();
	if(!$conn)
	{
		die("Connection Failed");
	}
	else
	{
		$bookName=$_POST['txtBookName'];
		$bookContents=$_POST['txtAreaBook'];
		$myBook = fopen($bookName.".txt", "w");
		fwrite($myBook, $bookContents);
		$sql = "INSERT INTO books_details VALUES ('".$bookName."', '".$_SESSION['userName'].	"')";
    	$conn->exec($sql);
    	@header("Location:homePage.php");
	}
	
?>
