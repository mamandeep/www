<?php //debug($examinationMarks);
echo $this->Form->create((count($examinationMarks) > 0) ? $examinationMarks : null);
	echo "<table id=\"examinationMarksTable\">";
	echo "<tr>
	<td>S. No.</td>
	<td>Id</td>
	<td>Name</td>
	<td>Father Name</td>
	<td>Mother Name</td>
	<td>Registration No.</td>";
	
	if($Id3['type'] == "Theory") {
	echo "<td>Internal Assesment</td>
		<td>End Semester Examination</td>";
	}
	else if($Id3['type'] == "Seminar" || $Id3['type'] == "Lab") {
		echo "<td>Total</td>";
	}
	echo "</tr>";
?>
<?php     $count = 0; //debug($Id3); //debug($students);
if(isset($students)) {
foreach($students as $student) {
			 echo "<tr>";
			 echo "<td>" . ($count+1) . "</td>";
			 echo "<td>" . $this->Form->input($count.'.id', ['type' => 'hidden', 'value' => (count($student['examination_marks']) == 0) ? "" : $student['examination_marks'][0]['id']])  .
			 				$this->Form->input($count.'.programme_id', ['type' => 'hidden', 'value' => $student['programme_id']]) . 
			 				$this->Form->input($count.'.course_offered_id', ['type' => 'hidden', 'value' => $student['courses_students'][0]['course_id']]) . 
			 				$this->Form->input($count.'.student_id', ['type' => 'hidden', 'value' => $student['id']]) . "</td>"; 
			 				echo "<td>" . $this->Form->input($count.'.name', ['readonly' => 'readonly', 'value' => $student['name']]) . "</td>"; 
			 				echo "<td>" . $this->Form->input($count.'.father_name', ['readonly' => 'readonly', 'value' => $student['father_name']]) . "</td>";
			 				echo "<td>" . $this->Form->input($count.'.mother_name', ['readonly' => 'readonly', 'value' => $student['mother_name']]) . "</td>";
			 				echo "<td>" . $this->Form->input($count.'.registration_no', ['readonly' => 'readonly', 'value' => $student['registration_no']]) . "</td>";
			 				if($Id3['type'] == "Theory") {
			 					echo "<td>" . $this->Form->control($count.'.internal_assessment') . "</td>";
			 					echo "<td>" . $this->Form->control($count.'.end_semester_examination') . "</td>";
			 				}
			 				else {
			 					echo "<td>" . $this->Form->control($count.'.total') . "</td>";
			 				}
	   		echo "</tr>";
	   		$count++;
	   	}
}
	   	echo "</table>";
	   	echo $this->Form->submit('Add Marks');
	   	echo $this->Form->end();
?>

<script type="text/javascript">
	   	function deleteRow(row) {
	  		var i = row.parentNode.parentNode.rowIndex;
	  		document.getElementById('coursesTable').deleteRow(i);
		}
	
	
		function insRow() {
		  console.log('hi');
		  var x = document.getElementById('coursesTable');
		  var new_row = x.rows[1].cloneNode(true);
		  var len = x.rows.length;
		  new_row.cells[0].innerHTML = len;
		
		  var inp1 = new_row.cells[1].getElementsByTagName('input')[0];
		  var inp11 = new_row.cells[1].getElementsByTagName('input')[1];
		  inp1.name = len + '[id]';
		  inp1.value = '';
		  inp11.name = len + '[programme_id]';
		  var inp2 = new_row.cells[2].getElementsByTagName('input')[0];
		  inp2.name = len + '[name]';
		  inp2.value = '';
		  var inp3 = new_row.cells[3].getElementsByTagName('input')[0];
		  inp3.name = len + '[course_code]';
		  inp3.value = '';
		  var inp4 = new_row.cells[4].getElementsByTagName('input')[0];
		  inp4.name = len + '[credits]';
		  inp4.value = '';
		  var inp5 = new_row.cells[5].getElementsByTagName('input')[0];
		  inp5.name = len + '[maximum_marks]';
		  inp5.value = '';
		  var inp6 = new_row.cells[6].getElementsByTagName('input')[0];
		  inp6.name = len + '[countable]';
		  inp6.value = '';
		  var inp7 = new_row.cells[7].getElementsByTagName('input')[0];
		  inp7.name = len + '[interdisciplinary]';
		  inp7.value = '';
		  var inp8 = new_row.cells[8].getElementsByTagName('input')[0];
		  inp8.name = len + '[type]';
		  inp8.value = '';
		  x.appendChild(new_row);
		}
</script>