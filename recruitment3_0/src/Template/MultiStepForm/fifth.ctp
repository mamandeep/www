<style>
    .misc_col1 {
        width: 45%;
    }
    #miscellaneous_table div {
        clear: none;
    }
    
    .radio_container {
        position: relative;
        display: inline-block;
    }
    
    .left_radio_column {
        float: left;
        width: 50px;
    }
    
    .right_radio_column {
        float: left;
        width: 50px;
    }
    
</style>
<?php echo $this->element('nav-top');
//debug($this->request->data);
echo $this->Html->script('peerrecognition');
echo $this->Form->create('Applicant', array('id' => 'Misc_Details', 'url' => Router::url( null, true ))); ?>
<input type="hidden" name="modified_peers" id="modified_peers" value="false" />
<input type="hidden" name="glob_userId" id="glob_userId" value="<?php echo $this->Session->read('applicant_id'); ?>" />
<div class="main_content_header">5.  Peer Recognition</div>
<?php
        echo $this->Form->input('Applicantext.peer_recognition_yn', array(
                        'options' => array('yes' => 'Yes',
                                           'no' => 'No'),
                        'empty' => '-Select-',
                        'label' => 'Whether you have received Peer Recognition/Awards e.t.c.?',
                        'id' => 'peer_recognition_yn_select'
                    ));  ?>
<fieldset>
    <table id="grade-table">
        <thead>
            <tr>
                <th>Award/honours</th>
                <th>Agency</th>
                <th>Year</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                if (is_array($this->request->data['Peerrecognition'])) {
                    for ($key = 0; $key < count($this->request->data['Peerrecognition']); $key++) {
                        echo $this->element('peerrecognition', array('key' => $key));
                    }
                }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3"></td>
                <td class="actions">
                    <a href="#" class="add">Add Row</a>
                </td>
            </tr>
        </tfoot>
    </table>
</fieldset>
<script id="grade-template" type="text/x-underscore-template">
    <?php echo $this->element('peerrecognition');?>
