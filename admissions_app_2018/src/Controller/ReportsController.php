<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\Email;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;

class ReportsController extends AppController {

    public function initialize() {
        parent::initialize();

        $this->loadComponent('Flash'); // Include the FlashComponent
        /*$this->loadComponent('RequestHandler', [
        	'viewClassMap' => ['csv' => 'CsvView.Csv'
        ]]);*/
    }

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
    }

    public function index() {
        $this->set('AuthId', $this->Auth->user('id'));
        $conn = ConnectionManager::get('default');
        $stmt1 = $conn->execute('select count(*) as c_users from users');
        $stmt2 = $conn->execute('select count(*) as c_pref from preferences');
        $stmt3 = $conn->execute('select count(*) as c_fees from fees');
        $countofusers = $stmt1 ->fetchAll('assoc');
        //debug($countofusers[0]['c_users']); return false;
        $countofprefs = $stmt2 ->fetchAll('assoc');
        //debug($countofprefs[0]['c_users']); return false;
        $countoffees = $stmt3 ->fetchAll('assoc');
        $this->set('countofusers', $countofusers != null ?  $countofusers[0]['c_users'] : 0);
        $this->set('countofprefs', $countofprefs != null ? $countofprefs[0]['c_pref'] : 0);
        $this->set('countoffees', $countoffees != null ? $countoffees[0]['c_fees'] : 0);
        
        $stmt4 = $conn->execute("select p1.specialization_1, count(p1.specialization_1) as no_of_users,
			(CASE
			    WHEN c1.source_of_fellowship = 'UGC/CSIR/ICMR-JRF' THEN 1
			    ELSE 0
			END) as count_ugc,
			(CASE
			    WHEN c1.source_of_fellowship = 'RGNF/MANF' THEN 1
			    ELSE 0
			END) as count_rgnf,
			(CASE
			    WHEN c1.source_of_fellowship = 'Industrial Fellowship' THEN 1
			    ELSE 0
			END) as count_industrial,
			(CASE
			    WHEN c1.source_of_fellowship = 'CUPB Project' THEN 1
			    ELSE 0
			END) as count_proj,
			(CASE
			    WHEN c1.source_of_fellowship = 'No Source of Fellowship' THEN 1
			    ELSE 0
			END) as count_nosource,
			p2.name
			from preferences p1
			left join users u1 on p1.user_id = u1.id
			left join fees f1 on p1.user_id = f1.user_id
			left join candidates c1 on c1.user_id = p1.user_id
			left join programmes p2 on p1.specialization_1 = p2.id
			group by p1.specialization_1, c1.source_of_fellowship");
        $subjectwisesummary = $stmt4->fetchAll('assoc');
        $this->set('subjectwisesummary', $subjectwisesummary != null ?  $subjectwisesummary : []);
    }
    
    public function overallsummary() {
    	$conn = ConnectionManager::get('default');
    	$stmt1 = $conn->execute('select count(*) as c_users from users');
    	$stmt2 = $conn->execute('select count(*) as c_pref from preferences');
    	$stmt3 = $conn->execute('select count(*) as c_fees from fees');
    	$countofusers = $stmt1->fetchAll('assoc');
    	//debug($countofusers[0]['c_users']); return false;
    	$countofprefs = $stmt2->fetchAll('assoc');
    	//debug($countofprefs[0]['c_users']); return false;
    	$countoffees = $stmt3->fetchAll('assoc');
    	$this->set('countofusers', $countofusers != null ?  $countofusers[0]['c_users'] : 0);
    	$this->set('countofprefs', $countofprefs != null ? $countofprefs[0]['c_pref'] : 0);
    	$this->set('countoffees', $countoffees != null ? $countoffees[0]['c_fees'] : 0);
    }
    
    public function subjectwisesummary() {
    	$conn = ConnectionManager::get('default');
    	$stmt1 = $conn->execute("select p1.specialization_1, count(p1.specialization_1) as no_of_users,
			(CASE
			    WHEN c1.source_of_fellowship = 'UGC/CSIR/ICMR-JRF' THEN 1
			    ELSE 0
			END) as count_ugc,
			(CASE
			    WHEN c1.source_of_fellowship = 'RGNF/MANF' THEN 1
			    ELSE 0
			END) as count_rgnf,
			(CASE
			    WHEN c1.source_of_fellowship = 'Industrial Fellowship' THEN 1
			    ELSE 0
			END) as count_industrial,
			(CASE
			    WHEN c1.source_of_fellowship = 'CUPB Project' THEN 1
			    ELSE 0
			END) as count_proj,
			(CASE
			    WHEN c1.source_of_fellowship = 'No Source of Fellowship' THEN 1
			    ELSE 0
			END) as count_nosource,
			p2.name
			from preferences p1
			left join users u1 on p1.user_id = u1.id
			left join fees f1 on p1.user_id = f1.user_id
			left join candidates c1 on c1.user_id = p1.user_id
			left join programmes p2 on p1.specialization_1 = p2.id
			group by p1.specialization_1, c1.source_of_fellowship");
    	$subjectwisesummary = $stmt1->fetchAll('assoc');
    	$this->set('subjectwisesummary', $subjectwisesummary != null ?  $subjectwisesummary : []);
    }
    
    public function detailedsummary ($id) {
    	//debug($id);
    	if(!is_numeric($id)) {
    		$this->Flash->error(__('The subject id is not a valid number.'));
    		return null;
    	}
    	$conn = ConnectionManager::get('default');
    	$detailedsummary = [];
    	$detailedsummary_post = [];
    	if($this->request->is(['post','put'])) {
    		$courseId = $this->request->getData()['course_id'];
    		if(!is_numeric($courseId)) {
    			$this->Flash->error(__('The course id submitted is not valid.'));
    			return null;
    		}
    		$stmt2 = $conn->execute("select u1.id as user_id, u1.username, c1.name, u1.email, u1.mobile, c2.type, c1.gender, c1.ggp_exam, c1.source_of_fellowship, c1.source_of_fellowship_details, f1.payment_date_created, f1.payment_id, f1.payment_amount from preferences p1
								left join users u1 on p1.user_id = u1.id
								left join fees f1 on p1.user_id = f1.user_id
								left join candidates c1 on c1.user_id = p1.user_id
								left join programmes p2 on p1.specialization_1 = p2.id
								left join categories c2 on c2.id = c1.category_id
								where p1.specialization_1 = " . $courseId);
    		$detailedsummary_post = $stmt2->fetchAll('assoc');
    	}
    	$stmt1 = $conn->execute("select u1.id as user_id, u1.username, c1.name, u1.email, u1.mobile, c2.type, c1.gender, c1.ggp_exam, c1.source_of_fellowship, c1.source_of_fellowship_details, f1.payment_date_created, f1.payment_id, f1.payment_amount from preferences p1
								left join users u1 on p1.user_id = u1.id
								left join fees f1 on p1.user_id = f1.user_id
								left join candidates c1 on c1.user_id = p1.user_id
								left join programmes p2 on p1.specialization_1 = p2.id
								left join categories c2 on c2.id = c1.category_id
								where p1.specialization_1 = " . $id);
    	$detailedsummary = $stmt1->fetchAll('assoc');
    	if($this->request->is(['post','put'])) {
    		$this->set('detailedsummary', $detailedsummary_post);
    	}
    	else {
    		$this->set('detailedsummary', $detailedsummary);
    	}
    	$stmt3 = $conn->execute("select id, name from programmes");
    	$programmes = $stmt3->fetchAll('assoc');
    	$list = [];
    	foreach($programmes as $prog) {
    		$list[$prog['id']] = $prog['name'];
    	}
    	$this->set('programmes', $list);
    }
    
    public function individualdetails($id) {
    	//debug($id);
    	if(!is_numeric($id)) {
    		$this->Flash->error(__('The subject id is not a valid number.'));
    		return null;
    	}
    	$individualdetails = [];
    	$individualdetails_post= [];
    	$conn = ConnectionManager::get('default');
    	if($this->request->is(['post','put'])) {
    		$candidateId = $this->request->getData()['candidate_id'];
    		if(!is_string($candidateId)) {
    			$this->Flash->error(__('The Application Number submitted is not valid.'));
    			return null;
    		}
    		$stmt2 = $conn->execute("select * from users u1
									left join candidates c1 on u1.id = c1.user_id
									left join preferences p1 on p1.user_id = u1.id
									left join fees f1 on f1.user_id = u1.id
									left join uploadfiles u2 on u2.user_id = u1.id
									left join states s1 on s1.id = c1.state_id
									left join programmes p2 on p2.id = p1.specialization_1
									left join programmes p3 on p3.id = p1.specialization_2
									left join categories c2 on c2.id = c1.category_id
									where u1.username = '" . $candidateId . "'");
    		$individualdetails_post = $stmt2->fetchAll('assoc');
    		$this->set('individualdetails', $individualdetails_post[0]);
    		return null;
    	}
    	$candidatesTable = TableRegistry::get('Candidates');
    	$candidate = $candidatesTable->find('all', ['conditions' => ['Candidates.user_id' => $id],
    			'contain' => ['Categories', 'States']])->first();
    	
    	$usersTable = TableRegistry::get('Users');
    	$user = $usersTable->find('all')
    			->where(['Users.id' => $id])
    			->first();
    	
    	$feesTable = TableRegistry::get('Fees');
    	$fee = $feesTable->find('all')
    			->where(['Fees.user_id' => $id,
    					 'Fees.response_code' => 0])
    			->order('Fees.id ASC')
    			->first();
    			
    	$uploadTable = TableRegistry::get('Uploadfiles');
    	$existingFiles = $uploadTable->find('all')
    				->where(['Uploadfiles.user_id' => $id])
    				->order('Uploadfiles.id ASC')
    				->toArray();
    	$this->set('candidate', $candidate);
    			//$this->set('fee', $fee);
    	$this->set('fee', $feesTable->newEntity());
    	$this->set('file', $existingFiles[0]);
    	$this->set('username', $user['username']);
    }
    
    public function export() {
    	$time = time();
    	$this->response->download('export_' . $time .'.csv');
    	$conn = ConnectionManager::get('default');
    	$stmt1 = $conn->execute("select * from candidates c1
								left join users u1 on c1.user_id = u1.id
								left join preferences p1 on c1.user_id = p1.user_id
								left join states s1 on c1.state_id = s1.id
								left join categories c2 on c1.category_id = c2.id
								left join programmes p2 on p1.specialization_1 = p2.id
								left join programmes p3 on p1.specialization_2 = p3.id");
    	$detailedsummary = $stmt1->fetchAll('assoc');
    	//debug($detailedsummary);
    	$data = [];
    	foreach($detailedsummary as $row) {
    		$tmp = [];
    		if($row['role'] === 'student') {
	    		$tmp[] = $row['username'];
	    		$tmp[] = $row['name'];
	    		$tmp[] = $row['f_name'];
	    		$tmp[] = $row['email'];
	    		$tmp[] = $row['mobile'];
	    		$tmp[] = $row['dob'];
	    		$tmp[] = $row['gender'];
	    		$tmp[] = $row['aadhar_no'];
	    		$tmp[] = $row['comm_address'];
	    		$tmp[] = $row['perm_address'];
	    		$tmp[] = $row['pwd'];
	    		$tmp[] = $row['ward_of_def'];
	    		$tmp[] = $row['kashmiri_mig'];
	    		$tmp[] = $row['nationality'];
	    		$tmp[] = $row['qualif_degree'];
	    		$tmp[] = $row['qualif_maj_subjects'];
	    		$tmp[] = $row['qualif_result_declared'];
	    		$tmp[] = $row['qualif_marks_obtained'];
	    		$tmp[] = $row['qualif_total_marks'];
	    		$tmp[] = $row['ggp_exam'];
	    		$tmp[] = $row['ggp_roll_no'];
	    		$tmp[] = $row['ggp_year_passing'];
	    		$tmp[] = $row['ggp_marksobtained_rank'];
	    		$tmp[] = $row['rank'];
	    		$tmp[] = $row['source_of_fellowship'];
	    		$tmp[] = $row['source_of_fellowship_details'];
	    		$tmp[] = $row['state_name'];
	    		$tmp[] = $row['type'];
    		}
    		$data[] = $tmp;
    	}
    	//$this->set('detailedsummary', $detailedsummary != null ?  $detailedsummary : []);
    	$_serialize = 'data';
    	$_header = ['App. No.', 'Name', 'Father Name', 'Email', 'Mobile', 'Date of Birth', 'Gender', 'Aadhar No.', 'Communication Address', 'Permanent Address', 'Person with Disability', 'Ward of Defense', 'Kashmiri Migrant', 'Nationality', 'Degree', 'Major Subjects', 'Result Declared', 'Marks Obtained', 'Total Marks', 'Examination', 'Roll No.', 'Year of Passing', 'Marks Obtained', 'Rank', 'Source of Fellowship', 'Source of Fellowship details', 'State', 'Category']; 
    	
    	//$_footer = ['ID', 'Name', 'Email'];
    	//$this->set(compact('data', '_serialize'));
    	$this->viewBuilder()->className('CsvView.Csv');
    	$this->set(compact('data', '_serialize', '_header'));
    	return;
    }
    
    public function isAuthorized($user = null) {
    	//return parent::isAuthorized($user);
    	// All users with role as 'exam' can add seats seatalloted
    	if (isset($user['role']) && $user['role'] === 'examread' && 
    			($this->request->getParam('action') === 'index'
    		     || $this->request->getParam('action') === 'overallsummary'
    			 || $this->request->getParam('action') === 'subjectwisesummary'
    			 || $this->request->getParam('action') === 'detailedsummary'
    			 || $this->request->getParam('action') === 'individualdetails'
    			 || $this->request->getParam('action') === 'export')) {
    		return true;
    	}
    	
    	// The owner of an article can edit and delete it
    	if (in_array($this->request->getParam('action'), ['edit', 'delete'])) {
    		$candidateId = (int) $this->request->getParam('pass.0');
    		if ($this->Candidates->isOwnedBy($candidateId, $user['id'])) {
    			return true;
    		}
    	}
    	
    	return parent::isAuthorized($user);
    }
}