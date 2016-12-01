<?php
	abstract class AppModel
	{
		abstract public function index($username);
		abstract public function save($username,$userDetails);
		abstract public function edit($username);
		abstract public function delete($username);
	}
?>