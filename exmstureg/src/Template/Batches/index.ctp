<h1>Batches</h1>
<?= $this->Html->link('Add Batch', ['action' => 'add']) ?>
<table>
    <tr>
        <th>S.No.</th>
        <th>Batch Id</th>
        <th>Semester Id</th>
        <th>Batch Name</th>
        <th>Semester Name</th>
        <th>Year</th>
        <th>Created</th>
        <th>Action</th>
    </tr>

    <!-- Here is where we iterate through our $articles query object, printing out article info -->

    <?php $count = 1; 
        foreach ($batches as $batch): ?>
            <tr>
                <td><?= $count++; ?></td>
                <td><?= $batch->id ?></td>
                <td></td>
                <td>
                    <?= $this->Html->link($batch->name, ['action' => 'view', $batch->id]) ?>
                </td>
                <td></td>
                <td><?= $batch->year ?></td>
                <td>
                    <?= $batch->created->format(DATE_RFC850) ?>
                </td>
                <td>
                    <?= $this->Form->postLink(
                        'Delete',
                        ['action' => 'delete', $batch->id],
                        ['confirm' => 'Are you sure?'])
                    ?>
                    <?= $this->Html->link('Edit', ['action' => 'edit', $batch->id]) ?>
                </td>
            </tr>
            <?php foreach ($batch->semesters as $semester):  ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td><?= $semester->id ?></td>
                    <td>
                        
                    </td>
                    <td><?= $semester->name ?></td>
                    <td></td>
                    <td>
                        
                    </td>
                    <td>
                        </td>
                </tr>
    <?php endforeach; 
    endforeach; ?>
</table>