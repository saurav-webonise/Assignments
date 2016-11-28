<?php
class pincodeModel extends AppModel {
	var $name = 'Pincode';
	var $validate = array(
		'pincode' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'allowEmpty' => false,
				'required' => false
			),
		),
		'district' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'allowEmpty' => false,
				'required' => false
			),
		)
	);

	var $belongsTo = array(
		'student' => array(
			'className' => 'studentModel',
			'foreignKey' => 'pincode'
		),
	);

	public function findFirstPincode() 
	{
	    $firstpincode = $this->pincodeModel->find('first');
	}
	public function countStudent() 
	{
    	$totalPincode = $this->pincodeModel->find('count');
	}
	public function allPincode() 
	{
    	$allPincode = $this->pincodeModel->find('all');
    }
}
