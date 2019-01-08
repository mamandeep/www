<?php

App::uses('ConnectionManager', 'Model'); 
App::uses('Security', 'Utility');

class UsersController extends AppController {

    var $components = array('Captcha.Captcha'=>array('Model'=>'Signup', 
                        'field'=>'security_code'));
    
    var $uses = array('Signup', 'Registereduser', 'Applicant');
    
    public $paginate = array(
        'limit' => 25,
        'conditions' => array('status' => '1'),
    	'order' => array('User.username' => 'asc' ) 
    );
	
    public function beforeFilter() {
        parent::beforeFilter();
        //$this->Auth->allow('login','add','logout'); 
    }
    
    public $helpers = array('Captcha.Captcha', 'SMS');
	
    function captcha()  {
        $this->autoRender = false;
        $this->layout='ajax';
        if(!isset($this->Captcha))	{ //if you didn't load in the header
            $this->Captcha = $this->Components->load('Captcha.Captcha'); //load it
        }
        $this->Captcha->create();
    }

	public function login() {
            $this->redirect(array('action' => 'dashboard'));
	}
        
        public function dashboard() {
            if(!empty($this->data['User'])){
                if(!filter_var($this->data['User']['email'], FILTER_VALIDATE_EMAIL)) {
                    $this->Session->setFlash('Email Id is not in correct format.');
                    return false;
                }
                $db = ConnectionManager::getDataSource('default');
                $sql = "SELECT * FROM `registered_users` WHERE email = '" . 
                        $this->data['User']['email'] . "' and password = '" . 
                        Security::hash($this->data['User']['password'], null, true) . "'"; //"' and applicant_id = '" .
                        //trim($this->data['User']['applicant_id']) . "'";
                $result = $db->rawQuery($sql);
                $count_r = 0;
                while ($row = $db->fetchRow()) { 
                    $this->Session->write('registration_id', $row['registered_users']['id']);
                    $this->Session->write('applicant_id', $row['registered_users']['applicant_id']);
                    $count_r++;
                }
                
                if($count_r == 1) {
                    $reg_id = $this->Session->read('registration_id');
                    
                    $this->Registereduser->create();
                    $this->Registereduser->id = $this->Session->read('registration_id');
                    $this->Registereduser->saveField('last_login', gmdate("Y-m-d H:i:s"));
                    $this->redirect(array('controller' => 'form', 'action' => 'appliedposts'));
                }
                else if($count_r == 0) {
                    $this->Session->setFlash('Please check the credentials entered below.');
                }
                else {
                    $this->Session->setFlash('Unable to login. Please contact support.');
                }
            }
        }

	public function logout() {
             $this->Session->destroy();
	     $this->redirect(array('action' => 'dashboard'));
             //$this->redirect($this->Auth->logout());
	}

    private function index() {
		$this->paginate = array(
			'limit' => 6,
			'order' => array('User.username' => 'asc' )
		);
		$users = $this->paginate('User');
		$this->set(compact('users'));
    }


