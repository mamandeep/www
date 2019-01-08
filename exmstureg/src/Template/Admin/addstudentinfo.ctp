<?php use  Cake\Routing\Router; ?>
<style type="text/css">

table {
	border: none;
}

td {
    border: none;
}

td {

        /* css-3 */
        white-space: -o-pre-wrap; 
        word-wrap: break-word;
        white-space: pre-wrap; 
        white-space: -moz-pre-wrap; 
        white-space: -pre-wrap; 

}
    
table {
    table-layout: fixed;
    width: 100%
}

th {
    #height: 50px;
    text-align: center;
}
td {
    #height: 50px;
    text-align: center;
    vertical-align: bottom;
}

.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 15% auto; /* 15% from the top and centered */
  padding: 20px;
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  animation-name: animatetop;
  animation-duration: 0.4s
}

@keyframes animatetop {
  from {top: -300px; opacity: 0}
  to {top: 0; opacity: 1}
}

/* The Close Button */
.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}
</style>
<h3>Add Individual Student Information</h3>
<?php //debug($this->request->session()->read('semester'));
	echo $this->Form->create('Students', ['url' => '/admin/addstudentinfo', 'type' => 'file']);
	echo "<table><tr><td>";
   	echo $this->Form->input(
	    'Students.session_id', 
	    [
	        'type' => 'select',
	        'multiple' => false,
	        'options' => $sessions, 
	        'empty' => '-Select-',
	        'id' => 'session'
	    ]
   	);
   	echo "</td><td>";
   	echo $this->Form->input(
	    'Students.programme_id', 
	    [
	        'type' => 'select',
	        'multiple' => false,
	        'options' => $programmes,
	        'empty' => '-Select-',
	        'id' => 'programme'
	    ]
   	); 
   	echo "</td><td>";
   	echo $this->Form->input('Students.registration_no');
   	echo "</td><td width=\"20%\">";
   	echo $this->Form->input('Uploadfiles.photo', ['type' => 'file', 'label' => 'Upload Photograph', 'class' => 'form-control']);
   	echo "</td><td>";
   	echo $this->Form->input('Students.name');
   	echo "</td><td>";
   	echo $this->Form->input('Students.father_name');
   	echo "</td><td>";
   	echo $this->Form->input('Students.mother_name');
   	echo "</td><td>";
   	echo $this->Form->input('Students.blood_group', ['type' => 'select', 'multiple' => false, 'options' => ['O−' => 'O−', 'O+' => 'O+', 'A−' => 'A−', 'A+' => 'A+', 'B−' => 'B−', 'B+' => 'B+', 'AB−' => 'AB−', 'AB+' => 'AB+']]);

   	echo "</td><tr>"; 
   	echo "<tr><td>";
   	echo $this->Form->submit('Add Students Data', ['name' => 'Add Students Data']);
   	echo "</td></tr></table>";
    echo $this->Form->end();
	echo '<br>';
   ?>
   	