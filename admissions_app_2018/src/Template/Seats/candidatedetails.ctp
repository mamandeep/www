<style>
    .labelsp {
        margin-right: 20px;
    }
	
	table {
		border-collapse: collapse;
	}

	table, th, td {
		border: 1px solid black;
	}

	table {
		width: 100%;
	}

	th {
		text-align: center;
	}
	td {
		text-align: center;
		vertical-align: top;
	}
	.table_heading {
		font-weight: bold;
	}
</style>
<div class="form-container">
<h1>To view Candidate details</h1>
<?php //debug($userData);
    echo $this->Form->create($programme);
    echo $this->Form->control("pid", ['label' => 'Please enter CUCET ID: ', 'type' => 'text' , 'id' => "cucet_id", 'maxlength'=>'11']); 
	echo $this->Form->button(__('Submit Request'));
	echo $this->Form->end();
	
if(isset($userData) && count($userData) > 0) { 
    ?>
<label>Applicant ID CUCET: <?php echo $userData['applicant_id'];?></label>
<table width="100%">
    <tr>
        <td>Name</td>
        <td><?php echo $userData['c_name']; ?></td>
    </tr>
    <tr>
        <td>Father's  Name</td>
        <td><?php echo $userData['f_name']; ?></td>
    </tr>
    <tr>
        <td>Mobile Number</td>
        <td><?php echo $userData['mobile']; ?></td>
    </tr>
    <tr>
        <td>Email ID</td>
        <td><?php echo $userData['email']; ?></td>
    </tr>
    <tr>
        <td>Fee payment ID</td>
        <td><?php echo $userData['bank_payment_id']; ?></td>
    </tr>
    <tr>
        <td>Fee payment date</td>
        <td><?php echo $userData['fee_submit_date']; ?></td>
    </tr>
    <tr>
        <td>Amount of Fee Deposited</td>
        <td><?php echo $userData['amount']; ?></td>
    </tr>
</table>
<?php } ?>
<div class="table_heading">Preferences</div>
<table width="100%">
	<tr>
		<td>Programme Name</td>
		<td>Marks A</td>
		<td>Marks B</td>
		<td>Total Marks</td>
		<td>Checked</td>
	</tr>
	<?php //debug($prefData); 
	if(isset($prefData) && count($prefData) > 0) { 
	foreach($prefData as $key => $value) {
	 echo "<tr>";
	 echo "<td>" . $value['name'] . "</td>";
	 echo "<td>" . $value['marks_A'] . "</td>";
	 echo "<td>" . $value['marks_B'] . "</td>";
	 echo "<td>" . $value['marks_total'] . "</td>";
	 echo "<td>" . $value['checked'] . "</td>";
	 echo "</tr>";
	}}
	?>
</table>
<div class="table_heading">Rankings</div>
<table width="100%">
	<tr>
		<td>Programme Name</td>
		<td>Position</td>
		<td>Category</td>
	</tr>
	<?php //debug($prefData);
	if(isset($rankData) && count($rankData) > 0) {
	foreach($rankData as $key => $value) {
	 echo "<tr>";
	 echo "<td>" . $value['prog_name'] . "</td>";
	 echo "<td>" . $value['merit'] . "</td>";
	 echo "<td>" . $value['category'] . "</td>";
	 echo "</tr>";
	}}
	?>
</table>
<div class="table_heading">Seat Lock details</div>
<table width="100%">
	<tr>
		<td>Programme Name</td>
		<td>Category locked</td>
		<td>Eligible for Open</td>
		<td>Category Preference</td>
	</tr>
	<?php //debug($lockData); 
	if(isset($lockData) && count($lockData) > 0) {
	foreach($lockData as $key => $value) {
	 echo "<tr>";
	 echo "<td>" . $value['prog_name'] . "</td>";
	 echo "<td>" . $value['locked_category'] . "</td>";
	 echo "<td>" . $value['eligible_for_open'] . "</td>";
	 echo "<td>" . $value['category_pref'] . "</td>";
	 echo "</tr>";
	}}
	?>
</table>
<div class="table_heading">Seat Allotment Details</div>
<table width="100%">
	<tr>
		<td>Seat ID</td>
		<td>Programme Name</td>
		<td>Category of Candidate</td>
		<td>Category of Seat</td>
		<td>Fee ID</td>
		<td>Amount</td>
		<td>Cancellation, if any</td>
	</tr>
	<?php //debug($seatData); 
	if(isset($seatData) && count($seatData) > 0) {
	foreach($seatData as $key => $value) {
	 echo "<tr>";
	 echo "<td>" . $value['seat_id'] . "</td>";
	 echo "<td>" . $value['prog_name'] . "</td>";
	 echo "<td>" . $value['candidate_category'] . "</td>";
	 echo "<td>" . $value['seat_category'] . "</td>";
	 echo "<td>" . $value['payment_id'] . "</td>";
	 echo "<td>" . $value['payment_amount'] . "</td>";
	 echo "<td></td>";
	 echo "</tr>";
	}}
	?>
</table>
<br/><br/>
</div>
<?php 
	
?>
</div>
