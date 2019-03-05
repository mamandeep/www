<style type="text/css">
table {
	border: 1px solid black;
	border-collapse: collapse;
	width: 650px;
	max-width: 650px;
	font-family: Open Sans;
	font-size: 14px;
	font-style: normal;
	font-variant: normal;
	//font-weight: 700;
	//line-height: 26.4px;
}

tr {
	
}

td {
	border: 1px solid black;
}
</style>
<?php //debug($candidate); ?>
<?php //debug($fee); ?>
<?php 
	echo $this->Form->create();
	echo $this->Form->control("candidate_id", ['label' => 'Application Number (e.g. PhD0000x)', 'type' => 'text', 'maxlength' => '10']);
	echo $this->Form->button(__('Submit'));
	echo $this->Form->end();

if(isset($individualdetails)) { 
//debug($individualdetails); ?>
<table>
<tr>
	<td>1. </td>
	<td colspan="1">Application Number</td>
	<td colspan="3"><strong><?php echo $individualdetails['username']; ?></strong></td>
</tr>
<tr>
	<td>2. </td>
	<td>Photograph</td>
	<td><embed width="80" height="132" src="<?= $this->request->webroot.$individualdetails['path'].$individualdetails['photo']; ?>" width="220px" height="150px"></td>
	<td>Signature</td>
	<td><embed width="150" height="132" src="<?= $this->request->webroot.$individualdetails['path_sign'].$individualdetails['signature']; ?>" width="220px" height="150px"></td>
</tr>
<tr>
	<td>3. </td>
	<td>Name</td>
	<td><?php echo $individualdetails['name']; ?></td>
	<td>Father's Name</td>
	<td><?php echo $individualdetails['f_name']; ?></td>
</tr>
<tr>
	<td>4. </td>
	<td>Date of Birth</td>
	<td><?php echo $individualdetails['dob']; ?></td>
	<td>Gender</td>
	<td><?php echo $individualdetails['gender']; ?></td>
</tr>
<tr>
	<td>5. </td>
	<td>Category</td>
	<td><?php echo $individualdetails['type']; ?></td>
	<td>Aadhar No.</td>
	<td><?php echo $individualdetails['aadhar_no']; ?></td>
</tr>
<tr>
	<td colspan="1">6. </td>
	<td colspan="1">Communication Address</td>
	<td colspan="3"><?php echo $individualdetails['comm_address']; ?></td>
</tr>
<tr>
	<td colspan="1">7. </td>
	<td colspan="1">Permanent Address</td>
	<td colspan="3"><?php echo $individualdetails['perm_address']; ?></td>
</tr>
<tr>
	<td>8. </td>
	<td>Person with Disablity</td>
	<td><?php echo $individualdetails['pwd']; ?></td>
	<td>Ward of Defence</td>
	<td><?php echo $individualdetails['ward_of_def']; ?></td>
</tr>
<tr>
	<td>9. </td>
	<td>Kashmiri Migrant</td>
	<td><?php echo $individualdetails['kashmiri_mig']; ?></td>
	<td>State</td>
	<td><?php echo $individualdetails['state_name']; ?></td>
</tr>
<tr>
	<td>10. </td>
	<td colspan="1">Nationality</td>
	<td cospan="3"><?php echo $individualdetails['nationality']; ?></td>
</tr>
<tr>
	<td>11. </td>
	<td>Degree</td>
	<td><?php echo $individualdetails['qualif_degree']; ?></td>
	<td>Major Subjects</td>
	<td><?php echo $individualdetails['qualif_maj_subjects']; ?></td>
</tr>
<tr>
	<td>12. </td>
	<td>Qualifying Result Declared</td>
	<td><?php echo $individualdetails['qualif_result_declared']; ?></td>
	<td>Marks Obtained</td>
	<td><?php echo $individualdetails['qualif_marks_obtained']; ?></td>
</tr>
<tr>
	<td>13. </td>
	<td colspan="1">Total Marks</td>
	<td colspan="3"><?php echo $individualdetails['qualif_total_marks']; ?></td>
</tr>
<tr>
	<td>14. </td>
	<td>Examination</td>
	<td><?php echo $individualdetails['ggp_exam']; ?></td>
	<td>Roll No.</td>
	<td><?php echo $individualdetails['ggp_roll_no']; ?></td>
</tr>
<tr>
	<td>15. </td>
	<td>Year of Passing</td>
	<td><?php echo $individualdetails['ggp_year_passing']; ?></td>
	<td>Marks Obtained</td>
	<td><?php echo $individualdetails['ggp_marksobtained_rank']; ?></td>
</tr>
<tr>
	<td>16. </td>
	<td>Rank</td>
	<td><?php echo $individualdetails['rank']; ?></td>
	<td>Source of Fellowship</td>
	<td><?php echo $individualdetails['source_of_fellowship']; ?></td>
</tr>
<tr>
	<td>17. </td>
	<td>Payment ID</td>
	<td><?php echo $individualdetails['payment_id']; ?></td>
	<td>Date of Payment</td>
	<td><?php echo $individualdetails['payment_date_created']; ?></td>
</tr>
</table>
<?php }
else {
?>
<table>
<tr>
	<td>1. </td>
	<td colspan="1">Application Number</td>
	<td colspan="3"><strong><?php echo $username ?></strong></td>
</tr>
<tr>
	<td>2. </td>
	<td>Photograph</td>
	<td><embed width="80" height="132" src="<?= $this->request->webroot.$file->path.$file->photo ?>" width="220px" height="150px"></td>
	<td>Signature</td>
	<td><embed width="150" height="132" src="<?= $this->request->webroot.$file->path_sign.$file->signature ?>" width="220px" height="150px"></td>
</tr>
<tr>
	<td>3. </td>
	<td>Name</td>
	<td><?php echo $candidate->name; ?></td>
	<td>Father's Name</td>
	<td><?php echo $candidate->f_name; ?></td>
</tr>
<tr>
	<td>4. </td>
	<td>Date of Birth</td>
	<td><?php echo $candidate->dob; ?></td>
	<td>Gender</td>
	<td><?php echo $candidate->gender; ?></td>
</tr>
<tr>
	<td>5. </td>
	<td>Category</td>
	<td><?php echo $candidate->category->type; ?></td>
	<td>Aadhar No.</td>
	<td><?php echo $candidate->aadar_no; ?></td>
</tr>
<tr>
	<td colspan="1">6. </td>
	<td colspan="1">Communication Address</td>
	<td colspan="3"><?php echo $candidate->comm_address; ?></td>
</tr>
<tr>
	<td colspan="1">7. </td>
	<td colspan="1">Permanent Address</td>
	<td colspan="3"><?php echo $candidate->perm_address; ?></td>
</tr>
<tr>
	<td>8. </td>
	<td>Person with Disablity</td>
	<td><?php echo $candidate->category->pwd; ?></td>
	<td>Ward of Defence</td>
	<td><?php echo $candidate->ward_of_def; ?></td>
</tr>
<tr>
	<td>9. </td>
	<td>Kashmiri Migrant</td>
	<td><?php echo $candidate->kashmiri_mig; ?></td>
	<td>State</td>
	<td><?php echo $candidate->state->state_name; ?></td>
</tr>
<tr>
	<td>10. </td>
	<td colspan="1">Nationality</td>
	<td cospan="3"><?php echo $candidate->nationality; ?></td>
</tr>
<tr>
	<td>11. </td>
	<td>Degree</td>
	<td><?php echo $candidate->qualif_degree; ?></td>
	<td>Major Subjects</td>
	<td><?php echo $candidate->qualif_maj_subjects; ?></td>
</tr>
<tr>
	<td>12. </td>
	<td>Qualifying Result Declared</td>
	<td><?php echo $candidate->qualif_result_declared; ?></td>
	<td>Marks Obtained</td>
	<td><?php echo $candidate->qualif_marks_obtained; ?></td>
</tr>
<tr>
	<td>13. </td>
	<td colspan="1">Total Marks</td>
	<td colspan="3"><?php echo $candidate->qualif_total_marks; ?></td>
</tr>
<tr>
	<td>14. </td>
	<td>Examination</td>
	<td><?php echo $candidate->ggp_exam; ?></td>
	<td>Roll No.</td>
	<td><?php echo $candidate->ggp_roll_no; ?></td>
</tr>
<tr>
	<td>15. </td>
	<td>Year of Passing</td>
	<td><?php echo $candidate->ggp_year_passing; ?></td>
	<td>Marks Obtained</td>
	<td><?php echo $candidate->ggp_marksobtained_rank; ?></td>
</tr>
<tr>
	<td>16. </td>
	<td>Rank</td>
	<td><?php echo $candidate->rank; ?></td>
	<td>Source of Fellowship</td>
	<td><?php echo $candidate->source_of_fellowship; ?></td>
</tr>
<tr>
	<td>17. </td>
	<td>Payment ID</td>
	<td><?php echo $fee->payment_id; ?></td>
	<td>Date of Payment</td>
	<td><?php echo $fee->payment_date_created; ?></td>
</tr>
</table>

<?php } ?>