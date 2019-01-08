<?php

class Researchpaper extends AppModel {
    
    public $useTable = 'researchpaper';
            
    var $validate = array(
        'applicant_id',
        'authors',
        'title',
        'name_place_publication',
        'publication_ISSN',
        'vol_page_year',
        'impact_factor'
    );
    
}

?>
