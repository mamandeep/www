<?php 

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Event\Event;
use Cake\Controller\Controller;
use Cake\ORM\TableRegistry;

class UploadComponent extends Component {
	
	var $event = null;
	var $uploadPath = 'uploads/files';
     /**
     * Startup component
     *
     * @param object $controller Instantiating controller
     * @access public
     */ 
    
    public function startup(Event $event) {
        $this->event = $event;
    }

	public function uploadDocuments() {
    	//debug($this->_registry->getController()); exit;
    	$uploadTables = TableRegistry::get('Uploadfiles');
        $existingFiles = $uploadTables->find('all')
                                   ->where(['Uploadfiles.user_id' => $this->_registry->getController()->Auth->user('id')])
                                   ->order(['Uploadfiles.created' => 'DESC'])->toArray();
        $newFile = (count($existingFiles) === 0) ? $uploadTables->newEntity() : $existingFiles[0];
        if ($this->request->is(['post', 'put'])) {
        	//debug($this->request->getData()); exit;
            if(!empty($this->_registry->getController()->request->getData()['file']['name']) && is_uploaded_file($this->_registry->getController()->request->getData()['file']['tmp_name'])){
                $fileName = $this->_registry->getController()->request->getData()['file']['name'];
                $uniqueId = $this->getName();
                $generateFilename = WWW_ROOT . $this->uploadPath . DS . 'photo_' . $uniqueId . '.' . pathinfo($fileName, PATHINFO_EXTENSION);
                //debug($this->_registry->getController()->request->getData()); exit;
                if(move_uploaded_file($this->_registry->getController()->request->getData()['file']['tmp_name'], $generateFilename)) {
                	//debug($this->_registry->getController()); exit;
                    $newFile->photo_name = 'photo_' . $uniqueId . '.' . pathinfo($fileName, PATHINFO_EXTENSION);
                    $newFile->photo_path = $this->uploadPath;
                    $newFile->created = date("Y-m-d H:i:s");
                    $newFile->modified = date("Y-m-d H:i:s");
                    $newFile->user_id = $this->_registry->getController()->Auth->user('id');
                    $newFile->photo_status = $newFile->photo_status + 1;
                    if ($uploadTables->save($newFile)) {
                        $this->_registry->getController()->Flash->success(__('Passport size photograph has been uploaded successfully.'));
                        return null; //$this->redirect(['controller' => 'candidates', 'action' => 'registrationcompletion']);
                    } else {
                        $this->_registry->getController()->Flash->error(__('Unable to upload Passport size photograph, please try again.'));
                        return null; //$this->redirect(['controller' => 'candidates', 'action' => 'registrationcompletion']);
                    }
                } else {
                    $this->_registry->getController()->Flash->error(__('Unable to upload Passport size photograph, please try again.'));
                    return null; //$this->redirect(['controller' => 'candidates', 'action' => 'registrationcompletion']);
                }
            } else {
                $this->_registry->getController()->Flash->error(__('Please choose a passport size photograph to upload.'));
                return null; //$this->redirect(['controller' => 'candidates', 'action' => 'registrationcompletion']);
            }
        }
        return null; //$this->redirect(['controller' => 'candidates', 'action' => 'registrationcompletion']);
    }

    private function getName() {
        $length = rand(32,64);
        $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }

	public function uploadDocuments1() {
		// context is of the controller only
		// show messages
		return null;
	}
}

?>