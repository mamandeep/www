<h1>Add School</h1>
<?php
    echo $this->Form->create($school);
    echo $this->Form->control('name'); ?>
    <div><?php echo $this->Html->link('Go back',
                    array('action' => 'index'),
                    array('class' => 'button btn btn-success')
                ); echo "      "; echo $this->Form->button(__('Add School')); ?></div>
    <?php 
    echo $this->Form->end();
?>