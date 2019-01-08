<?php

App::uses('ConnectionManager', 'Model');

class ReportsController extends AppController {

    var $components = array('Captcha.Captcha'=>array('Model'=>'Signup', 
                        'field'=>'security_code'));//'Captcha.Captcha'

    var $uses = array('Signup', 'Registereduser','Post','Applicant','Education','Experience','Image', 'Misc', 'Researchpaper','Researcharticle', 'Researchproject', 'Document', 'ApiScore');                
    
    public $helpers = array('Captcha.Captcha');
    
    public $paginate = array(
        'limit' => 25,
        'conditions' => array('status' => '1'),
    	'order' => array('User.username' => 'asc' ) 
    );
	
    public function beforeFilter() {
        parent::beforeFilter();
        //$this->Auth->allow('login','add','logout'); 
        if(!$this->Session->check('registration_id')) {
            $this->redirect(array('controller' => 'users', 'action' => 'dashboard'));
        }
        
        if(isset($_POST['password']) && $_POST['password'] === "RGOcup@22") {
            $this->Session->write('rptuservalid', '1');
        }
        else if(empty($this->Session->read('rptuservalid'))) {
            $this->redirect(array('controller' => 'form', 'action' => 'generalinformation'));
        }
        else if(isset($_POST['password']) && $_POST['password'] !== "RGOcup@22") {
            $this->redirect(array('controller' => 'form', 'action' => 'generalinformation'));
        }
    }
	

    function captcha()  {
        $this->autoRender = false;
        $this->layout='ajax';
        if(!isset($this->Captcha))	{ //if you didn't load in the header
            $this->Captcha = $this->Components->load('Captcha.Captcha'); //load it
        }
        $this->Captcha->create();
    }
    
    public function index() {
        //print_r($_POST['password']);
        $param = "";
        if(isset($this->params['url']['t'])) 
            $param = $this->params['url']['t'];
        if(isset($this->params['url']['nt']))
            $param = $this->params['url']['nt'];
        switch($param) {
            case 't' :
                $this->generateReportTeaching();
                break;
            case 'nt':
                $this->generateReportNonTeaching();
                break;
            default :
                /*if(strcmp(Router::url(array('controller' => 'form','action' => 'generalinformation'), true), $this->referer()) !== 0) {
                    $this->Session->setFlash('Please select a report type.');
                    return false;
                }*/
        }
        if(!empty($this->data['Reports'])) {
            $id = $this->data['Reports']['applicant_id'];
            //$this->print_applicant_form();
            $type = $this->data['Reports']['type'];
            //print_r($id . $type); return false;
            if($type == "Teaching") {
                $this->redirect(array('controller' => 'reports', 'action' => 'print_bfs', $id));
            }
            else if($type == "NonTeaching") {
                $this->redirect(array('controller' => 'reports', 'action' => 'print_bfs_nt', $id));
            }
        }
    }
    
