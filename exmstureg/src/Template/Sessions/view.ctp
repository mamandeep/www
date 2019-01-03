<h1>Semester Name: <?= h($semester->name) ?></h1>
<h1>Batches: </h1>
<ul>
<?php foreach ($semester->batches as $batch):  ?>
<li><?= h($batch->name) ?></li>
<li><?= h($batch->year) ?></li>
<?php endforeach; ?>
</ul>
<p><small>Created: <?= $semester->created->format(DATE_RFC850) ?></small></p>
<div><?php echo $this->Html->link('Go back',
                    array('action' => 'index'),
                    array('class' => 'button btn btn-success')); ?></div>