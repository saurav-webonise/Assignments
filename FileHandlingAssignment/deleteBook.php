<?php 
	session_start();
	include 'config.php';
	$bookName=$_POST['bookName'];
	$myBook = $bookName.'.txt';
	unlink($myBook);
	$sql = "DELETE FROM books_details WHERE bookName = '".$bookName."'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	@header("Location:homePage.php");
?>
