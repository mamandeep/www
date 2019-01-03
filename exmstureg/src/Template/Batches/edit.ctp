<h1>Edit Batch</h1>
<?php
    echo $this->Form->create($batch);
    echo $this->Form->control('id', ['type' => 'hidden']);
    echo $this->Form->control('name');
    echo $this->Form->control('year');
    echo $this->Form->control('semesters._ids', ['type' => 'select', 'multiple' => true, 'value' => $selectedSemesters]);
?>
    <div><?php echo $this->Html->link('Go back',
                    array('action' => 'index'),
                    array('class' => 'button btn btn-success')
                ); echo "      "; echo $this->Form->button(__('Save Batch')); ?></div>
    <?php echo $this->Form->end();
?>