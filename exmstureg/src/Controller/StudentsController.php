<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\Email;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;
use \DateTime;
use \DateTimeZone;
use Cake\Log\Log;
use Cake\Routing\Router;
use Cake\Filesystem\Folder;

class StudentsController extends AppController {

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

        public function beforeRender(Event $event) {
            parent::beforeRender($event);
            $session = $this->request->session();
            $params = $session->read('form.params');
            $this->set('params', $params);
        }
        
        public function msfIndex() {
            $session = $this->request->session();
            $session->delete('form');
        }
    
	public function msfSetup() {
            //$usersViewFolder = new Folder(APP.'Template'.DS.'Students');
            //$steps = count($usersViewFolder->find('msf_step_.*\.ctp'));
            $session = $this->request->session();
            //$session->write('form.params.steps', $steps);
            $session->write('form.params.steps', 4);
            $session->write('form.params.maxProgress', 0);
            $this->redirect(array('action' => 'msf_step', 1));
        }
    
    public function msfStep($stepNumber) {
        /**
         * check if a view file for this step exists, otherwise redirect to index
         */
        if (!file_exists(APP . 'Template' . DS . 'Students' . DS . 'msf_step_' . $stepNumber . '.ctp')) {
            $this->redirect('/students/msf_index');
        }

        $candidate = $this->Students->find('all', ['conditions' => ['Students.user_id' => $this->Auth->user('id')]])->toArray();
        //debug($candidate); //return false;
        if(count($candidate) > 1) {
            $this->Flash->error(__('More than 1 application forms have been received. Please contact support.'));
            return null;
        }
        $candidate_count = count($candidate);
        $candidate = (count($candidate) === 1) ? $candidate[0] : $this->Students->newEntity();
        
        $educationTable = TableRegistry::get('Education');
        $eduArray = $educationTable->find('all', ['conditions' => ['Education.user_id' => $this->Auth->user('id')],
                                                        'order' => ['Education.id' => 'ASC']
                                                                         ])->toArray();
        /**
         * determines the max allowed step (the last completed + 1)
         * if choosen step is not allowed (URL manually changed) the user gets redirected
         * otherwise we store the current step value in the session
         */
        $session = $this->request->session();
        $maxAllowed = $candidate['max_progress'] + 1;
        if ($stepNumber > $maxAllowed) {
            $this->redirect('/students/msf_step/' . $maxAllowed);
        } else {
            $session->write('form.params.currentStep', $stepNumber);
        }
        
        $user = "";
        $usersTable = TableRegistry::get('Users');
        $user = $usersTable->find('all', ['conditions' => ['Users.id' => $this->Auth->user('id')]])->first();
        if($stepNumber == 3) {
            if(count($eduArray) == 0) {
                $eduArray = [];
                for($i = 0; $i < 8; $i++) {
                    $eduArray[$i] = $educationTable->patchEntity($educationTable->newEntity(), ['user_id' => $this->Auth->user('id')]);
                }
            }
        }
        /**
         * check if some data has been submitted via POST
         * if not, sets the current data to the session data, to automatically populate previously saved fields
         */
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            //debug($this->request->getData());
            if($stepNumber != 3) {
                $candidate = $this->Students->patchEntity($candidate, $this->request->getData(), ['validate' => 'step' . $stepNumber]);
            }
            $candidate->user_id = $this->Auth->user('id');
            $candidate->max_progress = intval($stepNumber);
            
            //debug($candidate); return null;
            if($stepNumber == 3) {
                $allEduSaved = true; //debug($this->request->getData()); return null;
                $validationErrosPresent = false;
                $eduArray = $educationTable->patchEntities($eduArray, $this->request->getData(), ['validate' => 'step' . $stepNumber]);
                //debug($eduArray); return null;
                for ($count=0; $count < 8; $count++ ) {
                    if(!$validationErrosPresent) {
                        $validationErrosPresent = !empty($eduArray[$count]->errors()) ? true : false;
                    }
                }
                if(!$validationErrosPresent) {
                    try {
                            if($educationTable->saveMany($eduArray)) {
                            }
                    } catch (\Exception $e) {
                        $allEduSaved = false;
                    }
                }
                if(!$validationErrosPresent && $allEduSaved && $this->Students->save($candidate)) {
                    if (intval($stepNumber) < $session->read('form.params.steps')) {
                        $this->Flash->success(__('Your partial application form has been saved.'));
                        $session->write('form.params.maxProgress', $stepNumber);
                        return $this->redirect(array('controller'=>'students', 'action' => 'msf_step', intval($stepNumber) + 1));
                    } else {
                        /**
                         * otherwise, this is the final step, so we have to save the data to the database
                         */
                        $this->Flash->success(__('Your complete application form has been saved.'));
                        return $this->redirect('/students/msf_index');
                    }
                }
                //debug($validationErrosPresent ); debug($allPrefSaved); return null;
                $this->Flash->error(__('Unable to save your preferences.'));
            }
            else if ($this->Students->save($candidate)) {
                    if (intval($stepNumber) < $session->read('form.params.steps')) {
                        $this->Flash->success(__('Your partial application form has been saved.'));
                        $session->write('form.params.maxProgress', $stepNumber);
                        return $this->redirect(array('controller'=>'students', 'action' => 'msf_step', intval($stepNumber) + 1));
                    } else {
                        /**
                         * otherwise, this is the final step, so we have to save the data to the database
                         */
                        $this->Flash->success(__('Your complete application form has been saved.'));
                        return $this->redirect('/uploadfiles/upload');
                    }
            }
        }
        
