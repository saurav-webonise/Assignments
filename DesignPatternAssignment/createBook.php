<?php
	include 'PostgresConnection.php';
	session_start();
	try{
		$postgresConn=new PostgresConnection;
		$conn=$postgresConn->connect();
		$bookName=$_POST['txtBookName'];
		$bookDescription=$_POST['txtAreaBookDesc'];
		$bookContents=$_POST['txtAreaBookContent'];
		$bookPrice=$_POST['txtBookPrice'];
		$myBook = fopen($bookName.".txt", "w");
		fwrite($myBook, $bookContents);
		$sql = "INSERT INTO book_details VALUES ('" . $bookName . "', '" . $_SESSION['userName'] . "','". $bookDescription . "','" . $bookPrice . "')";
    	$conn->exec($sql);
    	@header("Location:homePage.php");
	}catch (Exception $e) {
    	echo 'Caught exception: ',  $e->getMessage(), "\n";
	}

	
?>