<h1>Departments</h1>
<?= $this->Html->link('Add Department', ['action' => 'add']) ?>
<table>
    <tr>
        <th>S.No.</th>
        <th>Dept. Id</th>
        <th>School Name</th>
        <th>Name</th>
        <th>Created</th>
        <th>Action</th>
    </tr>

    <!-- Here is where we iterate through our $articles query object, printing out article info -->

    <?php $count = 1; 
        foreach ($departments as $department): ?>
    <tr>
        <td><?= $count++; ?></td>
        <td><?= $department->id ?></td>
        <td>
            <?= $this->Html->link($department->school->name, ['controller' => 'schools', 'action' => 'view', $department->school->id]) ?>
        </td>
        <td>
            <?= $this->Html->link($department->name, ['action' => 'view', $department->id]) ?>
        </td>
        <td>
            <?= $department->created_at->format(DATE_RFC850) ?>
        </td>
        <td>
            <?= $this->Form->postLink(
                'Delete',
                ['action' => 'delete', $department->id],
                ['confirm' => 'Are you sure?'])
            ?>
            <?= $this->Html->link('Edit', ['action' => 'edit', $department->id]) ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>