</script>
<br/>
<div class="main_content_header">6. Referees: prefer to include present Employer/Guide and/or former Employer</div>
<div id="contentContainer">
    <div class="table_headertxt">Names and complete postal addresses of 3 referees: </div>
    <table id="referee_table" border="2px solid black" style="border-collapse: collapse; border-right: 2px solid black !important;">
        <tr>
            <td width="25%"></td>
            <td width="25%"><?php echo $this->Form->label('Referee1', 'Referee-1'); ?></td>
            <td width="25%"><?php echo $this->Form->label('Referee2', 'Referee-2'); ?></td>
            <td width="25%"><?php echo $this->Form->label('Referee3', 'Referee-3'); ?></td>    
        </tr>
        <tr>
            <td>Name & complete postal addresses</td>
            <td style="padding: 5px;"><?php echo $this->Form->input('Applicant.id', array('type', 'hidden'));
                      //echo $this->Form->input('Applicant.user_id', array('type' => 'hidden', 'value' => $this->Session->read('applicant_id')));
                      echo $this->Form->input('Applicantext.ref_add1', array('type' => 'textarea',  'div' => false, 'style' => 'width: 96%; overflow-y: scroll; height: 60px;', 'label' => false, 'maxlength' => '500')); ?></td>
            <td style="padding: 5px;"><?php echo $this->Form->input('Applicantext.ref_add2', array('type' => 'textarea',  'div' => false, 'style' => 'width: 96%; overflow-y: scroll; height: 60px;', 'label' => false, 'maxlength' => '500')); ?></td>
            <td style="padding: 5px;"><?php echo $this->Form->input('Applicantext.ref_add3', array('type' => 'textarea',  'div' => false, 'style' => 'width: 96%; overflow-y: scroll; height: 60px;', 'label' => false, 'maxlength' => '500')); ?></td>
        </tr>
        <tr>
            <td>Email:</td>
            <td><?php echo $this->Form->input('Applicant.ref_email1', array('label' => false, 'maxlength' => '50')); ?></td>
            <td><?php echo $this->Form->input('Applicant.ref_email2', array('label' => false, 'maxlength' => '50')); ?></td>
            <td><?php echo $this->Form->input('Applicant.ref_email3', array('label' => false, 'maxlength' => '50')); ?></td>
        </tr>
        <tr>
            <td>Phone (Landline) with STD Code:</td>
            <td><?php echo $this->Form->input('Applicant.ref_landline1', array('label' => false, 'maxlength' => '20')); ?></td>
            <td><?php echo $this->Form->input('Applicant.ref_landline2', array('label' => false, 'maxlength' => '20')); ?></td>
            <td><?php echo $this->Form->input('Applicant.ref_landline3', array('label' => false, 'maxlength' => '20')); ?></td>
        </tr>
        <tr>
            <td>Mobile Ph:</td>
            <td><?php echo $this->Form->input('Applicant.ref_mobile1', array('label' => false, 'maxlength' => '10')); ?></td>
            <td><?php echo $this->Form->input('Applicant.ref_mobile2', array('label' => false, 'maxlength' => '10')); ?></td>
            <td><?php echo $this->Form->input('Applicant.ref_mobile3', array('label' => false, 'maxlength' => '10')); ?></td>
        </tr>
        <tr>
            <td>Fax:</td>
            <td><?php echo $this->Form->input('Applicant.ref_fax1', array('label' => false, 'maxlength' => '20')); ?></td>
            <td><?php echo $this->Form->input('Applicant.ref_fax2', array('label' => false, 'maxlength' => '20')); ?></td>
            <td><?php echo $this->Form->input('Applicant.ref_fax3', array('label' => false, 'maxlength' => '20')); ?></td>
        </tr>
    </table>
    <div>Prefereably a recommendation letter from referee (s) from present Employer (in case working)/Guide and /or former (if left the job and not working at present) Employer may be sent along with Application form</div>
    <br />  
    <div class="main_content_header">7. Present Position</div>
    <?php
        echo $this->Form->input('Applicantext.working_at_present', array(
                        'options' => array('yes' => 'Yes',
                                           'no' => 'No'),
                        'empty' => '-Select-',
                        'label' => 'Whether you are working at present?',
                        'id' => 'working_at_present_select'
                    ));  ?>
    <table id="present_position_table" border="2px solid black" style="border-collapse: collapse; border-right: 2px solid black !important;">
        <tr>
            <td width="10%"><?php echo $this->Form->label('Designation', 'Designation'); ?></td>
            <td width="30%"><?php echo $this->Form->label('NameoftheUniversityInstitution', 'Name of the University/Institution'); ?></td>
            <td width="15%"><?php echo $this->Form->label('BasicPay', 'Basic Pay(Rs.)'); ?></td>
            <td width="20%"><?php echo $this->Form->label('PayScale', 'Grade Pay(Rs.)'); ?></td>
            <td width="15%"><?php echo $this->Form->label('GrossPay', 'Gross Pay/Total Salary p.m. (Rs.)'); ?></td>
            <td width="10%"><?php echo $this->Form->label('IncrementDate', 'Increment Month & Year'); ?></td>
            <!--<td width="10%"><?php echo $this->Form->label('SrNoOfProof', 'Sr. no. of proof enclosed'); ?></td>-->
        </tr>
        <tr>
            <td><?php echo $this->Form->input('Applicant.presentp_desig', array('label' => false, 'maxlength' => '50')); ?></td>
            <td><?php echo $this->Form->input('Applicant.presentp_nameuniv', array('label' => false, 'maxlength' => '100')); ?></td>
            <td><?php echo $this->Form->input('Applicant.presentp_basic_pay', array('label' => false, 'maxlength' => '20')); ?></td>
            <td><?php echo $this->Form->input('Applicant.presentp_pay_scale', array('label' => false, 'maxlength' => '50')); ?></td>
            <td><?php echo $this->Form->input('Applicant.presentp_gross_salary', array('label' => false, 'maxlength' => '20')); ?></td>
            <td><?php echo $this->Form->input('Applicant.presentp_increment_date', array('label' => false, 'maxlength' => '10')); ?></td>
            <!--<td><?php echo $this->Form->input('Applicant.presentp_sr_proof', array('label' => false, 'maxlength' => '500')); ?></td>-->
        </tr>
    </table>
    <br/>
    <table>
        <tr>
            <td class="table_headertxt" style="vertical-align: middle; width: 30%">Minimum period required for joining, if selected:</td>
            <td style="width: 30%"><?php echo $this->Form->input('Applicantext.id', array('type' => 'hidden')); 
                                        echo $this->Form->input('Applicantext.time_req_for_joining', array('label' => false, 'maxlength' => '500')); ?></td>
            <td></td>
        </tr>
    </table>
    <br/>
    <div class="main_content_header">8. Miscellaneous</div>
    <table id="miscellaneous_table">
        <tr>
            <td class="table_headertxt">Are you willing to accept the minimum initial pay in the grade? If no, state reason(s)</td>
            <td><div class="radio_container">
                    <div class="left_radio_column">
                <?php echo $this->Form->input('Applicantext.willg_min_pay', array(
                            'type' => 'radio',
                            'hiddenField' => false,
                            'id' => 'willg_min_pay_yes',
                            'options' => array('yes' => 'Yes')
                        )); ?></div>
                    <div class="right_radio_column">
                <?php echo $this->Form->input('Applicantext.willg_min_pay', array(
                            'type' => 'radio',
                            'hiddenField' => false,
                            'id' => 'willg_min_pay_no',
                            'options' => array('no' => 'No'),
                        )); ?></div>
                </div>
            </td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td class="min_pay_reason">
                <?php echo $this->Form->input('Applicantext.min_pay_no', array('type' => 'textarea',  'div' => false, 'style' => 'overflow-y: scroll; height: 60px;', 'label' => false, 'maxlength' => '1000')); ?>
            </td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td width="50%" class="table_headertxt">Any other information relevant to the post applied for:</td>
            <td width="30%"><?php echo $this->Form->input('Applicant.any_other_info', array('type' => 'textarea',  'div' => false, 'style' => 'overflow-y: scroll; height: 60px;', 'label' => false, 'maxlength' => '500'));  ?></td>
            <td width="10%"></td>
            <td width="10%"></td>
        </tr>
        <tr>
            <td class="table_headertxt">Membership of Professional Recognized Bodies - International</td>
            <td><div class="radio_container">
                    <div class="left_radio_column">
                    <?php echo $this->Form->input('Applicantext.mem_pro_bodies', array(
                                'type' => 'radio',
                                'hiddenField' => false,
                                'id' => 'mem_pro_bodies_yes',
                                'options' => array('yes' => 'Yes')
                            )); ?></div>
                    <div class="right_radio_column">
                    <?php echo $this->Form->input('Applicantext.mem_pro_bodies', array(
                                'type' => 'radio',
                                'hiddenField' => false,
                                'id' => 'mem_pro_bodies_no',
                                'options' => array('no' => 'No')
                        )); ?></div>
                </div>
            </td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td class="mem_details table_headertxt">Membership Details</td>
            <td class="mem_details">
                <?php echo $this->Form->input('Applicantext.mem_details', array('type' => 'textarea',  'div' => false, 'style' => 'overflow-y: scroll; height: 60px;',
                                                                                'label' => false, 
                                                                                'maxlength' => '1000',
                                                                                'formnovalidate' => false)); ?>
            </td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td class="table_headertxt">Membership of Professional Recognized Bodies - National</td>
            <td><div class="radio_container">
                    <div class="left_radio_column">
                <?php echo $this->Form->input('Applicantext.mem_pro_bodies_national', array(
                            'type' => 'radio',
                            'hiddenField' => false,
                            'id' => 'mem_pro_bodies_national_yes',
                            'options' => array('yes' => 'Yes')
                        )); ?></div>
                    <div class="right_radio_column">
                <?php echo $this->Form->input('Applicantext.mem_pro_bodies_national', array(
                            'type' => 'radio',
                            'hiddenField' => false,
                            'id' => 'mem_pro_bodies_national_no',
                            'options' => array('no' => 'No'),
                        )); ?>
                        </div>
                </div>
            </td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td class="mem_details_national table_headertxt">Membership Details</td>
            <td class="mem_details_national">
                <?php echo $this->Form->input('Applicantext.mem_details_national', array('type' => 'textarea',  'div' => false, 'style' => 'overflow-y: scroll; height: 60px;',
                                                                                'label' => false, 
                                                                                'maxlength' => '1000',
                                                                                'formnovalidate' => false)); ?>
            </td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td class="table_headertxt">Have you ever been punished or convicted by a court of law?</td>
            <td><div class="radio_container">
                    <div class="left_radio_column">
                <?php echo $this->Form->input('Applicantext.convicted', array(
                            'type' => 'radio',
                            'hiddenField' => false,
                            'id' => 'convicted_yes',
                            'options' => array('yes' => 'Yes')
                        )); ?></div>
                    <div class="right_radio_column">
                <?php echo $this->Form->input('Applicantext.convicted', array(
                            'type' => 'radio',
                            'hiddenField' => false,
                            'id' => 'convicted_no',
                            'options' => array('no' => 'No'),
                        )); ?></div>
                </div>
            </td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td class="table_headertxt">Is any case pending against you in any court of law or FIR registered in any police station?</td>
            <td><div class="radio_container">
                    <div class="left_radio_column">
                <?php echo $this->Form->input('Applicantext.pending_court', array(
                            'type' => 'radio',
                            'hiddenField' => false,
                            'id' => 'pending_court_yes',
                            'options' => array('yes' => 'Yes')
                        )); ?></div>
                    <div class="right_radio_column">
                <?php echo $this->Form->input('Applicantext.pending_court', array(
                            'type' => 'radio',
                            'hiddenField' => false,
                            'id' => 'pending_court_no',
                            'options' => array('no' => 'No'),
                        )); ?></div>
                </div>
            </td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td class="pending_court_details">When</td>
            <td class="pending_court_details">Where</td>
            <td class="pending_court_details">Under Section</td>
            <td class="pending_court_details">Status</td>
        </tr>
        <tr>
            <td class="pending_court_details"><?php echo $this->Form->input('Applicantext.pending_court_when', array('div' => false,
                                                                                'label' => false, 
                                                                                'maxlength' => '100',
                                                                                'formnovalidate' => false)); ?></td>
            <td class="pending_court_details">
                <?php echo $this->Form->input('Applicantext.pending_court_where', array('div' => false,
                                                                                'label' => false, 
                                                                                'maxlength' => '100',
                                                                                'formnovalidate' => false)); ?>
            </td>
            <td class="pending_court_details">
                <?php echo $this->Form->input('Applicantext.pending_court_undersection', array('div' => false,
                                                                                'label' => false, 
                                                                                'maxlength' => '100',
                                                                                'formnovalidate' => false)); ?>
            </td>
            <td class="pending_court_details">
                <?php echo $this->Form->input('Applicantext.pending_court_status', array('div' => false,
                                                                                'label' => false, 
                                                                                'maxlength' => '100',
                                                                                'formnovalidate' => false)); ?>
            </td>
        </tr>
        <tr>
            <td class="table_headertxt">Total number of self-attested documents attached with the hard copy of the application form (Applications without self attested testimonials/documents will not be entertained):</td>
            <td>
                <?php echo $this->Form->input('Applicant.total_self_att_docs_att', array('label' => false, 'maxlength' => '10')); ?>
            </td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td class="table_headertxt>&nbsp;&nbsp;</td>
            <td>&nbsp;&nbsp;</td>
            <td>&nbsp;&nbsp;</td>
            <td>&nbsp;&nbsp;</td>
        </tr>
        <tr>
            <td class="table_headertxt>&nbsp;&nbsp;</td>
            <td>&nbsp;&nbsp;</td>
            <td>&nbsp;&nbsp;</td>
            <td>&nbsp;&nbsp;</td>
        </tr>
        <tr>
            <td class="table_headertxt">&nbsp;&nbsp;</td>
            <td>&nbsp;&nbsp;</td>
            <td>&nbsp;&nbsp;</td>
            <td>&nbsp;&nbsp;</td>
        </tr>
    </table>
    <div>The list of self attested testimonials attached (original to be produced at the time of interview). Please attach in order as applicable.</div>
    <table>
        <tr>
            <td width="10%">S.No.</td>
            <td width="10%">Select</td>
            <td>Name of the document</td>
            <td>Annexure No.</td>
        </tr>
        <tr>
            <td width="10%">1.</td>
            <td width="10%"><?php echo $this->Form->checkbox('Applicantext.list_matric'); ?></td>
            <td>Matriculation marksheet / certificate</td>
            <td><?php echo $this->Form->input('Applicantext.list_matric_pages', array('label' => false, 'maxlength' => '10')); ?></td>
        </tr>
        <tr>
            <td width="10%">2.</td>
            <td width="10%"><?php echo $this->Form->checkbox('Applicantext.list_intermediate'); ?></td>
            <td>Intermediate/+2 marksheet / certificate</td>
            <td><?php echo $this->Form->input('Applicantext.list_intermediate_pages', array('label' => false, 'maxlength' => '10')); ?></td>
        </tr>
        <tr>
            <td width="10%">3.</td>
            <td width="10%"><?php echo $this->Form->checkbox('Applicantext.list_bsc'); ?></td>
            <td>B.A. / B.Sc. / B.Com (Final) marksheet / degree</td>
            <td><?php echo $this->Form->input('Applicantext.list_bsc_pages', array('label' => false, 'maxlength' => '10')); ?></td>
        </tr>
        <tr>
            <td width="10%">4.</td>
            <td width="10%"><?php echo $this->Form->checkbox('Applicantext.list_msc'); ?></td>
            <td>M.A. / M.Sc. / M.Com (Final) marksheet / degree</td>
            <td><?php echo $this->Form->input('Applicantext.list_msc_pages', array('label' => false, 'maxlength' => '10')); ?></td>
        </tr>
        <tr>
            <td width="10%">5.</td>
            <td width="10%"><?php echo $this->Form->checkbox('Applicantext.list_llb'); ?></td>
            <td>L.L.B (Final) marksheet / degree</td>
            <td><?php echo $this->Form->input('Applicantext.list_llb_pages', array('label' => false, 'maxlength' => '10')); ?></td>
        </tr>
        <tr>
            <td width="10%">6.</td>
            <td width="10%"><?php echo $this->Form->checkbox('Applicantext.list_llm'); ?></td>
            <td>L.L.M marksheet / degree</td>
            <td><?php echo $this->Form->input('Applicantext.list_llm_pages', array('label' => false, 'maxlength' => '10')); ?></td>
        </tr>
        <tr>
            <td width="10%">7.</td>
            <td width="10%"><?php echo $this->Form->checkbox('Applicantext.list_mphil'); ?></td>
            <td>M.Phil. degree</td>
            <td><?php echo $this->Form->input('Applicantext.list_mphil_pages', array('label' => false, 'maxlength' => '10')); ?></td>
        </tr>
        <tr>
            <td width="10%">8.</td>
            <td width="10%"><?php echo $this->Form->checkbox('Applicantext.list_phd'); ?></td>
            <td>Ph.D. / D.Phil degree</td>
            <td><?php echo $this->Form->input('Applicantext.list_phd_pages', array('label' => false, 'maxlength' => '10')); ?></td>
        </tr>
        <tr>
            <td width="10%">9.</td>
            <td width="10%"><?php echo $this->Form->checkbox('Applicantext.list_dlit'); ?></td>
            <td>D.Litt, D.Sc., L.L.D degree</td>
            <td><?php echo $this->Form->input('Applicantext.list_dlit_pages', array('label' => false, 'maxlength' => '10')); ?></td>
        </tr>
        <tr>
            <td width="10%">10.</td>
            <td width="10%"><?php echo $this->Form->checkbox('Applicantext.list_net'); ?></td>
            <td>NET, UGC-JRF, CSIR-JRF Award Certificate</td>
            <td><?php echo $this->Form->input('Applicantext.list_net_pages', array('label' => false, 'maxlength' => '10')); ?></td>
        </tr>
        <tr>
            <td width="10%">11.</td>
            <td width="10%"><?php echo $this->Form->checkbox('Applicantext.list_caste_cert'); ?></td>
            <td>Caste Certificate issued by the Government of India (OBC/SC/ST/etc)</td>
            <td><?php echo $this->Form->input('Applicantext.list_caste_cert_pages', array('label' => false, 'maxlength' => '10')); ?></td>
        </tr>
        <tr>
            <td width="10%">12.</td>
            <td width="10%"><?php echo $this->Form->checkbox('Applicantext.list_exp_cert'); ?></td>
            <td>Experience certificates</td>
            <td><?php echo $this->Form->input('Applicantext.list_exp_cert_pages', array('label' => false, 'maxlength' => '10')); ?></td>
        </tr>
        <tr>
            <td width="10%">13.</td>
            <td width="10%"><?php echo $this->Form->checkbox('Applicantext.list_reco_letter'); ?></td>
            <td>Recommendation letter(s)</td>
            <td><?php echo $this->Form->input('Applicantext.list_reco_letter_pages', array('label' => false, 'maxlength' => '10')); ?></td>
        </tr>
        <tr>
            <td width="10%">14.</td>
            <td width="10%"><?php echo $this->Form->checkbox('Applicantext.list_award'); ?></td>
            <td>Award (s) / Fellowship (s)</td>
            <td><?php echo $this->Form->input('Applicantext.list_award_pages', array('label' => false, 'maxlength' => '10')); ?></td>
        </tr>
        <tr>
            <td width="10%">15.</td>
            <td width="10%"><?php echo $this->Form->checkbox('Applicantext.list_publication'); ?></td>
            <td>Publication (s)</td>
            <td><?php echo $this->Form->input('Applicantext.list_publication_pages', array('label' => false, 'maxlength' => '10')); ?></td>
        </tr>
        <tr>
            <td width="10%">16.</td>
            <td width="10%"><?php echo $this->Form->checkbox('Applicantext.list_pwd'); ?></td>
            <td>Person with Disability Certificate</td>
            <td><?php echo $this->Form->input('Applicantext.list_pwd_pages', array('label' => false, 'maxlength' => '10')); ?></td>
        </tr>
        <tr>
            <td width="10%">17.</td>
            <td width="10%"><?php echo $this->Form->checkbox('Applicantext.list_noc'); ?></td>
            <td>No Objection Certificate from Present Employer</td>
            <td><?php echo $this->Form->input('Applicantext.list_noc_pages', array('label' => false, 'maxlength' => '10')); ?></td>
        </tr>
        <tr>
            <td width="10%">18.</td>
            <td width="10%"><?php echo $this->Form->checkbox('Applicantext.list_appointment'); ?></td>
            <td>Appointment Letter(s)</td>
            <td><?php echo $this->Form->input('Applicantext.list_appointment_pages', array('label' => false, 'maxlength' => '10')); ?></td>
        </tr>
        <tr>
            <td width="10%">19.</td>
            <td width="10%"><?php echo $this->Form->checkbox('Applicantext.list_salary'); ?></td>
            <td>Salary Certificate/Salary Slip</td>
            <td><?php echo $this->Form->input('Applicantext.list_salary_pages', array('label' => false, 'maxlength' => '10')); ?></td>
        </tr>
    </table>
