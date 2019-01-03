<h1>Sessions</h1>
<?= $this->Html->link('Add Session', ['action' => 'add']) ?>
<table>
    <tr>
        <th>S.No.</th>
        <th>Session Id</th>
        <th>Batch Id</th>
        <th>Session Name</th>
        <th>Batch Name</th>
        <th>Year</th>
        <th>Created</th>
        <th>Action</th>
    </tr>

    <!-- Here is where we iterate through our $articles query object, printing out article info -->

    <?php $count = 1; 
        foreach ($sessions as $session): ?>
            <tr>
                <td><?= $count++; ?></td>
                <td><?= $session->id ?></td>
                <td></td>
                <td>
                    <?= $this->Html->link($session->name, ['action' => 'view', $session->id]) ?>
                </td>
                <td></td>
                <td><?= $session->year ?></td>
                <td>
                    <?= $session->created->format(DATE_RFC850) ?>
                </td>
                <td></td>
                <td>
                    <?= $this->Form->postLink(
                        'Delete',
                        ['action' => 'delete', $session->id],
                        ['confirm' => 'Are you sure?'])
                    ?>
                    <?= $this->Html->link('Edit', ['action' => 'edit', $session->id]) ?>
                </td>
            </tr>
            <?php foreach ($session->batches as $batch):  ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td><?= $batch->id ?></td>
                    <td></td>
                    <td><?= $batch->name ?></td>
                    <td><?= $batch->year ?></td>
                    <td></td>
                    <td></td>
                </tr>
    <?php endforeach; 
    endforeach; ?>
</table>