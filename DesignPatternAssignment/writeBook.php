<!DOCTYPE html>
<html>
<head>
	<title>Write New Book</title>
</head>
<body>
	<h1>Welcome : 
	<?php
		 session_start(); 
		 echo "" . $_SESSION['userName'];
	?>
	</h1>
	<hr>
	<form name="frmCreateBook" method="POST" action="createBook.php">
		Book Name : <br>
		<input type="text" name="txtBookName" id="txtBookName"><br>
		Book Description : <br>
		<textarea name="txtAreaBookDesc" id="txtAreaBookDesc" rows="5" cols="100" ></textarea><br>
		Start Writing : <br>
		<textarea name="txtAreaBookContent" id="txtAreaBookContent" rows="30" cols="100" ></textarea><br>
		Book Price : <br>
		<input type="text" name="txtBookPrice" id="txtBookPrice"><br><br>
		<input type="submit" name="btnSaveBook" value="Save Book">
	</form>
</body>
</html>
