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
  //table-layout: fixed;
  width: 100%
}

.print_required label:after { content:"*"; }

.print_headers {
    font-size: 12px;
    font-weight: bold;
    color: #010101;
	padding: 5px;
}

.print_value {
    font-size: 12px;
    color: black;
	padding: 5px;
}

.misc_col1 {
    width: 45%;
}

</style>
<?php if($data_set === 'true') {
    $this->Html->css('cake.generic.css');
    echo $this->Html->script('jquery-1.11.1-min');
?>
<div id="contentContainer" style="width: 650px; margin-left: 100px;">
    <p style="font-size: 28px; font-weight: bold; text-align: center">CENTRAL UNIVERSITY OF PUNJAB</p>
    <p style="font-size: 12px; font-weight: bold; text-align: center">(Established vide Act no 25(2009) of Parliament)</p>
    <p style="font-size: 28px; font-weight: bold; text-align: center">Online Application Form for Non-Teaching</p>
	<p style="font-size: 24px; font-weight: bold; text-align: center">Position: <?php echo $applicant['Applicant']['post_applied_for']?></p>
    <table id="onlineformdata"  class="print_table" style="table-layout:fixed;">
        <tr>
            <td width="40%" class="print_headers">Advertisement No.</td>
            <td width="40%" class="print_value"><?php echo $applicant['Applicant']['advertisement_no'] ?></td>
            <td width="20%"><img src="<?php if(!empty($image['Image']['filename'])) { echo $this->webroot . '/' . $image['Image']['filename']; } else { echo ""; } ?>" alt="Passport Size Photograph" height="132px" width="132px"></td>
        </tr>
        <tr>
            <td width="40%" class="print_headers">Applicant Number</td>
            <td width="40%" class="print_value"><?php echo $applicant['Applicant']['id'] ?></td>
			<td width="20%"><img src="<?php if(!empty($image['Image']['filename4'])) { echo $this->webroot . '/' . $image['Image']['filename4']; } else { echo ""; } ?>" alt="Signature" height="50px" width="132px"></td>
        </tr>
        <tr>
            <td class="print_headers">Details of application fee</td>
            <td style="word-wrap: normal;" class="print_value">Transaction ID:<?php echo $applicant['Applicant']['payment_transaction_id']?> Date:<?php echo $applicant['Applicant']['payment_date_created']?> Amount:<?php echo $applicant['Applicant']['payment_amount']?>
            </td>
        </tr>
        <br />
        <!--
        <tr>
            <td class="print_headers">Name of the post applied for</td>
            <td class="print_value"><?php echo isset($postAppliedFor) ? $postAppliedFor : '' ;?></td>
        </tr>-->
        <!--<tr>
            <td>Name of the Centre / Non-Teaching Post</td>
            <td><?php echo $applicant['Applicant']['name_of_centre']?></td>
        </tr>
        <tr>
            <td>Area of specialization</td>
            <td><?php echo $applicant['Applicant']['specialization']?></td>
        </tr>-->
        <br />
        <tr>
            <td class="print_headers">Name of the Applicant</td>
            <td class="print_value"><?php echo $applicant['Applicant']['first_name']?>&nbsp;<?php echo $applicant['Applicant']['middle_name']?>&nbsp;<?php echo $applicant['Applicant']['last_name']?>
            </td>
        </tr>
        <tr>
            <td class="print_headers">Gender</td>
            <td class="print_value"><?php echo $applicant['Applicant']['gender']?>
            </td>
        </tr>
        <tr>
            <td class="print_headers">Date of Birth</td>
            <td class="print_value"><?php echo $applicant['Applicant']['date_of_birth']?>
            </td>
        </tr>
        <tr>
            <td class="print_headers">Category</td>
            <td class="print_value"><?php echo $applicant['Applicant']['category']?></td>
        </tr>
        <tr>
            <td class="print_headers">Email: </td>
            <td class="print_value"><?php echo $applicant['Applicant']['email']?>
            </td>
        </tr>
        <tr>
            <td class="print_headers">Mobile No: </td>
            <td class="print_value"><?php echo $applicant['Applicant']['mobile_no']?>
            </td>
        </tr>
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
        </tr>
        <tr>
            <td class="print_headers">Nationality: </td>
            <td class="print_value"><?php echo $applicant['Applicant']['nationality']?>
            </td>
        </tr>
    </table>
    <br />
    <div class="print_headers">Education Qualifications</div>
    <table border="1px solid black" style="border: 1px solid black; border-collapse: collapse;">
        <tr>
            <td width="5%" class="print_headers">Name of Degree / Diploma / Certificate / Class</td>
            <td width="10%" class="print_headers">Course</td>
            <td width="30%" class="print_headers">Board / University</td>
            <td width="5%" class="print_headers">Grade / CGPA / Division</td>
            <td width="5%" class="print_headers">Percentage</td>
            <td width="5%" class="print_headers">Year of Passing</td>
            <td width="10%" class="print_headers">Subjects</td>
        </tr>
        <?php
            foreach($education_arr as $key => $value){
                echo "<tr>";
                echo "<td class=\"print_value\">" . $education_arr[$key]['Education']['qualification'] . "</td>";
                echo "<td class=\"print_value\">" . $education_arr[$key]['Education']['course'] . "</td>";
                echo "<td class=\"print_value\">" . $education_arr[$key]['Education']['board'] . "</td>";
                //echo "<td>" . $education_arr[$key]['Education']['system'] . "</td>";
                echo "<td class=\"print_value\">" . $education_arr[$key]['Education']['grade'] . "</td>";
                echo "<td class=\"print_value\">" . $education_arr[$key]['Education']['percentage'] . "</td>";
                echo "<td class=\"print_value\">" . $education_arr[$key]['Education']['year_of_passing'] . "</td>";
                echo "<td class=\"print_value\">" . $education_arr[$key]['Education']['subjects'] . "</td>";
                echo "</tr>";
            }
        ?>
        <tr>
            <td colspan="2" class="print_headers">Gaps in Education: </td>
            <td colspan="5" class="print_value"><?php echo $misc['Misc']['gaps_in_education']; ?></td>
        </tr>
    </table>
    <br />
    <p style="page-break-after:always;"></p>
    <div class="print_headers">Experience</div>
    <table border="1px solid black" style="border-right: 1px solid black ; border-collapse: collapse;">
        <tr>
            <td rowspan="2" width="10%" class="print_headers">Designation</td>
            <td rowspan="2" width="10%" class="print_headers">Scale of Pay</td>
            <td rowspan="2" width="10%" class="print_headers">Name & address of University / Institute</td>
            <td rowspan="2" width="10%" class="print_headers">Organization / Institute</td>
            <td colspan="3"><div style="text-align: center" class="print_headers">Period of Experience</div></td>
            <td rowspan="2" width="10%" class="print_headers">Nature Of Work</td>
            <!--<td rowspan="2" width="10%">Sr. No. of Proof Enclosed</td>-->
        </tr>
        <tr>
            <td width="10%" class="print_headers">From Date</td>
            <td width="10%" class="print_headers">To Date</td>
            <td width="10%" class="print_headers">No. of Years/Months(as on date of advertisement)</td>
        </tr>
        <?php
            foreach($exp_arr as $key => $value){
                echo "<tr>";
                echo "<td class=\"print_value\">" . $exp_arr[$key]['Experience']['designation'] . "</td>";
                echo "<td class=\"print_value\">" . $exp_arr[$key]['Experience']['scale_of_pay'] . "</td>";
                echo "<td class=\"print_value\">" . $exp_arr[$key]['Experience']['name_add'] . "</td>";
                echo "<td class=\"print_value\">" . $exp_arr[$key]['Experience']['insti_type'] . "</td>";
                echo "<td class=\"print_value\">" . $exp_arr[$key]['Experience']['from_date'] . "</td>";
                echo "<td class=\"print_value\">" . $exp_arr[$key]['Experience']['to_date'] . "</td>";
                echo "<td class=\"print_value\">" . $exp_arr[$key]['Experience']['no_of_yrs_mnths'] . "</td>";
                echo "<td class=\"print_value\">" . $exp_arr[$key]['Experience']['nature_of_work'] . "</td>";
                //echo "<td>" . $exp_arr[$key]['Experience']['sr_of_proof'] . "</td>";
                echo "</tr>";
            }
        ?>
        <tr>
            <td colspan="1" class="print_headers">Total period of experience</td>
            <td class="print_headers">Years</td>
            <td class="print_value"><?php echo $misc['Misc']['tot_exp_years']; ?></td>
            <td class="print_headers">Months</td>
            <td class="print_value"><?php echo $misc['Misc']['tot_exp_mnths']; ?></td>
            <td class="print_headers">Days</td>
            <td colspan="2" class="print_value"><?php echo $misc['Misc']['tot_exp_days']; ?></td>
        </tr>
        <tr>
            <td colspan="2" class="print_headers">Gaps in Experience: </td>
            <td colspan="6" class="print_value"><?php echo $misc['Misc']['gaps_in_experience']; ?></td>
        </tr>
    </table>
    <br />
    <div class="print_headers">Publications</div>
    <table border="1px solid black" style="border-right: 1px solid black ; border-collapse: collapse;">
        <tr>
            <td width="10%" class="print_headers">Authors</td>
            <td width="30%" class="print_headers">Title of the Paper</td>
            <td width="15%" class="print_headers">Journal's Name & Place of Publication</td>
            <td width="20" class="print_headers">Publication & ISSN</td>
            <td width="15%" class="print_headers">Vol./Page No/Year</td>
            <td width="10%" class="print_headers">Impact Factor</td>
        </tr>
        <?php
            foreach($publication_arr as $key => $value){
                echo "<tr>";
                echo "<td class=\"print_value\">" . $publication_arr[$key]['Researchpaper']['author'] . "</td>";
                echo "<td class=\"print_value\">" . $publication_arr[$key]['Researchpaper']['title_of_paper'] . "</td>";
                echo "<td class=\"print_value\">" . $publication_arr[$key]['Researchpaper']['journal_name_place'] . "</td>";
                echo "<td class=\"print_value\">" . $publication_arr[$key]['Researchpaper']['publication_issn'] . "</td>";
                echo "<td class=\"print_value\">" . $publication_arr[$key]['Researchpaper']['vol_pageno_year'] . "</td>";
                echo "<td class=\"print_value\">" . $publication_arr[$key]['Researchpaper']['impact_factor'] . "</td>";
                echo "</tr>";
            }
        ?>
    </table>
    <br/>
    <div class="print_headers">Referees</div>
    <table id="referee_table" border="1px solid black" style="border-right: 1px solid black; border-collapse: collapse;">
        <tr>
            <td width="25%"></td>
            <td width="25%" class="print_headers">Referee 1</td>
            <td width="25%" class="print_headers">Referee 2</td>
            <td width="25%" class="print_headers">Referee 3</td>    
        </tr>
        <tr>
            <td class="print_headers">Name & complete postal addresses</td>
            <td class="print_value"><?php echo $misc['Misc']['ref_add1']; ?></td>
            <td class="print_value"><?php echo $misc['Misc']['ref_add2']; ?></td>
            <td class="print_value"><?php echo $misc['Misc']['ref_add3']; ?></td>
        </tr>
        <tr>
            <td class="print_headers">Email:</td>
            <td class="print_value"><?php echo $misc['Misc']['ref_email1']; ?></td>
            <td class="print_value"><?php echo $misc['Misc']['ref_email2']; ?></td>
            <td class="print_value"><?php echo $misc['Misc']['ref_email3']; ?></td>
        </tr>
        <tr>
            <td class="print_headers">Phone (Landline) with STD Code:</td>
            <td class="print_value"><?php echo $misc['Misc']['ref_landline1']; ?></td>
            <td class="print_value"><?php echo $misc['Misc']['ref_landline2']; ?></td>
            <td class="print_value"><?php echo $misc['Misc']['ref_landline3']; ?></td>
        </tr>
        <tr>
            <td class="print_headers">Mobile Ph:</td>
            <td class="print_value"><?php echo $misc['Misc']['ref_mobile1']; ?></td>
            <td class="print_value"><?php echo $misc['Misc']['ref_mobile2']; ?></td>
            <td class="print_value"><?php echo $misc['Misc']['ref_mobile3']; ?></td>
        </tr>
        <tr>
            <td class="print_headers">Fax:</td>
            <td class="print_value"><?php echo $misc['Misc']['ref_fax1']; ?></td>
            <td class="print_value"><?php echo $misc['Misc']['ref_fax2']; ?></td>
            <td class="print_value"><?php echo $misc['Misc']['ref_fax3']; ?></td>
        </tr>
    </table>
    <br />
    <div class="print_headers">Present Position</div>
    <table id="present_position_table" border="1px solid black" style="border-right: 1px solid black; border-collapse: collapse;">
        <tr>
            <td width="10%" class="print_headers">Designation</td>
            <td width="30%" class="print_headers">Name of the University / Institution</td>
            <td width="20%" class="print_headers">Basic Pay(Rs.)</td>
            <td width="15%" class="print_headers">Grade Pay(Rs.)</td>
            <td width="15%" class="print_headers">Gross Pay / Total Salary p.m. (Rs.)</td>
            <td width="10%" class="print_headers">Increment date (Date/Month)</td>
            <!--<td width="10%">Sr. no. of proof enclosed</td>-->
        </tr>
        <tr>
            <td class="print_value"><?php echo $misc['Misc']['presentp_desig']; ?></td>
            <td class="print_value"><?php echo $misc['Misc']['presentp_nameuniv']; ?></td>
            <td class="print_value"><?php echo $misc['Misc']['presentp_basic_pay']; ?></td>
            <td class="print_value"><?php echo $misc['Misc']['presentp_pay_scale']; ?></td>
            <td class="print_value"><?php echo $misc['Misc']['presentp_gross_salary']; ?></td>
            <td class="print_value"><?php echo $misc['Misc']['presentp_increment_date']; ?></td>
            <!--<td><?php echo $misc['Misc']['presentp_sr_proof']; ?></td>-->
        </tr>
    </table>
    <br/>
    <table border="1px solid black" style="border-right: 1px solid black; border-collapse: collapse;">
        <tr>
            <td class="print_headers misc_col1">Time required for joining if selected:</td>
            <td class="print_value"><?php echo $misc['Misc']['time_req_for_joining']; ?></td>
        </tr>
        <tr>
            <td class="print_headers misc_col1">Any Other Information/qualification relevant to the post applied for:</td>
            <td class="print_value"><?php echo $misc['Misc']['any_other_info']; ?></td>
        </tr>
        <tr>
            <td class="print_headers misc_col1">Membership in Professional Bodies:</td>
            <td class="print_value"><?php echo $misc['Misc']['mem_pro_bodies']; ?></td>
        </tr>
        <?php if($misc['Misc']['mem_pro_bodies'] == "yes") { ?>
            <tr>
                <td class="print_headers misc_col1">Membership Details:</td>
                <td class="print_value"><?php echo $misc['Misc']['mem_details']; ?></td>
            </tr>
        <?php } ?>
        <tr>
            <td class="print_headers misc_col1">Have you ever been punished during your service or convicted by a court of law?</td>
            <td class="print_value"><?php echo $misc['Misc']['convicted']; ?></td>
        </tr>
        <tr>
            <td class="print_headers misc_col1">Do you have any case pending against you in any court of law?</td>
            <td class="print_value"><?php echo $misc['Misc']['pending_court']; ?></td>
        </tr>
        <tr>
            <td class="print_headers misc_col1">Are you willing to accept the minimum initial pay in the grade?</td>
            <td class="print_value"><?php echo $misc['Misc']['willg_min_pay']; ?></td>
        </tr>
        <?php if($misc['Misc']['willg_min_pay'] == "no") { ?>
            <tr>
                <td class="print_headers misc_col1">Reason(s):</td>
                <td class="print_value"><?php echo $misc['Misc']['min_pay_no']; ?></td>
            </tr>
        <?php } ?>
        <tr>
            <td class="print_headers misc_col1">Total number of self-attested documents attached: </td>
            <td class="print_value"><?php echo $misc['Misc']['total_self_att_docs_att']; ?></td>
        </tr>
        <tr>
            <td class="print_headers misc_col1">If selected how would you like to develop your Department/University and your area of interest: </td>
            <td class="print_value"><?php echo $misc['Misc']['develop_department']; ?></td>
        </tr>
    </table>
    <br/>
    <p style="page-break-after:always;"></p>
    <div class="print_headers">Applicant's Name and Address for correspondence</div>
        <table id="address_table" border="1px solid black" style="border-right: 1px solid black; border-collapse: collapse;">
            <tr>
                <td width="20%"></td>
                <td width="20%" class="print_headers">Mailing Address</td>
                <td width="20%" colspan='2' class="print_headers">Permanent Address</td>
            </tr>
            <tr>
                <td class="print_headers">Name & Complete Address with Pincode</td>
                <td class="print_value"><?php echo $applicant['Applicant']['mailing_address']; ?></td>
                <td class="print_value"><?php echo $applicant['Applicant']['perm_address']; ?></td>
            </tr>
            <tr>
                <td colspan="2" class="print_headers">Phone No. (landline)</td>
                <td class="print_headers">Fax. No.</td>
            </tr>
            <tr>
                <td colspan="2" class="print_value"><?php echo $applicant['Applicant']['landline_no']; ?></td>
                <td class="print_value"><?php echo $applicant['Applicant']['fax_no']; ?></td>
            </tr>
        </table>
<br />
<div class="print_required">
    <label>Declaration:</label>
    <input type="checkbox" id="declaration" name="declaration"></input>
</div>
<p>I, hereby declare that all the statements and entries made in this application are 
true, complete and correct to the best of my knowledge and belief. No information has been concealed. In the event of any 
information being found false or incorrect or ineligibility being detected in future 
at any stage, my candidature may be cancelled by the University.
</p>
<div>
    <table>
        <tr>
            <td colspan="3">The hard copy of the completed form with the required enclosures is sent by post.</td>
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
    $('document').ready(function(){
        $('#finalsubmit').prop('disabled', true);

        $('#declaration').change(function(){
            if($(this).is(':checked')) {
                $('#finalsubmit').prop('disabled', false);
            }
            else {
                $('#finalsubmit').prop('disabled',true);
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
