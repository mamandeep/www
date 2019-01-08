<?php echo $this->element('nav-top');
echo $this->Html->script('papers');
echo $this->Html->script('articles');
echo $this->Html->script('articlesconference');
echo $this->Html->script('articleperiodical');
echo $this->Html->script('researchproject');
echo $this->Html->script('seminarorganized');

//print_r($this->request->data);
/*
echo $this->Form->create('Document', array('id' => 'Document_Details', 'url' => Router::url(['controller' => 'form', 'action' => 'uploadresearchpapers'], true ), 'enctype' => 'multipart/form-data')); ?>
<div style="font-family: sans-serif; font-size: 20px; font-weight: bold">If you have many research papers, <a href="<?php echo $this->webroot . '/files/ResearchPapersFormat.xls'; ?>">click here</a> to download Excel, fill it, save as CSV file, then upload the document in CSV Format. (Click "Upload" to upload file. Please note that previously saved changes will be over-written.)</div>
<?php   echo $this->Form->input('Document.id', array('type' => 'hidden'));
        echo $this->Form->input('Document.applicant_id', array('type' => 'hidden', 'value' => $this->Session->read('applicant_id')));
        echo $this->Form->input('Document.filename8', array('label' => false, 'type' => 'file'));  ?>
<div class="submit">
    <?php echo $this->Form->submit('Upload', array('id' => 'fileUpload' , 'div' => false)); ?>
</div>
<?php echo $this->Form->end(); */ ?>
<?php echo $this->Form->create('ResearchPaper', array('id' => 'Researchpaper_Details', 'url' => Router::url( null, true ), 'enctype' => 'multipart/form-data')); ?>
<div class="main_content_header">4. Research Work</div>
<?php
      echo $this->Form->input('Applicant.rp_in_journals', array(
                        'options' => array('yes' => 'Yes',
                                           'no' => 'No'),
                        'empty' => '-Select-',
                        'label' => 'Whether you have published Original Research Papers in Journals?',
                        'id' => 'rp_in_journals_select'
                    ));  ?>
<input type="hidden" name="modified_papers" id="modified_papers" value="false" />
<input type="hidden" name="glob_userId" id="glob_userId" value="<?php echo $this->Session->read('applicant_id'); ?>" />
<fieldset>
    <table id="paper-table">
        <thead>
            <tr>
                <th width="10%">Name of Author(s)</th>
                <th width="30%">Title of the Paper</th>
                <th width="10%">Journal No. as per UGC List</th>
                <th width="20%">Journal's Name & Place of Publication</th>
                <th width="10%">ISSN or DOI</th>
                <th width="10%">Vol./Page No/Year</th>
                <th width="10%">Impact Factor Thomson Reuters</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                if (is_array($this->request->data['Researchpaper'])) {
                    for ($key = 0; $key < count($this->request->data['Researchpaper']); $key++) {
                        echo $this->element('papers', array('key' => $key));
                    }
                }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="7"></td>
                <td class="actions">
                    <a href="#" class="add">Add Row</a>
                </td>
            </tr>
        </tfoot>
    </table>
</fieldset>

<script id="paper-template" type="text/x-underscore-template">
    <?php echo $this->element('papers');?>
</script>

<?php
      echo $this->Form->input('Applicant.ra_in_books', array(
                        'options' => array('yes' => 'Yes',
                                           'no' => 'No'),
                        'empty' => '-Select-',
                        'label' => 'Whether you have published Research Articles in Books?',
                        'id' => 'ra_in_books_select'
                    ));  ?>
<input type="hidden" name="modified_articles" id="modified_articles" value="false" />
<fieldset>
    <table id="article-table" width="100%">
        <thead>
            <tr>
                <th width="15%">Name of Author(s)</th>
                <th width="25%">Title of the Book</th>
                <th width="10%">Editor of the Book</th>
                <th width="25%">Title of the Article</th>
                <th width="5%">Name of Publisher & ISBN</th>
                <th width="5%">Place of Publication</th>
                <th width="5%">Page No.</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                if (is_array($this->request->data['Researcharticle'])) {
                    for ($key = 0; $key < count($this->request->data['Researcharticle']); $key++) {
                        echo $this->element('article', array('key' => $key));
                    }
                }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="7"></td>
                <td class="actions">
                    <a href="#" class="add">Add Row</a>
                </td>
            </tr>
        </tfoot>
    </table>
