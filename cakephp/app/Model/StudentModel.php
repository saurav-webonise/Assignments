<?php
class StudentModel extends AppModel {
	var $name = 'Students';
	var $validate = array(
		'prn' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'PRN is empty',
				'allowEmpty' => false,
				'required' => false
			),
		),
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Name is empty',
				'allowEmpty' => false,
				'required' => false
			),
		),
		'city' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'City is empty',
				'allowEmpty' => false,
				'required' => false
			),
		),
		'pincode' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Pincode is empty',
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
}
