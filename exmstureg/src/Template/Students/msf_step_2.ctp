  <style>
    .labelsp {
        margin-right: 20px;
    }
    .form-label {
    	padding-left: 0px;
    	text-align: center;
    }
    table {
    	table-layout: fixed;
    }
</style>
<div align="center">
<table>
    <tr>
        <td style="text-align: center;" class="form-label"><h2>CENTRAL UNIVERSITY OF PUNJAB<br>CITY CAMPUS, MANSA ROAD, BATHINDA - 151001</h2></td>
    </tr>
    <tr>
        <td style="text-align: center;" class="form-label"><h4>Student Registration</h4></td>
    </tr>
    <tr>
        <td style="text-align: center;" class="form-label"><h4>Application Form / Information Sheet</h4></td>
    </tr>
</table>
</div>
<?php 
    echo $this->Form->create($candidate);
    echo $this->Form->control("id", ['type' => 'hidden']); 
    echo $this->Form->control("user_id", ['type' => 'hidden']); ?>
<div>
<table width="100%">  
    <tr>
        <td width="25%" class="form-label">Nationality:</td>
        <td width="25%"><?php echo $this->Form->control('nationality', ['label' => false, 'empty' => ['select' => 'Select'],  'options' => ['Indian' => 'Indian'], 'type' => 'select' , 'id' => "id_nationality", 'maxlength' => '10']); ?></td>
        <td width="25%" class="form-label">Religion:</td>
        <td width="25%"><?php echo $this->Form->control('religion', ['label' => false, 'empty' => ['select' => 'Select'],  'options' => ['Hinduism' => 'Hinduism', 'Islam' => 'Islam', 'Christianity' => 'Christianity', 'Sikhism' => 'Sikhism', 'Buddhism' => 'Buddhism', 'Jainism' => 'Jainism', 'Other' => 'Other', 'Not specified' => 'Not specified'] , 'type' => 'select' , 'id' => "id_religion", 'maxlength'=>'30']); ?></td>
    </tr>
    <tr>
        <td width="25%" class="form-label">Category:</td>
        <td width="25%"><?php echo $this->Form->control('category', ['label' => false, 'empty' => ['select' => 'Select'],  'options' => ['SC'=>'SC', 'ST'=>'ST', 'OBC'=>'OBC', 'General'=>'General'], 'type' => 'select' , 'id' => "id_category", 'maxlength' => '15']); ?></td>
        <td width="25%" class="form-label">Sub-Category:</td>
        <td width="25%"><?php echo $this->Form->control('sub_category', ['label' => false, 'maxlength'=>'50']); ?></td>
    </tr>
    <tr>
        <td width="25%" class="form-label">Minority,if yes,mention the Minority:</td>
        <td width="25%"><?php echo $this->Form->control('minority', ['label' => false, 'empty' => ['select' => 'Select'],  'options' => ['Muslim'=>'Muslim', 'Sikh'=>'Sikh', 'Parsi'=>'Parsi', 'Buddhist'=>'Buddhist', 'Christian' => 'Christian', 'Jain'=>'Jain'], 'type' => 'select' , 'id' => "id_minority", 'maxlength' => '20']); ?></td>
        <td width="25%" class="form-label">Supernumerary Quota,if yes, please mention:</td>
        <td width="25%"><?php echo $this->Form->control('supernumerary', ['label' => false, 'empty' => ['select' => 'Select'],  'options' => ['PWD'=>'PWD', 'WOD'=>'WOD', 'J&K'=>'J&K'], 'type' => 'select' , 'id' => "id_supernumerary", 'maxlength' => '15']); ?></td>
    </tr>
    <tr>
        <td width="25%" class="form-label">Annual Income of Parents (from all sources)(Rs.):</td>
        <td width="25%"><?php echo $this->Form->control('parents_income', ['label' => false, 'maxlength'=>'20']); ?></td>
        <td width="25%" class="form-label">Economically Deprived / Backward:</td>
        <td width="25%"><?php echo $this->Form->control('economically_backward', ['label' => false, 'empty' => ['select' => 'Select'],  'options' => ['Yes'=>'Yes', 'No'=>'No'], 'type' => 'select' , 'id' => "id_supernumerary", 'maxlength' => '10']); ?></td>
    </tr>
    <tr>
        <td colspan="2" class="form-label">Any Card Holder (Yellow/BPL) if belongs to Economically Backward:</td>
        <td colspan="2"><?php echo $this->Form->control('economically_backward_detail', ['label' => false, 'empty' => ['select' => 'Select'],  'options' => ['Yellow'=>'Yellow', 'BPL'=>'BPL'], 'type' => 'select' , 'id' => "id_economic_back_detail", 'maxlength' => '10']); ?></td>
    </tr>
    <tr>
        <td width="25%" class="form-label">Student Mobile No. (attached with Aadhaar):</td>
        <td width="25%"><?php echo $this->Form->control('mobile_no', ['label' => false, 'maxlength'=>'10', 'readonly' => 'readonly', 'value' => $registered_mobile_no]); ?></td>
        <td width="25%" class="form-label">Emergency Contact No. (Please fill Name of Person to be contact/Relationship with student in next line):</td>
        <td width="25%"><?php echo $this->Form->control('emer_contact_no', ['label' => false, 'maxlength'=>'10']); ?></td>
    </tr>
    <tr>
        <td width="25%" class="form-label">Name of Emergency Contact:</td>
        <td width="25%"><?php echo $this->Form->control('emer_name', ['label' => false, 'maxlength'=>'50']); ?></td>
        <td width="25%" class="form-label">Relationship with student:</td>
        <td width="25%"><?php echo $this->Form->control('emer_relation', ['label' => false, 'maxlength'=>'20']); ?></td>
    </tr>
    <tr>
        <td width="25%" class="form-label">Hosteler:</td>
        <td width="25%"><?php echo $this->Form->control('hosteler', ['label' => false, 'empty' => ['select' => 'Select'],  'options' => ['Yes' => 'Yes', 'No' => 'No'], 'type' => 'select' , 'id' => "id_hosteler", 'maxlength'=>'10']); ?></td>
        <td width="25%" class="form-label">Day Scholar: </td>
        <td width="25%"><?php echo $this->Form->control('day_scholar', ['label' => false, 'empty' => ['select' => 'Select'],  'options' => ['Yes' => 'Yes', 'No' => 'No'], 'type' => 'select' , 'id' => "id_dayscholar", 'maxlength'=>'10']); ?></td>
    </tr>
    <tr>
        <td width="25%" class="form-label">Fellowship (if any)(500 Characters):</td>
        <td width="25%"><?php echo $this->Form->control('fellowship', ['label' => false, 'maxlength'=>'500']); ?></td>
        <td class="form-label">Any Gap in Studies (500 Characters):</td>
        <td><?php echo $this->Form->control('gap_in_studies', ['label' => false, 'maxlength'=>'500']); ?></td>
    </tr>
    <tr>
        <td colspan="2" width="25%" class="form-label">Migration and Character certificate issued from previous University:</td>
        <td colspan="2" width="25%"><?php echo $this->Form->control('migration_character', ['label' => false, 'empty' => ['select' => 'Select'],  'options' => ['Yes' => 'Yes', 'No' => 'No'], 'type' => 'select' , 'id' => "id_migration", 'maxlength'=>'10']); ?></td>
    </tr>
    <tr>
        <td></td>
        <td class="form-label">
            <?php echo $this->Html->link('Previous step',
                    array('action' => 'msf_step', $params['currentStep'] -1),
                    array('class' => 'button btn btn-success')
                ); ?>
        </td>
        <td class="form-label">
            <?php echo $this->Form->button(__('Next step')); ?>
        </td>
        <td></td>
    </tr>
</table>
</div>
<?php   
         
        echo $this->Form->end(); ?>