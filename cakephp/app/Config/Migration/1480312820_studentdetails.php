<?php
class StudentDetails extends CakeMigration {

/**
 * Migration description
 *
 * @var string
 */
	public $description = 'studentDetails';

/**
 * Actions to be performed
 *
 * @var array $migration
 */
	public $migration = array(
		'up' => array(
			'create_table' => array(
				'pincode' => array(
					'pincode' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 6, 'unsigned' => false, 'key' => 'index'),
					'district' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
					'indexes' => array(
						'fk_pincode' => array('column' => 'pincode', 'unique' => 0),
					),
					'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB'),
				),
				'student' => array(
					'prn' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => false, 'key' => 'primary'),
					'name' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
					'city' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
					'pincode' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 6, 'unsigned' => false, 'key' => 'index'),
					'indexes' => array(
						'PRIMARY' => array('column' => 'prn', 'unique' => 1),
						'pincode_index' => array('column' => 'pincode', 'unique' => 0),
					),
					'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB'),
				),
			),
		),
		'down' => array(
			'drop_table' => array(
				'pincode', 'student'
			),
		),
	);

/**
 * Before migration callback
 *
 * @param string $direction Direction of migration process (up or down)
 * @return bool Should process continue
 */
	public function before($direction) {
		return true;
	}

/**
 * After migration callback
 *
 * @param string $direction Direction of migration process (up or down)
 * @return bool Should process continue
 */
	public function after($direction) {
		return true;
	}
}
