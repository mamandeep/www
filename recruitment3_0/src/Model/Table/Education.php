<?php

class Education extends AppModel {
    
    public $useTable = 'education';
    
    //var $inserted_ids = array();
            
    var $validate = array(
        'type',
        'course',
        'board',
        'year_of_passing',
        'percentage',
        'marks_obtained',
        'max_marks',
        'roll_no',
        'subjects'
    );
    
    
    /*function afterSave($created, $options = array()) {
        if($created) {
            $this->inserted_ids[] = $this->getInsertID();
        }
        return true;
    }*/

}

