<style type="text/css">

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

    .print_required label:after { 
        content:"*";
        display:inline;
        float:none;
        color:red !important;
        font-weight:bold;
        font-size: 20px;
        margin:0;
        padding:0;
    }

    .print_headers {
        font-size: 12px;
        color: #010101;
        padding: 3px;
        font-family: Verdana, Geneva, sans-serif;
    }

    td .print_headers .top {
        vertical-align: top;
    }

    td .print_headers .middle {
        vertical-align: middle;
    }

    td .print_headers .middle {
        vertical-align: bottom;
    }

    .print_value {
        font-size: 12px;
        font-weight: bold;
        color: black;
        padding: 3px;
        text-transform: uppercase;
        font-family: Arial, Helvetica, sans-serif;
    }

    td .print_value .top {
        vertical-align: top;
    }

    td .print_value .middle {
        vertical-align: middle;
    }

    td .print_value .bottom {
        vertical-align: bottom;
    }

    table#onlineformdata td {
        padding: 0px;
        margin: 0px;
    }
    
    .misc_col1 {
        width: 45%;
    }

    tr.spaceUnder>td {
        padding-bottom: 15px;
    }

    tr.spaceUpper>td {
        padding-top: 15px;
    }

    #employee_endorsement {
        border: none;
    }
    #employee_endorsement tr {
        border: none;
    }
    #employee_endorsement tr td{
        border: none;
    }
    
    .red_label {
        display:inline;
        float:none;
        color:red !important;
        font-weight:bold;
        font-size: 16px;
        margin:0;
        padding:0;
    }

    #onlineformdata td {
        vertical-align: top;
    }
    
    #education_table td {
        vertical-align: top;
    }
    
    #education_table td.print_value {
        font-size: 9px;
    }

    #education_table td.print_headers {
        font-size: 9px;
    }
    
    #experience_table td {
        vertical-align: top;
    }
    
    #experience_table td.print_value {
        font-size: 9px;
    }

    #experience_table td.print_headers {
        font-size: 9px;
    }
    
    #ugcnet_table td, #experience_table td, #exp_during_phd_table td, #rp_in_journals_table td,
    #ra_in_books_table td, #rp_in_conference_table td, #pa_in_periodicals_table td, #em_research_table td,
    #research_index_table td, #seminar_attended_table td, #seminar_organized_table td, #peer_recognition_table td,
    #referee_table td, #present_position_table td, #other_information_table td, #research_guidance_table td, #testimonial_table td {
        vertical-align: top;
    }
    
    #ugcnet_table td.print_value, #experience_table td.print_value, #exp_during_phd_table td.print_value, #rp_in_journals_table td.print_value,
    #ra_in_books_table td.print_value, #rp_in_conference_table td.print_value, #pa_in_periodicals_table td.print_value, #em_research_table td.print_value,
    #research_index_table td.print_value, #seminar_attended_table td.print_value, #seminar_organized_table td.print_value, #peer_recognition_table td.print_value,
    #referee_table td.print_value, #present_position_table td.print_value, #other_information_table td.print_value, #research_guidance_table td.print_value,
	#testimonial_table td.print_value {
        font-size: 9px;
    }
    
    #ugcnet_table td.print_headers, #experience_table td.print_headers, #exp_during_phd_table td.print_headers, #rp_in_journals_table td.print_headers,
    #ra_in_books_table td.print_headers, #rp_in_conference_table td.print_headers, #pa_in_periodicals_table td.print_headers, #em_research_table td.print_headers,
    #research_index_table td.print_headers, #seminar_attended_table td.print_headers, #seminar_organized_table td.print_headers, #peer_recognition_table td.print_headers,
    #referee_table td.print_headers, #present_position_table td.print_headers, #other_information_table td.print_headers, #research_guidance_table td.print_headers,
	#testimonial_table td.print_headers {
        font-size: 9px;
    }
    
    @media print {

        #experience_info {
            page-break-before: always;
        }
        #employee_endorsement {
            page-break-before: always;
        }
        
        .no-print, .no-print *
        {
            display: none !important;
        }
        
        @page {
            size: auto;   /* auto is the initial value */
            margin: 20px 0 20px 30px;  
        }
    }
    
    hr { 
        display: block;
        margin-top: 0.5em;
        margin-bottom: 0.5em;
        margin-left: auto;
        margin-right: auto;
        border-style: inset;
        border-width: 2px;
    }
