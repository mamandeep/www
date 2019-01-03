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
        <td width="25%"><?php echo $this->Form->control('aadhaar_no', ['label' => false, 'maxlength'=>'12']); ?></td>
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
        <td width="25%" class="form-label">Nationality:</td>
        <td width="25%"><?php echo $this->Form->control('nationality', ['label' => false, 'empty' => ['select' => 'Select'],  'options' => ['Indian' => 'Indian'], 'type' => 'select' , 'id' => "id_nationality", 'maxlength' => '10']); ?></td>
        <td width="25%" class="form-label">Religion:</td>
        <td width="25%"><?php echo $this->Form->control('religion', ['label' => false, 'empty' => ['select' => 'Select'],  'options' => ['Hinduism' => 'Hinduism', 'Islam' => 'Islam', 'Christianity' => 'Christianity', 'Sikhism' => 'Sikhism', 'Buddhism' => 'Buddhism', 'Jainism' => 'Jainism', 'Other' => 'Other', 'Not specified' => 'Not specified'] , 'type' => 'select' , 'id' => "id_religion", 'maxlength'=>'30']); ?></td>
    </tr>
    <tr>
        <td width="25%" class="form-label">Category:</td>
        <td width="25%"><?php echo $this->Form->control('category', ['label' => false, 'empty' => ['select' => 'Select'],  'options' => ['SC'=>'SC', 'ST'=>'ST', 'OBC'=>'OBC', 'General'=>'General'], 'type' => 'select' , 'id' => "id_category", 'maxlength' => '15']); ?></td>
        <td width="25%" class="form-label">Sub-Category:</td>
        <td width="25%"><?php echo $this->Form->control('sub_category', ['label' => false, 'maxlength'=>'50']); ?></td>
    </tr>
    <tr>
        <td width="25%" class="form-label">Minority,if yes,mention the Minority:</td>
        <td width="25%"><?php echo $this->Form->control('minority', ['label' => false, 'empty' => ['select' => 'Select'],  'options' => ['Muslim'=>'Muslim', 'Sikh'=>'Sikh', 'Parsi'=>'Parsi', 'Buddhist'=>'Buddhist', 'Christian' => 'Christian', 'Jain'=>'Jain'], 'type' => 'select' , 'id' => "id_minority", 'maxlength' => '20']); ?></td>
        <td width="25%" class="form-label">Supernumerary Quota,if yes, please mention:</td>
        <td width="25%"><?php echo $this->Form->control('supernumerary', ['label' => false, 'empty' => ['select' => 'Select'],  'options' => ['PWD'=>'PWD', 'WOD'=>'WOD', 'J&K'=>'J&K'], 'type' => 'select' , 'id' => "id_supernumerary", 'maxlength' => '15']); ?></td>
    </tr>
    <tr>
        <td width="25%" class="form-label">Annual Income of Parents (from all sources)(Rs.):</td>
        <td width="25%"><?php echo $this->Form->control('parents_income', ['label' => false, 'maxlength'=>'20']); ?></td>
        <td width="25%" class="form-label">Economically Deprived / Backward:</td>
        <td width="25%"><?php echo $this->Form->control('economically_backward', ['label' => false, 'empty' => ['select' => 'Select'],  'options' => ['Yes'=>'Yes', 'No'=>'No'], 'type' => 'select' , 'id' => "id_economic_back", 'maxlength' => '10']); ?></td>
    </tr>
    <tr>
        <td colspan="2" class="form-label">Any Card Holder (Yellow/BPL) if belongs to Economically Backward:</td>
        <td colspan="2"><?php echo $this->Form->control('economically_backward_detail', ['label' => false, 'empty' => ['select' => 'Select'],  'options' => ['Yellow'=>'Yellow', 'BPL'=>'BPL'], 'type' => 'select' , 'id' => "id_economic_back_detail", 'maxlength' => '10']); ?></td>
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
        <td width="25%"><?php echo $this->Form->control('pin_code', ['label' => false, 'maxlength'=>'10']); ?></td>
    </tr>
    <tr>
        <td width="25%" class="form-label">Email ID-01:</td>
        <td width="25%"><?php echo $this->Form->control('email1', ['label' => false, 'maxlength'=>'30']); ?></td>
        <td width="25%" class="form-label">Email ID-02:</td>
        <td width="25%"><?php echo $this->Form->control('email2', ['label' => false, 'maxlength'=>'30']); ?></td>
    </tr>
    <tr>
        <td width="25%" class="form-label">Student Mobile No. (attached with Aadhaar):</td>
        <td width="25%"><?php echo $this->Form->control('mobile_no', ['label' => false, 'maxlength'=>'10']); ?></td>
        <td width="25%" class="form-label">Emergency Contact No. (Please fill Name of Person to be contact/Relationship with student in next line):</td>
        <td width="25%"><?php echo $this->Form->control('emer_contact_no', ['label' => false, 'maxlength'=>'10']); ?></td>
    </tr>
    <tr>
        <td width="25%" class="form-label">Name of Emergency Contact:</td>
        <td width="25%"><?php echo $this->Form->control('emer_name', ['label' => false, 'maxlength'=>'50']); ?></td>
        <td width="25%" class="form-label">Relationship with student:</td>
        <td width="25%"><?php echo $this->Form->control('emer_relation', ['label' => false, 'maxlength'=>'20']); ?></td>
    </tr>
    <tr>
        <td width="25%" class="form-label">Hosteler:</td>
        <td width="25%"><?php echo $this->Form->control('hosteler', ['label' => false, 'empty' => ['select' => 'Select'],  'options' => ['Yes' => 'Yes', 'No' => 'No'], 'type' => 'select' , 'id' => "id_hosteler", 'maxlength'=>'10']); ?></td>
        <td width="25%" class="form-label">Day Scholar: </td>
        <td width="25%"><?php echo $this->Form->control('day_scholar', ['label' => false, 'empty' => ['select' => 'Select'],  'options' => ['Yes' => 'Yes', 'No' => 'No'], 'type' => 'select' , 'id' => "id_dayscholar", 'maxlength'=>'10']); ?></td>
    </tr>
    <tr>
        <td width="25%" class="form-label">Fellowship (if any)(500 Characters):</td>
        <td width="25%"><?php echo $this->Form->control('fellowship', ['label' => false, 'maxlength'=>'500']); ?></td>
        <td class="form-label">Any Gap in Studies (500 Characters):</td>
        <td><?php echo $this->Form->control('gap_in_studies', ['label' => false, 'maxlength'=>'500']); ?></td>
    </tr>
    <tr>
        <td colspan="2" width="25%" class="form-label">Migration and Character certificate issued from previous University:</td>
        <td colspan="2" width="25%"><?php echo $this->Form->control('migration_character', ['label' => false, 'empty' => ['select' => 'Select'],  'options' => ['Yes' => 'Yes', 'No' => 'No'], 'type' => 'select' , 'id' => "id_migration", 'maxlength'=>'10']); ?></td>
    </tr>
    <tr>
        <td colspan="4" align="center"><?php echo $this->Form->button(__('Save')); ?></td>
	<td><?php /*echo $this->Html->link(
		    'Next',
		    '/preferences/add',
		    ['class' => 'button btn btn-success']
	    );*/ ?>
	</td>
    </tr>
</table>
</div>

<?php echo $this->Form->end();  ?>

<script type="text/javascript">
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