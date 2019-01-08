<?php

class Experience extends AppModel {
    
    public $useTable = 'experience';
            
    var $validate = array(
        'applicant_id',
        'designation',
        'scale_of_pay',
        'name_add',
        'from_date',
        'to_date',
        'no_of_yrs_mnths',
        'nature_of_work',
        'sr_of_proof'
    );

}

?>