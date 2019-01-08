<?php
$key = isset($key) ? $key : '<%= key %>';
?>
<tr>
    <td>
        <?php echo $this->Form->hidden("Researchpaper.{$key}.id"); ?>
        <?php echo $this->Form->hidden("Researchpaper.{$key}.applicant_id"); ?>
        <?php echo $this->Form->text("Researchpaper.{$key}.author"); ?>
    </td>
    <td>
        <?php echo $this->Form->text("Researchpaper.{$key}.title_of_paper"); ?>
    </td>
    <td>
        <?php echo $this->Form->text("Researchpaper.{$key}.journal_name_place"); ?>
    </td>
    <td>
        <?php echo $this->Form->text("Researchpaper.{$key}.publication_issn"); ?>
    </td>
    <td>
        <?php echo $this->Form->text("Researchpaper.{$key}.vol_pageno_year"); ?>
    </td>
    <td>
        <?php echo $this->Form->text("Researchpaper.{$key}.impact_factor"); ?>
    </td>   
    <td class="actions">
        <a href="#" class="remove">Delete Row</a>
    </td>
</tr>