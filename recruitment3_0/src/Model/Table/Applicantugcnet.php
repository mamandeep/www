<?php

App::uses('CakeSession', 'Model/Datasource');

class Applicantugcnet extends AppModel {

    //public $belongsTo = 'User';
    public $useTable = 'applicant';
    
    var $validate = array(
        'phd_ugc_2009' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
        'national_test_qualified' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
        'ugc_net_mnth_yr' => array(
            'numeric' => array(
                'rule' => 'numeric',
                'message' => 'Please enter only numbers',
                'allowEmpty' => true,
                'required' => false
            ),
            'pattern' => [
                'rule' => '/^[0-9]+$/',
                'message' => 'Please enter only valid month or year',
                'allowEmpty' => true,
                'required' => false
            ]
        ),
        'ugc_net_rollno' => array(
            'numeric' => array(
                'rule' => 'numeric',
                'message' => 'Please enter only numbers',
                'allowEmpty' => true,
                'required' => false
            ),
            'pattern' => [
                'rule' => '/^[0-9]+$/',
                'message' => 'Please enter only valid UGC-NET Roll No.',
                'allowEmpty' => true,
                'required' => false
            ]
        ),
        'ugc_net_marks' => array(
            'numeric' => array(
                'rule' => 'numeric',
                'message' => 'Please enter only numbers',
                'allowEmpty' => true,
                'required' => false
            ),
            'pattern' => [
                'rule' => '/^[0-9.]+$/',
                'message' => 'Please enter only valid UGC-NET Marks.',
                'allowEmpty' => true,
                'required' => false
            ]
        ),
        'ugc_net_total_marks' => array(
            'numeric' => array(
                'rule' => 'numeric',
                'message' => 'Please enter only numbers',
                'allowEmpty' => true,
                'required' => false
            ),
            'pattern' => [
                'rule' => '/^[0-9.]+$/',
                'message' => 'Please enter only valid UGC-NET Total Marks.',
                'allowEmpty' => true,
                'required' => false
            ]
        ),
        'ugc_net_category' => array(
            'pattern' => [
                'rule' => '/^General|SC|ST|OBC$/',
                'message' => 'Please enter only valid UGC-NET Category.',
                'allowEmpty' => true,
                'required' => false
            ]
        )
    );

    function beforeSave($options = array()) {
        return $this->data;
    }
    
    function beforeValidate($options = array()) {
        
    }
    

    function paymentValidation($data) {
        return ((!empty($this->data[$this->alias]['appfee_dd_no'])
               && !empty($this->data[$this->alias]['appfee_dd_date'])
               && !empty($this->data[$this->alias]['appfee_dd_amt'])
               && !empty($this->data[$this->alias]['appfee_dd_bank'])
               && !empty($this->data[$this->alias]['appfee_dd_branch'])));
    }    
}

?>
