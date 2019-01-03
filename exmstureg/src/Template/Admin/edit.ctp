<h1>Edit Student Information</h1>
<?php
    echo $this->Form->create($student); //debug($student);
    echo $this->Form->control('id', ['type' => 'hidden']);
    echo $this->Form->control('registration_no');
    echo $this->Form->control('admission_date');
    echo $this->Form->control('date_of_completion');
    echo $this->Form->input('batch_id', array('label'=>'Batch', 'type'=>'select', 'options'=>$batches, 'empty' => 'Select'));
    echo $this->Form->input('semester_id', array('label'=>'Semester', 'type'=>'select', 'options'=>$semesters, 'empty' => 'Select'));
    echo $this->Form->input('session_id', array('label'=>'Session', 'type'=>'select', 'options'=>$sessions, 'empty' => 'Select'));
    echo $this->Form->input('programme_id', array('label'=>'Programme', 'type'=>'select', 'options'=>$programmes, 'empty' => 'Select'));
?>
    <div><?php echo $this->Html->link('Go back',
                    array('action' => 'index'),
                    array('class' => 'button btn btn-success')
                ); echo "      "; echo $this->Form->button(__('Save Student Information')); ?></div>
    <?php echo $this->Form->end();
?>

<script type="text/javascript">
    $(document).ready(function(){
      var date_input_admission=$('input[name="admission_date"]'); //our date input has the name "date"
      var container=$('.form-container form').length>0 ? $('.form-container form').parent() : "body";
      var options={
        format: 'dd/mm/yyyy',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input_admission.datepicker(options);
      
      var date_input_doc=$('input[name="date_of_completion"]'); //our date input has the name "date"
      var container=$('.form-container form').length>0 ? $('.form-container form').parent() : "body";
      var options={
        format: 'dd/mm/yyyy',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input_doc.datepicker(options);
    })
</script>