<h1>Edit Department</h1>
<?php
    echo $this->Form->create($department);
    echo $this->Form->control('id', ['type' => 'hidden']);
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
                ); echo "      "; echo $this->Form->button(__('Save Department')); ?></div>
    <?php echo $this->Form->end();
?>