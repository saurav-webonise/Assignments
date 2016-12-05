<?php
	require_once '/var/www/html/OopsAssignment/app/Model/User.php';
	require_once '/var/www/html/OopsAssignment/Config/database.php';
	require_once '/var/www/html/OopsAssignment/app/temp/Log.php';
	class UserTest extends PHPUnit_Framework_TestCase{
		public function setUp(){
        	$log = new Log('/var/www/html/OopsAssignment/app/temp/test.log');
        	$log->message('Execution of test cases begins');
		}
	  	public function tearDown(){
	  		$log = new Log('/var/www/html/OopsAssignment/app/temp/test.log');
        	$log->message('Test Cases succesfully executed');
	  	}
	  	public function testIndexIsValid(){
	  		$indexObj = new User; 
	  		$username = "saurav";
	  		$this->assertNotTrue($indexObj->index($username) !== false);
	  		$this->assertGreaterThan(0,strlen($username));
	  		$this->assertNotNull($username,'Variable Should Not be is_null');
	  		$this->assertTrue(file_exists('/var/www/html/OopsAssignment/app/temp/test.log'));
	  		return '$username';
	  	}
	  	public function testEditIsValid(){
	  		$editObj = new User();
	  		$username = "saurav";
	  		$this->assertNotTrue($editObj->edit($username) !== false);
	  		$this->assertGreaterThan(0,strlen($username));
	  		return $username;
	  	}
      	//@depends testEditIsValid
	  	public function testSaveIsValid(){
	  		$saveObj = new User();
	  		$firstUsername = "sauravs";
	  		$secondUsername = "rohan";
	  		$userDetails=array("name" => "sauravs","email" => "saurav@gmail.com","birth_date"=>"1994-10-22","profile_id" => "2");
	  		$this->assertArrayHasKey("name",$userDetails);
	  		$this->assertContains("sauravs",$userDetails);
	  		$this->assertNotSame($firstUsername, $secondUsername);
	  		foreach ($userDetails as $key => $value) {
	  			$this->assertTrue($saveObj->save($firstUsername,$key,func_get_args()) !== false);
	  		}
	  	}
	  	// @dataProvider testIndexIsValid
	  	public function testDeleteIsValid(){
	  		$deleteObj = new User();
	  		$username = "saurav";
	  		$this->assertTrue($deleteObj->delete($username) !== false);
	  		$this->assertNotEmpty($username);
	  		$this->assertCount(1, ['saurav']);
	  	}
	}
?>