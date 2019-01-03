<style>
table {
    width: 100%;
}

th {
    height: 50px;
    text-align: center;
}
td {
    height: 50px;
    text-align: center;
    vertical-align: bottom;
}
</style>
<?php if(isset($submitFeeOpen) && $submitFeeOpen === true) { ?>
<div style="font-size: 16px; font-weight: bold;">Placement Fee submission (Note: Please submit fee and take a print out/screen-shot of the details after successful submission)</div>
<?php //debug($studentdata); debug($feePaid);
$acadFeeSubmitted = false; 
$hostelFeeSubmitted = false;

if(isset($feePaid)) { 
    foreach($feePaid as $fee) { 
    if($fee['fee_type'] == "placement") { $acadFeeSubmitted = true; ?>
<div>You have submitted the Placement Fee.</div>
<?php }}} ?>
<table>
<tr><td></td><td>Name: <?php echo $studentdata['Student_Name']; ?></td><td></td></tr>
<tr><td></td><td>Batch: <?php echo $studentdata['Batch']; ?></td><td></td></tr>
<tr><td></td><td>Semester: <?php echo $studentdata['Semester']; ?></td><td></td></tr>
<tr>
<td></td>
<td>
<?php
    //debug($programme);
    if($acadFeeSubmitted === false) {
        echo $this->Form->create('academic', ['id' => 'academic']);
        echo $this->Form->control("tokenid", [ 'type' => 'hidden' , 'value' => $token]);
        echo $this->Form->control("placementfee", [ 'type' => 'hidden' , 'value' => 1]);
        echo $this->Form->button(__('Submit Placement Fee'));
        echo $this->Form->end();
    }
     ?>
</td>
<td></td>
</tr>
</table>
<script>
    $(document).ready(function() {
            $('#programme_id').on('change', function() {
                 $(this).closest('form').trigger('submit');
            });

            //$('#programme_id').change();
        });
</script>
<?php } else { ?>
<div>Fee Submission is closed at this time.</div>
<?php } ?>