    private function add() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                    $this->Session->setFlash(__('The user has been created'));
                    $this->redirect(array('action' => 'login'));
            } else {
                    $this->Session->setFlash(__('The user could not be created. Please, try again.'));
            }	
        }
    }

    private function edit($id = null) {

		    if (!$id) {
				$this->Session->setFlash('Please provide a user id');
				$this->redirect(array('action'=>'index'));
			}

			$user = $this->User->findById($id);
			if (!$user) {
				$this->Session->setFlash('Invalid User ID Provided');
				$this->redirect(array('action'=>'index'));
			}

			if ($this->request->is('post') || $this->request->is('put')) {
				$this->User->id = $id;
				if ($this->User->save($this->request->data)) {
					$this->Session->setFlash(__('The user has been updated'));
					$this->redirect(array('action' => 'edit', $id));
				}else{
					$this->Session->setFlash(__('Unable to update your user.'));
				}
			}

			if (!$this->request->data) {
				$this->request->data = $user;
			}
    }

    private function delete($id = null) {
		
		if (!$id) {
			$this->Session->setFlash('Please provide a user id');
			$this->redirect(array('action'=>'index'));
		}
		
        $this->User->id = $id;
        if (!$this->User->exists()) {
            $this->Session->setFlash('Invalid user id provided');
			$this->redirect(array('action'=>'index'));
        }
        if ($this->User->saveField('status', 0)) {
            $this->Session->setFlash(__('User deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not deleted'));
        $this->redirect(array('action' => 'index'));
    }
	
	public function activate($id = null) {
		
		if (!$id) {
			$this->Session->setFlash('Please provide a user id');
			$this->redirect(array('action'=>'index'));
		}
		
        $this->User->id = $id;
        if (!$this->User->exists()) {
            $this->Session->setFlash('Invalid user id provided');
			$this->redirect(array('action'=>'index'));
        }
        if ($this->User->saveField('status', 1)) {
            $this->Session->setFlash(__('User re-activated'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not re-activated'));
        $this->redirect(array('action' => 'index'));
    }

    public function register() {
            if(!empty($this->data['Registereduser'])) {
                $this->Signup->setCaptcha('security_code', $this->Captcha->getCode('Signup.security_code')); //getting from component and passing to model to make proper validation check
                $this->Signup->set($this->request->data);
                if ($this->Signup->validates()) {
                    $segments = explode('/', $this->data['Registereduser']['dob']);
                    if (count($segments) !== 3 || !preg_match("/^[0-3][0-9]\/[0-1][0-9]\/[0-9]{4}$/", $this->data['Registereduser']['dob'])) {
                        $this->Session->setFlash('Date of Birth is not in correct format.');
                        return false;
                    }
                    list($dd,$mm,$yyyy) = $segments;
                    if (!checkdate((int)$mm,(int)$dd,(int)$yyyy)) {
                        $this->Session->setFlash('Date of Birth is not in correct format.');
                        return false;
                    }
                    if(!filter_var($this->data['Registereduser']['email'], FILTER_VALIDATE_EMAIL)) {
                        $this->Session->setFlash('Email Id is not in correct format.');
                        return false;
                    }
                    if (!preg_match("/^[789]\d{9}$/",$this->data['Registereduser']['mobile_no'])) {
                        $this->Session->setFlash('Mobile number is not correct. Please enter a valid 10 digit mobile number.');
                        return false; 
                    }
                    $registered_user = $this->Registereduser->find('all', array(
                                'conditions' => array('Registereduser.email' => trim($this->data['Registereduser']['email']))
                                                    ));
                    if(count($registered_user) != 0) {
                        $this->Session->setFlash('Email is already registered.');
                        return false;
                    }
                    
                    if($this->Registereduser->save($this->data['Registereduser'])) {
                        $this->Session->write('registration_id', $this->Registereduser->getLastInsertID());
                        $this->Registereduser->id = $this->Session->read('registration_id');
                        $this->Session->setFlash('You have successfully registered. Please login and fill your Application Form.');
			$this->redirect(array('controller' => 'users', 'action' => 'dashboard'));
                    }
                    else {
                        $this->Session->setFlash('There was an error in Registration.');
                    }
                }
                else {
                    $this->Session->setFlash('Data Validation Failure', 'default', array('class' =>
                        'cake-error'));
                }
            }
        }
        
    public function forgotpassword() {
        if(!empty($this->data['Registereduser'])) {
            if(!filter_var($this->data['Registereduser']['email'], FILTER_VALIDATE_EMAIL)) {
                $this->Session->setFlash('Email Id is not in correct format.');
                return false;
            }
            
            $registered_user = $this->Registereduser->find('all', array(
                                'conditions' => array('Registereduser.email' => trim($this->data['Registereduser']['email']),
                                                      )));
            
            if(count($registered_user) != 1) {
                $this->Session->setFlash('Please check the email address.');
                return false;
            }
            
            $this->Session->write('registration_id', $registered_user['0']['Registereduser']['id']);
            $_SESSION['otp'] = $this->ozekiOTP();
            //print_r($_SESSION['otp']);
            $date_now = new DateTime();
            $date_now->setTimezone(new DateTimeZone("Asia/Calcutta"));
            //print_r($date_now->format("Y-m-d H:i:s"));
            $this->Registereduser->create();
            $this->Registereduser->set(array('otp_timestamp' => $date_now->format("Y-m-d H:i:s"),
                                    'otp' => $_SESSION['otp']));
            
            $this->Registereduser->id = $this->Session->read('registration_id');
            //print_r($this->Registereduser->data);
            //print_r($this->Registereduser->id);
            $this->Registereduser->save($this->Registereduser->data, false);
            //print_r("otp saved");
            
            $this->request->data = $registered_user['0'];
	
            
            ########################################################            
            ###        SENDING THE PASSWORD AND LOADING          ###
            ###            THE OTP-VERIFYING PAGE                ###
            ########################################################        
            //$this->ozekiSend('+91' . $registered_user['0']['Registereduser']['mobile_no'], 'Dear '.$registered_user['0']['Registereduser']['first_name'].'! Your One-Time password is: '.$_SESSION['otp'], false);
            
            //$response = $this->smsSend(/*$registered_user['0']['Registereduser']['mobile_no']*/ "9463069882", 'Dear '.$registered_user['0']['Registereduser']['first_name'].'! Your One-Time password is: '.$_SESSION['otp']);
            $response = "";
            if($this->is_connected()) {
                $response = $this->smsSend($registered_user['0']['Registereduser']['mobile_no'], 'Dear '.$registered_user['0']['Registereduser']['first_name'].'! Your One-Time password is: '.$_SESSION['otp']);
            }
            else {
                $this->Session->setFlash('OTP could not be sent at this time. Please contact support');
                return false;
            }
            
            if(!empty($response)) {
                $this->Registereduser->create();
                $this->Registereduser->set(array('otp_response' => $response));
                $this->Registereduser->id = $this->Session->read('registration_id');
                $this->Registereduser->save($this->Registereduser->data, false);
            }
			else {
				$this->Session->setFlash('OTP could not be sent at this time. Please contact support');
                return false;
			}
            
            $this->redirect(array('controller' => 'users', 'action' => 'changepassword'));
        }
    }
    
    public function changepassword() {
        if(!empty($this->data['Registereduser'])) {
            $registered_user = $this->Registereduser->find('all', array(
                                'conditions' => array('Registereduser.id' => $this->Session->read('registration_id'),
                                                      )));
            
            if(count($registered_user) != 1) {
                $this->Session->setFlash('An error occured. Please contact Support.');
                return false;
            }
            
            $ozotp = $this->data['Registereduser']['otp'];
            
            $timeGap = $this->getOTPTimeGap($registered_user);
            
            if( isset($_SESSION['otp']) && $ozotp === $_SESSION['otp'] && ($timeGap <= $this->OTPValidity) && $this->data['Registereduser']['password'] === $this->data['Registereduser']['passwd_confirm'] && $this->Registereduser->save($this->data['Registereduser'])) {
                $this->Registereduser->create();
                $this->Registereduser->set(array('otp_gap' => $timeGap));
                $this->Registereduser->id = $this->Session->read('registration_id');
                $this->Registereduser->save($this->Registereduser->data, false);
                $this->Session->setFlash('Password changed successfully.');
                $this->redirect(array('controller' => 'users', 'action' => 'dashboard'));
            }
            else if($ozotp !== $_SESSION['otp']) {
                $this->Session->setFlash('The OTP entered is not valid.');
                if($timeGap > $this->OTPValidity)
                    unset($_SESSION['otp']);
                return false;
            }
            else if($this->data['Registereduser']['password'] !== $this->data['Registereduser']['passwd_confirm']) {
                $this->Session->setFlash('The passwords did not match.');
                return false;
            }
            else {
                $this->Session->setFlash('There was an error in changing the password. Please contact support.');
                return false;
            }
        }
    }
}

?>
