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
<table>
<tr>
	<td rowspan="2">S. No.</td>
	<td rowspan="2">Subject</td>
	<td rowspan="2">Total No. of Candidates</td>
	<td colspan="5">Source of Fellowship</td>
</tr>
<tr>
	<td>UGC/CSIR/ICMR-JRF</td>
	<td>RGNF/MANF</td>
	<td>Industrial Relationship</td>
	<td>CUPB Project</td>
	<td>No Fellowship</td>
</tr>
<?php $count = 1; foreach($subjectwisesummary as $row) { ?>
	<tr>
		<td><?php echo $count++; ?></td>
		<td><a href="<?php echo $this->request->webroot; ?>reports/detailedsummary/<?php echo $row['specialization_1']; ?>"><?php echo $row['name']; ?></a></td>
		<td><?php echo $row['no_of_users']; ?></td>
		<td><?php echo $row['count_ugc']; ?></td>
		<td><?php echo $row['count_rgnf']; ?></td>
		<td><?php echo $row['count_industrial']; ?></td>
		<td><?php echo $row['count_proj']; ?></td>
		<td><?php echo $row['count_nosource']; ?></td>
	</tr>
<?php } ?>
</table>