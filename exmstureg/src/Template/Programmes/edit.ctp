<h1>Edit Programme</h1>
<?php
    echo $this->Form->create($programme);
    echo $this->Form->control('id', ['type' => 'hidden']);
    echo $this->Form->control('name');
    echo $this->Form->control('degree');
    echo $this->Form->input(
                'department_id', 
                [
                    'type' => 'select',
                    'multiple' => false,
                    'options' => $departments, 
                    'empty' => 'Select'
                ]
    ); ?>
    <div><?php echo $this->Html->link('Go back',
                    array('action' => 'index'),
                    array('class' => 'button btn btn-success')
                ); echo "      "; echo $this->Form->button(__('Save Programme')); ?></div>
    <?php echo $this->Form->end();
?>