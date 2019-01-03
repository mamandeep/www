<h1>Add Semester</h1>
<?php
    echo $this->Form->create($semester);
    echo $this->Form->control('name');
    //echo $this->Form->control('batches._ids', ['multiple' => true]);
    //echo $this->Form->select('batches._ids', ['multiple' => true]);
    //echo $this->Form->control('batches._years', ['multiple' => true]);
    ?>
    <div><?php echo $this->Html->link('Go back',
                    array('action' => 'index'),
                    array('class' => 'button btn btn-success')
                ); echo "      "; echo $this->Form->button(__('Add Semester')); ?></div>
    <?php 
    echo $this->Form->end();
?>