</fieldset>
<script id="article-template" type="text/x-underscore-template">
    <?php echo $this->element('article');?>
</script>


<?php
      echo $this->Form->input('Applicant.ra_in_conference', array(
                        'options' => array('yes' => 'Yes',
                                           'no' => 'No'),
                        'empty' => '-Select-',
                        'label' => 'Whether you have published Research Papers in Conference proceedings?',
                        'id' => 'ra_in_conference_select'
                    ));  ?>
<input type="hidden" name="modified_articles_conference" id="modified_articles_conference" value="false" />
<fieldset>
    <table id="articleconference-table" width="100%">
        <thead>
            <tr>
                <th width="15%">Name of Author(s)</th>
                <th width="25%">Title of the Book</th>
                <th width="25%">Title of the Article</th>
                <th width="10%">Name of Publisher & ISBN</th>
                <th width="10%">Place of Publication</th>
                <th width="5%">Page No.</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                if (is_array($this->request->data['Articleconference'])) {
                    for ($key = 0; $key < count($this->request->data['Articleconference']); $key++) {
                        echo $this->element('articleconference', array('key' => $key));
                    }
                }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="6"></td>
                <td class="actions">
                    <a href="#" class="add">Add Row</a>
                </td>
            </tr>
        </tfoot>
    </table>
</fieldset>
<script id="articleconference-template" type="text/x-underscore-template">
    <?php echo $this->element('articleconference');?>
</script>

<?php
      echo $this->Form->input('Applicant.pa_in_periodicals', array(
                        'options' => array('yes' => 'Yes',
                                           'no' => 'No'),
                        'empty' => '-Select-',
                        'label' => 'Whether you have published Popular Articles in Periodicals?',
                        'id' => 'pa_in_periodicals_select'
                    ));  ?>
<input type="hidden" name="modified_articles_periodicals" id="modified_articles_periodicals" value="false" />
<fieldset>
    <table id="articleperiodical-table" width="100%">
        <thead>
            <tr>
                <th width="15%">Name of Author(s)</th>
                <th width="25%">Title of the Book</th>
                <th width="25%">Title of the Article</th>
                <th width="10%">Name of Publisher & ISBN</th>
                <th width="10%">Place of Publication</th>
                <th width="5%">Page No.</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                if (is_array($this->request->data['Articleperiodical'])) {
                    for ($key = 0; $key < count($this->request->data['Articleperiodical']); $key++) {
                        echo $this->element('articleperiodical', array('key' => $key));
                    }
                }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="6"></td>
                <td class="actions">
                    <a href="#" class="add">Add Row</a>
                </td>
            </tr>
        </tfoot>
    </table>
</fieldset>
<script id="articleperiodical-template" type="text/x-underscore-template">
    <?php echo $this->element('articleperiodical');?>
</script>

<?php
      echo $this->Form->input('Applicant.em_research', array(
                        'options' => array('yes' => 'Yes',
                                           'no' => 'No'),
                        'empty' => '-Select-',
                        'label' => 'Whether you have Extra Mural Research Funding / R&D Projects?',
                        'id' => 'em_research_select'
                    ));  ?>
<input type="hidden" name="modified_rp" id="modified_rp" value="false" />
<fieldset>
    <table id="rp-table">
        <thead>
            <tr>
                <th>Title of the Project(s)</th>
                <th>Funding Agency</th>
                <th>As PI/CO-PI</th>
                <th>Amount of total grant</th>
                <th>From (Month & Year)</th>
                <th>To (Month & Year)</th>
                <th>Status</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                if (is_array($this->request->data['Researchproject'])) {
                    for ($key = 0; $key < count($this->request->data['Researchproject']); $key++) {
                        echo $this->element('researchproject', array('key' => $key,
                                                                     'rp' => (!empty($this->request->data['Researchproject'][$key]['comp_ongoing']) ? $this->request->data['Researchproject'][$key]['comp_ongoing'] : 'completed' )));
                    }
                }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="7"></td>
                <td class="actions">
                    <a href="#" class="add">Add Row</a>
                </td>
            </tr>
        </tfoot>
    </table>
