<h1>Add Batch</h1>
<?php
    echo $this->Form->create($batch);
    echo $this->Form->control('name');
    echo $this->Form->control('year');
    echo $this->Form->control('semesters._ids', ['multiple' => true]);
    ?>
    <div><?php echo $this->Html->link('Go back',
                    array('action' => 'index'),
                    array('class' => 'button btn btn-success')
                ); echo "      "; echo $this->Form->button(__('Add Batch')); ?></div>
    <?php 
    echo $this->Form->end();
?>