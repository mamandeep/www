<h1>Schools</h1>
<?= $this->Html->link('Add School', ['action' => 'add']) ?>
<table>
    <tr>
        <th>S.No.</th>
        <th>School Id</th>
        <th>School Name</th>
        <th>Created</th>
        <th>Action</th>
    </tr>

    <!-- Here is where we iterate through our $articles query object, printing out article info -->

    <?php $count = 1; 
        foreach ($schools as $school): ?>
    <tr>
        <td><?= $count++; ?></td>
        <td><?= $school->id ?></td>
        <td>
            <?= $this->Html->link($school->name, ['action' => 'view', $school->id]) ?>
        </td>
        <td>
            <?= $school->created_at->format(DATE_RFC850) ?>
        </td>
        <td>
            <?= $this->Form->postLink(
                'Delete',
                ['action' => 'delete', $school->id],
                ['confirm' => 'Are you sure?\n\nDepartments and Programmes part of or associated with this school will be deleted too.'])
            ?>
            <?= $this->Html->link('Edit', ['action' => 'edit', $school->id]) ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>