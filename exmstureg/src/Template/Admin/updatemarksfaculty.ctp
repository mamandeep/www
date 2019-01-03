<?php 
	echo $this->Form->create($examinationmarks);
	echo "<table>";
	echo "<tr><td>S. No.</td><td>Student Name</td><td>Marks</td></tr>";
	$count = 0;
	foreach($students as $student) {
	//debug($student);
		echo "<tr>";
		echo "<td>" . ($count+1) .
		 $this->Form->input($count.'.student_id', ['type' => 'hidden', 'value' => $student['id']]) . 
		 $this->Form->input($count.'.course_offered_id', ['type' => 'hidden', 'value' => $student['courses'][0]['id']]) . 
		 $this->Form->input($count.'.user_id', ['type' => 'hidden', 'value' => '15']) . "</td>";
		echo "<td>" . $student['name'] . "</td>";
   		echo "<td>" . $this->Form->input($count.'.end_semester_examination', ['label' => false]) . "</td>";
   		echo "</tr>";
   		$count++;
   	}
   	echo "</table>";
   	echo $this->Form->submit();
   	echo $this->Form->end();
?>