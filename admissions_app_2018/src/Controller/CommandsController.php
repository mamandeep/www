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
}