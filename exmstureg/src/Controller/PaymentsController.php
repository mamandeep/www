<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\Email;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;
use \DateTime;
use \DateTimeZone;

class PaymentsController extends AppController {

    public function initialize() {
        parent::initialize();

        $this->loadComponent('Flash'); // Include the FlashComponent
    }

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
    }

    public function index() {
        return $this->redirect(['action' => 'submitfee']);
        // List of all payments
        $payments = $this->Payments->find('all');
        $this->set('payments', $payments);
    }

    public function view($id) {
        return $this->redirect(['action' => 'submitfee']);
        // View a particular payment
        $payment = $this->Payments->get($id);
        $this->set(compact('paymentat'));
    }

    public function sendemail() {
        $email = new Email('default');
        $email->setSender('app@example.com', 'MyApp emailer');
        Email::setConfigTransport('ernet', [
            'host' => 'ssl://mail.eis.ernet.in',
            'port' => 465,
            'username' => 'sa@cup.ac.in',
            'password' => 'ASMann@123#',
            'className' => 'Smtp'
        ]);
        $email->setFrom(['sa@cup.ac.in' => 'My Site'])
                ->setTo('mann.cse@gmail.com')
                ->setSubject('About Link Confirmation')
                ->send('My message');
    }

    public function add() {
        return $this->redirect(['action' => 'submitfee']);
        $payment = $this->Payments->newEntity();
        if ($this->request->is('post')) {
            $payment = $this->Payments->patchEntity($payment, $this->request->getData());
            // Added this line
            $seat->user_id = $this->Auth->user('id');
            // You could also do the following
            //$newData = ['user_id' => $this->Auth->user('id')];
            //$article = $this->Articles->patchEntity($article, $newData);
            if ($this->Payments->save($payment)) {
                $this->Flash->success(__('Your payment has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your payment.'));
        }
        $this->set('payment', $payment);
    }
    
    public function submitfee() {
        $flag = $this->isSubmitFeeOpen();
        if($flag) {
            $this->set('submitFeeOpen', true);
        }
        else {
            $this->set('submitFeeOpen', false);
        }
        //$candidatesTable = TableRegistry::get('Candidates');
        //$candidate = $candidatesTable->find('list')->where(['Candidates.user_id' => $this->Auth->user('id')]);
        
        //debug($candidate->toArray()); 
        //$candidateId = array_keys($candidate->toArray())[0];
        $conn = ConnectionManager::get('default');
        
        $query_string = 'select * from datafeecollection
                         where Registration_No = \'' .  $this->Auth->user('username') . '\'';
        $stmt = $conn->execute($query_string);
        $studentdata = $stmt->fetchAll('assoc');
        $session = $this->request->session();
		$studentFailed = false;
		$listOfFailedStudents = ['17masolg02', '17mcomrc20', '17mededu14', '17mscchs04', '17mslsbc15', '17msmath09', '17mscphy25', '16mslsmm11', '16mscchs08', '16mageog10'];
        if(in_array($this->Auth->user('username'), $listOfFailedStudents)) {
		    $this->Flash->error(__('Please contact Placement Cell regarding fee submission.'));
		    $studentFailed = true;
        }
        if($this->request->is(['post', 'put']) && $flag === true && $studentFailed === false) {
            //$session = $this->request->session();
            
            $token = $session->read('feetoken');
            //debug($this->request->data()); return null;
            if($token === $this->request->data()['tokenid']) {
                if(!empty($this->request->data()['placementfee'])) {
                    $session->write('fee_type', 'placement');
                    $this->redirect(['action' => 'pay']);
                }
            }
            // Flash error
        }
        else if($this->request->is(['post', 'put']) && $flag === false) {
            $this->Flash->error(__('Submission of fee is closed at this time.'));
        }
        $token = uniqid();
        
        $session->write('feetoken', $token);
        
        if(count($studentdata) === 1) {
            $studentdata = $studentdata[0];
        }
        else if(count($studentdata) === 0) {
            $studentdata = [];
        }
        $this->set('studentdata', $studentdata);
        $query_string = 'select *
                        from regfees f1
                        where f1.reg_no = \'' .  $this->Auth->user('username') . '\'';
        
        $stmt = $conn->execute($query_string);
        $feePaid = $stmt->fetchAll('assoc');
        //debug($feePaid[0]['response_code']);
        $this->set('token', $token);
        $this->set('feePaid', $feePaid);
    }
    
    public function pay() {
        
        $session = $this->request->session();
        //$programe_id = intval($session->read('programme_id_for_fee'));
        //debug($programe_id);
        //$usersTable = TableRegistry::get('Users');
        //$user = $usersTable->find('all', ['conditions' => ['Users.id' => $this->Auth->user('id')]])->toArray();
        //$programmesTable = TableRegistry::get('Programmes');
        //$programme = $programmesTable->find('all', ['conditions' => [ 'Programmes.id' => $programe_id]])->toArray();
        $conn = ConnectionManager::get('default');
        $query_string = 'select * from datafeecollection
                         where Registration_No = \'' .  $this->Auth->user('username') . '\'';
        $stmt = $conn->execute($query_string);
        $studentdata = $stmt->fetchAll('assoc');
        if(count($studentdata) === 1) {
            $studentdata = $studentdata[0];
        }
        else if(count($studentdata) === 0) {
            $studentdata = [];
        }
        $fee = 0;
        $applicantId = '';
        $fee_in_record = 0;
		if (! empty ( $this->placmentFee ) && $this->placmentFee > 0 && $session->read ( 'fee_type' ) === "placement") {
			$fee = $this->placmentFee;
			$applicantId = $this->Auth->user ( 'username' );
		} 
        else {
            $this->Flash->error(__('The placement fee is not found in the list. Please contact support.'));
            return null;
        }
        
        $this->set('app_fee', $fee);
        
        $session->write('payment_amount', $fee);
        //debug($fee); debug($applicantId);
        $this->set('applicantId', $applicantId);
    }
    
    public function post() {
		//print_r($this->request->data);
        $session = $this->request->session();
        $HASHING_METHOD = 'sha512'; // md5,sha1
        $ACTION_URL = "https://secure.ebs.in/pg/ma/payment/request/";

        $this->set('ACTION_URL',$ACTION_URL);		
        if(isset($_POST['secretkey']))
                $_SESSION['SECRET_KEY'] = $_POST['secretkey'];
        else
                $_SESSION['SECRET_KEY'] = ''; //set your secretkey here

        $hashData = $_SESSION['SECRET_KEY'];

        unset($_POST['secretkey']);
        unset($_POST['submitted']);

        ksort($_POST);
        foreach ($_POST as $key => $value) {
                if (strlen($value) > 0) {
                        if($key == "amount") {
                                $hashData .= '|'. $session->read('payment_amount');
                        }
                        else {
                                $hashData .= '|'.$value;
                        }
                }
        }
        if (strlen($hashData) > 0) {
                $secureHash = strtoupper(hash($HASHING_METHOD, $hashData));
                $this->set('secureHash', $secureHash);
        }
    }
    
    public function returnpg() {
        $HASHING_METHOD = 'sha512'; // md5,sha1

        // This response.php used to receive and validate response.
        if(!isset($_SESSION['SECRET_KEY']) || empty($_SESSION['SECRET_KEY']))
        $_SESSION['SECRET_KEY'] = ''; //set your secretkey here

        $hashData = $_SESSION['SECRET_KEY'];
        ksort($_POST);
        foreach ($_POST as $key => $value) {
                if (strlen($value) > 0 && $key != 'SecureHash') {
                        $hashData .= '|'.$value;
                }
        }
        if (true || strlen($hashData) > 0) {
                $secureHash = strtoupper(hash($HASHING_METHOD , $hashData));

                if(true || !empty($_POST['SecureHash']) && $secureHash == $_POST['SecureHash']){

                    if(true || $_POST['ResponseCode'] == 0 && intval($this->Auth->user('id')) > 0) {
                            // update response and the order's payment status as SUCCESS in to database
                            //$candidatesTable = TableRegistry::get('Candidates');
                            //$candidate = $candidatesTable->find('list')->where(['Candidates.user_id' => $this->Auth->user('id')]);

                            //debug($candidate->toArray()); 
                            //$candidateId = array_keys($candidate->toArray())[0];
                            $session = $this->request->session();
                            $regfeesTable = TableRegistry::get('Regfees');
                            $feesTable = TableRegistry::get('Fees');
                            $fee = '';
                            //$seat = '';
						    $conn = ConnectionManager::get('default');
						    $query_string = 'select * from datafeecollection
								 where Registration_No = \'' .  $this->Auth->user('username') . '\'';
						    $stmt = $conn->execute($query_string);
						    $studentdata = $stmt->fetchAll('assoc');
						    if(count($studentdata) === 1) {
						        $studentdata = $studentdata[0];
						    }
						    else if(count($studentdata) === 0) {
						        $studentdata = [];
						    }
                            $conn->begin();
                            $saved = true;
                            $regfees = $regfeesTable->find('all', ['conditions' => ['Regfees.reg_no' => $this->Auth->user('username'),
                                                                                 'Regfees.fee_type' => $session->read('fee_type')]])->toArray();
                            if(count($regfees) === 0) {
								$regfees = $regfeesTable->newEntity(['fee_type' => $session->read('fee_type'),
                                                                    	'user_id' => $this->Auth->user('id'),
                                                                    	'reg_no' => $this->Auth->user('username')]);
								
                            }
                            else if(count($regfees) === 1) {
                                $regfees = $regfees[0];
                            }
                            /*$fee = $feesTable->newEntity(['response_code' => $_POST['ResponseCode'],
                                                    'payment_date_created' => $_POST['DateCreated'],
                                                    'payment_id' => $_POST['PaymentID'],
                                                    'payment_amount' => $_POST['Amount'],
                                                    'payment_transaction_id' => $_POST['TransactionID']]);*/
                            $fee = $feesTable->newEntity(['response_code' => '0',
                                                    'payment_date_created' => '2016-08-16 11:16:19',
                                                    'payment_id' => '58377379',
                                                    'payment_amount' => '8900',
                                                    'payment_transaction_id' => '159653335']);
                            $fee->user_id = $this->Auth->user('id');
						    if($session->read('fee_type') == "placement" && (empty($this->placmentFee) || intval($this->placmentFee) === 0 || intval($this->placmentFee) != 100 )) { //intval($_POST['Amount']))) {
								$saved = false;	
						    }
                            $result = '';
                            if($saved == false || !($result = $feesTable->save($fee))) {
                                $saved = false;
                            }
                            if($saved) {
                                $regfees->fee_id = $result->id;
                            }
                            if($saved == false || !($result = $regfeesTable->save($regfees))) {
                                $saved = false;
                            }
                            if ($saved) {
                                $conn->commit();
                                $_POST['paymentStatus'] = 'SUCCESS';
                                /*$_SESSION['paymentResponse'][$_POST['PaymentID']] = $_POST;
                                $this->set('paymentStatus', $_POST['ResponseCode']);
                                $this->set('paymentStatusStr', 'SUCCESS');
                                $this->set('paymentID', $_POST['PaymentID']);
                                $this->set('transID', $_POST['TransactionID']);
                                $this->set('tras_amount', $_POST['Amount']);
                                $this->set('tras_date', $_POST['DateCreated']);
                                $this->set('studentdata', $studentdata);
								$this->set('feeType', $session->read('fee_type'));*/

                                $_SESSION['paymentResponse']['58377379'] = $_GET;
                                $this->set('paymentStatus', '0');
                                $this->set('paymentStatusStr', 'SUCCESS');
                                $this->set('paymentID', '58377379');
                                $this->set('transID', '159653335');
                                $this->set('tras_amount', '8900');
                                $this->set('tras_date', '2016-08-16 11:16:19');
                                $this->set('studentdata', $studentdata);
								$this->set('feeType', $session->read('fee_type'));
                            } else {
                                $conn->rollback();
                                $this->Flash->error(__('There was an error in saving the fee details. Please contact support.'));
                            }
                            //$this->redirect(array('controller' => 'form', 'action' => 'appliedposts'));
                            //for demo purpose, its stored in session
                            

                    } else {
                            // update response and the order's payment status as FAILED in to database
                            $this->set('error_mesg', $_POST['Error']);
                            //for demo purpose, its stored in session
                            $_POST['paymentStatus'] = 'FAILED';
                            $_SESSION['paymentResponse'][$_POST['PaymentID']] = $_POST;
                    }
                    // Redirect to confirm page with reference.
                    $confirmData = array();
                    /*$confirmData['PaymentID'] = $_POST['PaymentID'];
                    $confirmData['Status'] = $_POST['paymentStatus'];
                    $confirmData['Amount'] = $_POST['Amount'];*/
                    
                    $confirmData['PaymentID'] = '58377379';
                    $confirmData['Status'] = '159653335';
                    $confirmData['Amount'] = '5255';

                    $hashData = $_SESSION['SECRET_KEY'];

                    ksort($confirmData);
                    foreach ($confirmData as $key => $value){
                            if (strlen($value) > 0) {
                                    $hashData .= '|'.$value;
                            }
                    }
                    if (strlen($hashData) > 0) {
                            $secureHash = strtoupper(hash($HASHING_METHOD , $hashData));
                    }
                } else {
                        //echo '<h1>Error!</h1>';
                        //echo '<p>Hash validation failed</p>';
                        $this->set('error_mesg', "Hash validation failed");
                }
        } else {
                //echo '<h1>Error!</h1>';
                //echo '<p>Invalid response</p>';
                $this->set('error_mesg', "Invalid response.");
        }
    }
    
    
    public function report() {
		$conn = ConnectionManager::get('default');
		$query_string = 'select r1.reg_no, d1.Student_Name, d1.Father_Name, d1.Programme_Name, d1.Semester, 
	                        SUM(case when r1.fee_type = \'academic\' then f1.payment_amount else  0 end) as academic_fee, 
	                        SUM(case when r1.fee_type = \'academic\' then f1.payment_id else  0 end) as academic_payment_id, 
	                        SUM(case when r1.fee_type = \'hostel\' then f1.payment_amount else 0 	end) as hostel_fee, 
	                        SUM(case when r1.fee_type = \'hostel\' then f1.payment_id else 0 end) as 	hostel_payment_id, 
	                        SUM(case when r1.fee_type = \'academic\' then r1.late_fee_fine else 0 end) as late_fee_fine_acad,
	                        from_unixtime(SUM(case when r1.fee_type = \'academic\' then unix_timestamp(f1.payment_date_created) else 0 end)) as academic_payment_date, 
	                        from_unixtime(SUM(case when r1.fee_type = \'hostel\' then unix_timestamp(f1.payment_date_created) else 0 end)) as hostel_payment_date
	                        from regfees r1 
	                        left join fees f1 on r1.fee_id = f1.id 
	                        left join datafeecollection d1 on d1.Registration_No = r1.reg_no group by r1.reg_no;';
        $stmt = $conn->execute($query_string);
        $report = $stmt ->fetchAll('assoc');
        
        $this->set('report', $report);
    }


    public function cancelseat() {
        $flag = $this->isSubmitFeeOpen();
        $candidatesTable = TableRegistry::get('Candidates');
        $candidate = $candidatesTable->find('list')->where(['Candidates.user_id' => $this->Auth->user('id')]);
        
        $candidateId = array_keys($candidate->toArray())[0];
        $conn = ConnectionManager::get('default');
        $saved = true;
        $cancelseatsTable = TableRegistry::get('Cancelseats');
        $cancelseat = $cancelseatsTable->find('all')->where(['Cancelseats.user_id' => $this->Auth->user('id')])->toArray();
        $cancelseat = ((count($cancelseat) > 0) ? $cancelseat[0] : $cancelseatsTable->newEntity());
        if ($this->request->is(['patch', 'post', 'put']) && $flag === true) {
            $conn->begin();
            //debug($this->request->data());
            $cancelseat = $cancelseatsTable->patchEntity($cancelseat, $this->request->data());
            $cancelseat->user_id = $this->Auth->user('id');
            $cancelseat->candidate_id = $candidateId;
            //debug($cancelseat);
            if(!$cancelseatsTable->save($cancelseat)) {
                $saved = false;
            }
            
             if ($saved) {
                $conn->commit();
                $this->Flash->success(__('Your cancellation request has been successfully received.'));
            } else {
                $conn->rollback();
                $this->Flash->error(__('There was an error in cancellation request of the seat. Please contact support.'));
            }
            
        }
        else if($this->request->is(['patch', 'post', 'put']) && $flag === false) {
            $this->Flash->error(__('Cancellation of seat is closed at this time.'));
        }
        
        $query_string = 'select u1.username as applicant_id, c1.name as c_name, c1.f_name as f_name,
                        u1.email as email, u1.mobile as mobile, p1.name as p_name, c2.type as category,
                        f1.payment_id as bank_payment_id, f1.payment_date_created as fee_submit_date,
                        f1.payment_amount as amount, f1.id as fee_id
                        from candidates c1
                        inner join users u1
                        on c1.user_id = u1.id
                        inner join seats s1
                        on s1.candidate_id = c1.id
                        inner join fees f1
                        on f1.candidate_id = c1.id
                        inner join programmes p1
                        on p1.id = s1.programme_id
                        inner join categories c2
                        on c2.id = s1.category_id
                        where u1.id = ' . $this->Auth->user('id') . '
                        group by c1.id, f1.payment_id';
        $stmt = $conn->execute($query_string);
        $userData = $stmt->fetchAll('assoc');
        if(count($userData) === 1) {
            $userData = $userData[0];
        }
        else {
            $this->Flash->error(__('The information related to cancellation of seat is not correct. Please contact support.'));
            return $this->redirect(['action' => 'submitfee']);
        }
        $this->set('cancelseat', $cancelseat);
        $this->set('userData', $userData);
    }
    
    public function isAuthorized($user = null) {
        if(parent::isAuthorized($user)) {
            return true;
        }
        if (isset($user['role']) && $user['role'] === 'student' && ($this->request->getParam('action') === 'index' || $this->request->getParam('action') === 'submitfee'
                || $this->request->getParam('action') === 'pay' || $this->request->getParam('action') === 'post'
                || $this->request->getParam('action') === 'returnpg' || $this->request->getParam('action') === 'payhostel')) {
            return true;
        }
        // All users with role as 'exam' can add seats
        if (isset($user['role']) && $user['role'] === 'exam' && ($this->request->getParam('action') === 'report' )) {
            return true;
        }

        // The owner of an article can edit and delete it
        if (in_array($this->request->getParam('action'), ['edit', 'delete'])) {
            $seatId = (int) $this->request->getParam('pass.0');
            if ($this->Seats->isOwnedBy($seatId, $user['id'])) {
                return true;
            }
        }
    }
}
