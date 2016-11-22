<?php
/**
 * Application model for CakePHP.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Model', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class AppModel extends Model {
}
class ContactOperation extends AppModel {
    public $useTable = false;
	public function getCategoriesList() {
        // this could be a find 'list' from
        // another model
        return array(
            1 => 'Sales',
            2 => 'Support',
            3 => 'Query',
        );
	}
 
	public function validateCategory($check) {
        // would likely check for a real
        // record id
        $selected = reset($check);
        return is_numeric($selected) &&
            $selected < 4 && $selected > 0;
	}
	
	public $_schema = array(
        'name' => array(
            'type' => 'string',
            'length' => 200,
            'null' => false,
        ),
        'email' => array(
            'type' => 'string',
            'length' => 150,
            'null' => false,
        ),
        'category_id' => array(
            'type' => 'integer',
            'null' => false,
        ),
        'message' => array(
            'type' => 'text',
            'null' => false,
        ),
    );
	
	public $validate = array(
    'name' => array(
        'validName' => array(
            'rule' => array('between', 2, 200),
            'message' => 'Name must be %s-%s in length.',
            'allowEmpty' => false,
            'required' => true,
        ),
    ),
    'email' => array(
        'validEmail' => array(
            'rule' => array('email'),
            'message' => 'Must be a properly formatted e-mail address.',
            'allowEmpty' => false,
            'required' => true,
        ),
    ),
    'category_id' => array(
        'validCategory' => array(
            'rule' => array('validateCategory'),
            'message' => 'Must represent a valid category.',
            'allowEmpty' => false,
            'required' => true,
        ),
    ),
    'message' => array(
        'validation' => array(
            'rule' => array('notempty'),
            'message' => 'Message cannot be empty.',
            'allowEmpty' => false,
            'required' => true,
        ),
    ),
);
}