</div>
<div class="submit">
    <?php echo $this->Form->submit('Save & Continue', array('div' => false)); ?>
    <?php //echo $this->Form->submit('Cancel', array('name' => 'Cancel', 'div' => false)); 
          echo $this->Form->button('Reset', array(
            'type' => 'reset',
            'div' => false            
        ));
          ?>
</div>
<?php echo $this->Form->end(); ?>
<script>
    $(document).ready(function() {
        
        if($("#working_at_present_select option:selected").text() === "Yes") {
            $('#physical_disable').css('display', 'table');
        }
        else {
            $('#present_position_table').css('display', 'none');
        }
        
        if($("#peer_recognition_yn_select option:selected").text() === "Yes") {
            $('#grade-table').css('display', 'table');
        }
        else {
            $('#grade-table').css('display', 'none');
        }
        
        $('.mem_details').each(function(){
            $(this).css('display','none');
        });
        
        $('.mem_details_national').each(function(){
            $(this).css('display','none');
        });
        
        $('.pending_court_details').each(function(){
            $(this).css('display','none');
        });
        
        $('.min_pay_reason').each(function(){
            $(this).css('display','none');
        });
        
        if($("input[name='data[Applicantext][mem_pro_bodies]']:checked").val() == "yes") {
             $('.mem_details').each(function(){
                    $(this).css('display','table-cell');
                });
        };
        
        if($("input[name='data[Applicantext][mem_pro_bodies_national]']:checked").val() == "yes") {
             $('.mem_details_national').each(function(){
                    $(this).css('display','table-cell');
                });
        };
        
        if($("input[name='data[Applicantext][pending_court]']:checked").val() == "yes") {
             $('.pending_court_details').each(function(){
                    $(this).css('display','table-cell');
                });
        };
        
        if($("input[name='data[Applicantext][willg_min_pay]']:checked").val() == "no") {
            $('.min_pay_reason').each(function(){
                    $(this).css('display','table-cell');
                });
        };
        $("input[name='data[Applicantext][mem_pro_bodies]']").change(function(){
            if($(this).val() === 'yes') {
                $('.mem_details').each(function(){
                    $(this).css('display','table-cell');
                });
            }
            else {
                $('.mem_details').each(function(){
                    $(this).css('display','none');
                });
            }
        });
        
        $("input[name='data[Applicantext][mem_pro_bodies_national]']").change(function(){
            if($(this).val() === 'yes') {
                $('.mem_details_national').each(function(){
                    $(this).css('display','table-cell');
                });
            }
            else {
                $('.mem_details_national').each(function(){
                    $(this).css('display','none');
                });
            }
        });
        
        $("input[name='data[Applicantext][pending_court]']").change(function(){
            if($(this).val() === 'yes') {
                $('.pending_court_details').each(function(){
                    $(this).css('display','table-cell');
                });
            }
            else {
                $('.pending_court_details').each(function(){
                    $(this).css('display','none');
                });
            }
        });
        
        $("input[name='data[Applicantext][willg_min_pay]']").change(function(){
            if($(this).val() === 'no') {
                $('.min_pay_reason').each(function(){
                    $(this).css('display','table-cell');
                });
            }
            else {
                $('.min_pay_reason').each(function(){
                    $(this).css('display','none');
                });
            }
        });
        
        $("select[name='data[Applicantext][working_at_present]']").change(function(){
            if($(this).val() === 'no') {
                $('#present_position_table').each(function(){
                    $(this).css('display','none');
                });
            }
            else {
                $('#present_position_table').each(function(){
                    $(this).css('display','table');
                });
            }
        });
        
        $("select[name='data[Applicantext][peer_recognition_yn]']").change(function(){
            if($(this).val() === 'no') {
                $('#grade-table').each(function(){
                    $(this).css('display','none');
                });
            }
            else {
                $('#grade-table').each(function(){
                    $(this).css('display','table');
                });
            }
        });
        
        <?php 
        if(isset($json_radio)) {
            foreach ($json_radio as $key => $value) {
                if(key($value) == "willg_min_pay" && $value[key($value)] == "no") {
                    echo "$('.min_pay_reason').each(function(){\n
                        $(this).css('display','table-cell');\n
                    });\n"; 
                }
                else if(key($value) == "mem_pro_bodies" && $value[key($value)] == "yes") {
                    echo "$('.mem_details').each(function(){\n
                        $(this).css('display','table-cell');\n
                    });\n";
                }
                else if(key($value) == "mem_pro_bodies_national" && $value[key($value)] == "yes") {
                    echo "$('.mem_details_national').each(function(){\n
                        $(this).css('display','table-cell');\n
                    });\n";
                }
                else if(key($value) == "pending_court" && $value[key($value)] == "yes") {
                    echo "$('.pending_court_details').each(function(){\n
                        $(this).css('display','table-cell');\n
                    });\n";
                }
                //echo "$(\":radio[name='data[Applicant][" . key($value) . "]'][value='" . $value[key($value)] . "']\").prop('checked', true);\n";
                //echo "// 12";
            }
        }
        ?>
                
    });
</script>
