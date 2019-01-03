<?php use Cake\Routing\Router;
	if(isset($student)) { 
	echo $this->Form->create('Correction', [
        'url' => ['controller' => 'placements', 'action' => 'corrections']
    ]);
	echo $this->Form->hidden('id',['value' => $student['id']]);
?>
<table>
<tr>
	<td>Select</td>
	<td>Field</td>
</tr>
<tr>
	<td><?php $options = array(array('text' => '' ));
			echo $this->Form->checkbox(
                    'Correction.' . 1 . '.idcheck',
                    $options, [
                    'hiddenField' => false ]
                );  ?></td>
	<td>Name</td>
    <td><?= $student['name'] ?></td>
</tr>
<tr>
	<td><?php $options = array(array('text' => '' ));
			echo $this->Form->checkbox(
                    'Correction.' . 2 . '.idcheck',
                    $options, [
                    'hiddenField' => false ]
                );  ?></td>
	<td>Gender</td>
    <td><?= $student['gender'] ?></td>
</tr>
<tr>
	<td><?php $options = array(array('text' => '' ));
			echo $this->Form->checkbox(
                    'Correction.' . 3 . '.idcheck',
                    $options, [
                    'hiddenField' => false ]
                );  ?></td>
	<td>Centre</td>
    <td><?= $student['centre'] ?></td>
</tr>
<tr>
	<td><?php $options = array(array('text' => '' ));
			echo $this->Form->checkbox(
                    'Correction.' . 4 . '.idcheck',
                    $options, [
                    'hiddenField' => false ]
                );  ?></td>
	<td>Name of the Mentor</td>
    <td><?= $student['mentor'] ?></td>
</tr>
<tr>
	<td><?php $options = array(array('text' => '' ));
			echo $this->Form->checkbox(
                    'Correction.' . 5 . '.idcheck',
                    $options, [
                    'hiddenField' => false ]
                );  ?></td>
	<td>Father's Name</td>
    <td><?= $student['father_name'] ?></td>
</tr>
<tr>
	<td><?php $options = array(array('text' => '' ));
			echo $this->Form->checkbox(
                    'Correction.' . 6 . '.idcheck',
                    $options, [
                    'hiddenField' => false ]
                );  ?></td>
	<td>Permanenet Address</td>
    <td><?= $student['p_address'] ?></td>
</tr>
<tr>
	<td><?php $options = array(array('text' => '' ));
			echo $this->Form->checkbox(
                    'Correction.' . 7 . '.idcheck',
                    $options, [
                    'hiddenField' => false ]
                );  ?></td>
	<td>Day Scholar</td>
    <td><?= $student['day_scholar'] ?></td>
</tr>
<tr>
	<td><?php $options = array(array('text' => '' ));
			echo $this->Form->checkbox(
                    'Correction.' . 8 . '.idcheck',
                    $options, [
                    'hiddenField' => false ]
                );  ?></td>
	<td>Mobile No.</td>
    <td><?= $student['mobile_no'] ?></td>
</tr>
<tr>
	<td><?php $options = array(array('text' => '' ));
			echo $this->Form->checkbox(
                    'Correction.' . 9 . '.idcheck',
                    $options, [
                    'hiddenField' => false ]
                );  ?></td>
	<td>Area of Training/Placement</td>
    <td><?= $student['area_of_tp'] ?></td>
</tr>
<tr>
	<td><?php $options = array(array('text' => '' ));
			echo $this->Form->checkbox(
                    'Correction.' . 10 . '.idcheck',
                    $options, [
                    'hiddenField' => false ]
                );  ?></td>
	<td>CV</td>
    <td><a href="<?php if(!empty($student['uploadfile']['file']) && file_exists(WWW_ROOT . DS . 'uploads' . DS . 'files' . DS . $student['uploadfile']['file'])) { echo $this->request->webroot . 'uploads' . DS . 'files' . DS . $student['uploadfile']['file']; } else { echo ""; } ?>" target="_blank"> click here</a></td>
</tr>
<tr>
	<td><?php $options = array(array('text' => '' ));
			echo $this->Form->checkbox(
                    'Correction.' . 11 . '.idcheck',
                    $options, [
                    'hiddenField' => false ]
                );  ?></td>
	<td>No/Clear Corrections</td>
    <td>No/Clear Corrections</td>
</tr>
</table>
<?php echo $this->Form->button(__('Submit Corrections')); ?>
<?php echo $this->Form->end(); } ?>