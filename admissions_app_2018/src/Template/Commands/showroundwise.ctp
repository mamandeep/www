<table>
	<tr>
		<td>S. No.</td>
		<td>Round I</td>
	</tr>
	<?php $count = 1;
	foreach($R1 as $key => $value) {
		echo "<tr>";
		echo "<td>" . $count++ . "</td>";
		echo "<td>" . $value['candidate_id'] . "</td>";
		echo "</tr>";
	} ?>
	<tr>
		<td>S. No.</td>
		<td>Cancelled Round 1</td>
	</tr>
	<?php $count = 1;
	foreach($RC1 as $key => $value) {
		echo "<tr>";
		echo "<td>" . $count++ . "</td>";
		echo "<td>" . $value['candidate_id'] . "</td>";
		echo "</tr>";
	}
	?>
</table>
<table>
	<tr>
		<td>S. No.</td>
		<td>Round II</td>
	</tr>
	<?php $count = 1;
	foreach($R1 as $key => $value) {
		echo "<tr>";
		echo "<td>" . $count++ . "</td>";
		echo "<td colpspan=\"2\">" . $value['candidate_id'] . "</td>";
		echo "</tr>";
	} ?>
	<tr>
		<td>S. No.</td>
		<td>Cancelled Round II</td>
	</tr>
	<?php $count = 1;
	foreach($RC2 as $key => $value) {
		echo "<tr>";
		echo "<td>" . $count++ . "</td>";
		echo "<td colpspan=\"2\">" . $value['candidate_id'] . "</td>";
		echo "</tr>";
	}
	?>
</table>
<table>
	<tr>
		<td>S. No.</td>
		<td>Round III</td>
	</tr>
	<?php $count = 1;
	foreach($R1 as $key => $value) {
		echo "<tr>";
		echo "<td>" . $count++ . "</td>";
		echo "<td colpspan=\"2\">" . $value['candidate_id'] . "</td>";
		echo "</tr>";
	} ?>
	<tr>
		<td>S. No.</td>
		<td>Cancelled Round III</td>
	</tr>
	<?php $count = 1;
	foreach($RC3 as $key => $value) {
		echo "<tr>";
		echo "<td>" . $count++ . "</td>";
		echo "<td colpspan=\"2\">" . $value['candidate_id'] . "</td>";
		echo "</tr>";
	}
	?>
</table>
<table>
	<tr>
		<td>S. No.</td>
		<td>Round IV</td>
	</tr>
	<?php $count = 1;
	foreach($R1 as $key => $value) {
		echo "<tr>";
		echo "<td>" . $count++ . "</td>";
		echo "<td colpspan=\"2\">" . $value['candidate_id'] . "</td>";
		echo "</tr>";
	} ?>
	<tr>
		<td>S. No.</td>
		<td>Cancelled Round IV</td>
	</tr>
	<?php $count = 1;
	foreach($RC4 as $key => $value) {
		echo "<tr>";
		echo "<td>" . $count++ . "</td>";
		echo "<td colpspan=\"2\">" . $value['candidate_id'] . "</td>";
		echo "</tr>";
	}
	?>
</table>