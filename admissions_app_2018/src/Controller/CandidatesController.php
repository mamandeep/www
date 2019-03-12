<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\Email;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;
use Cake\Routing\RequestActionTrait;
use Cake\View\CellTrait;
use PHPMailer\PHPMailer\PHPMailer;

class CandidatesController extends AppController {

    use CellTrait;

    public function initialize() {
        parent::initialize();

        $this->loadComponent('Flash'); // Include the FlashComponent
    }

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
    }

    public function index() {
        $this->set('AuthId', $this->Auth->user('id'));
    }

    public function view($id) {
        $candidate = $this->Candidates->get($id);
        $this->set(compact('candidate'));
        $this->set('AuthId', $this->Auth->user('id'));
    }

    public function sendemail() {
        /*$email = new Email('default');
        $email->setSender('sa@cup.edu.in', 'Amandeep Singh Mann');
        Email::setConfigTransport('gsuite', [
            'host' => 'ssl://smtp.gmail.com',
            'port' => 465,
            'timeout' => 30,
            'username' => 'sa@cup.edu.in',
            'password' => 'aero&123pod',
            'className' => 'Smtp'
        ]);*/

	/*$returnvalue = $email->setFrom(['sa@cup.edu.in' => 'Amandeep Singh Mann'])
                ->setTo('mann.cse@gmail.com')
                ->setSubject('Completion of Information submission')
                ->send('We have received your application fee and you have completed the Information submission.');*/
        //debug($returnvalue); exit;
	$mail = new PHPMailer(); // create a new object
	$mail->IsSMTP(); // enable SMTP
	$mail->SMTPOptions = array(
	     'ssl' => array(
		'verify_peer' => false,
		'verify_peer_name' => false,
		'allow_self_signed' => true
		)
	);
	$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
	$mail->SMTPAuth = true; // authentication enabled
	$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 465; // or 587
	$mail->IsHTML(true);
	$mail->Username = "sa@cup.edu.in";
	$mail->Password = "";
	$mail->SetFrom("sa@cup.edu.in");
	$mail->Subject = "Admission Test 2";
	$mail->Body = "Does it go to SPAM2";
	$mail->AddAddress("mann.cse@gmail.com");

	 if(!$mail->Send()) {
	    debug("Mailer Error: " . $mail->ErrorInfo);
		 exit;
	 } else {
	    debug("Message has been sent");
		exit;
	 }
    }

    public function add() {
        $candidate = $this->Candidates->find('all', ['conditions' => ['Candidates.user_id' => $this->Auth->user('id')],
                                                     'contain' => ['Categories']])->toArray();
        //debug($candidate); //return false;
        if(count($candidate) > 1) {
            $this->Flash->error(__('More than 1 application forms have been received. Please contact support.'));
            return $this->redirect(['action' => 'add']);
        }
        $candidate_count = count($candidate);
        $candidate = (count($candidate) === 1) ? $candidate[0] : $this->Candidates->newEntity();
        $flag = $this->isFormFillingOpen();
        $specialTime = new \Cake\I18n\FrozenTime('2017-07-26');
        //debug($specialTime); debug($candidate->created);
        if ($this->request->is(['patch', 'post', 'put']) && $flag === true && ($candidate_count == 0 || $candidate->created >= $specialTime)) {
            $candidate = $this->Candidates->patchEntity($candidate, $this->request->getData());
            $candidate->user_id = $this->Auth->user('id');
            if ($this->Candidates->save($candidate)) {
                $this->Flash->success(__('Your application form has been saved.'));
                return $this->redirect(['controller' => 'preferences', 'action' => 'add']);
            }
            $this->Flash->error(__('Unable to save your application form.'));
        }
        else if($this->request->is(['patch', 'post', 'put']) && $flag === false) {
            $this->Flash->error(__('Filling of application form is closed at this time.'));
        }
        else if($this->request->is(['patch', 'post', 'put'])) {
            $this->Flash->error(__('The form is closed.'));
        }
        $this->set('candidate', $candidate);
        $categories = $this->Candidates->Categories->find('all')
                                                              ->where(['Categories.id !=' => 1]);
        $states = $this->Candidates->States->find('all');
        $statesOptions = [];
        $catOptions = [];
        foreach ($states as $state) {
            $statesOptions[$state['id']] = $state['state_name'];
        }
        foreach ($categories as $category) {
            //debug($category);
            $catOptions[$category['id']] = $category['type'];
        }
        $this->set('states', $statesOptions);
        $this->set('categories', $catOptions);
    }

	public function formcompleted() {
		
	}
	
    public function edit($id = null) {
        return $this->redirect(['action' => 'add']);
        $candidate = $this->Candidates->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $candidate = $this->Candidates->patchEntity($candidate, $this->request->getData());
            $candidate->user_id = $this->Auth->user('id');
            if ($this->Candidates->save($candidate)) {
                $this->Flash->success('The application form has been saved.');
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('The application form could not be saved. Please, try again.');
        }
        $this->set(compact('candidate'));
    }

    public function delete($id) {        
        return $this->redirect(['action' => 'add']);
        $this->request->allowMethod(['post', 'delete']);

        $seat = $this->Seats->get($id);
        if ($this->Seats->delete($seat)) {
            $this->Flash->success(__('The seat with id: {0} has been deleted.', h($id)));
            return $this->redirect(['action' => 'index']);
        }
    }
    
    public function seatalloted($id = null) {
        return $this->redirect(['action' => 'add']);
        $candidatesTable = TableRegistry::get('Candidates');
        $candidate = $candidatesTable->find('list')->where(['Candidates.user_id' => $this->Auth->user('id')]);
        
        //debug($candidate->toArray()); return false;
        $candidateId = array_keys($candidate->toArray())[0];
        //$seatAllocationTable = TableRegistry::get('Seatallocations');
        $query = 'SELECT Seatallocations.id AS `Seatallocations__id`, Seatallocations.candidate_id AS `Seatallocations__candidate_id`, 
                        Seatallocations.seat_id AS `Seatallocations__seat_id`, Seatallocations.user_id AS `Seatallocations__user_id`, 
                        Seatallocations.created AS `Seatallocations__created`, Seatallocations.modified AS `Seatallocations__modified`, 
                        Seatallocations.centre_id AS `Seatallocations__centre_id`,
                        Programmes.name AS `Programmes__name`, Categories.type AS `Categories__type`
                        FROM seatallocations Seatallocations 
                        INNER JOIN seats Seats 
                        ON (Seatallocations.seat_id = Seats.id
                        ) 
                        INNER JOIN programmes Programmes 
                        ON (Seats.programme_id = Programmes.id 
                        )
                        INNER JOIN categories Categories 
                        ON (Seats.category_id = Categories.id 
                        )
                        WHERE Seatallocations.candidate_id = ' . $candidateId;
        $conn = ConnectionManager::get('default');
        $stmt = $conn->execute($query);
        $allocatedSeats = $stmt ->fetchAll('assoc');
        $this->set('allocatedSeats', $allocatedSeats);
    }
    
    public function registrationcompletion() {
        $candidate = $this->Candidates->find('all')->where(['id' => $this->Auth->user('id')])->toArray();
        if(count($candidate)  == 0) {
            $candidate = $this->Candidates->newEntity();
        }
        else if(count($candidate)  >  1) {
            $this->Flash->error('More than 1 record found');
            return null;
        }
        else {
            $candidate = $candidate[0];
        }
        //debug($candidate); return null;
        if ($this->request->is(['patch', 'post', 'put'])) {
            //debug($this->request->getData()); return null;
            $candidate = $this->Candidates->patchEntity($candidate, $this->request->getData(), ['validate' => 'registration']);
            $candidate->user_id = $this->Auth->user('id');
            //debug($candidate); return null;
            if ($this->Candidates->save($candidate)) {
                $this->Flash->success('Your Registration information is uploaded sucessfully');
                $this->set('candidate', $candidate);
                $this->Upload->uploadDocuments();
                $this->sendemail();
                //echo $this->decorate('RegcompletionCell');//$this->cell('Regcompletion::registrationdocs');debug("comes here too"); return null;
                //RequestActionTrait::requestAction(['controller' => 'Uploadfiles', 'action' => 'registrationdocs'], array('post' => $this->request->getData()));
                return $this->redirect(['action' => 'registrationcompletion']);
            }
            $this->Flash->error('The registraton could not be completed. Please, try again or contact Support.');
        }
        $this->set('candidate', $candidate);
    }

    public function isAuthorized($user = null) {
	//return parent::isAuthorized($user);
        // All users with role as 'exam' can add seats seatalloted
        if (isset($user['role']) && $user['role'] === 'student' && ($this->request->getParam('action') === 'add' 
                || $this->request->getParam('action') === 'index' || $this->request->getParam('action') === 'seatalloted' || $this->request->getParam('action') === 'formcompleted'
                || $this->request->getParam('action') === 'registrationcompletion')) {
            return true;
        }

        // The owner of an article can edit and delete it
        if (in_array($this->request->getParam('action'), ['edit', 'delete'])) {
            $candidateId = (int) $this->request->getParam('pass.0');
            if ($this->Candidates->isOwnedBy($candidateId, $user['id'])) {
                return true;
            }
        }
    }

}
