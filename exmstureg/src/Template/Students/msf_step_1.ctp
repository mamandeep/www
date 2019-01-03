<style>
    .labelsp {
        margin-right: 20px;
    }
    .form-label {
    	padding-left: 0px;
    	text-align: center;
    }
    table {
    	table-layout: fixed;
    }
</style>
<div align="center">
<table>
    <tr>
        <td style="text-align: center;" class="form-label"><h2>CENTRAL UNIVERSITY OF PUNJAB<br>CITY CAMPUS, MANSA ROAD, BATHINDA - 151001</h2></td>
    </tr>
    <tr>
        <td style="text-align: center;" class="form-label"><h4>Student Registration</h4></td>
    </tr>
    <tr>
        <td style="text-align: center;" class="form-label"><h4>Application Form / Information Sheet</h4></td>
    </tr>
</table>
</div>
<?php 
    echo $this->Form->create($candidate);
    echo $this->Form->control("id", ['type' => 'hidden']); 
    echo $this->Form->control("user_id", ['type' => 'hidden']); ?>
<div>
<table width="100%">
    <tr>
        <td class="form-label">Name of Student (IN BLOCK LETTER) (As per 10th Class Certificate): </td>
        <td><?php echo $this->Form->control('name', ['label' => false, 'maxlength'=>'50']); ?></td>
    </tr>
    <tr>
        <td class="form-label">Father's Name (IN BLOCK LETTER): </td>
        <td><?php echo $this->Form->control('father_name', ['label' => false, 'maxlength'=>'50']); ?></td>
    </tr>
    <tr>
        <td class="form-label">Mother's Name (IN BLOCK LETTER): </td>
        <td><?php echo $this->Form->control('mother_name', ['label' => false, 'maxlength'=>'50']); ?></td>
    </tr>
    <tr>
        <td class="form-label">Guardian Name (if any): </td>
        <td><?php echo $this->Form->control('guardian_name', ['label' => false, 'maxlength'=>'50']); ?></td>
    </tr>
 </table>
 <table width="100%">
    <tr>
        <td width="25%" class="form-label">Aadhaar Number (12 digits):</td>
        <td width="25%"><?php echo $this->Form->control('aadhaar_no', ['label' => false, "id_aadhaar_no", 'maxlength'=>'12']); ?></td>
        <td width="25%" class="form-label">Date of Birth:</td>
        <td width="25%"><?php echo $this->Form->control('dob', ['label' => false, 'maxlength'=>'10']); ?></td>
    </tr>
    <tr>
        <td width="25%" class="form-label">Gender:</td>
        <td width="25%"><?php echo $this->Form->control('gender', ['label' => false, 'empty' => ['select' => 'Select'],  'options' => ['Male' => 'Male', 'Female' => 'Female', 'Other' => 'Other'], 'type' => 'select' , 'id' => "id_gender", 'maxlength'=>'15']); ?></td>
        <td width="25%" class="form-label">Blood Group:</td>
        <td width="25%"><?php echo $this->Form->control('blood_group', ['label' => false, 'empty' => ['select' => 'Select'],  'options' => ['O−' => 'O−', 'O+' => 'O+', 'A−' => 'A−', 'A+' => 'A+', 'B−' => 'B−', 'B+' => 'B+', 'AB−' => 'AB−', 'AB+' => 'AB+'], 'type' => 'select' , 'id' => "id_blood_group", 'maxlength'=>'15']); ?></td>
    </tr>
    <tr>
        <td width="25%" class="form-label">Full Permanent Address:</td>
        <td width="25%"><?php echo $this->Form->control('permanent_address', ['label' => false, 'maxlength'=>'150']); ?></td>
        <td width="25%" class="form-label">Full Present Address:</td>
        <td width="25%"><?php echo $this->Form->control('present_address', ['label' => false, 'maxlength'=>'150']); ?></td>
    </tr>
    <tr>
        <td width="25%" class="form-label">State:</td>
        <td width="25%"><?php echo $this->Form->control('state', ['label' => false, 'empty' => ['select' => 'Select'],  'options' => ['Andaman and Nicobar Islands' => 'Andaman and Nicobar Islands','Andhra Pradesh' => 'Andhra Pradesh','Arunachal Pradesh' => 'Arunachal Pradesh','Assam' => 'Assam','Bihar' => 'Bihar','Chandigarh' => 'Chandigarh','Chhattisgarh' => 'Chhattisgarh','Dadra and Nagar Haveli' => 'Dadra and Nagar Haveli','Daman and Diu' => 'Daman and Diu','Delhi' => 'Delhi','Goa' => 'Goa','Gujarat' => 'Gujarat','Haryana' => 'Haryana','Himachal Pradesh' => 'Himachal Pradesh','Jammu and Kashmir' => 'Jammu and Kashmir','Jharkhand' => 'Jharkhand','Karnataka' => 'Karnataka','Kerala' => 'Kerala','Lakshadweep' => 'Lakshadweep','Madhya Pradesh' => 'Madhya Pradesh','Maharashtra' => 'Maharashtra','Manipur' => 'Manipur','Meghalaya' => 'Meghalaya','Mizoram' => 'Mizoram','Nagaland' => 'Nagaland','Odisha' => 'Odisha','Puducherry' => 'Puducherry','Punjab' => 'Punjab','Rajasthan' => 'Rajasthan','Sikkim' => 'Sikkim','Tamil Nadu' => 'Tamil Nadu','Telangana' => 'Telangana','Tripura' => 'Tripura','Uttar Pradesh' => 'Uttar Pradesh','Uttarakhand' => 'Uttarakhand','West Bengal' => 'West Bengal'], 'type' => 'select' , 'id' => "id_state", 'maxlength' => '30']); ?></td>
        <td width="25%" class="form-label">District:</td>
        <td width="25%"><?php echo $this->Form->control('district', ['label' => false, 'maxlength'=>'50']); ?></td>
    </tr>
    <tr>
        <td width="25%" class="form-label">City/Village:</td>
        <td width="25%"><?php echo $this->Form->control('city_village', ['label' => false, 'maxlength'=>'50']); ?></td>
        <td width="25%" class="form-label">PIN Code:</td>
        <td width="25%"><?php echo $this->Form->control('pin_code', ['label' => false, 'maxlength'=>'6']); ?></td>
    </tr>
    <tr>
        <td width="25%" class="form-label">Email ID-01:</td>
        <td width="25%"><?php echo $this->Form->control('email1', ['label' => false, 'maxlength'=>'30', 'readonly' => 'readonly', 'value' => $registered_email]); ?></td>
        <td width="25%" class="form-label">Email ID-02:</td>
        <td width="25%"><?php echo $this->Form->control('email2', ['label' => false, 'maxlength'=>'30']); ?></td>
    </tr>
    <tr>
        <td colspan="4" class="form-label"><?php 
                echo $this->Form->button(__('Next step'));
          ?></td>
    </tr>
</table>
</div>
<?php echo $this->Form->end();  ?>


<script>
    $(document).ready(function(){
      var date_input=$('input[name="dob"]'); //our date input has the name "date"
      var container=$('.form-container form').length>0 ? $('.form-container form').parent() : "body";
      var options={
        format: 'dd/mm/yyyy',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
      
      $('select[name=valid_gate_gpat]').change(function(){
          if($(this).val() == "no") {
              $('select[name=ggp_exam]').attr('disabled', true);
              $('input[name=ggp_roll_no]').attr('disabled', true);
              $('input[name=ggp_year_passing]').attr('disabled', true);
              $('input[name=ggp_marksobtained_rank]').attr('disabled', true);
          }
          else if($(this).val() == "yes") {
              $('select[name=ggp_exam]').attr('disabled', false);
              $('input[name=ggp_roll_no]').attr('disabled', false);
              $('input[name=ggp_year_passing]').attr('disabled', false);
              $('input[name=ggp_marksobtained_rank]').attr('disabled', false);
          }
          else {
              
          }
      });
      
      $('select[name=valid_gate_gpat]').change();
    })
</script>