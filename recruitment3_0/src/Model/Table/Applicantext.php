<?php

App::uses('CakeSession', 'Model/Datasource');

class Applicantext extends AppModel {

    //public $belongsTo = 'User';
    public $useTable = 'applicant';
    var $validate = array(
        'appId',
        'ref_add1' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
        'ref_add2' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
        'ref_add3' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
        'working_at_present' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
        'time_req_for_joining' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
        'mem_pro_bodies' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'required'   => true,
                'message' => 'This field cannot be left blank'
            ),
            'pattern'=>array(
                 'rule'      => '/^yes|no$/i',
                 'message'   => 'Only Yes / No allowed'
            ),
            'mem_if_yes' => array(
                'rule' => array('checkmembership', 'mem_details'),
                'message' => 'Please fill Membership Details below.'
            )
        ),
        'mem_pro_bodies_national' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'required'   => true,
                'message' => 'This field cannot be left blank'
            ),
            'pattern'=>array(
                 'rule'      => '/^yes|no$/i',
                 'message'   => 'Only Yes / No allowed'
            ),
            'mem_if_yes' => array(
                'rule' => array('checkmembership_national', 'mem_details_national'),
                'message' => 'Please fill Membership Details below.'
            )
        ),
        'mem_details' => array(
            'length' => array (
                'rule' => array('maxLength', 1000),
                'message' => 'This field has crossed allowed limit.',
                'allowEmpty' => true
            )
        ),
        'convicted' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'required'   => true,
                'message' => 'This field cannot be left blank'
            ),
            'pattern'=>array(
                 'rule'      => '/^yes|no$/i',
                 'message'   => 'Only Yes / No allowed'
            )
        ),
        'pending_court' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'required'   => true,
                'message' => 'This field cannot be left blank'
            ),
            'pattern'=>array(
                 'rule'      => '/^yes|no$/i',
                 'message'   => 'Only Yes / No allowed'
            )
        ),
        'willg_min_pay' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'required'   => true,
                'message' => 'This field cannot be left blank'
            ),
            'pattern'=>array(
                 'rule'      => '/^yes|no$/i',
                 'message'   => 'Only Yes / No allowed'
            ),
            'mem_if_yes' => array(
                'rule' => array('checkminpay', 'min_pay_no'),
                'message' => 'Please fill Reasons below.'
            )
        ),
        'min_pay_no' => array(
            'length' => array (
                'rule' => array('maxLength', 1000),
                'message' => 'This field has crossed allowed limit.',
                'allowEmpty' => true
            )
        ),
        'total_self_att_docs_att' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
        'list_matric' => array(
            'rule' => array('checkdocuments', 'list_matric' , 'list_matric_pages'),
            'allowEmpty' => true,
            'required' => false,
            'message' => 'No. of documents is complusory.'
        ),
        'list_intermediate' => array(
            'rule' => array('checkdocuments', 'list_intermediate' , 'list_intermediate_pages'),
            'allowEmpty' => true,
            'required' => false,
            'message' => 'No. of documents is complusory.'
        ),
        'list_bsc' => array(
            'rule' => array('checkdocuments', 'list_bsc' , 'list_bsc_pages'),
            'allowEmpty' => true,
            'required' => false,
            'message' => 'No. of documents is complusory.'
        ),
        'list_msc' => array(
            'rule' => array('checkdocuments', 'list_msc' , 'list_msc_pages'),
            'allowEmpty' => true,
            'required' => false,
            'message' => 'No. of documents is complusory.'
        ),
        'list_llb' => array(
            'rule' => array('checkdocuments', 'list_llb' , 'list_llb_pages'),
            'allowEmpty' => true,
            'required' => false,
            'message' => 'No. of documents is complusory.'
        ),
        'list_llm' => array(
            'rule' => array('checkdocuments', 'list_llm' , 'list_llm_pages'),
            'allowEmpty' => true,
            'required' => false,
            'message' => 'No. of documents is complusory.'
        ),
        'list_mphil' => array(
            'rule' => array('checkdocuments', 'list_mphil' , 'list_mphil_pages'),
            'allowEmpty' => true,
            'required' => false,
            'message' => 'No. of documents is complusory.'
        ),
        'list_phd' => array(
            'rule' => array('checkdocuments', 'list_phd' , 'list_phd_pages'),
            'allowEmpty' => true,
            'required' => false,
            'message' => 'No. of documents is complusory.'
        ),
        'list_dlit' => array(
            'rule' => array('checkdocuments', 'list_dlit' , 'list_dlit_pages'),
            'allowEmpty' => true,
            'required' => false,
            'message' => 'No. of documents is complusory.'
        ),
        'list_net' => array(
            'rule' => array('checkdocuments', 'list_net' , 'list_net_pages'),
            'allowEmpty' => true,
            'required' => false,
            'message' => 'No. of documents is complusory.'
        ),
        'list_caste_cert' => array(
            'rule' => array('checkdocuments', 'list_caste_cert' , 'list_caste_cert_pages'),
            'allowEmpty' => true,
            'required' => false,
            'message' => 'No. of documents is complusory.'
        ),
        'list_exp_cert' => array(
            'rule' => array('checkdocuments', 'list_exp_cert' , 'list_exp_cert_pages'),
            'allowEmpty' => true,
            'required' => false,
            'message' => 'No. of documents is complusory.'
        ),
        'list_reco_letter' => array(
            'rule' => array('checkdocuments', 'list_reco_letter' , 'list_reco_letter_pages'),
            'allowEmpty' => true,
            'required' => false,
            'message' => 'No. of documents is complusory.'
        ),
        'list_award' => array(
            'rule' => array('checkdocuments', 'list_award' , 'list_award_pages'),
            'allowEmpty' => true,
            'required' => false,
            'message' => 'No. of documents is complusory.'
        ),
        'list_publication' => array(
            'rule' => array('checkdocuments', 'list_publication' , 'list_publication_pages'),
            'allowEmpty' => true,
            'required' => false,
            'message' => 'No. of documents is complusory.'
        ),
        'peer_recognition_yn' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
        'working_at_present' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        )
    );
    
    public function checkmembership ($data, $mem_details) {
        if(strcmp($data['mem_pro_bodies'], 'no') === 0)  {
            return true;
        }
        return (strcmp($data['mem_pro_bodies'], 'yes') === 0 && strlen($this->data[$this->alias][$mem_details]) > 0) ? true : false;
    }
    
    public function checkmembership_national ($data, $mem_details) {
        if(strcmp($data['mem_pro_bodies_national'], 'no') === 0)  {
            return true;
        }
        return (strcmp($data['mem_pro_bodies_national'], 'yes') === 0 && strlen($this->data[$this->alias][$mem_details]) > 0) ? true : false;
    }
    
    public function checkminpay ($data, $minpay) {
        if(strcmp($data['willg_min_pay'], 'yes') === 0)  {
            return true;
        }
        return (strcmp($data['willg_min_pay'], 'no') === 0 && strlen($this->data[$this->alias][$minpay]) > 0) ? true : false;
    }
    
    public function checkdocuments($data, $checkbox, $no_of_pages) {
        $checkbox = $data[$checkbox];
        $pages = $this->data[$this->alias][$no_of_pages];
        //debug($checkbox); debug($pages); return false;
        if($checkbox == "1" && !empty($pages) && intval($pages) > 0) {
            return true;
        }
        else if($checkbox == "0") {
            return true;
        }
        return false;
    }
}
        
?>

