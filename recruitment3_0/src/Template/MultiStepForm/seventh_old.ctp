<?php

echo $this->Form->create('Researchpaper', array('id' => 'Researchpaper_Details', 'url' => Router::url( null, true ))); ?>
<h2>Step 7: Publications, if any</h2>
<div id="contentContainer">
    <strong>i) Research Papers in SCI Journals</strong>
    <table id="ResearchpaperSCI_table" border="2px solid black" style="border-right: 2px solid black !important;">
        <tr>
            <td width="5%">S. No.</td>
            <td width="20%"><?php echo $this->Form->label('Authors', 'Authors'); ?></td>
            <td width="20%"><?php echo $this->Form->label('TitleOfThePaper', 'Title of the Paper'); ?></td>
            <td width="20%"><?php echo $this->Form->label('JournalsNameAndPlace', 'Journal\'s Name & Place of Publication'); ?></td>
            <td width="20%"><?php echo $this->Form->label('PublicationISSN', 'Publication & ISSN'); ?></td>
            <td width="10%"><?php echo $this->Form->label('Vol_Page_No_Year', 'Vol./Page No/Year'); ?></td>
            <td width="10%"><?php echo $this->Form->label('ImpactFactor', 'Impact Factor'); ?></td>
        </tr>
        <tr>
            <td>1. </td>
            <td><?php echo $this->Form->input('Researchpaper.0.id', array('type' => 'hidden'));
                      echo $this->Form->input('Researchpaper.0.user_id', array('type' => 'hidden', 'value' => $this->Session->read('Auth.User.id')));
                      echo $this->Form->input('Researchpaper.0.type', array('type' => 'hidden', 'value' => 'sci_journals'));
                      echo $this->Form->input('Researchpaper.0.author', array('label' => false));
                  ?></td>
            <td><?php echo $this->Form->input('Researchpaper.0.title_of_paper', array('label' => false)); ?></td>
            <td><?php echo $this->Form->input('Researchpaper.0.journal_name_place', array('label' => false)); ?></td>
            <td><?php echo $this->Form->input('Researchpaper.0.publication_issn', array('label' => false)); ?></td>
            <td><?php echo $this->Form->input('Researchpaper.0.vol_pageno_year', array('label' => false)); ?></td>
            <td><?php echo $this->Form->input('Researchpaper.0.impact_factor', array('label' => false)); ?></td>
        </tr>
        <tr>
            <td>2. </td>
            <td><?php echo $this->Form->input('Researchpaper.1.id', array('type' => 'hidden'));
                      echo $this->Form->input('Researchpaper.1.user_id', array('type' => 'hidden', 'value' => $this->Session->read('Auth.User.id')));
                      echo $this->Form->input('Researchpaper.1.type', array('type' => 'hidden', 'value' => 'sci_journals'));
                      echo $this->Form->input('Researchpaper.1.author', array('label' => false));
                  ?></td>
            <td><?php echo $this->Form->input('Researchpaper.1.title_of_paper', array('label' => false)); ?></td>
            <td><?php echo $this->Form->input('Researchpaper.1.journal_name_place', array('label' => false)); ?></td>
            <td><?php echo $this->Form->input('Researchpaper.1.publication_issn', array('label' => false)); ?></td>
            <td><?php echo $this->Form->input('Researchpaper.1.vol_pageno_year', array('label' => false)); ?></td>
            <td><?php echo $this->Form->input('Researchpaper.1.impact_factor', array('label' => false)); ?></td>
        </tr>
        <tr>
            <td>3. </td>
            <td><?php echo $this->Form->input('Researchpaper.2.id', array('type' => 'hidden'));
                      echo $this->Form->input('Researchpaper.2.user_id', array('type' => 'hidden', 'value' => $this->Session->read('Auth.User.id')));
                      echo $this->Form->input('Researchpaper.2.type', array('type' => 'hidden', 'value' => 'sci_journals'));
                      echo $this->Form->input('Researchpaper.2.author', array('label' => false));
                  ?></td>
            <td><?php echo $this->Form->input('Researchpaper.2.title_of_paper', array('label' => false)); ?></td>
            <td><?php echo $this->Form->input('Researchpaper.2.journal_name_place', array('label' => false)); ?></td>
            <td><?php echo $this->Form->input('Researchpaper.2.publication_issn', array('label' => false)); ?></td>
            <td><?php echo $this->Form->input('Researchpaper.2.vol_pageno_year', array('label' => false)); ?></td>
            <td><?php echo $this->Form->input('Researchpaper.2.impact_factor', array('label' => false)); ?></td>
        </tr>
        <tr>
            <td>4. </td>
            <td><?php echo $this->Form->input('Researchpaper.3.id', array('type' => 'hidden'));
                      echo $this->Form->input('Researchpaper.3.user_id', array('type' => 'hidden', 'value' => $this->Session->read('Auth.User.id')));
                      echo $this->Form->input('Researchpaper.3.type', array('type' => 'hidden', 'value' => 'sci_journals'));
                      echo $this->Form->input('Researchpaper.3.author', array('label' => false));
                  ?></td>
            <td><?php echo $this->Form->input('Researchpaper.3.title_of_paper', array('label' => false)); ?></td>
            <td><?php echo $this->Form->input('Researchpaper.3.journal_name_place', array('label' => false)); ?></td>
            <td><?php echo $this->Form->input('Researchpaper.3.publication_issn', array('label' => false)); ?></td>
            <td><?php echo $this->Form->input('Researchpaper.3.vol_pageno_year', array('label' => false)); ?></td>
            <td><?php echo $this->Form->input('Researchpaper.3.impact_factor', array('label' => false)); ?></td>
        </tr>
        <tr>
            <td>5. </td>
            <td><?php echo $this->Form->input('Researchpaper.4.id', array('type' => 'hidden'));
                      echo $this->Form->input('Researchpaper.4.user_id', array('type' => 'hidden', 'value' => $this->Session->read('Auth.User.id')));
                      echo $this->Form->input('Researchpaper.4.type', array('type' => 'hidden', 'value' => 'sci_journals'));
                      echo $this->Form->input('Researchpaper.4.author', array('label' => false));
                  ?></td>
            <td><?php echo $this->Form->input('Researchpaper.4.title_of_paper', array('label' => false)); ?></td>
            <td><?php echo $this->Form->input('Researchpaper.4.journal_name_place', array('label' => false)); ?></td>
            <td><?php echo $this->Form->input('Researchpaper.4.publication_issn', array('label' => false)); ?></td>
            <td><?php echo $this->Form->input('Researchpaper.4.vol_pageno_year', array('label' => false)); ?></td>
            <td><?php echo $this->Form->input('Researchpaper.4.impact_factor', array('label' => false)); ?></td>
        </tr>
    </table>
    <br/>
    <strong>ii) Research Papers in Non-SCI Journals</strong>
    <table id="ResearchpaperNonSCI_table" border="2px solid black" style="border-right: 2px solid black !important;">
        <tr>
            <td width="5%">S. No.</td>
            <td width="20%"><?php echo $this->Form->label('Authors', 'Authors'); ?></td>
            <td width="20%"><?php echo $this->Form->label('TitleOfThePaper', 'Title of the Paper'); ?></td>
            <td width="10%"><?php echo $this->Form->label('JournalsNameAndPlace', 'Journal\'s Name & Place of Publication'); ?></td>
            <td width="20%"><?php echo $this->Form->label('PublicationISSN', 'Publication & ISSN'); ?></td>
            <td width="20%"><?php echo $this->Form->label('Vol_Page_No_Year', 'Vol./Page No/Year'); ?></td>
            <td width="10%"><?php echo $this->Form->label('ImpactFactor', 'Impact Factor'); ?></td>
        </tr>
        <tr>
            <td>1. </td>
            <td><?php echo $this->Form->input('Researchpaper.5.id', array('type' => 'hidden'));
                      echo $this->Form->input('Researchpaper.5.user_id', array('type' => 'hidden', 'value' => $this->Session->read('Auth.User.id')));
                      echo $this->Form->input('Researchpaper.5.type', array('type' => 'hidden', 'value' => 'non_sci_journals'));
                      echo $this->Form->input('Researchpaper.5.author', array('label' => false));
                  ?></td>
            <td><?php echo $this->Form->input('Researchpaper.5.title_of_paper', array('label' => false)); ?></td>
            <td><?php echo $this->Form->input('Researchpaper.5.journal_name_place', array('label' => false)); ?></td>
            <td><?php echo $this->Form->input('Researchpaper.5.publication_issn', array('label' => false)); ?></td>
            <td><?php echo $this->Form->input('Researchpaper.5.vol_pageno_year', array('label' => false)); ?></td>
            <td><?php echo $this->Form->input('Researchpaper.5.impact_factor', array('label' => false)); ?></td>
        </tr>
        <tr>
            <td>2. </td>
            <td><?php echo $this->Form->input('Researchpaper.6.id', array('type' => 'hidden'));
                      echo $this->Form->input('Researchpaper.6.user_id', array('type' => 'hidden', 'value' => $this->Session->read('Auth.User.id')));
                      echo $this->Form->input('Researchpaper.6.type', array('type' => 'hidden', 'value' => 'non_sci_journals'));
                      echo $this->Form->input('Researchpaper.6.author', array('label' => false));
                  ?></td>
            <td><?php echo $this->Form->input('Researchpaper.6.title_of_paper', array('label' => false)); ?></td>
            <td><?php echo $this->Form->input('Researchpaper.6.journal_name_place', array('label' => false)); ?></td>
            <td><?php echo $this->Form->input('Researchpaper.6.publication_issn', array('label' => false)); ?></td>
            <td><?php echo $this->Form->input('Researchpaper.6.vol_pageno_year', array('label' => false)); ?></td>
            <td><?php echo $this->Form->input('Researchpaper.6.impact_factor', array('label' => false)); ?></td>
        </tr>
        <tr>
            <td>3. </td>
            <td><?php echo $this->Form->input('Researchpaper.7.id', array('type' => 'hidden'));
                      echo $this->Form->input('Researchpaper.7.user_id', array('type' => 'hidden', 'value' => $this->Session->read('Auth.User.id')));
                      echo $this->Form->input('Researchpaper.7.type', array('type' => 'hidden', 'value' => 'non_sci_journals'));
                      echo $this->Form->input('Researchpaper.7.author', array('label' => false));
                  ?></td>
            <td><?php echo $this->Form->input('Researchpaper.7.title_of_paper', array('label' => false)); ?></td>
            <td><?php echo $this->Form->input('Researchpaper.7.journal_name_place', array('label' => false)); ?></td>
            <td><?php echo $this->Form->input('Researchpaper.7.publication_issn', array('label' => false)); ?></td>
            <td><?php echo $this->Form->input('Researchpaper.7.vol_pageno_year', array('label' => false)); ?></td>
            <td><?php echo $this->Form->input('Researchpaper.7.impact_factor', array('label' => false)); ?></td>
        </tr>
        <tr>
            <td>4. </td>
            <td><?php echo $this->Form->input('Researchpaper.8.id', array('type' => 'hidden'));
                      echo $this->Form->input('Researchpaper.8.user_id', array('type' => 'hidden', 'value' => $this->Session->read('Auth.User.id')));
                      echo $this->Form->input('Researchpaper.8.type', array('type' => 'hidden', 'value' => 'non_sci_journals'));
                      echo $this->Form->input('Researchpaper.8.author', array('label' => false));
                  ?></td>
            <td><?php echo $this->Form->input('Researchpaper.8.title_of_paper', array('label' => false)); ?></td>
            <td><?php echo $this->Form->input('Researchpaper.8.journal_name_place', array('label' => false)); ?></td>
            <td><?php echo $this->Form->input('Researchpaper.8.publication_issn', array('label' => false)); ?></td>
            <td><?php echo $this->Form->input('Researchpaper.8.vol_pageno_year', array('label' => false)); ?></td>
            <td><?php echo $this->Form->input('Researchpaper.8.impact_factor', array('label' => false)); ?></td>
        </tr>
        <tr>
            <td>5. </td>
            <td><?php echo $this->Form->input('Researchpaper.9.id', array('type' => 'hidden'));
                      echo $this->Form->input('Researchpaper.9.user_id', array('type' => 'hidden', 'value' => $this->Session->read('Auth.User.id')));
                      echo $this->Form->input('Researchpaper.9.type', array('type' => 'hidden', 'value' => 'non_sci_journals'));
                      echo $this->Form->input('Researchpaper.9.author', array('label' => false));
                  ?></td>
            <td><?php echo $this->Form->input('Researchpaper.9.title_of_paper', array('label' => false)); ?></td>
            <td><?php echo $this->Form->input('Researchpaper.9.journal_name_place', array('label' => false)); ?></td>
            <td><?php echo $this->Form->input('Researchpaper.9.publication_issn', array('label' => false)); ?></td>
            <td><?php echo $this->Form->input('Researchpaper.9.vol_pageno_year', array('label' => false)); ?></td>
            <td><?php echo $this->Form->input('Researchpaper.9.impact_factor', array('label' => false)); ?></td>
        </tr>
    </table>
    <br/>
    <strong>iii) Research Articles in Books</strong>
    <table id="ResearchArticlesBooks_table" border="2px solid black" style="border-right: 2px solid black !important;">
        <tr>
            <td width="5%">S. No.</td>
            <td width="20%"><?php echo $this->Form->label('Authors', 'Authors'); ?></td>
            <td width="20%"><?php echo $this->Form->label('TitleOfTheBook', 'Title of the Book'); ?></td>
            <td width="20%"><?php echo $this->Form->label('TitleOfTheArticle', 'Title of the Article'); ?></td>
            <td width="10%"><?php echo $this->Form->label('PlaceOfPublication', 'Place of Publication'); ?></td>
            <td width="20%"><?php echo $this->Form->label('PublisherISBN', 'Publisher & ISBN'); ?></td>
            <td width="10%"><?php echo $this->Form->label('PageNo', 'Page No.'); ?></td>
        </tr>
        <tr>
            <td>1. </td>
            <td><?php echo $this->Form->input('Researcharticle.0.id', array('type' => 'hidden'));
                      echo $this->Form->input('Researcharticle.0.user_id', array('type' => 'hidden', 'value' => $this->Session->read('Auth.User.id')));
                      echo $this->Form->input('Researcharticle.0.type', array('type' => 'hidden', 'value' => 'books'));
                      echo $this->Form->input('Researcharticle.0.author', array('label' => false, 'maxlength' => '500'));
                      ?></td>
            <td><?php echo $this->Form->input('Researcharticle.0.title_of_book', array('label' => false, 'maxlength' => '500')); ?></td>
            <td><?php echo $this->Form->input('Researcharticle.0.title_of_article', array('label' => false, 'maxlength' => '500')); ?></td>
            <td><?php echo $this->Form->input('Researcharticle.0.place_of_publication', array('label' => false, 'maxlength' => '500')); ?></td>
            <td><?php echo $this->Form->input('Researcharticle.0.publisher_isbn', array('label' => false, 'maxlength' => '500')); ?></td>
            <td><?php echo $this->Form->input('Researcharticle.0.page_no', array('label' => false, 'maxlength' => '500')); ?></td>
        </tr>
        <tr>
            <td>2. </td>
            <td><?php echo $this->Form->input('Researcharticle.1.id', array('type' => 'hidden'));
                      echo $this->Form->input('Researcharticle.1.user_id', array('type' => 'hidden', 'value' => $this->Session->read('Auth.User.id')));
                      echo $this->Form->input('Researcharticle.1.type', array('type' => 'hidden', 'value' => 'books'));
                      echo $this->Form->input('Researcharticle.1.author', array('label' => false, 'maxlength' => '500'));
                      ?></td>
            <td><?php echo $this->Form->input('Researcharticle.1.title_of_book', array('label' => false, 'maxlength' => '500')); ?></td>
            <td><?php echo $this->Form->input('Researcharticle.1.title_of_article', array('label' => false, 'maxlength' => '500')); ?></td>
            <td><?php echo $this->Form->input('Researcharticle.1.place_of_publication', array('label' => false, 'maxlength' => '500')); ?></td>
            <td><?php echo $this->Form->input('Researcharticle.1.publisher_isbn', array('label' => false, 'maxlength' => '500')); ?></td>
            <td><?php echo $this->Form->input('Researcharticle.1.page_no', array('label' => false, 'maxlength' => '500')); ?></td>
        </tr>
        <tr>
            <td>3. </td>
            <td><?php echo $this->Form->input('Researcharticle.2.id', array('type' => 'hidden'));
                      echo $this->Form->input('Researcharticle.2.user_id', array('type' => 'hidden', 'value' => $this->Session->read('Auth.User.id')));
                      echo $this->Form->input('Researcharticle.2.type', array('type' => 'hidden', 'value' => 'books'));
                      echo $this->Form->input('Researcharticle.2.author', array('label' => false, 'maxlength' => '500'));
                      ?></td>
            <td><?php echo $this->Form->input('Researcharticle.2.title_of_book', array('label' => false, 'maxlength' => '500')); ?></td>
            <td><?php echo $this->Form->input('Researcharticle.2.title_of_article', array('label' => false, 'maxlength' => '500')); ?></td>
            <td><?php echo $this->Form->input('Researcharticle.2.place_of_publication', array('label' => false, 'maxlength' => '500')); ?></td>
            <td><?php echo $this->Form->input('Researcharticle.2.publisher_isbn', array('label' => false, 'maxlength' => '500')); ?></td>
            <td><?php echo $this->Form->input('Researcharticle.2.page_no', array('label' => false, 'maxlength' => '500')); ?></td>
        </tr>
        <tr>
            <td>4. </td>
            <td><?php echo $this->Form->input('Researcharticle.3.id', array('type' => 'hidden'));
                      echo $this->Form->input('Researcharticle.3.user_id', array('type' => 'hidden', 'value' => $this->Session->read('Auth.User.id')));
                      echo $this->Form->input('Researcharticle.3.type', array('type' => 'hidden', 'value' => 'books'));
                      echo $this->Form->input('Researcharticle.3.author', array('label' => false, 'maxlength' => '500'));
                      ?></td>
            <td><?php echo $this->Form->input('Researcharticle.3.title_of_book', array('label' => false, 'maxlength' => '500')); ?></td>
            <td><?php echo $this->Form->input('Researcharticle.3.title_of_article', array('label' => false, 'maxlength' => '500')); ?></td>
            <td><?php echo $this->Form->input('Researcharticle.3.place_of_publication', array('label' => false, 'maxlength' => '500')); ?></td>
            <td><?php echo $this->Form->input('Researcharticle.3.publisher_isbn', array('label' => false, 'maxlength' => '500')); ?></td>
            <td><?php echo $this->Form->input('Researcharticle.3.page_no', array('label' => false, 'maxlength' => '500')); ?></td>
        </tr>
        <tr>
            <td>5. </td>
            <td><?php echo $this->Form->input('Researcharticle.4.id', array('type' => 'hidden'));
                      echo $this->Form->input('Researcharticle.4.user_id', array('type' => 'hidden', 'value' => $this->Session->read('Auth.User.id')));
                      echo $this->Form->input('Researcharticle.4.type', array('type' => 'hidden', 'value' => 'books'));
                      echo $this->Form->input('Researcharticle.4.author', array('label' => false, 'maxlength' => '500'));
                      ?></td>
            <td><?php echo $this->Form->input('Researcharticle.4.title_of_book', array('label' => false, 'maxlength' => '500')); ?></td>
            <td><?php echo $this->Form->input('Researcharticle.4.title_of_article', array('label' => false, 'maxlength' => '500')); ?></td>
            <td><?php echo $this->Form->input('Researcharticle.4.place_of_publication', array('label' => false, 'maxlength' => '500')); ?></td>
            <td><?php echo $this->Form->input('Researcharticle.4.publisher_isbn', array('label' => false, 'maxlength' => '500')); ?></td>
            <td><?php echo $this->Form->input('Researcharticle.4.page_no', array('label' => false, 'maxlength' => '500')); ?></td>
        </tr>
    </table>
    <br />
    <strong>iv) Review Articles</strong>
    <table id="ResearchArticlesReview_table" border="2px solid black" style="border-right: 2px solid black !important;">
        <tr>
            <td width="5%">S. No.</td>
            <td width="20%"><?php echo $this->Form->label('Authors', 'Authors'); ?></td>
            <td width="20%"><?php echo $this->Form->label('TitleOfTheBook', 'Title of the Book'); ?></td>
            <td width="20%"><?php echo $this->Form->label('TitleOfTheArticle', 'Title of the Article'); ?></td>
            <td width="10%"><?php echo $this->Form->label('PlaceOfPublication', 'Place of Publication'); ?></td>
            <td width="20%"><?php echo $this->Form->label('PublisherISBN', 'Publisher & ISBN'); ?></td>
            <td width="10%"><?php echo $this->Form->label('PageNo', 'Page No.'); ?></td>
        </tr>
        <tr>
            <td>1. </td>
            <td><?php echo $this->Form->input('Researcharticle.5.id', array('type' => 'hidden'));
                      echo $this->Form->input('Researcharticle.5.user_id', array('type' => 'hidden', 'value' => $this->Session->read('Auth.User.id')));
                      echo $this->Form->input('Researcharticle.5.type', array('type' => 'hidden', 'value' => 'review'));
                      echo $this->Form->input('Researcharticle.5.author', array('label' => false, 'maxlength' => '500'));
                      ?></td>
            <td><?php echo $this->Form->input('Researcharticle.5.title_of_book', array('label' => false, 'maxlength' => '500')); ?></td>
            <td><?php echo $this->Form->input('Researcharticle.5.title_of_article', array('label' => false, 'maxlength' => '500')); ?></td>
            <td><?php echo $this->Form->input('Researcharticle.5.place_of_publication', array('label' => false, 'maxlength' => '500')); ?></td>
            <td><?php echo $this->Form->input('Researcharticle.5.publisher_isbn', array('label' => false, 'maxlength' => '500')); ?></td>
            <td><?php echo $this->Form->input('Researcharticle.5.page_no', array('label' => false, 'maxlength' => '500')); ?></td>
        </tr>
        <tr>
            <td>2. </td>
            <td><?php echo $this->Form->input('Researcharticle.6.id', array('type' => 'hidden'));
                      echo $this->Form->input('Researcharticle.6.user_id', array('type' => 'hidden', 'value' => $this->Session->read('Auth.User.id')));
                      echo $this->Form->input('Researcharticle.6.type', array('type' => 'hidden', 'value' => 'review'));
                      echo $this->Form->input('Researcharticle.6.author', array('label' => false, 'maxlength' => '500'));
                      ?></td>
            <td><?php echo $this->Form->input('Researcharticle.6.title_of_book', array('label' => false, 'maxlength' => '500')); ?></td>
            <td><?php echo $this->Form->input('Researcharticle.6.title_of_article', array('label' => false, 'maxlength' => '500')); ?></td>
            <td><?php echo $this->Form->input('Researcharticle.6.place_of_publication', array('label' => false, 'maxlength' => '500')); ?></td>
            <td><?php echo $this->Form->input('Researcharticle.6.publisher_isbn', array('label' => false, 'maxlength' => '500')); ?></td>
            <td><?php echo $this->Form->input('Researcharticle.6.page_no', array('label' => false, 'maxlength' => '500')); ?></td>
        </tr>
        <tr>
            <td>3. </td>
            <td><?php echo $this->Form->input('Researcharticle.7.id', array('type' => 'hidden'));
                      echo $this->Form->input('Researcharticle.7.user_id', array('type' => 'hidden', 'value' => $this->Session->read('Auth.User.id')));
                      echo $this->Form->input('Researcharticle.7.type', array('type' => 'hidden', 'value' => 'review'));
                      echo $this->Form->input('Researcharticle.7.author', array('label' => false, 'maxlength' => '500'));
                      ?></td>
            <td><?php echo $this->Form->input('Researcharticle.7.title_of_book', array('label' => false, 'maxlength' => '500')); ?></td>
            <td><?php echo $this->Form->input('Researcharticle.7.title_of_article', array('label' => false, 'maxlength' => '500')); ?></td>
            <td><?php echo $this->Form->input('Researcharticle.7.place_of_publication', array('label' => false, 'maxlength' => '500')); ?></td>
            <td><?php echo $this->Form->input('Researcharticle.7.publisher_isbn', array('label' => false, 'maxlength' => '500')); ?></td>
            <td><?php echo $this->Form->input('Researcharticle.7.page_no', array('label' => false, 'maxlength' => '500')); ?></td>
        </tr>
        <tr>
            <td>4. </td>
            <td><?php echo $this->Form->input('Researcharticle.8.id', array('type' => 'hidden'));
                      echo $this->Form->input('Researcharticle.8.user_id', array('type' => 'hidden', 'value' => $this->Session->read('Auth.User.id')));
                      echo $this->Form->input('Researcharticle.8.type', array('type' => 'hidden', 'value' => 'review'));
                      echo $this->Form->input('Researcharticle.8.author', array('label' => false, 'maxlength' => '500'));
                      ?></td>
            <td><?php echo $this->Form->input('Researcharticle.8.title_of_book', array('label' => false, 'maxlength' => '500')); ?></td>
            <td><?php echo $this->Form->input('Researcharticle.8.title_of_article', array('label' => false, 'maxlength' => '500')); ?></td>
            <td><?php echo $this->Form->input('Researcharticle.8.place_of_publication', array('label' => false, 'maxlength' => '500')); ?></td>
            <td><?php echo $this->Form->input('Researcharticle.8.publisher_isbn', array('label' => false, 'maxlength' => '500')); ?></td>
            <td><?php echo $this->Form->input('Researcharticle.8.page_no', array('label' => false, 'maxlength' => '500')); ?></td>
        </tr>
        <tr>
            <td>5. </td>
            <td><?php echo $this->Form->input('Researcharticle.9.id', array('type' => 'hidden'));
                      echo $this->Form->input('Researcharticle.9.user_id', array('type' => 'hidden', 'value' => $this->Session->read('Auth.User.id')));
                      echo $this->Form->input('Researcharticle.9.type', array('type' => 'hidden', 'value' => 'review'));
                      echo $this->Form->input('Researcharticle.9.author', array('label' => false, 'maxlength' => '500'));
                      ?></td>
            <td><?php echo $this->Form->input('Researcharticle.9.title_of_book', array('label' => false, 'maxlength' => '500')); ?></td>
            <td><?php echo $this->Form->input('Researcharticle.9.title_of_article', array('label' => false, 'maxlength' => '500')); ?></td>
            <td><?php echo $this->Form->input('Researcharticle.9.place_of_publication', array('label' => false, 'maxlength' => '500')); ?></td>
            <td><?php echo $this->Form->input('Researcharticle.9.publisher_isbn', array('label' => false, 'maxlength' => '500')); ?></td>
            <td><?php echo $this->Form->input('Researcharticle.9.page_no', array('label' => false, 'maxlength' => '500')); ?></td>
        </tr>
    </table>
    <br />
    <?php 
          echo $this->Form->input('Misc.id', array('type' => 'hidden'));
	  echo $this->Form->input('Misc.user_id', array('type' => 'hidden', 'value' => $this->Session->read('Auth.User.id')));
          echo $this->Form->input('Misc.tot_imp_fac_sci', array('label' => 'Total Impact Factor as per SCI/SCOPUS', 'maxlength' => '500'));
          echo $this->Form->input('Misc.tot_imp_fac_google', array('label' => 'Total Impact Factor as per Google Search', 'maxlength' => '500')); 
          echo $this->Form->input('Misc.h_index_scopus', array('label' => 'h-Index Factor as per SCOPUS', 'maxlength' => '500')); 
          echo $this->Form->input('Misc.h_index_google', array('label' => 'h-Index Factor as per Google search', 'maxlength' => '500')); 
          echo $this->Form->input('Misc.i10_index_google', array('label' => 'i-10 Index Factor as per Google ', 'maxlength' => '500')); 
          ?>
    
</div>
<div class="submit">
    <?php echo $this->Form->submit('Previous', array('name' => 'Previous', 'div' => false, 'formnovalidate' => true)); ?>
    <?php echo $this->Form->submit('Save & Continue', array('div' => false)); ?>
    <?php echo $this->Form->submit('Cancel', array('name' => 'Cancel', 'div' => false)); ?>
</div>
<?php echo $this->Form->end(); ?>
