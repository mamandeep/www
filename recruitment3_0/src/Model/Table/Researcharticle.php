<?php

class Researcharticle extends AppModel {
    
    public $useTable = 'researcharticle';
            
    var $validate = array(
        'applicant_id',
        'authors',
        'title_of_book',
        'title_of_article',
        'place_of_publication',
        'publication_ISBN',
        'page_no'
    );
    


}

?>
