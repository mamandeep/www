<?php
$key = isset($key) ? $key : '<%= key %>';
$rp = isset($rp) ? $rp : 'completed';
?>
<tr>
    <td>
        <?php echo $this->Form->hidden("Researchproject.{$key}.id"); ?>
        <?php echo $this->Form->hidden("Researchproject.{$key}.applicant_id"); ?>
        <?php echo $this->Form->text("Researchproject.{$key}.title"); ?>
    </td>
    <td>
        <?php echo $this->Form->text("Researchproject.{$key}.funding_agency"); ?>
    </td>
    <td>
        <?php echo $this->Form->input("Researchproject.{$key}.investigator", [
                                        'options' => array('PI' => 'PI',
                                                           'CO-PI' => 'CO-PI'
                                        ),
                                        'selected' => $rp,
                                        'label' => false,
                                        'div' => false,
                                        'style' => 'width: 100%']); ?>
    </td>
    <td>
        <?php echo $this->Form->text("Researchproject.{$key}.amount_of_grant"); ?>
    </td>
    <td>
        <?php echo $this->Form->text("Researchproject.{$key}.from_month_year"); ?>
    </td>
    <td>
        <?php echo $this->Form->text("Researchproject.{$key}.to_month_year"); ?>
    </td>
    <td>
        <?php 
                    echo $this->Form->input("Researchproject.{$key}.comp_ongoing", array(
                    'options' => array( 'Technical Report Submitted' => 'Technical Report Submitted',
                                        'completed' => 'Completed',
                                       'ongoing' => 'Ongoing'
                                       ),
                    'empty' => 'Select',
                    'label' => false,
                    'div' => false,
                    'style' => 'width: 100%'
                ));
                 ?>
    </td>
    <td class="actions">
        <a href="#" class="remove">Delete Row</a>
    </td>
</tr>