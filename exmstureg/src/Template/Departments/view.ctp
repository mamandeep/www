<h1><?= h($department->name) ?></h1>
<!--<p><?= h($department->school->name) ?></p>-->
<p><small>Created: <?= $department->created_at->format(DATE_RFC850) ?></small></p>
<div><?php echo $this->Html->link('Go back',
                    array('action' => 'index'),
                    array('class' => 'button btn btn-success')); ?></div>