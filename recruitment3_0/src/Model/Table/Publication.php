<?php

class Publication extends AppModel {
    
    public $useTable = 'publication';
            
    var $validate = array(
        'applicant_id',
        'authors',
        'title',
        'paper_book',
        'title_article',
        'name_place_publication',
        'publication_ISSN',
        'publisher_ISBN',
        'vol_page_year',
        'impact_factor'
    );

}

?>