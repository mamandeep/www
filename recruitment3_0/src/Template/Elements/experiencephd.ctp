<?php
$key = isset($key) ? $key : '<%= key %>';
$org = isset($org) ? $org : 'Central Government';
?>
<tr>
    <td>
        <?php echo $this->Form->hidden("Experiencephd.{$key}.id") ?>
        <?php echo $this->Form->hidden("Experiencephd.{$key}.applicant_id") ?>
        <?php echo $this->Form->text("Experiencephd.{$key}.designation"); ?>
    </td>
    <?php /*
    <td>
        <?php echo $this->Form->text("Experiencephd.{$key}.scale_of_pay"); ?>
    </td>
    <td>
        <?php echo $this->Form->text("Experiencephd.{$key}.agp"); ?>
    </td>
     */
    ?>
    <td>
        <?php echo $this->Form->text("Experiencephd.{$key}.name_address"); ?>
    </td>
    <?php /*
    <td>
        <?php 
                    echo $this->Form->input("Experiencephd.{$key}.institute_type", array(
                    'options' => array('Central Government' => 'Central Govt.',
                                       'State Government' => 'State Govt.',
                                       'Autonomous' => 'Autonomous',
                                       'Government Aided' => 'Govt. Aided',
                                       'Private' => 'Private',
                                       'Other' => 'Other'),
                    'selected' => $org,
                    'label' => false,
                    'div' => false
                ));
                 ?>
    </td>
     */ ?>
    
    <td>
        <?php echo $this->Form->text("Experiencephd.{$key}.from_date"); ?>
    </td>
    <td>
        <?php echo $this->Form->text("Experiencephd.{$key}.to_date"); ?>
    </td>
    <td>
        <?php echo $this->Form->text("Experiencephd.{$key}.no_of_mnths_yrs"); ?>
    </td>
    <td>
        <?php echo $this->Form->input("Experiencephd.{$key}.nature_of_service", array(
            'options' => array(
                'Full Time' => 'Full Time',
                'Part Time' => 'Part Time',
                'Guest Faculty' => 'Guest Faculty',
                'Adhoc' => 'Adhoc'
            ),
            'label' => false,
            'empty' => 'Select',
            'div' => false,
            'style' => 'width: 100%'
         )); ?>
    </td>
    <td>
        <?php echo $this->Form->input("Experiencephd.{$key}.work_load", array(
            'options' => array(
                'Yes' => 'Yes',
                'No' => 'No'
            ),
            'label' => false,
            'empty' => ['select' => 'Select'],
            'div' => false,
            'style' => 'width: 100%'
         )); ?>
    </td> 
    <td>
        <?php echo $this->Form->input("Experiencephd.{$key}.minimum_eligibility", array(
            'options' => array(
                'Yes' => 'Yes',
                'No' => 'No'
            ),
            'label' => false,
            'empty' => ['select' => 'Select'],
            'div' => false,
            'style' => 'width: 100%'
         )); ?>
    </td> 
    <td>
        <?php echo $this->Form->input("Experiencephd.{$key}.leave_taken", array(
            'options' => array(
                'Yes' => 'Yes',
                'No' => 'No'
            ),
            'label' => false,
            'empty' => ['select' => 'Select'],
            'div' => false,
            'style' => 'width: 100%'
         )); ?>
    </td> 
    <td>
        <?php echo $this->Form->text("Experiencephd.{$key}.leave_taken_from"); ?>
    </td>
    <td>
        <?php echo $this->Form->text("Experiencephd.{$key}.leave_taken_to"); ?>
    </td>
    <td class="actions">
        <a href="#" class="remove">Delete Row</a>
    </td>
</tr>