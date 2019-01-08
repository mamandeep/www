<?php

class Reports extends AppModel {
    
    var $useTable = false;
    
    var $validate = array(
        'applicant_id' => array(
            'numeric' => array(
                'rule' => 'numeric',
                'message' => 'Please enter only numbers',
                'allowEmpty' => false,
                'required' => true,
            )
        ),
        'type' => array(
            'alphaNumeric' => array(
                'rule' => 'alphaNumeric',
                'required' => true,
                'allowEmpty' => false,
                'message' => 'Letters and numbers only'
            )
        )
    );
    
    

}

?>
