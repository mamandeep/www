<?php

class Miscexp extends AppModel {
    
    public $useTable = 'miscexp';
            
    var $validate = array(
        'user_id',
        'ug_no_yrs' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
        'ug_no_mnths' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
        'pg_no_yrs' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
        'pg_no_mnths' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
        'pd_no_yrs' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
        'pd_no_mnths' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
        'ot_no_yrs' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
        'ot_no_mnths' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
        'tot_no_yrs' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
        'tot_no_mnths' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        )
    );

}


