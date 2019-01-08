<?php echo $this->element('nav-top');
echo $this->Form->create('NewAPIScore', array('id' => 'Applicant_Details', 
                                'url' => Router::url( null, true ))); ?>
<input type="hidden" name="temp" value="1"/>
<table>
    <tr>
        <td class="table_headertxt" style="width: 30%">Shortlisting Criteria Form</td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td class="table_headertxt" style="width: 30%">Upload filled & scanned copy of Shortlisting Criteria Form in JPEG/PNG/GIF/PDF format,  (Click "Save & Continue" to upload filled Shortlisting Criteria Form and save other information) Maximum Size : 200 kb</td>
        <td><?php   echo $this->Form->input('Document.id', array('type' => 'hidden'));
                    echo $this->Form->input('Document.applicant_id', array('type' => 'hidden', 'value' => $this->Session->read('applicant_id')));
                    echo $this->Form->input('Document.filename7', array('label' => false, 'type' => 'file')); ?></td>
        <td></td>
    </tr>
    <tr>
        <td><?php echo $this->Form->input('NewAPIScore.id', array('type' => 'hidden'));
                  echo $this->Form->input('NewAPIScore.criteria_partA', array('label' => 'Shortlisting Criteria Part A', 'maxlength' => '10')); ?></td>
        <td style="width: 30%"><?php echo $this->Form->input('NewAPIScore.criteria_partB', array('label' => 'Shortlisting Criteria Part B', 'maxlength' => '10')); ?></td>
        <td style="width: 30%"><?php echo $this->Form->input('NewAPIScore.criteria_totalAB', array('label' => 'Shortlisting Criteria Total (Part A + Part B)', 'maxlength' => '10')); ?></td>
    </tr>
</table>
<br/>
<?php if(isset($this->request->data['NewAPIScore']) && ($this->request->data['NewAPIScore']['post_applied_for'] == "Professor" || $this->request->data['NewAPIScore']['post_applied_for'] == "Associate Professor")) { ?>
<table>
    <tr>
        <td class="table_headertxt">
            <div>API Score Details</div>
        </td>
        <td></td>
        <!--<td class="table_headertxt misc_col1" style="padding-top: 17px;">API Proforma (MS Word format - <a href="<?php echo $this->webroot . '/files/API Form.doc'; ?>">Click Here to Download</a>, To be filled and uploaded)</td>-->
        <td></td>
    </tr>
    <tr>
        <td style="width: 30%"><?php echo $this->Form->input('NewAPIScore.id', array('type' => 'hidden'));
            echo $this->Form->input('NewAPIScore.apiscore_cat_2', array('label' => 'API Score Category II:', 'maxlength' => '10'));
         ?></td>
        <td style="width: 30%"><?php echo $this->Form->input('NewAPIScore.apiscore_cat_3', array('label' => 'API Score Category III:', 'maxlength' => '10'));
        ?></td>
        <td style="width: 30%"><?php 
            echo $this->Form->input('NewAPIScore.totalapiscore_cat_2_3', array('label' => 'Total API Score Category II & III:', 'maxlength' => '10'));
        ?></td>
    </tr>
</table>
<?php } ?>
<br/>
<div class="submit">
    <?php echo $this->Form->submit('Save & Continue', array('div' => false)); ?>
    <?php //echo $this->Form->submit('Cancel', array('name' => 'Cancel', 'div' => false)); ?>
</div>
<?php echo $this->Form->end(); ?>