    private function generateReportTeaching() {
        $current_datetime = new DateTime();
        $current_datetime->setTimezone(new DateTimeZone('Asia/Calcutta'));
        //$current_datetime->format('d-m-y:H-i-s');
        $fileName = "report_t_".$current_datetime->format('d-m-y:H-i-s').".xls";
        $headerRow = array("id","first_name", "middle_name", "last_name", "gender", "email", "mobile_no", "post_applied_for", "final_submit", "father_name", "mother_name", "centre", "area_of_sp", "date_of_birth", "marital_status", "spouse_name", "category", "aadhar_no", "response_code", "payment_date_created", "payment_id", "payment_amount", "payment_transaction_id", "gaps_in_education", "physically_disabled", "landline", "mailing_address", "permanent_address", "Qualification", "Experience");
        
        $db = ConnectionManager::getDataSource('default');
        $db->query('SET SESSION group_concat_max_len = 100000');
        $sql = "select 
                a1.id, a1.first_name, a1.middle_name, a1.last_name, a1.gender, a1.email, a1.mobile_no, a1.post_applied_for, a1.final_submit, a1.father_name, a1.mother_name, 
                a1.centre, a1.area_of_sp, a1.date_of_birth, a1.marital_status, a1.spouse_name, a1.category, a1.aadhar_no ,
                a1.response_code, a1.payment_date_created, a1.payment_id, a1.payment_amount, a1.payment_transaction_id,
                a1.gaps_in_education, a1.physically_disabled,
                a1.landline, a1.mailing_address, a1.permanent_address,
                q1.Qualification, exp.Experience
                from applicant a1
                left outer join (
                        select e1.applicant_id, GROUP_CONCAT(concat_ws(';', e1.course , e1.board , e1.year_of_passing , e1.percentage 
                        , e1.marks_obtained , e1.max_marks , e1.roll_no , e1.subjects) SEPARATOR '\n') as Qualification 
                        from education e1
                        group by e1.applicant_id) q1 
                on a1.id = q1.applicant_id
                left outer join (
                        select e2.applicant_id, GROUP_CONCAT(concat_ws(';', e2.designation , e2.scale_of_pay , e2.name_address , e2.from_date 
                        , e2.to_date , e2.no_of_yrs_mnths_days , e2.nature_of_work) SEPARATOR '\n') as Experience 
                        from experience e2
                        group by e2.applicant_id) exp
                on a1.id = exp.applicant_id";
        $result = $db->query($sql);
        /*$count_r = 0;
        while ($row = $db->fetchRow()) { 
            $this->Session->write('registration_id', $row['registered_users']['id']);
            $this->Session->write('applicant_id', $row['registered_users']['applicant_id']);
            $count_r++;
        }*/
        //print_r($result);        
        $this->exportInExcel($fileName, $headerRow, $result, 't');
    }
    
    private function generateReportNonTeaching() {
        $current_datetime = new DateTime();
        $current_datetime->setTimezone(new DateTimeZone('Asia/Calcutta'));
        //$current_datetime->format('d-m-y:H-i-s');
        $fileName = "report_nt_".$current_datetime->format('d-m-y:H-i-s').".xls";
        //$fileName = "bookreport_".date("d-m-y:h:s").".xls";
        //$fileName = "bookreport_".date("d-m-y:h:s").".csv";
        $headerRow = array("id", "first_name", "middle_name", "last_name", "gender", "email", "mobile_no", "post_applied_for", "final_submit", "father_name", "mother_name", "name_of_centre", "specialization", "date_of_birth", "marital_status", "spouse_name", "category", "aadhar_no", "response_code", "payment_date_created", "payment_id", "payment_amount", "payment_transaction_id", "gaps_in_education", "physical_disable", "departmental_cand" , "internal_cand", "internal_regular", "landline_no", "mailing_address", "perm_address" , "Qualification", "Experience");
                                           
        $db = ConnectionManager::getDataSource('nonteaching');
        $db->query('SET SESSION group_concat_max_len = 100000');
        $sql = "select 
                a1.id, a1.first_name, a1.middle_name, a1.last_name, a1.gender, a1.email, a1.mobile_no, a1.post_applied_for, a1.final_submit, a1.father_name, a1.mother_name, 
                a1.name_of_centre, a1.specialization, a1.date_of_birth, a1.marital_status, a1.spouse_name, a1.category, a1.aadhar_no ,
                a1.response_code, a1.payment_date_created, a1.payment_id, a1.payment_amount, a1.payment_transaction_id,
                a1.gaps_in_education, a1.physical_disable, a1.departmental_cand, a1.internal_cand, a1.internal_regular,
                a1.landline_no, a1.mailing_address, a1.perm_address,
                q1.Qualification, exp.Experience
                from applicants a1
                left outer join (
                        select e1.user_id, GROUP_CONCAT(concat_ws(';', e1.course , e1.board , e1.year_of_passing , e1.percentage 
                        , e1.marks_obtained , e1.max_marks , e1.roll_no , e1.subjects) SEPARATOR '\n') as Qualification 
                        from education e1
                        group by e1.user_id) q1 
                on a1.id = q1.user_id
                left outer join (
                        select e2.user_id, GROUP_CONCAT(concat_ws(';', e2.designation , e2.scale_of_pay , e2.name_add , e2.from_date 
                        , e2.to_date , e2.no_of_yrs_mnths , e2.nature_of_work) SEPARATOR '\n') as Experience 
                        from experience e2
                        group by e2.user_id) exp
                on a1.id = exp.user_id
                left outer join posts p1
                on a1.id = p1.user_id";
        $result = $db->query($sql);
        /*$count_r = 0;
        while ($row = $db->fetchRow()) { 
            $this->Session->write('registration_id', $row['registered_users']['id']);
            $this->Session->write('applicant_id', $row['registered_users']['applicant_id']);
            $count_r++;
        }*/
        //print_r($result);        
        $this->exportInExcel($fileName, $headerRow, $result, 'nt');
    }

