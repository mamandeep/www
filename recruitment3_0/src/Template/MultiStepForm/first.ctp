<?php echo $this->element('nav-top'); 
echo $this->Form->create('Applicant', array('id' => 'Applicant_Details', 
                                'url' => Router::url( null, true ))); 
//debug($this->request->data);
        ?>
        <table>
            <tr>
                <td><?php 
                    //echo $this->Form->input('Applicant.appId', array('type' => 'hidden'));
                    echo $this->Form->input('Applicant.id', array('type' => 'hidden'));
                    echo $this->Form->input('Applicant.advertisement_no', array(
                        'type' => 'text',
                        'readonly' => 'readonly',
                        'value' => 'CUPB/18-19/003'
                    )); ?></td>
                <td><?php $post = !empty($postAppliedFor) ? $postAppliedFor : '';
                //$options = array( $post => $post );
                echo $this->Form->input('Applicant.post_applied_for', array(
                    'type' => 'text',
                     'readonly' => 'readonly'
                )); ?></td>
            </tr>
            <tr>
                <td><?php 
                    //echo $this->Form->input('Applicant.appId', array('type' => 'hidden'));
                    //echo $this->Form->input('Applicant.id', array('type' => 'hidden'));
                    echo $this->Form->input('Applicant.centre', array(
                        'type' => 'text',
                        'readonly' => 'readonly',
                        'label' => 'Department'
                    )); ?></td>
                <td><!--<?php
                echo $this->Form->input('Applicant.area', array(
                    'type' => 'text',
                     'readonly' => 'readonly',
                )); ?>--></td>
            </tr>
            <!--
            <tr>
                <td>
                    <div style="font-size: 20px; font-weight: bold; color: #0a0;">Payment Details</div>
                    <div>-->
                        <!--<span><a href="javascript:showChallan();" target="_blank">Challan</a></span>
                        <span style="margin: 0px 30px;"></span>
                        <span><a href="javascript:showDraft();" target="_blank">Draft</a></span>-->
                    <!--</div>
                </td>
                <td></td>
                <td></td>
            </tr>-->
        </table>
        <!--<table>-->
            <!--
            <tr class="challan">
                <td><?php echo $this->Form->input('Applicant.challan_no', array('label' => 'Challan No.', 'maxlength' => '500')); ?></td>
                <td><?php echo $this->Form->input('Applicant.challan_date', array('label' => 'Challan Date', 'maxlength' => '500')); ?></td>
                <td></td>
            </tr>-->
            <!--
            <tr class="draft">
                <td><?php echo $this->Form->input('Applicant.appfee_dd_no', array('label' => 'DD No.', 'maxlength' => '500')); ?></td>
                <td><?php echo $this->Form->input('Applicant.appfee_dd_date', array('label' => 'Date', 'maxlength' => '500')); ?></td>
                <td><?php echo $this->Form->input('Applicant.appfee_dd_amt', array('label' => 'Amount', 'maxlength' => '500')); ?></td>
            </tr>
            <tr class="draft">
                <td><?php echo $this->Form->input('Applicant.appfee_dd_bank', array('label' => 'Name of the Bank', 'maxlength' => '500')); ?></td>
                <td><?php echo $this->Form->input('Applicant.appfee_dd_branch', array('label' => 'Branch Name', 'maxlength' => '500')); ?></td>
                <td></td>
            </tr>
            -->
        <!--</table>-->
        <table>
            <tr>
                <td>
                    <div class="main_content_header">1. Applicant's Personal Details</div>
                </td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td><?php 
                    echo $this->Form->input('Applicant.first_name', array('label' => 'First Name:', 'maxlength' => '30'));
                 ?></td>
                <td><?php echo $this->Form->input('Applicant.middle_name', array('label' => 'Middle Name:', 'maxlength' => '30'));
                ?></td>
                <td><?php 
                    echo $this->Form->input('Applicant.last_name', array('label' => 'Last Name:', 'maxlength' => '30'));
                ?></td>
            </tr>
            <tr>
                <td><?php 
                    echo $this->Form->input('Applicant.email', array('label'=>'Email:', 'maxlength' => '50'));
		?></td>
                <td><?php echo $this->Form->input('Applicant.mobile_no', array('label' => 'Mobile Number:', 'maxlength' => '10')); ?></td>
                <td><?php echo $this->Form->input('Applicant.nationality', array('label' => 'Nationality:', 'maxlength' => '20')); ?></td>
            </tr>
            <tr>
                <td><?php 
                    echo $this->Form->input('Applicant.father_name', array('label' => 'Father\'s Name:', 'maxlength' => '50'));
                ?></td>
                <td><?php echo $this->Form->input('Applicant.father_contact_no', array('label' => 'Father\'s Contact No. or Landline No.', 'maxlength' => '15'));
                        //echo $this->Form->input('Applicant.alternate_no', array('label' => 'Alternate No. (prefereably of Father / Mother)', 'maxlength' => '10'));
                ?></td>
                <td><?php echo $this->Form->input('Applicant.aadhar_no', array('label' => 'Aadhar Number: (12 digits)', 'maxlength' => '12')); ?></td>
            </tr>
            <tr>
                <td><?php echo $this->Form->input('Applicant.mother_name', array('label' => 'Mother\'s Name:', 'maxlength' => '50'));
                ?></td>
                <td><?php //echo $this->Form->input('Applicant.mother_contact_no', array('label' => 'Mother\'s Contact No.', 'maxlength' => '10'));
                ?><?php echo $this->Form->input('Applicant.mother_contact_no', array('label' => 'Mother\'s Contact No.', 'maxlength' => '10'));
                        //echo $this->Form->input('Applicant.landline', array('label' => 'Phone No. (landline with STD code)', 'maxlength' => '50')); ?></td>
            </tr>
            <tr>
                <td><?php 
                    echo $this->Form->input('Applicant.marital_status', array(
                    'options' => array('Single' => 'Single', 'Married' => 'Married'),
                    'empty' => 'Select',
                    'style' => 'width: 100%;',
                    'id' => 'marital_status_select'
                ));
                 ?></td>
                <td><?php echo $this->Form->input('Applicant.spouse_name', array('label' => 'If Married, specify name of the spouse: ', 'maxlength' => '50')); ?></td>
                <td> <?php echo $this->Form->input('Applicant.gender', array(
                    'options' => array(
                        'Male' => 'Male',
                        'Female' => 'Female',
                        'Transgender' => 'Transgender'),
                    'empty' => 'Select',
                    'style' => 'width: 100%;'
                )); ?></td>
            </tr>
            <tr>
                <td><?php echo $this->Form->input('Applicant.category', array(
                    'options' => array(
                        'General' => 'General',
                        'SC' => 'SC',
                        'ST' => 'ST',
                        'OBC' => 'OBC'),
                    'empty' => 'Select',
                    //'selected' => (!empty($category) ? $category : 'Select'),
                    'style' => 'width: 100%;',
                    'label' => 'Category of the applicant'
                )); ?></td>
                <td> 
                    <?php echo $this->Form->input('Applicant.category_applied', array(
                    'options' => array(
                        'General' => 'General',
                        'SC' => 'SC',
                        'ST' => 'ST',
                        'OBC' => 'OBC'),
                    'empty' => 'Select',
                    //'selected' => (!empty($category) ? $category : 'Select'),
                    'style' => 'width: 100%;',
                    'label' => 'Under which category (General/SC/ST/OBC) applying for?'
                )); ?></td>
                <td rowspan="2"><?php echo $this->Form->input('Applicant.area_sp_combined', array('label' => 'Areas of Specialization and Sub-Specialization', 'maxlength' => '500')); ?></td>
            </tr>
            <tr>
                <td><?php echo $this->Form->input('Applicant.date_of_birth', array('id' => 'date_of_birth' , 'label' => 'Date of Birth (DD/MM/YYYY)', 'maxlength' => '500')); ?></td>
                <td><label class="table_headertxt">Age as on last date to Apply: </label>
                    <input type="text" class="age_computed"></input>
                </td>
            </tr>
            <tr>
                <td><?php echo $this->Form->input('Applicant.religion', array('label' => 'Religion', 'maxlength' => '50')); ?></td>
            </tr>
        </table>
        <br/>
        <?php
        echo $this->Form->input('Applicant.physically_disabled', array(
                        'options' => array('yes' => 'Yes',
                                           'no' => 'No'),
                        'empty' => '-Select-',
                        'label' => 'PWD (Divyang)',
                        'id' => 'physical_disable_select'
                    )); ?>
        <table id="physical_disable">
            <tr>
                <td class="table_headertxt"></td>
                <td class="table_headertxt">If applicable specify disability</td>
                <td class="table_headertxt">Percentage of disability(%)</td>
            </tr>
            <tr>
                <td>A. Blindness or low vision</td>
                <td><?php echo $this->Form->input('Applicant.blindness', array('label' => false, 'maxlength' => '100')); ?></td>
                <td><?php echo $this->Form->input('Applicant.blindness_pertge', array('label' => false, 'maxlength' => '50')); ?></td>
            </tr>
            <tr>
                <td>B. Hearing impairment</td>
                <td><?php echo $this->Form->input('Applicant.hearing', array('label' => false, 'maxlength' => '100')); ?></td>
                <td><?php echo $this->Form->input('Applicant.hearing_pertge', array('label' => false, 'maxlength' => '50')); ?></td>
            </tr>
            <tr>
                <td>C. Locomotor disability or cerebral palsy</td>
                <td><?php echo $this->Form->input('Applicant.locomotor', array('label' => false, 'maxlength' => '100')); ?></td>
                <td><?php echo $this->Form->input('Applicant.locomotor_pertge', array('label' => false, 'maxlength' => '50')); ?></td>
            </tr>
            <tr>
                <td>D. Autism, intellectual disability, specific learning disability and mental illness. Multiple disabilities from amongst persons under clauses a. to d. above.</td>
                <td><?php echo $this->Form->input('Applicant.autism', array('label' => false, 'maxlength' => '100')); ?></td>
                <td><?php echo $this->Form->input('Applicant.autism_pertge', array('label' => false, 'maxlength' => '50')); ?></td>
            </tr>
        </table>
        <br/>
        <?php
        echo $this->Form->input('Applicant.departmental_cand', array(
                        'options' => array( 'no' => 'No', 
                                            'Central Govt. Employee' => 'Central Govt. Employee',
                                            'State Govt. Employee' => 'State Govt. Employee',
                                            'Autonomous Body' => 'Autonomous Body',
                                            'PSU' => 'PSU'),
                        'empty' => '-Select-',
                        'label' => 'Are you already in regular Government Job? (Central, State, Autonomous Body, Public Sector Undertaking)',
                        'id' => 'departmental_cand'
                    ));  ?>
        <br/>
        <br/>
        <?php echo $this->Form->input('Applicant.retired', array(
                        'options' => array('yes' => 'Yes',
                                           'no' => 'No'),
                        'empty' => '-Select-',
                        'label' => 'Are you VRS/retired/superannuated employee?',
                        'id' => 'retired_id'
                    )); ?>
        <table id="retired_details">
            <tr>
                <td>If Yes, give details of pensionary benefits</td>
            </tr>
            <tr>
                <td><?php echo $this->Form->input('Applicant.pension_details', array('label' => false, 'maxlength' => '500')); ?></td>
            </tr>
        </table>
        <?php
        echo $this->Form->input('Applicant.internal_cand', array(
                        'options' => array('no' => 'No',
                                           'yes, Regular' => 'Yes, Regular',
                                           'yes, Contractual' => 'Yes, Contractual'),
                        'empty' => '-Select-',
                        'label' => 'CUPB employees',
                        'id' => 'internal_cand'
                    ));  ?>
        <br/>
        <div class="table_headertxt">Name & Complete Address with Pincode</div>
        <table id="address_table" border="2px solid black" style="border-collapse: collapse; border-right: 2px solid black !important;">
            <tr>
                <td width="45%"><?php echo $this->Form->label('MailingAddress', 'Postal Address'); ?></td>
                <td width="10%">Check this box if Postal address and Permanent address are the same</td>
                <td width="45%" colspan='2'><?php echo $this->Form->label('PermanentAddress', 'Permanent Address'); ?></td>
            </tr>
            <tr>
                <td><table>
                        <tr>
                            <td>House No.</td>
                            <td><?php echo $this->Form->input('Applicant.postal_house_no', array('type' => 'text', 'label' => false, 'maxlength' => '20')); ?></td>
                        </tr>
                        <tr>
                            <td>Street/Sector/Ward No.</td>
                            <td><?php echo $this->Form->input('Applicant.postal_stree_no', array('type' => 'text', 'label' => false, 'maxlength' => '50')); ?></td>
                        </tr>
                        <tr>
                            <td>Town/Village</td>
                            <td><?php echo $this->Form->input('Applicant.postal_town', array('type' => 'text', 'label' => false, 'maxlength' => '50')); ?></td>
                        </tr>
                        <tr>
                            <td>District</td>
                            <td><?php echo $this->Form->input('Applicant.postal_district', array('type' => 'text', 'label' => false, 'maxlength' => '50')); ?></td>
                        </tr>
                        <tr>
                            <td>State</td>
                            <td><?php echo $this->Form->input('Applicant.postal_state', array('type' => 'text', 'label' => false, 'maxlength' => '50')); ?></td>
                        </tr>
                        <tr>
                            <td>Pin Code</td>
                            <td><?php echo $this->Form->input('Applicant.postal_pin_code', array('type' => 'text', 'label' => false, 'maxlength' => '10')); ?></td>
                        </tr>
                    </table>
                    <?php //echo $this->Form->input('Applicant.mailing_address', array('type' => 'textarea', 'style' => 'overflow-y: scroll; height: 60px;', 'label' => ' ', 'maxlength' => '100')); ?></td>
                <td><?php echo $this->Form->input('Applicant.copy_postal', array(
                                  'type'=>'checkbox', 
                                  'id' => 'copy_postal',
                                  'label' => false
  )); ?>        </td>
                <td><table>
                        <tr>
                            <td>House No.</td>
                            <td><?php echo $this->Form->input('Applicant.permanent_house_no', array('type' => 'text', 'label' => false, 'maxlength' => '20')); ?></td>
                        </tr>
                        <tr>
                            <td>Street/Sector/Ward No.</td>
                            <td><?php echo $this->Form->input('Applicant.permanent_stree_no', array('type' => 'text', 'label' => false, 'maxlength' => '50')); ?></td>
                        </tr>
                        <tr>
                            <td>Town/Village</td>
                            <td><?php echo $this->Form->input('Applicant.permanent_town', array('type' => 'text', 'label' => false, 'maxlength' => '50')); ?></td>
                        </tr>
                        <tr>
                            <td>District</td>
                            <td><?php echo $this->Form->input('Applicant.permanent_district', array('type' => 'text', 'label' => false, 'maxlength' => '50')); ?></td>
                        </tr>
                        <tr>
                            <td>State</td>
                            <td><?php echo $this->Form->input('Applicant.permanent_state', array('type' => 'text', 'label' => false, 'maxlength' => '50')); ?></td>
                        </tr>
                        <tr>
                            <td>Pin Code</td>
                            <td><?php echo $this->Form->input('Applicant.permanent_pin_code', array('type' => 'text', 'label' => false, 'maxlength' => '10')); ?></td>
                        </tr>
                    </table>
                    <?php //echo $this->Form->input('Applicant.permanent_address', array('type' => 'textarea', 'style' => 'overflow-y: scroll; height: 60px;', 'label' => ' ', 'maxlength' => '100')); ?></td>
            </tr>
            <tr>
                <td colspan="3"><?php echo $this->Form->label('FaxNo', 'Fax. No. (if any)'); ?></td>
            </tr>
            <tr>
                <td colspan="3"><?php echo $this->Form->input('Applicant.fax', array('label' => false, 'maxlength' => '50')); ?></td>
            </tr>
        </table>
        <?php echo $this->Form->input('Applicant.age_on_adv_yrs', array('label' => false, 'type' => 'hidden')); ?>
        <?php echo $this->Form->input('Applicant.age_on_adv_mnths', array('label' => false, 'type' => 'hidden')); ?>
        <?php echo $this->Form->input('Applicant.age_on_adv_days', array('label' => false, 'type' => 'hidden')); ?>
	<div class="submit">
            <?php echo $this->Form->submit('Save & Continue', array('div' => false)); ?>
            <?php //echo $this->Form->submit('Cancel', array('name' => 'Cancel', 'div' => false)); 
                  echo $this->Form->button('Reset', array(
                    'type' => 'reset',
                    'div' => false            
                )); ?>
	</div>
