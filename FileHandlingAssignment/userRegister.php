<?php
	include 'config.php';
	if(!$conn)
	{
		die("Connection Failed");
	}
	else
	{
		$firstName=$_POST['firstName'];
		$lastName=$_POST['lastName'];
		$userName=$_POST['userName'];
		$password=$_POST['userPassword'];
		$sql = "INSERT INTO user_details VALUES ('".$firstName."', '".$lastName."', '".$userName."','".$password."')";
    	$conn->exec($sql);
    	@header("Location:userLogin.html");	
	}
?>
