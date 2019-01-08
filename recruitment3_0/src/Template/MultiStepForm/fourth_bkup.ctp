<?php

echo $this->Form->create('Miscexp', array('id' => 'Miscexp_Details', 'url' => Router::url( null, true ))); ?>
<h2>Step 4: Nature of Experience</h2>
<div id="contentContainer">
    <table id="exp_table" border="2px solid black" style="border-right: 2px solid black !important;">
        <tr>
            <td width="50%"><?php echo $this->Form->label('Teaching', 'Teaching'); ?></td>
            <td width="25%"><?php echo $this->Form->label('NoOfYears', 'No. of Years'); ?></td>
            <td width="25%"><?php echo $this->Form->label('NoOfMonths', 'No. of Months'); ?></td>
            <!--<td width="20%"><?php echo $this->Form->label('SrNoOfProofEnclosed', 'Sr. no. of proof enclosed'); ?></td>-->
        </tr>
        <tr>
            <td>i) Under-graduate level<?php echo $this->Form->input('Miscexp.id', array('type', 'hidden'));
                      echo $this->Form->input('Miscexp.user_id', array('type' => 'hidden', 'value' => $this->Session->read('Auth.User.id'))); 
                  ?></td>
            <td><?php echo $this->Form->input('Miscexp.ug_no_yrs', array('label' => false, 'maxlength' => '500')); ?></td>
            <td><?php echo $this->Form->input('Miscexp.ug_no_mnths', array('label' => false, 'maxlength' => '500')); ?></td>
            <!--<td><?php echo $this->Form->input('Miscexp.ug_sr_proof', array('label' => false, 'maxlength' => '500')); ?></td>-->
        </tr>
        <tr>
            <td>ii) Post-graduate level</td>
            <td><?php echo $this->Form->input('Miscexp.pg_no_yrs', array('label' => false, 'maxlength' => '500')); ?></td>
            <td><?php echo $this->Form->input('Miscexp.pg_no_mnths', array('label' => false, 'maxlength' => '500')); ?></td>
            <!--<td><?php echo $this->Form->input('Miscexp.pg_sr_proof', array('label' => false, 'maxlength' => '500')); ?></td>-->
        </tr>
        <tr>
            <td>iii) Post-doctoral experience</td>
            <td><?php echo $this->Form->input('Miscexp.pd_no_yrs', array('label' => false, 'maxlength' => '500')); ?></td>
            <td><?php echo $this->Form->input('Miscexp.pd_no_mnths', array('label' => false, 'maxlength' => '500')); ?></td>
            <!--<td><?php echo $this->Form->input('Miscexp.pd_sr_proof', array('label' => false, 'maxlength' => '500')); ?></td>-->
        </tr>
        <tr>
            <td>iv) Other experience, if any</td>
            <td><?php echo $this->Form->input('Miscexp.ot_no_yrs', array('label' => false, 'maxlength' => '500')); ?></td>
            <td><?php echo $this->Form->input('Miscexp.ot_no_mnths', array('label' => false, 'maxlength' => '500')); ?></td>
            <!--<td><?php echo $this->Form->input('Miscexp.ot_sr_proof', array('label' => false, 'maxlength' => '500')); ?></td>-->
        </tr>
        <tr>
            <td>Total Experience</td>
            <td><?php echo $this->Form->input('Miscexp.tot_no_yrs', array('label' => false, 'maxlength' => '500')); ?></td>
            <td><?php echo $this->Form->input('Miscexp.tot_no_mnths', array('label' => false, 'maxlength' => '500')); ?></td>
            <!--<td></td>-->
        </tr>
    </table>
    <br />
    <strong>Details of Post doctoral experience *</strong>
    <table id="postdoc_exp_table" border="2px solid black" style="border-right: 2px solid black !important;">
        <tr>
            <td width="25%"><?php echo $this->Form->label('Agency', 'Agency'); ?></td>
            <td width="35%"><?php echo $this->Form->label('HostInstitute', 'Host Institute'); ?></td>
            <td width="10%"><?php echo $this->Form->label('FromDate', 'From date'); ?></td>
            <td width="10%"><?php echo $this->Form->label('ToDate', 'To date'); ?></td>
            <td width="20%"><?php echo $this->Form->label('Duration', 'Duration'); ?></td>
            <!--<td width="15%"><?php echo $this->Form->label('SrNoOfProofEnclosed', 'Sr. No. of proof enclosed'); ?></td>-->
        </tr>
        <tr>
            <td><?php echo $this->Form->input('Miscexp.pdd_agency1', array('label' => false, 'maxlength' => '500')); ?></td>
            <td><?php echo $this->Form->input('Miscexp.pdd_institute1', array('label' => false, 'maxlength' => '500')); ?></td>
            <td><?php echo $this->Form->input('Miscexp.pdd_from_date1', array('label' => false, 'maxlength' => '500')); ?></td>
            <td><?php echo $this->Form->input('Miscexp.pdd_to_date1', array('label' => false, 'maxlength' => '500')); ?></td>
            <td><?php echo $this->Form->input('Miscexp.pdd_duration1', array('label' => false, 'maxlength' => '500')); ?></td>
            <!--<td><?php echo $this->Form->input('Miscexp.pdd_sr_proof1', array('label' => false, 'maxlength' => '500')); ?></td>-->
        </tr>
        <tr>
            <td><?php echo $this->Form->input('Miscexp.pdd_agency2', array('label' => false, 'maxlength' => '500')); ?></td>
            <td><?php echo $this->Form->input('Miscexp.pdd_institute2', array('label' => false, 'maxlength' => '500')); ?></td>
            <td><?php echo $this->Form->input('Miscexp.pdd_from_date2', array('label' => false, 'maxlength' => '500')); ?></td>
            <td><?php echo $this->Form->input('Miscexp.pdd_to_date2', array('label' => false, 'maxlength' => '500')); ?></td>
            <td><?php echo $this->Form->input('Miscexp.pdd_duration2', array('label' => false, 'maxlength' => '500')); ?></td>
            <!--<td><?php echo $this->Form->input('Miscexp.pdd_sr_proof2', array('label' => false, 'maxlength' => '500')); ?></td>-->
        </tr>
        <tr>
            <td><?php echo $this->Form->input('Miscexp.pdd_agency3', array('label' => false, 'maxlength' => '500')); ?></td>
            <td><?php echo $this->Form->input('Miscexp.pdd_institute3', array('label' => false, 'maxlength' => '500')); ?></td>
            <td><?php echo $this->Form->input('Miscexp.pdd_from_date3', array('label' => false, 'maxlength' => '500')); ?></td>
            <td><?php echo $this->Form->input('Miscexp.pdd_to_date3', array('label' => false, 'maxlength' => '500')); ?></td>
            <td><?php echo $this->Form->input('Miscexp.pdd_duration3', array('label' => false, 'maxlength' => '500')); ?></td>
            <!--<td><?php echo $this->Form->input('Miscexp.pdd_sr_proof3', array('label' => false, 'maxlength' => '500')); ?></td>-->
        </tr>
        <tr>
            <td><?php echo $this->Form->input('Miscexp.pdd_agency4', array('label' => false, 'maxlength' => '500')); ?></td>
            <td><?php echo $this->Form->input('Miscexp.pdd_institute4', array('label' => false, 'maxlength' => '500')); ?></td>
            <td><?php echo $this->Form->input('Miscexp.pdd_from_date4', array('label' => false, 'maxlength' => '500')); ?></td>
            <td><?php echo $this->Form->input('Miscexp.pdd_to_date4', array('label' => false, 'maxlength' => '500')); ?></td>
            <td><?php echo $this->Form->input('Miscexp.pdd_duration4', array('label' => false, 'maxlength' => '500')); ?></td>
            <!--<td><?php echo $this->Form->input('Miscexp.pdd_sr_proof4', array('label' => false, 'maxlength' => '500')); ?></td>-->
        </tr>
    </table>
</div>
<div class="submit">
    <?php echo $this->Form->submit('Previous', array('name' => 'Previous', 'div' => false, 'formnovalidate' => true)); ?>
    <?php echo $this->Form->submit('Save & Continue', array('div' => false)); ?>
    <?php echo $this->Form->submit('Cancel', array('name' => 'Cancel', 'div' => false)); ?>
</div>
<?php echo $this->Form->end(); ?>