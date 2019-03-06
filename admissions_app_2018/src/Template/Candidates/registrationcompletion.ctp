<?php use Cake\Routing\Router; ?>
<table>
<?php echo $this->Form->create($candidate, array('id' => 'registrationcompletion_form', 'url' => Router::url( '/candidates/registrationcompletion', true), 'enctype' => 'multipart/form-data')); ?>
<tr>
	<td>
<?php echo $this->Form->control('field1', ['label' => 'Field 1', 'placeholder' => 'Name', 'maxlength'=>'20']); ?>
	</td>
	<td>
	</td>
	<td>
	</td>
	<td>
	</td>
</tr>
<tr>
	<td>
<?php echo $this->Form->control('file', ['label' => 'Passport Size Photograph (Min. 50 Kb, Max. 200 Kb)', 'placeholder' => 'Name', 'maxlength'=>'20', 'type' => 'file']); ?>
	</td>
	<td>
	</td>
	<td>
	</td>
	<td>
	</td>
</tr>
<tr>
	<td colspan="4">
		<?php echo $this->Form->submit('Submit', array('div' => false, 'id' => 'submit_bt' )); ?>
		<?php echo $this->Form->end(); ?>
	</td>
</tr>
</table>