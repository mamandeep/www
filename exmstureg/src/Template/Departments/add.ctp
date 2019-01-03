<h1>Add Department</h1>
<?php
    echo $this->Form->create($department);
    echo $this->Form->control('name');
    echo $this->Form->input(
                'school_id', 
                [
                    'type' => 'select',
                    'multiple' => false,
                    'options' => $schools, 
                    'empty' => 'Select'
                ]
    ); ?>
    <div><?php echo $this->Html->link('Go back',
                    array('action' => 'index'),
                    array('class' => 'button btn btn-success')
                ); echo "      "; echo $this->Form->button(__('Add Department')); ?></div>
    <?php 
    echo $this->Form->end();
?>