<?php echo $this->Form->end(); ?>

<script>
    
    function checkleapyear(datea)
    {
        if(datea.getYear()%4 == 0)
        {
            if(datea.getYear()% 10 != 0)
            {
                return true;
            }
            else
            {
                if(datea.getYear()% 400 == 0)
                    return true;
                else
                    return false;
            }
        }
        return false; 
    } 
    
    function DaysInMonth(Y, M) {
        with (new Date(Y, M, 1, 12)) {
            setDate(0);
            return getDate();
        } 
    } 

    function datediff(date1, date2) {
        var y1 = date1.getFullYear(), m1 = date1.getMonth(), d1 = date1.getDate(),
        y2 = date2.getFullYear(), m2 = date2.getMonth(), d2 = date2.getDate();
        if (d1 < d2) {
            m1--;
            d1 += DaysInMonth(y2, m2);
        }
        if (m1 < m2) {
            y1--;
            m1 += 12;
        }
        return [y1 - y2, m1 - m2, d1 - d2]; 
    }
    
    function calage() {
        var dat = new Date("08/03/2018");
        var curday = dat.getDate();
        var curmon = dat.getMonth()+1;
        var curyear = dat.getFullYear();
        var dob = $("#date_of_birth").val().split("/");
        var calday = dob[0];
        var calmon = dob[1];
        var calyear = dob[2];
        var curd = new Date(curyear,curmon-1,curday);
        var cald = new Date(calyear,calmon-1,calday);
        var diff = Date.UTC(curyear,curmon,curday,0,0,0) - Date.UTC(calyear,calmon,calday,0,0,0);
        var dife = datediff(curd,cald);
        return dife;
    }
    
    function dateFormatCheck() {
        if($("#date_of_birth").val().trim() !== '') {
            var t = $("#date_of_birth").val().match(/^(\d{2})\/(\d{2})\/(\d{4})$/);
            if(t !== null) {
                var diff_years = calage();
                /*if(diff_years[0] > 35) {
                    alert('Age is more than eligibilty criteria');
                }
                else {*/
                $('.age_computed').val(diff_years[0]+' Y, ' + diff_years[1]+' M, ' + diff_years[2]+' D');
                $('input[name="data[Applicant][age_on_adv_yrs]"]').val(diff_years[0]);
                $('input[name="data[Applicant][age_on_adv_mnths]"]').val(diff_years[1]);
                $('input[name="data[Applicant][age_on_adv_days]"]').val(diff_years[2]);
                //}
            }
            else {
                $('.age_computed').val('');
                $('input[name="data[Applicant][age_on_adv_yrs]"]').val('');
                $('input[name="data[Applicant][age_on_adv_mnths]"]').val('');
                $('input[name="data[Applicant][age_on_adv_days]"]').val('');
                alert('Date of birth is not in a correct format.');
            }
        }
        else {
            $('.age_computed').val('');
            $('input[name="data[Applicant][age_on_adv_yrs]"]').val('');
            $('input[name="data[Applicant][age_on_adv_mnths]"]').val('');
            $('input[name="data[Applicant][age_on_adv_days]"]').val('');
        }
    }
    
    function aadharFormatCheck() {
        if($("input[name='data[Applicant][aadhar_no]']").val().trim() !== '') {
            var t = $("input[name='data[Applicant][aadhar_no]']").val().match(/^(\d{12})$/);
            if(t === null) {
                alert('Aadhar Number is not in a correct format.');
            }
        }
    }
    
    $(document).ready(function () {
        if($("#physical_disable_select option:selected").text() === "Yes") {
            $('#physical_disable').css('display', 'table');
        }
        else {
            $('#physical_disable').css('display', 'none');
        }
        
        if($("#retired_id option:selected").text() === "Yes") {
            $('#retired_details').css('display', 'table');
        }
        else {
            $('#retired_details').css('display', 'none');
        }
        
        if($("#marital_status_select option:selected").text() === "Married") {
            $("input[name='data[Applicant][spouse_name]']").css('display', 'table');
        }
        else {
            $("input[name='data[Applicant][spouse_name]']").css('display', 'none');
        }
        
        $('.age_computed').attr('disabled', 'true');
        dateFormatCheck();
        
        $("#date_of_birth").focusout(function(){
            dateFormatCheck();
        });
        
        $("input[name='data[Applicant][aadhar_no]']").focusout(function(){
            aadharFormatCheck();
        });
        
        $("select[name='data[Applicant][physically_disabled]']").change(function(){
            if($(this).val() === 'no') {
                $('#physical_disable').each(function(){
                    $(this).css('display','none');
                });
            }
            else {
                $('#physical_disable').each(function(){
                    $(this).css('display','table');
                });
            }
        });
        
        $("select[name='data[Applicant][retired]']").change(function(){
            if($(this).val() === 'no') {
                $('#retired_details').each(function(){
                    $(this).css('display','none');
                });
            }
            else {
                $('#retired_details').each(function(){
                    $(this).css('display','table');
                });
            }
        });
        
        $("select[name='data[Applicant][marital_status]']").change(function(){
            if($(this).val() === 'Married') {
                $("input[name='data[Applicant][spouse_name]']").each(function(){
                    $(this).css('display','table');
                });
            }
            else {
                $("input[name='data[Applicant][spouse_name]']").each(function(){
                    $(this).css('display','none');
                });
            }
        });
        
        $("#copy_postal").click(function () {
            if($("#copy_postal").is(":checked")) {
              $("input[name='data[Applicant][permanent_house_no]'").val($("input[name='data[Applicant][postal_house_no]'").val());
              $("input[name='data[Applicant][permanent_stree_no]'").val($("input[name='data[Applicant][postal_stree_no]'").val());
              $("input[name='data[Applicant][permanent_town]'").val($("input[name='data[Applicant][postal_town]'").val());
              $("input[name='data[Applicant][permanent_district]'").val($("input[name='data[Applicant][postal_district]'").val());
              $("input[name='data[Applicant][permanent_state]'").val($("input[name='data[Applicant][postal_state]'").val());
              $("input[name='data[Applicant][permanent_pin_code]'").val($("input[name='data[Applicant][postal_pin_code]'").val());
            }
        });
    });
    
</script>