<?php

App::uses('CakeSession', 'Model/Datasource');

class Registereduser extends AppModel {

    //public $belongsTo = 'User';
    
    public $useTable = 'registered_users';
    
    var $validate = array(
        'email' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
        'password' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
        'passwd_confirm' => array(  
            'match' => array(  
                'rule'          => 'validatePasswdConfirm',  
                'required'      => true,  
                'allowEmpty'    => false,  
                'message'       =>  'Passwords do not match'  
            )  
        ),
        
    );

    function validatePasswdConfirm($data)  
    {  
        if ($this->data['Registereduser']['password'] !== $data['passwd_confirm'])  
        {  
            return false;  
        }  
  
        return true;  
    }
    
    function beforeSave($options = null)  
    {  
        if (isset($this->data['Registereduser']['password']))  
        {  
            $this->data['Registereduser']['password'] = Security::hash($this->data['Registereduser']['password'], null, true);  
        }  

        if (isset($this->data['Registereduser']['passwd_confirm']))  
        {  
            unset($this->data['Registereduser']['passwd_confirm']);  
        }  

        return true;  
    }
}

?>
