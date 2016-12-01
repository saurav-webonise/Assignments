<?php
	session_start();
	require_once '../Controller/UserController.php';
	
	$userController=new UserController;
    $userDetails=$userController->edit($_SESSION['username']);
	echo "<html>
		<head>
      		<title>Edit Profile</title>
			<link rel='stylesheet' href='resources/css/editProfile.css'>
		</head>
		<body>
			<form action='saveProfile.php' method='post'>
	   			<h1>Edit Profile</h1>
	   			<fieldset>";
	   				$editDetailsCookie = $_COOKIE['jsonEditDetailsCookie'];
					$editDetailsCookie = stripslashes($editDetailsCookie);
					$editDetailsArray = json_decode($editDetailsCookie, true);
	   				$username=$_SESSION['username'];
            		foreach ($editDetailsArray as $key=>$value) 
            			{
	        				if($key=='name')
	        				{
	        					echo "
	        					<label for='name'>Name:</label>
	        					<input type='text' id='name' name='name' value='".$value."' required>
	        					";
          					}
          					if($key=='email')
          					{
          						echo "
          						<label for='useremail'>Email:</label>
          						<input type='email' id='useremail' name='useremail' value='".$value."' required>
          						";
          					}
          					
          					if($key=='birth_date')
          					{
          						echo "
          						<label>Date Of Birth: </label>
          						<input type='date' id='userdob' name='userdob' value='".$value."' required>
          						";
          					}
          					
          					if($key=='profile_name')
          					{
          						echo "
          						<label for='userprofile'>Job Role:</label>
          						<select id='userprofile' name='userprofile'>
            						<option value='1'>Intern</option>
            						<option value='2'>Developer</option>
            						<option value='3'>Business Analyst</option>
					        	    <option value='4'>Senior Developer</option>
         						</select>
        						";
       					}
     				}
    				echo "<button type='submit' name='submit'>Save Changes</button>
   				</fieldset>
  			</form>
  		</body>
	</html>";
	
?>