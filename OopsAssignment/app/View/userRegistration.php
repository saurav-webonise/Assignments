<?php
	if(isset($_POST['submit']))
	{
		$userName=$_POST['username'];
		$name=$_POST['name'];
		$email=$_POST['useremail'];
		$password=md5($_POST['password']);
		$dob=$_POST['userdob'];
		$profile=$_POST['userprofile'];

		include '../../Config/database.php';
		if(!$conn)
		{
			echo "Connection Not Establish. Check database.php file";
		}
		else
		{
			$usersInsert="insert into users(user_name,password,name,email,birth_date,profile_id) values('".$userName."','".$password."','".$name."','".$email."','".$dob."','".$profile."');";
			if(mysql_query($usersInsert))
			{
				echo "User Created";
				@header("Location:userLogin.html");
			}
			else
			{
				echo "User Name Already Table";
				@header("Location:userRegistration.html");	
			}
		}
	}
?>