</fieldset>
<script id="rp-template" type="text/x-underscore-template">
    <?php echo $this->element('researchproject'); ?>
</script>
<br/><br/>
<?php
      echo $this->Form->input('Applicant.seminar_attended', array(
                        'options' => array('yes' => 'Yes',
                                           'no' => 'No'),
                        'empty' => '-Select-',
                        'label' => 'Whether you have attended Seminars / Conferences / Workshops / Training programmes?',
                        'id' => 'seminar_attended_select'
                    ));  ?>
<table border="1px solid black" width="100%" id="seminars_attended" style="border-collapse: collapse; border-right: 1px solid black; " >
    <tr>
        <td width="30%" class="table_headertxt">Seminars / Conferences / Workshops / Training programmes attended.</td>
        <td class="table_headertxt">National (No.)</td>
        <td class="table_headertxt">International (No.)</td>
        <td class="table_headertxt">Total (No.)</td>
    </tr>
    <tr>
        <td></td>
        <td><?php echo $this->Form->input('Applicant.sem_att_national', array('label' => false, 'maxlength' => '500')); ?></td>
        <td><?php echo $this->Form->input('Applicant.sem_att_international', array('label' => false, 'maxlength' => '500')); ?></td>
        <td><?php echo $this->Form->input('Applicant.sem_att_total', array('label' => false, 'maxlength' => '500')); ?></td>
    </tr>
</table>
<br/>
<br/>
<?php
      echo $this->Form->input('Applicant.seminar_organized', array(
                        'options' => array('yes' => 'Yes',
                                           'no' => 'No'),
                        'empty' => '-Select-',
                        'label' => 'Whether you have organized Seminars / Conferences / Workshops / Training programmes?',
                        'id' => 'seminar_organized_select'
                    ));  ?>
<input type="hidden" name="modified_org" id="modified_org" value="false" />
<fieldset>
    <table id="semorg-table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Source of Funding</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                if (is_array($this->request->data['Seminarorganized'])) {
                    for ($key = 0; $key < count($this->request->data['Seminarorganized']); $key++) {
                        echo $this->element('seminarorganized', array('key' => $key));
                    }
                }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2"></td>
                <td class="actions">
                    <a href="#" class="add">Add Row</a>
                </td>
            </tr>
        </tfoot>
    </table>
</fieldset>
<script id="semorg-template" type="text/x-underscore-template">
    <?php echo $this->element('seminarorganized'); ?>
</script>
<br/>
<br/>
<table border="1px solid black" width="100%" id="research_guidance" style="border-collapse: collapse; border-right: 1px solid black;  ">
    <tr>
        <td width="30%" class="table_headertxt">Research Guidance (No. of students guided)</td>
        <td class="table_headertxt"></td>
        <td class="table_headertxt">M.Phil. / Equivalent (No.)</td>
        <td class="table_headertxt">Ph.D. (No.)</td>
    </tr>
    <tr>
        <td rowspan="2" class="table_headertxt" style="padding-top: 20px;">Successfully Completed</td>
        <td class="table_headertxt">a) Independent</td>
        <td><?php echo $this->Form->input('Applicant.rg_mphil_completed', array('label' => false, 'maxlength' => '500')); ?></td>
        <td><?php echo $this->Form->input('Applicant.rg_phd_completed', array('label' => false, 'maxlength' => '500')); ?></td>
    </tr>
    <tr>
        <td class="table_headertxt">b) as Co-Supervisor</td>
        <td><?php echo $this->Form->input('Applicant.rg_mphil_completed_asco', array('label' => false, 'maxlength' => '500')); ?></td>
        <td><?php echo $this->Form->input('Applicant.rg_phd_completed_asco', array('label' => false, 'maxlength' => '500')); ?></td>
    </tr>
    <tr>
        <td rowspan="2" class="table_headertxt" style="padding-top: 20px;">Under supervision</td>
        <td class="table_headertxt">a) Independent</td>
        <td><?php echo $this->Form->input('Applicant.rg_mphil_undersup', array('label' => false, 'maxlength' => '500')); ?></td>
        <td><?php echo $this->Form->input('Applicant.rg_phd_undersup', array('label' => false, 'maxlength' => '500')); ?></td>
    </tr>
    <tr>
        <td class="table_headertxt">b) as Co-Supervisor</td>
        <td><?php echo $this->Form->input('Applicant.rg_mphil_undersup_asco', array('label' => false, 'maxlength' => '500')); ?></td>
        <td><?php echo $this->Form->input('Applicant.rg_phd_undersup_asco', array('label' => false, 'maxlength' => '500')); ?></td>
    </tr>
