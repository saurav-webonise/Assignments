<!DOCTYPE html>
<html>
<head>
	<title>User Books</title>
</head>
<body>
	<h1>Welcome :  	<?php 
				include 'PostgresConnection.php';
				session_start(); 
				if(isset($_SESSION["userName"])){
					echo "" . $_SESSION['userName'];
				}else{
					@header("Location:userLogin.php");
				}
			?>
	</h1>
	<hr>
	<form align="right" method="POST" action="homePageFunctions.php"><input type="submit" name="logOut" id="logOut" value="Log Out!!!"></form>
	<h2>Your Books :</h2><b> 
	<?php 
		try{
			function convertedPrice($price){
				require_once 'Dollar.php';
				require_once 'Pound.php';
				require_once 'PriceConverter.php';
				$priceConverter = new PriceConverter;
				$pound = new Pound($price);
				$dollar = new Dollar($price);
				$priceConverter->addCurrency($pound);
				$priceConverter->addCurrency($dollar);
				$priceConverter->findCurrency();
			} 
			$postgresConn = new PostgresConnection;
			$conn = $postgresConn->connect();
			$sqlQuery = "SELECT book_name,book_description,book_price FROM book_details WHERE \"user_name\" = '".$_SESSION['userName']."'"; 
			$stmt = $conn->prepare($sqlQuery);
			$stmt->execute();
			$results = $stmt->fetchAll();
			foreach($results as $result){
				$price=$result['book_price'];
	    			echo "<u>Book Name</u> : <br>{$result['book_name']}<br>
	    				  <u>Book Description</u> : <br>{$result['book_description']}<br>
	    				  <u>Book Price In Rupees :  &#8377; {$result['book_price']}";
	    			convertedPrice($price);
	    			echo "</u><br><input type='button' value='Add To Cart' name='addToCart' id='addToCart'> <br><br>";	  
			}	
		}catch (Exception $e) {
    			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
	?>
	</b>	
	<form method="POST" action="homePageFunctions.php">
	<br>
		<input type="submit" name="addBook" id="addBook" value="Write New Book">
		<input type="submit" name="editBook" id="editBook" value="Edit your Book">
		<input type="submit" name="deleteBook" id="deleteBook" value="Delete a Book">
	</form>
</body>
</html>
