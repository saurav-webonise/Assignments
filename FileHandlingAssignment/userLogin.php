<?php
	include 'config.php';
	
	echo "In login PHP";
	if(!$conn)
	{
		echo "Connection Failed";
	}
	else
	{
		$flag="false";
		$userName=$_POST['userName'];
		$password=$_POST['userPassword'];
		$sqlQuery= "SELECT * FROM user_details WHERE user_name = '".$userName."' and password='".$password."'"; 
		$statement = $conn->query($sqlQuery);
		foreach($conn->query($sqlQuery) as $row)
		{
    		$flag="true";
		}
		if($flag=="true")
		{
			session_start();
			$_SESSION['userName']=$userName;
			@header("Location:homePage.php");
		}	
		else
		{
			@header("Location:userLogin.html");
		}
	}
	
?>
