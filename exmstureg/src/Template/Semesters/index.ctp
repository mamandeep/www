<h1>Semesters</h1>
<?= $this->Html->link('Add Semester', ['action' => 'add']) ?>
<table>
    <tr>
        <th>S.No.</th>
        <th>Semester Id</th>
        <th>Batch Id</th>
        <th>Semester Name</th>
        <th>Batch Name</th>
        <th>Year</th>
        <th>Created</th>
        <th>Action</th>
    </tr>

    <!-- Here is where we iterate through our $articles query object, printing out article info -->

    <?php $count = 1; 
        foreach ($semesters as $semester): ?>
            <tr>
                <td><?= $count++; ?></td>
                <td><?= $semester->id ?></td>
                <td></td>
                <td>
                    <?= $this->Html->link($semester->name, ['action' => 'view', $semester->id]) ?>
                </td>
                <td></td>
                <td><?= $semester->year ?></td>
                <td>
                    <?= $semester->created->format(DATE_RFC850) ?>
                </td>
                <td>
                    <?= $this->Form->postLink(
                        'Delete',
                        ['action' => 'delete', $semester->id],
                        ['confirm' => 'Are you sure?'])
                    ?>
                    <?= $this->Html->link('Edit', ['action' => 'edit', $semester->id]) ?>
                </td>
            </tr>
            <?php foreach ($semester->batches as $batch):  ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td><?= $batch->id ?></td>
                    <td></td>
                    <td><?= $batch->name ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
    <?php endforeach; 
    endforeach; ?>
</table>