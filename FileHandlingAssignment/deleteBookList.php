<!DOCTYPE html>
<html>
<head>
	<title>Books list To Delete</title>
</head>
<body>
	<h1>Welcome : 
	<?php
		 include 'config.php';
		 session_start(); echo "".$_SESSION['userName'];
	?>
	</h1>
	<hr>
	<h2>
	<form name="bookList" method="POST" action="deleteBook.php">
	<?php 
			$sqlQuery= "SELECT bookName FROM books_details WHERE user_name = '".$_SESSION['userName']."'"; 
			$stmt = $conn->prepare($sqlQuery);
			$stmt->execute();
			$result = $stmt->fetchAll();
			foreach($result as $row)
			{
    			echo "<input type='submit' name='bookName' value='{$row['book_name']}'</><br/><br/>";
			}
	?>
	</form>
</body>
</html>
