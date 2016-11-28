<?php
class PincodeModel extends AppModel {
	var $name = 'Pincodes';
	var $validate = array(
		'pincode' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Pincode is empty',
				'allowEmpty' => false,
				'required' => false
			),
		),
		'district' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'District is empty'
				'allowEmpty' => false,
				'required' => false
			),
		)
	);

	var $hasMany = array(
		'student' => array(
			'className' => 'StudentModel',
			'foreignKey' => 'pincode'
		),
	);
}