</style>
<?php if(isset($data_set) && $data_set === 'true') {
    $this->Html->css('cake.generic.css');
    echo $this->Html->script('jquery-1.11.1-min');
?>
<span style="padding: 1px 10px; float: right;" class="no-print">
<?php
    echo $this->Html->link(('Logout'), array('controller'=>'users', 'action'=>'logout'));
?>
</span>
<div id="contentContainer" style="width: 710px; max-width: 710px; margin-left: 0px;">
    <span style="float: right; width: 132px;"><span><img src="<?php if(!empty($image['Document']['filename'])) { echo $this->webroot . '/' . $image['Document']['filename']; } else { echo ""; } ?>" alt="Passport Size Photograph" height="132px" width="132px"></span><br/>
                                            <span><img src="<?php if(!empty($image['Document']['filename4'])) { echo $this->webroot . '/' . $image['Document']['filename4']; } else { echo ""; } ?>" alt="Signature" height="50px" width="132px"></span>
    </span>
    <div style="width: 578px">
        <div style="float: left; width: 80px;"><img src="<?php echo $this->webroot . 'files/cup_logo.png'; ?>" alt="Logo of Central University of Punjab" height="120px" width="80px" /></div>
        <div style="float: left; width: 498px; text-align: center"><span style="font-size: 24px; font-weight: bold; text-align: center">CENTRAL UNIVERSITY OF PUNJAB</span><br/>
            <span style="font-size: 12px; font-weight: bold; text-align: center">(Established vide Act no 25(2009) of Parliament)</span><br/>
            <span style="font-size: 16px; text-align: center">Advertisement No.: <strong><?php echo $applicant['Applicant']['advertisement_no'] ?></strong></span><br/>
            <span style="font-size: 16px; text-align: center">Application Form for the post of <label class="print_value"><?php echo $applicant['Applicant']['post_applied_for']?></label></span><br/>
            <span style="font-size: 16px; text-align: center">Area of Specialization: <label class="print_value"><?php echo $applicant['Applicant']['area_sp_combined']?></label></span><br/>
            <span style="font-size: 16px; text-align: center">Department: <label class="print_value"><?php echo $applicant['Applicant']['centre']?></label></span><br/>
        </div>
        <br style="clear: left;" />
    </div>
    <table id="onlineformdataheader"  style="width: 578px" class="print_table" style="table-layout:fixed;">
        <tr>
            <td width="25%" class="print_headers">Application Number</td>
            <td width="30%" class="print_value"><?php echo $applicant['Applicant']['id'] ?></td>
            <td width="15%" class="print_headers"></td>
            <td width="25%" class="print_value"></td>
        </tr>
        <tr>
            <td class="print_headers">Payment Id</td>
            <td class="print_value"><?php echo $applicant['Applicant']['payment_id'] ?></td>
            <td class="print_headers">Dated</td>
            <td class="print_value"><?php echo $applicant['Applicant']['payment_date_created'] ?></td>
        </tr>   
    </table>
    <hr>
    <table id="onlineformdata"  class="print_table" style="table-layout:fixed;">
        <tr>
            <td width="17%" class="print_headers">Name</td>
            <td width="33%" class="print_value"><?php echo $applicant['Applicant']['first_name'] ?>&nbsp;<?php echo $applicant['Applicant']['middle_name']?>&nbsp;<?php echo $applicant['Applicant']['last_name']?>
            </td>
            <td width="20%" class="print_headers">Father's Name</td>
            <td width="30%" class="print_value"><?php echo $applicant['Applicant']['father_name'] ?>
            </td>
        </tr>
        <tr>
            <td class="print_headers">Mother's Name</td>
            <td class="print_value"><?php echo $applicant['Applicant']['mother_name']?>
            </td>
            <td class="print_headers">Date of Birth</td>
            <td class="print_value"><?php echo $applicant['Applicant']['date_of_birth']?>
            </td>
        </tr>
        <tr>
            <td class="print_headers">Applied Category</td>
            <td class="print_value"><?php echo $applicant['Applicant']['category_applied'] ?>
            </td>
            <td class="print_headers">Applicant's Category</td>
            <td class="print_value"><?php echo $applicant['Applicant']['category'] ?>
            </td>
        </tr>
        <tr>
            <td class="print_headers">Marital Status</td>
            <td class="print_value"><?php echo $applicant['Applicant']['marital_status']?>
            </td>
            <td class="print_headers">Spouse Name</td>
            <td class="print_value"><?php echo $applicant['Applicant']['spouse_name']?>
            </td>
        </tr>
        <tr>
            <td class="print_headers">Gender</td>
            <td class="print_value"><?php echo $applicant['Applicant']['gender']; ?>
            </td>
            <td class="print_headers">Aadhar No.</td>
            <td class="print_value"><?php echo $applicant['Applicant']['aadhar_no'] ?>
            </td>
        </tr>
        <tr>
            <td class="print_headers">Email: </td>
            <td class="print_value"><?php echo $applicant['Applicant']['email'] ?>
            </td>
            <?php if(!empty($applicant['Applicant']['physically_disabled']) && $applicant['Applicant']['physically_disabled'] == "yes") {?>
            <td class="print_headers">Divyaang</td>
            <td class="print_value"><?php echo $applicant['Applicant']['physically_disabled'] ?>
            </td>
            <?php } ?>
        </tr>
        <tr>
            <td class="print_headers">Mobile No.:</td>
            <td class="print_value"><?php echo $applicant['Applicant']['mobile_no']; ?>
            </td>
            <?php if(!empty($applicant['Applicant']['physically_disabled']) && $applicant['Applicant']['physically_disabled'] == "yes") {?>
            <td class="print_headers">Sub Category, If Yes</td>
            <td class="print_value"><?php if(!empty($applicant['Applicant']['physically_disabled']) && $applicant['Applicant']['physically_disabled'] == "yes") { 
                        if(!empty($applicant['Applicant']['blindness']) || !empty($applicant['Applicant']['blindness_pertge'])) { 
                            echo "A:(" . $applicant['Applicant']['blindness'] . ")" .  $applicant['Applicant']['blindness_pertge'] . ",";
                        }
                        if(!empty($applicant['Applicant']['hearing']) || !empty($applicant['Applicant']['hearing_pertge'])) { 
                            echo "B:(" . $applicant['Applicant']['hearing'] . ")" . $applicant['Applicant']['hearing_pertge'] . ",";
                        }
                        if(!empty($applicant['Applicant']['locomotor']) || !empty($applicant['Applicant']['locomotor_pertge'])) { 
                            echo "C:(" . $applicant['Applicant']['locomotor'] . ")" . $applicant['Applicant']['locomotor_pertge'] . ",";
                        }
                        if(!empty($applicant['Applicant']['autism']) || !empty($applicant['Applicant']['autism_pertge'])) { 
                            echo "D:(" . $applicant['Applicant']['autism'] . ")" . $applicant['Applicant']['autism_pertge'] . ",";
                        }
                 } ?></td>
            <?php } ?>
        </tr>
        <tr>
            <td class="print_headers">Father's No. or Landline No.</td>
            <td class="print_value"><?php echo $applicant['Applicant']['father_contact_no'] ?>
            </td>
            <td class="print_headers">Mother's No.</td>
            <td class="print_value"><?php echo $applicant['Applicant']['mother_contact_no'] ?>
            </td>
        </tr>
        <tr>
            <td class="print_headers">Nationality</td>
            <td class="print_value"><?php echo $applicant['Applicant']['nationality'] ?>
            </td>
            <td class="print_headers">Religion</td>
            <td class="print_value"><?php echo $applicant['Applicant']['religion'] ?>
            </td>
        </tr>
        <tr>
            <td class="print_headers">Whether Govt. Servant</td>
            <td class="print_value"><?php echo $applicant['Applicant']['departmental_cand'] ?></td>
            <td class="print_headers">Whether CUP Employee</td>
            <td class="print_value"><?php echo $applicant['Applicant']['internal_cand']; ?></td>
        </tr>
        <?php if(!empty($applicant['Applicant']['retired']) && $applicant['Applicant']['retired'] == "yes"){ ?>
        <tr>
            <td class="print_headers">Whether Retd.</td>
            <td class="print_value"><?php echo $applicant['Applicant']['retired'] ?></td>
            <td class="print_headers">Details of Pension</td>
            <td class="print_value"><?php echo $applicant['Applicant']['pension_details'] ?></td>
        </tr>
        <?php } ?>
        <tr>
            <td class="print_headers">Postal Address</td>
            <td colspan="3" class="print_value"><?php echo $applicant['Applicant']['postal_house_no'] . ", " . 
                                                           $applicant['Applicant']['postal_stree_no'] . ", " .
                                                            $applicant['Applicant']['postal_town'] . ", " .
                                                            $applicant['Applicant']['postal_district'] . ", " .
                                                            $applicant['Applicant']['postal_state'] . ", " .
                                                            $applicant['Applicant']['postal_pin_code'];  ?></td>
        </tr>
        <tr>
            <td class="print_headers">Permanent Address</td>
            <td colspan="3" class="print_value"><?php echo $applicant['Applicant']['permanent_house_no'] . ", " . 
                                                           $applicant['Applicant']['permanent_stree_no'] . ", " .
                                                            $applicant['Applicant']['permanent_town'] . ", " .
                                                            $applicant['Applicant']['permanent_district'] . ", " .
                                                            $applicant['Applicant']['permanent_state'] . ", " .
                                                            $applicant['Applicant']['permanent_pin_code'];  ?></td>
        </tr>
    </table>
    <hr style="border-width: 1px;"/>
    <table id="professional_info">
        <tr>
            <td class="print_headers" align="left">PROFESSIONAL INFORMATION</td>
        </tr>
    </table>
    <?php if(count($education_arr) > 0) { ?>
    <table id="education_table" border="1px solid black" style="border: 1px solid black; border-collapse: collapse;">
        <tr>
            <?php //<td width="10%" class="print_headers">Name of Degree / Diploma / Certificate / Class</td> ?>
            <td width="10%" class="print_headers">Course</td>
            <td width="5%" class="print_headers">Mode</td>
            <td width="24%" class="print_headers">Board / University</td>
            <td width="7%" class="print_headers">CGPA / Div.</td>
            <td width="8%" class="print_headers">Marks Obtained</td>
            <td width="8%" class="print_headers">Maximum Marks</td>
            <td width="6%" class="print_headers">%Age</td>
            <td width="7%" class="print_headers">Passing Year</td>
            <td width="25%" class="print_headers">Subjects</td>
        </tr>
        <?php
        foreach($education_arr as $key => $value){
            if(!empty($education_arr[$key]['Education']['board'])) {
                echo "<tr>";
                //echo "<td class=\"print_value\">" . $education_arr[$key]['Education']['qualification'] . "</td>";
                echo "<td class=\"print_value\">" . $education_arr[$key]['Education']['course'] . "</td>";
                //echo "<td class=\"print_value\">" . $education_arr[$key]['Education']['mode_of_study'] . "</td>";
                if($education_arr[$key]['Education']['mode_of_study'] == "Regular")
                    echo "<td class=\"print_value\">Reg.</td>";
                else if($education_arr[$key]['Education']['mode_of_study'] == "Distance")
                    echo "<td class=\"print_value\">Dist.</td>";
                else if($education_arr[$key]['Education']['mode_of_study'] == "Part Time")
                    echo "<td class=\"print_value\">P.T.</td>";
                echo "<td class=\"print_value\">" . $education_arr[$key]['Education']['board'] . "</td>";
                //echo "<td>" . $education_arr[$key]['Education']['system'] . "</td>";
                echo "<td class=\"print_value\">" . $education_arr[$key]['Education']['grade'] . "</td>";
                echo "<td class=\"print_value\">" . $education_arr[$key]['Education']['marks_obtained'] . "</td>";
                echo "<td class=\"print_value\">" . $education_arr[$key]['Education']['max_marks'] . "</td>";
                echo "<td class=\"print_value\">" . $education_arr[$key]['Education']['percentage'] . "</td>";
                if($education_arr[$key]['Education']['qualification'] == "Ph.D. Pursuing") {
                            echo "<td colspan=\"2\" class=\"print_value\">Date of Registration: " . $education_arr[$key]['Education']['date_of_registration'] . "</td>";
                        }
                        else {
                                echo "<td class=\"print_value\">" . $education_arr[$key]['Education']['year_of_passing'] . "</td>";
                                echo "<td class=\"print_value\" style='font-size: 8px;'>" . $education_arr[$key]['Education']['subjects'] . "</td>";
                        }
                echo "</tr>";
            }
        }
        ?>
        <tr>
            <td colspan="5" class="print_headers">Whether Gap in Education: </td>
            <td colspan="4" class="print_value"><?php echo $applicant['Applicant']['gap_education_yn']; ?></td>
        </tr>
        <?php if(!empty($applicant['Applicant']['gap_education_yn']) && $applicant['Applicant']['gap_education_yn'] == "yes") { ?>
        <tr>
            <td colspan="1" class="print_headers">Reason: </td>
            <td colspan="8" class="print_value"><?php echo $applicant['Applicant']['gaps_in_education']; ?></td>
        </tr>
        <?php } ?>
        <tr>
            <td colspan="5" class="print_headers">Is your Ph.D. awarded as per U.G.C Regulation 2009/2016? </td>
            <td colspan="4" class="print_value"><?php echo $applicant['Applicant']['phd_ugc_2009']; ?></td>
        </tr>
    </table>
    <?php } ?>
    <br/>
    <div class="print_headers">Whether qualified UGC/CSIR/ICAR/National Level Test <label class="print_value"><?php echo $applicant['Applicant']['national_test_qualified']; ?></label></div>
    <?php if(count($ugcnet_arr) > 0 && !empty($applicant['Applicant']['national_test_qualified']) && $applicant['Applicant']['national_test_qualified'] == "yes") { ?>
    <table id="ugcnet_table" border="1px solid black" style="border: 1px solid black; border-collapse: collapse;">
        <tr>
            <?php //<td width="10%" class="print_headers">Name of Degree / Diploma / Certificate / Class</td> ?>
            <td width="15%" class="print_headers">Name of Subject</td>
            <td width="10%" class="print_headers">Passing Year</td>
            <td width="7%" class="print_headers">Roll No.</td>
            <td width="15%" class="print_headers">NET-JRF</td>
            <td width="8%" class="print_headers">Category</td>
            <td width="20%" class="print_headers">Testing Agency</td>
            <td width="25%" class="print_headers">If Any Qualifying National Level Test</td>
        </tr>
        <?php
        foreach($ugcnet_arr as $key => $value){
            if(!empty($ugcnet_arr[$key]['Ugcnet']['subject'])) {
                echo "<tr>";
                echo "<td class=\"print_value\">" . $ugcnet_arr[$key]['Ugcnet']['subject'] . "</td>";
                echo "<td class=\"print_value\">" . $ugcnet_arr[$key]['Ugcnet']['month_year_passing'] . "</td>";
                echo "<td class=\"print_value\">" . $ugcnet_arr[$key]['Ugcnet']['roll_no'] . "</td>";
                echo "<td class=\"print_value\">" . $ugcnet_arr[$key]['Ugcnet']['net_jrf'] . "</td>";
                echo "<td class=\"print_value\">" . $ugcnet_arr[$key]['Ugcnet']['category'] . "</td>";
                echo "<td class=\"print_value\">" . $ugcnet_arr[$key]['Ugcnet']['examining_body'] . "</td>";
                echo "<td class=\"print_value\">" . $ugcnet_arr[$key]['Ugcnet']['any_other_test'] . "</td>";
                echo "</tr>";
            }
        }
        ?>
    </table>
    <?php } ?>
    <br/>
    <table id="experience_info">
        <tr class="">
            <td class="print_headers" align="left">WORK EXPERIENCE (in Reverse Chronological order)</td>
        </tr>
    </table>
    <?php if(count($exp_arr) > 0) { ?>
    <table id="experience_table" border="1px solid black" style="border-right: 1px solid black ; border-collapse: collapse;">
        <tr>
            <td rowspan="2" width="15%" class="print_headers">Designation</td>
            <td rowspan="2" width="10%" class="print_headers">Scale of Pay</td>
            <td rowspan="2" width="25%" class="print_headers">Name & address of University / Institute</td>
            <td rowspan="2" width="10%" class="print_headers">Type of Org.</td>
            <td colspan="2" width="20%"><div style="text-align: center" class="print_headers">Period of Experience</div></td>
            <td rowspan="2" width="20%" class="print_headers">Nature of Duty</td>
            <!--<td rowspan="2" width="10%">Sr. No. of Proof Enclosed</td>-->
        </tr>
        <tr>
            <td width="10%" class="print_headers">From (dt.)<br/>To (dt.)</td>
            <td width="10%" class="print_headers">Total Duration</td>
        </tr>
        <?php
        foreach($exp_arr as $key => $value){
        echo "<tr>";
        echo "<td class=\"print_value\">" . $exp_arr[$key]['Experience']['designation'] . "</td>";
        echo "<td class=\"print_value\">" . $exp_arr[$key]['Experience']['scale_of_pay'] . "</td>";
        echo "<td class=\"print_value\">" . $exp_arr[$key]['Experience']['name_address'] . "</td>";
        //echo "<td class=\"print_value\">" . $exp_arr[$key]['Experience']['institute_type'] . "</td>";
        if($exp_arr[$key]['Experience']['institute_type'] == "Central Government") {
            echo "<td class=\"print_value\">Cent. Govt.</td>";
        }
        else if($exp_arr[$key]['Experience']['institute_type'] == "State Government") {
            echo "<td class=\"print_value\">St. Govt.</td>";
        }
        else if($exp_arr[$key]['Experience']['institute_type'] == "Autonomous") {
            echo "<td class=\"print_value\">Auto.</td>";
        }
        else if($exp_arr[$key]['Experience']['institute_type'] == "Government Aided") {
            echo "<td class=\"print_value\">Govt. Aid.</td>";
        }
        else if($exp_arr[$key]['Experience']['institute_type'] == "Private") {
            echo "<td class=\"print_value\">Pvt.</td>";
        }
        else if($exp_arr[$key]['Experience']['institute_type'] == "Public Sector Undertaking") {
            echo "<td class=\"print_value\">PSU</td>";
        }
        echo "<td class=\"print_value\">" . $exp_arr[$key]['Experience']['from_date'] . "<br/>" . $exp_arr[$key]['Experience']['to_date'] . "</td>";
        echo "<td class=\"print_value\">" . $exp_arr[$key]['Experience']['no_of_yrs_mnths_days'] . "</td>";
        echo "<td class=\"print_value\">" . $exp_arr[$key]['Experience']['nature_of_work'] . "</td>";
        //echo "<td>" . $exp_arr[$key]['Experience']['sr_of_proof'] . "</td>";
        echo "</tr>";
        }
        ?>
        <tr>
            <td colspan="1" class="print_headers">Total period of experience</td>
            <td class="print_headers">Years</td>
            <td class="print_value"><?php echo $applicant['Applicant']['calculated_exp_years']; ?></td>
            <td class="print_headers">Months</td>
            <td class="print_value"><?php echo $applicant['Applicant']['calculated_exp_months']; ?></td>
            <td class="print_headers">Days</td>
            <td class="print_value"><?php echo $applicant['Applicant']['calculated_exp_days']; ?></td>
        </tr>
        <tr>
            <td colspan="5" class="print_headers">Whether Gap in Experience: </td>
            <td colspan="2" class="print_value"><?php echo $applicant['Applicant']['gap_experience_yn']; ?></td>
        </tr>
        <?php if(!empty($applicant['Applicant']['gap_experience_yn']) && $applicant['Applicant']['gap_experience_yn'] == "yes") { ?>
        <tr>
            <td colspan="2" class="print_headers">Reason: </td>
            <td colspan="5" class="print_value"><?php echo $applicant['Applicant']['gaps_in_experience']; ?></td>
        </tr>
        <?php } ?>
    </table>
    <?php } ?>
    <br/>
    <div class="print_headers">Whether you have acquired Experience simultaneously during Ph.D. <label class="print_value"><?php echo $applicant['Applicant']['exp_during_phd']; ?></label></div>
    <?php if(count($exp_arr_phd) > 0 && !empty($applicant['Applicant']['exp_during_phd']) && $applicant['Applicant']['exp_during_phd'] == "yes") { ?>
    <table id="exp_during_phd_table" border="1px solid black" style="border-right: 1px solid black ; border-collapse: collapse;">
        <tr>
            <td rowspan="2" width="10%" class="print_headers">Designation</td>
            <td rowspan="2" width="18%" class="print_headers">Name & address of University / Institute</td>            
            <td colspan="2" width="15%"><div style="text-align: center" class="print_headers">Period of Experience</div></td>
            <td rowspan="2" width="7%" class="print_headers">Nature Of Service (Full Time)</td>
            <td rowspan="2" width="7%" class="print_headers">Work Load as per UGC Norms</td>
            <td rowspan="2" width="7%" class="print_headers">Whether fulfill UGC eligibility at the time of appointment</td>
            <td rowspan="2" width="7%" class="print_headers">Leave availed for Ph.D.</td>
            <td rowspan="2" width="7%" class="print_headers">Leave availed<br/>From (dt.)<br/>To (dt.)</td>
            <!--<td rowspan="2" width="10%">Sr. No. of Proof Enclosed</td>-->
        </tr>
        <tr>
            <td width="3%" class="print_headers">From (dt.)<br/>To (dt.)</td>
            <td width="12%" class="print_headers">Total Duration</td>
        </tr>
        <?php
        foreach($exp_arr_phd as $key => $value){
            if(!empty($exp_arr_phd[$key]['Experiencephd']['name_address'])) {
                echo "<tr>";
                echo "<td class=\"print_value\">" . $exp_arr_phd[$key]['Experiencephd']['designation'] . "</td>";
                //echo "<td class=\"print_value\">" . $exp_arr_phd[$key]['Experiencephd']['scale_of_pay'] . "</td>";
                //echo "<td class=\"print_value\">" . $exp_arr_phd[$key]['Experiencephd']['agp'] . "</td>";
                echo "<td class=\"print_value\">" . $exp_arr_phd[$key]['Experiencephd']['name_address'] . "</td>";
                //echo "<td class=\"print_value\">" . $exp_arr_phd[$key]['Experiencephd']['institute_type'] . "</td>";
                echo "<td class=\"print_value\">" . $exp_arr_phd[$key]['Experiencephd']['from_date'] . "<br/>" . $exp_arr_phd[$key]['Experiencephd']['to_date'] . "</td>";
                //echo "<td class=\"print_value\">" . $exp_arr_phd[$key]['Experiencephd']['to_date'] . "</td>";
                echo "<td class=\"print_value\">" . $exp_arr_phd[$key]['Experiencephd']['no_of_mnths_yrs'] . "</td>";
                echo "<td class=\"print_value\">" . $exp_arr_phd[$key]['Experiencephd']['nature_of_service'] . "</td>";
                echo "<td class=\"print_value\">" . $exp_arr_phd[$key]['Experiencephd']['work_load'] . "</td>";
                echo "<td class=\"print_value\">" . $exp_arr_phd[$key]['Experiencephd']['minimum_eligibility'] . "</td>";
                echo "<td class=\"print_value\">" . $exp_arr_phd[$key]['Experiencephd']['leave_taken'] . "</td>";
                echo "<td class=\"print_value\">" . $exp_arr_phd[$key]['Experiencephd']['leave_taken_from'] . "<br/>" . $exp_arr_phd[$key]['Experiencephd']['leave_taken_to'] . "</td>";
                //echo "<td>" . $exp_arr[$key]['Experience']['sr_of_proof'] . "</td>";
                echo "</tr>";
            }
        }
        ?>
        <tr>
            <td colspan="3" class="print_headers">Total period of experience</td>
            <td class="print_headers">Years</td>
            <td class="print_value"><?php echo $applicant['Applicant']['calculated_expphd_years']; ?></td>
            <td class="print_headers">Months</td>
            <td class="print_value"><?php echo $applicant['Applicant']['calculated_expphd_months']; ?></td>
            <td class="print_headers">Days</td>
            <td class="print_value"><?php echo $applicant['Applicant']['calculated_expphd_days']; ?></td>
        </tr>
    </table>
     <?php } ?>
    <table>
        <tr>
            <td class="print_headers" align="left">RESEARCH WORK</td>
        </tr>
    </table>
    <div class="print_headers">Whether you have published Original Research Papers in Journals <label class="print_value"><?php echo $applicant['Applicant']['rp_in_journals']; ?></label></div>
    <?php if(!empty($applicant['Applicant']['rp_in_journals']) && $applicant['Applicant']['rp_in_journals'] == "yes") { ?>
    <table id="rp_in_journals_table" border="1px solid black" style="border-right: 1px solid black ; border-collapse: collapse;">
        <tr>
            <td width="13%" class="print_headers">Authors</td>
            <td width="42%" class="print_headers">Title of the Paper</td>
            <td width="6%" class="print_headers">UGC List No.</td>
            <td width="12%" class="print_headers">Name & Place of Publication</td>
            <td width="13%" class="print_headers">ISSN/DoI</td>
            <td width="8%" class="print_headers">Vol./Page No./Year</td>
            <td width="6%" class="print_headers">Impact Factor</td>
        </tr>
        <?php
        foreach($rpaper_arr as $key => $value){
        echo "<tr>";
        echo "<td class=\"print_value\">" . $rpaper_arr[$key]['Researchpaper']['authors'] . "</td>";
        echo "<td class=\"print_value\">" . $rpaper_arr[$key]['Researchpaper']['title'] . "</td>";
        echo "<td class=\"print_value\">" . $rpaper_arr[$key]['Researchpaper']['journal_no_ugc'] . "</td>";
        echo "<td class=\"print_value\">" . $rpaper_arr[$key]['Researchpaper']['name_place_publication'] . "</td>";
        echo "<td class=\"print_value\">" . $rpaper_arr[$key]['Researchpaper']['publication_ISSN'] . "</td>";
        echo "<td class=\"print_value\">" . $rpaper_arr[$key]['Researchpaper']['vol_page_year'] . "</td>";
        echo "<td class=\"print_value\">" . $rpaper_arr[$key]['Researchpaper']['impact_factor'] . "</td>";
        echo "</tr>";
        }
        ?>
    </table>
    <br />
    <?php } ?>
    <div class="print_headers">Whether you have published Research Articles in Books <label class="print_value"><?php echo $applicant['Applicant']['ra_in_books']; ?></label></div>
    <?php if(!empty($applicant['Applicant']['ra_in_books']) && $applicant['Applicant']['ra_in_books'] == "yes") { ?>
    <table id="ra_in_books_table" border="1px solid black" style="border-right: 1px solid black ; border-collapse: collapse;">
        <tr>
            <td width="15%" class="print_headers">Authors</td>
            <td width="18%" class="print_headers">Title of the Book</td>
            <td width="35%" class="print_headers">Title of the Article</td>
            <td width="10%" class="print_headers">Editor of the Book</td>
            <td width="15%" class="print_headers">Name of Publisher & ISBN</td>
            <td width="10%" class="print_headers">Place of Publication</td>
            <td width="7%" class="print_headers">Page No</td>
        </tr>
        <?php
        foreach($rarticle_arr as $key => $value){
        echo "<tr>";
        echo "<td class=\"print_value\">" . $rarticle_arr[$key]['Researcharticle']['authors'] . "</td>";
        echo "<td class=\"print_value\">" . $rarticle_arr[$key]['Researcharticle']['title_of_book'] . "</td>";
        echo "<td class=\"print_value\">" . $rarticle_arr[$key]['Researcharticle']['title_of_article'] . "</td>";        
        echo "<td class=\"print_value\">" . $rarticle_arr[$key]['Researcharticle']['editor_of_book'] . "</td>";
        echo "<td class=\"print_value\">" . $rarticle_arr[$key]['Researcharticle']['publisher_ISBN'] . "</td>";
        echo "<td class=\"print_value\">" . $rarticle_arr[$key]['Researcharticle']['place_of_publication'] . "</td>";
        echo "<td class=\"print_value\">" . $rarticle_arr[$key]['Researcharticle']['page_no'] . "</td>";
        echo "</tr>";
        }
        ?>
    </table>
    <br />
    <?php } ?>
    <div class="print_headers">Whether you have published Research Papers in Conference proceedings <label class="print_value"><?php echo $applicant['Applicant']['ra_in_conference']; ?></label></div>
    <?php if(!empty($applicant['Applicant']['ra_in_conference']) && $applicant['Applicant']['ra_in_conference'] == "yes") { ?>
    <table id="rp_in_conference_table" border="1px solid black" style="border-right: 1px solid black ; border-collapse: collapse;">
        <tr>
            <td width="15%" class="print_headers">Authors</td>
            <td width="10%" class="print_headers">Title of the Book</td>
            <td width="45%" class="print_headers">Title of the Article</td>
            <td width="15%" class="print_headers">Name of Publisher & ISBN</td>
            <td width="10%" class="print_headers">Place of Publication</td>
            <td width="7%" class="print_headers">Page No.</td>
        </tr>
        <?php
        foreach($articleconf_arr as $key => $value){
        echo "<tr>";
        echo "<td class=\"print_value\">" . $articleconf_arr[$key]['Articleconference']['authors'] . "</td>";
        echo "<td class=\"print_value\">" . $articleconf_arr[$key]['Articleconference']['title_of_book'] . "</td>";
        echo "<td class=\"print_value\">" . $articleconf_arr[$key]['Articleconference']['title_of_article'] . "</td>";        
        echo "<td class=\"print_value\">" . $articleconf_arr[$key]['Articleconference']['publisher_ISBN'] . "</td>";
        echo "<td class=\"print_value\">" . $articleconf_arr[$key]['Articleconference']['place_of_publication'] . "</td>";
        echo "<td class=\"print_value\">" . $articleconf_arr[$key]['Articleconference']['page_no'] . "</td>";
        echo "</tr>";
        }
        ?>
    </table>
    <br/>
    <?php } ?>
    <div class="print_headers">Whether you have published Popular Articles in Periodicals <label class="print_value"><?php echo $applicant['Applicant']['pa_in_periodicals']; ?></label></div>
    <?php if(!empty($applicant['Applicant']['pa_in_periodicals']) && $applicant['Applicant']['pa_in_periodicals'] == "yes") { ?>
    <table id="pa_in_periodicals_table" border="1px solid black" style="border-right: 1px solid black ; border-collapse: collapse;">
        <tr>
            <td width="15%" class="print_headers">Authors</td>
            <td width="10%" class="print_headers">Title of the Book</td>
            <td width="45%" class="print_headers">Title of the Article</td>
            <td width="15%" class="print_headers">Name of Publisher & ISBN</td>
            <td width="10%" class="print_headers">Place of Publication</td>
            <td width="7%" class="print_headers">Page No.</td>
        </tr>
        <?php
        foreach($articleperiodical_arr as $key => $value){
        echo "<tr>";
        echo "<td class=\"print_value\">" . $articleperiodical_arr[$key]['Articleperiodical']['authors'] . "</td>";
        echo "<td class=\"print_value\">" . $articleperiodical_arr[$key]['Articleperiodical']['title_of_book'] . "</td>";
        echo "<td class=\"print_value\">" . $articleperiodical_arr[$key]['Articleperiodical']['title_of_article'] . "</td>";        
        echo "<td class=\"print_value\">" . $articleperiodical_arr[$key]['Articleperiodical']['publisher_ISBN'] . "</td>";
        echo "<td class=\"print_value\">" . $articleperiodical_arr[$key]['Articleperiodical']['place_of_publication'] . "</td>";
        echo "<td class=\"print_value\">" . $articleperiodical_arr[$key]['Articleperiodical']['page_no'] . "</td>";
        echo "</tr>";
        }
        ?>
    </table>
    <br/>
    <?php } ?>
    <div class="print_headers">Whether you have Extra Mural Research Funding / R&D Projects <label class="print_value"><?php echo $applicant['Applicant']['em_research']; ?></label></div>
    <?php if(!empty($applicant['Applicant']['em_research']) && $applicant['Applicant']['em_research'] == "yes") { ?>
    <table id="em_research_table" border="1px solid black" style="border-right: 1px solid black ; border-collapse: collapse;">
        <tr>
            <td width="30%" class="print_headers">Title of the Project(s)</td>
            <td width="25%" class="print_headers">Funding Agency</td>
            <td width="6%" class="print_headers">As PI / CO-PI</td>
            <td width="9%" class="print_headers">Amount of Grant</td>
            <td width="10%" class="print_headers">From (Month & Year)</td>
            <td width="10%" class="print_headers">To (Month & Year)</td>
            <td width="10%" class="print_headers">Status</td>
        </tr>
        <?php
        foreach($rproject_arr as $key => $value){
        echo "<tr>";
        echo "<td class=\"print_value\">" . $rproject_arr[$key]['Researchproject']['title'] . "</td>";
        echo "<td class=\"print_value\">" . $rproject_arr[$key]['Researchproject']['funding_agency'] . "</td>";
        echo "<td class=\"print_value\">" . $rproject_arr[$key]['Researchproject']['investigator'] . "</td>";
        echo "<td class=\"print_value\">" . $rproject_arr[$key]['Researchproject']['amount_of_grant'] . "</td>";
        echo "<td class=\"print_value\">" . $rproject_arr[$key]['Researchproject']['from_month_year'] . "</td>";
        echo "<td class=\"print_value\">" . $rproject_arr[$key]['Researchproject']['to_month_year'] . "</td>";
        //echo "<td class=\"print_value\">" . $rproject_arr[$key]['Researchproject']['duration'] . "</td>";
        echo "<td class=\"print_value\">" . $rproject_arr[$key]['Researchproject']['comp_ongoing'] . "</td>";
        echo "</tr>";
        }
        ?>
    </table>
    <br/>
    <?php } ?>
    <table id="research_index_table" width="100%" border="1px solid black" style="border-collapse: collapse; ">
        <tr>
            <td width="50%" class="print_headers">Total Impact Factor of publications as per SCOPUS</td>
            <td class="print_value"><?php echo $applicant['Applicant']['tot_impact_sci']; ?></td>
        </tr>
        <tr>
            <td width="50%" class="print_headers">Total Impact Factor of publications as per Web of Science</td>
            <td class="print_value"><?php echo $applicant['Applicant']['tot_impact_webofscience']; ?></td>
        </tr>
        <tr>
            <td class="print_headers">Total Impact Factor of publications as per Google Scholar</td>
            <td class="print_value"><?php echo $applicant['Applicant']['tot_impact_google']; ?></td>
        </tr>
        <tr>
            <td class="print_headers"><i>h-</i>Index as per SCOPUS</td>
            <td class="print_value"><?php echo $applicant['Applicant']['h_index_scopus']; ?></td>
        </tr>
        <tr>
            <td class="print_headers"><i>h-</i>Index as per Web of Science</td>
            <td class="print_value"><?php echo $applicant['Applicant']['h_index_webofscience']; ?></td>
        </tr>
        <tr>
            <td class="print_headers"><i>h-</i>Index as per Google Scholar</td>
            <td class="print_value"><?php echo $applicant['Applicant']['h_index_google']; ?></td>
        </tr>
        <tr>
            <td class="print_headers">No. of Citations as per SCOPUS</td>
            <td class="print_value"><?php echo $applicant['Applicant']['no_of_citations_scopus']; ?></td>
        </tr>
        <tr>
            <td class="print_headers">No. of Citations as per Web of Science</td>
            <td class="print_value"><?php echo $applicant['Applicant']['no_of_citations_webofscience']; ?></td>
        </tr>
        <tr>
            <td class="print_headers">No. of Citations as per Google Scholar</td>
            <td class="print_value"><?php echo $applicant['Applicant']['no_of_citations_google']; ?></td>
        </tr>
    </table>
    <br/>
    <div class="print_headers">Whether you have attended Seminars / Conferences / Workshops / Training programmes <label class="print_value"><?php echo $applicant['Applicant']['seminar_attended']; ?></label></div>
    <?php if(!empty($applicant['Applicant']['seminar_attended']) && $applicant['Applicant']['seminar_attended'] == "yes") { ?>
    <table id="seminar_attended_table" width="100%" border="1px solid black" style="border-collapse: collapse; ">
        <tr>
            <td width="50%" class="print_headers">Seminars / Conferences / Workshops / Training programmes attended</td>
            <td class="print_headers">National (No.)</td>
            <td class="print_headers">International (No.)</td>
            <td class="print_headers">Total (No.)</td>
        </tr>
        <tr>
            <td></td>
            <td class="print_value"><?php echo $applicant['Applicant']['sem_att_national']; ?></td>
            <td class="print_value"><?php echo $applicant['Applicant']['sem_att_international']; ?></td>
            <td class="print_value"><?php echo $applicant['Applicant']['sem_att_total']; ?></td>
        </tr>
    </table>
    <br/>
    <?php } ?>
    <div class="print_headers">Whether you have organized Seminars / Conferences / Workshops / Training programmes <label class="print_value"><?php echo $applicant['Applicant']['seminar_organized']; ?></label></div>
    <?php if(!empty($applicant['Applicant']['seminar_organized']) && $applicant['Applicant']['seminar_organized'] == "yes") { ?>
    <table id="seminar_organized_table" border="1px solid black" style="border-right: 1px solid black ; border-collapse: collapse;">
        <tr>
            <td width="5%" class="print_headers">S. No.</td>
            <td width="55%" class="print_headers">Title of the National or International programme organized</td>
            <td width="40%" class="print_headers">Source of Funding</td>
        </tr>
        <?php
        $rowNum = 1;
        foreach($semorg_arr as $key => $value) {
        echo "<tr>";
        echo "<td class=\"print_value\">" . $rowNum++ . "</td>";
        echo "<td class=\"print_value\">" . $semorg_arr[$key]['Seminarorganized']['title'] . "</td>";
        //echo "<td class=\"print_value\">" . $semorg_arr[$key]['Seminarorganized']['international_no'] . "</td>";
        //echo "<td class=\"print_value\">" . $semorg_arr[$key]['Seminarorganized']['total'] . "</td>";
        echo "<td class=\"print_value\">" . $semorg_arr[$key]['Seminarorganized']['source_of_funding'] . "</td>";
        echo "</tr>";
        }
        ?>
    </table>
    <br/>
    <?php } ?>
    <table id="research_guidance_table" width="100%" border="1px solid black" style="border-collapse: collapse; ">
        <tr>
            <td width="50%" class="print_headers">Research Guidance (No. of students guided)</td>
            <td></td>
            <td class="print_headers">M.Phil. / Equivalent (No.)</td>
            <td class="print_headers">Ph.D. (No.)</td>
        </tr>
        <tr>
            <td rowspan="2" class="print_headers">Successfully Completed</td>
            <td class="print_headers">a) Independent</td>
            <td class="print_value"><?php echo $applicant['Applicant']['rg_mphil_completed']; ?></td>
            <td class="print_value"><?php echo $applicant['Applicant']['rg_phd_completed']; ?></td>
        </tr>
        <tr>
            <td class="print_headers">b) as Co-Supervisor</td>
            <td class="print_value"><?php echo $applicant['Applicant']['rg_mphil_completed_asco']; ?></td>
            <td class="print_value"><?php echo $applicant['Applicant']['rg_phd_completed_asco']; ?></td>
        </tr>
        <tr>
            <td rowspan="2" class="print_headers">Under supervision</td>
            <td class="print_headers">a) Independent</td>
            <td class="print_value"><?php echo $applicant['Applicant']['rg_mphil_undersup']; ?></td>
            <td class="print_value"><?php echo $applicant['Applicant']['rg_phd_undersup']; ?></td>
        </tr>
        <tr>
            <td class="print_headers">b) as Co-Supervisor</td>
            <td class="print_value"><?php echo $applicant['Applicant']['rg_mphil_undersup_asco']; ?></td>
            <td class="print_value"><?php echo $applicant['Applicant']['rg_phd_undersup_asco']; ?></td>
        </tr>
    </table>
    <br/>
    <div class="print_headers">Whether you have received Peer Recognition/Awards e.t.c. <label class="print_value"><?php echo $applicant['Applicant']['peer_recognition_yn']; ?></label></div>
    <?php if(!empty($applicant['Applicant']['peer_recognition_yn']) && $applicant['Applicant']['peer_recognition_yn'] == "yes") { ?>
    <table id="peer_recognition_table" border="1px solid black" style="border-right: 1px solid black ; border-collapse: collapse;">
        <tr>
            <td width="50%" class="print_headers">Award/honours</td>
            <td width="30%" class="print_headers">Agency</td>
            <td width="20%" class="print_headers">Year</td>
        </tr>
        <?php
        foreach($peer_arr as $key => $value) {
        echo "<tr>";
        echo "<td class=\"print_value\">" . $peer_arr[$key]['Peerrecognition']['award_honour'] . "</td>";
        echo "<td class=\"print_value\">" . $peer_arr[$key]['Peerrecognition']['agency'] . "</td>";
        echo "<td class=\"print_value\">" . $peer_arr[$key]['Peerrecognition']['year'] . "</td>";
        echo "</tr>";
        }
        ?>
    </table>
    <br/>
    <?php } ?>
    <div class="print_headers">Referees: prefer to include present Employer/Guide and/or former Employer</div>
    <table id="referee_table" width="100%" border="1px solid black" style="border-collapse: collapse;">
        <tr>
            <td width="25%"> </td>
            <td width="25%" class="print_headers">Referee 1</td>
            <td width="25%" class="print_headers">Referee 2</td>
            <td width="25%" class="print_headers">Referee 3</td>    
        </tr>
        <tr>
            <td class="print_headers">Name & complete postal addresses</td>
            <td class="print_value"><?php echo $applicant['Applicant']['ref_add1']; ?></td>
            <td class="print_value"><?php echo $applicant['Applicant']['ref_add2']; ?></td>
            <td class="print_value"><?php echo $applicant['Applicant']['ref_add3']; ?></td>
        </tr>
        <tr>
            <td class="print_headers">Email:</td>
            <td class="print_value"><?php echo $applicant['Applicant']['ref_email1']; ?></td>
            <td class="print_value"><?php echo $applicant['Applicant']['ref_email2']; ?></td>
            <td class="print_value"><?php echo $applicant['Applicant']['ref_email3']; ?></td>
        </tr>
        <tr>
            <td class="print_headers">Phone (Landline) with STD Code:</td>
            <td class="print_value"><?php echo $applicant['Applicant']['ref_landline1']; ?></td>
            <td class="print_value"><?php echo $applicant['Applicant']['ref_landline2']; ?></td>
            <td class="print_value"><?php echo $applicant['Applicant']['ref_landline3']; ?></td>
        </tr>
        <tr>
            <td class="print_headers">Mobile No.:</td>
            <td class="print_value"><?php echo $applicant['Applicant']['ref_mobile1']; ?></td>
            <td class="print_value"><?php echo $applicant['Applicant']['ref_mobile2']; ?></td>
            <td class="print_value"><?php echo $applicant['Applicant']['ref_mobile3']; ?></td>
        </tr>
        <tr>
            <td class="print_headers">Fax:</td>
            <td class="print_value"><?php echo $applicant['Applicant']['ref_fax1']; ?></td>
            <td class="print_value"><?php echo $applicant['Applicant']['ref_fax2']; ?></td>
            <td class="print_value"><?php echo $applicant['Applicant']['ref_fax3']; ?></td>
        </tr>
    </table>
    <div class="print_headers">Prefereably a recommendation letter from referee (s) from present Employer (in case working)/Guide and /or former (if left the job and not working at present) Employer may be sent along with Application form</div>
    <br/>
    <div class="print_headers">Whether you are working at present? <label class="print_value"><?php echo $applicant['Applicant']['working_at_present']; ?></label></div>
    <?php if(!empty($applicant['Applicant']['working_at_present']) && $applicant['Applicant']['working_at_present'] == "yes") { ?>
    <table id="present_position_table" width="100%" border="1px solid black" style="border-collapse: collapse;">
        <tr>
            <td width="12%">Designation</td>
            <td width="28%">Name of the University / Institution</td>
            <td width="15%">Basic Pay(Rs.)</td>
            <td width="15%">Grade Pay(Rs.)</td>
            <td width="15%" style="font-size: 9px;">Gross Pay / Total Salary p.m. (Rs.)</td>
            <td width="15%" style="font-size: 9px;">Increment Month & Year</td>
        </tr>
        <tr>
            <td class="print_value"><?php echo $applicant['Applicant']['presentp_desig']; ?></td>
            <td class="print_value"><?php echo $applicant['Applicant']['presentp_nameuniv']; ?></td>
            <td class="print_value"><?php echo $applicant['Applicant']['presentp_basic_pay']; ?></td>
            <td class="print_value"><?php echo $applicant['Applicant']['presentp_pay_scale']; ?></td>
            <td class="print_value"><?php echo $applicant['Applicant']['presentp_gross_salary']; ?></td>
            <td class="print_value"><?php echo $applicant['Applicant']['presentp_increment_date']; ?></td>
        </tr>
    </table>
    <?php } ?>
    <br/>
    <table>
        <tr>
            <td class="print_headers" align="left">OTHER INFORMATION</td>
        </tr>
    </table>
    <table id="other_information_table" border="1px solid black" style="border-right: 1px solid black; border-collapse: collapse;">
        <tr>
            <td width="30%" class="print_headers">Minimum period required for joining if selected:</td>
            <td width="70%" class="print_value"><?php echo $applicant['Applicant']['time_req_for_joining']; ?></td>
        </tr>
        <tr>
            <td class="print_headers">Are you willing to accept the minimum initial pay in the grade?</td>
            <td class="print_value"><?php echo $applicant['Applicant']['willg_min_pay']; ?></td>
        </tr>
        <?php if($applicant['Applicant']['willg_min_pay'] == "no") { ?>
        <tr>
            <td class="print_headers">Reason(s):</td>
            <td class="print_value"><?php echo $applicant['Applicant']['min_pay_no']; ?></td>
        </tr>
        <?php } ?>
        <tr>
            <td class="print_headers">Any Other Information/qualification relevant to the post applied for:</td>
            <td class="print_value"><?php echo $applicant['Applicant']['any_other_info']; ?></td>
        </tr>
        <tr>
            <td class="print_headers">Membership of Professional Recognized Bodies - International:</td>
            <td class="print_value"><?php if($applicant['Applicant']['mem_pro_bodies'] == "yes") { 
                                                echo $applicant['Applicant']['mem_details'];
                                          }
                                          else { 
                                              echo $applicant['Applicant']['mem_pro_bodies'];
                                          } ?></td>
        </tr>
        <tr>
            <td class="print_headers">Membership of Professional Recognized Bodies - National:</td>
            <td class="print_value"><?php if($applicant['Applicant']['mem_pro_bodies_national'] == "yes") { 
                                                echo $applicant['Applicant']['mem_details_national'];
                                          }
                                          else { 
                                              echo $applicant['Applicant']['mem_pro_bodies_national'];
                                          } ?></td>
        </tr>
        <tr>
            <td class="print_headers">Have you ever been punished during your service or convicted by a court of law?</td>
            <td class="print_value"><?php echo $applicant['Applicant']['convicted']; ?></td>
        </tr>
        <tr>
            <td class="print_headers">Do you have any case pending against you in any court of law?</td>
            <td class="print_value"><?php if($applicant['Applicant']['pending_court'] == "yes") { ?>
                                        <table>
                                            <tr>
                                                    <td width="20%" class="print_headers">When</td>
                                                    <td width="80%" class="print_value"><?php echo $applicant['Applicant']['pending_court_when']; ?></td>
                                            </tr>
                                            <tr>
                                                    <td class="print_headers">Where</td>
                                                    <td class="print_value"><?php echo $applicant['Applicant']['pending_court_where']; ?></td>
                                            </tr>
                                            <tr>
                                                    <td class="print_headers">Under Section</td>
                                                    <td class="print_value"><?php echo $applicant['Applicant']['pending_court_undersection']; ?></td>
                                            </tr>
                                            <tr>
                                                    <td class="print_headers">Status</td>
                                                    <td class="print_value"><?php echo $applicant['Applicant']['pending_court_status']; ?></td>
                                            </tr>                                    
                                    </table>
                                    <?php }
                                          else { 
                                              echo $applicant['Applicant']['pending_court'];
                                          } ?></td>
        </tr>
        <tr>
            <td class="print_headers">Total number of self-attested documents attached: </td>
            <td class="print_value"><?php echo $applicant['Applicant']['total_self_att_docs_att']; ?></td>
        </tr>
    </table>
    <br/>
	<div class="print_headers">The list of self attested testimonials attached (original to be produced at the time of interview).</div>
    <table id="testimonial_table" border="1px solid black" style="border: 1px solid black; border-collapse: collapse;">
        <tr>
            <td class="print_headers">Name of the document</td>
            <td class="print_headers">Annexure No.</td>
        </tr>
        <?php if(!empty($applicant['Applicant']['list_matric_pages'])) { ?>
        <tr>
            <td class="print_headers">Matriculation marksheet / certificate</td>
            <td class="print_value"><?php echo $applicant['Applicant']['list_matric_pages']; ?></td>
        </tr>
        <?php }
        if(!empty($applicant['Applicant']['list_intermediate_pages'])) { ?>
        <tr>
            <td class="print_headers">Intermediate/+2 marksheet / certificate</td>
            <td class="print_value"><?php echo $applicant['Applicant']['list_intermediate_pages']; ?></td>
        </tr>
        <?php }
        if(!empty($applicant['Applicant']['list_bsc_pages'])) { ?>
        <tr>
            <td class="print_headers">B.A. / B.Sc. / B.Com (Final) marksheet / degree</td>
            <td class="print_value"><?php echo $applicant['Applicant']['list_bsc_pages']; ?></td>
        </tr>
        <?php }
        if(!empty($applicant['Applicant']['list_msc_pages'])) { ?>
        <tr>
            <td class="print_headers">M.A. / M.Sc. / M.Com (Final) marksheet / degree</td>
            <td class="print_value"><?php echo $applicant['Applicant']['list_msc_pages']; ?></td>
        </tr>
        <?php }
        if(!empty($applicant['Applicant']['list_llb_pages'])) { ?>
        <tr>
            <td class="print_headers">L.L.B (Final) marksheet / degree</td>
            <td class="print_value"><?php echo $applicant['Applicant']['list_llb_pages']; ?></td>
        </tr>
        <?php }
        if(!empty($applicant['Applicant']['list_llm_pages'])) { ?>
        <tr>
            <td class="print_headers">L.L.M marksheet / degree</td>
            <td class="print_value"><?php echo $applicant['Applicant']['list_llm_pages']; ?></td>
        </tr>
        <?php }
        if(!empty($applicant['Applicant']['list_mphil_pages'])) { ?>
        <tr>
            <td class="print_headers">M.Phil. degree</td>
            <td class="print_value"><?php echo $applicant['Applicant']['list_mphil_pages']; ?></td>
        </tr>
        <?php }
        if(!empty($applicant['Applicant']['list_phd_pages'])) { ?>
        <tr>
            <td class="print_headers">Ph.D. / D.Phil degree</td>
            <td class="print_value"><?php echo $applicant['Applicant']['list_phd_pages']; ?></td>
        </tr>
        <?php }
        if(!empty($applicant['Applicant']['list_dlit_pages'])) { ?>
        <tr>
            <td class="print_headers">D.Litt, D.Sc., L.L.D degree</td>
            <td class="print_value"><?php echo $applicant['Applicant']['list_dlit_pages']; ?></td>
        </tr>
        <?php }
        if(!empty($applicant['Applicant']['list_net_pages'])) { ?>
        <tr>
            <td class="print_headers">NET, UGC-JRF, CSIR-JRF Award Certificate</td>
            <td class="print_value"><?php echo $applicant['Applicant']['list_net_pages']; ?></td>
        </tr>
        <?php }
        if(!empty($applicant['Applicant']['list_caste_cert_pages'])) { ?>
        <tr>
            <td class="print_headers">Caste Certificate issued by the Government of India (OBC/SC/ST/etc)</td>
            <td class="print_value"><?php echo $applicant['Applicant']['list_caste_cert_pages']; ?></td>
        </tr>
        <?php }
        if(!empty($applicant['Applicant']['list_exp_cert_pages'])) { ?>
        <tr>
            <td class="print_headers">Experience certificates</td>
            <td class="print_value"><?php echo $applicant['Applicant']['list_exp_cert_pages']; ?></td>
        </tr>
        <?php }
        if(!empty($applicant['Applicant']['list_reco_letter_pages'])) { ?>
        <tr>
            <td class="print_headers">Recommendation letter(s)</td>
            <td class="print_value"><?php echo $applicant['Applicant']['list_reco_letter_pages']; ?></td>
        </tr>
        <?php }
        if(!empty($applicant['Applicant']['list_award_pages'])) { ?>
        <tr>
            <td class="print_headers">Award (s) / Fellowship (s)</td>
            <td class="print_value"><?php echo $applicant['Applicant']['list_award_pages']; ?></td>
        </tr>
        <?php } 
        if(!empty($applicant['Applicant']['list_publication_pages'])) { ?>
        <tr>
            <td class="print_headers">Publication (s)</td>
            <td class="print_value"><?php echo $applicant['Applicant']['list_publication_pages']; ?></td>
        </tr>
        <?php } 
        if(!empty($applicant['Applicant']['list_pwd_pages'])) { ?>
        <tr>
            <td class="print_headers">Person with Disability Certificate</td>
            <td class="print_value"><?php echo $applicant['Applicant']['list_pwd_pages']; ?></td>
        </tr>
        <?php } 
        if(!empty($applicant['Applicant']['list_noc_pages'])) { ?>
        <tr>
            <td class="print_headers">No Objection Certificate from Present Employer</td>
            <td class="print_value"><?php echo $applicant['Applicant']['list_noc_pages']; ?></td>
        </tr>
        <?php } 
        if(!empty($applicant['Applicant']['list_appointment_pages'])) { ?>
        <tr>
            <td class="print_headers">Appointment Letter(s)</td>
            <td class="print_value"><?php echo $applicant['Applicant']['list_appointment_pages']; ?></td>
        </tr>
        <?php } 
        if(!empty($applicant['Applicant']['list_salary_pages'])) { ?>
        <tr>
            <td class="print_headers">Salary Certificate/Salary Slip</td>
            <td class="print_value"><?php echo $applicant['Applicant']['list_salary_pages']; ?></td>
        </tr>
        <?php } ?>
    </table>
	<br/>
    <table id="employee_endorsement">
        <tr class="spaceUpper spaceUnder">
            <td colspan="3" class="print_headers" align="center">ENDORSEMENT BY THE EMPLOYER</td>
        </tr>
    </table>
    <div style="text-align: justify;text-justify: inter-word;"><label class="print_headers" style="line-height: 150%;">(In case of in-service candidates, whether in permanent / contract / temporary capacity, the application must be endorsed / forwarded by the Head of the Department / Employer. Otherwise the application is liable to be rejected)</label></div><br/>
    <div style="text-align: justify;text-justify: inter-word;"><label class="print_headers" style="text-decoration: underline; line-height: 150%;">Forwarded to the Central University of Punjab, City Campus, District - Bathinda, Punjab, India - 151001.</label>
    The applicant Dr./Mr./Mrs. <span style="text-decoration: underline;"><?php echo $applicant['Applicant']['first_name'] . " " . $applicant['Applicant']['middle_name'] . " " . $applicant['Applicant']['last_name']?></span>
    who has submitted the application for the post of <span style="text-decoration: underline;"><?php echo $applicant['Applicant']['post_applied_for']; ?></span> in the Central University of Punjab, has been working in the organization namely
    ......................................... in the post of .................................... in a temporary / contract / permanent capacity with effect from ........................ in the Pay Band/Scale of Pay of
    ......................................  . He / She is drawing a basic pay of ....................................  . His / Her next increment is due on .........................................  .
    </div>
    <div style="text-align: justify;text-justify: inter-word;"><label class="print_headers" style="line-height: 150%;">Further, It is Certified that no vigilance case or disciplinary proceedings or criminal proceeding is either pending or contemplated against the said applicant. There is no objection for his/her application being considered by Central University of Punjab.</label>    
    </div>
    <br/>
    <div>
        <span style="float:right">(Signature of the forwarding officer)</span>
    </div>
    <br/>
    <div>
        <span style="float: left;">Place:.............................</span><span style="float:right">Name:........................................</span>
    </div>
    <br/>
    <div>
        <span style="float: left;">Date:.............................</span><span style="float:right">Designation:........................................</span>
    </div>
    <br/>
    <div>
        <span style="float:right">Seal:........................................</span>
    </div>
    <br/>
    <br />
    <hr style="border-width: 1px;">
    <div align="center" style="text-transform: uppercase; font-weight: bold;">Declaration by the candidate</div>
    <div class="print_required">
    <label>Declaration:</label>
    <input type="checkbox" id="declaration" name="declaration" style="width: 20px; height: 20px;"></input>
    </div>
    <p style="text-align:justify">I, hereby declare that all the statements and entries made in this application are 
    true, complete and correct to the best of my knowledge and belief. No information has been concealed. In the event of any 
    information being found false or incorrect or ineligibility being detected in future 
    at any stage, my candidature may be cancelled by the University.</p>
    <br/>
    <div>
        <span style="float:left">Date:........................................</span><span style="float:right">Signature:........................................</span>
    </div>
    <br/>
    <div>
        <span style="float:left">Place:........................................</span>
    </div>
    <br/><br/>
    <div align="center"><span style="background-color: black; color: white;">The hard copy of the completed form with the required enclosures is sent by post.</span>
    </div>
    <div>
        <?php if(isset($applicant) && $applicant['Applicant']['final_submit'] != "1" ) {
                            echo $this->Form->create('Temp', array('id' => 'Temp_Details', 'url' => Router::url( '/form/final_submit', true )));
                            echo $this->Form->input('Document.id', array('type' => 'hidden','name' => 'temp', 'value' => 'temp'));
                            echo $this->Form->submit('Final Submission and Print', array('div' => false, 'id' => 'finalsubmit' , 'class' => 'red_label')); 
                            echo $this->Form->end(); 
                         } 
                        ?>
    </div>
