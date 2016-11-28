<?php
class studentModel extends AppModel {
	var $name = 'Student';
	var $validate = array(
		'prn' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'allowEmpty' => false,
				'required' => false
			),
		),
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'allowEmpty' => false,
				'required' => false
			),
		),
		'city' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'allowEmpty' => false,
				'required' => false
			),
		),
		'pincode' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'allowEmpty' => false,
				'required' => false
			),
		)
	);

	var $belongsTo = array(
		'pincode' => array(
			'className' => 'pincodeModel',
			'foreignKey' => 'pincode'
		),
	);
	public function findFirstStudent() 
	{
	    $firstStudent = $this->studentModel->find('first');
	}
	public function countStudent() 
	{
    	$totalStudent = $this->studentModel->find('count');
	}
	public function allStudent() 
	{
    	$allStudent = $this->studentModel->find('all');
    }
}
