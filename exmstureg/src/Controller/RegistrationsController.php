<?php

namespace App\Controller;

use Cake\Mailer\Email;
use Cake\Event\Event;

use Cake\ORM\TableRegistry;
use \Datetime;
use DateTimeZone;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Datasource\ConnectionManager;

class RegistrationsController extends AppController {
    
    
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['add', 'forgotpasswd', 'changepassword', 'confirm', 'confirmmobile', 'confirmmobileotp']);
    }
    
    public function add()
    {
	$flag = $this->isFormFillingOpen();      
	$user = $this->Registrations->newEntity();
        if ($this->request->is(['post', 'put']) && $flag === true) {
            $user = $this->Registrations->patchEntity($user, $this->request->getData());
	    $existing = $this->Registrations->find('all', ['conditions' => ['email' => trim($user['email'])]])->toArray();
	    if(count($existing) === 1) {
		$this->Flash->success(__('You have already registered successfully. Please login using your Registred Email I\'d and Password.'));
		return $this->redirect([
				'controller' => 'users',
				'action' => 'login'
			    ]);
	    }
	    else {
                try {
                    if (($result = $this->Registrations->save($user))) {
                        //debug("comes here");
                        $userid = $result->id;
                        //debug("comes here 2");
                        //create a random key
                        $key = $user['email'] . $user['mobile'] . date('mY');
                        $key = md5($key);

                        $confirmTable = TableRegistry::get('Confirm');
                        //debug($confirmTable);
                        $confirmObj = $confirmTable->newEntity(['user_id' => $userid, 'token' => $key, 'email' => $user['email']], ['validate' => false]);
                        //debug($confirmObj); return null;
                        if($confirmTable->save($confirmObj)) {
                            $this->sendemail($user['email'], ['name' => $user['name'], 'email' => $user['email'], 'key' => $key]);
                            $this->Flash->success(__('You have successfully registered. Please check your Email for confirmation link.'));
                            return $this->redirect([
                                'controller' => 'users',
                                'action' => 'login'
                            ]);
                        }
                        else{
                            $this->Flash->error(__('There was an error in sending confirmation email. Please check the entered email I\'d or contact Support.'));
                        } 
                    }   
                } catch (\Exception $e) {
                    $this->Flash->error(__('Unable to register. Please check the entered Email I\'d and other field values.'));
                    //debug($e->getMessage());
                    //debug($e->getTrace());
                }
	    }
            if(!empty($user->errors())) {
                $this->Flash->error(__('Unable to register. Please correct the field values or contact Support.'));
            }
        }
	else if($this->request->is(['post', 'put']) && $flag === false) {
            $this->Flash->error(__('Registration is closed at this time.'));
	}
        $this->set('cucetregister', $user);
    }
    
    public function forgotpasswd()
    {
        if($this->request->is(['post'])) {
            $email = $this->request->data['email'];
            if(!filter_var(trim($email), FILTER_VALIDATE_EMAIL)) {
                $this->Flash->error(__('Email Id is not in correct format.'));
                return $this->redirect(['controller' => 'registrations','action' => 'forgotpasswd']);
            }
            
            $usersTable = TableRegistry::get('Users'); 
            $user = $usersTable->find()->where(['email' => $email ])->toArray();
            if(count($user) > 1) {
                $this->Flash->error(__('Multiple registrations found with same Email ID. Please contact support.'));
                return $this->redirect(['controller' => 'registrations','action' => 'forgotpasswd']);
            }
            else if(count($user) === 1) {
                $user = $user[0];
            }
            else {
                $user = false;
            }
            if (!$user) {
                $this->Flash->error(__('No registration found with the given Email ID.'));
                return $this->redirect(['controller' => 'registrations','action' => 'forgotpasswd']);
           }
           $session = $this->request->session();
           $session->write('userId',$user['id']);
           $session->write('otp',$this->ozekiOTP());

            $date_now = new DateTime();
            $date_now->setTimezone(new DateTimeZone("Asia/Calcutta"));
            $user = $usersTable->patchEntity($user, ['otp_timestamp' => $date_now->format("Y-m-d H:i:s"),
                                               'otp' => $session->read('otp')], ['validate' => false]);

            if(!$usersTable->save($user)) {
                $this->Flash->error(__('There was an error in generating OTP. Please contact support.'));
                return $this->redirect(['controller' => 'registrations','action' => 'forgotpasswd']);
            }            
            $response = "";
            if($this->is_connected()) {
                //$response = $this->smsSend($user['mobile'], 'Dear '.$user['first_name'].'! Your One-Time password is: '.$session->read('otp'));
            }
            else {
                $this->Flash->error(__('OTP could not be sent at this time. Please contact support.'));
                return $this->redirect(['controller' => 'registrations','action' => 'forgotpasswd']);
            }

            $user = $usersTable->patchEntity($user, ['otp_response' => $response], ['validate' => false]);
            if(!$usersTable->save($user)) {
                $this->Flash->error(__('There was an error in sending OTP. Please contact support.'));
                return $this->redirect(['controller' => 'registrations','action' => 'forgotpasswd']);
            }
            $this->Flash->success(__('An OTP has been sent to your Mobile No.'));
            $this->redirect(array('controller' => 'registrations', 'action' => 'changepassword'));
       }
    }
    
    public function changepassword() {
        if($this->request->is(['post'])) {
            //debug($this->request->data());
            $session = $this->request->session();
            $userId = intval($session->read('userId'));
            $newPassowrd = $this->request->data['password'];
            $password_confirm = $this->request->data['password_confirm'];
            $ozotp = $this->request->data['otp_value'];
            
            
            $usersTable = TableRegistry::get('Users'); 
            $user = $usersTable->find()->where(['id' => $userId])->first();

            if (!$user) {
                $this->Flash->error(__('No user found.'));
                return $this->redirect(['controller' => 'registrations','action' => 'changepassword']);
           }
           $timeGap = $this->getOTPTimeGap($user);
           if( null != $session->read('otp') && $ozotp === $session->read('otp') && ($timeGap <= $this->OTPValidity) && $newPassowrd === $password_confirm) {
               
                if(!$this->checkpassword($newPassowrd, $password_confirm)) {
                    $this->Flash->error(__('New password does not meet the minimum requirements mentioned below.'));
                    return $this->redirect(['controller' => 'registrations', 'action' => 'changepassword']);
                }
                $user = $usersTable->patchEntity($user, ['otp_gap' => $timeGap, 'password' => $newPassowrd], ['validate' => false]);
                if (!$usersTable->save($user)) {
                    $this->Flash->error(__('An error occurred during saving password. Please contact support.'));
                    return $this->redirect(['controller' => 'registrations', 'action' => 'changepassword']);
                }
            }
            else if($ozotp !== $session->read('otp')) {
                $this->Flash->error(__('The OTP entered is not valid.'));
                if($timeGap > $this->OTPValidity)
                    $session->delete('otp');
                return $this->redirect(['controller' => 'registrations', 'action' => 'forgotpasswd']);
            }
            else if($newPassowrd !== $password_confirm) {
                $this->Flash->error(__('The passwords did not match.'));
                return $this->redirect(['controller' => 'registrations', 'action' => 'forgotpasswd']);
            }
            else {
                $this->Flash->error(__('There was an error in changing the password. Please contact support.'));
                return $this->redirect(['controller' => 'registrations', 'action' => 'forgotpasswd']);
            }
            $this->Flash->success(__('You have successfully changed password.'));
            return $this->redirect(['controller' => 'users', 'action' => 'login']);
        }
    }
    
    private function checkpassword($newPassword, $passwordConfirm) {
        $match = true;
        
        $match = (strlen($newPassword) >= 8) ? true : false;
        if($match === false) {
            return $match;
        }
        //debug($match);
        $pattern = '/[0-9]+/';
        $match = (preg_match($pattern, $newPassword)) ? true : false;
        if($match === false) {
            return $match;
        }
        //debug($match);
        $pattern = '/[a-zA-Z]+/';
        $match = (preg_match($pattern, $newPassword)) ? true : false;
        if($match === false) {
            return $match;
        }
        //debug($match);
        $match = (strcmp($newPassword,$passwordConfirm) === 0);
        //debug($match);
        return $match;
    }
    
    function confirm() {
        
        if(empty($_GET['email']) || empty($_GET['key'])) {
            $this->Flash->error(__('No variables found for confirmation of Registration.'));
        }
        
        try {
            //cleanup the variables
            $email = $this->request->query['email'];
            $key = $this->request->query['key'];

            //check if the key is in the database
            $confirmTable = TableRegistry::get('Confirm');
            $result = $confirmTable->find('all', ['conditions' => ['Confirm.email' => $email, 'Confirm.token' => $key]])->toArray();

            if(count($result) > 0) {
                $result = $result[0];
                //debug($result);
                $conn = ConnectionManager::get('default');
                $conn->transactional(function ($conn) use($result) {
                    $conn->execute('UPDATE users SET active = 1 WHERE id = ' . $result['user_id']);
                    $conn->execute('DELETE FROM confirm WHERE user_id = ' . $result['user_id']);
                });
                $this->Flash->success(__('You have successfully confirmed Registration.'));
                return $this->redirect([
                    'controller' => 'users',
                    'action' => 'login'
                ]);
            }
            else {
                $this->Flash->error(__('No user found pending confirmation. Please Register or contact Support.'));
            }
        }
        catch(\Exception $e) {
            $this->Flash->error(__('There was an error in confirmation of Registration. Please contact support.'));
        }
    }
    
    function confirmmobile() {
        
        if($this->request->is(['post'])) {
            $email = $this->request->data['email'];
            if(!filter_var(trim($email), FILTER_VALIDATE_EMAIL)) {
                $this->Flash->error(__('Email Id is not in correct format.'));
                return $this->redirect(['controller' => 'registrations','action' => 'confirmmobile']);
            }
            
            $usersTable = TableRegistry::get('Users'); 
            $user = $usersTable->find()->where(['email' => $email ])->toArray();
			//debug($user); return null;
            if(count($user) > 1) {
                $this->Flash->error(__('Multiple registrations found with same Email ID. Please contact support.'));
                return $this->redirect(['controller' => 'registrations', 'action' => 'confirmmobile']);
            }
            else if(count($user) === 1) {
                $user = $user[0];
            }
            else {
                $user = false;
            }
            if (!$user) {
                $this->Flash->error(__('No registration found with the given Email ID.'));
                return $this->redirect(['controller' => 'registrations','action' => 'confirmmobile']);
           }
           if ($user['mob_no_confirmed'] == 1) {
                $this->Flash->error(__('Mobile Number has already been confirmed.'));
                return null;
           }
           $session = $this->request->session();
           $session->write('userId',$user['id']);
           $session->write('otp',$this->ozekiOTP());

            $date_now = new DateTime();
            $date_now->setTimezone(new DateTimeZone("Asia/Calcutta"));
            $user = $usersTable->patchEntity($user, ['otp_timestamp' => $date_now->format("Y-m-d H:i:s"),
                                               'otp' => $session->read('otp')], ['validate' => false]);
            
            if(!$usersTable->save($user)) {
                $this->Flash->error(__('There was an error in generating OTP. Please contact support.'));
                return $this->redirect(['controller' => 'registrations','action' => 'confirmmobile']);
            }            
            $response = "";
            if($this->is_connected()) {
                $response = $this->smsSend($user['mobile'], 'Dear '.$user['name'].'! Your One-Time password is: '.$session->read('otp'));
            }
            else {
                $this->Flash->error(__('OTP could not be sent at this time. Please contact support.'));
                return $this->redirect(['controller' => 'registrations','action' => 'confirmmobile']);
            }
            
            $user = $usersTable->patchEntity($user, ['otp_response' => $response], ['validate' => false]);
            if(!$usersTable->save($user)) {
                $this->Flash->error(__('There was an error in sending OTP. Please contact support.'));
                return $this->redirect(['controller' => 'registrations','action' => 'confirmmobile']);
            }
            $this->Flash->success(__('An OTP has been sent to your Mobile No.'));
            return $this->redirect(['controller' => 'registrations', 'action' => 'confirmmobileotp']);
       }
    }
    
    function confirmmobileotp() {
        if($this->request->is(['post'])) {
            //debug($this->request->data());
            $session = $this->request->session();
            $userId = intval($session->read('userId'));
            $ozotp = $this->request->data['otp_value'];
            
            
            $usersTable = TableRegistry::get('Users'); 
            $user = $usersTable->find()->where(['id' => $userId])->first();

            if (!$user) {
                $this->Flash->error(__('No user found.'));
                return $this->redirect(['controller' => 'registrations','action' => 'confirmmobileotp']);
           }
           if ($user['mob_no_confirmed'] == 1) {
                $this->Flash->error(__('Mobile Number has already been confirmed.'));
                return null;
           }
           $timeGap = $this->getOTPTimeGap($user);
           if( null != $session->read('otp') && $ozotp === $session->read('otp') && ($timeGap <= $this->OTPValidity)) {
                $user = $usersTable->patchEntity($user, ['otp_gap' => $timeGap, 'mob_no_confirmed' => 1], ['validate' => false]);
                //debug($user); return null;
                if (!$usersTable->save($user)) {
                    $this->Flash->error(__('An error occurred during mobile confirmation through OTP. Please contact support.'));
                    return $this->redirect(['controller' => 'registrations', 'action' => 'confirmmobileotp']);
                }
            }
            else if($ozotp !== $session->read('otp')) {
                $this->Flash->error(__('The OTP entered is not valid.'));
                if($timeGap > $this->OTPValidity)
                    $session->delete('otp');
                return $this->redirect(['controller' => 'registrations', 'action' => 'confirmmobile']);
            }
            $this->Flash->success(__('You have successfully confirmed your mobile number.'));
            return $this->redirect(['controller' => 'users', 'action' => 'login']);
        }
    }
    
    function format_email($info, $format) { 
        //set the root
        $root = $_SERVER['DOCUMENT_ROOT'].'/src/Template/Email/html';

        //grab the template content
        $template = file_get_contents($root.'/confirm.ctp');

        //replace all the tags
        $template = ereg_replace('{USERNAME}', $info['username'], $template);
        $template = ereg_replace('{USEREMAIL}', $info['email'], $template);
        $template = ereg_replace('{EMAIL}', $info['email'], $template);
        $template = ereg_replace('{KEY}', $info['key'], $template);
        $template = ereg_replace('{SITEPATH}','http://' . $_SERVER['HTTP_HOST'] . '/exmstureg', $template);
        $template = ereg_replace('{CONTROLLER}','/registrations', $template);
        $template = ereg_replace('{ACTION}','/confirm', $template);

        //return the html of the template
        return $template;
    }
    
    public function sendemail($to, $info) {
        $email = new Email('default');
        $email->setSender('examination@cup.edu.in', 'Examination Section');
        $email
            ->setFrom(['examination@cup.edu.in' => 'Examination Section'])
            ->template('confirm')
            ->emailFormat('html')
            ->setTo($to)
            ->subject('Confirmation Email - Student Registration Portal CUPB')
            ->viewVars(['USERNAME' => $info['name'], 'USEREMAIL' => $info['email'], 'EMAIL' => $info['email'], 'KEY' => $info['key'], 'SITEPATH' => 'http://cup.edu.in/exmstureg', 'CONTROLLER' => '/registrations', 'ACTION' => '/confirm'])
            ->send();
    }
}
