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
</style>
<?php if(!isset($data_set) || (isset($data_set) && $data_set === 'false')) {?>
<div id="top_header" style="text-align: left">
    <?php 
        echo $this->Form->create('Applicant', array('id' => 'Applicant_Details', 'url' => Router::url( null, true )));
        echo $this->Form->input('Applicant.applicant_number', array('label' => 'Enter the applicant ID', 'maxlength' => '500'));
        ?>
        <div class="submit">
        <?php echo $this->Form->submit('Submit', array('div' => false)); ?>

	</div>
        <?php
            echo $this->Form->end();
        ?>
</div>
<?php } ?>
<?php if(isset($data_set) && $data_set === 'true') {?>
<div id="contentContainer" style="width: 650px">
    <p style="font-size: 28px; font-weight: bold; text-align: center">CENTRAL UNIVERSITY OF PUNJAB</p>
    <p style="font-size: 12px; font-weight: bold; text-align: center">(Established vide Act no 25(2009) of Parliament)</p>
    <p style="font-size: 28px; font-weight: bold; text-align: center">Online Application Form for Faculty Position</p>
    <table id="onlineformdata" border="1px solid black" style="border-right: 1px solid black !important;">
        <tr>
            <td width="40%">Advertisement No.</td>
            <td width="40%"><?php echo $applicant['Applicant']['advertisement_no'] ?></td>
            <td width="20%"><img src="<?php if(!empty($image['Image']['filename'])) { echo $this->webroot . '/' . $image['Image']['filename']; } else { echo ""; } ?>" alt="Passport Size Photograph" height="132px" width="132px"></td>
        </tr>
        <tr>
            <td width="40%">Applicant Number</td>
            <td width="40%"><?php echo $applicant['Applicant']['id'] ?></td>
        </tr>
        <tr>
            <td>Details of application fee</td>
            <td><div>DD Number: <?php echo $applicant['Applicant']['appfee_dd_no']?></div>
                <div>Date: <?php echo $applicant['Applicant']['appfee_dd_date']?> </div>
                <div>Amount: <?php echo $applicant['Applicant']['appfee_dd_amt']?> </div>
                <div>Name of the Bank: <?php echo $applicant['Applicant']['appfee_dd_bank']?></div>
                <div>DD issuing branch's name: <?php echo $applicant['Applicant']['appfee_dd_branch']?></div>
            </td>
        </tr>
        <br />
        <tr>
            <td>Name of the post applied for</td>
            <td><div><?php echo $applicant['Applicant']['post_applied_for']?></div></td>
        </tr>
        <tr>
            <td>Name of the Centre / Non-Teaching Post</td>
            <td><div><?php echo $applicant['Applicant']['name_of_centre']?></div></td>
        </tr>
        <tr>
            <td>Area of specialization</td>
            <td><div><?php echo $applicant['Applicant']['specialization']?></div></td>
        </tr>
        <br />
        <tr>
            <td>Name of the Applicant</td>
            <td><div>First Name: <?php echo $applicant['Applicant']['first_name']?></div>
                <div>Middle Name: <?php echo $applicant['Applicant']['middle_name']?></div>
                <div>Last Name: <?php echo $applicant['Applicant']['last_name']?></div>
            </td>
        </tr>
        <tr>
            <td>Date of Birth</td>
            <td><div><?php echo $applicant['Applicant']['date_of_birth']?></div>
            </td>
        </tr>
        <tr>
            <td>Email: </td>
            <td><div><?php echo $applicant['Applicant']['email']?></div>
            </td>
        </tr>
        <tr>
            <td>Mobile No: </td>
            <td><div><?php echo $applicant['Applicant']['mobile_no']?></div>
            </td>
        </tr>
        <tr>
            <td>Father's Name</td>
            <td><div><?php echo $applicant['Applicant']['father_name']?></div>
                <!--<div>Email Name: <?php echo $applicant['Applicant']['father_email']?></div>
                <div>Mobile No: <?php echo $applicant['Applicant']['father_mobile']?></div>-->
            </td>
        </tr>
        <tr>
            <td>Mother's Name</td>
            <td><div><?php echo $applicant['Applicant']['mother_name']?></div>
                <!--<div>Email Name: <?php echo $applicant['Applicant']['mother_email']?></div>
                <div>Mobile No: <?php echo $applicant['Applicant']['mother_mobile']?></div>-->
            </td>
        </tr>
        <tr>
            <td>Marital Status: </td>
            <td><div><?php echo $applicant['Applicant']['marital_status']?></div>
            </td>
        </tr>
        <tr>
            <td>Aadhar No: </td>
            <td><div><?php echo $applicant['Applicant']['aadhar_no']?></div>
            </td>
        </tr>
        <tr>
            <td>Nationality: </td>
            <td><div><?php echo $applicant['Applicant']['nationality']?></div>
            </td>
        </tr>
    </table>
    <br />
    <strong>Education Qualifications</strong>
    <table border="1px solid black" style="border-right: 1px solid black !important;">
        <tr>
            <td width="5%"></td>
            <td width="10%">Course</td>
            <td width="20%">Board / University</td>
            <td width="10%">Month & Year of passing</td>
            <td width="5%">% Marks</td>
            <td width="5%">Marks Obtained</td>
            <td width="5%">Maximum Marks</td>
            <td width="10%">Roll No.</td>
            <td width="20%">Subjects</td>
        </tr>
        <tr>
            <td>10<sup>th</sup> Class/ equivalent</td>
            <td><?php if(isset($education_arr)) echo $education_arr['0']['Education']['course']; else echo "";?></td>
            <td><?php if(isset($education_arr)) echo $education_arr['0']['Education']['board']; else echo "";?></td>
            <td><?php if(isset($education_arr)) echo $education_arr['0']['Education']['year_of_passing']; else echo "";?></td>
            <td><?php if(isset($education_arr)) echo $education_arr['0']['Education']['percentage']; else echo "";?></td>
            <td><?php if(isset($education_arr)) echo $education_arr['0']['Education']['marks_obtained']; else echo "";?></td>
            <td><?php if(isset($education_arr)) echo $education_arr['0']['Education']['max_marks']; else echo "";?></td>
            <td><?php if(isset($education_arr)) echo $education_arr['0']['Education']['roll_no']; else echo "";?></td>
            <td><?php if(isset($education_arr)) echo $education_arr['0']['Education']['subjects']; else echo "";?></td>
        </tr>
        <tr>
            <td>10+2/ equivalent</td>
            <td><?php if(isset($education_arr)) echo $education_arr['1']['Education']['course']; else echo ""; ?></td>
            <td><?php if(isset($education_arr)) echo $education_arr['1']['Education']['board']; else echo ""; ?></td>
            <td><?php if(isset($education_arr)) echo $education_arr['1']['Education']['year_of_passing']; else echo ""; ?></td>
            <td><?php if(isset($education_arr)) echo $education_arr['1']['Education']['percentage']; else echo ""; ?></td>
            <td><?php if(isset($education_arr)) echo $education_arr['1']['Education']['marks_obtained']; else echo ""; ?></td>
            <td><?php if(isset($education_arr)) echo $education_arr['1']['Education']['max_marks']; else echo ""; ?></td>
            <td><?php if(isset($education_arr)) echo $education_arr['1']['Education']['roll_no']; else echo ""; ?></td>
            <td><?php if(isset($education_arr)) echo $education_arr['1']['Education']['subjects']; else echo ""; ?></td>
        </tr>
        <tr>
            <td>Bachelor's Degree</td>
            <td><?php if(isset($education_arr)) echo $education_arr['2']['Education']['course']; else echo ""; ?></td>
            <td><?php if(isset($education_arr)) echo $education_arr['2']['Education']['board']; else echo ""; ?></td>
            <td><?php if(isset($education_arr)) echo $education_arr['2']['Education']['year_of_passing']; else echo ""; ?></td>
            <td><?php if(isset($education_arr)) echo $education_arr['2']['Education']['percentage']; else echo ""; ?></td>
            <td><?php if(isset($education_arr)) echo $education_arr['2']['Education']['marks_obtained']; else echo ""; ?></td>
            <td><?php if(isset($education_arr)) echo $education_arr['2']['Education']['max_marks']; else echo ""; ?></td>
            <td><?php if(isset($education_arr)) echo $education_arr['2']['Education']['roll_no']; else echo ""; ?></td>
            <td><?php if(isset($education_arr)) echo $education_arr['2']['Education']['subjects']; else echo ""; ?></td>
        </tr>
        <tr>
            <td>Master's Degree</td>
            <td><?php if(isset($education_arr)) echo $education_arr['3']['Education']['course']; else echo ""; ?></td>
            <td><?php if(isset($education_arr)) echo $education_arr['3']['Education']['board']; else echo ""; ?></td>
            <td><?php if(isset($education_arr)) echo $education_arr['3']['Education']['year_of_passing']; else echo ""; ?></td>
            <td><?php if(isset($education_arr)) echo $education_arr['3']['Education']['percentage']; else echo ""; ?></td>
            <td><?php if(isset($education_arr)) echo $education_arr['3']['Education']['marks_obtained']; else echo ""; ?></td>
            <td><?php if(isset($education_arr)) echo $education_arr['3']['Education']['max_marks']; else echo ""; ?></td>
            <td><?php if(isset($education_arr)) echo $education_arr['3']['Education']['roll_no']; else echo ""; ?></td>
            <td><?php if(isset($education_arr)) echo $education_arr['3']['Education']['subjects']; else echo ""; ?></td>
        </tr>
        <tr>
            <td>M.Phil. / equivalent</td>
            <td><?php if(isset($education_arr)) echo $education_arr['4']['Education']['course']; else echo ""; ?></td>
            <td><?php if(isset($education_arr)) echo $education_arr['4']['Education']['board']; else echo ""; ?></td>
            <td><?php if(isset($education_arr)) echo $education_arr['4']['Education']['year_of_passing']; else echo ""; ?></td>
            <td><?php if(isset($education_arr)) echo $education_arr['4']['Education']['percentage']; else echo ""; ?></td>
            <td><?php if(isset($education_arr)) echo $education_arr['4']['Education']['marks_obtained']; else echo ""; ?></td>
            <td><?php if(isset($education_arr)) echo $education_arr['4']['Education']['max_marks']; else echo ""; ?></td>
            <td><?php if(isset($education_arr)) echo $education_arr['4']['Education']['roll_no']; else echo ""; ?></td>
            <td><?php if(isset($education_arr)) echo $education_arr['4']['Education']['subjects']; ?></td>
        </tr>
        <tr>
            <td>Ph.D.</td>
            <td><?php if(isset($education_arr)) echo $education_arr['5']['Education']['course']; else echo ""; ?></td>
            <td><?php if(isset($education_arr)) echo $education_arr['5']['Education']['board']; else echo ""; ?></td>
            <td><?php if(isset($education_arr)) echo $education_arr['5']['Education']['year_of_passing']; else echo ""; ?></td>
            <td><?php if(isset($education_arr)) echo $education_arr['5']['Education']['percentage']; else echo ""; ?></td>
            <td><?php if(isset($education_arr)) echo $education_arr['5']['Education']['marks_obtained']; else echo ""; ?></td>
            <td><?php if(isset($education_arr)) echo $education_arr['5']['Education']['max_marks']; else echo ""; ?></td>
            <td><?php if(isset($education_arr)) echo $education_arr['5']['Education']['roll_no']; else echo ""; ?></td>
            <td><?php if(isset($education_arr)) echo $education_arr['5']['Education']['subjects']; else echo ""; ?></td>
        </tr>
        <tr>
            <td>Any Other</td>
            <td><?php if(isset($education_arr)) echo $education_arr['6']['Education']['course']; else echo ""; ?></td>
            <td><?php if(isset($education_arr)) echo $education_arr['6']['Education']['board']; else echo ""; ?></td>
            <td><?php if(isset($education_arr)) echo $education_arr['6']['Education']['year_of_passing']; else echo ""; ?></td>
            <td><?php if(isset($education_arr)) echo $education_arr['6']['Education']['percentage']; else echo ""; ?></td>
            <td><?php if(isset($education_arr)) echo $education_arr['6']['Education']['marks_obtained']; else echo ""; ?></td>
            <td><?php if(isset($education_arr)) echo $education_arr['6']['Education']['max_marks']; else echo ""; ?></td>
            <td><?php if(isset($education_arr)) echo $education_arr['6']['Education']['roll_no']; else echo ""; ?></td>
            <td><?php if(isset($education_arr)) echo $education_arr['6']['Education']['subjects']; else echo ""; ?></td>
        </tr>
        <?php if(isset($education_arr) && count($education_arr) > 7) { ?>
        <tr>
            <td>Any Other</td>
            <td><?php if(isset($education_arr)) echo $education_arr['7']['Education']['course']; else echo ""; ?></td>
            <td><?php if(isset($education_arr)) echo $education_arr['7']['Education']['board']; else echo ""; ?></td>
            <td><?php if(isset($education_arr)) echo $education_arr['7']['Education']['year_of_passing']; else echo ""; ?></td>
            <td><?php if(isset($education_arr)) echo $education_arr['7']['Education']['percentage']; else echo ""; ?></td>
            <td><?php if(isset($education_arr)) echo $education_arr['7']['Education']['marks_obtained']; else echo ""; ?></td>
            <td><?php if(isset($education_arr)) echo $education_arr['7']['Education']['max_marks']; else echo ""; ?></td>
            <td><?php if(isset($education_arr)) echo $education_arr['7']['Education']['roll_no']; else echo ""; ?></td>
            <td><?php if(isset($education_arr)) echo $education_arr['7']['Education']['subjects']; else echo ""; ?></td>
        </tr>
        <tr>
            <td>Any Other</td>
            <td><?php if(isset($education_arr)) echo $education_arr['8']['Education']['course']; else echo ""; ?></td>
            <td><?php if(isset($education_arr)) echo $education_arr['8']['Education']['board']; else echo ""; ?></td>
            <td><?php if(isset($education_arr)) echo $education_arr['8']['Education']['year_of_passing']; else echo ""; ?></td>
            <td><?php if(isset($education_arr)) echo $education_arr['8']['Education']['percentage']; else echo ""; ?></td>
            <td><?php if(isset($education_arr)) echo $education_arr['8']['Education']['marks_obtained']; else echo ""; ?></td>
            <td><?php if(isset($education_arr)) echo $education_arr['8']['Education']['max_marks']; else echo ""; ?></td>
            <td><?php if(isset($education_arr)) echo $education_arr['8']['Education']['roll_no']; else echo ""; ?></td>
            <td><?php if(isset($education_arr)) echo $education_arr['8']['Education']['subjects']; else echo "";?></td>
        </tr>
        <tr>
            <td>Any Other</td>
            <td><?php if(isset($education_arr)) echo $education_arr['9']['Education']['course']; else echo ""; ?></td>
            <td><?php if(isset($education_arr)) echo $education_arr['9']['Education']['board']; else echo ""; ?></td>
            <td><?php if(isset($education_arr)) echo $education_arr['9']['Education']['year_of_passing']; else echo ""; ?></td>
            <td><?php if(isset($education_arr)) echo $education_arr['9']['Education']['percentage']; else echo ""; ?></td>
            <td><?php if(isset($education_arr)) echo $education_arr['9']['Education']['marks_obtained']; else echo ""; ?></td>
            <td><?php if(isset($education_arr)) echo $education_arr['9']['Education']['max_marks']; else echo ""; ?></td>
            <td><?php if(isset($education_arr)) echo $education_arr['9']['Education']['roll_no']; else echo ""; ?></td>
            <td><?php if(isset($education_arr)) echo $education_arr['9']['Education']['subjects']; else echo ""; ?></td>
        </tr>
        <tr>
            <td>Any Other</td>
            <td><?php if(isset($education_arr)) echo $education_arr['10']['Education']['course']; else echo ""; ?></td>
            <td><?php if(isset($education_arr)) echo $education_arr['10']['Education']['board']; else echo ""; ?></td>
            <td><?php if(isset($education_arr)) echo $education_arr['10']['Education']['year_of_passing']; else echo ""; ?></td>
            <td><?php if(isset($education_arr)) echo $education_arr['10']['Education']['percentage']; else echo ""; ?></td>
            <td><?php if(isset($education_arr)) echo $education_arr['10']['Education']['marks_obtained']; else echo ""; ?></td>
            <td><?php if(isset($education_arr)) echo $education_arr['10']['Education']['max_marks']; else echo ""; ?></td>
            <td><?php if(isset($education_arr)) echo $education_arr['10']['Education']['roll_no']; else echo ""; ?></td>
            <td><?php if(isset($education_arr)) echo $education_arr['10']['Education']['subjects']; else echo ""; ?></td>
        </tr>
        <tr>
            <td>Any Other</td>
            <td><?php if(isset($education_arr)) echo $education_arr['11']['Education']['course']; else echo ""; ?></td>
            <td><?php if(isset($education_arr)) echo $education_arr['11']['Education']['board']; else echo ""; ?></td>
            <td><?php if(isset($education_arr)) echo $education_arr['11']['Education']['year_of_passing']; else echo ""; ?></td>
            <td><?php if(isset($education_arr)) echo $education_arr['11']['Education']['percentage']; else echo ""; ?></td>
            <td><?php if(isset($education_arr)) echo $education_arr['11']['Education']['marks_obtained']; else echo ""; ?></td>
            <td><?php if(isset($education_arr)) echo $education_arr['11']['Education']['max_marks']; else echo ""; ?></td>
            <td><?php if(isset($education_arr)) echo $education_arr['11']['Education']['roll_no']; else echo ""; ?></td>
            <td><?php if(isset($education_arr)) echo $education_arr['11']['Education']['subjects']; else echo ""; ?></td>
        </tr>
        <?php } ?>
    </table>
    <br />
    <strong>Experience</strong>
    <table border="1px solid black" style="border-right: 1px solid black !important;">
        <tr>
            <td rowspan="2" width="10%">Designation</td>
            <td rowspan="2" width="10%">Scale of Pay</td>
            <td rowspan="2" width="10%">Name & address of Employer</td>
            <td colspan="3"><div style="text-align: center">Period of Experience</div></td>
            <td rowspan="2" width="20%">Nature Of Work</td>
            <!--<td rowspan="2" width="10%">Sr. No. of Proof Enclosed</td>-->
        </tr>
        <tr>
            <td width="10%">From Date</td>
            <td width="10%">To Date</td>
            <td width="10%">No. of Years/Months(as on date of advertisement)</td>
        </tr>
        <?php
            if(isset($exp_arr)) {
                foreach($exp_arr as $key => $value){
                    echo "<tr>";
                    echo "<td>" . $exp_arr[$key]['Experience']['designation'] . "</td>";
                    echo "<td>" . $exp_arr[$key]['Experience']['scale_of_pay'] . "</td>";
                    echo "<td>" . $exp_arr[$key]['Experience']['name_add'] . "</td>";
                    echo "<td>" . $exp_arr[$key]['Experience']['from_date'] . "</td>";
                    echo "<td>" . $exp_arr[$key]['Experience']['to_date'] . "</td>";
                    echo "<td>" . $exp_arr[$key]['Experience']['no_of_yrs_mnths'] . "</td>";
                    echo "<td>" . $exp_arr[$key]['Experience']['nature_of_work'] . "</td>";
                    //echo "<td>" . $exp_arr[$key]['Experience']['sr_of_proof'] . "</td>";
                    echo "</tr>";
                }
            }
            else {
                    echo "<tr>";
                    echo "<td></td>";
                    echo "<td></td>";
                    echo "<td></td>";
                    echo "<td></td>";
                    echo "<td></td>";
                    echo "<td></td>";
                    echo "<td></td>";
                    //echo "<td>" . $exp_arr[$key]['Experience']['sr_of_proof'] . "</td>";
                    echo "</tr>";
            }
        ?>
        <tr>
            <td colspan="1">Total period of experience</td>
            <td>Years</td>
            <td><?php if(isset($misc)) echo $misc['Misc']['tot_exp_years']; else echo ""; ?></td>
            <td>Months</td>
            <td><?php if(isset($misc)) echo $misc['Misc']['tot_exp_mnths']; else echo ""; ?></td>
            <td>Days</td>
            <td><?php if(isset($misc)) echo $misc['Misc']['tot_exp_days']; else echo ""; ?></td>
        </tr>
    </table>
    <table id="exp_table" border="1px solid black" style="border-right: 1px solid black !important;">
        <tr>
            <td width="50%">Teaching</td>
            <td width="25%">No. of Years</td>
            <td width="25%">No. of Months</td>
            <!--<td width="20%">Sr. no. of proof enclosed</td>-->
        </tr>
        <tr>
            <td>i) Under-graduate level</td>
            <td><?php if(isset($miscexp)) echo $miscexp['Miscexp']['ug_no_yrs']; else echo ""; ?></td>
            <td><?php if(isset($miscexp)) echo $miscexp['Miscexp']['ug_no_mnths']; else echo ""; ?></td>
            <!--<td><?php echo $miscexp['Miscexp']['ug_sr_proof']; ?></td>-->
        </tr>
        <tr>
            <td>ii) Post-graduate level</td>
            <td><?php if(isset($miscexp)) echo $miscexp['Miscexp']['pg_no_yrs']; else echo ""; ?></td>
            <td><?php if(isset($miscexp)) echo $miscexp['Miscexp']['pg_no_mnths']; else echo ""; ?></td>
            <!--<td><?php echo $miscexp['Miscexp']['pg_sr_proof']; ?></td>-->
        </tr>
        <tr>
            <td>iii) Post-doctoral experience</td>
            <td><?php if(isset($miscexp)) echo $miscexp['Miscexp']['pd_no_yrs']; else echo ""; ?></td>
            <td><?php if(isset($miscexp)) echo $miscexp['Miscexp']['pd_no_mnths']; else echo ""; ?></td>
            <!--<td><?php echo $miscexp['Miscexp']['pd_sr_proof']; ?></td>-->
        </tr>
        <tr>
            <td>iv) Other experience, if any</td>
            <td><?php if(isset($miscexp)) echo $miscexp['Miscexp']['ot_no_yrs']; else echo ""; ?></td>
            <td><?php if(isset($miscexp)) echo $miscexp['Miscexp']['ot_no_mnths']; else echo ""; ?></td>
            <!--<td><?php echo $miscexp['Miscexp']['ot_sr_proof']; ?></td>-->
        </tr>
        <tr>
            <td>Total Experience</td>
            <td><?php if(isset($miscexp)) echo $miscexp['Miscexp']['tot_no_yrs']; else echo ""; ?></td>
            <td><?php if(isset($miscexp)) echo $miscexp['Miscexp']['tot_no_mnths']; else echo ""; ?></td>
            <!--<td></td>-->
        </tr>
    </table>
    <br />
    <strong>Details of Post doctoral experience</strong>
    <table id="postdoc_exp_table" border="1px solid black" style="border-right: 1px solid black !important;">
        <tr>
            <td width="25%">Agency</td>
            <td width="35%">Host Institute</td>
            <td width="10%">From date</td>
            <td width="10%">To date</td>
            <td width="20%">Duration</td>
            <!--<td width="15%">Sr. No. of proof enclosed</td>-->
        </tr>
        <tr>
            <td><?php if(isset($miscexp)) echo $miscexp['Miscexp']['pdd_agency1']; else echo ""; ?></td>
            <td><?php if(isset($miscexp)) echo $miscexp['Miscexp']['pdd_institute1']; else echo ""; ?></td>
            <td><?php if(isset($miscexp)) echo $miscexp['Miscexp']['pdd_from_date1']; else echo ""; ?></td>
            <td><?php if(isset($miscexp)) echo $miscexp['Miscexp']['pdd_to_date1']; else echo ""; ?></td>
            <td><?php if(isset($miscexp)) echo $miscexp['Miscexp']['pdd_duration1']; else echo ""; ?></td>
            <!--<td><?php echo $miscexp['Miscexp']['pdd_sr_proof1']; ?></td>-->
        </tr>
        <tr>
            <td><?php if(isset($miscexp)) echo $miscexp['Miscexp']['pdd_agency2']; else echo ""; ?></td>
            <td><?php if(isset($miscexp)) echo $miscexp['Miscexp']['pdd_institute2']; else echo ""; ?></td>
            <td><?php if(isset($miscexp)) echo $miscexp['Miscexp']['pdd_from_date2']; else echo ""; ?></td>
            <td><?php if(isset($miscexp)) echo $miscexp['Miscexp']['pdd_to_date2']; else echo ""; ?></td>
            <td><?php if(isset($miscexp)) echo $miscexp['Miscexp']['pdd_duration2']; else echo ""; ?></td>
            <!--<td><?php echo $miscexp['Miscexp']['pdd_sr_proof2']; ?></td>-->
        </tr>
        <tr>
            <td><?php if(isset($miscexp)) echo $miscexp['Miscexp']['pdd_agency3']; else echo ""; ?></td>
            <td><?php if(isset($miscexp)) echo $miscexp['Miscexp']['pdd_institute3']; else echo ""; ?></td>
            <td><?php if(isset($miscexp)) echo $miscexp['Miscexp']['pdd_from_date3']; else echo ""; ?></td>
            <td><?php if(isset($miscexp)) echo $miscexp['Miscexp']['pdd_to_date3']; else echo ""; ?></td>
            <td><?php if(isset($miscexp)) echo $miscexp['Miscexp']['pdd_duration3']; else echo ""; ?></td>
            <!--<td><?php echo $miscexp['Miscexp']['pdd_sr_proof3']; ?></td>-->
        </tr>
        <tr>
            <td><?php if(isset($miscexp)) echo $miscexp['Miscexp']['pdd_agency4']; else echo ""; ?></td>
            <td><?php if(isset($miscexp)) echo $miscexp['Miscexp']['pdd_institute4']; else echo ""; ?></td>
            <td><?php if(isset($miscexp)) echo $miscexp['Miscexp']['pdd_from_date4']; else echo ""; ?></td>
            <td><?php if(isset($miscexp)) echo $miscexp['Miscexp']['pdd_to_date4']; else echo ""; ?></td>
            <td><?php if(isset($miscexp)) echo $miscexp['Miscexp']['pdd_duration4']; else echo ""; ?></td>
            <!--<td><?php echo $miscexp['Miscexp']['pdd_sr_proof4']; ?></td>-->
        </tr>
    </table>
    <br />
    <strong>Academic Distinctions</strong>
    <table border="1px solid black" style="border-right: 1px solid black !important;">
        <tr>
            <td width="50%">Name of Academic Course/Body</td>
            <td width="50%">Academic Distinction obtained</td>
            <!--<td width="20%">Sr. No. of proof Enclosed</td>-->
        </tr>
        <?php
            if(isset($academic_dist)) {
                foreach($academic_dist as $key => $value){
                    echo "<tr>";
                    echo "<td>" . $academic_dist[$key]['Academic_dist']['academic_course'] . "</td>";
                    echo "<td>" . $academic_dist[$key]['Academic_dist']['academic_dist'] . "</td>";
                    //echo "<td>" . $academic_dist[$key]['Academic_dist']['sr_of_proof'] . "</td>";
                    echo "</tr>";
                }
            }
            else {
                    echo "<tr>";
                    echo "<td></td>";
                    echo "<td></td>";
                    //echo "<td></td>";
                    echo "</tr>";
            }
        ?>
    </table>
    <br />
    <strong>Research Papers in SCI Journals</strong>
    <table id="ResearchpaperSCI_table" border="2px solid black" style="border-right: 2px solid black !important;">
        <tr>
            <td width="5%">S. No.</td>
            <td width="20%">Authors</td>
            <td width="20%">Title of the Paper</td>
            <td width="20%">Journal's Name & Place of Publication</td>
            <td width="20%">Publication & ISSN</td>
            <td width="10%">Vol./Page No/Year</td>
            <td width="10%">Impact Factor</td>
        </tr>
        <?php
            if(isset($researchpapers)) {
                $i = 1;
                foreach($researchpapers as $key => $value){
                    if($researchpapers[$key]['Researchpaper']['type'] === 'sci_journals'){
                        echo "<tr>";
                        echo "<td>" . $i++ . "</td>";
                        echo "<td>" . $researchpapers[$key]['Researchpaper']['author'] . "</td>";
                        echo "<td>" . $researchpapers[$key]['Researchpaper']['title_of_paper'] . "</td>";
                        echo "<td>" . $researchpapers[$key]['Researchpaper']['journal_name_place'] . "</td>";
                        echo "<td>" . $researchpapers[$key]['Researchpaper']['publication_issn'] . "</td>";
                        echo "<td>" . $researchpapers[$key]['Researchpaper']['vol_pageno_year'] . "</td>";
                        echo "<td>" . $researchpapers[$key]['Researchpaper']['impact_factor'] . "</td>";
                        echo "</tr>";
                    }
                }
            }
            else {
                        echo "<tr>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "</tr>";
            }   
        ?>
    </table>
    <br />
    <strong>Research Papers in Non-SCI Journals</strong>
    <table id="ResearchpaperNonSCI_table" border="2px solid black" style="border-right: 2px solid black !important;">
        <tr>
            <td width="5%">S. No.</td>
            <td width="20%">Authors</td>
            <td width="20%">Title of the Paper</td>
            <td width="20%">Journal's Name & Place of Publication</td>
            <td width="20%">Publication & ISSN</td>
            <td width="10%">Vol./Page No/Year</td>
            <td width="10%">Impact Factor</td>
        </tr>
        <?php
            if(isset($researchpapers)) {
                $i = 1;
                foreach($researchpapers as $key => $value){
                    if($researchpapers[$key]['Researchpaper']['type'] === 'non_sci_journals'){
                        echo "<tr>";
                        echo "<td>" . $i++ . "</td>";
                        echo "<td>" . $researchpapers[$key]['Researchpaper']['author'] . "</td>";
                        echo "<td>" . $researchpapers[$key]['Researchpaper']['title_of_paper'] . "</td>";
                        echo "<td>" . $researchpapers[$key]['Researchpaper']['journal_name_place'] . "</td>";
                        echo "<td>" . $researchpapers[$key]['Researchpaper']['publication_issn'] . "</td>";
                        echo "<td>" . $researchpapers[$key]['Researchpaper']['vol_pageno_year'] . "</td>";
                        echo "<td>" . $researchpapers[$key]['Researchpaper']['impact_factor'] . "</td>";
                        echo "</tr>";
                    }
                }
            }
            else {
                echo "<tr>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "</tr>";
            }
        ?>
    </table>
    <br/>
    <strong>Research Articles in Books</strong>
    <table id="ResearchArticlesBooks_table" border="1px solid black" style="border-right: 1px solid black !important;">
        <tr>
            <td width="5%">S. No.</td>
            <td width="20%">Authors</td>
            <td width="20%">Title of the Book</td>
            <td width="20%">Title of the Article</td>
            <td width="10%">Place of Publication</td>
            <td width="20%">Publisher & ISBN</td>
            <td width="10%">Page No.</td>
        </tr>
        <?php
            if(isset($researcharticles)) {
                $i = 1;
                foreach($researcharticles as $key => $value){
                    if($researcharticles[$key]['Researcharticle']['type'] === 'books'){
                        echo "<tr>";
                        echo "<td>" . $i++ . "</td>";
                        echo "<td>" . $researcharticles[$key]['Researcharticle']['author'] . "</td>";
                        echo "<td>" . $researcharticles[$key]['Researcharticle']['title_of_book'] . "</td>";
                        echo "<td>" . $researcharticles[$key]['Researcharticle']['title_of_article'] . "</td>";
                        echo "<td>" . $researcharticles[$key]['Researcharticle']['place_of_publication'] . "</td>";
                        echo "<td>" . $researcharticles[$key]['Researcharticle']['publisher_isbn'] . "</td>";
                        echo "<td>" . $researcharticles[$key]['Researcharticle']['page_no'] . "</td>";
                        echo "</tr>";
                    }
                }
            }
            else {
                echo "<tr>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "</tr>";
            }
        ?>
    </table>
    <br/>
    <strong>Review Articles</strong>
    <table id="ResearchArticlesReview_table" border="1px solid black" style="border-right: 1px solid black !important;">
        <tr>
            <td width="5%">S. No.</td>
            <td width="20%">Authors</td>
            <td width="20%">Title of the Book</td>
            <td width="20%">Title of the Article</td>
            <td width="10%">Place of Publication</td>
            <td width="20%">Publisher & ISBN</td>
            <td width="10%">Page No.</td>
        </tr>
        <?php
            if(isset($researcharticles)) {
                $i = 1;
                foreach($researcharticles as $key => $value){
                    if($researcharticles[$key]['Researcharticle']['type'] === 'review'){
                        echo "<tr>";
                        echo "<td>" . $i++ . "</td>";
                        echo "<td>" . $researcharticles[$key]['Researcharticle']['author'] . "</td>";
                        echo "<td>" . $researcharticles[$key]['Researcharticle']['title_of_book'] . "</td>";
                        echo "<td>" . $researcharticles[$key]['Researcharticle']['title_of_article'] . "</td>";
                        echo "<td>" . $researcharticles[$key]['Researcharticle']['place_of_publication'] . "</td>";
                        echo "<td>" . $researcharticles[$key]['Researcharticle']['publisher_isbn'] . "</td>";
                        echo "<td>" . $researcharticles[$key]['Researcharticle']['page_no'] . "</td>";
                        echo "</tr>";
                    }
                }
            }
            else {
                echo "<tr>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "</tr>";
            }
        ?>
    </table>
    <table border="1px solid black" style="border-right: 1px solid black !important;">
        <tr>
            <td>Total Impact Factor as per SCI/SCOPUS</td>
            <td><?php if(isset($misc)) echo $misc['Misc']['tot_imp_fac_sci']; else echo ""; ?></td>
        </tr>
        <tr>
            <td>Total Impact Factor as per Google Search</td>
            <td><?php if(isset($misc)) echo $misc['Misc']['tot_imp_fac_google']; else echo "";?></td>
        </tr>
        <tr>
            <td>h-Index Factor as per SCOPUS</td>
            <td><?php if(isset($misc)) echo $misc['Misc']['h_index_scopus']; else echo "";?></td>
        </tr>
        <tr>
            <td>h-Index Factor as per Google search</td>
            <td><?php if(isset($misc)) echo $misc['Misc']['h_index_google']; else echo "";?></td>
        </tr>
        <tr>
            <td>i-10 Index Factor as per Google</td>
            <td><?php if(isset($misc)) echo $misc['Misc']['i10_index_google']; else echo "";?></td>
        </tr>
    </table>
    <table id="sematt_table" border="1px solid black" style="border-right: 1px solid black !important;">
        <tr>
            <td width="60%">Seminars/ Conferences/ Workshops/ Training programmes, attended.</td>
            <td width="15%">National (No.)</td>
            <td width="15%">International (No.)</td>
            <td width="10%">Total (No.)</td>
            <!--<td width="10%">S.No. of proof enclosed (No.)</td>-->
        </tr>
        <tr>
            <td><?php if(isset($misc)) echo $misc['Misc']['seminar_attended']; else echo ""; ?></td>
            <td><?php if(isset($misc)) echo $misc['Misc']['sematt_national']; else echo ""; ?></td>
            <td><?php if(isset($misc)) echo $misc['Misc']['sematt_international']; else echo ""; ?></td>
            <td><?php if(isset($misc)) echo $misc['Misc']['sematt_total']; else echo ""; ?></td>
            <!--<td><?php echo $misc['Misc']['sematt_sr_proof']; ?></td>-->
        </tr>
    </table>
    <br />
    <table id="semorg_table" border="1px solid black" style="border-right: 1px solid black !important;">
        <tr>
            <td width="60%">Seminars/ Conferences/ Workshops/ Training programmes, organized.</td>
            <td width="15%">National (No.)</td>
            <td width="15%">International (No.)</td>
            <td width="10%">Total (No.)</td>
            <!--<td width="10%">S.No. of proof enclosed (No.)</td>-->
        </tr>
        <tr>
            <td><?php if(isset($misc)) echo $misc['Misc']['seminar_organized']; else echo ""; ?></td>
            <td><?php if(isset($misc)) echo $misc['Misc']['semorg_national']; else echo ""; ?></td>
            <td><?php if(isset($misc)) echo $misc['Misc']['semorg_international']; else echo ""; ?></td>
            <td><?php if(isset($misc)) echo $misc['Misc']['semorg_total']; else echo ""; ?></td>
            <!--<td><?php echo $misc['Misc']['semorg_sr_proof']; ?></td>-->
        </tr>
    </table>
    <br />
    <strong>Research Projects (only externally funded)</strong>
    <table id="resproj_table" border="2px solid black" style="border-right: 2px solid black !important;">
        <tr>
            <td width="50%">Title of projects completed or ongoing</td>
            <td width="25%">Funding Agency</td>
            <td width="15%">As PI/CO-PI or Investigator</td>
            <td width="10%">Amount of grant and duration</td>
        </tr>
        <tr>
            <td><?php if(isset($misc)) echo $misc['Misc']['proj_comp_or_ongng1']; else echo ""; ?></td>
            <td><?php if(isset($misc)) echo $misc['Misc']['funding_agency1']; else echo ""; ?></td>
            <td><?php if(isset($misc)) echo $misc['Misc']['pi_or_copi1']; else echo ""; ?></td>
            <td><?php if(isset($misc)) echo $misc['Misc']['amt_of_grant1']; else echo ""; ?></td>
        </tr>
        <tr>
            <td><?php if(isset($misc)) echo $misc['Misc']['proj_comp_or_ongng2']; else echo ""; ?></td>
            <td><?php if(isset($misc)) echo $misc['Misc']['funding_agency2']; else echo ""; ?></td>
            <td><?php if(isset($misc)) echo $misc['Misc']['pi_or_copi2']; else echo ""; ?></td>
            <td><?php if(isset($misc)) echo $misc['Misc']['amt_of_grant2']; else echo ""; ?></td>
        </tr>
        <tr>
            <td><?php if(isset($misc)) echo $misc['Misc']['proj_comp_or_ongng3']; else echo ""; ?></td>
            <td><?php if(isset($misc)) echo $misc['Misc']['funding_agency3']; else echo ""; ?></td>
            <td><?php if(isset($misc)) echo $misc['Misc']['pi_or_copi3']; else echo ""; ?></td>
            <td><?php if(isset($misc)) echo $misc['Misc']['amt_of_grant3']; else echo ""; ?></td>
        </tr>
        <tr>
            <td><?php if(isset($misc)) echo $misc['Misc']['proj_comp_or_ongng4']; else echo ""; ?></td>
            <td><?php if(isset($misc)) echo $misc['Misc']['funding_agency4']; else echo ""; ?></td>
            <td><?php if(isset($misc)) echo $misc['Misc']['pi_or_copi4']; else echo ""; ?></td>
            <td><?php if(isset($misc)) echo $misc['Misc']['amt_of_grant4']; else echo ""; ?></td>
        </tr>
    </table>
    <br />
    <strong>Research Guidance (No. of students guided)</strong>
    <table id="resguid_table" border="1px solid black" style="border-right: 1px solid black !important;">
        <tr>
            <td width="60%"></td>
            <td width="20%">M.Phil. / Equivalent (No.)</td>
            <td width="20%">Ph.D. (No.)</td>
            <!--<td width="15%">Sr. no. of proof enclosed</td>-->
        </tr>
        <tr>
            <td>Completed</td>
            <td><?php if(isset($misc)) echo $misc['Misc']['rg_comp_mphil']; else echo ""; ?></td>
            <td><?php if(isset($misc)) echo $misc['Misc']['rg_comp_phd']; else echo ""; ?></td>
            <!--<td><?php echo $misc['Misc']['rg_comp_sr_proof']; ?></td>-->
        </tr>
        <tr>
            <td>Under supervision</td>
            <td><?php if(isset($misc)) echo $misc['Misc']['rg_undsup_mphil']; else echo ""; ?></td>
            <td><?php if(isset($misc)) echo $misc['Misc']['rg_undsup_phd']; else echo ""; ?></td>
            <!--<td><?php echo $misc['Misc']['rg_undsup_sr_proof']; ?></td>-->
        </tr>
    </table>
    <br />
    <strong>Peer Recognitions</strong>
    <table id="peer_table" border="1px solid black" style="border-right: 1px solid black !important;">
        <tr>
            <td width="40%">Award/Honours</td>
            <td width="40%">Agency</td>
            <td width="20%">Year</td>
            <!--<td width="15%">Sr. No. of proof enclosed</td>-->
        </tr>
        <tr>
            <td><?php if(isset($misc)) echo $misc['Misc']['preco_award1']; else echo ""; ?></td>
            <td><?php if(isset($misc)) echo $misc['Misc']['preco_agency1']; else echo ""; ?></td>
            <td><?php if(isset($misc)) echo $misc['Misc']['preco_year1']; else echo ""; ?></td>
            <!--<td><?php echo $misc['Misc']['preco_sr_proof1']; ?></td>-->
        </tr>
        <tr>
            <td><?php if(isset($misc)) echo $misc['Misc']['preco_award2']; else echo ""; ?></td>
            <td><?php if(isset($misc)) echo $misc['Misc']['preco_agency2']; else echo ""; ?></td>
            <td><?php if(isset($misc)) echo $misc['Misc']['preco_year2']; else echo ""; ?></td>
            <!--<td><?php echo $misc['Misc']['preco_sr_proof2']; ?></td>-->
        </tr>
    </table>
    <br />
    <div><strong>Referees</strong></div>
    <table id="referee_table" border="1px solid black" style="border-right: 1px solid black !important;">
        <tr>
            <td width="25%"></td>
            <td width="25%">Referee-1</td>
            <td width="25%">Referee-2</td>
            <td width="25%">Referee-3</td>    
        </tr>
        <tr>
            <td>Name & complete postal addresses</td>
            <td><?php if(isset($misc)) echo $misc['Misc']['ref_add1']; else echo ""; ?></td>
            <td><?php if(isset($misc)) echo $misc['Misc']['ref_add2']; else echo ""; ?></td>
            <td><?php if(isset($misc)) echo $misc['Misc']['ref_add3']; else echo ""; ?></td>
        </tr>
        <tr>
            <td>Email:</td>
            <td><?php if(isset($misc)) echo $misc['Misc']['ref_email1']; else echo ""; ?></td>
            <td><?php if(isset($misc)) echo $misc['Misc']['ref_email2']; else echo ""; ?></td>
            <td><?php if(isset($misc)) echo $misc['Misc']['ref_email3']; else echo ""; ?></td>
        </tr>
        <tr>
            <td>Phone (Landline) with STD Code:</td>
            <td><?php if(isset($misc)) echo $misc['Misc']['ref_landline1']; else echo ""; ?></td>
            <td><?php if(isset($misc)) echo $misc['Misc']['ref_landline2']; else echo ""; ?></td>
            <td><?php if(isset($misc)) echo $misc['Misc']['ref_landline3']; else echo ""; ?></td>
        </tr>
        <tr>
            <td>Mobile Ph:</td>
            <td><?php if(isset($misc)) echo $misc['Misc']['ref_mobile1']; else echo ""; ?></td>
            <td><?php if(isset($misc)) echo $misc['Misc']['ref_mobile2']; else echo ""; ?></td>
            <td><?php if(isset($misc)) echo $misc['Misc']['ref_mobile3']; else echo ""; ?></td>
        </tr>
        <tr>
            <td>Fax:</td>
            <td><?php if(isset($misc)) echo $misc['Misc']['ref_fax1']; else echo ""; ?></td>
            <td><?php if(isset($misc)) echo $misc['Misc']['ref_fax2']; else echo ""; ?></td>
            <td><?php if(isset($misc)) echo $misc['Misc']['ref_fax3']; else echo ""; ?></td>
        </tr>
    </table>
    <br />
    <div><strong>Present Position</strong></div>
    <table id="present_position_table" border="1px solid black" style="border-right: 1px solid black !important;">
        <tr>
            <td width="10%">Designation</td>
            <td width="30%">Name of the University / Institution</td>
            <td width="15%">Basic Pay(Rs.)</td>
            <td width="15%">Pay Scale(Rs.)</td>
            <td width="10%">Gross Pay / Total Salary p.m. (Rs.)</td>
            <td width="10%">Increment date (Date/Month)</td>
            <!--<td width="10%">Sr. no. of proof enclosed</td>-->
        </tr>
        <tr>
            <td><?php if(isset($misc)) echo $misc['Misc']['presentp_desig']; else echo ""; ?></td>
            <td><?php if(isset($misc)) echo $misc['Misc']['presentp_nameuniv']; else echo ""; ?></td>
            <td><?php if(isset($misc)) echo $misc['Misc']['presentp_basic_pay']; else echo ""; ?></td>
            <td><?php if(isset($misc)) echo $misc['Misc']['presentp_pay_scale']; else echo ""; ?></td>
            <td><?php if(isset($misc)) echo $misc['Misc']['presentp_gross_salary']; else echo ""; ?></td>
            <td><?php if(isset($misc)) echo $misc['Misc']['presentp_increment_date']; else echo ""; ?></td>
            <!--<td><?php echo $misc['Misc']['presentp_sr_proof']; ?></td>-->
        </tr>
    </table>
    <table border="1px solid black" style="border-right: 1px solid black !important;">
        <tr>
            <td>Time required for joining if selected:</td>
            <td><?php if(isset($misc)) echo $misc['Misc']['time_req_for_joining']; else echo ""; ?></td>
        </tr>
        <tr>
            <td>Any Other Information/qualification relevant to the post applied for:</td>
            <td><?php if(isset($misc)) echo $misc['Misc']['any_other_info']; else echo ""; ?></td>
        </tr>
        <tr>
            <td>Whether willing to join as temporary/ contract/ Guest faculty (if not selected against regular vacancy):</td>
            <td><?php if(isset($misc)) echo $misc['Misc']['willing_for_temp']; else echo ""; ?></td>
        </tr>
    </table>
    <br/>
        <strong>Applicant's Name and Address for correspondence</strong>
        <table id="address_table" border="1px solid black" style="border-right: 1px solid black !important;">
            <tr>
                <td width="20%"></td>
                <td width="20%">Mailing Address</td>
                <td width="20%" colspan='2'>Permanent Address</td>
            </tr>
            <tr>
                <td>Name & Complete Address with Pincode</td>
                <td><?php echo $applicant['Applicant']['mailing_address']; ?></td>
                <td><?php echo $applicant['Applicant']['perm_address']; ?></td>
            </tr>
            <tr>
                <td colspan="2">Phone No. (landline)</td>
                <td>Fax. No.</td>
            </tr>
            <tr>
                <td colspan="2"><?php echo $applicant['Applicant']['landline_no']; ?></td>
                <td><?php echo $applicant['Applicant']['fax_no']; ?></td>
            </tr>
        </table>
<input type="button" onclick="window.print()" value="Print" style="width: 100px;"/>
</div>
<?php } ?>