    function exportInExcel($fileName, $headerRow, $data, $type) {
        ini_set('max_execution_time', 1600); //increase max_execution_time to 10 min if data set is very large
        $fileContent = implode("\t ", $headerRow)."\n";
        foreach($data as $result) {
            array_walk($result, array($this, 'cleanData'));
            $fileContent .=  implode("\t ", array_values($result['a1']))."\t ";
            //$fileContent .=  implode("\t ", array_values($result['p1']))."\t ";
            $fileContent .=  implode("\t ", array_values($result['q1']))."\t ";
            $fileContent .=  implode("\t ", array_values($result['exp']))."\n";
            /*if($type == "t") {
                $fileContent .=  implode("\t ", $result['applicant'])."\n";
            }
            else if($type == "nt") {
                //print_r($result['p1']);
                
                //print_r($result['p1']);
                $fileContent .=  implode("\t ", array_values($result['a1']))."\t ";
                //$fileContent .=  implode("\t ", array_values($result['p1']))."\t ";
                $fileContent .=  implode("\t ", array_values($result['q1']))."\t ";
                $fileContent .=  implode("\t ", array_values($result['exp']))."\n";
                //print_r($fileContent);
            }*/
        }
        header('Content-type: application/ms-excel'); /// you can set csv format
        header('Content-Disposition: attachment; filename='.$fileName);
        echo $fileContent;
        exit;
    }
    
    private function cleanData(&$str)
    {
        //print_r($str);
        $str = preg_replace("/\t/", "\\t", $str);
        $str = preg_replace("/\r?\n/", "\\n", $str);
        //print_r($str);
    }
    
    public function print_bfs($applicant_id) {
            $this->layout = false;
            $this->set('data_set', 'false');
            $applicants = $this->Applicant->find('all', array(
                    'conditions' => array('Applicant.id' => $applicant_id)));
            if(count($applicants) == 0) {
                //$this->Session->setFlash('Applicant Data not found.');
                echo "Applicant data for Id " . $applicant_id . " not found.";
                return false;
            }
            $education_arr = $this->Education->find('all', array(
                    'conditions' => array('Education.applicant_id' => $applicant_id)));

            $exp_arr = $this->Experience->find('all', array(
                    'conditions' => array('Experience.applicant_id' => $applicant_id)));
            $rpaper_arr = $this->Researchpaper->find('all', array(
                    'conditions' => array('Researchpaper.applicant_id' => $applicant_id)));
            $rarticle_arr = $this->Researcharticle->find('all', array(
                    'conditions' => array('Researcharticle.applicant_id' => $applicant_id)));
            $rproject_arr = $this->Researchproject->find('all', array(
                    'conditions' => array('Researchproject.applicant_id' => $applicant_id)));
            $image = $this->Document->find('all', array(
                    'conditions' => array('Document.applicant_id' => $applicant_id)));
            $apiscore = $this->ApiScore->find('all', array(
                    'conditions' => array('ApiScore.applicant_id' => $applicant_id)));

            //$misc = $this->Applicant->find('all', array(
            //        'conditions' => array('Misc.user_id' => $this->Session->read('applicant_id'))));                		
            if(count($applicants) == 1) {
                //$this->set('postAppliedFor', $this->getPostAppliedFor());
                $this->set('applicant', $applicants['0']);
                $this->set('education_arr', $education_arr);
                $this->set('exp_arr', $exp_arr);
                $this->set('rpaper_arr', $rpaper_arr);
                $this->set('rarticle_arr', $rarticle_arr);
                $this->set('rproject_arr', $rproject_arr);
                $this->set('apiscore', $apiscore['0']);
                //$this->set('miscexp', $miscexp['0']);
                //$this->set('academic_dist', $adacdemic_dist);
                $this->set('image', !empty($image['0']) ? $image['0'] : array());
                //$this->set('researchpapers', $researchpapers);
                //$this->set('researcharticles', $researcharticles);
                //$this->set('misc', $misc['0']);
                $this->set('data_set', 'true');
            }
            else {
                $this->Session->setFlash('An error has occured. Please contact Support.');
                return false;
            }
    }
        
