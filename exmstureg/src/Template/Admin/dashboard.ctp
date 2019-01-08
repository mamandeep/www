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
<h3>Dashboard</h3>
<?php //debug($this->request->session()->read('semester'));
	echo $this->Form->create('PortalForm', ['url' => '/admin/controlleraction']);
   	echo $this->Form->input(
	    'session_id', 
	    [
	        'type' => 'select',
	        'multiple' => false,
	        'options' => $sessions, 
	        'empty' => '-Select-',
	        'id' => 'session',
	        'default' => [$this->request->session()->read('esession')],
			'style' => 'width: 100px'
	    ]
   	);
   	echo $this->Form->input(
	    'programme_id', 
	    [
	        'type' => 'select',
	        'multiple' => false,
	        'empty' => '-Select-',
	        'id' => 'programme',
	        'default' => [$this->request->session()->read('programme_id')],
			'style' => 'width: 400px'
	        
	    ]
   	);
   	echo $this->Form->input(
	    'semester', 
	    [
	        'type' => 'select',
	        'multiple' => false,
	        'empty' => '-Select-',
	        'id' => 'semester',
	        'default' => [$this->request->session()->read('semester')],
			'style' => 'width: 100px'
	    ]
   	);
   	echo $this->Form->input(
	    'course_id', 
	    [
	        'type' => 'select',
	        'multiple' => false,
	        'empty' => '-Select-',
	        'id' => 'course',
	        'default' => [$this->request->session()->read('course_id')],
			'style' => 'width: 400px'
	    ]
   	);
   	echo $this->Form->input('student_registration_no', ['style' => 'width: 100px;', 'maxlength' => '10', 'value' => !empty($this->request->session()->read('student_registration_no')) ? $this->request->session()->read('student_registration_no') : "" ]); ?>
   	<table>
   		<tr>
   			<td><?php echo $this->Form->submit('Add Courses', ['name' => 'Add Courses']); ?></td>
   			<td><?php echo $this->Form->submit('Add Students to Course', ['name' => 'Add Students']); ?></td>
   			<td><?php echo $this->Form->submit('Add Marks', ['name' => 'Add Marks']); ?></td>
   			<td><?php echo $this->Form->submit('Generate Tabulation Sheet', ['name' => 'Generate Tabulation Sheet']); ?></td>
   			<td><?php echo $this->Form->submit('Generate DMC', ['name' => 'Generate DMC']); ?></td>
   		</tr>
   	</table>
   	
   <?php echo $this->Form->end();
		echo '<br>';
   ?>

<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <p style="margin-left: 300px;">Please wait, loading data ...</p>
  </div>

</div>
<script type="text/javascript">
   	$(document).ready(function() {
		window.onclick = function(event) {
			if (event.target == modal) {
				modal.style.display = "none";
			}
		}

		var modal = document.getElementById('myModal');
		$("#session").on('change',function() {
			var id = $(this).val();
			if (id) {
				modal.style.display = "block";
				$("#programme").find('option').remove();
				$("#semester").find('option').remove();
				$("#course").find('option').remove();
				var dataString = 'id='+ id;
				$.ajax({
					type: "POST",
					url: '<?php echo Router::url(array("controller" => "Admin", "action" => "getprogrammes")); ?>' ,
					data: dataString,
					cache: false,
					success: function(html) {
						modal.style.display = "none";
						count = 1;
						$.each(html, function(key, value) {              
							if(count == 1)
								$('<option>').val('').text('select').appendTo($("#programme"));
							$('<option>').val(key).text(value).appendTo($("#programme"));
							count++;
						});
						<?php if(!empty($this->request->session()->read('programme_id'))) { ?>
							$("#programme").val('<?php echo $this->request->session()->read('programme_id'); ?>');
							var selected = $('#programme option:selected');
							if(selected.length == 0 || $("#programme").prop("selectedIndex") == 0) {
								$("#programme").prop("selectedIndex", 0);
							}
							else {
								$("#programme").trigger("change");
							}
						<?php } ?>
					} 
				});
			}
		});

		$("#programme").on('change',function() {
			var id = $(this).val();
			if (id) {
				modal.style.display = "block";
				$("#semester").find('option').remove();
				$("#course").find('option').remove();
				var dataString = 'id='+ id;
				$.ajax({
					type: "POST",
					url: '<?php echo Router::url(array("controller" => "Admin", "action" => "getsemesters")); ?>',
					data: dataString,
					cache: false,
					success: function(html) {
						modal.style.display = "none";
						count = 1;
						$.each(html, function(key, value) {
							if(count == 1)
								$('<option>').val('').text('select').appendTo($("#semester"));
							$('<option>').val(key).text(value).appendTo($("#semester"));
							count++;
						});
						<?php if(!empty($this->request->session()->read('semester'))) { ?>
							$("#semester").val('<?php echo $this->request->session()->read('semester'); ?>');
							var selected = $('#semester option:selected');
							if(selected.length == 0 || $("#semester").prop("selectedIndex") == 0) {
								$("#semester").prop("selectedIndex", 0);
							}
							else {
								$("#semester").trigger("change");
							}
						<?php } ?>
					} 
				});
			}	
		});
		
		$("#semester").on('change',function() {
			var id = $(this).val();
			if (id) {
				var programme_id = $("#programme").val();
				modal.style.display = "block";
				$("#course").find('option').remove();
				var dataString = 'id='+ id + '&programme_id=' + programme_id;
				$.ajax({
					type: "POST",
					url: '<?php echo Router::url(array("controller" => "Admin", "action" => "getcourses")); ?>',
					data: dataString,
					cache: false,
					success: function(html) {
						modal.style.display = "none";
						count = 1;
						$.each(html, function(key, value) {
							if(count == 1)
								$('<option>').val('').text('select').appendTo($("#course"));
							$('<option>').val(key).text(value).appendTo($("#course"));
							count++;
						});
						$("#course").val('<?php echo $this->request->session()->read('course_id'); ?>');
						var selected = $('#course option:selected');
						if(selected.length == 0 || $("#course").prop("selectedIndex") == 0) {
							$("#course").prop("selectedIndex", 0);
						}
					}
				});
			}	
		});
		<?php if(!empty($this->request->session()->read('esession'))) { ?> 
			$("#session").trigger("change");
		<?php } ?>
	});
</script>
		