        //$this->request->data = $candidate;
        
        /**
         * here we load the proper view file, depending on the stepNumber variable passed via GET
         */
        
        if($stepNumber == 3) {
            $this->set('user_id', $this->Auth->user('id'));
            $this->set('education_rows', $eduArray);
        }
        else if($stepNumber == 1) {
            $this->set('registered_email', $user['email']);
            $this->set('candidate', $candidate);
        }
        else if($stepNumber == 2) {
            $this->set('registered_mobile_no', $user['mobile']);
            $this->set('candidate', $candidate);
        }
        
        $this->render('msf_step_' . $stepNumber);
    }

    public function view($id) {
        $student = $this->Students->get($id);
        $this->set(compact('student'));
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

	public function form() {
		$candidate = $this->Students->find('all', ['conditions' => ['Students.user_id' => $this->Auth->user('id')]])->toArray();
        //debug($candidate); //return false;
        if(count($candidate) > 1) {
            $this->Flash->error(__('More than 1 application forms have been received. Please contact support.'));
            return null;
        }
        $candidate_count = count($candidate);
        $candidate = (count($candidate) === 1) ? $candidate[0] : $this->Students->newEntity();
        //debug($specialTime); debug($candidate->created);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $candidate = $this->Students->patchEntity($candidate, $this->request->getData());
            $candidate->user_id = $this->Auth->user('id');
            if ($this->Students->save($candidate)) {
                $this->Flash->success(__('Your application form has been saved.'));
                return $this->redirect(['controller' => 'uploadfiles', 'action' => 'upload']);
            }
            $this->Flash->error(__('Unable to save your application form.'));
        }
        $this->set('candidate', $candidate);
	}
	
	public function upload() {
		//debug(Inflector::singularize('upload_files')); debug(Inflector::camelize(Inflector::singularize($this->request->params['controller'])));
		$existingFiles = $this->Uploadfiles->find('all')
		->where(['Uploadfiles.user_id' => $this->Auth->user('id')])
		->order(['Uploadfiles.created' => 'DESC'])->toArray();
		//debug($this->MAX_FILES_ALLOWED_PER_USER);
		if(count($existingFiles) > $this->MAX_FILES_ALLOWED_PER_USER) {
			$this->Flash->error(__('You have reached maximum permissible limit for uploading files. Please contact support.'));
			return null;
		}
		$newFile = (count($existingFiles) === 0) ? $this->Uploadfiles->newEntity() : $existingFiles[0];
		if ($this->request->is(['post', 'put'])) {
			if(!empty($this->request->data['file']['name']) && is_uploaded_file($this->request->data['file']['tmp_name'])){
				$fileName = $this->request->data['file']['name'];
				$uniqueId = uniqid();
				$generateFilename = WWW_ROOT . $this->uploadPath . DS . 'scorecard_' . $uniqueId . '.' . pathinfo($fileName, PATHINFO_EXTENSION);
				if(move_uploaded_file($this->request->data['file']['tmp_name'], $generateFilename)){
					$newFile->name = 'scorecard_' . $uniqueId . '.' . pathinfo($fileName, PATHINFO_EXTENSION);
					$newFile->path = $this->uploadPath;
					$newFile->created = date("Y-m-d H:i:s");
					$newFile->modified = date("Y-m-d H:i:s");
					$newFile->user_id = $this->Auth->user('id');
					if ($this->Uploadfiles->save($newFile)) {
						$this->Flash->success(__('File has been uploaded successfully.'));
					} else {
						$this->Flash->error(__('Unable to upload file, please try again.'));
					}
				} else {
					$this->Flash->error(__('Unable to upload file, please try again.'));
				}
			} else {
				$this->Flash->error(__('Please choose a file to upload.'));
			}
		}
		
		$this->set('uploadData', $newFile);
		
		$filesRowNum = count($existingFiles);
		$this->set('files',$existingFiles);
		$this->set('filesRowNum',$filesRowNum);
	}
	
	public function corrections() {
            $candidate = $this->Students->find('all', ['conditions' => ['Students.user_id' => $this->Auth->user('id')]])->toArray();
            //debug($candidate); //return false;
            if(count($candidate) > 1) {
                    $this->Flash->error(__('More than 1 record have been received. Please contact support.'));
                    return null;
            }
            $candidate_count = count($candidate);
            $candidate = (count($candidate) === 1) ? $candidate[0] : $this->Students->newEntity();
            if($this->request->is(['get'])) {
                    Log::write('info', Router::url(null, false) . "\n" . var_export($candidate, true));
            }
            $this->set('student', $candidate);
	}
	
	public function allotment() {
            $batchesTable = TableRegistry::get('Batches');
            $semestersTable = TableRegistry::get('Semesters');
            $sessionsTable = TableRegistry::get('Sessions');
            $programmesTable = TableRegistry::get('Programmes');
            $candidate = $this->Students->find('all', ['conditions' => ['Students.user_id' => $this->Auth->user('id')]])->toArray();
            //debug($candidate); //return false;
            if(count($candidate) > 1) {
                    $this->Flash->error(__('More than 1 record have been received. Please contact support.'));
                    return null;
            }
            $candidate_count = count($candidate);
            $candidate = (count($candidate) === 1) ? $candidate[0] : $this->Students->newEntity();
            if($this->request->is(['get'])) {
                    Log::write('info', Router::url(null, false) . "\n" . var_export($candidate, true));
            }
            $this->set(
                'batches', $batchesTable->find('list', [
                    'keyField' => 'id',
                    'valueField' => 'name'
                        ]
            )->toArray());
            $this->set(
                    'semesters', $semestersTable->find('list', [
                        'keyField' => 'id',
                        'valueField' => 'name'
                            ]
            )->toArray());
            $this->set(
                    'sessions', $sessionsTable->find('list', [
                        'keyField' => 'id',
                        'valueField' => 'name'
                            ]
            )->toArray());
            $this->set(
                    'programmes', $programmesTable->find('list', [
                        'keyField' => 'id',
                        'valueField' => 'name'
                            ]
            )->toArray());
            $this->set('student', $candidate);
        }
        
        public function printform() {
		$conn = ConnectionManager::get('default');
		$query_string = 'SELECT s1.id, s1.name, s1.gender, s1.centre,
						s1.mentor, s1.father_name, s1.p_address,
						s1.day_scholar, s1.mobile_no, s1.area_of_tp, s1.corrections,
						u1.file, u1.path, u1.size, u1.type,
						u1.photo, u1.photo_path, u1.photo_size, u1.photo_type,
						u1.signature, u1.signature_path, u1.signature_size, u1.signature_type,
                        f1.response_code, f1.payment_id, f1.payment_date_created, f1.payment_transaction_id, f1.payment_amount,
                        r1.fee_type
						FROM students s1
                        left join users u2 on u2.id = s1.user_id
						left join uploadfiles u1 on s1.user_id = u1.user_id
                        left join regfees r1 on r1.reg_no = u2.username
                        left join fees f1 on f1.id = r1.fee_id;';
		$stmt = $conn->execute($query_string);
		$report = $stmt->fetchAll('assoc');
		if($this->request->is(['get'])) {
			Log::write('info', Router::url(null, false) . ' Query:' . $query_string . "\n Result:" . var_export($report, true));
		}
		$this->set('report', $report[0]);
	}
	
	public function isAuthorized($user = null) {
		if(parent::isAuthorized($user)) {
			return true;
		}
		if (isset($user['role']) && $user['role'] === 'student' && ($this->request->getParam('action') === 'form' || $this->request->getParam('action') === 'corrections' || $this->request->getParam('action') === 'submitfee'
				||$this->request->getParam('action') === 'upload' || $this->request->getParam('action') === 'pay' || $this->request->getParam('action') === 'post'
				|| $this->request->getParam('action') === 'returnpg' || $this->request->getParam('action') === 'printform'
                                || $this->request->getParam('action') === 'msfIndex' || $this->request->getParam('action') === 'msfSetup'
                                || $this->request->getParam('action') === 'msfStep' || $this->request->getParam('action') === 'allotment')) {
					return true;
				}
				// All users with role as 'exam' can add seats
				if (isset($user['role']) && $user['role'] === 'placementcell' && ($this->request->getParam('action') === 'listofapplications' || $this->request->getParam('action') === 'editapplication')) {
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