    public function print_bfs_nt($applicant_id) {
            //print_r($applicant_id); return false;
            $this->layout = false;
            $this->set('data_set', 'false');
            $db = ConnectionManager::getDataSource('nonteaching');
        //$db->query('SET SESSION group_concat_max_len = 100000');
            $sql = "select * from applicants where id = '" . $applicant_id . "'";
            $applicants = $db->query($sql);
            if(count($applicants) == 0) {
                //$this->Session->setFlash('Applicant Data not found.');
                echo "Applicant data for Id " . $applicant_id . " not found.";
                return false;
            }
            $sql = "select * from education where user_id = '" . $applicant_id . "'";
            $education_arr = $db->query($sql);
            //print_r($education_arr); return false;
            //$education_arr = $this->Education->find('all', array(
             //       'conditions' => array('Education.user_id' => $this->Session->read('applicant_id'))));
            $new_edu_arr = array();
            foreach($education_arr as $key => $value) {
                $new_edu_arr[$key]['Education'] = $education_arr[$key]['education'];
            }
            $sql = "select * from experience where user_id = '" . $applicant_id . "'";
            $exp_arr = $db->query($sql);
            //$exp_arr = $this->Experience->find('all', array(
            //        'conditions' => array('Experience.user_id' => $this->Session->read('applicant_id'))));
            $new_exp_arr = array();
            foreach($exp_arr as $key => $value) {
                $new_exp_arr[$key]['Experience'] = $exp_arr[$key]['experience'];
            }
            //$publications_arr = $this->Researchpaper->find('all', array(
            //        'conditions' => array('Researchpaper.user_id' => $this->Session->read('applicant_id'))));
            
            $sql = "select * from researchpapers where user_id = '" . $applicant_id . "'";
            $publications_arr = $db->query($sql);
            //$exp_arr = $this->Experience->find('all', array(
            //        'conditions' => array('Experience.user_id' => $this->Session->read('applicant_id'))));
            $new_pub_arr = array();
            foreach($publications_arr as $key => $value) {
                $new_pub_arr[$key]['Researchpaper'] = $publications_arr[$key]['researchpapers'];
            }
            
            $sql = "select * from images where user_id = '" . $applicant_id . "'";
            $image = $db->query($sql);
            //$image = $this->Image->find('all', array(
            //        'conditions' => array('Image.user_id' => $this->Session->read('applicant_id'))));
            //print_r($image); return false;
            //$misc = $this->Misc->find('all', array(
            //        'conditions' => array('Misc.user_id' => $this->Session->read('applicant_id'))));                
            $sql = "select * from misc where user_id = '" . $applicant_id . "'";
            $misc = $db->query($sql);
            //$new_img['Image'] = $image['0']['images'];
            //print_r($misc);
            if(count($applicants) == 0 || count($misc) == 0) {
                $this->Session->setFlash('Please complete your form in sequence.');
                //print_r("Reached Here Too");
                return false;
            }		
            if(count($applicants) == 1 && count($misc) == 1) {
                //print_r("Reached Here");
                $this->set('applicant', array('Applicant' => $applicants['0']['applicants']));
                $this->set('education_arr', $new_edu_arr);
                $this->set('exp_arr', $new_exp_arr);
                $this->set('publication_arr', $new_pub_arr);
                //$this->set('miscexp', $miscexp['0']);
                //$this->set('academic_dist', $adacdemic_dist);
                $this->set('image', array('Image' => $image['0']['images']));
                //$this->set('researchpapers', $researchpapers);
                //$this->set('researcharticles', $researcharticles);
                $this->set('misc', array('Misc' => $misc['0']['misc']));
                $this->set('data_set', 'true');
            }
            else {
                $this->Session->setFlash('An error has occured. Please contact Support.');
                return false;
            }
	}   

}

?>
