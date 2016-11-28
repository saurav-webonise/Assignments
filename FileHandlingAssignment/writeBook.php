<!DOCTYPE html>
<html>
<head>
	<title>Write New Book</title>
</head>
<body>
	<h1>Welcome : 
	<?php
		 include 'config.php';
		 session_start(); echo "".$_SESSION['userName'];
	?>
	</h1>
	<hr>
	<form name="frmCreateBook" method="POST" action="createBook.php">
		Book Name : <br>
		<input type="text" id="txtBookName" name="txtBookName" required><br><br>
		Start Writing : <br>
		<textarea name="txtAreaBook" id="txtAreaBook" rows="30" cols="100" ></textarea><br>
		<input type="submit" name="btnSaveBook" value="Save Book">
	</form>
</body>
</html>
