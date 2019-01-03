<style type="text/css">
    table {
        border: 1px solid black;
        width: 100%;
    }
    td {
        vertical-align: top;
        text-align: center;
        border: 1px solid black;
        white-space: -o-pre-wrap; 
        word-wrap: break-word;
        white-space: pre-wrap; 
        white-space: -moz-pre-wrap; 
        white-space: -pre-wrap;
    }
    .upload_notice {
        font-size: 16px;
        font-weight: bold;
        font-family: sans-serif;
        color: royalblue;
    }
</style>
<?php if(!empty($student['registration_no'])) { ?>
<div class="upload_notice">The details alloted to you are as follows: </div>
<table>
<tr>
    <td>Registration No.: </td>
    <td><?php echo $student['registration_no']; ?></td>
</tr>
<tr>
    <td>Programme Name: </td>
    <td><?php echo $programmes[$student['programme_id']]; ?></td>
</tr>
<tr>
    <td>Batch Name: </td>
    <td><?php echo $batches[$student['batch_id']]; ?></td>
</tr>
<tr>
    <td>Semester: </td>
    <td><?php echo $semesters[$student['semester_id']]; ?></td>
</tr>
<tr>
    <td>Session: </td>
    <td><?php echo $sessions[$student['session_id']]; ?></td>
</tr>
<tr>
    <td>Admission Date: </td>
    <td><?php echo $student['admission_date']; ?></td>
</tr>
<tr>
    <td>Date of Completion: </td>
    <td><?php echo $student['date_of_completion']; ?></td>
</tr>
</table>
<?php } else { ?>
<div class="upload_notice">The details have not been alloted to you yet.</div>
<?php } ?>
