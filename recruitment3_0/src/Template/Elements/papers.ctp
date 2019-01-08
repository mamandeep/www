<?php
$key = isset($key) ? $key : '<%= key %>';
?>
<tr>
    <td>
        <?php echo $this->Form->hidden("Researchpaper.{$key}.id"); ?>
        <?php echo $this->Form->hidden("Researchpaper.{$key}.applicant_id"); ?>
        <?php echo $this->Form->text("Researchpaper.{$key}.authors", array('maxlength' => '200')); ?>
    </td>
    <td>
        <?php echo $this->Form->text("Researchpaper.{$key}.title", array('maxlength' => '200')); ?>
    </td>
	<td>
        <?php echo $this->Form->text("Researchpaper.{$key}.journal_no_ugc", array('maxlength' => '200')); ?>
    </td>
    <td>
        <?php echo $this->Form->text("Researchpaper.{$key}.name_place_publication", array('maxlength' => '100')); ?>
    </td>
    <td>
        <?php echo $this->Form->text("Researchpaper.{$key}.publication_ISSN", array('maxlength' => '80')); ?>
    </td>
    <td>
        <?php echo $this->Form->text("Researchpaper.{$key}.vol_page_year", array('maxlength' => '80')); ?>
    </td>
    <td>
        <?php echo $this->Form->text("Researchpaper.{$key}.impact_factor"); ?>
    </td>   
    <td class="actions">
        <a href="#" class="remove">Delete Row</a>
    </td>
</tr>