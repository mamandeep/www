<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\Email;
use Cake\Event\Event;
use Cake\Datasource\ConnectionManager;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

use Cake\ORM\TableRegistry;


class CommandsController extends AppController {

	private $uploadPath = 'uploads' . DS . 'files' . DS;

    public function initialize() {
        parent::initialize();

        $this->loadComponent('Flash'); // Include the FlashComponent
    }

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
    }

    public function index() {

    }

    public function addnewseat() {
        if ($this->request->is(['post', 'put'])) {
        	//debug($this->request->getData());
            if(!empty($this->request->getData()['feedata']['name']) && is_uploaded_file($this->request->getData()['feedata']['tmp_name'])){
            	//debug("comes here too");
                $fileName = $this->request->getData()['feedata']['name'];
                $uniqueId = uniqid();
                $generateFilename = WWW_ROOT . $this->uploadPath . DS . 'uploadedacst_' . $uniqueId . '.' . pathinfo($fileName, PATHINFO_EXTENSION);
                if(move_uploaded_file($this->request->getData()['feedata']['tmp_name'], $generateFilename)){
        			$inputFileType = 'Xls';
					$inputFileName = $generateFilename;
					//debug(IOFactory::identify($inputFileName)); return null;
					$reader = IOFactory::createReader($inputFileType);
					$reader->setReadDataOnly(true);
					$spreadsheet = $reader->load($inputFileName);
					//debug($spreadsheet); return null;
					$sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
					//run data base query and match with above data
					$conn = ConnectionManager::get('default');
			    	$usernameList = "";
					foreach($sheetData as $key => $value) {
						if(!empty(trim($value['C'])) && $key < count($sheetData) && $key != 1 && $key != 2) {
							$usernameList .= "'" . $value['C'] . "',";
						}
						else if(!empty(trim($value['C'])) && $key != 1 && $key != 2) {
							$usernameList .= "'" . $value['C'] . "'";	
						}
					}
					//debug($usernameList); return null;
					$stmt2 = $conn->execute("select u1.username from seats s1 left join candidates c1 on  s1.candidate_id = c1.id left join users u1 on c1.user_id = u1.id where s1.fee_id is null and s1.candidate_id is not null and u1.username in (" . $usernameList . ");");
					$data = $stmt2->fetchAll('assoc');
					//debug($data); return null;
					$this->set('usernames', $data);
                }
            }
        }
    }

    public function showroundwise() {

    	$conn = ConnectionManager::get('default');

    	$query1 = "select * from seatallocations s1 left join seats s2 on s1.seat_id = s2.id where s2.candidate_id is not null and s2.fee_id is not null";
    	$stmt2 = $conn->execute($query1);
    	$data = $stmt2->fetchAll('assoc');

    	
    	$daterange = ['2018-06-19 00:00:00' => '2018-06-27 23:59:59',
    				   '2018-06-28 00:00:00' => '2018-07-13 23:59:59',
    				   '2018-07-14 00:00:00' => '2018-07-23 23:59:59',
    				   '2018-07-24 00:00:00' => '2018-08-11 23:59:59'];
    	$R1 = [];
    	$R2 = [];
    	$R3 = [];
    	$R4 = [];
    	//debug($daterange);
    	//debug($data); exit;
    	foreach($data as $key => $value) {
    		$count = 1;
    		//debug($value);
    		foreach($daterange as $start => $end) {
    			//debug($value['modified']); debug($start);
    			//debug(strtotime($value['modified'])); strtotime($start);
    			if(strtotime($value['modified']) >= strtotime($start) && strtotime($value['modified']) <= strtotime($end) && $count == 1) {
    				$R1[] = $value;
    			}
    			else if(strtotime($value['modified']) >= strtotime($start) && strtotime($value['modified']) <= strtotime($end) && $count == 2) {
    				$R2[] = $value;
    			}
    			else if(strtotime($value['modified']) >= strtotime($start) && strtotime($value['modified']) <= strtotime($end) && $count == 3) {
    				$R3[] = $value;
    			}
    			else if(strtotime($value['modified']) >= strtotime($start) && strtotime($value['modified']) <= strtotime($end) && $count == 4) {
    				$R4[] = $value;
    			}
    			$count++;
    		}
    	}
    	//debug($R1);debug($R2);debug($R3);debug($R4);
    	$this->set("R1", $R1);
    	$this->set("R2", $R2);
    	$this->set("R3", $R3);
    	$this->set("R4", $R4);
    	//exit;
    	$query2 = "select * from cancelseats c1
    				left join seats s2 on c1.fee_id = s2.cancelled_fee_id_C1
    				left join seats s3 on c1.fee_id = s3.cancelled_fee_id_C2R1
    				left join seats s4 on c1.fee_id = s4.cancelled_fee_id_C2R2
    				left join seats s5 on c1.fee_id = s5.cancelled_fee_id_C3
    				left join seats s6 on c1.fee_id = s6.cancelled_fee_id_C3A
    				left join seats s7 on c1.fee_id = s7.cancelled_fee_id_C3R2
    				left join seats s8 on c1.fee_id = s8.cancelled_fee_id_C3R2A
    				left join seats s9 on c1.fee_id = s9.cancelled_fee_id_C3R3
    				left join seats s10 on c1.fee_id = s10.cancelled_fee_C3R3A
    				left join seats s11 on c1.fee_id = s11.cancelled_fee_C3R3B
    				left join seats s12 on c1.fee_id = s12.cancelled_fee_C3R3C
    				left join seats s13 on c1.fee_id = s13.cancelled_fee_C4R1
    				left join seats s14 on c1.fee_id = s14.cancelled_fee_C4R2
    				left join seats s15 on c1.fee_id = s15.cancelled_fee_C4R3
    				left join seats s16 on c1.fee_id = s16.cancelled_fee_C4R4
    				left join seats s17 on c1.fee_id = s17.cancelled_fee_C4R5
    				left join seats s18 on c1.fee_id = s18.cancelled_fee_C5R1
    				left join seats s19 on c1.fee_id = s19.cancelled_fee_C5R2
    				left join seats s20 on c1.fee_id = s20.cancelled_fee_C5R3";

		$stmt2 = $conn->execute($query2);
    	$data = $stmt2->fetchAll('assoc');

    	$RC1 = [];
    	$RC2 = [];
    	$RC3 = [];
    	$RC4 = [];
    	//debug($data); exit;
    	//$this->set("cancelseats", $data);
    	foreach($data as $key => $value) {
    		$count = 1;
    		//debug($value);
    		foreach($daterange as $start => $end) {
    			//debug($value['modified']); debug($start);
    			//debug(strtotime($value['modified'])); strtotime($start);
    			if(strtotime($value['modified']) >= strtotime($start) && strtotime($value['modified']) <= strtotime($end) && $count == 1) {
    				$RC1[] = $value;
    			}
    			else if(strtotime($value['modified']) >= strtotime($start) && strtotime($value['modified']) <= strtotime($end) && $count == 2) {
    				$RC2[] = $value;
    			}
    			else if(strtotime($value['modified']) >= strtotime($start) && strtotime($value['modified']) <= strtotime($end) && $count == 3) {
    				$RC3[] = $value;
    			}
    			else if(strtotime($value['modified']) >= strtotime($start) && strtotime($value['modified']) <= strtotime($end) && $count == 4) {
    				$RC4[] = $value;
    			}
    			$count++;
    		}
    	}
    	$this->set("RC1", $RC1);
    	$this->set("RC2", $RC2);
    	$this->set("RC3", $RC3);
    	$this->set("RC4", $RC4);
    }

    public function isAuthorized($user = null) {
    	//return parent::isAuthorized($user);
    	// All users with role as 'exam' can add seats seatalloted
    	if (isset($user['role']) && $user['role'] === 'examread' && 
    			($this->request->getParam('action') === 'showroundwise')) {
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