</div>
<?php } ?>

<script>
    function ConfirmDialog(message){
    $('<div></div>').appendTo('body')
                    .html('<div><h6>'+message+'?</h6></div>')
                    .dialog({
                        modal: true, title: 'Delete message', zIndex: 10000, autoOpen: true,
                        width: 'auto', resizable: false,
                        buttons: {
                            Yes: function () {
                                // $(obj).removeAttr('onclick');                                
                                // $(obj).parents('.Parent').remove();

                                $(this).dialog("close");
                            },
                            No: function () {
                                $(this).dialog("close");
                            }
                        },
                        close: function (event, ui) {
                            $(this).remove();
                        }
                     });
    };
      
    $('document').ready(function () {
        $('#finalsubmit').prop('disabled', true);

        $('#declaration').change(function () {
            if ($(this).is(':checked')) {
                $('#finalsubmit').prop('disabled', false);
            }
            else {
                $('#finalsubmit').prop('disabled', true);
            }
        });

        $("#finalsubmit").click(function(e) {
            if(!confirm("Are you sure to finalize the submission process? After final submission you will not be able to modify your Application Form!")) {
                e.preventDefault();
            }
            else {
                e.preventDefault();
                window.location.href = '<?php echo $this->webroot; ?>form/final_submit';
            }
        });
        
        $("#back_button").click(function(e) {
            if(!confirm("To make the changes to Online Application Form, please Logout and then Login again.")) {
                e.preventDefault();
            }
            else {
                e.preventDefault();
                window.location.href = '<?php echo $this->webroot; ?>users/logout';
            }
        });
    });

</script>
