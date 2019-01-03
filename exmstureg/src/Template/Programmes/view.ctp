<h1><?= h($programme->name) ?></h1>
<p><?= h($programme->department->name) ?></p>
<p><small>Created: <?= $programme->created->format(DATE_RFC850) ?></small></p>
<div><?php echo $this->Html->link('Go back',
                    array('action' => 'index'),
                    array('class' => 'button btn btn-success')); ?></div>