<?php

class Misc extends AppModel {
    
    public $useTable = 'misc';
    
    var $validate = array(
        'user_id',
        /*'ref_add1' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
        'ref_add2' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
        'ref_add3' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
        'ref_email1' => array(
            'rule' => 'email',
            'message' => 'It must be a valid email address'
        ),
        'ref_email2' => array(
            'rule' => 'email',
            'message' => 'It must be a valid email address'
        ),
        'ref_email3' => array(
            'rule' => 'email',
            'message' => 'It must be a valid email address'
        ),
        'ref_mobile1' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
        'ref_mobile2' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
        'ref_mobile3' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),*/
        'time_req_for_joining' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        )
    );
}
        
?>

