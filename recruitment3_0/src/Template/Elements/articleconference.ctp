<?php
$key = isset($key) ? $key : '<%= key %>';
?>
<tr>
    <td>
        <?php echo $this->Form->hidden("Articleconference.{$key}.id"); ?>
        <?php echo $this->Form->hidden("Articleconference.{$key}.applicant_id"); ?>
        <?php echo $this->Form->text("Articleconference.{$key}.authors", array('maxlength' => '200')); ?>
    </td>
    <td>
        <?php echo $this->Form->text("Articleconference.{$key}.title_of_book", array('maxlength' => '200')); ?>
    </td>
    <td>
        <?php echo $this->Form->text("Articleconference.{$key}.title_of_article", array('maxlength' => '200')); ?>
    </td>
    <td>
        <?php echo $this->Form->text("Articleconference.{$key}.publisher_ISBN", array('maxlength' => '80')); ?>
    </td>
    <td>
        <?php echo $this->Form->text("Articleconference.{$key}.place_of_publication", array('maxlength' => '100')); ?>
    </td>
    <td>
        <?php echo $this->Form->text("Articleconference.{$key}.page_no"); ?>
    </td>   
    <td class="actions">
        <a href="#" class="remove">Delete Row</a>
    </td>
</tr>