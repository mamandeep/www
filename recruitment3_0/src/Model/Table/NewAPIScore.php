<?php

class NewAPIScore extends AppModel {
    
    public $useTable = 'applicant';
            
    var $validate = array(
        'criteria_partA' => array(
            'partA' => array(
                'rule' => 'notEmpty',
                'message' => 'required field'
            ),
            'numeric' => array(
                'rule' => 'numeric',
                'message' => 'Please enter only numbers'
            )
        ),
        'criteria_partB' => array(
            'partB' => array(
                'rule' => 'notEmpty',
                'message' => 'required field'
            ),
            'numeric' => array(
                'rule' => 'numeric',
                'message' => 'Please enter only numbers'
            )
        ),
        'criteria_totalAB' => array(
            'partAB' => array(
                'rule' => 'notEmpty',
                'message' => 'required field'
            ),
            'numeric' => array(
                'rule' => 'numeric',
                'message' => 'Please enter only numbers'
            ),
            'sum' => array(
                'rule' => 'checksumshortlist',
                'message' => 'Sum of Shortlisting Criteria Part A and Shortlisting Criteria Part B does not match.'
            )
        )
    );
    
    
    public function checksumshortlist($check)
    {
        //debug($check); debug($this->data[$this->alias]);
        return (intval($check['criteria_totalAB']) === (intval($this->data[$this->alias]['criteria_partA']) + intval($this->data[$this->alias]['criteria_partB'])));
    }
    
    

}

?>
