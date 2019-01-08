<?php

$key = isset($key) ? $key : '<%= key %>';

?>
<tr>
    <td>
    <?php   echo $this->Form->hidden("Ugcnet.{$key}.id");
            echo $this->Form->hidden("Ugcnet.{$key}.applicant_id");
            echo $this->Form->text("Ugcnet.{$key}.subject", array('type' => 'text',
                            'label' => false,
                            'div' => false)); ?></td>
    <td><?php echo $this->Form->text("Ugcnet.{$key}.month_year_passing", ['maxlength' => '4', 'div' => false, 'label' => false]); ?></td>
    <td><?php echo $this->Form->text("Ugcnet.{$key}.roll_no", ['maxlength' => '10', 'div' => false, 'label' => false]); ?></td>
    <td><?php echo $this->Form->input("Ugcnet.{$key}.net_jrf", array(
                    'options' => array(
                        'JRF' => 'JRF',
                        'NET' => 'NET',
                        'GATE' => 'GATE',
                        'GPAT' => 'GPAT',
                        'Any Qualifying National Level Test' => 'Any Qualifying National Level Test'),
                    'empty' => 'Select',
                    'style' => 'width: 100%;',
                    'label' => false,
                    'div' => false
                )); ?></td>
    <td><?php echo $this->Form->input("Ugcnet.{$key}.category", array(
                    'options' => array(
                        'General' => 'General',
                        'SC' => 'SC',
                        'ST' => 'ST',
                        'OBC' => 'OBC'),
                    'empty' => 'Select',
                    'style' => 'width: 100%;',
                    'label' => false,
                    'div' => false
                )); ?></td>
    <td><?php echo $this->Form->input("Ugcnet.{$key}.examining_body", array(
                    'options' => array(
                        'UGC' => 'UGC',
                        'CSIR' => 'CSIR',
                        'ICAR' => 'ICAR',
                        'ICMR' => 'ICMR',
                        'AICTE' => 'AICTE',
                        'PCI' => 'PCI',
                        'Any Qualifying National Level Test' => 'Any Qualifying National Level Test'),
                    'empty' => 'Select',
                    'style' => 'width: 100%;',
                    'label' => false,
                    'div' => false,
                    'id' => 'ugc_net_exam_type_select'
                )); ?></td>
    <td id="<?php echo "{$key}_any_other_test"?>"><?php echo $this->Form->input("Ugcnet.{$key}.any_other_test", ['maxlength' => '100', 'div' => false, 'label' => false]); ?></td>
    <td class="actions">
        <a href="#" class="remove">Delete Row</a>
    </td>
</tr>
