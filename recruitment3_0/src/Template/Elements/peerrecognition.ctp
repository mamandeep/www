<?php
$key = isset($key) ? $key : '<%= key %>';
?>
<tr>
    <td>
        <?php echo $this->Form->hidden("Peerrecognition.{$key}.id") ?>
        <?php echo $this->Form->hidden("Peerrecognition.{$key}.applicant_id") ?>
        <?php echo $this->Form->text("Peerrecognition.{$key}.award_honour"); ?>
    </td>   
    <td>
        <?php echo $this->Form->input("Peerrecognition.{$key}.agency", array(
                    'options' => array('Central Government' => 'Central Government',
                                       'Universities' => 'Universities',
                                       'PSU' => 'PSU',
                                       'Autonomous' => 'Autonomous',
                                       'Societies' => 'Societies'),
                    'label' => false,
                    'div' => false,
                    'style' => 'width: 100%'
                )); ?>
    </td>
    <td>
        <?php echo $this->Form->text("Peerrecognition.{$key}.year"); ?>
    </td>
    <td class="actions">
        <a href="#" class="remove">Delete Row</a>
    </td>
</tr>