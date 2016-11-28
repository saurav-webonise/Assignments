<!DOCTYPE html>
<html>
<head>
	<title>Books list To Edit</title>
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
	<form name="bookList" method="POST" action="editBook.php">
	<?php 
			$sqlQuery= "SELECT bookName FROM books_details WHERE userName = '".$_SESSION['userName']."'"; 
			$stmt = $conn->prepare($sqlQuery);
			$stmt->execute();
			$result = $stmt->fetchAll();
			foreach($result as $row)
			{
    			echo "<input type='submit' name='bookName' value='{$row['bookName']}'</><br/><br/>";
			}
	?>
	</form>
</body>
</html>
