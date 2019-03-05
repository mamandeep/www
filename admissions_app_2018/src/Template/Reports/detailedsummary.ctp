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

<?php 
	echo $this->Form->create();
	echo $this->Form->control("course_id", ['label' => 'Course Name', 'empty' => ['select' => 'Select'],  'options' => $programmes, 'type' => 'select' , 'id' => "id_wardofdef", 'maxlength'=>'100']);
	echo $this->Form->button(__('Submit'));
	echo $this->Form->end();
?>
<table>
<tr>
	<td rowspan="2">S. No.</td>
	<td rowspan="2">App. No.</td>
	<td rowspan="2">Name</td>
	<td rowspan="2">Mobile</td>
	<td rowspan="2">Email</td>
	<td rowspan="2">Category</td>
	<td rowspan="2">Gender</td>
	<td rowspan="2">National Level Test</td>
	<td rowspan="2">Fellowship Source</td>
	<td colspan="3">Fee Details</td>
</tr>
<tr>
	<td>Payment ID</td>
	<td>Payment Date</td>
	<td>Payment Amount</td>
</tr>
<?php $count = 1; foreach($detailedsummary as $row) { ?>
	<tr>
		<td><?php echo $count++; ?></td>
		<td><a href="<?php echo $this->request->webroot; ?>reports/individualdetails/<?php echo $row['user_id']; ?>"><?php echo $row['username']; ?></a></td>
		<td><?php echo $row['name']; ?></td>
		<td><?php echo $row['mobile']; ?></td>
		<td><?php echo $row['email']; ?></td>
		<td><?php echo $row['type']; ?></td>
		<td><?php echo $row['gender']; ?></td>
		<td><?php echo $row['ggp_exam']; ?></td>
		<td><?php echo $row['source_of_fellowship']; ?></td>
		<td><?php echo $row['payment_id']; ?></td>
		<td><?php echo $row['payment_date_created']; ?></td>
		<td><?php echo $row['payment_amount']; ?></td>
	</tr>
<?php } ?>
</table>