<?php 
	//debug($courses);
	$countable = $interdisciplinary = ['Yes' => 'Yes', 'No' => 'No'];
	$coursetype = ['Theory' => 'Theory', 'Lab' => 'Lab', 'Seminar' => 'Seminar'];
	if(isset($programme_id) && $programme_id > 0) {
	echo $this->Form->create(count($courses) > 0 ? $courses : null);
	echo "<table id=\"coursesTable\">";
?>
	<tr>
      <td>S. No.</td>
      <td>Id</td>
      <td>Name</td>
      <td>Course Code</td>
      <td>Credits</td>
      <td>Maximum Marks</td>
      <td>Countable</td>
      <td>Interdisciplinary</td>
      <td>Type</td>
      <td>Semester</td>
      <td>Action Add</td>
      <td>Action Delete</td>
    </tr>
<?php     $count = 0; //debug($courses);
if(count($courses) == 0) {
			echo "<tr>";
			 echo "<td>" . ($count+1) . "</td>";
			 echo "<td>" . $this->Form->input('Courses.'. $count . '.id', ['type' => 'hidden', 'value' => ""]) . $this->Form->input('Courses.'. $count . '.programme_id', ['type' => 'hidden', 'value' => (isset($programme_id) ? $programme_id : 0)]) . 
			 				$this->Form->input('CoursesOffered.'. $count. '.id', ['type' => 'hidden', 'value' => ""]) . 
			 				$this->Form->input('CoursesOffered.'. $count. '.programme_id', ['type' => 'hidden' , 'value' => (isset($programme_id) ? $programme_id : 0)]) . 
			 				$this->Form->input('CoursesOffered.'. $count. '.course_id', ['type' => 'hidden' , 'value' => ""]) . 
			 				$this->Form->input('CoursesOffered.'. $count. '.course_coordinator', ['type' => 'hidden' , 'value' => "Unknown"]) . "</td>"; 
			 echo "<td>" . $this->Form->input('Courses.'. $count . '.name') . "</td>"; 
			 echo "<td>" . $this->Form->input('Courses.'. $count . '.course_code') . "</td>";
			 echo "<td>" . $this->Form->input('Courses.'. $count . '.credits') . "</td>";
			 echo "<td>" . $this->Form->input('Courses.'. $count . '.maximum_marks') . "</td>";
			 echo "<td>" . $this->Form->input('Courses.'. $count . '.countable', ['type' => 'select',
																			        'multiple' => false,
																			        'options' => $countable, 
																			        'empty' => '-Select-',
																			        'id' => $count . '_countable']) . "</td>";
			 echo "<td>" . $this->Form->input('Courses.'. $count . '.interdisciplinary', ['type' => 'select',
																			        'multiple' => false,
																			        'options' => $interdisciplinary, 
																			        'empty' => '-Select-',
																			        'id' => $count . '_interdisciplinary']) . "</td>";
			 echo "<td>" . $this->Form->input('Courses.'. $count . '.type', ['type' => 'select',
																			        'multiple' => false,
																			        'options' => $coursetype, 
																			        'empty' => '-Select-',
																			        'id' => $count . '_coursetype']) . "</td>";
			 echo "<td>" . $this->Form->input('CoursesOffered.'. $count. '.semester', ['type' => 'select' , 'options' => ['1' => '1','2' => '2','3' => '3','4' => '4'], 'empty' => '-Select-']) . "</td>";
			 echo "<td><input type=\"button\" id=\"delCourseButton\" value=\"Delete\" onclick=\"deleteRow(this)\" /></td>";
			 echo "<td><input type=\"button\" id=\"addCoursebutton\" value=\"Add Course\" onclick=\"insRow()\" /></td>";
	   		echo "</tr>";
}
else {
	foreach($courses as $course) {
		//debug($course);
			 echo "<tr>";
			 echo "<td>" . ($count+1) . "</td>";
			 echo "<td>" . $this->Form->input('Courses.'. $count . '.id', ['type' => 'hidden', 'value' => $course['course']['id']]) . $this->Form->input('Courses.'. $count . '.programme_id', ['type' => 'hidden', 'value' => (isset($programme_id) ? $programme_id : 0)]) . 
			 				$this->Form->input('CoursesOffered.'. $count. '.id', ['type' => 'hidden', 'value' => $course['id']]) . 
			 				$this->Form->input('CoursesOffered.'. $count. '.programme_id', ['type' => 'hidden' , 'value' => $course['programme_id']]) . 
			 				$this->Form->input('CoursesOffered.'. $count. '.course_id', ['type' => 'hidden' , 'value' => $course['course_id']]) . 
			 				$this->Form->input('CoursesOffered.'. $count. '.course_coordinator', ['type' => 'hidden' , 'value' => $course['course_coordinator']]) ."</td>"; 
			 echo "<td>" . $this->Form->input('Courses.'. $count . '.name', ['value' => $course['course']['name']]) . "</td>"; 
			 echo "<td>" . $this->Form->input('Courses.'. $count . '.course_code', ['value' => $course['course']['course_code']]) . "</td>";
			 echo "<td>" . $this->Form->input('Courses.'. $count . '.credits', ['value' => $course['course']['credits']]) . "</td>";
			 echo "<td>" . $this->Form->input('Courses.'. $count . '.maximum_marks', ['value' => $course['course']['maximum_marks']]) . "</td>"; //$course['course']['countable']
			 echo "<td>" . $this->Form->input('Courses.'. $count . '.countable', ['type' => 'select',
																			        'multiple' => false,
																			        'options' => $countable,
																			        'empty' => '-Select-',
																			        'default' => $course['course']['countable'],
																			        'id' => $count . '_countable']) . "</td>";
			 //['value' => $course['course']['interdisciplinary']
			 echo "<td>" . $this->Form->input('Courses.'. $count . '.interdisciplinary', ['type' => 'select',
																			        'multiple' => false,
																			        'options' => $interdisciplinary, 
																			        'empty' => '-Select-',
																			        'default' => $course['course']['interdisciplinary'],
																			        'id' => $count . '_interdisciplinary']) . "</td>";
			 //['value' => $course['course']['type']
			 echo "<td>" . $this->Form->input('Courses.'. $count . '.type', ['type' => 'select',
																			        'multiple' => false,
																			        'options' => $coursetype, 
																			        'empty' => '-Select-',
																			        'default' => $course['course']['type'],
																			        'id' => $count . '_coursetype']) . "</td>";
			 echo "<td>" . $this->Form->input('CoursesOffered.'. $count. '.semester', ['type' => 'select' , 'options' => ['1' => '1','2' => '2','3' => '3','4' => '4'], 'selected' => $course['semester']]) . "</td>";
			echo "<td><input type=\"button\" id=\"delCourseButton\" value=\"Delete\" onclick=\"deleteRow(this)\" /></td>";
			 echo "<td><input type=\"button\" id=\"addCoursebutton\" value=\"Add Course\" onclick=\"insRow()\" /></td>";
	   		echo "</tr>";
	   		$count++;
	   	}
}
	
	   	echo "</table>";
	   	echo $this->Form->submit('Add Courses');
	   	echo $this->Form->end();
}
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
		  var inp12 = new_row.cells[1].getElementsByTagName('input')[2];
		  var inp13 = new_row.cells[1].getElementsByTagName('input')[3];
		  var inp14 = new_row.cells[1].getElementsByTagName('input')[4];
		  var inp15 = new_row.cells[1].getElementsByTagName('input')[5];
		  inp1.name = 'Courses['+ len + '][id]';
		  inp1.value = '';
		  inp11.name = 'Courses['+ len + '][programme_id]';
		  inp12.name = 'CoursesOffered['+ len + '][id]';
		  inp12.value = '';
		  inp13.name = 'CoursesOffered['+ len + '][programme_id]';
		  inp14.name = 'CoursesOffered['+ len + '][course_id]';
		  inp14.value = '';
		  inp15.name = 'CoursesOffered['+ len + '][course_coordinator]';
		  var inp2 = new_row.cells[2].getElementsByTagName('input')[0];
		  inp2.name = 'Courses['+ len + '][name]';
		  inp2.value = '';
		  var inp3 = new_row.cells[3].getElementsByTagName('input')[0];
		  inp3.name = 'Courses['+ len + '][course_code]';
		  inp3.value = '';
		  var inp4 = new_row.cells[4].getElementsByTagName('input')[0];
		  inp4.name = 'Courses['+ len + '][credits]';
		  inp4.value = '';
		  var inp5 = new_row.cells[5].getElementsByTagName('input')[0];
		  inp5.name = 'Courses['+ len + '][maximum_marks]';
		  inp5.value = '';
		  var inp6 = new_row.cells[6].getElementsByTagName('select')[0];
		  inp6.name = 'Courses['+ len + '][countable]';
		  inp6.selected = '';
		  var inp7 = new_row.cells[7].getElementsByTagName('select')[0];
		  inp7.name = 'Courses['+ len + '][interdisciplinary]';
		  inp7.selected = '';
		  var inp8 = new_row.cells[8].getElementsByTagName('select')[0];
		  inp8.name = 'Courses['+ len + '][type]';
		  inp8.selected = '';
		  var inp9 = new_row.cells[9].getElementsByTagName('select')[0];
		  inp9.name = 'CoursesOffered['+ len + '][semester]';
		  inp9.selected = '';
		  x.appendChild(new_row);
		}
</script>