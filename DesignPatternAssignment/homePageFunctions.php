<?php
	function writeBook(){
		@header("Location:writeBook.php");
	}
	function editBook(){
		@header("Location:editBookList.php");
	}
	function deleteBook(){
		@header("Location:deleteBookList.php");
	}
	function logOut(){
		session_start();
		unset($_SESSION['username']);
		session_destroy();
		@header("Location: userLogin.html");
		exit;
	}

	if(isset($_POST['addBook'])){
		writeBook();
	}
	elseif(isset($_POST['editBook'])){
		editBook();
	}
	elseif(isset($_POST['deleteBook'])){
		deleteBook();
	}
	elseif(isset($_POST['logOut'])){
		logOut();
	}
?>