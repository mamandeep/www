<?php
$key = isset($key) ? $key : '<%= key %>';
?>
<tr>
    <td>
        <?php echo $this->Form->hidden("Articleperiodical.{$key}.id"); ?>
        <?php echo $this->Form->hidden("Articleperiodical.{$key}.applicant_id"); ?>
        <?php echo $this->Form->text("Articleperiodical.{$key}.authors", array('maxlength' => '200')); ?>
    </td>
    <td>
        <?php echo $this->Form->text("Articleperiodical.{$key}.title_of_book", array('maxlength' => '200')); ?>
    </td>
    <td>
        <?php echo $this->Form->text("Articleperiodical.{$key}.title_of_article", array('maxlength' => '200')); ?>
    </td>
    <td>
        <?php echo $this->Form->text("Articleperiodical.{$key}.publisher_ISBN", array('maxlength' => '80')); ?>
    </td>
    <td>
        <?php echo $this->Form->text("Articleperiodical.{$key}.place_of_publication", array('maxlength' => '100')); ?>
    </td>
    <td>
        <?php echo $this->Form->text("Articleperiodical.{$key}.page_no"); ?>
    </td>   
    <td class="actions">
        <a href="#" class="remove">Delete Row</a>
    </td>
</tr>