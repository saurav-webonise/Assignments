<?php 
	session_start();
	include 'PostgresConnection.php';  
	try{
		$postgresConn=new PostgresConnection;
		$conn=$postgresConn->connect();$bookName=$_POST['bookName'];
		$myBook = $bookName.'.txt';
		unlink($myBook);
		$sql = "DELETE FROM book_details WHERE book_name = '".$bookName."'";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		@header("Location:homePage.php");
	}catch (Exception $e) {
    	echo 'Caught exception: ',  $e->getMessage(), "\n";
	}
?>