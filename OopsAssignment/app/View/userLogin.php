<?php
	include '../../Config/database.php';
	
	if(!$conn)
	{
		echo "Connection Not Establish. Check database.php file";
	}
	else
	{
		$flag="false";
		$userName=$_POST['username'];
		$password=md5($_POST['password']);
		$checkLogin= mysql_query("SELECT * FROM users WHERE user_name = '".$userName."' and password='".$password."'"); 
		$userData=mysql_fetch_assoc($checkLogin);

		
		if(!empty($userData))
		{
			session_start();
			$_SESSION['username']=$userData['user_name'];
			@header("Location:userDashboard.php");
			
		}	
		else
		{
			
			@header("Location:userLogin.html");
		}
	}
	
?>