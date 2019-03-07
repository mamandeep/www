<?php

namespace App\View\Cell;

use Cake\View\Cell;

class RegcompletionCell extends Cell {
    //public $view = 'single_post';
    // I am renaming the method `render` to `run` for a specific reason...
    public function display(array $options = [])
    {
        //$this->loadModel('Posts');
        //$post = $this->Posts->findById($options['id']
        $this->set('unread_count', 4);
        return $this; // So I can chain the `run` method
    }

    public function registrationdocs() {
    	$uploadFilesTable = TableRegistry::get('Uploadfiles');
        $existingFiles = $uploadFilesTable->find('all')
                                   ->where(['Uploadfiles.user_id' => $this->Auth->user('id')])
                                   ->order(['Uploadfiles.created' => 'DESC'])->toArray();
        $newFile = (count($existingFiles) === 0) ? $this->Uploadfiles->newEntity() : $existingFiles[0];
        if ($this->request->is(['post', 'put'])) {
            if(!empty($this->request->getData()['file']['name']) && is_uploaded_file($this->request->getData()['file']['tmp_name'])){
                $fileName = $this->request->getData()['file']['name'];
                $uniqueId = $this->getName();
                $generateFilename = WWW_ROOT . $this->uploadPath . DS . 'photo_' . $uniqueId . '.' . pathinfo($fileName, PATHINFO_EXTENSION);
                if(move_uploaded_file($this->request->getData()['file']['tmp_name'], $generateFilename)) {
                    $newFile->photo_name = 'photo_' . $uniqueId . '.' . pathinfo($fileName, PATHINFO_EXTENSION);
                    $newFile->photo_path = $this->uploadPath;
                    $newFile->created = date("Y-m-d H:i:s");
                    $newFile->modified = date("Y-m-d H:i:s");
                    $newFile->user_id = $this->Auth->user('id');
                    $newFile->photo_status = $newFile->photo_status + 1;
                    if ($uploadFilesTable->save($newFile)) {
                        $this->Flash->success(__('Passport size photograph has been uploaded successfully.'));
                        return null; //$this->redirect(['controller' => 'candidates', 'action' => 'registrationcompletion']);
                    } else {
                        $this->Flash->error(__('Unable to upload Passport size photograph, please try again.'));
                        return null; //$this->redirect(['controller' => 'candidates', 'action' => 'registrationcompletion']);
                    }
                } else {
                    $this->Flash->error(__('Unable to upload Passport size photograph, please try again.'));
                    return null; //$this->redirect(['controller' => 'candidates', 'action' => 'registrationcompletion']);
                }
            } else {
                $this->Flash->error(__('Please choose a passport size photograph to upload.'));
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
}
?>