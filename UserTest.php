<?php
	require_once('/var/www/html/OopsAssignment/app/Model/User.php');
	require_once '/var/www/html/OopsAssignment/Config/database.php';
	class UserTest extends PHPUnit_Framework_TestCase{
		public function setUp(){ }
	  	public function tearDown(){ }
	  	public function testIndexIsValid(){
	  		$indexObj = new User();
	  		$username = "rohan";
	  		$this->assertTrue($indexObj->index($username) !== false);
	  		$this->assertGreaterThan(0,strlen($username));
	  		$this->assertNotNull($username);

	  	}
	  	public function testEditIsValid(){
	  		$editObj = new User();
	  		$username = "rohan";
	  		$this->assertTrue($editObj->edit($username) !== false);
	  		$this->assertGreaterThan(0,strlen($username));
	  	}
	  	public function testSaveIsValid(){
	  		$saveObj = new User();
	  		$username = "rohan";
	  		$userDetails=array("name" => "Rohank","email" => "rohan@gmail.com","birth_date"=>"1994-08-15","profile_id" => "2");
	  		$this->assertArrayHasKey("name",$userDetails);
	  		$this->assertContains("Rohank",$userDetails);
	  	}
	  	public function testDeleteIsValid(){
	  		$deleteObj = new User();
	  		$username = "rohan";
	  		$this->assertTrue($deleteObj->edit($username) !== false);
	  		$this->assertNotEmpty($username);
	  		$this->assertCount(1, ['rohan']);
	  	}
	}
?>