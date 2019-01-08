<?php

App::uses('CakeSession', 'Model/Datasource');

class Applicantprefill extends AppModel {

    //public $belongsTo = 'User';
    public $useTable = 'users';
    var $validate = array(
        'appId',
        'existing_id' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'required'   => true,
                'message' => 'This field cannot be left blank'
            ),
            'length' => array (
                'rule' => array('maxLength', 10),
                'message' => 'This field has crossed allowed limit.',
                'allowEmpty' => true
            ),
            'pattern'=>array(
                 'rule'      => '/^[1-9]{1}[0-9]+$/i',
                 'message'   => 'Please enter valid applicant ID.'
            )
        ),
        'date_of_birth' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'required'   => true,
                'message' => 'This field cannot be left blank'
            ),
            'length' => array (
                'rule' => array('maxLength', 10),
                'message' => 'This field has crossed allowed limit.',
                'allowEmpty' => true
            ),
            'pattern'=>array(
                 'rule'      => '/^[0-9]{2}\/[0-9]{2}\/[0-9]{4}$/i',
                 'message'   => 'Please enter valid Date of Birth (DD/MM/YYYY)'
            )
        )
    );
}
        
?>

