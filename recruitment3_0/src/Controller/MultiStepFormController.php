<?php
class MultiStepFormController extends AppController {
	var $components = array('Wizard.Wizard');
        public $uses = array('Registereduser', 'Post' , 'MultiStepForm','Applicant', 'Applicantext', 'Education','Experience',
                            'Academic_dist','Image','Document', 'Researchpaper', 'Researcharticle','Researchproject', 'Peerrecognition',
                            'Experiencephd', 'ApiScore', 'NewAPIScore', 'Applicantprefill', 'Publication', 'Applicantugcnet', 'Ugcnet', 
                            'Articleconference', 'Articleperiodical', 'Seminarorganized');
        
        function beforeFilter() {
            if(!$this->Session->check('registration_id')) {
                $this->redirect(array('controller' => 'users', 'action' => 'dashboard'));
            }
            $current_datetime = new DateTime();
            $current_datetime->setTimezone(new DateTimeZone('Asia/Calcutta'));
			$open_datetime = new DateTime("2018-07-01 11:59:59", new DateTimeZone('Asia/Calcutta'));
            //$close_datetime = new DateTime("2018-08-03 23:59:00", new DateTimeZone('Asia/Calcutta'));
			$close_datetime = new DateTime("2018-07-19 16:59:00", new DateTimeZone('Asia/Calcutta'));
            $applicants_new = $this->Applicant->find('all', array(
                                       'conditions' => array('Applicant.id' => intval($this->Session->read('applicant_id')))));
            //debug($current_datetime);debug($open_datetime);debug($close_datetime); return false;
            if ($current_datetime < $open_datetime || $current_datetime > $close_datetime) {
                $this->Session->setFlash('Application Form is closed.');
                $this->redirect(array('controller' => 'form', 'action' => 'generalinformation'));
            }
            $posts_applied = $this->Post->find('all', array(
                        'conditions' => array('Post.reg_id' => $this->Session->read('registration_id'))));
            //debug($applicants_new);
            if(count($posts_applied) === 0 || (count($applicants_new) == 1 && $applicants_new[0]['Applicant']['multiple_post'] == 1)) {                
                $this->Wizard->steps = array('first','second','third','fourth','fifth','sixth', 'seventh', 'eighth', 'ninth');
                //debug('entered');
            }
            else {
                $this->Wizard->steps = array('filldata','first','second','third','fourth','fifth','sixth', 'seventh', 'eighth', 'ninth');
                //debug('entered2');
            }
        }
        
        function wizard($step = null) {
            if($this->Session->check('registration_id')) {
                $this->alreadyAppliedCheck();
                $this->isApplicantIdValid();
                $applicants_new = $this->Applicant->find('all', array(
                                       'conditions' => array('Applicant.id' => intval($this->Session->read('applicant_id')))));
                $ugc_net_category_check = (count($applicants_new) == 1 && !empty($applicants_new[0]['Applicant']['ugc_net_category']) 
                                                        && $applicants_new[0]['Applicant']['ugc_net_category'] == "SC"
                                                        && !empty($applicants_new[0]['Applicant']['category_applied'])
                                                        && $applicants_new[0]['Applicant']['category_applied'] != "SC");
                if($ugc_net_category_check == true) {
                    $this->Session->setFlash('The category of UGC-NET and category of currently applied Post do not match.');
                }
                else {
                    $this->Session->delete('Message.flash');
                }
                //debug($ugc_net_category_check); debug($step);
                if($ugc_net_category_check == true && ($step == 'filldata' || $step == 'first' || $step == 'second')) {
                    if($step == 'filldata') {
                        $this->Wizard->process('first');
                    }
                    else {
                        $this->Wizard->process($step);
                    }
                }
                else if($ugc_net_category_check == false) {
                    $this->Wizard->process($step);
                }
                else {
                    $this->Session->setFlash('There is a mismatch error. Please logout and fix the error or contact support.');
                }
            }
            else {
                $this->redirect(array('controller' => 'users', 'action' => 'dashboard'));
            }
	}
        
        function alreadyAppliedCheck() {
            $posts_applied = $this->Applicant->find('all', array(
                        'conditions' => array('Applicant.registration_id' => $this->Session->read('registration_id'))));
            $final_submit_posts = array();
            $mismatch = false;
            foreach ($posts_applied as $key => $value) {
                if ($posts_applied[$key]['Applicant']['post_applied_for'] == $this->getPostAppliedFor()
                        //&& $posts_applied[$key]['Applicant']['area'] == $this->getAreaAppliedFor()
                        && $posts_applied[$key]['Applicant']['centre'] == $this->getCentreAppliedFor()) {
                    if ($posts_applied[$key]['Applicant']['final_submit'] == "1") {
                        // redirect to general page & disable the post
                        $mismatch = true;
                    }
                }
            }
            if ($mismatch == true) {
                $this->Session->setFlash('You have already applied for and final submitted the selected Post/Centre.');
                $this->redirect(array('controller' => 'form', 'action' => 'generalinformation'));
            }
        }
        
        private function getApplicantIdAsPerPostAreaCentre() {
            $reg_id = $this->Session->read('registration_id');
            if(!empty($reg_id)) {
                $applicants = $this->Applicant->find('all', array(
                            'conditions' => array('Applicant.registration_id' => $reg_id,
                                                  'Applicant.post_applied_for' => $this->getPostAppliedFor(),
                                                  'Applicant.centre' => $this->getCentreAppliedFor()
                                                  )));

                //print_r($applicants);
                if(count($applicants) == 0) {
                    $this->Applicant->create();
                    $this->Applicant->set(['registration_id' => $reg_id,
                                           'post_applied_for' => $this->getPostAppliedFor(),
                                           'centre' => $this->getCentreAppliedFor()]);
                    $this->Applicant->save();
                    return $this->Applicant->getLastInsertID();
                }
                else if(count($applicants) == 1)
                    return $applicants['0']['Applicant']['id'];
                else {
                    //this condition should not arise. delete all the above records
                    $deleted = $this->Applicant->deleteAll( array('Applicant.registration_id' => $reg_id,
                                                                        'Applicant.post_applied_for' => $this->getPostAppliedFor(),
                                                                        'Applicant.centre' => $this->getCentreAppliedFor()
                                                                        ));
                    $this->Session->setFlash('Multiple entries found for applied posts. Please contact support.');
                    $this->redirect(array('controller' => 'users', 'action' => 'logout'));
                }
            }
        }
        
        // This function should be called after alreadyappliedcheck
        private function isApplicantIdValid() {
            if(!empty($this->Session->read('applicant_id'))) {
                $applicantId = $this->getApplicantIdAsPerPostAreaCentre();
                if($applicantId == $this->Session->read('applicant_id')) {
                    return true;
                }
                else {
                    $this->Session->write('applicant_id', $applicantId);
                }
            }
            else {
                $applicantId = $this->getApplicantIdAsPerPostAreaCentre();
                $this->Session->write('applicant_id', $applicantId);
                return true;
            }
        }
        
        function _prepareFilldata() {
            $this->Applicantprefill->clear();
            $posts_applied = $this->Post->find('all', array(
                        'conditions' => array('Post.reg_id' => $this->Session->read('registration_id'))));
            $applicants_new = $this->Applicant->find('all', array(
                                       'conditions' => array('Applicant.id' => intval($this->Session->read('applicant_id')))));
            if(count($posts_applied) === 0 || (count($applicants_new) == 1 && $applicants_new[0]['Applicant']['multiple_post'] == 1)) {
                $this->Wizard->process('first');
            }
        }
        
