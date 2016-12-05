<?php
	include 'PostgresConnection.php';
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$userName = $_POST['userName'];
	$password = $_POST['userPassword'];
	try{
		$postgresConn = new PostgresConnection;
		$conn = $postgresConn->connect();
		$sql = "INSERT INTO user_details VALUES ('" . $firstName . "', '" . $lastName . "', '" . $userName . "','" . $password . "')";
	    $conn->exec($sql);
	    @header("Location:userLogin.html");	
	}catch (Exception $e) {
    	echo 'Caught exception: ',  $e->getMessage(), "\n";
	}
?>
