<?php

namespace App\Controller;

use Cake\Utility\Inflector;
use Cake\Network\Session;
use Cake\Log\Log;
use Cake\Routing\Router;

class UploadfilesController extends AppController
{
    private $uploadPath = 'uploads' . DS . 'files' . DS;
    private $MAX_FILES_ALLOWED_PER_USER = 3;
    
    public function initialize() {
        parent::initialize();
        
        $this->loadComponent('Flash');
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
        if($this->request->is(['get'])) {
        	Log::write('info', Router::url(null, false) . "Upload File: \n" . var_export($newFile, true));
        }
        if ($this->request->is(['post', 'put'])) {
            if(!empty($this->request->getData()['photo']) &&  $this->request->getData()['photo']['error'] == UPLOAD_ERR_NO_FILE
                && !empty($this->request->getData()['signature']) &&  $this->request->getData()['signature']['error'] == UPLOAD_ERR_NO_FILE) {
                $this->Flash->error(__('No file chosen for upload'));
            }
            else {
                $candidate = $this->Uploadfiles->patchEntity($newFile, $this->request->getData());
                $candidate->user_id = $this->Auth->user('id');
                if ($candidate->isNew() && $this->Uploadfiles->save($candidate)) {
                    $this->Flash->success(__('Your files have been saved.'));
                    //debug($this->Auth->user('username'));
                    Log::write('info', 'Files uploaded successfully for ' . $this->Auth->user('username') . ' ' . var_export($candidate, true));
                }
                else {
                    $this->Flash->error(__('Unable to upload files.'));
                }
            }
        }
        
        $filesRowNum = count($existingFiles);
        $this->set('files',$existingFiles);
        $this->set('filesRowNum',$filesRowNum);
        
        $this->set('Uploadfile', $newFile);
    }
    
    public function isAuthorized($user = null) {
	if(parent::isAuthorized($user)) {
		return true;
	}
        // All users with role as 'exam' can add seats
        if (isset($user['role']) && $user['role'] === 'student' && ($this->request->getParam('action') === 'upload')) {
            return true;
        }

        
    }
}
