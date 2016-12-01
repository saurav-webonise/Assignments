<?php
	include ('../../Config/database.php');
	
	if(!$conn)
	{
		die ("Cannot Establish Connection");
	}
	else
	{
		$profilesTable="CREATE TABLE IF NOT EXISTS profiles(profile_id int(1) primary key AUTO_INCREMENT,profile_name varchar(40))";
		

		if(mysql_query($profilesTable))
		{
			echo "profile  table created";
			$insertProfile="INSERT IGNORE INTO profiles VALUES(1,'Intern'),(2,'Developer'),(3,'Business Analyst'),(4,'Senior Developer');";
			if(mysql_query($insertProfile))
			{
				echo "Records Inserted";
				@header("Location:userTable.php");
			}
			else
			{
				echo "Records not inserted";
			}
		}
		else
		{
			echo "table Not created";
		}

	}
?>