</table>
<br/>
<table width="100%" id="factors_disable">
    <tr>
        <td width="50%" class="table_headertxt" style="padding: .5em; vertical-align: middle; ">Total Impact Factor of publications as per SCOPUS</td>
        <td class="table_headertxt"><?php echo $this->Form->input('Applicant.id', array('type', 'hidden'));
                                        echo $this->Form->input('Applicant.tot_impact_sci', array('label' => false, 'maxlength' => '20')); ?></td>
        <td width="20%" class="table_headertxt"></td>
    </tr>
    <tr>
        <td class="table_headertxt" style="padding: .5em; vertical-align: middle; ">Total Impact Factor of publications as per Web of Science</td>
        <td class="table_headertxt"><?php echo $this->Form->input('Applicant.tot_impact_webofscience', array('label' => false, 'maxlength' => '20')); ?></td>
        <td class="table_headertxt"></td>
    </tr>
    <tr>
        <td class="table_headertxt" style="padding: .5em; vertical-align: middle;">Total Impact Factor of publications as per Google Scholar</td>
        <td class="table_headertxt"><?php echo $this->Form->input('Applicant.tot_impact_google', array('label' => false, 'maxlength' => '20')); ?></td>
        <td class="table_headertxt"></td>
    </tr>
    <tr>
        <td class="table_headertxt" style="padding: .5em; vertical-align: middle;"><i>h-</i>Index as per SCOPUS</td>
        <td class="table_headertxt"><?php echo $this->Form->input('Applicant.h_index_scopus', array('label' => false, 'maxlength' => '20')); ?></td>
        <td class="table_headertxt"></td>
    </tr>
    <tr>
        <td class="table_headertxt" style="padding: .5em; vertical-align: middle;"><i>h-</i>Index as per Web of Science</td>
        <td class="table_headertxt"><?php echo $this->Form->input('Applicant.h_index_webofscience', array('label' => false, 'maxlength' => '20')); ?></td>
        <td class="table_headertxt"></td>
    </tr>
    <tr>
        <td class="table_headertxt" style="padding: .5em; vertical-align: middle;"><i>h-</i>Index as per Google Scholar</td>
        <td class="table_headertxt"><?php echo $this->Form->input('Applicant.h_index_google', array('label' => false, 'maxlength' => '20')); ?></td>
        <td class="table_headertxt"></td>
    </tr>
    <tr>
        <td class="table_headertxt" style="padding: .5em; vertical-align: middle;">No. of Citations as per SCOPUS</td>
        <td class="table_headertxt"><?php echo $this->Form->input('Applicant.no_of_citations_scopus', array('label' => false, 'maxlength' => '20')); ?></td>
        <td class="table_headertxt"></td>
    </tr>
    <tr>
        <td class="table_headertxt" style="padding: .5em; vertical-align: middle;">No. of Citations as per Web of Science</td>
        <td class="table_headertxt"><?php echo $this->Form->input('Applicant.no_of_citations_webofscience', array('label' => false, 'maxlength' => '20')); ?></td>
        <td class="table_headertxt"></td>
    </tr>
    <tr>
        <td class="table_headertxt" style="padding: .5em; vertical-align: middle;">No. of Citations as per Google Scholar</td>
        <td class="table_headertxt"><?php echo $this->Form->input('Applicant.no_of_citations_google', array('label' => false, 'maxlength' => '20')); ?></td>
        <td class="table_headertxt"></td>
    </tr>
    <!--
    <tr>
        <td class="table_headertxt" style="padding: .5em; vertical-align: middle;"><i>i-</i>10 Index Factor as per Google search</td>
        <td class="table_headertxt"><?php echo $this->Form->input('Applicant.i10_index_google', array('label' => false, 'maxlength' => '500')); ?></td>
        <td class="table_headertxt"></td>
    </tr>-->
