<!--<div class="main_content_header">Download API Proforma: <a href="<?php echo $this->webroot . '/files/CAS-API-Score Sheet.xls'; ?>">Click Here</a></div> -->
<?php echo $this->element('nav-top');
/*echo $this->Html->script('jquery.ui.widget.js');
echo $this->Html->script('jquery.iframe-transport.js');
echo $this->Html->script('jquery.fileupload.js');*/
echo $this->Form->create('Document', array('id' => 'Image_Details', 'url' => Router::url( null, true ), 'type' => 'file')); ?>
<div class="main_content_header">7. Upload Documents</div>
<div id="contentContainer">
    <table>
        <tr>
            <td class="table_headertxt misc_col1" style="vertical-align: middle; padding-top: 5px;">Upload passport size photograph (.jpg format, min size 10 kb, max size 200 kb)<?php echo $this->Form->input('Document.id', array('type' => 'hidden'));
                                                                                                                                                                             echo $this->Form->input('Document.applicant_id', array('type' => 'hidden', 'value' => $this->Session->read('applicant_id')));   ?>
            <span style="color: red;">COMPULSORY</span>    
            </td>
            <td style="vertical-align: middle; padding-top: 5px;"><?php echo $this->Form->input('filename', array('label' => false, 'type' => 'file')); ?>
            </td>
        </tr>
        <tr>
            <td class="table_headertxt misc_col1" style="vertical-align: middle; padding-top: 5px;">Date of Birth Certificate - 10<sup>th</sup> / 11<sup>th</sup> / 10+2 Certificate - where DOB is mentioned (.jpg/.png/.gif/.pdf format, min size 10 kb, max size 200 kb)
            <span style="color: red;">COMPULSORY</span> 
            </td>
            <td style="vertical-align: middle; padding-top: 5px;"><?php echo $this->Form->input('filename2', array('label' => false, 'type' => 'file')); ?></td>
        </tr>
        <tr>
            <td class="table_headertxt misc_col1" style="vertical-align: middle; padding-top: 5px;">Caste Certificate, as per Central Govt. List (.jpg/.png/.gif/.pdf format, min size 10 kb, max size 200 kb)</td>
            <td style="vertical-align: middle; padding-top: 5px;"><?php echo $this->Form->input('filename3', array('label' => false, 'type' => 'file')); ?></td>
        </tr>
        <tr>
            <td class="table_headertxt misc_col1" style="vertical-align: middle; padding-top: 5px;">Signature of the candidate (.jpg format, min size 10 kb, max size 200 kb)
            <span style="color: red;">COMPULSORY</span> 
            </td>
            <td style="vertical-align: middle; padding-top: 5px;"><?php echo $this->Form->input('filename4', array('label' => false, 'type' => 'file')); ?></td>
        </tr>
        <?php if(!empty($applicant['Applicant']['post_applied_for']) && ($applicant['Applicant']['post_applied_for'] == "Professor" || $applicant['Applicant']['post_applied_for'] == "Associate Professor")) { ?>
        <tr>
            <td class="table_headertxt misc_col1" style="vertical-align: middle; padding-top: 5px;">API Proforma (MS Word format - <a href="<?php echo $this->webroot . '/files/Revised_API_Performa.doc'; ?>">Download</a>, To be filled and uploaded here, min size 10 kb, max size 800 kb)</td>
            <td style="vertical-align: middle; padding-top: 5px;"><?php echo $this->Form->input('filename5', array('label' => false, 'type' => 'file')); ?></td>
        </tr>
        <!--
        <tr>
            <td colspan="2" class="table_headertxt misc_col1" style="padding-top: 17px;">Selection Criteria (<a href="<?php echo $this->webroot . '/files/T_selection_criteria.pdf'; ?>">Download</a>, Computed Part A, Part B and Total Marks to be filled in next section.)</td>
        </tr>-->
        <?php } ?>
        <?php if(!empty($applicant['Applicant']['physically_disabled']) && $applicant['Applicant']['physically_disabled'] == "yes") { ?>
        <tr>
            <td class="table_headertxt misc_col1" style="vertical-align: middle; padding-top: 5px;">Person with Disability Certificate (.jpg/.png/.gif/.pdf format, min size 10 kb, max size 200 kb) <span style="color: red;">COMPULSORY</span> </td>
            <td style="vertical-align: middle; padding-top: 5px;"><?php echo $this->Form->input('filename8', array('label' => false, 'type' => 'file')); ?></td>
        </tr>
        <?php } ?>
        <tr>
            <td class="table_headertxt misc_col1" style="padding-top: 17px;">Note: Images can be uploaded using the mobile phone also.</td>
            <td></td>
        </tr>
    </table>
    
</div>
<div class="submit">
    <?php echo $this->Form->submit('Save & Continue', array('div' => false)); ?>
    <?php //echo $this->Form->submit('Cancel', array('name' => 'Cancel', 'div' => false)); 
          echo $this->Form->button('Reset', array(
            'type' => 'reset',
            'div' => false            
        ));
          ?>
</div>
<?php echo $this->Form->end(); ?>
<script>
    /*$(function () {
        $('#fileupload').fileupload({
            dataType: 'json',
            done: function (e, data) {
                $.each(data.result.files, function (index, file) {
                    $('<p/>').text(file.name).appendTo(document.body);
                });
            }
        });
    });*/
</script>