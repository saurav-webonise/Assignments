<!DOCTYPE html>
<html>
<head>
	<title>User Dashboard</title>
	<link rel="stylesheet" type="text/css" href="resources/css/userDashboard.css" />
</head>
<body>
	<div class="container">
	<section id="content">
	<h1>Welcome : 
	<?php include_once '../../Config/database.php'; 
		  session_start(); 
		  if(isset($_SESSION['username']))
		  {
		  	
		  	echo $_SESSION['username']; 	
		  }
		  else
		  {
		  	@header("Location:userLogin.php");
		  }
	?>
	<hr>
	</h1>
	<center><table border=1 cellpadding="5">
		<tr>
			<th>Name </th>
			<th>User Name </th>
			<th>Email </th>
			<th>Date Of Birth </th>
			<th>Job Profile</th>
		</tr>
		<?php
			require_once("../Controller/UserController.php");
        	$userController=new UserController;
        	$userDetails=$userController->index($_SESSION['username']);
        	$i=0;
        	echo "<tr>";
        	foreach($userDetails as $key=>$userDetail) 
        	{
            	echo "<th>".$userDetail."</th>";
            	$i++;
        	}
        	echo "</tr>";
		?>	
	</table>
	
	<form method="POST" action="editProfile.php">
		<input type="submit" name="editProfile" value="Edit Profile">
	</form>
	<form method="POST" action="deleteProfile.php">
		<input type="submit" name="deleteAccount" value="Delete Account">
	</form>
	<form method="POST" action="logOut.php">
		<input type="submit" name="logOut" value="Log Out!!!">
	</form>
	</center>
	</section>
	</div>
</body>
</html>
<?php

?>