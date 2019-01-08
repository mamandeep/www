<?php

class Researchproject extends AppModel {
    
    public $useTable = 'researchproject';
    
    //var $inserted_ids = array();
            
    var $validate = array(
        'applicant_id',
        'title',
        'comp_ongoing',
        'funding_agency',
        'investigator',
        'amount_of_grant',
        'duration'
    );
    
    
    /*function afterSave($created, $options = array()) {
        if($created) {
            $this->inserted_ids[] = $this->getInsertID();
        }
        return true;
    }*/

}