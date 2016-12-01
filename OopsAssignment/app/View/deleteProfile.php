<?php
	
	session_start();
	require_once '../Controller/UserController.php';
	$userController=new UserController;
	$userDetails=$userController->delete($_SESSION['username']);
	session_unset();
	session_destroy();
	@header("location:userLogin.html");
	exit();
?>