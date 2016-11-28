<?php
class StudentController extends AppController {
	public function index() 
	{
		 $Student = new StudentController;
     	 $pincode = 411038 ; 
         $studentList = $Student -> retrieveStudentList($pincode);
         $this->set('students',$studentList);
    }
    public function retrieveStudentList($pincode)
    {
    	$this->loadModel('Student');
    	$students=$this->Student->find('all', array(
    	          'fields'=>array('Student.*','pincode.pincode'),
    	          'joins' => array(
    	          array(
    	              	'table' => 'pincodes',
    	              	'alias' => 'pincode',
    	              	'type' => 'INNER',
    	              	'conditions' => array(
    	                  'Student.pincode = pincode.pincode'
    	              )
    	          )),
    	          'conditions'=>array('pincode.pincode'=>$pincode)));
    	      return $students;
    	  }
}
?>