<!DOCTYPE html>
<html>
<head>
	<title>Edit Your Book</title>
</head>
<body>
	<h1>Welcome : 
	<?php 
		include 'config.php';  
		session_start(); 
		echo "".$_SESSION['userName'];
	?></h1>
	<hr>
	<form name="editBook" method="POST" action="editBook.php">
	<?php 
		if(isset($_POST['btnSaveBook'])){
			@header("Location:homePage.php");
		}
		if(!$conn)
		{
			die("Connection Failed");
		}
		else
		{
			$bookName=$_POST['bookName'];
			$myBook = $bookName.'.txt';
			$book = fopen($myBook, 'a');
			$bookContent=file_get_contents($bookName.'.txt');
			echo "<textarea name='txtAreaBook' id='txtAreaBook' rows='30' cols='100' >".$bookContent."</textarea><br>";
			fwrite($book, $bookContent);
			echo "<input type='submit' name='btnSaveBook' value='Save Book'>";
		}
		
	?>
</form>
</body>
</html>