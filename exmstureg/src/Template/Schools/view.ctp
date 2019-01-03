<h1><?= h($school->name) ?></h1>
<p><small>Created: <?= $school->created_at->format(DATE_RFC850) ?></small></p>
<div><?php echo $this->Html->link('Go back',
                    array('action' => 'index'),
                    array('class' => 'button btn btn-success')); ?></div>