<?php echo $this->Form->create('Applicant', array('id' => 'Reg_User_Details', 'url' => Router::url( null, true ))); ?>
 <!--
    <div id="tabs">
    <div>Is Applicant ID. alloted to you?</div>
    <select id="applicant_id_given" name="data[Applicant][applicant_id_given]" required>
        <option value="yes">Yes</option>
        <option value="no" selected="selected">No</option>
    </select>
-->
<div id="tabs-1">
	<table id="applicant_id_input">
		<tr> <!--check if applicant has been alloted applicant_id-->
                    <td width="30%"></td>
                    <td class="table_headertxt" style="padding-top: 17px; width: 20%;">Enter Applicant Id</td>
                    <td><?php echo $this->Form->input('Applicant.id', array('label' => false, 'type' => 'text')); ?></td>
                    <td width="30%"></td>
		</tr>
                <tr> <!--check if applicant has been alloted applicant_id-->
                    <td width="30%"></td>
                    <td class="table_headertxt" style="padding-top: 17px; width: 20%;">Enter Registered Email Id</td>
                    <td><?php echo $this->Form->input('Applicant.email', array('label' => false, 'type' => 'text')); ?></td>
                    <td width="30%"></td>
		</tr>
                <tr> <!--check if applicant has been alloted applicant_id-->
                    <td width="30%"></td>
                    <td class="table_headertxt" style="padding-top: 17px; width: 20%;">Enter Registered Date of Birth: (DD/MM/YYYY)</td>
                    <td><?php echo $this->Form->input('Applicant.date_of_birth', array('label' => false, 'type' => 'text')); ?></td>
                    <td width="30%"></td>
		</tr>
                <tr> <!--check if applicant has been alloted applicant_id-->
                    <td width="30%"></td>
                    <td><div class="submit">
                            <?php echo $this->Form->submit('Submit', array('div' => false)); ?>
                        </div>
                    </td>
                    <td></td>
                    <td width="30%"></td>
		</tr>
	</table>
	<!--<form  method="post" action="validate_api.php" name="frmTransaction" id="frmTransaction" onSubmit="return validate()">-->
	<!--<div style="font-size: 30px;">Kindly do not proceed further. It will be enabled shortly!</div>-->

</div>
<?php echo $this->Form->end(); ?>


<script>
$(document).ready(function () {
        /*if($("#applicant_id_given option:selected").text() === "Yes") {
            $('#applicant_id_input').css('display', 'table');
        }
        else {
            $('#applicant_id_input').css('display', 'none');
        }
        
        $("select[name='data[Applicant][applicant_id_given]']").change(function(){
            if($(this).val() === 'no') {
                $('#applicant_id_input').each(function(){
                    $(this).css('display','none');
                });
            }
            else {
                $('#applicant_id_input').each(function(){
                    $(this).css('display','table');
                });
            }
        });*/
        
    });
    
</script>