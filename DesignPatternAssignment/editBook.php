<!DOCTYPE html>
<html>
<head>
	<title>Edit Your Book</title>
</head>
<body>
	<h1>Welcome : 
	<?php 
		include 'PostgresConnection.php';  
		session_start(); 
		echo "" . $_SESSION['userName'];
	?></h1>
	<hr>
	<form name="editBook" method="POST" action="editBook.php">
	<?php 
		if(isset($_POST['btnSaveBook'])){
			@header("Location:homePage.php");
		}
		try{
			$postgresConn = new PostgresConnection;
			$conn = $postgresConn->connect();
			$bookName = $_POST['bookName'];
			$myBook = $bookName . '.txt';
			$book = fopen($myBook, 'a+');
			$bookContent = file_get_contents($bookName.'.txt');
			echo "Book Name : " . $myBook;
			echo "<br><textarea name='txtAreaBook' id='txtAreaBook' rows='30' cols='100' >" . $bookContent . "</textarea><br>";
			fwrite($book, $bookContent);
			echo "<input type='submit' name='btnSaveBook' value='Save Book'>";
		}catch (Exception $e) {
    			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
	?>
</form>
</body>
</html>
