<?php

class ApiScore extends AppModel {
    
    public $useTable = 'api';
            
    var $validate = array(
        'rp_refered_jour' => array(
            'numeric' => array(
                'rule' => 'numeric',
                'message' => 'Please enter only numbers',
                'allowEmpty' => true,
                'required' => false,
            )
        ),
        'rp_nonref_reco' => array(
            'numeric' => array(
                'rule' => 'numeric',
                'message' => 'Please enter only numbers',
                'allowEmpty' => true,
                'required' => false,
            )
        ),
        'rp_conf_full_paper' => array(
            'numeric' => array(
                'rule' => 'numeric',
                'message' => 'Please enter only numbers',
                'allowEmpty' => true,
                'required' => false,
            )
        ),
        'rpu_int_pub' => array(
            'numeric' => array(
                'rule' => 'numeric',
                'message' => 'Please enter only numbers',
                'allowEmpty' => true,
                'required' => false,
            )
        ),
        'rpu_national_pub' => array(
            'numeric' => array(
                'rule' => 'numeric',
                'message' => 'Please enter only numbers',
                'allowEmpty' => true,
                'required' => false,
            )
        ),
        'rpu_local_pub' => array(
            'numeric' => array(
                'rule' => 'numeric',
                'message' => 'Please enter only numbers',
                'allowEmpty' => true,
                'required' => false,
            )
        ),
        'rpu_chap_int_pub' => array(
            'numeric' => array(
                'rule' => 'numeric',
                'message' => 'Please enter only numbers',
                'allowEmpty' => true,
                'required' => false,
            )
        ),
        'rpu_chap_nat_pub' => array(
            'numeric' => array(
                'rule' => 'numeric',
                'message' => 'Please enter only numbers',
                'allowEmpty' => true,
                'required' => false,
            )
        ),
        'sponp_gabov_30' => array(
            'numeric' => array(
                'rule' => 'numeric',
                'message' => 'Please enter only numbers',
                'allowEmpty' => true,
                'required' => false,
            )
        ),
        'sponp_gabov_5' => array(
            'numeric' => array(
                'rule' => 'numeric',
                'message' => 'Please enter only numbers',
                'allowEmpty' => true,
                'required' => false,
            )
        ),
        'sponp_gabov_50k' => array(
            'numeric' => array(
                'rule' => 'numeric',
                'message' => 'Please enter only numbers',
                'allowEmpty' => true,
                'required' => false,
            )
        ),
        'consp_gabove_10' => array(
            'numeric' => array(
                'rule' => 'numeric',
                'message' => 'Please enter only numbers',
                'allowEmpty' => true,
                'required' => false,
            )
        ),
        'comp_projects_qe' => array(
            'numeric' => array(
                'rule' => 'numeric',
                'message' => 'Please enter only numbers',
                'allowEmpty' => true,
                'required' => false,
            )
        ),
        'proj_patent' => array(
            'numeric' => array(
                'rule' => 'numeric',
                'message' => 'Please enter only numbers',
                'allowEmpty' => true,
                'required' => false,
            )
        ),
        'rg_mphil' => array(
            'numeric' => array(
                'rule' => 'numeric',
                'message' => 'Please enter only numbers',
                'allowEmpty' => true,
                'required' => false,
            )
        ),
        'rg_phd' => array(
            'numeric' => array(
                'rule' => 'numeric',
                'message' => 'Please enter only numbers',
                'allowEmpty' => true,
                'required' => false,
            )
        ),
        'rg_thesis_sub' => array(
            'numeric' => array(
                'rule' => 'numeric',
                'message' => 'Please enter only numbers',
                'allowEmpty' => true,
                'required' => false,
            )
        ),
        'refreshc_train_2week' => array(
            'numeric' => array(
                'rule' => 'numeric',
                'message' => 'Please enter only numbers',
                'allowEmpty' => true,
                'required' => false,
            )
        ),
        'refreshc_one_week' => array(
            'numeric' => array(
                'rule' => 'numeric',
                'message' => 'Please enter only numbers',
                'allowEmpty' => true,
                'required' => false,
            )
        ),
        'pap_pp_int' => array(
            'numeric' => array(
                'rule' => 'numeric',
                'message' => 'Please enter only numbers',
                'allowEmpty' => true,
                'required' => false,
            )
        ),
        'pap_pp_nat' => array(
            'numeric' => array(
                'rule' => 'numeric',
                'message' => 'Please enter only numbers',
                'allowEmpty' => true,
                'required' => false,
            )
        ),
        'pap_pp_reg' => array(
            'numeric' => array(
                'rule' => 'numeric',
                'message' => 'Please enter only numbers',
                'allowEmpty' => true,
                'required' => false,
            )
        ),
        'pap_pp_local' => array(
            'numeric' => array(
                'rule' => 'numeric',
                'message' => 'Please enter only numbers',
                'allowEmpty' => true,
                'required' => false,
            )
        ),
        'invited_lec_int' => array(
            'numeric' => array(
                'rule' => 'numeric',
                'message' => 'Please enter only numbers',
                'allowEmpty' => true,
                'required' => false,
            )
        ),
        'invited_lec_nat' => array(
            'numeric' => array(
                'rule' => 'numeric',
                'message' => 'Please enter only numbers',
                'allowEmpty' => true,
                'required' => false,
            )
        )
    );
    
    

}

?>
