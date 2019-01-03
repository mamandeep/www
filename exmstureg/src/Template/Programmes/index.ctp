<h1>Programmes</h1>
<?= $this->Html->link('Add Programme', ['action' => 'add']) ?>
<table>
    <tr>
        <th>S.No.</th>
        <th>Programme Id</th>
        <th>Department Name</th>
        <th>Name</th>
        <th>Created</th>
        <th>Action</th>
    </tr>

    <!-- Here is where we iterate through our $articles query object, printing out article info -->

    <?php $count = 1; 
        foreach ($programmes as $programme): ?>
    <tr>
        <td><?= $count++; ?></td>
        <td><?= $programme->id ?></td>
        <td>
            <?= $this->Html->link($programme->department->name, ['controller' => 'departments', 'action' => 'view', $programme->department->id]) ?>
        </td>
        <td>
            <?= $this->Html->link($programme->name, ['action' => 'view', $programme->id]) ?>
        </td>
        <td>
            <?= $programme->created->format(DATE_RFC850) ?>
        </td>
        <td>
            <?= $this->Form->postLink(
                'Delete',
                ['action' => 'delete', $programme->id],
                ['confirm' => 'Are you sure?'])
            ?>
            <?= $this->Html->link('Edit', ['action' => 'edit', $programme->id]) ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>