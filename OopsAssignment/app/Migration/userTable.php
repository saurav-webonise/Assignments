<?php
	include ('../../Config/database.php');
	
	if(!$conn)
	{
		die ("Cannot Establish Connection");
	}
	else
	{
		$usersTable="CREATE TABLE IF NOT EXISTS users(userId int primary key AUTO_INCREMENT,user_name varchar(20) NOT NULL UNIQUE,password varchar(50),name varchar(50),email varchar(60),birth_date date,profile_id int(1),CONSTRAINT fk_profile_id FOREIGN KEY(profile_id) REFERENCES profiles(profile_id));";

		if(mysql_query($usersTable))
		{
			echo "users table created";
		}
		else
		{
			echo "users table not created";
		}
	}
?>