<?php

App::uses('CakeSession', 'Model/Datasource');

class Applicant extends AppModel {

    //public $belongsTo = 'User';
    public $useTable = 'applicant';
    
    var $validate = array(
        'appId',
        'advertisement_no' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
        'post_applied_for' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
        'appfee_dd_no' => array('paymentValidation'),
        'appfee_dd_date' => array('paymentValidation'),
        'appfee_dd_amt' => array('paymentValidation'),
        'appfee_dd_bank' => array('paymentValidation'),
        'appfee_dd_branch' => array('paymentValidation'),
        'challan_no' => array('paymentValidation'),
        'challan_date' => array('paymentValidation'),
        'centre' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
        'area' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
        'specialization' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
        'first_name' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
        /*'middle_name' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),*/
        'last_name' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
        'email' => array(
            'rule' => 'email',
            'message' => 'It must be a valid email address'
        ),
        'mobile_no' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
        'father_name' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
        //'father_email',
        //'father_mobile',
        'mother_name' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
        //'mother_email',
        //'mother_mobile',
        'date_of_birth' => array(
            'notEmpty' => [
                'rule' => 'notEmpty',
                'message' => 'required field'
            ],
            'pattern' => [
                'rule' => '/^[0-9]{2}\/[0-9]{2}\/[0-9]{4}$/',
                'message' => 'Please enter only valid date of birth (DD/MM/YYYY)',
                'allowEmpty' => true,
                'required' => false
            ],
            'checkDate' => [
                'rule' => 'checkDate',
                'message' => 'The entered date is not valid.',
                'allowEmpty' => true,
                'required' => false
            ]
        ),
        'marital_status' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
        'gender' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
        'spouse_name',
        'category' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'required field'
            ),
            /*'validateRule' => array(
                'rule' => 'categoryCheck',
                'message' => 'The Category selected is not matching the Category applying for'
            )*/
        ),
        'category_applied' => array(
            "notEmpty" => array(
                'rule' => 'notEmpty',
                'message' => 'required field'
            ),
            "postCatCheck" => array(
                'rule' => array('postCatCheck'),
                'message' => 'The category of applicant, category applying for, for the selected post do not match'
            )
        ),
        'aadhar_no' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
        'nationality' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
        'physically_disabled' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
        'departmental_cand' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
        'retired' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
	'internal_cand' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
        'blindness_applicable',
        'blindness_percentage',
        'hearing_applicable',
        'hearing_percentage',
        'locomotor_applicable',
        'locomotor_percentage',
        'postal_house_no' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
        'postal_stree_no' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
        'postal_town' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
        'postal_district' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
        'postal_state' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
        'postal_pin_code' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
        'permanent_house_no' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
        'permanent_stree_no' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
        'permanent_town' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
        'permanent_district' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
        'permanent_state' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
        'permanent_pin_code' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
        /*'mailing_address' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
        'permanent_address' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
        'present_address' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),*/
        'exp_during_phd' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
        'rp_in_journals' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
        'ra_in_books' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
        'ra_in_conference' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
        'pa_in_periodicals' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
        'em_research' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
        'seminar_attended' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
        'seminar_organized' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
        'gap_experience_yn' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
        'exp_during_phd' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        )
    );

    function beforeSave($options = array()) {
        /*if (empty($this->data[$this->alias]['appId']))   {
            $digits = 8;
            $appId = rand(pow(10, $digits-1), pow(10, $digits)-1);
            $this->data[$this->alias]['appId'] = $appId;
            //$this->data[$this->alias]['user_id'] = CakeSession::read('applicant_id');
        }*/
        //print_r($this->data); return false;
        return $this->data;
    }
    
    function beforeValidate($options = array()) {
        
    }
    

    function paymentValidation($data) {
        return ((!empty($this->data[$this->alias]['appfee_dd_no'])
               && !empty($this->data[$this->alias]['appfee_dd_date'])
               && !empty($this->data[$this->alias]['appfee_dd_amt'])
               && !empty($this->data[$this->alias]['appfee_dd_bank'])
               && !empty($this->data[$this->alias]['appfee_dd_branch'])));
                /*||
                (!empty($this->data[$this->alias]['challan_no'])
                && !empty($this->data[$this->alias]['challan_date']))
                );*/
    }

    public function checksum($check)
    {
        //debug($check); debug($this->data[$this->alias]);
        return (intval($check['criteria_totalAB']) === (intval($this->data[$this->alias]['criteria_partA']) + intval($this->data[$this->alias]['criteria_partB'])));
    }
    
    public function categoryCheck($check)
    {
        //debug($check); debug($this->data[$this->alias]);
        if($check['category'] == "General" && ($this->data[$this->alias]['category_applied'] == "SC" || $this->data[$this->alias]['category_applied'] == "ST" || $this->data[$this->alias]['category_applied'] == "OBC")) {
            return false;
        }
        else {
            return true;
        }
    }
    
    public function checkDate($check) {
        $value = $check['date_of_birth'];
        $arr = explode("/", $value);
        $dateValidated = true;
        if(intval($arr[0]) < 1 || intval($arr[0]) > 31) {
            $dateValidated = false;
        }
        if(intval($arr[1]) < 1 || intval($arr[1]) > 12) {
            $dateValidated = false;
        }
        if(intval($arr[2]) < 1900 || intval($arr[2]) > 2000) {
            $dateValidated = false;
        }
        
        return $dateValidated;
    }
    
    function postCatCheck($data) {
        $category_applying = $data['category_applied'];
        $category_of_applicant = $this->data[$this->alias]['category'];
        $post_applying_for = $this->data[$this->alias]['post_applied_for'];
        $department = $this->data[$this->alias]['centre'];
        //debug($department); debug($post_applying_for); debug($category_applying); debug($category_of_applicant);
        
        if($department == "Applied Agriculture (Food Science and Technology)" && ($post_applying_for == "Professor" || $post_applying_for == "Associate Professor") && $category_of_applicant == "General" && $category_applying == "General") {
            return true;
        }
		if($department == "Applied Agriculture (Food Science and Technology)" && ($post_applying_for == "Professor" || $post_applying_for == "Associate Professor") && $category_of_applicant == "SC" && $category_applying == "General") {
            return true;
        }
		if($department == "Applied Agriculture (Food Science and Technology)" && ($post_applying_for == "Professor" || $post_applying_for == "Associate Professor") && $category_of_applicant == "ST" && $category_applying == "General") {
            return true;
        }
		if($department == "Applied Agriculture (Food Science and Technology)" && ($post_applying_for == "Professor" || $post_applying_for == "Associate Professor") && $category_of_applicant == "OBC" && $category_applying == "General") {
            return true;
        }
		if($department == "Applied Agriculture (Agribusiness)" && ($post_applying_for == "Professor" || $post_applying_for == "Associate Professor") && $category_of_applicant == "General" && $category_applying == "General") {
            return true;
        }
		if($department == "Applied Agriculture (Agribusiness)" && ($post_applying_for == "Professor" || $post_applying_for == "Associate Professor") && $category_of_applicant == "SC" && $category_applying == "General") {
            return true;
        }
		if($department == "Applied Agriculture (Agribusiness)" && ($post_applying_for == "Professor" || $post_applying_for == "Associate Professor") && $category_of_applicant == "ST" && $category_applying == "General") {
            return true;
        }
		if($department == "Applied Agriculture (Agribusiness)" && ($post_applying_for == "Professor" || $post_applying_for == "Associate Professor" || $post_applying_for == "Assistant Professor") && $category_of_applicant == "OBC" && ($category_applying == "General" || $category_applying == "OBC")) {
            return true;
        }
        if($department == "Animal Sciences" && ($post_applying_for == "Assistant Professor" || $post_applying_for == "Professor") && $category_of_applicant == "General" && $category_applying == "General") {
            return true;
        }
        if($department == "Animal Sciences" && ($post_applying_for == "Assistant Professor" || $post_applying_for == "Professor") && $category_of_applicant == "SC" && $category_applying == "General") {
            return true;
        }
        if($department == "Animal Sciences" && ($post_applying_for == "Assistant Professor" || $post_applying_for == "Professor") && $category_of_applicant == "ST" && $category_applying == "General") {
            return true;
        }
        if($department == "Animal Sciences" && ($post_applying_for == "Assistant Professor" || $post_applying_for == "Professor") && $category_of_applicant == "OBC" && $category_applying == "General") {
            return true;
        }
        if($department == "Chemical Sciences" && ($post_applying_for == "Professor" || $post_applying_for == "Associate Professor") && $category_of_applicant == "General" && $category_applying == "General") {
            return true;
        }
        if($department == "Chemical Sciences" && ($post_applying_for == "Professor" || $post_applying_for == "Associate Professor") && $category_of_applicant == "SC" && $category_applying == "General") {
            return true;
        }
        if($department == "Chemical Sciences" && ($post_applying_for == "Professor"  || $post_applying_for == "Associate Professor") && $category_of_applicant == "ST" && $category_applying == "General") {
            return true;
        }
        if($department == "Chemical Sciences" && ($post_applying_for == "Professor"  || $post_applying_for == "Associate Professor") && $category_of_applicant == "OBC" && $category_applying == "General") {
            return true;
        }
        if($department == "Computational Sciences" && ($post_applying_for == "Associate Professor" || $post_applying_for == "Assistant Professor") && $category_of_applicant == "General" && $category_applying == "General") {
            return true;
        }
        if($department == "Computational Sciences" && ($post_applying_for == "Associate Professor" || $post_applying_for == "Assistant Professor") && $category_of_applicant == "SC" && $category_applying == "General") {
            return true;
        }
        if($department == "Computational Sciences" && ($post_applying_for == "Associate Professor" || $post_applying_for == "Assistant Professor") && $category_of_applicant == "ST" && $category_applying == "General") {
            return true;
        }
        if($department == "Computational Sciences" && ($post_applying_for == "Associate Professor" || $post_applying_for == "Assistant Professor") && $category_of_applicant == "OBC" && $category_applying == "General") {
            return true;
        }
        if($department == "Computer Science and Technology" && ($post_applying_for == "Associate Professor" || $post_applying_for == "Assistant Professor" || $post_applying_for == "Professor") && $category_of_applicant == "General" && $category_applying == "General") {
            return true;
        }
        if($department == "Computer Science and Technology" && ($post_applying_for == "Associate Professor" || $post_applying_for == "Assistant Professor" || $post_applying_for == "Professor") && $category_of_applicant == "SC" && $category_applying == "General") {
            return true;
        }
        if($department == "Computer Science and Technology" && ($post_applying_for == "Associate Professor" || $post_applying_for == "Assistant Professor" || $post_applying_for == "Professor") && $category_of_applicant == "ST" && $category_applying == "General") {
            return true;
        }
        if($department == "Computer Science and Technology" && ($post_applying_for == "Associate Professor" || $post_applying_for == "Assistant Professor" || $post_applying_for == "Professor") && $category_of_applicant == "OBC" && $category_applying == "General") {
            return true;
        }
        if($department == "Economic Studies" && ($post_applying_for == "Associate Professor" || $post_applying_for == "Professor") && $category_of_applicant == "General" && $category_applying == "General") {
            return true;
        }
        if($department == "Economic Studies" && ($post_applying_for == "Associate Professor" || $post_applying_for == "Professor") && $category_of_applicant == "SC" && $category_applying == "General") {
            return true;
        }
        if($department == "Economic Studies" && ($post_applying_for == "Associate Professor" || $post_applying_for == "Professor") && $category_of_applicant == "ST" && $category_applying == "General") {
            return true;
        }
        if($department == "Economic Studies" && ($post_applying_for == "Associate Professor" || $post_applying_for == "Professor") && $category_of_applicant == "OBC" && $category_applying == "General") {
            return true;
        }
		if($department == "Education" && ($post_applying_for == "Associate Professor") && $category_of_applicant == "General" && $category_applying == "General") {
            return true;
        }
        if($department == "Education" && ($post_applying_for == "Associate Professor") && $category_of_applicant == "SC" && $category_applying == "General") {
            return true;
        }
        if($department == "Education" && ($post_applying_for == "Associate Professor") && $category_of_applicant == "ST" && $category_applying == "General") {
            return true;
        }
        if($department == "Education" && ($post_applying_for == "Associate Professor") && $category_of_applicant == "OBC" && $category_applying == "General") {
            return true;
        }
        if($department == "Environmental Sciences and Technology" && ($post_applying_for == "Associate Professor" || $post_applying_for == "Assistant Professor") && $category_of_applicant == "General" && $category_applying == "General") {
            return true;
        }
        if($department == "Environmental Sciences and Technology" && ($post_applying_for == "Associate Professor" || $post_applying_for == "Assistant Professor") && $category_of_applicant == "SC" && $category_applying == "General") {
            return true;
        }
        if($department == "Environmental Sciences and Technology" && ($post_applying_for == "Associate Professor" || $post_applying_for == "Assistant Professor") && $category_of_applicant == "ST" && $category_applying == "General") {
            return true;
        }
        if($department == "Environmental Sciences and Technology" && ($post_applying_for == "Associate Professor" || $post_applying_for == "Assistant Professor") && $category_of_applicant == "OBC" && $category_applying == "General") {
            return true;
        }
        if($department == "Geography and Geology" && ($post_applying_for == "Associate Professor" || $post_applying_for == "Professor") && $category_of_applicant == "General" && $category_applying == "General") {
            return true;
        }
        if($department == "Geography and Geology" && ($post_applying_for == "Associate Professor" || $post_applying_for == "Professor") && $category_of_applicant == "SC" && $category_applying == "General") {
            return true;
        }
        if($department == "Geography and Geology" && ($post_applying_for == "Associate Professor" || $post_applying_for == "Professor") && $category_of_applicant == "ST" && $category_applying == "General") {
            return true;
        }
        if($department == "Geography and Geology" && ($post_applying_for == "Associate Professor" || $post_applying_for == "Professor") && $category_of_applicant == "OBC" && $category_applying == "General") {
            return true;
        }
		if($department == "Human Genetics and Molecular Medicine" && ($post_applying_for == "Associate Professor") && $category_of_applicant == "General" && $category_applying == "General") {
            return true;
        }
        if($department == "Human Genetics and Molecular Medicine" && ($post_applying_for == "Associate Professor") && $category_of_applicant == "SC" && $category_applying == "General") {
            return true;
        }
        if($department == "Human Genetics and Molecular Medicine" && ($post_applying_for == "Associate Professor") && $category_of_applicant == "ST" && $category_applying == "General") {
            return true;
        }
        if($department == "Human Genetics and Molecular Medicine" && ($post_applying_for == "Associate Professor") && $category_of_applicant == "OBC" && $category_applying == "General") {
            return true;
        }
        if($department == "Law" && ($post_applying_for == "Assistant Professor" || $post_applying_for == "Professor") && $category_of_applicant == "General" && $category_applying == "General") {
            return true;
        }
        if($department == "Law" && ($post_applying_for == "Assistant Professor" || $post_applying_for == "Professor") && $category_of_applicant == "SC" && $category_applying == "General") {
            return true;
        }
        if($department == "Law" && ($post_applying_for == "Assistant Professor" || $post_applying_for == "Professor") && $category_of_applicant == "ST" && $category_applying == "General") {
            return true;
        }
        if($department == "Law" && ($post_applying_for == "Assistant Professor" || $post_applying_for == "Professor") && $category_of_applicant == "OBC" && $category_applying == "General") {
            return true;
        }
        if($department == "Mathematics and Statistics" && ($post_applying_for == "Assistant Professor" || $post_applying_for == "Professor") && $category_of_applicant == "General" && $category_applying == "General") {
            return true;
        }
        if($department == "Mathematics and Statistics" && ($post_applying_for == "Assistant Professor" || $post_applying_for == "Professor") && $category_of_applicant == "SC" && $category_applying == "General") {
            return true;
        }
        if($department == "Mathematics and Statistics" && ($post_applying_for == "Assistant Professor" || $post_applying_for == "Professor") && $category_of_applicant == "ST" && $category_applying == "General") {
            return true;
        }
        if($department == "Mathematics and Statistics" && ($post_applying_for == "Assistant Professor" || $post_applying_for == "Professor") && $category_of_applicant == "OBC" && $category_applying == "General") {
            return true;
        }
		if($department == "Pharmaceutical Sciences and Natural Products" && ($post_applying_for == "Associate Professor") && $category_of_applicant == "General" && $category_applying == "General") {
            return true;
        }
        if($department == "Pharmaceutical Sciences and Natural Products" && ($post_applying_for == "Associate Professor") && $category_of_applicant == "SC" && $category_applying == "General") {
            return true;
        }
        if($department == "Pharmaceutical Sciences and Natural Products" && ($post_applying_for == "Associate Professor") && $category_of_applicant == "ST" && $category_applying == "General") {
            return true;
        }
        if($department == "Pharmaceutical Sciences and Natural Products" && ($post_applying_for == "Associate Professor") && $category_of_applicant == "OBC" && $category_applying == "General") {
            return true;
        }
        if($department == "Physical Sciences" && ($post_applying_for == "Assistant Professor" || $post_applying_for == "Associate Professor" || $post_applying_for == "Professor") && $category_of_applicant == "General" && $category_applying == "General") {
            return true;
        }
        if($department == "Physical Sciences" && ($post_applying_for == "Assistant Professor" || $post_applying_for == "Associate Professor" || $post_applying_for == "Professor") && $category_of_applicant == "SC" && $category_applying == "General") {
            return true;
        }
        if($department == "Physical Sciences" && ($post_applying_for == "Assistant Professor" || $post_applying_for == "Associate Professor" || $post_applying_for == "Professor") && $category_of_applicant == "ST" && $category_applying == "General") {
            return true;
        }
        if($department == "Physical Sciences" && ($post_applying_for == "Assistant Professor" || $post_applying_for == "Associate Professor" || $post_applying_for == "Professor") && $category_of_applicant == "OBC" && $category_applying == "General") {
            return true;
        }
        if($department == "Plant Sciences" && ($post_applying_for == "Associate Professor" || $post_applying_for == "Professor") && $category_of_applicant == "General" && $category_applying == "General") {
            return true;
        }
        if($department == "Plant Sciences" && ($post_applying_for == "Associate Professor" || $post_applying_for == "Professor") && $category_of_applicant == "SC" && $category_applying == "General") {
            return true;
        }
        if($department == "Plant Sciences" && ($post_applying_for == "Associate Professor" || $post_applying_for == "Professor") && $category_of_applicant == "ST" && $category_applying == "General") {
            return true;
        }
        if($department == "Plant Sciences" && ($post_applying_for == "Associate Professor" || $post_applying_for == "Professor") && $category_of_applicant == "OBC" && $category_applying == "General") {
            return true;
        }
        if($department == "Sociology" && ($post_applying_for == "Associate Professor" || $post_applying_for == "Assistant Professor" || $post_applying_for == "Professor") && $category_of_applicant == "General" && $category_applying == "General") {
            return true;
        }
        if($department == "Sociology" && ($post_applying_for == "Associate Professor" || $post_applying_for == "Assistant Professor" || $post_applying_for == "Professor") && $category_of_applicant == "SC" && $category_applying == "General") {
            return true;
        }
        if($department == "Sociology" && ($post_applying_for == "Associate Professor" || $post_applying_for == "Assistant Professor" || $post_applying_for == "Professor") && $category_of_applicant == "ST" && $category_applying == "General") {
            return true;
        }
        if($department == "Sociology" && ($post_applying_for == "Associate Professor" || $post_applying_for == "Assistant Professor" || $post_applying_for == "Professor") && $category_of_applicant == "OBC" && $category_applying == "General") {
            return true;
        }
        if($department == "South and Central Asian Studies (Including Historical Studies)" && ($post_applying_for == "Associate Professor" || $post_applying_for == "Professor") && $category_of_applicant == "General" && $category_applying == "General") {
            return true;
        }
		if($department == "South and Central Asian Studies (Including Historical Studies)" && ($post_applying_for == "Associate Professor" || $post_applying_for == "Professor") && $category_of_applicant == "SC" && $category_applying == "General") {
            return true;
        }
		if($department == "South and Central Asian Studies (Including Historical Studies)" && ($post_applying_for == "Associate Professor" || $post_applying_for == "Professor") && $category_of_applicant == "ST" && $category_applying == "General") {
            return true;
        }
		if($department == "South and Central Asian Studies (Including Historical Studies)" && ($post_applying_for == "Associate Professor" || $post_applying_for == "Professor") && $category_of_applicant == "OBC" && $category_applying == "General") {
            return true;
        }
        if($department == "Mass Communication and Media Studies" && ($post_applying_for == "Associate Professor" || $post_applying_for == "Assistant Professor" || $post_applying_for == "Professor") && $category_of_applicant == "General" && $category_applying == "General") {
            return true;
        }
        if($department == "Mass Communication and Media Studies" && ($post_applying_for == "Associate Professor" || $post_applying_for == "Assistant Professor" || $post_applying_for == "Professor") && $category_of_applicant == "SC" && $category_applying == "General") {
            return true;
        }
        if($department == "Mass Communication and Media Studies" && ($post_applying_for == "Associate Professor" || $post_applying_for == "Assistant Professor" || $post_applying_for == "Professor") && $category_of_applicant == "ST" && $category_applying == "General") {
            return true;
        }
        if($department == "Mass Communication and Media Studies" && ($post_applying_for == "Associate Professor" || $post_applying_for == "Assistant Professor" || $post_applying_for == "Professor") && $category_of_applicant == "OBC" && $category_applying == "General") {
            return true;
        }
        if($department == "Financial Administration" && ($post_applying_for == "Associate Professor" || $post_applying_for == "Assistant Professor" || $post_applying_for == "Professor") && $category_of_applicant == "General" && $category_applying == "General") {
            return true;
        }
        if($department == "Financial Administration" && ($post_applying_for == "Associate Professor" || $post_applying_for == "Assistant Professor" || $post_applying_for == "Professor") && $category_of_applicant == "SC" && $category_applying == "General") {
            return true;
        }
        if($department == "Financial Administration" && ($post_applying_for == "Associate Professor" || $post_applying_for == "Assistant Professor" || $post_applying_for == "Professor") && $category_of_applicant == "ST" && $category_applying == "General") {
            return true;
        }
        if($department == "Financial Administration" && ($post_applying_for == "Associate Professor" || $post_applying_for == "Professor") && $category_of_applicant == "OBC" && $category_applying == "General") {
            return true;
        }
        if($department == "Financial Administration" && ($post_applying_for == "Assistant Professor") && $category_of_applicant == "OBC" && ($category_applying == "General" || $category_applying == "OBC")) {
            return true;
        }
        if($department == "Languages and Comparative Literature" && ($post_applying_for == "Professor") && $category_of_applicant == "General" && $category_applying == "General") {
            return true;
        }
        if($department == "Languages and Comparative Literature" && ($post_applying_for == "Professor") && $category_of_applicant == "SC" && $category_applying == "General") {
            return true;
        }
        if($department == "Languages and Comparative Literature" && ($post_applying_for == "Professor") && $category_of_applicant == "ST" && $category_applying == "General") {
            return true;
        }
        if($department == "Languages and Comparative Literature" && ($post_applying_for == "Professor") && $category_of_applicant == "OBC" && $category_applying == "General") {
            return true;
        }
        if($department == "Department of Hindi" && ($post_applying_for == "Associate Professor" || $post_applying_for == "Assistant Professor" || $post_applying_for == "Professor") && $category_of_applicant == "General" && $category_applying == "General") {
            return true;
        }
        if($department == "Department of Hindi" && ($post_applying_for == "Associate Professor" || $post_applying_for == "Assistant Professor" || $post_applying_for == "Professor") && $category_of_applicant == "SC" && $category_applying == "General") {
            return true;
        }
        if($department == "Department of Hindi" && ($post_applying_for == "Associate Professor" || $post_applying_for == "Assistant Professor" || $post_applying_for == "Professor") && $category_of_applicant == "ST" && $category_applying == "General") {
            return true;
        }
        if($department == "Department of Hindi" && ($post_applying_for == "Associate Professor" || $post_applying_for == "Assistant Professor" || $post_applying_for == "Professor") && $category_of_applicant == "OBC" && $category_applying == "General") {
            return true;
        }
        return false;
    }
}

?>
