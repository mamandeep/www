<?php
$key = isset($key) ? $key : '<%= key %>';
?>
<tr>
    <td>
        <?php echo $this->Form->hidden("Education.{$key}.id") ?>
        <?php echo $this->Form->hidden("Education.{$key}.applicant_id") ?>
        <?php echo $this->Form->text("Education.{$key}.qualification"); ?>
    </td>   
    <td>
        <?php echo $this->Form->text("Education.{$key}.course"); ?>
    </td>
    <td>
        <?php echo $this->Form->text("Education.{$key}.board"); ?>
    </td>
    <td>
        <?php echo $this->Form->text("Education.{$key}.grade"); ?>
    </td>
    <td>
        <?php echo $this->Form->text("Education.{$key}.percentage"); ?>
    </td>
    <td>
        <?php echo $this->Form->text("Education.{$key}.year_of_passing"); ?>
    </td>
    <td>
        <?php echo $this->Form->text("Education.{$key}.subjects"); ?>
    </td>   
    <td class="actions">
        <a href="#" class="remove">Delete Row</a>
    </td>
</tr>