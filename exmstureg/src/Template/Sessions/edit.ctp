<h1>Edit Session</h1>
<?php
    echo $this->Form->create($session);
    echo $this->Form->control('id', ['type' => 'hidden']);
    echo $this->Form->control('name');
    //echo $this->Form->control('batches._ids', ['multiple' => true]);
    echo $this->Form->control('batches._ids', ['type' => 'select', 'multiple' => true, 'value' => $selectedBatches]);
    //echo $this->Form->control('batches._years', ['multiple' => true]);
?>
    <div><?php echo $this->Html->link('Go back',
                    array('action' => 'index'),
                    array('class' => 'button btn btn-success')
                ); echo "      "; echo $this->Form->button(__('Save Session')); ?></div>
    <?php echo $this->Form->end();
?>