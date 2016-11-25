<?php
	$dbHost="localhost";
	$dbUser="root";
	$dbPassword="root";
	$dbName="PdoAssignment";
	try
	{
    	$conn = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPassword);
    	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
	catch(PDOException $e)
    {
    	echo "Connection failed: " . $e->getMessage();
    }
?>