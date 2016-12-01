<?php
	require_once 'AppController.php';
	require_once '../Model/User.php';
	class UserController extends AppController
	{
		function index($username)
		{
			$user=new User;
            $userDetails=$user->index($username);
            return $userDetails;
		}
		function save($username,$userDetails)
		{
			$user=new User;
			$userUpdate=$user->save($username,$userDetails);
			@header("Location:../View/userDashboard.php");	
		}
		function edit($username)
		{
			$user=new User;
            $editDetails=$user->edit($username);
            $jsonEditDetails=json_encode($editDetails);
            setcookie('jsonEditDetailsCookie', $jsonEditDetails);
            // @header('Location:editProfile.php');
		}
		function delete($username)
		{
			$user=new User;
			$userDelete=$user->delete($username);
		}
	}
?>