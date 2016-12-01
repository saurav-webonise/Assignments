<?php
	$dbHost="localhost";
	$dbUser="root";
	$dbPassword="root";
	$dbName="oops_assignment";
	$conn = mysql_connect($dbHost, $dbUser, $dbPassword);
	if(!$conn)
	{
		echo "Cannot Establish Connection";
	}
	mysql_select_db($dbName,$conn);
?>