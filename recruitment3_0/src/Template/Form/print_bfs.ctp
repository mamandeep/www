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

    .print_required label:after { content:"*"; }

    .print_headers {
        font-size: 15px;
        color: #010101;
        padding: 3px;
        font-family: Verdana, Geneva, sans-serif;
    }

    .print_value {
        font-size: 15px;
        font-weight: bold;
        color: black;
        padding: 3px;
        font-family: Arial, Helvetica, sans-serif;
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
</style>
<?php 

function bcmin() {
  $args = func_get_args();
  if (count($args)==0) return false;
  $min = $args[0];
  foreach($args as $value) {
    if (bccomp($min, $value)==1) {
      $min = $value;
    }
  }
  return $min;
}

if(isset($data_set) && $data_set === 'true') {
$this->Html->css('cake.generic.css');
echo $this->Html->script('jquery-1.11.1-min');
?>
<span style="padding: 1px 10px; float: right;">
<?php
    echo $this->Html->link(('Logout'), array('controller'=>'users', 'action'=>'logout'));
?>
</span>
<div id="contentContainer" style="width: 650px; max-width: 650px; margin-left: 100px; font-family: Arial, Helvetica, sans-serif; ">
    <div style="padding: 8px 0px 8px 0px; font-size: 28px; font-weight: bold; text-align: center">CENTRAL UNIVERSITY OF PUNJAB</div>
    <div style="padding: 5px 0px 5px 0px; font-size: 12px; font-weight: bold; text-align: center">(Established vide Act no 25(2009) of Parliament)</div>
    <div style="padding: 8px 0px 8px 0px; font-size: 28px; font-weight: bold; text-align: center">Online Application Form for Teaching Positions</div>
    <div style="padding: 15px 0px 15px 0px; font-size: 19px; font-weight: bold;">Position Applied For: <?php echo $applicant['Applicant']['post_applied_for']?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Category Applying For: <?php echo $applicant['Applicant']['category_applied'] ?></div>
    <table id="onlineformdata"  class="print_table" style="table-layout:fixed;">
        <tr>
            <td width="16%" class="print_headers">Advertisement No.</td>
            <td width="44%" class="print_value"><?php echo $applicant['Applicant']['advertisement_no'] ?></td>
            <td width="20%" class="print_headers">Application No.</td>
            <td width="20%" class="print_value" style="padding: 0 0 0 80px"><?php echo $applicant['Applicant']['id'] ?></td>
        </tr>
        <tr>
            <td class="print_headers">Centre</td>
            <td class="print_value"><?php echo $applicant['Applicant']['centre'] ?></td>
        </tr>
        <tr class="spaceUnder">
            <td class="print_headers">Area of Specialization</td>
            <td class="print_value"><?php echo $applicant['Applicant']['area_of_sp']?></td>
            <td class="print_headers">Area of Sub-Specialization</td>
            <td class="print_value"><?php echo $applicant['Applicant']['area_sub_sp']?></td>
        </tr>
        <tr class="spaceUnder">
            <td colspan="3" class="print_headers" align="center">PERSONAL INFORMATION</td>
        </tr>
        <tr>
            <td class="print_headers">Name of the Applicant</td>
            <td class="print_value"><?php echo $applicant['Applicant']['first_name']?>&nbsp;<?php echo $applicant['Applicant']['middle_name']?>&nbsp;<?php echo $applicant['Applicant']['last_name']?>
            </td>
            <td colspan="2" style="padding: 0 0 0 120px;"><img src="<?php if(!empty($image['Document']['filename'])) { echo $this->webroot . '/' . $image['Document']['filename']; } else { echo ""; } ?>" alt="Passport Size Photograph" height="132px" width="132px"></td>
        </tr>
        <tr>
            <td class="print_headers">Gender</td>
            <td class="print_value"><?php echo $applicant['Applicant']['gender']?>
            </td>
            <td colspan="2" style="padding: 0 0 0 120px;"><img src="<?php if(!empty($image['Document']['filename4'])) { echo $this->webroot . '/' . $image['Document']['filename4']; } else { echo ""; } ?>" alt="Signature" height="50px" width="132px"></td>
        </tr>
        <tr>
            <td class="print_headers">Date of Birth</td>
            <td class="print_value"><?php echo $applicant['Applicant']['date_of_birth']?>
            </td>
            <td class="print_headers">Father's Name</td>
            <td class="print_value"><?php echo $applicant['Applicant']['father_name']?>
            </td>
        </tr>
        <tr>
            <td class="print_headers">Category of the applicant</td>
            <td class="print_value"><?php echo $applicant['Applicant']['category']?></td>
            <td class="print_headers">Mother's Name</td>
            <td class="print_value"><?php echo $applicant['Applicant']['mother_name']?></td>
        </tr><!--
	<tr>
            <td class="print_headers">Category of the post applied for</td>
            <td class="print_value"><?php echo $applicant['Applicant']['category_applied']?></td>
        </tr>-->
        <tr>
            <td class="print_headers">PWD (Divyang)</td>
            <td class="print_value"><?php echo $applicant['Applicant']['physically_disabled']?></td>
            <td class="print_headers">Marital Status: </td>
            <td class="print_value"><?php echo $applicant['Applicant']['marital_status']; ?>
            </td>
        </tr>
        <?php if(!empty($applicant['Applicant']['physically_disabled']) && $applicant['Applicant']['physically_disabled'] == "yes") { ?>
            <tr>
                <td class="print_headers" style="padding-left: 20px;">a. Blindness or low vision</td>
                <td class="print_value"><?php echo $applicant['Applicant']['blindness']?></td>
                <td class="print_value"><?php echo $applicant['Applicant']['blindness_pertge']?></td>
            </tr>
            <tr>
                <td class="print_headers" style="padding-left: 20px;">b. Hearing impairment</td>
                <td class="print_value"><?php echo $applicant['Applicant']['hearing']?></td>
                <td class="print_value"><?php echo $applicant['Applicant']['hearing_pertge']?></td>
            </tr>
            <tr>
                <td class="print_headers" style="padding-left: 20px;">c. Locomotor disability or cerebral palsy</td>
                <td class="print_value"><?php echo $applicant['Applicant']['locomotor']?></td>
                <td class="print_value"><?php echo $applicant['Applicant']['locomotor_pertge']?></td>
            </tr>
        <?php } ?>
        <tr>
            <td class="print_headers">Email: </td>
            <td class="print_value"><?php echo $applicant['Applicant']['email']?>
            </td>
            <?php if(!empty($applicant['Applicant']['marital_status']) && $applicant['Applicant']['marital_status'] == "Married") { ?>
                <td class="print_headers">Spouse Name: </td>
                <td class="print_value"><?php echo $applicant['Applicant']['spouse_name']?>
                </td>
            <?php } else { ?>
                <td></td>
                <td></td>
            <?php } ?>
        </tr>
        <tr>
            <td class="print_headers">Mobile No: </td>
            <td class="print_value"><?php echo $applicant['Applicant']['mobile_no']?>
            </td>
            <td class="print_headers">Aadhar No: </td>
            <td class="print_value"><?php echo $applicant['Applicant']['aadhar_no']?>
            </td>
        </tr><!--
        <tr>
            <td class="print_headers">Father's Name</td>
            <td class="print_value"><?php echo $applicant['Applicant']['father_name']?>
            </td>
        </tr>
        <tr>
            <td class="print_headers">Mother's Name</td>
            <td class="print_value"><?php echo $applicant['Applicant']['mother_name']?></td>
        </tr>
        <tr>
            <td class="print_headers">Marital Status: </td>
            <td class="print_value"><?php echo $applicant['Applicant']['marital_status']?>
            </td>
        </tr>
        <tr>
            <td class="print_headers">Aadhar No: </td>
            <td class="print_value"><?php echo $applicant['Applicant']['aadhar_no']?>
            </td>
        </tr>-->
        <tr>
            <td class="print_headers">Nationality: </td>
            <td class="print_value"><?php echo $applicant['Applicant']['nationality']?>
            </td>
        </tr>
    </table>
    <div class="print_headers">Applicant's Name and Address for correspondence</div>
    <table width="100%" id="address_table" border="1px solid black" style="border-right: 1px solid black; border-collapse: collapse;">
        <tr>
            <td width="20%"></td>
            <td width="40%" class="print_headers">Present Address</td>
            <td width="40%" class="print_headers">Postal Address</td>
        </tr>
        <tr>
            <td class="print_headers">Name & Complete Address with Pincode</td>
            <td class="print_value"><?php echo $applicant['Applicant']['present_address']; ?></td>
            <td class="print_value"><?php echo $applicant['Applicant']['mailing_address']; ?></td>
        </tr>
        <tr>
            <td colspan="2" class="print_headers">Phone No. (landline)</td>
            <td class="print_headers">Fax. No.</td>
        </tr>
        <tr>
            <td colspan="2" class="print_value"><?php echo $applicant['Applicant']['landline']; ?></td>
            <td class="print_value"><?php echo $applicant['Applicant']['fax']; ?></td>
        </tr>
    </table>
    <br/>
    <table>
        <tr class="spaceUpper spaceUnder">
            <td colspan="3" class="print_headers" align="center">EDUCATIONAL QUALIFICATION</td>
        </tr>
    </table>
    <?php if(count($education_arr) > 0) { ?>
    <table border="1px solid black" style="border: 1px solid black; border-collapse: collapse;">
        <tr>
            <td width="10%" class="print_headers">Name of Degree / Diploma / Certificate / Class</td>
            <td width="8%" class="print_headers">Course</td>
            <td width="7%" class="print_headers">Mode of Study</td>
            <td width="15%" class="print_headers">Board / University</td>
            <td width="5%" class="print_headers">Grade / CGPA / Division</td>
            <td width="5%" class="print_headers">Percentage(%)</td>
            <td width="5%" class="print_headers">Year of Passing</td>
            <td width="15%" class="print_headers">Subjects</td>
        </tr>
        <?php
        foreach($education_arr as $key => $value){
            if(!empty($education_arr[$key]['Education']['board'])) {
                echo "<tr>";
                echo "<td class=\"print_value\">" . $education_arr[$key]['Education']['qualification'] . "</td>";
                echo "<td class=\"print_value\">" . $education_arr[$key]['Education']['course'] . "</td>";
                echo "<td class=\"print_value\">" . $education_arr[$key]['Education']['mode_of_study'] . "</td>";
                echo "<td class=\"print_value\">" . $education_arr[$key]['Education']['board'] . "</td>";
                //echo "<td>" . $education_arr[$key]['Education']['system'] . "</td>";
                echo "<td class=\"print_value\">" . $education_arr[$key]['Education']['grade'] . "</td>";
                echo "<td class=\"print_value\">" . $education_arr[$key]['Education']['percentage'] . "</td>";
                if($education_arr[$key]['Education']['qualification'] == "Ph.D. Pursuing") {
                            echo "<td colspan=\"2\" class=\"print_value\">Date of Registration: " . $education_arr[$key]['Education']['date_of_registration'] . "</td>";
                        }
                        else {
                                echo "<td class=\"print_value\">" . $education_arr[$key]['Education']['year_of_passing'] . "</td>";
                                echo "<td class=\"print_value\">" . $education_arr[$key]['Education']['subjects'] . "</td>";
                        }
                echo "</tr>";
            }
        }
        ?>
        <tr>
            <td colspan="8" class="print_headers">Gaps in Education: </td>
        </tr>
        <tr>
            <td colspan="2" class="print_headers">Reason 1: </td>
            <td colspan="6" class="print_value"><?php echo $applicant['Applicant']['gaps_in_education']; ?></td>
        </tr>
        <tr>
            <td colspan="2" class="print_headers">Reason 2: </td>
            <td colspan="6" class="print_value"><?php echo $applicant['Applicant']['gaps_in_education2']; ?></td>
        </tr>
        <tr>
            <td colspan="2" class="print_headers">Reason 3: </td>
            <td colspan="6" class="print_value"><?php echo $applicant['Applicant']['gaps_in_education3']; ?></td>
        </tr>
        <tr>
            <td colspan="2" class="print_headers">Is your Ph.D. awarded as per U.G.C Regulation 2009? </td>
            <td colspan="6" class="print_value"><?php echo $applicant['Applicant']['phd_ugc_2009']; ?></td>
        </tr>
    </table>
    <?php } ?>
    <br />
    <?php if(!empty($applicant['Applicant']['ugc_net_subject'])) { ?>
    <div class="print_headers">UGC/CSIR/ICAR/Any Qualifying National Level Test</div>
    <table id="present_position_table" border="1px solid black" style="border-right: 1px solid black; border-collapse: collapse;">
        <tr>
            <td width="20%" class="print_headers">Name of Subject</td>
            <td width="10%" class="print_headers">Year of Passing</td>
            <td width="20%" class="print_headers">Roll No.</td>
            <td width="10%" class="print_headers">JRF</td>
            <td width="10%" class="print_headers">NET</td>
            <td width="10%" class="print_headers">Testing Agency</td>
            <!--<td width="20%" class="print_headers">Category</td>-->
            <!--<td width="10%">Sr. no. of proof enclosed</td>-->
        </tr>
        <tr>
            <td class="print_value"><?php echo $applicant['Applicant']['ugc_net_subject']; ?></td>
            <td class="print_value"><?php echo $applicant['Applicant']['ugc_net_mnth_yr']; ?></td>
            <td class="print_value"><?php echo $applicant['Applicant']['ugc_net_rollno']; ?></td>
            <td class="print_value"><?php echo $applicant['Applicant']['ugc_net_jrf']; ?></td>
            <td class="print_value"><?php echo $applicant['Applicant']['ugc_net_net']; ?></td>
            <td class="print_value"><?php echo $applicant['Applicant']['ugc_net_exam_type']; ?></td>
            <!--<td class="print_value"><?php echo $applicant['Applicant']['ugc_net_category']; ?></td>-->
            <!--<td><?php echo $misc['Misc']['presentp_sr_proof']; ?></td>-->
        </tr>
        <?php if($applicant['Applicant']['ugc_net_exam_type'] === "Any Qualifying National Level Test") { ?>
        <tr>
            <td colspan="2">Any Qualifying National level test details</td>
            <td colspan="4"><?php echo $applicant['Applicant']['ugc_net_any_other_details']; ?></td>
        </tr>
        <?php } ?>
    </table>
    <?php } ?>
    <?php if(!empty($applicant['Applicant']['ugc_net_subject2'])) { ?>
    <table id="present_position_table" border="1px solid black" style="border-right: 1px solid black; border-collapse: collapse;">
        <tr>
            <td width="20%" class="print_headers">Name of Subject</td>
            <td width="10%" class="print_headers">Year of Passing</td>
            <td width="20%" class="print_headers">Roll No.</td>
            <td width="10%" class="print_headers">JRF</td>
            <td width="10%" class="print_headers">NET</td>
            <td width="10%" class="print_headers">Testing Agency</td>
            <!--<td width="20%" class="print_headers">Category</td>-->
            <!--<td width="10%">Sr. no. of proof enclosed</td>-->
        </tr>
        <tr>
            <td class="print_value"><?php echo $applicant['Applicant']['ugc_net_subject2']; ?></td>
            <td class="print_value"><?php echo $applicant['Applicant']['ugc_net_mnth_yr2']; ?></td>
            <td class="print_value"><?php echo $applicant['Applicant']['ugc_net_rollno2']; ?></td>
            <td class="print_value"><?php echo $applicant['Applicant']['ugc_net_jrf2']; ?></td>
            <td class="print_value"><?php echo $applicant['Applicant']['ugc_net_net2']; ?></td>
            <td class="print_value"><?php echo $applicant['Applicant']['ugc_net_exam_type2']; ?></td>
            <!--<td class="print_value"><?php echo $applicant['Applicant']['ugc_net_category']; ?></td>-->
            <!--<td><?php echo $misc['Misc']['presentp_sr_proof']; ?></td>-->
        </tr>
        <?php if($applicant['Applicant']['ugc_net_exam_type2'] === "Any Qualifying National Level Test") { ?>
        <tr>
            <td colspan="2">Any Qualifying National level test details</td>
            <td colspan="4"><?php echo $applicant['Applicant']['ugc_net_any_other_details2']; ?></td>
        </tr>
        <?php } ?>
    </table>
    <?php } ?>
    <br />
    <table>
        <tr class="spaceUpper spaceUnder">
            <td colspan="3" class="print_headers" align="center">WORK EXPERIENCE</td>
        </tr>
    </table>
    <?php if(count($exp_arr) > 0) { ?>
    <table border="1px solid black" style="border-right: 1px solid black ; border-collapse: collapse;">
        <tr>
            <td rowspan="2" width="10%" class="print_headers">Designation</td>
            <td rowspan="2" width="7%" class="print_headers">Scale of Pay</td>
            <td rowspan="2" width="14%" class="print_headers">Name & address of University / Institute</td>
            <td rowspan="2" width="10%" class="print_headers">Organization / Institute</td>
            <td colspan="3"><div style="text-align: center" class="print_headers">Period of Experience</div></td>
            <td rowspan="2" width="10%" class="print_headers">Nature of Work</td>
            <!--<td rowspan="2" width="10%">Sr. No. of Proof Enclosed</td>-->
        </tr>
        <tr>
            <td width="7%" class="print_headers">From (Date)</td>
            <td width="7%" class="print_headers">To (Date)</td>
            <td width="6%" class="print_headers" style="font-size: 9px;">No. of Years / Months (as on last date of online form)</td>
        </tr>
        <?php
        foreach($exp_arr as $key => $value){
        echo "<tr>";
        echo "<td class=\"print_value\">" . $exp_arr[$key]['Experience']['designation'] . "</td>";
        echo "<td class=\"print_value\">" . $exp_arr[$key]['Experience']['scale_of_pay'] . "</td>";
        echo "<td class=\"print_value\">" . $exp_arr[$key]['Experience']['name_address'] . "</td>";
        echo "<td class=\"print_value\">" . $exp_arr[$key]['Experience']['institute_type'] . "</td>";
        echo "<td class=\"print_value\">" . $exp_arr[$key]['Experience']['from_date'] . "</td>";
        echo "<td class=\"print_value\">" . $exp_arr[$key]['Experience']['to_date'] . "</td>";
        echo "<td class=\"print_value\">" . $exp_arr[$key]['Experience']['no_of_yrs_mnths_days'] . "</td>";
        echo "<td class=\"print_value\">" . $exp_arr[$key]['Experience']['nature_of_work'] . "</td>";
        //echo "<td>" . $exp_arr[$key]['Experience']['sr_of_proof'] . "</td>";
        echo "</tr>";
        }
        ?>
        <tr>
            <td colspan="1" class="print_headers">Total period of experience</td>
            <td class="print_headers">Years</td>
            <td class="print_value"><?php echo $applicant['Applicant']['tot_exp_years']; ?></td>
            <td class="print_headers">Months</td>
            <td class="print_value"><?php echo $applicant['Applicant']['tot_exp_mnths']; ?></td>
            <td class="print_headers">Days</td>
            <td colspan="2" class="print_value"><?php echo $applicant['Applicant']['tot_exp_days']; ?></td>
        </tr>
        <!--
        <tr>
            <td colspan="8" class="print_headers">Gaps in Experience: </td>
        </tr>
        <tr>
            <td colspan="2" class="print_headers">Reason 1: </td>
            <td colspan="6" class="print_value"><?php echo $applicant['Applicant']['gaps_in_experience']; ?></td>
        </tr>
        <tr>
            <td colspan="2" class="print_headers">Reason 2: </td>
            <td colspan="6" class="print_value"><?php echo $applicant['Applicant']['gaps_in_experience2']; ?></td>
        </tr>
        <tr>
            <td colspan="2" class="print_headers">Reason 3: </td>
            <td colspan="6" class="print_value"><?php echo $applicant['Applicant']['gaps_in_experience3']; ?></td>
        </tr>-->
    </table>
    <?php } ?>
    <br/>
    
    <br/>
    <div class="print_headers">Teaching Experience acquired simultaneously during Ph.D., if any</div>
    <table border="1px solid black" style="border-right: 1px solid black ; border-collapse: collapse;">
        <tr>
            <td rowspan="2" width="10%" class="print_headers">Designation</td>
            <td rowspan="2" width="10%" class="print_headers">Scale of Pay</td>
            <td rowspan="2" width="10%" class="print_headers">Name & address of University / Institute</td>
            <td rowspan="2" width="10%" class="print_headers">Organization / Institute</td>
            <td width="30%" colspan="3"><div style="text-align: center" class="print_headers">Period of Experience</div></td>
            <td rowspan="2" width="10%" class="print_headers">Nature Of Service (Full Time)</td>
            <td rowspan="2" width="10%" class="print_headers">Work Load as per UGC Norms</td>
            <td rowspan="2" width="10%" class="print_headers" style="font-size: 9px;">Fulfilled the minimum eligibility conditions as per UGC and concerned statutory bodies at the time of appointment</td>
            <td rowspan="2" width="10%" class="print_headers">Any leave taken during this period for Ph.D. research</td>
            <!--<td rowspan="2" width="10%">Sr. No. of Proof Enclosed</td>-->
        </tr>
        <tr>
            <td width="10%" class="print_headers">From Date</td>
            <td width="10%" class="print_headers">To Date</td>
            <td width="10%" class="print_headers">No. of Years/Months(as on last date of online form)</td>
        </tr>
        <?php
        foreach($exp_arr_phd as $key => $value){
            if(!empty($exp_arr_phd[$key]['Experiencephd']['name_address'])) {
                echo "<tr>";
                echo "<td class=\"print_value\">" . $exp_arr_phd[$key]['Experiencephd']['designation'] . "</td>";
                echo "<td class=\"print_value\">" . $exp_arr_phd[$key]['Experiencephd']['scale_of_pay'] . "</td>";
                echo "<td class=\"print_value\">" . $exp_arr_phd[$key]['Experiencephd']['name_address'] . "</td>";
                echo "<td class=\"print_value\">" . $exp_arr_phd[$key]['Experiencephd']['institute_type'] . "</td>";
                echo "<td class=\"print_value\">" . $exp_arr_phd[$key]['Experiencephd']['from_date'] . "</td>";
                echo "<td class=\"print_value\">" . $exp_arr_phd[$key]['Experiencephd']['to_date'] . "</td>";
                echo "<td class=\"print_value\">" . $exp_arr_phd[$key]['Experiencephd']['no_of_mnths_yrs'] . "</td>";
                echo "<td class=\"print_value\">" . $exp_arr_phd[$key]['Experiencephd']['nature_of_service'] . "</td>";
                echo "<td class=\"print_value\">" . $exp_arr_phd[$key]['Experiencephd']['work_load'] . "</td>";
                echo "<td class=\"print_value\">" . $exp_arr_phd[$key]['Experiencephd']['minimum_eligibility'] . "</td>";
                echo "<td class=\"print_value\">" . $exp_arr_phd[$key]['Experiencephd']['leave_taken'] . "</td>";
                //echo "<td>" . $exp_arr[$key]['Experience']['sr_of_proof'] . "</td>";
                echo "</tr>";
            }
        }
        ?>
    </table>
    <br/>
    <table>
        <tr class="spaceUpper spaceUnder">
            <td colspan="3" class="print_headers" align="center">RESEARCH WORK</td>
        </tr>
    </table>
    <!--
    <table>
        <tr>
            <td class="print_headers">Shortlisting Criteria (A): </td>
            <td class="print_value"><?php echo $applicant['Applicant']['criteria_partA']?>
            </td>
        </tr>
        <tr>
            <td class="print_headers">Shortlisting Criteria (B): </td>
            <td class="print_value"><?php echo $applicant['Applicant']['criteria_partB']?>
            </td>
        </tr>
        <tr>
            <td class="print_headers">Shortlisting Criteria (A+B) </td>
            <td class="print_value"><?php echo $applicant['Applicant']['criteria_totalAB']?>
            </td>
        </tr>
        <?php if(!empty($applicant['Applicant']['post_applied_for']) && ($applicant['Applicant']['post_applied_for'] == "Professor" || $applicant['Applicant']['post_applied_for'] == "Associate Professor")) { 
            ?>
            <tr>
                <td class="print_headers">API Score Category II</td>
                <td class="print_value"><?php echo $applicant['Applicant']['apiscore_cat_2']?></td>
            </tr>
            <tr>
                <td class="print_headers">API Score Category III</td>
                <td class="print_value"><?php echo $applicant['Applicant']['apiscore_cat_3']?></td>
            </tr>
            <tr>
                <td class="print_headers">Total API Score (Category II & III)</td>
                <td class="print_value"><?php echo $applicant['Applicant']['totalapiscore_cat_2_3']?></td>
            </tr>
        <?php } ?>
    </table>-->
    <div class="print_headers">Original Research Papers</div>
    <table border="1px solid black" style="border-right: 1px solid black ; border-collapse: collapse;">
        <tr>
            <td width="10%" class="print_headers">Authors</td>
            <td width="42%" class="print_headers">Title of the Paper</td>
            <td width="6%" class="print_headers">Journal No. as per UGC List</td>
            <td width="12%" class="print_headers">Journal's Name & Place of Publication</td>
            <td width="13%" class="print_headers">Publication & ISSN/DoI</td>
            <td width="8%" class="print_headers">Vol./Page No/Year</td>
            <td width="9%" class="print_headers">Impact Factor</td>
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
    <div class="print_headers">Research Articles in books</div>
    <table border="1px solid black" style="border-right: 1px solid black ; border-collapse: collapse;">
        <tr>
            <td width="15%" class="print_headers">Authors</td>
            <td width="10%" class="print_headers">Title of the Book</td>
            <td width="45%" class="print_headers">Title of the Article</td>
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
        echo "<td class=\"print_value\">" . $rarticle_arr[$key]['Researcharticle']['publisher_ISBN'] . "</td>";
        echo "<td class=\"print_value\">" . $rarticle_arr[$key]['Researcharticle']['place_of_publication'] . "</td>";
        echo "<td class=\"print_value\">" . $rarticle_arr[$key]['Researcharticle']['page_no'] . "</td>";
        echo "</tr>";
        }
        ?>
    </table>
    <br />
    <div class="print_headers">Extra Mural Research Funding / R&D Projects</div>
    <table border="1px solid black" style="border-right: 1px solid black ; border-collapse: collapse;">
        <tr>
            <td width="30%" class="print_headers">Title of the Project(s)</td>
            <td width="15%" class="print_headers">Funding Agency</td>
            <td width="20%" class="print_headers">As PI/CO-PI or Investigator</td>
            <td width="15%" class="print_headers">Amount of Grant</td>
            <td width="10%" class="print_headers">Duration</td>
            <td width="10%" class="print_headers">Status Completed / Ongoing</td>
        </tr>
        <?php
        foreach($rproject_arr as $key => $value){
        echo "<tr>";
        echo "<td class=\"print_value\">" . $rproject_arr[$key]['Researchproject']['title'] . "</td>";
        echo "<td class=\"print_value\">" . $rproject_arr[$key]['Researchproject']['funding_agency'] . "</td>";
        echo "<td class=\"print_value\">" . $rproject_arr[$key]['Researchproject']['investigator'] . "</td>";
        echo "<td class=\"print_value\">" . $rproject_arr[$key]['Researchproject']['amount_of_grant'] . "</td>";
        echo "<td class=\"print_value\">" . $rproject_arr[$key]['Researchproject']['duration'] . "</td>";
        echo "<td class=\"print_value\">" . $rproject_arr[$key]['Researchproject']['comp_ongoing'] . "</td>";
        echo "</tr>";
        }
        ?>
    </table>
    <br/>
    <table width="100%" border="1px solid black" style="border-collapse: collapse; ">
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
    <table width="100%" border="1px solid black" style="border-collapse: collapse; ">
        <tr>
            <td width="50%" class="print_headers">Seminars / Conferences / Workshops / Training programmes, attended</td>
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
    <table width="100%" border="1px solid black" style="border-collapse: collapse; ">
        <tr>
            <td width="50%" class="print_headers">Seminars / Conferences / Workshops / Training programmes, organized</td>
            <td class="print_headers">National (No.)</td>
            <td class="print_headers">International (No.)</td>
            <td class="print_headers">Total (No.)</td>
        </tr>
        <tr>
            <td></td>
            <td class="print_value"><?php echo $applicant['Applicant']['sem_org_national']; ?></td>
            <td class="print_value"><?php echo $applicant['Applicant']['sem_org_international']; ?></td>
            <td class="print_value"><?php echo $applicant['Applicant']['sem_org_total']; ?></td>
        </tr>
    </table>
    <br/>
    <table width="100%" border="1px solid black" style="border-collapse: collapse; ">
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
    <div class="print_headers">Referees: prefer to include present Employer/Guide and/or former Employer</div>
    <table width="100%" border="1px solid black" style="border-collapse: collapse;">
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
            <td class="print_headers">Mobile Ph:</td>
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
    <br/>
    <table>
        <tr class="spaceUpper spaceUnder">
            <td colspan="3" class="print_headers" align="center">FEE DETAILS & OTHER INFORMATION</td>
        </tr>
    </table>
    <table border="1px solid black" style="border-right: 1px solid black; border-collapse: collapse;">
        <tr>
            <td width="70%" class="print_headers misc_col1">Time required for joining if selected:</td>
            <td width="30%" class="print_value"><?php echo $applicant['Applicant']['time_req_for_joining']; ?></td>
        </tr>
        <tr>
            <td class="print_headers misc_col1">Any Other Information/qualification relevant to the post applied for:</td>
            <td class="print_value"><?php echo $applicant['Applicant']['any_other_info']; ?></td>
        </tr>
        <tr>
            <td class="print_headers misc_col1">Membership in Professional Recognized Bodies:</td>
            <td class="print_value"><?php echo $applicant['Applicant']['mem_pro_bodies']; ?></td>
        </tr>
        <?php if($applicant['Applicant']['mem_pro_bodies'] == "yes") { ?>
        <tr>
            <td class="print_headers misc_col1">Membership Details:</td>
            <td class="print_value"><?php echo $applicant['Applicant']['mem_details']; ?></td>
        </tr>
        <?php } ?>
        <tr>
            <td class="print_headers misc_col1">Have you ever been punished during your service or convicted by a court of law?</td>
            <td class="print_value"><?php echo $applicant['Applicant']['convicted']; ?></td>
        </tr>
        <tr>
            <td class="print_headers misc_col1">Do you have any case pending against you in any court of law?</td>
            <td class="print_value"><?php echo $applicant['Applicant']['pending_court']; ?></td>
        </tr>
        <tr>
            <td class="print_headers misc_col1">Are you willing to accept the minimum initial pay in the grade?</td>
            <td class="print_value"><?php echo $applicant['Applicant']['willg_min_pay']; ?></td>
        </tr>
        <?php if($applicant['Applicant']['willg_min_pay'] == "no") { ?>
        <tr>
            <td class="print_headers misc_col1">Reason(s):</td>
            <td class="print_value"><?php echo $applicant['Applicant']['min_pay_no']; ?></td>
        </tr>
        <?php } ?>
        <tr>
            <td class="print_headers misc_col1">Total number of self-attested documents attached: </td>
            <td class="print_value"><?php echo $applicant['Applicant']['total_self_att_docs_att']; ?></td>
        </tr>
        <!--
        <tr>
            <td class="print_headers misc_col1">If selected how would you like to develop your Department/University and your area of interest: </td>
            <td class="print_value"><?php echo $applicant['Applicant']['develop_department']; ?></td>
        </tr>-->
        <tr>
            <td class="print_headers">Details of application fee</td>
            <td style="word-wrap: normal;" class="print_value">Payment ID: <?php echo $applicant['Applicant']['payment_id'] ?>, Transaction ID:<?php echo $applicant['Applicant']['payment_transaction_id']?> Date:<?php echo $applicant['Applicant']['payment_date_created']?> Amount:<?php echo $applicant['Applicant']['payment_amount']?>
            </td>
        </tr>
    </table>
    <br/>
    <table>
        <tr class="spaceUpper spaceUnder">
            <td colspan="3" class="print_headers" align="center">ENDORSEMENT by the present EMPLOYER</td>
        </tr>
    </table>
    <div><label class="print_headers" style="line-height: 150%;">(In case of in-service candidates, the application must be endorsed / forwarded by the Head of the Department / Employer.)</label></div>
    <div><label class="print_headers" style="text-decoration: underline; line-height: 150%;">Forwarded to the Central University of Punjab, City Campus, District - Bathinda, Punjab, India - 151001.</label></div>
    <br/>
    <table id="employee_endorsement">
        <tr>
            <td class="print_headers" colspan="3" style="line-height: 200%;">The applicant Dr./Mr./Mrs. <span style="text-decoration: underline;"><?php echo $applicant['Applicant']['first_name'] . " " . $applicant['Applicant']['middle_name'] . " " . $applicant['Applicant']['last_name']?></span> who has submitted the application for the post of <span style="text-decoration: underline;"><?php echo $applicant['Applicant']['post_applied_for']; ?></span> in the Central University of Punjab, has been working in the organization namely 
            <span style="text-decoration: underline;">                                         </span> in the post of <span style="text-decoration: underline;">                                         </span> in a temporary / contract / permanent capacity with effect from <span style="text-decoration: underline;">                                         </span> in the Scale of Pay / Pay Band of 
            <span style="text-decoration: underline;">                                         </span>. He / She is drawing a basic pay of <span style="text-decoration: underline;">                                         </span>. His / Her next increment is due on <span style="text-decoration: underline;">                                         </span>.
            </td>
        </tr>
        <tr>
            <td class="print_headers" colspan="3" style="line-height: 150%;">Further, It is Certified that no vigilance case or disciplinary proceedings or criminal proceeding is either pending or contemplated against the said applicant. There is no objection for his/her application being considered by Central University of Punjab.</td>
        <tr/>
        <tr>
            <td colspan="3"></td>
        </tr>
        <tr>
            <td valign="bottom"><div>Place: <span style="text-decoration: underline;">         </span></div>
                <div>Date: <span style="text-decoration: underline;">          </span></div>
            </td>
            <td valign="bottom"><span><strong>Seal</strong></span></td>
            <td valign="bottom"><div>&nbsp;</div>
                <div>(Signature of the forwarding officer)</div>
                <div>Name: <span style="text-decoration: underline;">          </span></div>
                <div>Designation: <span style="text-decoration: underline;">          </span></div>
            </td>
        <tr/>
    </table>
    <br/>
    <br />
    <div class="print_required">
        <label>Declaration:</label>
        <input type="checkbox" id="declaration" name="declaration"></input>
    </div>
    <p>I, hereby declare that all the statements and entries made in this application are 
        true, complete and correct to the best of my knowledge and belief. No information has been concealed. In the event of any 
        information being found false or incorrect or ineligibility being detected in future 
        at any stage, my candidature may be cancelled by the University and suitable action including termination will be accepted.
    </p>
    <div>
        <table>
            <tr>
                <td colspan="3">The hard copy of the completed form with the required enclosures is being sent by Registered/Speed post.</td>
            </tr>
            <tr>
                <td style="width: 40%;">
                    <?php if(isset($applicant) && $applicant['Applicant']['final_submit'] == "1" ) { ?>
                        <input type="button" onclick="window.print()" value="Print" style="width: 100px;"/>
                    <?php }
                        else { ?>
                         <input id="back_button" type="button" onclick="" value="Go Back" style="width: 100px;"/>
                      <?php } ?>
                </td>
                <td style="padding-top: 30px">.....................<br/>Signature
                </td>
                <td style="width: 40%;">
                    <!--<a href="<?php echo $this->webroot; ?>/multi_step_form/wizard/finalsubmit" class="button" id="finalsubmit" style="font-size: 20px;">Final Submit</a>-->
                    <?php if(isset($applicant) && $applicant['Applicant']['final_submit'] != "1" ) {
                            echo $this->Form->create('Temp', array('id' => 'Temp_Details', 'url' => Router::url( '/form/final_submit', true )));
                            echo $this->Form->input('Document.id', array('type' => 'hidden','name' => 'temp', 'value' => 'temp'));
                            echo $this->Form->submit('Final Submission', array('div' => false, 'id' => 'finalsubmit' )); 
                            echo $this->Form->end(); 
                         } 
                        ?>
                    <!--<input id="finalsubmit" type="button" value="Final Submit" style="width: 200px;"/>-->
                </td>
            </tr>
            <tr>
                <td></td>
                <td>Date: ..............</td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td style="padding-top: 20px; ">Place: .............</td>
                <td></td>
            </tr>
        </table>
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
            if(!confirm("Are you sure to finaliz the submission process? After final submission you will not be able to modify your Application Form!")) {
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
