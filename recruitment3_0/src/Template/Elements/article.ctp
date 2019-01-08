<?php
$key = isset($key) ? $key : '<%= key %>';
?>
<tr>
    <td>
        <?php echo $this->Form->hidden("Researcharticle.{$key}.id"); ?>
        <?php echo $this->Form->hidden("Researcharticle.{$key}.applicant_id"); ?>
        <?php echo $this->Form->text("Researcharticle.{$key}.authors", array('maxlength' => '200')); ?>
    </td>
    <td>
        <?php echo $this->Form->text("Researcharticle.{$key}.title_of_book", array('maxlength' => '200')); ?>
    </td>
    <td>
        <?php echo $this->Form->text("Researcharticle.{$key}.editor_of_book", array('maxlength' => '50')); ?>
    </td>
    <td>
        <?php echo $this->Form->text("Researcharticle.{$key}.title_of_article", array('maxlength' => '200')); ?>
    </td>
    <td>
        <?php echo $this->Form->text("Researcharticle.{$key}.publisher_ISBN", array('maxlength' => '80')); ?>
    </td>
    <td>
        <?php echo $this->Form->text("Researcharticle.{$key}.place_of_publication", array('maxlength' => '100')); ?>
    </td>
    <td>
        <?php echo $this->Form->text("Researcharticle.{$key}.page_no"); ?>
    </td>   
    <td class="actions">
        <a href="#" class="remove">Delete Row</a>
    </td>
</tr>