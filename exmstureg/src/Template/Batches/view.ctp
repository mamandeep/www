<h1>Batch Name: <?= h($batch->name) ?></h1>
<h1>Batch Year: <?= h($batch->year) ?></h1>
<h1>Semesters: </h1>
<ul>
<?php foreach ($batch->semesters as $semester):  ?>
<li><?= h($semester->name) ?></li>
<?php endforeach; ?>
</ul>
<p><small>Created: <?= $batch->created->format(DATE_RFC850) ?></small></p>
<div><?php echo $this->Html->link('Go back',
                    array('action' => 'index'),
                    array('class' => 'button btn btn-success')); ?></div>