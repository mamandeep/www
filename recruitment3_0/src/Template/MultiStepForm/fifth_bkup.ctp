<?php

echo $this->Form->create('Academic_dist', array('id' => 'Academic_dist_Details', 'url' => Router::url( null, true ))); ?>
<h2>Step 5: Academic Distinctions</h2>
<div id="contentContainer">
    <table id="dist_table" border="2px solid black" style="border-right: 2px solid black !important;">
        <tr>
            <td width="50%"><?php echo $this->Form->label('NameOfAcademicCourse', 'Name of Academic Course/Body'); ?></td>
            <td width="50%"><?php echo $this->Form->label('AcademicDistObtained', 'Academic Distinction obtained'); ?></td>
            <!--<td width="20%"><?php echo $this->Form->label('SrNoOfProofEnclosed', 'Sr. No. of proof Enclosed'); ?></td>-->
        </tr>
        <tr>
            <td><?php echo $this->Form->input('Academic_dist.0.id', array('type' => 'hidden'));
                      echo $this->Form->input('Academic_dist.0.user_id', array('type' => 'hidden', 'value' => $this->Session->read('Auth.User.id'))); 
                      echo $this->Form->input('Academic_dist.0.academic_course', array('label' => false, 'maxlength' => '500'));
                  ?></td>
            <td><?php echo $this->Form->input('Academic_dist.0.academic_dist', array('label' => false, 'maxlength' => '500')); ?></td>
            <!--<td><?php echo $this->Form->input('Academic_dist.0.sr_of_proof', array('label' => false, 'maxlength' => '500')); ?></td>-->
        </tr>
        <tr>
            <td><?php echo $this->Form->input('Academic_dist.1.id', array('type' => 'hidden'));
                      echo $this->Form->input('Academic_dist.1.user_id', array('type' => 'hidden', 'value' => $this->Session->read('Auth.User.id'))); 
                      echo $this->Form->input('Academic_dist.1.academic_course', array('label' => false, 'maxlength' => '500'));
                  ?></td>
            <td><?php echo $this->Form->input('Academic_dist.1.academic_dist', array('label' => false, 'maxlength' => '500')); ?></td>
            <!--<td><?php echo $this->Form->input('Academic_dist.1.sr_of_proof', array('label' => false, 'maxlength' => '500')); ?></td>-->
        </tr>
        <tr>
            <td><?php echo $this->Form->input('Academic_dist.2.id', array('type' => 'hidden'));
                      echo $this->Form->input('Academic_dist.2.user_id', array('type' => 'hidden', 'value' => $this->Session->read('Auth.User.id'))); 
                      echo $this->Form->input('Academic_dist.2.academic_course', array('label' => false, 'maxlength' => '500'));
                  ?></td>
            <td><?php echo $this->Form->input('Academic_dist.2.academic_dist', array('label' => false, 'maxlength' => '500')); ?></td>
            <!--<td><?php echo $this->Form->input('Academic_dist.2.sr_of_proof', array('label' => false, 'maxlength' => '500')); ?></td>-->
        </tr>
        <tr>
            <td><?php echo $this->Form->input('Academic_dist.3.id', array('type' => 'hidden'));
                      echo $this->Form->input('Academic_dist.3.user_id', array('type' => 'hidden', 'value' => $this->Session->read('Auth.User.id'))); 
                      echo $this->Form->input('Academic_dist.3.academic_course', array('label' => false, 'maxlength' => '500'));
                  ?></td>
            <td><?php echo $this->Form->input('Academic_dist.3.academic_dist', array('label' => false, 'maxlength' => '500')); ?></td>
            <!--<td><?php echo $this->Form->input('Academic_dist.3.sr_of_proof', array('label' => false, 'maxlength' => '500')); ?></td>-->
        </tr>
    </table>
</div>
<div class="submit">
    <?php echo $this->Form->submit('Previous', array('name' => 'Previous', 'div' => false, 'formnovalidate' => true)); ?>
    <?php echo $this->Form->submit('Save & Continue', array('div' => false)); ?>
    <?php echo $this->Form->submit('Cancel', array('name' => 'Cancel', 'div' => false)); ?>
</div>
<?php echo $this->Form->end(); ?>