<?php

namespace App\Controller;

use Cake\Utility\Inflector;

class UploadfilesController extends AppController
{
    private $uploadPath = 'uploads' . DS . 'files' . DS;
    private $MAX_FILES_ALLOWED_PER_USER = 3;
    
    public function initialize(){
        parent::initialize();
        
        $this->loadComponent('Flash');
    }
    
    public function index() {
        $flag = $this->isPreferenceFillingOpen();
        if(!$flag) {
            $this->Flash->error(__('The uploading of files is closed at this time.'));
            $this->set('lockseatOpen', false);
            $this->redirect(['controller' => 'candidates', 'action' => 'add']);
        }
        else {
            $this->set('lockseatOpen', true);
        }
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
                $uniqueId = $this->getName();
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
    

    public function registrationdocs() {
        $existingFiles = $this->Uploadfiles->find('all')
                                   ->where(['Uploadfiles.user_id' => $this->Auth->user('id')])
                                   ->order(['Uploadfiles.created' => 'DESC'])->toArray();
        $newFile = (count($existingFiles) === 0) ? $this->Uploadfiles->newEntity() : $existingFiles[0];
        if ($this->request->is(['post', 'put'])) {
            if(!empty($this->request->data['file']['name']) && is_uploaded_file($this->request->data['file']['tmp_name'])){
                $fileName = $this->request->data['file']['name'];
                $uniqueId = $this->getName();
                $generateFilename = WWW_ROOT . $this->uploadPath . DS . 'photo_' . $uniqueId . '.' . pathinfo($fileName, PATHINFO_EXTENSION);
                if(move_uploaded_file($this->request->data['file']['tmp_name'], $generateFilename)) {
                    $newFile->photo_name = 'photo_' . $uniqueId . '.' . pathinfo($fileName, PATHINFO_EXTENSION);
                    $newFile->photo_path = $this->uploadPath;
                    $newFile->created = date("Y-m-d H:i:s");
                    $newFile->modified = date("Y-m-d H:i:s");
                    $newFile->user_id = $this->Auth->user('id');
                    $newFile->photo_status = $newFile->photo_status + 1;
                    if ($this->Uploadfiles->save($newFile)) {
                        $this->Flash->success(__('Passport size photograph has been uploaded successfully.'));
                        return $this->redirect(['controller' => 'candidates', 'action' => 'registrationcompletion']);
                    } else {
                        $this->Flash->error(__('Unable to upload Passport size photograph, please try again.'));
                        return $this->redirect(['controller' => 'candidates', 'action' => 'registrationcompletion']);
                    }
                } else {
                    $this->Flash->error(__('Unable to upload Passport size photograph, please try again.'));
                    return $this->redirect(['controller' => 'candidates', 'action' => 'registrationcompletion']);
                }
            } else {
                $this->Flash->error(__('Please choose a passport size photograph to upload.'));
                return $this->redirect(['controller' => 'candidates', 'action' => 'registrationcompletion']);
            }
        }
        return $this->redirect(['controller' => 'candidates', 'action' => 'registrationcompletion']);
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

    public function isAuthorized($user = null) {
    	if(parent::isAuthorized($user)) {
    		return true;
    	}

        // All users with role as 'exam' can add seats
        if (isset($user['role']) && $user['role'] === 'student' && ($this->request->getParam('action') === 'index' || $this->request->getParam('action') === 'registrationdocs')) {
            return true;
        }
    }
}
