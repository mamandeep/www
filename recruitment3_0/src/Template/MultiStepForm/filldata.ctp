<?php echo $this->Form->create('Applicantprefill', array('id' => 'Applicant_Details', 
                                'url' => Router::url( null, true ))); ?>
<table width="100%">
    <tr valign="bottom">
        <td width="30%"><?php echo $this->Form->input('Applicantprefill.id', array('type' => 'hidden'));
                  echo $this->Form->input('Applicantprefill.existing_id', array('type' => 'number', 'label' => 'Existing Application ID (for any one of the final submitted application form(s)):', 'maxlength' => '10')); ?></td>
        <td width="30%"><?php echo $this->Form->input('Applicantprefill.date_of_birth', array('type' => 'text', 'label' => 'Date of Birth (DD/MM/YYYY):', 'maxlength' => '10')); ?> </td>
        <td></td>
    </tr>
    <tr>
        <td><?php echo $this->Form->submit('Submit', array('div' => false)); echo $this->Form->button('Reset', array('type' => 'reset','div' => false)); ?></td>
    </tr>
</table>
<?php echo $this->Form->end(); ?>