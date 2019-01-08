<?php
$key = isset($key) ? $key : '<%= key %>';
?>
<tr>
    <td>
        <?php echo $this->Form->hidden("Seminarorganized.{$key}.id"); ?>
        <?php echo $this->Form->hidden("Seminarorganized.{$key}.applicant_id"); ?>
        <?php echo $this->Form->text("Seminarorganized.{$key}.title"); ?>
    </td>
    <?php /*
    <td>
        <?php echo $this->Form->text("Seminarorganized.{$key}.international_no"); ?>
    </td>
    <td>
        <?php echo $this->Form->text("Seminarorganized.{$key}.total"); ?>
    </td>*/ ?>
    <td>
        <?php echo $this->Form->text("Seminarorganized.{$key}.source_of_funding"); ?>
    </td>
    <td class="actions">
        <a href="#" class="remove">Delete Row</a>
    </td>
</tr>