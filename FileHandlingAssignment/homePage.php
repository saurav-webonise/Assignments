<!DOCTYPE html>
<html>
<head>
	<title>User Books</title>
</head>
<body>
	<h1>Welcome : <?php include 'config.php';  session_start(); echo "".$_SESSION['userName'];?></h1>
	<hr>
	<form align="right" method="POST" action="logOut.php"><input type="submit" name="logOut" value="Log Out!!!"></form>
	
	<h2>Your Books : 
		<?php  
			$sqlQuery= "SELECT bookName FROM booksDetails WHERE userName = '".$_SESSION['userName']."'"; 
			$stmt = $conn->prepare($sqlQuery);
			$stmt->execute();
			$result = $stmt->fetchAll();
			foreach($result as $row)
			{
    			echo "<li>{$row['bookName']}</li>";
			}
		?>
	</h2>
	<form>
		<input type="button" name="addBook" value="Write New Book" onclick="document.location.href='writeBook.php'">
		<br><br>
		<input type="button" name="editBook" value="Edit your Book" onclick="document.location.href='editBookList.php'">
		<br><br>
		<input type="button" name="deleteBook" value="Delete a Book" onclick="document.location.href='deleteBookList.php'">
	</form>
</body>
</html>