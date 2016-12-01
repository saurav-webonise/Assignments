<?php
	session_start();
	require_once '../Controller/UserController.php';
	$userController=new UserController;
	$name=$_POST['name'];
	$email=$_POST['useremail'];
	$dob=$_POST['userdob'];
	$profile=$_POST['userprofile'];
	$userDetails=array($name,$email,$dob,$profile);
	print_r($userDetails);
	echo "<br>".$userDetails[0];
    $userDetails=$userController->save($_SESSION['username'],$userDetails);
?>