        function _processFilldata() {
            if (!empty($this->Session->read('registration_id')) && !empty($this->Session->read('applicant_id'))) {
                $this->Applicantprefill->clear();    
                $this->Applicantprefill->set($this->data);
                if(!empty($this->data['Applicantprefill']) && $this->Applicantprefill->validates()) {
                    $existingApplicantId = $this->data['Applicantprefill']['existing_id'];
                    $applicants = $this->Applicant->find('all', array(
                                       'conditions' => array('Applicant.id' => intval($existingApplicantId))));
                    $applicants_new = $this->Applicant->find('all', array(
                                       'conditions' => array('Applicant.id' => intval($this->Session->read('applicant_id')))));
                    if(intval($applicants_new[0]['Applicant']['multiple_post']) !== 1) {
                        if($applicants[0]['Applicant']['date_of_birth'] === $this->data['Applicantprefill']['date_of_birth']) {
                            if(count($this->Applicant->find('all', array('conditions' => array('Applicant.id' => intval($this->Session->read('applicant_id')))))) === 1) {
                                $this->Applicant->query('update applicant as a INNER JOIN (select  id,area,area_of_sp,area_sub_sp,first_name,middle_name,last_name,date_of_birth,email,mobile_no,age_on_advt,place_of_birth,father_name,father_contact_no,mother_name,mother_contact_no,nationality,gender,marital_status,spouse_name,category,physically_disabled,blindness,blindness_pertge,hearing,hearing_pertge,locomotor,locomotor_pertge,mailing_address,permanent_address,landline,fax,aadhar_no,api_score,api_capped,created,modified,final_submit,advertisement_no,gaps_in_education,gaps_in_education2,gaps_in_education3,ugc_net_subject,ugc_net_mnth_yr,ugc_net_rollno,tot_exp_years,tot_exp_mnths,tot_exp_days,gaps_in_experience,gaps_in_experience2,gaps_in_experience3,sem_att_national,sem_att_international,sem_att_total,sem_org_national,sem_org_international,sem_org_total,rg_mphil_completed,rg_phd_completed,rg_mphil_undersup,rg_phd_undersup,tot_impact_sci,tot_impact_google,h_index_scopus,h_index_google,i10_index_google,ref_add1,ref_email1,ref_landline1,ref_mobile1,ref_fax1,ref_add2,ref_email2,ref_landline2,ref_mobile2,ref_fax2,ref_add3,ref_email3,ref_landline3,ref_mobile3,ref_fax3,presentp_desig,presentp_nameuniv,presentp_basic_pay,presentp_pay_scale,presentp_gross_salary,presentp_increment_date,time_req_for_joining,any_other_info,mem_pro_bodies,mem_details,convicted,pending_court,total_self_att_docs_att,willg_min_pay,min_pay_no,develop_department,award_honour1,agency1,year1,award_honour2,agency2,year2,award_honour3,agency3,year3,response_code,payment_date_created,payment_id,payment_amount,payment_transaction_id,category_applied,ugc_net_marks,ugc_net_total_marks,ugc_net_cutoff_marks,ugc_net_category,apiscore_cat_2,apiscore_cat_3,totalapiscore_cat_2_3,criteria_partA,criteria_partB,criteria_totalAB,departmental_cand,retired,pension_details,internal_cand,gap_education_yn,gap_experience_yn,religion,alternate_no,area_sp_combined,calculated_exp_years,calculated_exp_months,calculated_exp_days,mem_pro_bodies_national,mem_details_national,pending_court_when,pending_court_where,pending_court_undersection,pending_court_status,list_matric,list_intermediate,list_bsc,list_msc,list_llb,list_llm,list_mphil,list_phd,list_dlit,list_net,list_caste_cert,list_exp_cert,list_reco_letter,list_award,list_publication,autism,autism_pertge,national_test_qualified,calculated_expphd_years,calculated_expphd_months,calculated_expphd_days,phd_ugc_2009,working_at_present,exp_during_phd,rp_in_journals,ra_in_books,ra_in_conference,pa_in_periodicals,em_research,seminar_attended,seminar_organized,peer_recognition_yn,postal_house_no,postal_stree_no,postal_town,postal_district,postal_state,postal_pin_code,permanent_house_no,permanent_stree_no,permanent_town,permanent_district,permanent_state,permanent_pin_code,list_matric_pages,list_intermediate_pages,list_bsc_pages,list_msc_pages,list_llb_pages,list_llm_pages,list_mphil_pages,list_phd_pages,list_dlit_pages,list_net_pages,list_caste_cert_pages,list_exp_cert_pages,list_reco_letter_pages,list_award_pages,list_publication_pages from applicant where id = ' . intval($existingApplicantId) . ') as e
                                                         set 
                                                            a.area = e.area,
                                                            a.area_sub_sp = e.area_sub_sp,
                                                            a.first_name = e.first_name,
                                                            a.middle_name = e.middle_name,
                                                            a.last_name = e.last_name,
                                                            a.date_of_birth = e.date_of_birth,
                                                            a.email = e.email,
                                                            a.mobile_no = e.mobile_no,
                                                            a.age_on_advt = e.age_on_advt,
                                                            a.place_of_birth = e.place_of_birth,
                                                            a.father_name = e.father_name,
                                                            a.father_contact_no = e.father_contact_no,
                                                            a.mother_name = e.mother_name,
                                                            a.mother_contact_no = e.mother_contact_no,
                                                            a.nationality = e.nationality,
                                                            a.gender = e.gender,
                                                            a.marital_status = e.marital_status,
                                                            a.spouse_name = e.spouse_name,
                                                            a.category = e.category,
                                                            a.physically_disabled = e.physically_disabled,
                                                            a.blindness = e.blindness,
                                                            a.blindness_pertge = e.blindness_pertge,
                                                            a.hearing = e.hearing,
                                                            a.hearing_pertge = e.hearing_pertge,
                                                            a.locomotor = e.locomotor,
                                                            a.locomotor_pertge = e.locomotor_pertge,
                                                            a.mailing_address = e.mailing_address,
                                                            a.permanent_address = e.permanent_address,
                                                            a.landline = e.landline,
                                                            a.fax = e.fax,
                                                            a.aadhar_no = e.aadhar_no,
                                                            a.api_score = e.api_score,
                                                            a.api_capped = e.api_capped,
                                                            a.advertisement_no = e.advertisement_no,
                                                            a.gaps_in_education = e.gaps_in_education,
                                                            a.gaps_in_education2 = e.gaps_in_education2,
                                                            a.gaps_in_education3 = e.gaps_in_education3,
                                                            a.ugc_net_subject = e.ugc_net_subject,
                                                            a.ugc_net_mnth_yr = e.ugc_net_mnth_yr,
                                                            a.ugc_net_rollno = e.ugc_net_rollno,
                                                            a.tot_exp_years = e.tot_exp_years,
                                                            a.tot_exp_mnths = e.tot_exp_mnths,
                                                            a.tot_exp_days = e.tot_exp_days,
                                                            a.gaps_in_experience = e.gaps_in_experience,
                                                            a.gaps_in_experience2 = e.gaps_in_experience2,
                                                            a.gaps_in_experience3 = e.gaps_in_experience3,
                                                            a.sem_att_national = e.sem_att_national,
                                                            a.sem_att_international = e.sem_att_international,
                                                            a.sem_att_total = e.sem_att_total,
                                                            a.sem_org_national = e.sem_org_national,
                                                            a.sem_org_international = e.sem_org_international,
                                                            a.sem_org_total = e.sem_org_total,
                                                            a.rg_mphil_completed = e.rg_mphil_completed,
                                                            a.rg_phd_completed = e.rg_phd_completed,
                                                            a.rg_mphil_undersup = e.rg_mphil_undersup,
                                                            a.rg_phd_undersup = e.rg_phd_undersup,
                                                            a.tot_impact_sci = e.tot_impact_sci,
                                                            a.tot_impact_google = e.tot_impact_google,
                                                            a.h_index_scopus = e.h_index_scopus,
                                                            a.h_index_google = e.h_index_google,
                                                            a.i10_index_google = e.i10_index_google,
                                                            a.ref_add1 = e.ref_add1,
                                                            a.ref_email1 = e.ref_email1,
                                                            a.ref_landline1 = e.ref_landline1,
                                                            a.ref_mobile1 = e.ref_mobile1,
                                                            a.ref_fax1 = e.ref_fax1,
                                                            a.ref_add2 = e.ref_add2,
                                                            a.ref_email2 = e.ref_email2,
                                                            a.ref_landline2 = e.ref_landline2,
                                                            a.ref_mobile2 = e.ref_mobile2,
                                                            a.ref_fax2 = e.ref_fax2,
                                                            a.ref_add3 = e.ref_add3,
                                                            a.ref_email3 = e.ref_email3,
                                                            a.ref_landline3 = e.ref_landline3,
                                                            a.ref_mobile3 = e.ref_mobile3,
                                                            a.ref_fax3 = e.ref_fax3,
                                                            a.presentp_desig = e.presentp_desig,
                                                            a.presentp_nameuniv = e.presentp_nameuniv,
                                                            a.presentp_basic_pay = e.presentp_basic_pay,
                                                            a.presentp_pay_scale = e.presentp_pay_scale,
                                                            a.presentp_gross_salary = e.presentp_gross_salary,
                                                            a.presentp_increment_date = e.presentp_increment_date,
                                                            a.time_req_for_joining = e.time_req_for_joining,
                                                            a.any_other_info = e.any_other_info,
                                                            a.mem_pro_bodies = e.mem_pro_bodies,
                                                            a.mem_details = e.mem_details,
                                                            a.convicted = e.convicted,
                                                            a.pending_court = e.pending_court,
                                                            a.total_self_att_docs_att = e.total_self_att_docs_att,
                                                            a.willg_min_pay = e.willg_min_pay,
                                                            a.min_pay_no = e.min_pay_no,
                                                            a.develop_department = e.develop_department,
                                                            a.award_honour1 = e.award_honour1,
                                                            a.agency1 = e.agency1,
                                                            a.year1 = e.year1,
                                                            a.award_honour2 = e.award_honour2,
                                                            a.agency2 = e.agency2,
                                                            a.year2 = e.year2,
                                                            a.award_honour3 = e.award_honour3,
                                                            a.agency3 = e.agency3,
                                                            a.year3 = e.year3,
                                                            a.category_applied = e.category_applied,
                                                            a.ugc_net_marks = e.ugc_net_marks,
                                                            a.ugc_net_total_marks = e.ugc_net_total_marks,
                                                            a.ugc_net_cutoff_marks = e.ugc_net_cutoff_marks,
                                                            a.ugc_net_category = e.ugc_net_category,
                                                            a.apiscore_cat_2 = e.apiscore_cat_2,
                                                            a.apiscore_cat_3 = e.apiscore_cat_3,
                                                            a.totalapiscore_cat_2_3 = e.totalapiscore_cat_2_3,
                                                            a.criteria_partA = e.criteria_partA,
                                                            a.criteria_partB = e.criteria_partB,
                                                            a.criteria_totalAB = e.criteria_totalAB,
                                                            a.multiple_post = 1,
                                                            a.departmental_cand = e.departmental_cand,
                                                            a.retired = e.retired,
                                                            a.pension_details = e.pension_details,
                                                            a.internal_cand = e.internal_cand,
                                                            a.gap_education_yn = e.gap_education_yn,
                                                            a.gap_experience_yn = e.gap_experience_yn,
                                                            a.religion = e.religion,
                                                            a.alternate_no = e.alternate_no,
                                                            a.area_sp_combined = e.area_sp_combined,
                                                            a.calculated_exp_years = e.calculated_exp_years,
                                                            a.calculated_exp_months = e.calculated_exp_months,
                                                            a.calculated_exp_days = e.calculated_exp_days,
                                                            a.mem_pro_bodies_national = e.mem_pro_bodies_national,
                                                            a.mem_details_national = e.mem_details_national,
                                                            a.pending_court_when = e.pending_court_when,
                                                            a.pending_court_where = e.pending_court_where,
                                                            a.pending_court_undersection = e.pending_court_undersection,
                                                            a.pending_court_status = e.pending_court_status,
                                                            a.list_matric = e.list_matric,
                                                            a.list_intermediate = e.list_intermediate,
                                                            a.list_bsc = e.list_bsc,
                                                            a.list_msc = e.list_msc,
                                                            a.list_llb = e.list_llb,
                                                            a.list_llm = e.list_llm,
                                                            a.list_mphil = e.list_mphil,
                                                            a.list_phd = e.list_phd,
                                                            a.list_dlit = e.list_dlit,
                                                            a.list_net = e.list_net,
                                                            a.list_caste_cert = e.list_caste_cert,
                                                            a.list_exp_cert = e.list_exp_cert,
                                                            a.list_reco_letter = e.list_reco_letter,
                                                            a.list_award = e.list_award,
                                                            a.list_publication = e.list_publication,
                                                            a.autism = e.autism,
                                                            a.autism_pertge = e.autism_pertge,
                                                            a.national_test_qualified = e.national_test_qualified,
                                                            a.calculated_expphd_years = e.calculated_expphd_years,
                                                            a.calculated_expphd_months = e.calculated_expphd_months,
                                                            a.calculated_expphd_days = e.calculated_expphd_days,
                                                            a.phd_ugc_2009 = e.phd_ugc_2009,
                                                            a.working_at_present = e.working_at_present,
                                                            a.exp_during_phd = e.exp_during_phd,
                                                            a.rp_in_journals = e.rp_in_journals,
                                                            a.ra_in_books = e.ra_in_books,
                                                            a.ra_in_conference = e.ra_in_conference,
                                                            a.pa_in_periodicals = e.pa_in_periodicals,
                                                            a.em_research = e.em_research,
                                                            a.seminar_attended = e.seminar_attended,
                                                            a.seminar_organized = e.seminar_organized,
                                                            a.peer_recognition_yn = e.peer_recognition_yn,
                                                            a.postal_house_no = e.postal_house_no,
                                                            a.postal_stree_no = e.postal_stree_no,
                                                            a.postal_town = e.postal_town,
                                                            a.postal_district = e.postal_district,
                                                            a.postal_state = e.postal_state,
                                                            a.postal_pin_code = e.postal_pin_code,
                                                            a.permanent_house_no = e.permanent_house_no,
                                                            a.permanent_stree_no = e.permanent_stree_no,
                                                            a.permanent_town = e.permanent_town,
                                                            a.permanent_district = e.permanent_district,
                                                            a.permanent_state = e.permanent_state,
                                                            a.permanent_pin_code = e.permanent_pin_code,
                                                            a.list_matric_pages = e.list_matric_pages,
                                                            a.list_intermediate_pages = e.list_intermediate_pages,
                                                            a.list_bsc_pages = e.list_bsc_pages,
                                                            a.list_msc_pages = e.list_msc_pages,
                                                            a.list_llb_pages = e.list_llb_pages,
                                                            a.list_llm_pages = e.list_llm_pages,
                                                            a.list_mphil_pages = e.list_mphil_pages,
                                                            a.list_phd_pages = e.list_phd_pages,
                                                            a.list_dlit_pages = e.list_dlit_pages,
                                                            a.list_net_pages = e.list_net_pages,
                                                            a.list_caste_cert_pages = e.list_caste_cert_pages,
                                                            a.list_exp_cert_pages = e.list_exp_cert_pages,
                                                            a.list_reco_letter_pages = e.list_reco_letter_pages,
                                                            a.list_award_pages = e.list_award_pages,
                                                            a.list_publication_pages = e.list_publication_pages
                                                            where a.id = ' . intval($this->Session->read('applicant_id')) . ';');
                            }
                            if(count($this->Education->find('all', ['conditions' => ['Education.applicant_id' => intval($this->Session->read('applicant_id'))]])) === 0) {
                                $this->Education->query('insert into education (applicant_id, board, course, grade, marks_obtained, max_marks, percentage,qualification,roll_no,subjects,system,year_of_passing,mode_of_study) select ' . $this->Session->read('applicant_id') . ', 
                                        board, course, grade, marks_obtained, max_marks, percentage,qualification,roll_no,subjects,system,year_of_passing,mode_of_study from education where applicant_id = ' . intval($existingApplicantId));
                            }
                            if(count($this->Experience->find('all', ['conditions' => ['Experience.applicant_id' => intval($this->Session->read('applicant_id'))]])) === 0) {
                                $this->Experience->query('insert into experience (applicant_id,designation,institute_type,name_address,from_date,to_date,no_of_yrs_mnths_days,nature_of_work,scale_of_pay) select ' . $this->Session->read('applicant_id') . ', 
                                        designation,institute_type,name_address,from_date,to_date,no_of_yrs_mnths_days,nature_of_work,scale_of_pay from experience where applicant_id = ' . intval($existingApplicantId));
                            }
                            if(count($this->Document->find('all', ['conditions' => ['Document.applicant_id' => intval($this->Session->read('applicant_id'))]])) === 0) {
                                $this->Document->query('insert into document (applicant_id,filename,type,size,filename2,type2,size2,filename3,type3,size3,filename4,type4,size4,filename5,type5,size5,filename6,type6,size6,filename7,type7,size7) select ' . $this->Session->read('applicant_id') . ', 
                                        filename,type,size,filename2,type2,size2,filename3,type3,size3,filename4,type4,size4,filename5,type5,size5,filename6,type6,size6,filename7,type7,size7 from document where applicant_id = ' . intval($existingApplicantId));
                            }
                            if(count($this->Experiencephd->find('all', ['conditions' => ['Experiencephd.applicant_id' => intval($this->Session->read('applicant_id'))]])) === 0) {
                                $this->Experiencephd->query('insert into experiencephd (applicant_id,designation,institute_type,name_address,from_date,to_date,no_of_mnths_yrs,nature_of_service,work_load,minimum_eligibility,leave_taken,scale_of_pay) select ' . $this->Session->read('applicant_id') . ', 
                                        designation,institute_type,name_address,from_date,to_date,no_of_mnths_yrs,nature_of_service,work_load,minimum_eligibility,leave_taken,scale_of_pay from experiencephd where applicant_id = ' . intval($existingApplicantId));
                            }
                            if(count($this->Peerrecognition->find('all', ['conditions' => ['Peerrecognition.applicant_id' => intval($this->Session->read('applicant_id'))]])) === 0) {
                                $this->Peerrecognition->query('insert into peerrecognition (applicant_id,award_honour,agency,year) select ' . $this->Session->read('applicant_id') . ', 
                                        award_honour,agency,year from peerrecognition where applicant_id = ' . intval($existingApplicantId));
                            }
                            if(count($this->Publication->find('all', ['conditions' => ['Publication.applicant_id' => intval($this->Session->read('applicant_id'))]])) === 0) {
                                $this->Publication->query('insert into publication (applicant_id,authors,title,paper_book,title_article,name_place_publication,publication_ISSN,publisher_ISBN,vol_page_year,impact_factor) select ' . $this->Session->read('applicant_id') . ', 
                                        authors,title,paper_book,title_article,name_place_publication,publication_ISSN,publisher_ISBN,vol_page_year,impact_factor from publication where applicant_id = ' . intval($existingApplicantId));
                            }
                            if(count($this->Researcharticle->find('all', ['conditions' => ['Researcharticle.applicant_id' => intval($this->Session->read('applicant_id'))]])) === 0) {
                                $this->Researcharticle->query('insert into researcharticle (applicant_id,authors,title_of_book,title_of_article,journal_no_ugc,place_of_publication,publisher_ISBN,page_no,editor_of_book) select ' . $this->Session->read('applicant_id') . ', 
                                        authors,title_of_book,title_of_article,journal_no_ugc,place_of_publication,publisher_ISBN,page_no,editor_of_book from researcharticle where applicant_id = ' . intval($existingApplicantId));
                            }
                            if(count($this->Researchpaper->find('all', ['conditions' => ['Researchpaper.applicant_id' => intval($this->Session->read('applicant_id'))]])) === 0) {
                                $this->Researchpaper->query('insert into researchpaper (applicant_id,authors,title,name_place_publication,publication_ISSN,vol_page_year,impact_factor) select ' . $this->Session->read('applicant_id') . ', 
                                        authors,title,name_place_publication,publication_ISSN,vol_page_year,impact_factor from researchpaper where applicant_id = ' . intval($existingApplicantId));
                            }
                            if(count($this->Researchproject->find('all', ['conditions' => ['Researchproject.applicant_id' => intval($this->Session->read('applicant_id'))]])) === 0) {
                                $this->Researchproject->query('insert into researchproject (applicant_id,title,comp_ongoing,funding_agency,investigator,amount_of_grant,duration) select ' . $this->Session->read('applicant_id') . ', 
                                        title,comp_ongoing,funding_agency,investigator,amount_of_grant,duration from researchproject where applicant_id = ' . intval($existingApplicantId));
                            }
                            if(count($this->Ugcnet->find('all', ['conditions' => ['Ugcnet.applicant_id' => intval($this->Session->read('applicant_id'))]])) === 0) {
                                $this->Ugcnet->query('insert into ugcnet (applicant_id,subject,month_year_passing,roll_no,net_jrf,examining_body,any_other_test) select ' . $this->Session->read('applicant_id') . ', 
                                        subject,month_year_passing,roll_no,net_jrf,examining_body,any_other_test from ugcnet where applicant_id = ' . intval($existingApplicantId));
                            }
                            if(count($this->Articleconference->find('all', ['conditions' => ['Articleconference.applicant_id' => intval($this->Session->read('applicant_id'))]])) === 0) {
                                $this->Articleconference->query('insert into articleconference (applicant_id,authors,title_of_book,title_of_article,journal_no_ugc,place_of_publication,publisher_ISBN,page_no) select ' . $this->Session->read('applicant_id') . ', 
                                        authors,title_of_book,title_of_article,journal_no_ugc,place_of_publication,publisher_ISBN,page_no from articleconference where applicant_id = ' . intval($existingApplicantId));
                            }
                            if(count($this->Articleperiodical->find('all', ['conditions' => ['Articleperiodical.applicant_id' => intval($this->Session->read('applicant_id'))]])) === 0) {
                                $this->Articleperiodical->query('insert into articleperiodical (applicant_id,authors,title_of_book,title_of_article,journal_no_ugc,place_of_publication,publisher_ISBN,page_no) select ' . $this->Session->read('applicant_id') . ', 
                                        authors,title_of_book,title_of_article,journal_no_ugc,place_of_publication,publisher_ISBN,page_no from articleperiodical where applicant_id = ' . intval($existingApplicantId));
                            }
                            if(count($this->Seminarorganized->find('all', ['conditions' => ['Seminarorganized.applicant_id' => intval($this->Session->read('applicant_id'))]])) === 0) {
                                $this->Seminarorganized->query('insert into seminarorganized (applicant_id,national_no,international_no,total,source_of_funding) select ' . $this->Session->read('applicant_id') . ', 
                                        national_no,international_no,total,source_of_funding from seminarorganized where applicant_id = ' . intval($existingApplicantId));
                            }
                        }
                        return true;
                    }
                    else {
                        return true;
                    }
                }
            }
            return false;
        }
        
        function _prepareFirst() {
        if (!empty($this->Session->read('registration_id')) && !empty($this->Session->read('applicant_id'))) {
            $registration_data = $applicants = [];
            if(preg_match('/^.*first$/', Router::url( $this->referer(), true)) == 1) {
            }
            else {
                $this->request->data = [];
            }
            if(empty($this->request->data)) {
                $registration_data = $this->Registereduser->find('all', array(
                'conditions' => array('Registereduser.id' => $this->Session->read('registration_id'))));
                $applicants = $this->Applicant->find('all', array(
                    'conditions' => array('Applicant.id' => $this->Session->read('applicant_id'))));
            }
            //debug($applicants); debug(Router::url( $this->referer(), true )); return false;
            if (count($applicants) == 1 && empty($this->request->data)) {
                $applicants['0']['Applicant']['post_applied_for'] = $this->getPostAppliedFor();
                $applicants['0']['Applicant']['centre'] = $this->getCentreAppliedFor();
                //$applicants['0']['Applicant']['area'] = $this->getAreaAppliedFor();
                //debug($this->request->data); return false;
                if(empty($this->request->data))
                    $this->request->data = $applicants['0'];
                $this->Session->write('MultiStepForm.applicantId', $applicants['0']['Applicant']['id']);
                $maritalStatusSelected = $applicants['0']['Applicant']['marital_status'];
                $postAppliedFor = $applicants['0']['Applicant']['post_applied_for'];
                //$category = $applicants['0']['Applicant']['category'];
                $gender = $applicants['0']['Applicant']['gender'];
                $physically_disabled = $applicants['0']['Applicant']['physically_disabled'];
                $this->set('maritalStatusSelected', $maritalStatusSelected);
                //$this->set('category', $category);
                $this->set('gender', $gender);
                $this->set('physically_disabled', $physically_disabled);
                $this->set('postAppliedFor', $postAppliedFor);
            } else if(empty($this->request->data)) {
                $this->Session->setFlash('The form has been submitted and cannot be modified.');
                $this->redirect(array('controller' => 'form', 'action' => 'generalinformation'));
            }
        } else {
            $this->redirect(array('controller' => 'users', 'action' => 'logout'));
        }
    }

    function _processFirst() {
        $this->Applicant->create();    
        $this->Applicant->set($this->data);
        if($this->Applicant->validates()) { //&& $this->User->validates()) {
            $this->Applicant->save();
            return true;
        }
        return false;
    }
        
        function _prepareSecond() {
            if (!empty($this->Session->read('applicant_id'))) {
                $temp = $this->Session->read('applicant_id');
                $education_arr = $misc = $images = $data = $ugcnet_arr = [];
                if(preg_match('/^.*second$/', Router::url( $this->referer(), true)) == 1) {
                }
                else {
                    $this->request->data = [];
                }
                $images = $this->Document->find('all', array(
                        'conditions' => array('Document.applicant_id' => $this->Session->read('applicant_id'))));
                //debug($images); debug(Router::url( $this->referer(), true )); return false;
                if(empty($this->request->data)) {
                    $education_arr = $this->Education->find('all', array(
                            'conditions' => array('Education.applicant_id' => $this->Session->read('applicant_id'))));
                    $misc = $this->Applicant->find('all', array(
                            'conditions' => array('Applicant.id' => $this->Session->read('applicant_id'))));
                    $data = [];
                    $ugcnet_arr = $this->Ugcnet->find('all', array(
                            'conditions' => array('Ugcnet.applicant_id' => $this->Session->read('applicant_id'))));
                }
                if(count($images) == 0 && empty($this->request->data)) {
                    $this->Document->create();    
                    $this->Document->set(['applicant_id' => $this->Session->read('applicant_id')]);
                    if($this->Document->save()) {
                        $images = $this->Document->find('all', array(
                                    'conditions' => array('Document.applicant_id' => $this->Session->read('applicant_id'))));
                    }
                }
                else if(count($images) > 1) {
                    $this->Session->setFlash('An error has occured. Please contact Support.');
                    return false;
                }
                //print_r($this->Session->read('applicant_id'));
                //if(count($education_arr) == 7 || count($education_arr) == 12) {
                    //$this->request->data = $education_arr;
                $educationId_arr = array();
                $education_data = array();
                foreach($education_arr as $key => $value){
                    $educationId_arr[$key] = $value['Education']['id'];
                    $education_data[$key] = $education_arr[$key]['Education'];
                }
                
                $ugcnetId_arr = array();
                $ugcnet_data = array();
                foreach($ugcnet_arr as $key => $value) {
                    $ugcnetId_arr[$key] = $value['Ugcnet']['id'];
                    $ugcnet_data[$key] = $ugcnet_arr[$key]['Ugcnet'];
                }
                
                if(empty($this->request->data)) {
                    $this->request->data = array('Education' => $education_data,
                                                'Applicant' => !empty($misc) ?  $misc['0']['Applicant'] : array(),
                                                'Applicantugcnet' => !empty($misc) ?  $misc['0']['Applicant'] : array(),
                                                'Document' => $images['0']['Document'],
                                                'Ugcnet' => $ugcnet_data);
                }
                    //$this->Session->write('MultiStepForm.educationId_arr', $educationId_arr);
                //}
                //else if(count($education_arr) > 7) {
                //    $this->Session->setFlash('An error has occured. Please contact Support.');
                //}
            }
	    else {
		$this->redirect(array('controller' => 'users', 'action' => 'logout'));
	    }
        }
        
        function _processSecond($count = 1) {
            //debug($this->data); return false;
            if($this->data['modified'] == 'true') {
                $this->Ugcnet->deleteAll( array('Ugcnet.applicant_id' => $this->Session->read('applicant_id')));
            }
            $rows = $this->Education->find('all', array('conditions' => array('Education.applicant_id' => $this->Session->read('applicant_id'))));
            
            if(count($rows) == 13 && empty($this->data['Education'][0]['id'])) {
                $this->Session->setFlash('An error has occured. Please logout and login again or contact Support.');
                return false;
            }
            if($this->getPostAppliedFor() == "Assistant Professor" && (empty($this->data['Education'][6]['course']) || (!empty($this->data['Applicantugcnet']['national_test_qualified']) 
                    && $this->data['Applicantugcnet']['national_test_qualified'] == "yes" && empty($this->data['Ugcnet'][0]['subject'])))) {
                $this->Session->setFlash('Ph.D. Awarded and NET details are compulsory.');
                return false;
            }
            //debug($this->data);
            if($this->Education->saveMany($this->data['Education']) 
                    && $this->Applicantugcnet->save($this->data['Applicantugcnet']) 
                    && $this->Document->save($this->data['Document']) && $this->Ugcnet->saveMany($this->data['Ugcnet'])) { 
                return true;
            }
            //debug($this->Applicantugcnet->validationErrors);
            if($this->Applicantugcnet->validationErrors) {
                $this->Session->setFlash('The fields in UGC-NET are not filled correctly. Please correct and then save/submit.');
            }
            if($this->Document->validationErrors) {
                //debug($this->Document->validationErrors);
                $this->Session->setFlash('The file upload has errors. Please correct and then save/submit.');
            }
            if($this->Education->validationErrors) {
                $this->Session->setFlash('The fields in Education Qualifications are not filled correctly. Please correct and then save/submit.');
            }
            return false;
	}
        
        function _prepareThird() {
            //if ($this->Auth->loggedIn()) {
                $data = $exp_arr = $expphd_arr = $misc = array();
                if(preg_match('/^.*third$/', Router::url( $this->referer(), true)) == 1) {
                }
                else {
                    $this->request->data = [];
                }
                if(empty($this->request->data)) {
                    $exp_arr = $this->Experience->find('all', array(
                            'conditions' => array('Experience.applicant_id' => $this->Session->read('applicant_id'))));
                    $expphd_arr = $this->Experiencephd->find('all', array(
                            'conditions' => array('Experiencephd.applicant_id' => $this->Session->read('applicant_id'))));
                    $misc = $this->Applicant->find('all', array(
                            'conditions' => array('Applicant.id' => $this->Session->read('applicant_id'))));
                }
                $expId_arr = array();
                $exp_data = array();
                foreach($exp_arr as $key => $value){
                    $expId_arr[$key] = $value['Experience']['id'];
                    $exp_data[$key] = $exp_arr[$key]['Experience'];
                }
                $data['Experience'] = $exp_data;
                
                $expphdId_arr = array();
                $expphd_data = array();
                foreach($expphd_arr as $key => $value){
                    $expphdId_arr[$key] = $value['Experiencephd']['id'];
                    $expphd_data[$key] = $expphd_arr[$key]['Experiencephd'];
                }
                $data['Experiencephd'] = $expphd_data;
                
                if(count($misc) == 1) {
                    $data['Applicant'] = $misc['0']['Applicant'];
                    //$this->Session->write('MultiStepForm.miscexpId', $misc['0']['Misc']['id']);
                }
                else if(count($misc) > 1) {
                    $this->Session->setFlash('An error has occured. Please contact Support.');
                }
                if(empty($this->request->data)) {
                    $this->request->data = $data;
                }
            //}
            
        }
        
        function _processThird($count = 1) {
            //debug($this->data); //return false;
            $rows = $this->Experiencephd->find('all', array('conditions' => array('Experiencephd.applicant_id' => $this->Session->read('applicant_id'))));
            if(count($rows) == 7 && empty($this->data['Experiencephd'][0]['id'])) {
                $this->Session->setFlash('An error has occured. Please logout and login again.');
                return false;
            }
            
            //debug($this->data['Experience']); return false;
            $sumDays = 0;
            $sumMonths = 0;
            $sumYears = 0;
            $sumDaysPhd = 0;
            $sumMonthsPhd = 0;
            $sumYearsPhd = 0;
            $totalDays = 0;
            $totalMonths = 0;
            $totalYears = 0;
            $totalDaysPhd = 0;
            $totalMonthsPhd = 0;
            $totalYearsPhd = 0;
            //debug($this->data['Experience']);
            if(count($this->data['Experience']) >= 2) {
                foreach(($arry = array_keys($this->data['Experience'])) as $key => $value) {
                    if($key < (count($this->data['Experience'])-1) && !empty($this->data['Experience'][$arry[$key]]['from_date'])
                            && !empty($this->data['Experience'][$arry[$key+1]]['to_date'])
                            && strtotime(str_replace('/', '-', $this->data['Experience'][$arry[$key]]['from_date'])) < strtotime(str_replace('/', '-', $this->data['Experience'][$arry[$key+1]]['to_date']))){
                        $this->Session->setFlash('The dates in period of experience are filled incorrectly. Please correct.');
                        return false;
                    }
                    $str = $this->data['Experience'][$arry[$key]]['no_of_yrs_mnths_days'];
                    if(!empty($str)) {
                        $arr = explode(",", $str);
                        $sumDays += intval($arr[2]);
                        $sumMonths += intval($arr[1]);
                        $sumYears += intval($arr[0]);
                    }
                }
            }
            else if(count($this->data['Experience']) == 1) {
                foreach(($arry = array_keys($this->data['Experience'])) as $key => $value) {
                    $str = $this->data['Experience'][$arry[$key]]['no_of_yrs_mnths_days'];
                    if(!empty($str)) {
                        $arr = explode(",", $str);
                        $sumDays += intval($arr[2]);
                        $sumMonths += intval($arr[1]);
                        $sumYears += intval($arr[0]);
                    }
                }
            }
            //debug($this->data['Experiencephd']); return false;
            if(count($this->data['Experiencephd']) >= 2) {
                foreach(($arry = array_keys($this->data['Experiencephd'])) as $key => $value) {
                    if($key < (count($this->data['Experiencephd'])-1) && !empty($this->data['Experiencephd'][$arry[$key]]['from_date'])
                            && !empty($this->data['Experiencephd'][$arry[$key+1]]['to_date'])
                            && strtotime(str_replace('/', '-', $this->data['Experiencephd'][$arry[$key]]['from_date'])) < strtotime(str_replace('/', '-', $this->data['Experiencephd'][$arry[$key+1]]['to_date']))){
                        $this->Session->setFlash('The dates in period of experience during Ph.D. are filled incorrectly. Please correct.');
                        return false;
                    }
                    $str = $this->data['Experiencephd'][$arry[$key]]['no_of_mnths_yrs'];
                    if(!empty($str)) {
                        $arr = explode(",", $str);
                        $sumDaysPhd += intval($arr[2]);
                        $sumMonthsPhd += intval($arr[1]);
                        $sumYearsPhd += intval($arr[0]);
                    }
                }
            }
            else if(count($this->data['Experiencephd']) == 1) {
                foreach(($arry = array_keys($this->data['Experiencephd'])) as $key => $value) {
                    $str = $this->data['Experiencephd'][$arry[$key]]['no_of_mnths_yrs'];
                    if(!empty($str)) {
                        $arr = explode(",", $str);
                        $sumDaysPhd += intval($arr[2]);
                        $sumMonthsPhd += intval($arr[1]);
                        $sumYearsPhd += intval($arr[0]);
                    }
                }
            }
            $totalDays = ($sumDays%31);
            $totalMonths = (($sumMonths+ intval(($sumDays/31)))%12);
            $totalYears = $sumYears + intval(($sumMonths+ intval(($sumDays/31)))/12);
            $totalDaysPhd = ($sumDaysPhd%31);
            $totalMonthsPhd = (($sumMonthsPhd+ intval(($sumDaysPhd/31)))%12);
            $totalYearsPhd = $sumYearsPhd + intval(($sumMonthsPhd+ intval(($sumDaysPhd/31)))/12);
            $this->request->data['Applicant']['calculated_exp_years'] = $totalYears;
            $this->request->data['Applicant']['calculated_exp_months'] = $totalMonths;
            $this->request->data['Applicant']['calculated_exp_days'] = $totalDays;
            $this->request->data['Applicant']['calculated_expphd_years'] = $totalYearsPhd;
            $this->request->data['Applicant']['calculated_expphd_months'] = $totalMonthsPhd;
            $this->request->data['Applicant']['calculated_expphd_days'] = $totalDaysPhd;
            
            if($this->data['modified'] == 'true') {
                $this->Experience->deleteAll( array('Experience.applicant_id' => $this->Session->read('applicant_id')));
            }
            if($this->data['modifiedphd'] == 'true') {
                $this->Experiencephd->deleteAll( array('Experiencephd.applicant_id' => $this->Session->read('applicant_id')));
            }
            //debug($totalYears);debug($totalMonths);debug($totalDays); return false;
            $dataSaved = true;
            try {
                foreach($this->data['Experience'] as $key => $value){
                    if(empty($this->request->data['Experience'][$key]['id'])) {
                        $this->request->data['Experience'][$key]['id'] = "";
                    }
                    if($this->Experience->save($this->data['Experience'][$key])){
                    }
                    else {
                        $dataSaved = false;
                    } 
                }
                if(!empty($this->data['Applicant']['exp_during_phd']) && $this->data['Applicant']['exp_during_phd'] == "yes") {
                    foreach($this->data['Experiencephd'] as $key => $value){
                        //debug($this->data['Experiencephd'][$key]);
                        if(empty($this->request->data['Experiencephd'][$key]['id'])) {
                            $this->request->data['Experiencephd'][$key]['id'] = "";
                        }
                        if($this->Experiencephd->save($this->data['Experiencephd'][$key])){

                        }
                        else {
                            $dataSaved = false;
                        }
                    }
                }
                //return false;
                if($this->Applicant->save($this->data['Applicant']) && $dataSaved == true) {
                    return true;
                }
            }
            catch(\Exception $e) {
                $this->Session->setFlash('Unable to save data on Expereince page. Please contact Support.');
                debug($e);
                return false;
            }
            return false;
	}
        
        function _prepareFourth() {
            $temp = $this->Session->read('applicant_id');
            $researchpaper_arr = $researcharticle_arr = $researchproject_arr = $researcharticleconf_arr = 
                    $researcharticleperiodical_arr = $seminarorg_arr = $newAPIScore = $misc = $images = [];
            if(preg_match('/^.*fourth$/', Router::url( $this->referer(), true)) == 1) {
            }
            else {
                $this->request->data = [];
            }
            if(empty($this->request->data)) {
                $researchpaper_arr = $this->Researchpaper->find('all', array(
                        'conditions' => array('Researchpaper.applicant_id' => $this->Session->read('applicant_id'))));
                $researcharticle_arr = $this->Researcharticle->find('all', array(
                        'conditions' => array('Researcharticle.applicant_id' => $this->Session->read('applicant_id'))));
                $researchproject_arr = $this->Researchproject->find('all', array(
                        'conditions' => array('Researchproject.applicant_id' => $this->Session->read('applicant_id'))));
                $researcharticleconf_arr = $this->Articleconference->find('all', array(
                        'conditions' => array('Articleconference.applicant_id' => $this->Session->read('applicant_id'))));
                $researcharticleperiodical_arr = $this->Articleperiodical->find('all', array(
                        'conditions' => array('Articleperiodical.applicant_id' => $this->Session->read('applicant_id'))));
                $seminarorg_arr = $this->Seminarorganized->find('all', array(
                        'conditions' => array('Seminarorganized.applicant_id' => $this->Session->read('applicant_id'))));
                $newAPIScore = $this->NewAPIScore->find('all', array(
                                'conditions' => array('NewAPIScore.id' => $this->Session->read('applicant_id'))));
                $misc = $this->Applicant->find('all', array(
                        'conditions' => array('Applicant.id' => $this->Session->read('applicant_id'))));
                $images = $this->Document->find('all', array(
                    'conditions' => array('Document.applicant_id' => $this->Session->read('applicant_id'))));
            }
            
            $researchpaperId_arr = array();
            $researchpaper_data = array();
            foreach($researchpaper_arr as $key => $value){
                $researchpaperId_arr[$key] = $value['Researchpaper']['id'];
                $researchpaper_data[$key] = $researchpaper_arr[$key]['Researchpaper'];
            }
            
            
            $researcharticleId_arr = array();
            $researcharticle_data = array();
            foreach($researcharticle_arr as $key => $value){
                $researcharticleId_arr[$key] = $value['Researcharticle']['id'];
                $researcharticle_data[$key] = $researcharticle_arr[$key]['Researcharticle'];
            }
            
            $researchprojectId_arr = array();
            $researchproject_data = array();
            foreach($researchproject_arr as $key => $value){
                $researchprojectId_arr[$key] = $value['Researchproject']['id'];
                $researchproject_data[$key] = $researchproject_arr[$key]['Researchproject'];
            }
            
            $researcharticleconfId_arr = array();
            $researcharticleconf_data = array();
            foreach($researcharticleconf_arr as $key => $value){
                $researcharticleconfId_arr[$key] = $value['Articleconference']['id'];
                $researcharticleconf_data[$key] = $researcharticleconf_arr[$key]['Articleconference'];
            }
            
            $researcharticleperiodicalId_arr = array();
            $researcharticleperiodical_data = array();
            foreach($researcharticleperiodical_arr as $key => $value){
                $researcharticleperiodicalId_arr[$key] = $value['Articleperiodical']['id'];
                $researcharticleperiodical_data[$key] = $researcharticleperiodical_arr[$key]['Articleperiodical'];
            }
            
            $seminarorgId_arr = array();
            $seminarorg_data = array();
            foreach($seminarorg_arr as $key => $value){
                $seminarorgId_arr[$key] = $value['Seminarorganized']['id'];
                $seminarorg_data[$key] = $seminarorg_arr[$key]['Seminarorganized'];
            }
            
            if(count($images) == 0 && empty($this->request->data)) {
                $this->Document->create();    
                $this->Document->set(['applicant_id' => $this->Session->read('applicant_id')]);
                if($this->Document->save()) {
                    $images = $this->Document->find('all', array(
                                'conditions' => array('Document.applicant_id' => $this->Session->read('applicant_id'))));
                }
            }
            else if(count($images) > 1) {
                $this->Session->setFlash('An error has occured. Please contact Support.');
                return false;
            }
                        
            if(count($misc) > 1) {
                $this->Session->setFlash('An error has occured. Please contact Support.');
                return false;
            }
            if(empty($this->request->data)) {
            $this->request->data = array('Researchpaper' => $researchpaper_data,
                                         'Researcharticle' => $researcharticle_data,
                                         'Researchproject' => $researchproject_data,
                                         'Articleconference' => $researcharticleconf_data,
                                         'Articleperiodical' => $researcharticleperiodical_data,
                                         'Seminarorganized' => $seminarorg_data,
                                         'Applicant' => $misc['0']['Applicant'],
                                         'Applicantext' => $misc['0']['Applicant'],
                                         'Document' => $images['0']['Document'],
                                         'NewAPIScore' => $newAPIScore['0']['NewAPIScore']);
            }
                                         //'ApiScore' => $api['0']['ApiScore']);
        }
        
        private function getJsonObject($misc = array()) {
            $obj = array( '0' => array( 'mem_pro_bodies' => $misc['0']['Applicant']['mem_pro_bodies']),
                          '1' => array( 'convicted' => $misc['0']['Applicant']['convicted']),
                          '2' => array( 'pending_court' => $misc['0']['Applicant']['pending_court']),
                          '3' => array( 'willg_min_pay' => $misc['0']['Applicant']['willg_min_pay'])
                        );
            return $obj;
        }
        
        function _processFourth($count = 1) {
            //debug($this->data); return false;
            $applicant = $this->Applicant->find('all', array(
                        'conditions' => array('Applicant.id' => $this->Session->read('applicant_id'))));
            if($this->data['modified_papers'] == 'true') {
                $researchpaper_arr = $this->Researchpaper->deleteAll( array('Researchpaper.applicant_id' => $this->Session->read('applicant_id')));
            }
            //print_r($this->data);
            if($this->data['modified_articles'] == 'true') {
                $researchpaper_arr = $this->Researcharticle->deleteAll( array('Researcharticle.applicant_id' => $this->Session->read('applicant_id')));
            }
            
            if($this->data['modified_articles_conference'] == 'true') {
                $researcharticleconf_arr = $this->Articleconference->deleteAll( array('Articleconference.applicant_id' => $this->Session->read('applicant_id')));
            }
            
            if($this->data['modified_articles_periodicals'] == 'true') {
                $researcharticleperiodical_arr = $this->Articleperiodical->deleteAll( array('Articleperiodical.applicant_id' => $this->Session->read('applicant_id')));
            }
            
            if($this->data['modified_rp'] == 'true') {
                $researchpaper_arr = $this->Researchproject->deleteAll( array('Researchproject.applicant_id' => $this->Session->read('applicant_id')));
            }
            
            if($this->data['modified_org'] == 'true') {
                $seminarorg_arr = $this->Seminarorganized->deleteAll( array('Seminarorganized.applicant_id' => $this->Session->read('applicant_id')));
            }
            
            if($this->Researchpaper->saveMany($this->data['Researchpaper']) && $this->Researcharticle->saveMany($this->data['Researcharticle'])
                    && $this->Applicant->save($this->data['Applicant']) && $this->Researchproject->saveMany($this->data['Researchproject'])
                    && $this->Articleconference->saveMany($this->data['Articleconference']) && $this->Articleperiodical->saveMany($this->data['Articleperiodical'])
                    && $this->Seminarorganized->saveMany($this->data['Seminarorganized'])) {
                return true;
            }
            if($this->Document->validationErrors) {
                //debug($this->Document->validationErrors);
                $this->Session->setFlash('The file upload has errors. Please correct and then save/submit.');
            }
            return false;
	}
        
        function _prepareFifth() {
            $applicant = $peerrecognition_arr = $data = [];
            if(preg_match('/^.*fifth$/', Router::url( $this->referer(), true)) == 1) {
            }
            else {
                $this->request->data = [];
            }
            if(empty($this->request->data)) {
            $applicant = $this->Applicant->find('all', array(
                    'conditions' => array('Applicant.id' => $this->Session->read('applicant_id'))));
            $peerrecognition_arr = $this->Peerrecognition->find('all', array(
                    'conditions' => array('Peerrecognition.applicant_id' => $this->Session->read('applicant_id'))));
            $data['Applicant'] = $applicant['0']['Applicant'];
            $data['Applicantext'] = $applicant['0']['Applicant'];
            }

            
            $peerrecognitionId_arr = array();
            $peerrecognition_data = array();
            foreach($peerrecognition_arr as $key => $value){
                $peerrecognitionId_arr[$key] = $value['Peerrecognition']['id'];
                $peerrecognition_data[$key] = $peerrecognition_arr[$key]['Peerrecognition'];
            }
            
            $data['Peerrecognition'] = $peerrecognition_data;
            
            if(count($applicant) == 1) {
                if(empty($this->request->data)) {
                    $this->request->data = $data;
                }
                $this->set('json_radio', $this->getJsonObject($applicant));
                //$this->Session->write('MultiStepForm.miscIdEighth', $misc['0']['Misc']['id']);
            }
            else if(count($applicant) > 1) {
                $this->Session->setFlash('An error has occured. Please contact Support.');
                return false;
            }
        }
        
        function _processFifth($count = 1) {
            //debug($this->data); return false;
            
            if($this->data['modified_peers'] == 'true') {
                $researcharticleperiodical_arr = $this->Peerrecognition->deleteAll( array('Peerrecognition.applicant_id' => $this->Session->read('applicant_id')));
            }
            
            if($this->Applicant->save($this->data['Applicant']) && $this->Peerrecognition->saveMany($this->data['Peerrecognition'])
                    && $this->Applicantext->save($this->data['Applicantext'])) {
                return true;
            }
            //debug($this->Applicant->validationErrors); debug($this->Applicantext->validationErrors);
            foreach($this->Applicantext->validationErrors as $key => $value) {
                if(preg_match('/^list.*/', $key) == 1) {
                    $arr = explode('_', $key);
                    $this->Session->setFlash('The no. of documents is compulsory. Please fill value in column next to selected checkbox ' . strtoupper($arr[1]));
                    return false;
                }
            }
            $this->Session->setFlash('An error has occured during saving data (P5). Please check the details entered.');
            return false;
	}
        
        function _prepareSixth() {
            $images = $this->Document->find('all', array(
                    'conditions' => array('Document.applicant_id' => $this->Session->read('applicant_id'))));
            $applicant = $this->Applicant->find('all', array(
                    'conditions' => array('Applicant.id' => $this->Session->read('applicant_id'))));
           
            if(count($images) == 0) {
                //debug($images);
                $this->Document->create();    
                $this->Document->set(['applicant_id' => $this->Session->read('applicant_id')]);
                if($this->Document->save()) {
                    //debug($images);
                    $images = $this->Document->find('all', array(
                                'conditions' => array('Document.applicant_id' => $this->Session->read('applicant_id'))));
                    //debug($images);
                }
            }
            else if(count($images) > 1) {
                $this->Session->setFlash('An error has occured. Please contact Support.');
                return false;
            }
            else if(count($images) == 1) {
                $this->request->data = $images['0'];
            }
            if(count($applicant) == 1) {
                $this->set('applicant', $applicant['0']);
            }
        }
        
        function _processSixth() {
            $images = $this->Document->find('all', array(
                    'conditions' => array('Document.applicant_id' => $this->Session->read('applicant_id'))));
            $applicant = $this->Applicant->find('all', array(
                    'conditions' => array('Applicant.id' => $this->Session->read('applicant_id'))));
            if(count($images) === 1) {
                $errorStr = '';
                $flag = false;
                if(empty($images['0']['Document']['filename']) && !empty($this->data['Document']['filename']['error']) && $this->data['Document']['filename']['error'] !== 0) {
                    $errorStr .= "Passport size photograph is COMPULSORY. ";
                    $flag = true;
                }
                if(empty($images['0']['Document']['filename2']) && !empty($this->data['Document']['filename2']['error']) && $this->data['Document']['filename2']['error'] !== 0) {
                    $errorStr .= "Date of birth certificate is COMPULSORY. ";
                    $flag = true;
                }
                if(empty($images['0']['Document']['filename4']) && !empty($this->data['Document']['filename4']['error']) && $this->data['Document']['filename4']['error'] !== 0) {
                    $errorStr .= "Signature is COMPULSORY. ";
                    $flag = true;
                }
                if(($applicant[0]['Applicant']['category'] == "SC" || $applicant[0]['Applicant']['category'] == "ST" || $applicant[0]['Applicant']['category'] == "OBC") && empty($images['0']['Document']['filename3']) && !empty($this->data['Document']['filename3']['error']) && $this->data['Document']['filename3']['error'] !== 0) {
                    $errorStr .= "Valid Caste Certificate is COMPULSORY.";
                    $flag = true;
                }
                if((!empty($applicant[0]['Applicant']['physically_disabled']) && $applicant[0]['Applicant']['physically_disabled'] == "yes") && empty($images['0']['Document']['filename8']) && !empty($this->data['Document']['filename8']['error']) && $this->data['Document']['filename8']['error'] !== 0) {
                    $errorStr .= "Person with Disability Certificate is COMPULSORY.";
                    $flag = true;
                }
                if($flag === true) {
                    $this->Session->setFlash($errorStr);
                    return false;
                }
            }
            else if(count($images) > 1) {
                $this->Session->setFlash('An error has occured. Please contact Support.');
                return false;
            }
            else {
                $this->Session->setFlash('An error has occured. Please contact Support.');
                return false;
            }
            
            if(!empty($this->data['Document']['filename']['error']) && $this->data['Document']['filename']['error'] == 4
                && !empty($this->data['Document']['filename2']['error']) && $this->data['Document']['filename2']['error'] == 4
                && !empty($this->data['Document']['filename4']['error']) && $this->data['Document']['filename4']['error'] == 4
		&& !empty($this->data['Document']['filename3']['error']) && $this->data['Document']['filename3']['error'] == 4
                && !empty($this->data['Document']['filename5']['error']) && $this->data['Document']['filename5']['error'] == 4
               ) {
                    return true;
               }
            
            if ($this->Document->save($this->data['Document'])) {
                return true;
            }
            return false;
        }
        
	function _prepareSeventh($count = 1) {
            $images = $this->Document->find('all', array(
                    'conditions' => array('Document.applicant_id' => $this->Session->read('applicant_id'))));
            
            $applicant = $this->Applicant->find('all', array(
                    'conditions' => array('Applicant.id' => $this->Session->read('applicant_id'))));
            
            if(count($images) == 1) {
                $this->set('image', $images['0']);
                $this->set('applicant', $applicant['0']);
                //print_r($this->request->data);
            }
            else if(count($images) > 1) {
                $this->Session->setFlash('An error has occured. Please contact Support.');
                return false;
            }
            else {
                $this->Session->setFlash('Kindly upload the compulsory documents.');
                return false;
            }
	}

	function _processSeventh($count = 1) {
            return true;
	}
        
	function _prepareEighth($count = 1) {
            $applicants = $this->NewAPIScore->find('all', array(
                            'conditions' => array('NewAPIScore.id' => $this->Session->read('applicant_id'))));
            $images = $this->Document->find('all', array(
                    'conditions' => array('Document.applicant_id' => $this->Session->read('applicant_id'))));
            //if($applicants[0]['NewAPIScore']['post_applied_for'] === "Assistant Professor") {
              //  $this->wizard('ninth');
            //}
            //else {
               $this->request->data = array('NewAPIScore' => $applicants[0]['NewAPIScore'],
                                            'Document' => $images[0]['Document']);
            //}
	}
        
        function _processEighth() {
            //debug($this->data); return false;
            if(!empty($this->data['Document'])) {
                $this->Document->save($this->data['Document']);
            }
            if($this->NewAPIScore->save($this->data['NewAPIScore'])) {
            }
            else {
                return false;
            }
            return true;
        }
        
        function _prepareNinth($count = 1) {
            $applicants = $this->Applicant->find('all', array(
                            'conditions' => array('Applicant.id' => $this->Session->read('applicant_id'))));
            if($applicants['0']['Applicant']['category'] == "SC" || $applicants['0']['Applicant']['category'] == "ST" 
                        || $applicants['0']['Applicant']['physically_disabled'] == "yes") {
                    //$this->set('payment_status', "0");
                    $this->set('exempted', '0');
            }
            else {
                $this->set('payment_status', $applicants['0']['Applicant']['response_code']);
            }
	}
        
        function _processNinth() {
            
        }
        
        function index($count = 1) {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                $this->set('data_set', 'false');
                $applicant_number=intval($this->data['Applicant']['applicant_number']);
                if(!is_numeric($applicant_number)) {
                    $this->Session->setFlash('Please enter numbers only.');
                    return false;
                }
                $applicants = $this->Applicant->find('all', array(
                    'conditions' => array('Applicant.user_id' => $applicant_number)));
                if (count($applicants) == 0) {
                    return false;
                }
                $education_arr = $this->Education->find('all', array(
                    'conditions' => array('Education.user_id' => $applicant_number)));

                $exp_arr = $this->Experience->find('all', array(
                    'conditions' => array('Experience.user_id' => $applicant_number)));
                $miscexp = $this->Miscexp->find('all', array(
                    'conditions' => array('Miscexp.user_id' => $applicant_number)));
                $adacdemic_dist = $this->Academic_dist->find('all', array(
                    'conditions' => array('Academic_dist.user_id' => $applicant_number)));
                $image = $this->Image->find('all', array(
                    'conditions' => array('Image.user_id' => $applicant_number)));

                $researchpapers = $this->Researchpaper->find('all', array(
                    'conditions' => array('Researchpaper.user_id' => $applicant_number)));
                $researcharticles = $this->Researcharticle->find('all', array(
                    'conditions' => array('Researcharticle.user_id' => $applicant_number)));
                $misc = $this->Misc->find('all', array(
                    'conditions' => array('Misc.user_id' => $applicant_number)));
                echo count($applicants) . count($education_arr) . count($exp_arr) . count($miscexp) . count($adacdemic_dist) . count($image) . count($researchpapers) . count($researcharticles) . count($misc) ;
                if (count($education_arr) == 0 || count($exp_arr) == 0 || count($miscexp) == 0 
                        || count($adacdemic_dist) == 0 || count($researchpapers) == 0 
                        || count($researcharticles) == 0 || count($misc) == 0 || count($image) == 0) {
                    $this->set('applicant', $applicants['0']);
                    if(count($education_arr) != 0) 
                        $this->set('education_arr', $education_arr);
                    if(count($exp_arr) != 0) 
                        $this->set('exp_arr', $exp_arr);
                    if(count($miscexp) != 0) 
                        $this->set('miscexp', $miscexp['0']);
                    if(count($adacdemic_dist) != 0)
                        $this->set('academic_dist', $adacdemic_dist);
                    if(count($researchpapers) != 0)
                        $this->set('researchpapers', $researchpapers);
                    if(count($researcharticles) != 0)
                        $this->set('researcharticles', $researcharticles);
                    if(count($image) != 0)
                        $this->set('image', $image['0']);
                    if(count($misc) != 0)
                        $this->set('misc', $misc['0']);
                    $this->set('data_set', 'true');
                }
                elseif (count($applicants) == 1 && (count($education_arr) == 7 || count($education_arr) == 12) 
                        && count($exp_arr) == 6 && count($miscexp) == 1 && count($adacdemic_dist) == 4 
                        && count($image) == 1 && count($researchpapers) == 10 && count($researcharticles) == 10 
                        && count($misc) == 1) {
                    $this->set('applicant', $applicants['0']);
                    $this->set('education_arr', $education_arr);
                    $this->set('exp_arr', $exp_arr);
                    $this->set('miscexp', $miscexp['0']);
                    $this->set('academic_dist', $adacdemic_dist);
                    $this->set('image', $image['0']);
                    $this->set('researchpapers', $researchpapers);
                    $this->set('researcharticles', $researcharticles);
                    $this->set('misc', $misc['0']);
                    $this->set('data_set', 'true');
                } else {
                    $this->Session->setFlash('An error has occured. Please contact Support.');
                    return false;
                }
            } else {
                $this->Session->setFlash(__('Invalid username or password'));
            }
        }
    }
    
    function getPostAppliedFor() {
        $current_post_applied = !empty($this->request->query['post']) ? $this->request->query['post'] : NULL;
        if (!empty($current_post_applied)) {
            //$this->set('postAppliedFor', $current_post_applied);
            $this->Session->write(Configure::read('GENERALINFO.post'), $current_post_applied);
            return $current_post_applied;
        } else if (!empty($this->Session->read(Configure::read('GENERALINFO.post')))) {
            //$this->set('postAppliedFor', $this->Session->read('post_applied_for'));
            return $this->Session->read(Configure::read('GENERALINFO.post'));
        } else {
            $this->Session->setFlash('Please select a post and then continue.');
            $this->redirect(array('controller' => 'form', 'action' => 'generalinformation'));
        }
    }
    
    function getAreaAppliedFor() {
        $current_area_applied = !empty($this->request->query['area']) ? urldecode($this->request->query['area']) : NULL;
        if (!empty($current_area_applied)) {
            //$this->set('postAppliedFor', $current_post_applied);
            $this->Session->write(Configure::read('GENERALINFO.area'), $current_area_applied);
            return $current_area_applied;
        } else if (!empty($this->Session->read(Configure::read('GENERALINFO.area')))) {
            //$this->set('postAppliedFor', $this->Session->read('post_applied_for'));
            return $this->Session->read(Configure::read('GENERALINFO.area'));
        } else {
            $this->Session->setFlash('Please select Area and then continue.');
            $this->redirect(array('controller' => 'form', 'action' => 'generalinformation'));
        }
    }
    
    function getCentreAppliedFor() {
        $current_centre_applied = !empty($this->request->query['centre']) ? urldecode($this->request->query['centre']) : NULL;
        if (!empty($current_centre_applied)) {
            //$this->set('postAppliedFor', $current_post_applied);
            $this->Session->write(Configure::read('GENERALINFO.centre'), $current_centre_applied);
            return $current_centre_applied;
        } else if (!empty($this->Session->read(Configure::read('GENERALINFO.centre')))) {
            //$this->set('postAppliedFor', $this->Session->read('post_applied_for'));
            return $this->Session->read(Configure::read('GENERALINFO.centre'));
        } else {
            $this->Session->setFlash('Please select a Centre and then continue.');
            $this->redirect(array('controller' => 'form', 'action' => 'generalinformation'));
        }
    }
    
    private function checkAgeAsPerPost($age, $post, $category, $pwd, $dep, $internal) {
        $relaxation = 0;
        if($post == "Deputy Librarian") { //45 y
            if($category == "General" && $dep == "no") {
		if($internal == "yes") {
			$relaxation = 50;
	                return $relaxation;
		}
		else {
			$relaxation = 45;
	                return $relaxation;
		}
            }
            else if($category == "General" && $dep == "yes") {
                $relaxation = 50;
                return $relaxation;
            }
        }
        if($post == "Deputy Registrar") { //45 y
            if($category == "General" && $dep == "no") {
		if($internal == "yes") {
			$relaxation = 50;
	                return $relaxation;
		}
		else {
                	$relaxation = 45;
	                return $relaxation;
		}
            }
            else if($category == "General" && $dep == "yes") {
                $relaxation = 50;
                return $relaxation;
            }
        }
        if($post == "Assistant Librarian") { //35 y
            if($category == "General" && $dep == "no") {
		if($internal == "yes") {
			$relaxation = 40;
	                return $relaxation;
		}
		else {
                	$relaxation = 35;
                	return $relaxation;
		}
            }
            else if($category == "General" && $dep == "yes") {
                $relaxation = 40;
                return $relaxation;
            }
        }
        if($post == "Assistant Registrar") { //35 y
            if($category == "OBC" && $dep == "no") {
		if($internal == "yes") {
			$relaxation = 43;
	                return $relaxation;
		}
		else {
                	$relaxation = 38;
                	return $relaxation;
		}
            }
            else if($category == "OBC" && $dep == "yes") {
                $relaxation = 43;
                return $relaxation;
            }
        }
        if($post == "Information Scientist") { //40 y
            if($category == "General" && $dep == "no") {
		if($internal == "yes") {
			$relaxation = 45;
	                return $relaxation;
		}
		else {
                	$relaxation = 40;
                	return $relaxation;
		}
            }
            else if($category == "General" && $dep == "yes") {
                $relaxation = 45;
                return $relaxation;
            }
        }
        if($post == "Public Relations Officer") { //40 y
            if($category == "General" && $dep == "no") {
		if($internal == "yes") {
			$relaxation = 45;
	                return $relaxation;
		}
		else {
                	$relaxation = 40;
                	return $relaxation;
		}
            }
            else if($category == "General" && $dep == "yes") {
                $relaxation = 45;
                return $relaxation;
            }
        }
        if($post == "Technical Officer (Laboratory)") { //40 y
            if($category == "General" && $dep == "no") {
		if($internal == "yes") {
			$relaxation = 45;
	                return $relaxation;
		}
		else {
                	$relaxation = 40;
                	return $relaxation;
		}
            }
            else if($category == "General" && $dep == "yes") {
                $relaxation = 45;
                return $relaxation;
            }
        }
        if($post == "Security Officer") { //50 y
            if($category == "General" && $dep == "no") {
		if($internal == "yes") {
			$relaxation = 55;
	                return $relaxation;
		}
		else {
                	$relaxation = 50;
                	return $relaxation;
		}
            }
            else if($category == "General" && $dep == "yes") {
                $relaxation = 55;
                return $relaxation;
            }
        }
        if($post == "Nurse") { //35 y
            if($category == "General" && $dep == "no") {
		if($internal == "yes") {
			$relaxation = 40;
	                return $relaxation;
		}
		else {
                	$relaxation = 35;
                	return $relaxation;
		}
            }
            else if($category == "General" && $dep == "yes") {
                $relaxation = 40;
                return $relaxation;
            }
        }
        if($post == "Private Secretary") { //40 y
            if($category == "OBC" && $pwd == "yes") {
                if($dep == "no") {
			if($internal == "yes") {
				$relaxation = 58;
	                	return $relaxation;
			}
			else {
                    		$relaxation = 53;
		                return $relaxation;
			}
                }
                else {
                    $relaxation = 58;
                    return $relaxation;
                }
            }
            else if($category == "OBC" && $pwd == "no") {
                if($dep == "no") {
			if($internal == "yes") {
				$relaxation = 48;
	                	return $relaxation;
			}
			else {
                    		$relaxation = 43;
		                return $relaxation;
			}                
                }
                else {
                    $relaxation = 48;
                    return $relaxation;
                }
            }
            else if($category == "General" && $pwd == "yes"){
                if($dep == "no") {
			if($internal == "yes") {
				$relaxation = 55;
	                	return $relaxation;
			}
			else {
                    		$relaxation = 50;
		                return $relaxation;
			}
                }
                else {
                    $relaxation = 55;
                    return $relaxation;
                }
                
            }
            else if($category == "General" && $pwd == "no"){
                if($dep == "no") {
			if($internal == "yes") {
				$relaxation = 45;
	                	return $relaxation;
			}
			else {
                    		$relaxation = 40;
		                return $relaxation;
			}
                }
                else {
                    $relaxation = 45;
                    return $relaxation;
                }
            }
        }
        if($post == "Personal Assistant") { //35 y
            if($category == "General" && $dep == "no") {
		if($internal == "yes") {
			$relaxation = 40;
	                return $relaxation;
		}
		else {
                	$relaxation = 35;
		        return $relaxation;
		}
            }
            else if($category == "General" && $dep == "yes") {
                $relaxation = 40;
                return $relaxation;
            }
        }
        if($post == "Assistant") { //35 y
            if($category == "OBC" && $dep == "no") {
		if($internal == "yes") {
			$relaxation = 43;
	                return $relaxation;
		}
		else {
                	$relaxation = 38;
		        return $relaxation;
		}
            }
            else if($category == "OBC" && $dep == "yes") {
                $relaxation = 43;
                return $relaxation;
            }
        }
        if($post == "Junior Engineer (Elect)") { //35 y
            if($category == "General" && $dep == "no") {
		if($internal == "yes") {
			$relaxation = 40;
	                return $relaxation;
		}
		else {
                	$relaxation = 35;
		        return $relaxation;
		}
            }
            else if($category == "General" && $dep == "yes") {
                $relaxation = 40;
                return $relaxation;
            }
        }
        if($post == "Estate Officer") { //35 y
            if($category == "General" && $dep == "no") {
		if($internal == "yes") {
			$relaxation = 40;
	                return $relaxation;
		}
		else {
                	$relaxation = 35;
		        return $relaxation;
		}
            }
            else if($category == "General" && $dep == "yes") {
                $relaxation = 40;
                return $relaxation;
            }
        }
        if($post == "Senior Technical Assistant (Computer)") { //35 y
            if($category == "General" && $dep == "no") {
		if($internal == "yes") {
			$relaxation = 40;
	                return $relaxation;
		}
		else {
                	$relaxation = 35;
		        return $relaxation;
		}
            }
            else if($category == "General" && $dep == "yes") {
                $relaxation = 40;
                return $relaxation;
            }
        }
        if($post == "Senior Technical Assistant (Laboratory)") { //35 y
            if($category == "OBC" && $dep == "no") {
		if($internal == "yes") {
			$relaxation = 43;
	                return $relaxation;
		}
		else {
                	$relaxation = 38;
		        return $relaxation;
		}
            }
            else if($category == "OBC" && $dep == "yes") {
                $relaxation = 43;
                return $relaxation;
            }
            else if($category == "General" && $dep == "no"){
		if($internal == "yes") {
			$relaxation = 40;
	                return $relaxation;
		}
		else {
                	$relaxation = 35;
		        return $relaxation;
		}
            }
            else if($category == "General" && $dep == "yes"){
                $relaxation = 40;
                return $relaxation;
            }
        }
        if($post == "Semi Professional Assistant") { //35 y
            if($category == "General" && $dep == "yes") {
                $relaxation = 40;
                return $relaxation;
            }
            else if($category == "General" && $dep == "no") {
		if($internal == "yes") {
			$relaxation = 40;
	                return $relaxation;
		}
		else {
                	$relaxation = 35;
		        return $relaxation;
		}
            }
        }
        if($post == "Pharmacist") { //30 y
            if($pwd == "yes" && $dep == "yes") {
                $relaxation = 40;
                return $relaxation;
            }
            else if($pwd == "yes" && $dep == "no") {
		if($internal == "yes") {
			$relaxation = 45;
	                return $relaxation;
		}
		else {
                	$relaxation = 40;
		        return $relaxation;
		}
            }
        }
        if($post == "Technical Assistant") { //35 y
            if($category == "General" && $dep == "yes") {
                $relaxation = 40;
                return $relaxation;
            }
            else if($category == "General" && $dep == "no") {
		if($internal == "yes") {
			$relaxation = 40;
	                return $relaxation;
		}
		else {
                	$relaxation = 35;
		        return $relaxation;
		}
            }
        }
        if($post == "Security Inspector") { //40 y
            if($category == "General" && $dep == "yes") {
                $relaxation = 40;
                return $relaxation;
            }
            else if($category == "General" && $dep == "no") {
		if($internal == "yes") {
			$relaxation = 45;
	                return $relaxation;
		}
		else {
                	$relaxation = 40;
		        return $relaxation;
		}
            }
        }
        if($post == "Laboratory Assistant") { //30 y
            if($category == "SC" && $dep == "yes") {
                $relaxation = 40;
                return $relaxation;
            }
            else if($category == "SC" && $dep == "no") {
		if($internal == "yes") {
			$relaxation = 40;
	                return $relaxation;
		}
		else {
                	$relaxation = 35;
		        return $relaxation;
		}
            }
            else if($category == "OBC" && $dep == "yes") {
                $relaxation = 40;
                return $relaxation;
            }
            else if($category == "OBC" && $dep == "no") {
		if($internal == "yes") {
			$relaxation = 38;
	                return $relaxation;
		}
		else {
                	$relaxation = 33;
		        return $relaxation;
		}
            }
            else if($category == "General" && $dep == "yes") {
                $relaxation = 40;
                return $relaxation;
            }
            else if($category == "General" && $dep == "no") {
		if($internal == "yes") {
			$relaxation = 35;
	                return $relaxation;
		}
		else {
                	$relaxation = 30;
		        return $relaxation;
		}
            }
        }
        if($post == "Library Assistant") { //30 y
            if($category == "General" && $dep == "yes") {
                $relaxation = 40;
                return $relaxation;
            }
            else if($category == "General" && $dep == "no") {
		if($internal == "yes") {
			$relaxation = 35;
	                return $relaxation;
		}
		else {
                	$relaxation = 30;
		        return $relaxation;
		}
            }
        }
        if($post == "Lower Division Clerk") { //30 y
            if(($category == "SC" || $category == "ST") && $pwd == "no") {
                if($dep == "yes") {
                    $relaxation = 40;
                    return $relaxation;
                }
                else {
			if($internal == "yes") {
				$relaxation = 40;
	                	return $relaxation;
			}
			else {
                		$relaxation = 35;
		        	return $relaxation;
			}
                }
            }
            else if(($category == "SC" || $category == "ST") && $pwd == "yes") {
                if($dep == "yes") {
                    $relaxation = 45;
                    return $relaxation;
                }
                else {
			if($internal == "yes") {
				$relaxation = 50;
	                	return $relaxation;
			}
			else {
                		$relaxation = 45;
		        	return $relaxation;
			}
                }
            }
            else if($category == "OBC" & $pwd == "no") {
                if($dep == "yes") {
                    $relaxation = 40;
                    return $relaxation;
                }
                else {
			if($internal == "yes") {
				$relaxation = 38;
	                	return $relaxation;
			}
			else {
                		$relaxation = 33;
		        	return $relaxation;
			}
                }
                
            }
            else if($category == "OBC" & $pwd == "yes") {
                if($dep == "yes") {
                    $relaxation = 43;
                    return $relaxation;
                }
                else {
			if($internal == "yes") {
				$relaxation = 48;
	                	return $relaxation;
			}
			else {
                		$relaxation = 43;
		        	return $relaxation;
			}
                }
                
            }
            else if($category == "General" & $pwd == "no") {
                if($dep == "yes") {
                    $relaxation = 40;
                    return $relaxation;
                }
                else {
			if($internal == "yes") {
				$relaxation = 35;
	                	return $relaxation;
			}
			else {
                		$relaxation = 30;
		        	return $relaxation;
			}
                }
            }
            else if($category == "General" & $pwd == "yes") {
                if($dep == "yes") {
                    $relaxation = 40;
                    return $relaxation;
                }
                else {
			if($internal == "yes") {
				$relaxation = 45;
	                	return $relaxation;
			}
			else {
                		$relaxation = 40;
		        	return $relaxation;
			}
                }
            }
        }
        if($post == "Hindi Typist") { //25 y
            if($category == "General" && $dep == "yes") {
                $relaxation = 40;
                return $relaxation;
            }
            else if($category == "General" && $dep == "no") {
		if($internal == "yes") {
			$relaxation = 30;
                	return $relaxation;
		}
		else {
               		$relaxation = 25;
	        	return $relaxation;
		}
            }
        }
        if($post == "Cook") { //30 y
            if($category == "General" && $dep == "yes") {
                $relaxation = 40;
                return $relaxation;
            }
            else if($category == "General" && $dep == "no") {
		if($internal == "yes") {
			$relaxation = 35;
                	return $relaxation;
		}
		else {
               		$relaxation = 30;
	        	return $relaxation;
		}
            }
        }
        if($post == "Library Attendant") { //30 y
            if($category == "General" && $dep == "no") {
		if($internal == "yes") {
			$relaxation = 35;
                	return $relaxation;
		}
		else {
               		$relaxation = 30;
	        	return $relaxation;
		}
            }
            else if($category == "General" && $dep == "yes") {
                $relaxation = 40;
                return $relaxation;
            }
            else if($category == "OBC" && $dep == "no") {
		if($internal == "yes") {
			$relaxation = 38;
                	return $relaxation;
		}
		else {
               		$relaxation = 33;
	        	return $relaxation;
		}
            }
            else if($category == "OBC" && $dep == "yes") {
                $relaxation = 40;
                return $relaxation;
            }
        }
        if($post == "Laboratory Attendant") { //30 y
            if($category == "General" && $dep == "no") {
		if($internal == "yes") {
			$relaxation = 35;
                	return $relaxation;
		}
		else {
               		$relaxation = 30;
	        	return $relaxation;
		}
            }
            else if($category == "General" && $dep == "yes") {
                $relaxation = 40;
                return $relaxation;
            }
            else if($category == "OBC" && $dep == "no") {
		if($internal == "yes") {
			$relaxation = 38;
                	return $relaxation;
		}
		else {
               		$relaxation = 33;
	        	return $relaxation;
		}
            }
            else if($category == "OBC" && $dep == "yes") {
                $relaxation = 40;
                return $relaxation;
            }
            else if($category == "SC" && $dep == "no") {
		if($internal == "yes") {
			$relaxation = 40;
                	return $relaxation;
		}
		else {
               		$relaxation = 35;
	        	return $relaxation;
		}
            }
            else if($category == "SC" && $dep == "yes") {
                $relaxation = 40;
                return $relaxation;
            }
        }
        if($post == "Office Attendant") { //30 y
            if($category == "General" && $dep == "no") {
		if($internal == "yes") {
			$relaxation = 35;
                	return $relaxation;
		}
		else {
               		$relaxation = 30;
	        	return $relaxation;
		}
            }
            else if($category == "General" && $dep == "yes") {
                $relaxation = 40;
                return $relaxation;
            }
        }
        if($post == "Hostel Attendant") { //30 y
            if($category == "General" && $dep == "no") {
		if($internal == "yes") {
			$relaxation = 35;
                	return $relaxation;
		}
		else {
               		$relaxation = 30;
	        	return $relaxation;
		}
            }
            else if($category == "General" && $dep == "yes") {
                $relaxation = 40;
                return $relaxation;
            }
        }
        if($post == "Multi Tasking Staff") { //30 y
            if($category == "General" && $dep == "no") {
		if($internal == "yes") {
			$relaxation = 35;
                	return $relaxation;
		}
		else {
               		$relaxation = 30;
	        	return $relaxation;
		}
            }
            else if($category == "General" && $dep == "yes") {
                $relaxation = 40;
                return $relaxation;
            }
        }
        if($post == "Kitchen Attendant") { //30 y
            if($category == "General" && $dep == "no") {
		if($internal == "yes") {
			$relaxation = 35;
                	return $relaxation;
		}
		else {
               		$relaxation = 30;
	        	return $relaxation;
		}
            }
            else if($category == "General" && $dep == "yes") {
                $relaxation = 40;
                return $relaxation;
            }
        }
        return $relaxation;
    }

}
?>
