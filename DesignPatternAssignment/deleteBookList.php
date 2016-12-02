<!DOCTYPE html>
<html>
<head>
	<title>Books list To Delete</title>
</head>
<body>
	<h1>Welcome : 
	<?php
		 include 'PostgresConnection.php';  
		 session_start(); 
		 echo "".$_SESSION['userName'];
	?>
	</h1>
	<hr>
	<h2>
	<form name="bookList" method="POST" action="deleteBook.php">
	<?php 
		try{
			$postgresConn=new PostgresConnection;
			$conn=$postgresConn->connect();
			$sqlQuery= "SELECT book_name FROM book_details WHERE user_name = '".$_SESSION['userName']."'"; 
			$stmt = $conn->prepare($sqlQuery);
			$stmt->execute();
			$result = $stmt->fetchAll();
			foreach($result as $row)
			{
				$bookName=trim($row['book_name']);
    			echo "<input type='submit' name='bookName' value='".$bookName."'</><br/><br/>";
			}
		}catch (Exception $e) {
    		echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
	?>
	</form>
</body>
</html>