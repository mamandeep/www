<?php

class UploadproformaController extends AppController {

    var $uses = array('Document','Applicant');                
    
    
    public $paginate = array(
        'limit' => 25,
        'conditions' => array('status' => '1'),
    	'order' => array('User.username' => 'asc' ) 
    );
	
    public function beforeFilter() {
        parent::beforeFilter();
        //$this->Auth->allow('login','add','logout'); 
        /*if(!$this->Session->check('registration_id')) {
            $this->redirect(array('controller' => 'users', 'action' => 'dashboard'));
        }*/
    }
	
    public function upload() {
        if(!empty($this->data['Document']['filename5']['error']) && $this->data['Document']['filename5']['error'] == 4)
            return true;
        if(!empty($this->data)) {  
            if ($this->Document->save($this->data['Document'])) {
                $this->Session->setFlash('Your documents have been submitted');
                $this->redirect(array('controller'=>'form', 'action' => 'generalinformation'));
            }
            else {
                $this->Session->setFlash('There was an error in uploading your documents.');
                return false;
            }
        }
        $applicant = $this->Applicant->find('all', array(
                'conditions' => array('Applicant.id' => $this->Session->read('applicant_id'))));

        if(count($applicant) == 1 && $applicant['0']['Applicant']['final_submit'] == "1") {
            $images = $this->Document->find('all', array(
                'conditions' => array('Document.applicant_id' => $this->Session->read('applicant_id'))));

            $this->set('applicant', $applicant['0']);

            if(count($images) == 1) {
                $this->request->data = $images['0'];
            }
            else if(count($images) > 1) {
                $this->Session->setFlash('An error has occured. Please contact Support.');
                return false;
            }
        }
    } 

}

?>