</table>
<br/>
<br/>
<div class="submit">
    <?php echo $this->Form->submit('Save & Continue', array('id' => 'formSubmit' , 'div' => false)); ?>
    <?php //echo $this->Form->submit('Cancel', array('name' => 'Cancel', 'div' => false));
          echo $this->Form->button('Reset', array(
            'type' => 'reset',
            'div' => false            
        ));?>
</div>
<?php echo $this->Form->end(); ?>
<script type="text/javascript">
    $(document).ready(function() {
        
        if($("#rp_in_journals_select option:selected").text() === "Yes") {
            $('#paper-table').css('display', 'table');
        }
        else {
            $('#paper-table').css('display', 'none');
        }
        
        if($("#ra_in_books_select option:selected").text() === "Yes") {
            $('#article-table').css('display', 'table');
        }
        else {
            $('#article-table').css('display', 'none');
        }
        
        if($("#ra_in_conference_select option:selected").text() === "Yes") {
            $('#articleconference-table').css('display', 'table');
        }
        else {
            $('#articleconference-table').css('display', 'none');
        }
        
        if($("#pa_in_periodicals_select option:selected").text() === "Yes") {
            $('#articleperiodical-table').css('display', 'table');
        }
        else {
            $('#articleperiodical-table').css('display', 'none');
        }
        
        if($("#em_research_select option:selected").text() === "Yes") {
            $('#rp-table').css('display', 'table');
        }
        else {
            $('#rp-table').css('display', 'none');
        }
        
        if($("#seminar_attended_select option:selected").text() === "Yes") {
            $('#seminars_attended').css('display', 'table');
        }
        else {
            $('#seminars_attended').css('display', 'none');
        }
        
        if($("#seminar_organized_select option:selected").text() === "Yes") {
            $('#semorg-table').css('display', 'table');
        }
        else {
            $('#semorg-table').css('display', 'none');
        }
        
        $("select[name='data[Applicant][rp_in_journals]']").change(function(){
            if($(this).val() === 'no') {
                $('#paper-table').each(function(){
                    $(this).css('display','none');
                });
            }
            else {
                $('#paper-table').each(function(){
                    $(this).css('display','table');
                });
            }
        });
        
        $("select[name='data[Applicant][ra_in_books]']").change(function(){
            if($(this).val() === 'no') {
                $('#article-table').each(function(){
                    $(this).css('display','none');
                });
            }
            else {
                $('#article-table').each(function(){
                    $(this).css('display','table');
                });
            }
        });
        
        $("select[name='data[Applicant][ra_in_conference]']").change(function(){
            if($(this).val() === 'no') {
                $('#articleconference-table').each(function(){
                    $(this).css('display','none');
                });
            }
            else {
                $('#articleconference-table').each(function(){
                    $(this).css('display','table');
                });
            }
        });
        
        $("select[name='data[Applicant][pa_in_periodicals]']").change(function(){
            if($(this).val() === 'no') {
                $('#articleperiodical-table').each(function(){
                    $(this).css('display','none');
                });
            }
            else {
                $('#articleperiodical-table').each(function(){
                    $(this).css('display','table');
                });
            }
        });
        
        $("select[name='data[Applicant][em_research]']").change(function(){
            if($(this).val() === 'no') {
                $('#rp-table').each(function(){
                    $(this).css('display','none');
                });
            }
            else {
                $('#rp-table').each(function(){
                    $(this).css('display','table');
                });
            }
        });
        
        $("select[name='data[Applicant][seminar_attended]']").change(function(){
            if($(this).val() === 'no') {
                $('#seminars_attended').each(function(){
                    $(this).css('display','none');
                });
            }
            else {
                $('#seminars_attended').each(function(){
                    $(this).css('display','table');
                });
            }
        });
        
        $("select[name='data[Applicant][seminar_organized]']").change(function(){
            if($(this).val() === 'no') {
                $('#semorg-table').each(function(){
                    $(this).css('display','none');
                });
            }
            else {
                $('#semorg-table').each(function(){
                    $(this).css('display','table');
                });
            }
        });
    });
</script>