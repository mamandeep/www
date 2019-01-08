<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\Email;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\ORM\Query;
use Cake\Datasource\ConnectionManager;
use \DateTime;
use \DateTimeZone;
use Cake\Log\Log;
use Cake\Routing\Router;
use App\Model\Table\StudentsTable;
use \Cake\Database\Expression\QueryExpression;
use \Cake\Network\Session;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class AdminController extends AppController {
    public function initialize() {
            parent::initialize();

            $this->loadComponent('Flash'); // Include the FlashComponent
    }

    public function beforeFilter(Event $event) {
            parent::beforeFilter($event);
    }

    public function index() {
        return $this->redirect(['action' => 'dashboard']);
    }
    
    public function dashboard() {
    	//$coursesTable = TableRegistry::get('Courses');
    	//$courses = $coursesTable->find('list', ['keyField' => 'id', 'valueField' => 'name'])
    		//					->order(['name' => 'ASC']);
        //$studentsTable = TableRegistry::get('Students');
        //$students = $studentsTable->find('all', ['contain' => 'Courses']);
        
        /*$conn = ConnectionManager::get('default');
        $stmt = $conn->execute('SELECT id, name, BIN(name) as name_not_seen FROM courses order by name_not_seen ASC, name ASC');
        $results = $stmt ->fetchAll('assoc');
        $queryProg = $conn->execute('SELECT id, name, BIN(name) as name_not_seen FROM programmes order by name_not_seen ASC, name ASC');
        $resultsProg = $queryProg->fetchAll('assoc');
        $courses = [];
        $programmes = [];
        foreach($results as $result) {
        	$courses[$result['id']] = $result['name'];
        }
        foreach($resultsProg as $result) {
        	$programmes[$result['id']] = $result['name'];
        }
        if ($this->request->is(['post', 'put'])) {
        	$course_id = (isset($this->request->getData()['course_id'])) ? intval($this->request->getData()['course_id']) : 0;
        	$programme_id = (isset($this->request->getData()['programme_id'])) ? intval($this->request->getData()['programme_id']) : 0;
        	
        	if($course_id == 0 && $programme_id == 0) {
        		$this->Flash->error(__('The Course Id or Programme Id is not correct. Please re-submit or contact Support.'));
        	}
        	
        	//debug($this->request->getData()); return null;
        	if($this->request->getData()['marks_type'] == "faculty") {
        		return $this->redirect(['action' => 'updatemarksfaculty', 'course_id' => $course_id]);
        	}
        	else if($this->request->getData()['marks_type'] == "assess") {
        		return $this->redirect(['action' => 'updatemarksassess', 'course_id' => $course_id]);
        	}
        	else {
        		return $this->redirect(['action' => 'prepareresultsheet', 'programme_id' => $programme_id]);
        	}
        	
        }*/
        
        //$this->set('students', $students);
        //$this->set('courses', $courses);
        //$this->set('programmes', $programmes);
        $this->set('sessions', TableRegistry::get('Sessions')->find('list')->select(['id', 'name'])->order(['Sessions.name' => 'ASC'])->toArray()); 
    }
    
	public function addstudentinfo() {
        $studentsTable = TableRegistry::get('Students');
        $sessionsTable = TableRegistry::get('Sessions');
        $programmesTable = TableRegistry::get('Programmes');
        $uploadFilesTable = TableRegistry::get('Uploadfiles');
        if ($this->request->is(['post', 'put'])) {
            if(!empty($this->request->getData()['Uploadfiles']['photo']) &&  $this->request->getData()['Uploadfiles']['photo']['error'] == UPLOAD_ERR_NO_FILE) {
                $this->Flash->error(__('No file chosen for upload'));
                return null;
            }
            $student = $studentsTable->find('all')->where(['Students.registration_no' => $this->request->getData()['Students']['registration_no']])->toArray();
            $uploadFile = $uploadFilesTable->find('all')->where(['Uploadfiles.registration_no' => $this->request->getData()['Students']['registration_no']])->toArray();
            if(count($student) == 0) {
                $student = $studentsTable->newEntity($this->request->getData()['Students']);
            }
            else if(count($student) == 1) {
                $student = $studentsTable->patchEntity($student, $this->request->getData()['Students']);
            }
            else if(count($student) > 1){
                $this->Flash->error(__('There is more than one record of student with same Registration Number. Please contact Support.'));
                return null;
            }
            if(count($uploadFile) == 0) {
                $uploadFile = $uploadFilesTable->newEntity($this->request->getData()['Uploadfiles']);
            }
            else if(count($uploadFile) == 1) {
                $uploadFile = $uploadFilesTable->patchEntity($uploadFile, $this->request->getData()['Uploadfiles']);
            }
            else if(count($uploadFile) > 1) {
                $this->Flash->error(__('There is more than one record of student photograph. Please contact Support.'));
                return null;
            }
            
            $student->user_id = $uploadFile->user_id = $this->Auth->user('id');
            $uploadFile->registration_no = $this->request->getData()['Students']['registration_no'];
            $flag = true;
            $studentsTable->connection()->transactional(function () 
                        use ($studentsTable,$uploadFilesTable,$flag,$student,$uploadFile) {
                            try {
                            if($studentsTable->save($student))
                            {
                                
                            }
                            else {
                                $flag = false;
                            }
                            if($uploadFilesTable->save($uploadFile))
                            {
                                
                            }
                            else {
                                $flag = false;
                            }
                    }
                    catch(\Exception $e) {
                        $this->Flash->error(__('There is an error in saving the student data.' . $e->getMessage()));
                        $flag = false;
                        //debug($e->getTrace());
                    }
                    if($flag == false) {
                        throw new \Exception("There was an error in saving the data. Please contact Support.");
                    }
                    else {
                        $this->Flash->success(__('The student information is saved.'));        
                    }
            });
        }
        $this->set('sessions', $sessionsTable->find('list',['fields' => ['id', 'name']])->toArray());
        $this->set('programmes', $programmesTable->find('list',['fields' => ['id', 'name']])->toArray());
    }

    public function updatemarksfaculty() {
    	$courseId = intval($this->request->getQuery('course_id'));
    	if($courseId <= 0) {
    		$this->Flash->error(__('The Course Id is not correct. Please re-submit or contact Support.'));
    		return null;
    	}
    	$studentsTable = TableRegistry::get('Students');
    	$students = $studentsTable->find()
    							->contain(['Courses' => function(\Cake\ORM\Query $q) use ($courseId){
    								return $q->where(['Courses.id' => $courseId ]);
    							}])
    							->matching('Courses', function(\Cake\ORM\Query $q) use ($courseId){
    								return $q->where(['Courses.id' => $courseId]);
    							})
    							->group('Students.id');
    	$examTable = TableRegistry::get('ExaminationMarks');
	    if ($this->request->is(['post', 'put'])) {
	    	try {
	    		$course_id = intval($this->request->getData()['course_id']);
	    		if($course_id == 0) {
	    			$this->Flash->error(__('The Course Id is not correct. Please re-submit or contact Support.'));
	    		}
		    	$entities = $examTable->find()->where(['ExaminationMarks.course_offered_id' => $courseId])->toArray();
		    	$data = [];
		    	$count = 0;
		    	foreach($this->request->getData() as $key => &$value) {
		    		foreach($entities as $entity) {
		    			if($entity['student_id'] == $value['student_id']) {
		    				$data[$count]['total'] = $value['end_semester_examination'] + $entity['internal_assessment'];
		    				$data[$count]['student_id'] = $value['student_id'];
		    				$data[$count]['course_offered_id'] = $value['course_offered_id'];
		    				$data[$count]['user_id'] = $value['user_id'];
		    				$data[$count]['end_semester_examination'] = $value['end_semester_examination'];
		    				$count++;
		    			}
		    		}
		    	}
		    	$entities= $examTable->patchEntities($entities, $data);
		    	$flag = true;
		    	foreach($entities as $entity) {
		    		if($examTable->save($entity)) {	    			
		    		}
		    		else {
		    			$flag = false; 
		    		}
		    	}
		    	if($flag == true) {
		    		$this->Flash->success(__('All the marks have been entered successfully.'));
		    	}
		    	else {
		    		$this->Flash->error(__('There is an error in updating marks. Please check.'));
		    	}
	    	}
	    	catch(\Exception $e) {
	    		$this->Flash->error(__('There is an error in updating marks. Please check.' . $e->getMessage()));
	    	}
	    	return $this->redirect(['action' => 'dashboard']);
	    }
		 
    	$this->set('students', $students);
    	$this->set('examinationmarks', $examTable->newEntity());
    }
    
    public function updatemarksassess() {
    	$courseId = intval($this->request->getQuery('course_id'));
    	if($courseId <= 0) {
    		$this->Flash->error(__('The Course Id is not correct. Please re-submit or contact Support.'));
    		return null;
    	}
    	$studentsTable = TableRegistry::get('Students');
    	$students = $studentsTable->find()
    	->contain(['Courses' => function(\Cake\ORM\Query $q) use ($courseId){
    		return $q->where(['Courses.id' => $courseId ]);
    	}])
    	->matching('Courses', function(\Cake\ORM\Query $q) use ($courseId){
    		return $q->where(['Courses.id' => $courseId]);
    	})
    	->group('Students.id');
    	$examTable = TableRegistry::get('ExaminationMarks');
    	if ($this->request->is(['post', 'put'])) {
    		try {
    			$courseId = intval($this->request->getQuery('course_id'));
    			if($courseId <= 0) {
    				$this->Flash->error(__('The Course Id is not correct. Please re-submit or contact Support.'));
    				return null;
    			}
    			$entities = $examTable->find()->where(['ExaminationMarks.course_offered_id' => $courseId])->toArray();
    			$data = [];
    			$count = 0;
    			foreach($this->request->getData() as $key => &$value) {
    				foreach($entities as $entity) {
    					if($entity['student_id'] == $value['student_id']) {
    						$data[$count]['total'] = $entity['end_semester_examination'] + $value['internal_assessment'];
    						$data[$count]['student_id'] = $value['student_id'];
    						$data[$count]['course_offered_id'] = $value['course_offered_id'];
    						$data[$count]['user_id'] = $value['user_id'];
    						$data[$count]['internal_assessment'] = $value['internal_assessment'];
    						$count++;
    					}
    				}
    			}
    			$entities= $examTable->patchEntities($entities, $data);
    			$flag = true;
    			foreach($entities as $entity) {
    				if($examTable->save($entity)) {
    				}
    				else {
    					$flag = false;
    				}
    			}
    			if($flag == true) {
    				$this->Flash->success(__('All the marks have been entered successfully.'));
    			}
    			else {
    				$this->Flash->error(__('There is an error in updating marks. Please check.'));
    			}
    		}
    		catch(\Exception $e) {
    			$this->Flash->error(__('There is an error in updating marks. Please check.' . $e->getMessage()));
    		}
    		return $this->redirect(['action' => 'dashboard']);
    	}
    	
    	$this->set('students', $students);
    	$this->set('examinationmarks', $examTable->newEntity());
    }
    
    public function prepareresultsheetallstudents() {
    	$examinationMarksTable = TableRegistry::get('ExaminationMarks');
    	$data = $examinationMarksTable->find('all')->contain(['Students', 'Courses', 'Programmes'])
    												->order([ 'ExaminationMarks.programme_id' => 'ASC',
    										  			'ExaminationMarks.student_id' => 'ASC', 
														'ExaminationMarks.course_offered_id' => 'ASC'])->toArray();
		//debug($data);
    	$this->set('marksData', $data);
    }
    
    public function prepareresultsheet() {
    	$programmeId = intval($this->request->getQuery('programme_id'));
    	if($programmeId <= 0) {
    		$this->Flash->error(__('The Programme Id is not correct. Please re-submit or contact Support.'));
    		return null;
    	}
    	$examinationMarksTable = TableRegistry::get('ExaminationMarks');
    	$data = $examinationMarksTable->find('all')->contain(['Students', 'Courses', 'Programmes'])
    										->where(['ExaminationMarks.programme_id' => $programmeId])
									    	->order([ 'ExaminationMarks.student_id' => 'ASC',
									    			'ExaminationMarks.course_offered_id' => 'ASC'])->toArray();
    	//debug($data); return null;
    	$this->set('marksData', $data);
    }
    
    public function add() {
        $student = $this->Students->get($id, ['contain' => ['Batches', 'Semesters', 'Sessions', 'Programmes']]);
        if ($this->request->is('post')) {
            // Prior to 3.4.0 $this->request->data() was used.
            $student = $this->Students->patchEntity($student, $this->request->getData(), ['validate' => 'admin']);
            //$student->user_id = $this->Auth->user('id');
            if ($this->Students->save($student)) {
                $this->Flash->success(__('Your details have been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your details.'));
        }
        $this->set('student', $student);
    }

    public function edit($id = null) {
        $studentsTable = TableRegistry::get('Students');
        $batchesTable = TableRegistry::get('Batches');
        $semestersTable = TableRegistry::get('Semesters');
        $sessionsTable = TableRegistry::get('Sessions');
        $programmesTable = TableRegistry::get('Programmes');
        $student = $studentsTable->get($id);
        if ($this->request->is(['post', 'put'])) {
            // Prior to 3.4.0 $this->request->data() was used.
            $student = $studentsTable->patchEntity($student, $this->request->getData(), ['validate' => 'admin']);
            //$student->user_id = $this->Auth->user('id');
            if ($studentsTable->save($student)) {
                $this->Flash->success(__('Your details have been updated.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to update your details.'));
        }
        $this->set(
                'batches', $batchesTable->find('list', [
                    'keyField' => 'id',
                    'valueField' => 'name'
                        ]
        ));
        $this->set(
                'semesters', $semestersTable->find('list', [
                    'keyField' => 'id',
                    'valueField' => 'name'
                        ]
        ));
        $this->set(
                'sessions', $sessionsTable->find('list', [
                    'keyField' => 'id',
                    'valueField' => 'name'
                        ]
        ));
        $this->set(
                'programmes', $programmesTable->find('list', [
                    'keyField' => 'id',
                    'valueField' => 'name'
                        ]
        ));
        $this->set('student', $student);
    }

    public function delete($id) {
        $this->request->allowMethod(['post', 'delete']);

        $semester = $this->Semesters->get($id);
        if ($this->Semesters->delete($semester)) {
            $this->Flash->success(__('The semester with id: {0} and name: {1} has been deleted.', h($id), h($semester['name'])));
            return $this->redirect(['action' => 'index']);
        }
    }

    public function controlleraction () {
    	//debug($this->request->getData()); return null;
    	$Id1 = isset($this->request->getData()['session_id']) ? intval($this->request->getData()['session_id']) : 0;
    	$Id2 = isset($this->request->getData()['programme_id']) ? intval($this->request->getData()['programme_id']) : 0;
    	$Id3 = isset($this->request->getData()['semester']) ? intval($this->request->getData()['semester']) : 0;
    	$Id4 = isset($this->request->getData()['course_id']) ? intval($this->request->getData()['course_id']) : 0;
        $Id5 = isset($this->request->getData()['student_registration_no']) ? $this->request->getData()['student_registration_no'] : "";
    	$this->request->session()->write('esession',$Id1);
    	$this->request->session()->write('programme_id',$Id2);
    	$this->request->session()->write('semester',$Id3);
    	$this->request->session()->write('course_id',$Id4);
        $this->request->session()->write('student_registration_no',$Id5);
    	if(isset($this->request->getData()['Add_Courses'])) {
    		$this->redirect(['action' => 'addcourses', 'session_id' => base64_encode($Id1), 'programme_id' => base64_encode($Id2), 'semester' => base64_encode($Id3), 'course_id' => base64_encode($Id4)]);
    	}
    	else if(isset($this->request->getData()['Add_Students'])) {
    		$this->redirect(['action' => 'addstudents', 'session_id' => base64_encode($Id1), 'programme_id' => base64_encode($Id2), 'semester' => base64_encode($Id3), 'course_id' => base64_encode($Id4)]);
    	}
    	else if(isset($this->request->getData()['Add_Marks'])) {
    		$this->redirect(['action' => 'addmarks', 'session_id' => base64_encode($Id1), 'programme_id' => base64_encode($Id2), 'semester' => base64_encode($Id3), 'course_id' => base64_encode($Id4)]);
    	}
        else if(isset($this->request->getData()['Generate_Tabulation_Sheet'])) {
            $this->redirect(['action' => 'generatetablulationsheet', 'session_id' => base64_encode($Id1), 'programme_id' => base64_encode($Id2), 'semester' => base64_encode($Id3), 'course_id' => base64_encode($Id4)]);
        }
    	else if(isset($this->request->getData()['Generate_DMC']) && !empty($Id5)) {
            $this->redirect(['action' => 'pdfview', 'registration_no' => base64_encode($Id5)]);
        }
    	else {
    		$this->Flash->error(__('The requested url is incorrect or missing parameters.'));
            return $this->redirect(['action' => 'dashboard']);
    	}
    }
    
    public function addcourses() {
    	$session_id = intval(base64_decode($this->request->getQuery('session_id')));
    	$programme_id = intval(base64_decode($this->request->getQuery('programme_id')));
    	//$semester = intval(base64_decode($this->request->getQuery('semester')));
    	$course_id = intval(base64_decode($this->request->getQuery('course_id')));
    	//debug($course_id);
    	if($this->request->is(['get']) && ($session_id == 0 || $programme_id == 0)) {
    		$this->set('programme_id', 0);
    		$this->Flash->error(__('The selected Session or Programme is invalid. Please contact Support.'));
    		return $this->redirect(['action' => 'dashboard']);
    	}
    	else if($this->request->is(['post', 'put'])) {
    		$programme_id = $this->request->getData()['Courses'][0]['programme_id'];
    		//$semester = $this->request->getData()['CoursesOffered'][0]['semester'];
    	}
    	$coursesOfferedTable = TableRegistry::get('CoursesOffered');
    	$coursesTable = TableRegistry::get('Courses');
    	$coursesOffered = $coursesOfferedTable->find('all')->contain(['Courses'])
    												->where(['CoursesOffered.programme_id' => $programme_id])->toArray();
    	if ($this->request->is(['post', 'put'])) {
    		//debug($this->request->getData());
    		$dataWithId = [];
    		$dataWithoutId = [];
    		$tobedeleted = [];
    		$dataWithIdco = [];
    		$dataWithoutIdco = [];
    		$tobedeletedco = [];
    		if(count($this->request->getData()['Courses']) > 0 && isset($this->request->getData()['Courses'][0]['programme_id'])) {
    			$programme_id = $this->request->getData()['Courses'][0]['programme_id'];
    		}
    		else {
    			$this->Flash->error(__('There is no programme selected for adding courses. Please programme or contact Support.'));
    			return null;
    		}
    		
    		foreach($this->request->getData()['Courses'] as $data) {
    			if(isset($data['id']) && !empty($data['id'])) {
    				$dataWithId[] = $data;
    			}
    			else {
    				$dataWithoutId[] = $data;
    			}
    		}
    		foreach($this->request->getData()['CoursesOffered'] as $data) {
    			if(isset($data['id']) && !empty($data['id'])) {
    				$dataWithIdco[] = $data;
    			}
    			else {
    				$dataWithoutIdco[] = $data;
    			}
    		}
    		$index = -1;
    		$databasekeys = [];
    		$formdatakeys = [];
    		$tobedeleted = [];
    		foreach($coursesOffered as $course) {
    			$databasekeys[] = $course['id'];
    		}
    		foreach($this->request->getData()['CoursesOffered'] as $arr) {
    			$formdatakeys[] = $arr['id'];
    		}
    		$common = array_intersect($databasekeys, $formdatakeys);
    		foreach($coursesOffered as $course) {
    			if (!in_array($course['id'], $common)) {
    				$tobedeletedco[] = $course;
    				$tobedeleted[] = $course['course'];
    			}
    		}
    		//debug($dataWithId);debug($dataWithoutId);debug($tobedeleted);debug($dataWithIdco);debug($dataWithoutIdco);debug($tobedeletedco);
    		//return null;
    		
	    		//$cousesCopy = $courses;
	    		//$coursesWithId = $coursesOfferedTable->patchEntities($cousesCopy, $dataWithId, ['associated' => ['CoursesOffered']]);
	    		//$coursesWithoutId = $coursesOfferedTable->newEntities($dataWithoutId, ['associated' => ['CoursesOffered']]);
	    		//$coursesWithId = $coursesTable->patchEntities($cousesCopy, $dataWithId, ['associated' => ['CoursesOffered']]);
	    		//$coursesWithoutId = $coursesTable->newEntities($dataWithoutId, ['associated' => ['CoursesOffered']]);
    			$flag = true;
    			//$coursesOfferedTable = TableRegistry::get('CoursesOffered');
    			//$coursesOfferedTable->get()
    			$coursesTable->connection()->transactional(function () 
    					use ($coursesTable,$dataWithId,$flag,$coursesOfferedTable,$dataWithIdco,$dataWithoutId,$dataWithoutIdco,$tobedeleted,$tobedeletedco) {
    						try {
	    				foreach($dataWithId as $entity) {
	    					//debug($entity);
	    					$coursesWithId = $coursesTable->patchEntity($coursesTable->find()->where(['id' => $entity['id']])->first(), $entity);
	    					if($coursesTable->save($coursesWithId,['atomic' => false]))
	    					{
	    						
	    					}
	    					else {
	    						$flag = false;
	    					}
	    				}
	    				foreach($dataWithIdco as $entity) {
	    					//debug($entity);
	    					$coursesWithId = $coursesOfferedTable->patchEntity($coursesOfferedTable->find()->where(['id' => $entity['id']])->first(), $entity);
	    					if($coursesOfferedTable->save($coursesWithId,['atomic' => false]))
	    					{
	    						
	    					}
	    					else {
	    						$flag = false;
	    					}
	    				}
	    				for($i=0; $i < count($dataWithoutId); $i++) {
	    					//debug($entity);
	    					$coursesWithId = $coursesTable->newEntity($dataWithoutId[$i]);
	    					//debug($coursesWithId);
	    					if(($result = $coursesTable->save($coursesWithId,['atomic' => false])))
	    					{
	    						$dataWithoutIdco[$i]['course_id'] = $result->id;
	    						$coursesWithId2 = $coursesOfferedTable->newEntity($dataWithoutIdco[$i]);
	    						//debug($coursesWithId2); return null;
	    						if($coursesOfferedTable->save($coursesWithId2,['atomic' => false]))
	    						{
	    							
	    						}
	    						else {
	    							$flag = false;
	    						}
	    					}
	    					else {
	    						$flag = false;
	    					}
	    				}
	    				foreach($tobedeleted as $entity) {
	    					//debug($entity);
	    					if($coursesTable->delete($entity))
	    					{
	    						
	    					}
	    					else {
	    						$flag = false;
	    					}
	    				}
	    				foreach($tobedeletedco as $entity) {
	    					//debug($entity);
	    					if($coursesOfferedTable->delete($entity))
	    					{
	    						
	    					}
	    					else {
	    						$flag = false;
	    					}
	    				}
    				}
    				catch(\Exception $e) {
    					$this->Flash->error(__('There is an error in saving the course data.' . $e->getMessage()));
    					$flag = false;
    					//debug($e->getTrace());
    				}
    				if($flag == false) {
    					throw new \Exception("There was an error in saving/deleting the data. Please contact Support.");
    				}
    			});	
	    		//return null;
	    		if($flag == true) {
	    			$this->Flash->success(__('The courses added/deleted/modified courses have been saved.'));
	    		}
	    		else {
	    			$this->Flash->error(__('There was an error in saving courses.'));
	    		}
	    		$coursesOffered = $coursesOfferedTable->find('all')->contain(['Courses'])
	    													->where(['CoursesOffered.programme_id' => $programme_id])->toArray();
    	}
    	//debug($session_id);debug($programme_id);debug($courses); return null;
    	$this->set('courses', (count($coursesOffered) == 0) ? [] : $coursesOffered);
    	$this->set('programme_id', $programme_id);
    	//$this->set('semester', $semester);
    }
    
    public function addstudents() {
    	$session_id = intval(base64_decode($this->request->getQuery('session_id')));
    	$programme_id = intval(base64_decode($this->request->getQuery('programme_id')));
    	$semester = intval(base64_decode($this->request->getQuery('semester')));
    	$course_id = intval(base64_decode($this->request->getQuery('course_id')));
    	if($session_id == 0 || $programme_id == 0 || $course_id == 0) {
    		$this->set('programme_id', 0);
    		$this->Flash->error(__('The selected Session or Programme or Course is invalid. Please contact Support.'));
    		return $this->redirect(['action' => 'dashboard']);
    	}
    	$studentsTable = TableRegistry::get('Students');
    	$coursesTable = TableRegistry::get('Courses');
    	$students = $studentsTable->find('all')->contain('Courses')->where(['Students.programme_id' => $programme_id])->toArray();
    	if(count($students) == 0) {
    		$this->Flash->error(__('The studens were not found in the selected programme. Please contact Support.'));
    		return $this->redirect(['action' => 'dashboard']);
    	}
    	$coursesStudentsTable = TableRegistry::get('CoursesStudents');
    	$coursesStudents = $coursesStudentsTable->find('all')->where(['CoursesStudents.course_id' => $course_id])->toArray();
    	if ($this->request->is(['post', 'put'])) {
    		//debug($this->request->getData());
    		$coursesStudents = $coursesStudentsTable->find('all')->where(['CoursesStudents.course_id' => isset($this->request->getData()[0]) ? $this->request->getData()[0]['course_id'] : 0])->toArray();
    		$dataWithId = [];
    		$dataWithoutId = [];
    		if(count($this->request->getData()) > 0 && isset($this->request->getData()[0]['programme_id'])) {
    			$programme_id = $this->request->getData()[0]['programme_id'];
    		}
    		else {
    			$this->Flash->error(__('There is no programme selected for adding courses. Please select programme or contact Support.'));
    			return null;
    		}
    		/*foreach($this->request->getData() as $data) {
    			if(isset($data['selected']) && $data['selected'] == "1") {
    				$dataWithId[] = $data;
    			}
    			else {
    				$dataWithoutId[] = $data;
    			}
    		}*/
    		$csWithId = [];
    		$csWithoutId = [];
    		$tobedeleted = [];
    		//debug($coursesStudents);
    		$data = $this->request->getData();
    		for($i = 0; $i < count($data); $i++) {
    			if(!empty($data[$i]['id']) && $data[$i]['selected'] == "0") {
    				foreach($coursesStudents as $cs) {
    					if($cs['student_id'] == $data[$i]['student_id']) {
    						$tobedeleted[] = $cs;
    					}
    				}
    			}
    			else if(empty($data[$i]['id']) && empty($data[$i]['added']) && $data[$i]['selected'] == "1") {
    				$dataWithoutId[] = $data[$i];
    				$data[$i]['added'] = "1";
    			}
    		}
    		//debug(count($csWithId));
    		//debug(count($tobedeleted));
    		//debug(count($dataWithoutId));
    		//return null;
    		try {
    			//$studentsCopy = $students;
    			
    			//debug($studentsCopy); return null;
    			//debug($csWithId); debug(); return null;
    			//$studentsWithId = $coursesStudentsTable->patchEntities((), $tobedeleted);
    			$studentsWithoutId = $coursesStudentsTable->newEntities($dataWithoutId);
    		 	//debug($studentsWithoutId); debug($tobedeleted); //return null;
    			$flag = true;
    			foreach($studentsWithoutId as $entity) {
    				//debug($entity);
    				//$entity->isNew(true);
    				//$entity->courses[0]->isNew(true);
    				if($coursesStudentsTable->save($entity))
    				{
    					
    				}
    				else {
    					$flag = false;
    				}
    			}
    			//debug($flag);
    			//return null;
    			foreach($tobedeleted as $entity) {
    				//debug($entity);
    				if($coursesStudentsTable->delete($entity))
    				{
    					
    				}
    				else {
    					$flag = false;
    				}
    			}
    			//debug($flag);
    			//return null;
    			if($flag == true) {
    				$this->Flash->success(__('The courses added/deleted/modified courses have been saved.'));
    			}
    			else {
    				$this->Flash->error(__('There was an error in saving courses.'));
    			}
    			//$students = $studentsTable->find('all')->contain(['Courses'])->where(['Students.programme_id' => $programme_id])->toArray();
    			$coursesStudents = $coursesStudentsTable->find('all')->where(['CoursesStudents.course_id' => $course_id])->toArray();
    		}
    		catch(\Exception $e) {
    			$this->Flash->error(__('There is an error in saving the course data.' . $e->getMessage()));
    			//debug($e->getTrace());
    		}
    	}
    	//debug($session_id);debug($programme_id);debug($course_id); return null;
    	$listSelected = [];
    	foreach($coursesStudents as $courseStudent) {
    		foreach($students as $student) {
    			if($student['id'] == $courseStudent['student_id']) {
    				//$student->set('selected', "1");
    				$listSelected[$courseStudent['student_id']]['selected'] =  "1";
    				$listSelected[$courseStudent['student_id']]['csId'] =  $courseStudent['id'];
    			}
    		}
    	}
    	//return null;
    	$this->set('students', $students);
    	$this->set('coursesStudents', $coursesStudents);
    	$this->set('listSelected', $listSelected);
    	$this->set('course_id', $course_id);
    	$this->set('programme_id', $programme_id);
    }
    
    public function addmarks() {
    	$session_id = intval(base64_decode($this->request->getQuery('session_id')));
    	$programme_id = intval(base64_decode($this->request->getQuery('programme_id')));
    	$course_id = intval(base64_decode($this->request->getQuery('course_id')));

    	if($session_id == 0 || $programme_id == 0 || $course_id == 0) {
    		$this->Flash->error(__('The selected Session or Programme or Course is invalid. Please contact Support.'));
            return $this->redirect(['action' => 'dashboard']);
    	}
    	$Id3 = TableRegistry::get('Courses')->get($course_id);
    	$this->set('Id3', $Id3);
    	$studentsTable = TableRegistry::get('Students');
    	$students = $studentsTable->find('all')->contain(['CoursesStudents' => function(\Cake\ORM\Query $q) use ($course_id){
    												return $q->where(['CoursesStudents.course_id' => $course_id]);
											    	}, 'Courses', 'ExaminationMarks' => function(\Cake\ORM\Query $q) use ($course_id){
											    		return $q->where(['ExaminationMarks.course_offered_id' => $course_id]);
											    	}])
											    	->matching('CoursesStudents', function(\Cake\ORM\Query $q) use ($course_id){
											    		return $q->where(['CoursesStudents.course_id' => $course_id]);
											    	})
											    	->order(['CoursesStudents.student_id' => 'ASC'])
											    	->toArray();
    	$examinationMarksTable = TableRegistry::get('ExaminationMarks');
    	$examinationMarks = $examinationMarksTable->find('all')->contain(['Students'])->where(['ExaminationMarks.course_offered_id' => $course_id])->toArray();
    	if ($this->request->is(['post', 'put'])) {
    		//debug($this->request->getData()); 
    		$course_offered_id = 0;
    		if(count($this->request->getData()) > 0 && isset($this->request->getData()[0]['course_offered_id'])) {
    			$course_offered_id = $this->request->getData()[0]['course_offered_id'];
    		}
    		else {
    			$this->Flash->error(__('There is no Course selected for adding marks. Please select Course or contact Support.'));
    			return null;
    		}
    		
    		try {
    			if($Id3['type'] == "Theory") {
    				$examinationMarks = $examinationMarksTable->patchEntities($examinationMarks, $this->request->getData());
    			}
    			else if($Id3['type'] == "Seminar" || $Id3['type'] == "Lab") {
    				$examinationMarks = $examinationMarksTable->patchEntities($examinationMarks, $this->request->getData(), ['validate' => 'custom']);
    			}
    			
    			//debug($examinationMarks); return null;
    			for($i = 0; $i < count($examinationMarks); $i++) {
    				//debug($examinationMarks[$i]);
    				if($Id3['type'] == "Theory") {
    					$examinationMarks[$i]['total'] = bcadd($examinationMarks[$i]['internal_assessment'], $examinationMarks[$i]['end_semester_examination'], 0);
    				}
    				//debug($Id3['type']); debug($examinationMarks[$i]['total'] <= 100); debug(is_int($examinationMarks[$i]['total']));
    				if(($examinationMarks[$i]['total'] <= 100 && $Id3['type'] == "Theory") || (preg_match('/^[0-9\.]+$/',$examinationMarks[$i]['total']) && ($Id3['type'] == "Seminar" || $Id3['type'] == "Lab"))) {
	    				$marks = TableRegistry::get('Marksgplg')->find('all')->toArray();
	    				$examinationMarks[$i]['grade_point'] = strval($marks[intval($examinationMarks[$i]['total'])]['gp']);
	    				$examinationMarks[$i]['letter_grade'] = strval($marks[intval($examinationMarks[$i]['total'])]['lg']);
	    				//debug($examinationMarks[$i]);return null;
    				}
    				else if($Id3['type'] == "Seminar" || $Id3['type'] == "Lab") {
    					$examinationMarks[$i]['grade_point'] = null;
    					$examinationMarks[$i]['letter_grade'] = null;
    				}
    				else {
    					$this->Flash->error(__('The total marks are more than 100. Please check the IA ES values.'));
    					return null;
    				}
    			}
    			$flag = true;
    			foreach($examinationMarks as $entity) {
    				//debug($entity);
    				if($examinationMarksTable->save($entity))
    				{
    					
    				}
    				else {
    					$flag = false;
    				}
    			}
    			if($flag == true) {
    				$this->Flash->success(__('The marks were modified successfully.'));
    			}
    			else {
    				$this->Flash->error(__('There was an error in saving marks.'));
    			}
    			$examinationMarks = $examinationMarksTable->find('all')->contain(['Students'])->where(['ExaminationMarks.course_offered_id' => $course_offered_id])->toArray();;
    		}
    		catch(\Exception $e) {
    			$this->Flash->error(__('There is an error in saving the course data.' . $e->getMessage()));
    			//debug($e);
    		}
    	}
    	/*$exists = false;
    	$subquery = $examinationMarksTable->find('all')->where(['ExaminationMarks.course_offered_id' => $course_id])->groupBy('ExaminationMarks.student_id');
    	$countStudentsFromExam = count($subquery->toArray());
    	$countStudentsFromStudents = count($studentsTable->find('all', ['fields' => ['id']])->where(['Students.id in ' => $subquery])->toArray());
    	if($countStudentsFromExam != $countStudentsFromStudents) {
    		$this->Flash->error(__('No Student Data found in Students Table. Please check.'));
    		return null;
    	}
    	else if(count(TableRegistry::get('Courses')->get($course_id)) == 1 && ) {
    		$exists = true;
    	}*/
    	
    	//debug($examinationMarks); return null;
    	$this->set('examinationMarks', (count($examinationMarks) == 0) ? [$examinationMarksTable->newEntity()] : $examinationMarks);
    	$this->set('students', $students);
    	$this->set('course_id', $course_id);
    }
    
    public function corrections($id = null)
	{
		if(is_null($id) && $this->request->is(['get'])) {
			$this->Flash->error(__('Invalid Request.'));
			return null;
		}
		$studentsTable = TableRegistry::get('Students');
		$student_id = (is_null($id) && $this->request->is(['post','put'])) ? intval($this->request->getData()['id']) : intval($id);
		$student = (is_null($id) && $this->request->is(['post','put'])) ? $studentsTable->find('all',['conditions' => ['Students.id' => $student_id]])->toArray()[0] : 
																$studentsTable->get($student_id,['contain' =>['Uploadfiles']]);
		//debug($student);
		if($this->request->is(['get'])) {
			Log::write('info', Router::url(null, false) . ' Student ID:' . $student_id . "\n" . var_export($student, true));
		}
		if ($this->request->is(['post','put'])) {
			$correctionsStr = "";
			foreach($this->request->getData()['Correction'] as $key => $value) {
				if($this->request->getData()['Correction'][$key]['idcheck'] === '1') {
					switch ($key) {
						case 1 :
							$correctionsStr .= "Name;";
							break;
						case 2 :
							$correctionsStr .= "Gender;";
							break;
						case 3 :
							$correctionsStr .= "Centre;";
							break;
						case 4 :
							$correctionsStr .= "Name of the Mentor;";
							break;
						case 5 :
							$correctionsStr .= "Father's Name;";
							break;
						case 6 :
							$correctionsStr .= "Permanenet Address;";
							break;
						case 7 :
							$correctionsStr .= "Day Scholar;";
							break;
						case 8 :
							$correctionsStr .= "Mobile No.;";
							break;
						case 9 :
							$correctionsStr .= "Area of Training/Placement;";
							break;
						case 10 :
							$correctionsStr .= "Curriculum Vitae;";
							break;
						case 11 :
							$correctionsStr = NULL;
							break;
						default :
							$correctionsStr = NULL;
					}
				}
			}
			//debug($this->request->getData());
			//debug($student);
			$student = $studentsTable->patchEntity($student, ['corrections' => $correctionsStr], ['validate' => false]);
			//debug($student);
			//return null;
			if ($studentsTable->save($student)) {
				Log::write('info', Router::url(null, false) . ' Corrections submitted/cleared for Student: ' . $student['name'] . " " . $student['mobile_no'] . ' ' . var_export($student, true));
				$this->Flash->success(__('Corrections submitted/cleared for Student: ' . $student['name'] . " " . $student['mobile_no']));
				return $this->redirect(['action' => 'dashboard']);
			}
			$this->Flash->error(__('Unable to update your post.'));
		}
		$this->set('student', $student);
    }
    
    public function getprogrammes() {
    	$programmes = array();
    	if (isset($this->request['data']['id'])) {
    		$programmes= TableRegistry::get('Sessions')->Programmes->find('list', array(
    				'fields' => array(
    						'id',
    						'name',
    				),
    				'conditions' => array(
    						'Programmes.session_id' => $this->request['data']['id']
    				)
    		))->toArray();
    	}
    	//debug($programmes); return null;
    	header('Content-Type: application/json');
    	echo json_encode($programmes);
    	exit();
    }
    
    public function getsemesters() {
    	$semesters = array();
    	if (isset($this->request['data']['id'])) {
    		$semesters = TableRegistry::get('CoursesOffered')->find('all', array(
    				'fields' => array(
    						'CoursesOffered.semester'
    				),
    				'conditions' => array(
    						'CoursesOffered.programme_id' => $this->request['data']['id']
    				)
    		))->group('CoursesOffered.semester')->toArray();
    	}
    	$list = [];
    	foreach($semesters as $semester) {
    		$list[$semester['semester']] = $semester['semester'];
    	}
    	//debug($semesters); return null;
    	header('Content-Type: application/json');
    	echo json_encode($list);
    	exit();
    }
    
    public function getcourses() {
    	$courses = array();
    	if (isset($this->request['data']['id'])) {
    		$courses = TableRegistry::get('CoursesOffered')->find('all', array(
    		))->contain(['Courses'])
    		->where(['CoursesOffered.semester' => $this->request['data']['id'],
    				'CoursesOffered.programme_id' => $this->request['data']['programme_id'],
    		])
    		->toArray();
    	}
    	$list = [];
    	foreach($courses as $course) {
    		$list[$course['course_id']] = $course['course']['name'];
    	}
    	//debug(count($courses)); return null;
    	header('Content-Type: application/json');
    	echo json_encode($list);
    	exit();
    }
    
    public function generatetablulationsheet() {
    	$session_id = intval(base64_decode($this->request->getQuery('session_id')));
    	$programme_id = intval(base64_decode($this->request->getQuery('programme_id')));
    	$semester = intval(base64_decode($this->request->getQuery('semester')));
    	$course_id = intval(base64_decode($this->request->getQuery('course_id')));
    	//debug($course_id);
    	if($session_id == 0 || $programme_id == 0 || $semester == 0) {
    		$this->set('programme_id', 0);
    		$this->Flash->error(__('The selected Session or Programme or Course is invalid. Please contact Support.'));
    		return null;
    	}
    	
    	//$programmeId = intval($this->request->getQuery('programme_id'));
    	if($programme_id <= 0) {
    		$this->Flash->error(__('The Programme Id is not correct. Please re-submit or contact Support.'));
    		return null;
    	}
    	$examinationMarksTable = TableRegistry::get('ExaminationMarks');
    	/*$data = $examinationMarksTable->find('all')->contain(['Students', 'Courses', 'Programmes', 'CoursesOffered'])
    	->where(['ExaminationMarks.programme_id' => $programme_id,
    			'CoursesOffered.semester' => $semester
    	])
    	->order([ 'ExaminationMarks.student_id' => 'ASC',
    			'ExaminationMarks.course_offered_id' => 'ASC'])->toArray();
    	*/
    	$subquery = TableRegistry::get('CoursesOffered')->find('all', ['fields' => ['CoursesOffered.course_id']])
    													->where(array('CoursesOffered.programme_id'=>$programme_id,
    																  'CoursesOffered.semester'=>$semester));
    	$subquery2 = TableRegistry::get('CoursesOffered')->find('all')
    													->contain(['Courses'])
    													->where(array('CoursesOffered.programme_id'=>$programme_id,
    															'CoursesOffered.semester'=>$semester));
    	$courses = $subquery2->toArray();
    	$res = $examinationMarksTable->find('all')->contain(['Courses','Students','Programmes'])
    				->where(function (QueryExpression $exp, Query $q) use ($subquery){
    					return $exp->in('ExaminationMarks.course_offered_id', $subquery);
    				})
    				->order(['ExaminationMarks.student_id' => 'ASC',
    						'ExaminationMarks.course_offered_id' => 'ASC'])
    				->toArray();
    	
    	//debug($res); return null;
    	//debug($courses);
    	$total = [];
    	$listCoursesId = [];
    	$listCoursesOffered = [];
    	$arrCourseIds = [];
    	$listCoursesStudents = [];
    	$totalCredits = 0;
    	$resNew = [];
    	$Id4 = TableRegistry::get('Departments')->get(TableRegistry::get('Programmes')->get($programme_id)['department_id']);
    	$Id5 = TableRegistry::get('Schools')->get($Id4['school_id']);
    	$this->set('Id4',$Id4['name']);
    	$this->set('Id5',$Id5['name']);
    	foreach($res as $arr) {
    		$total[] = intval($arr['total'])+1;
    		$listCoursesStudents[$arr['student_id']][$arr['course_offered_id']] = $arr;
    	}
    	foreach($courses as $course) {
    		$listCoursesId[$course['course_id']] = ['name' => $course['course']['name'], 'credits' => $course['course']['credits'], 'type' => $course['course']['type'], 'course_code' => $course['course']['course_code']];
    		$listCoursesOffered[] = ['id' => $course['course_id'], 'name' => $course['course']['name'], 'credits' => $course['course']['credits']];
    		$totalCredits += ($course['course']['countable'] == "Yes") ?  $course['course']['credits'] : 0;
    		$arrCourseIds[] = $course['course_id'];
    	}
    	$studentIds = [];
    	$Id3 = array_keys($listCoursesId);
    	$Id1 = sort($Id3);
    	$Id2 = count($listCoursesId);
    	//debug($res);
    	$j = 0;
    	while($j < count($res)) {
    		//debug($j);
    		$id1 = $res[$j]['course_offered_id'];
    		$count = 0;
    		for($k=$j+1; $k<($j+$Id2); $k++) {
    			//debug($k);
    			if($k < count($res) && $res[$j]['student_id'] == $res[$k]['student_id']) {
    				$count = array_search($res[$k]['course_offered_id'], $Id3) - array_search($res[$j]['course_offered_id'], $Id3) - 1;
    				//debug($count);
    				break;
    			}
    			else if($k < count($res) && $res[$j]['student_id'] != $res[$k]['student_id']) {
    				$count = ($Id2-1-array_search($res[$j]['course_offered_id'], $Id3) + array_search($res[$k]['course_offered_id'], $Id3));
    				//debug($count);debug($Id2);debug(array_search($res[$j]['course_offered_id'], $Id3)); debug(array_search($res[$k]['course_offered_id'], $Id3));
    				//debug($res[$j]);debug($res[$k]);
    				break;
    			}
    		}
    		if($count == 0) {
    			$resNew[] = $res[$j];
    		}
    		else if($count > 0) {
    			$resNew[] = $res[$j];
    			for($k=0; $k<$count; $k++) {
    				$resNew[] = null;
    			}
    		}
    		$j += 1;
    	}
    	//debug($resNew); return null;
    	//return null;
    	$this->set('marksData', $resNew);
    	$listClass = [];
    	$listSGPA = [];
    	$listLG = [];
    	foreach(($marksgplg = TableRegistry::get('Marksgplg')->find('all', ['fields' => ['id','class', 'gp', 'lg']])) as $arr) {
    				$listClass[$arr['id']] =  $arr['class'];
    				$listSGPA[$arr['id']] =  $arr['gp'];
    				$listLG[$arr['id']] =  $arr['lg'];
    	}
    	$this->set('class', $listClass);
    	$this->set('listSGPA', $listSGPA);
    	$this->set('listCoursesOffered', $listCoursesOffered);
    	$this->set('listCoursesStudents', $listCoursesStudents);
    	$this->set('listCoursesId',$listCoursesId);
    	$this->set('totalCredits', $totalCredits);
    	$this->set('Id6', $semester);
    	$this->set('listLG', $listLG);
    }
    
    public function import() {
    	$uploadExcelsTable = TableRegistry::get('Uploadexcels');
    	$existingFiles= $uploadExcelsTable->find('all')->toArray();
    	$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
    	$reader->setReadDataOnly(true);
    	$file = "";
    	if ($this->request->is(['post', 'put'])) {
    		if(!empty($this->request->getData()['excelfile']) &&  $this->request->getData()['excelfile']['error'] == UPLOAD_ERR_NO_FILE) {
    			$this->Flash->error(__('No file chosen for upload'));
    		}
    		else {
    			$file = WWW_ROOT . DS . 'uploads' . DS . 'files' . DS . $this->request->getData()['excelfile']['name'];
    			//$spreadsheet = $reader->load($file);
    			//debug($file);
    		}
    	}
    	
    	//$spreadsheet = new Spreadsheet();
    	//$sheet = $spreadsheet->getActiveSheet();
    	//$sheet->setCellValue('A1', 'Hello World !');
    	
    	//$writer = new Xlsx($spreadsheet);
    	//$writer->save('hello world.xlsx');
    	$this->set('Uploadfile', $uploadExcelsTable->newEntity());
    }
    
    public function pdfview() {
    	
    	$registration_no = base64_decode($this->request->getQuery('registration_no'));
        //debug($registration_no);
        $res = TableRegistry::get('ExaminationMarks')->find('all')
                                                    /*->contain(['Courses' => function ($q) use ($registration_no) {
                                                        return $q->order(['Courses.course_code' => 'ASC']);
                                                    } ,'Students' => function(\Cake\ORM\Query $q) use ($registration_no) {
                                                    return $q->where(['Students.registration_no' => $registration_no]);
                                                    }])*/
                                                    ->matching('Students', function ($q) use ($registration_no) {
                                                        return $q->where(['registration_no' => $registration_no]);
                                                    })
                                                    ->matching('Courses', function ($q) use ($registration_no) {
                                                        return $q->order(['course_code' => 'asc']);
                                                    })
                                                    ->order(['Courses.course_code' => 'ASC'])
                                                    ->toArray();
        if(count($res) == 0) {
            $this->Flash->error(__('Please check the Registrtion No. enterd. If correct then please generate the Result Sheet first.'));
            $this->redirect(['action' => 'dashboard']);

        }
        $Id8 = TableRegistry::get('Programmes')->find()->contain(['Departments' => ['Schools']])->where(['Programmes.id' => $res[0]['_matchingData']['Courses']['programme_id']])->toArray();
        $this->viewBuilder()->layout('ajax');
        $this->set('title', 'My Great Title');
        $this->set('file_name', '2016-06' . '_June_CLM.pdf');
        //debug($data); debug($res); exit;
        $this->set('courses', $res);
        $this->set('Id8', $Id8[0]);
        $this->set('marksgplg', TableRegistry::get('Marksgplg')->find('all')->toArray());
        $this->response->type('pdf');
    	
    }
    
    public function isAuthorized($user = null) {
        // All users with role as 'exam' 
        if (isset($user['role']) && $user['role'] === 'examination' && ($this->request->getParam('action') === 'dashboard' 
                                                                        || $this->request->getParam('action') === 'add'
                                                                        || $this->request->getParam('action') === 'edit'
                                                                        || $this->request->getParam('action') === 'delete'
                                                                        || $this->request->getParam('action') === 'index'
        																|| $this->request->getParam('action') === 'updatemarksfaculty'
        																|| $this->request->getParam('action') === 'updatemarksassess'
        																|| $this->request->getParam('action') === 'prepareresultsheetallstudents'
        																|| $this->request->getParam('action') === 'prepareresultsheet'
        																|| $this->request->getParam('action') === 'getprogrammes'
        																|| $this->request->getParam('action') === 'getcourses'
        																|| $this->request->getParam('action') === 'controlleraction'
														        		|| $this->request->getParam('action') === 'addcourses'
														        		|| $this->request->getParam('action') === 'addstudents'
														        		|| $this->request->getParam('action') === 'addmarks'
        																|| $this->request->getParam('action') === 'getsemesters'
        																|| $this->request->getParam('action') === 'generatetablulationsheet'
        																|| $this->request->getParam('action') === 'import'
        																|| $this->request->getParam('action') === 'pdfview'
                                                                        || $this->request->getParam('action') === 'addstudentinfo')) {
            return true;
        }

        // The owner of an article can edit and delete it
        /*if (in_array($this->request->getParam('action'), ['edit', 'delete'])) {
            $seatId = (int) $this->request->getParam('pass.0');
            if ($this->Admin->Students->isOwnedBy($seatId, $user['id'])) {
                return true;
            }
        }*/
    }

}