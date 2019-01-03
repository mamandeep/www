<?php 

namespace App\Controller;

class SessionsController extends AppController
{
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Flash'); // Include the FlashComponent
    }
    
    public function index()
    {
        $sessions = $this->Sessions->find('all', ['contain' => ['Batches']]);
        $this->set(compact('sessions'));
    }
    
    public function view($id = null)
    {
        $session = $this->Sessions->get($id, ['contain' => ['Batches']]);
        $this->set(compact('session'));
    }
    
    public function add()
    {
        $session = $this->Sessions->newEntity();
        if ($this->request->is('post')) {
            // Prior to 3.4.0 $this->request->data() was used.
            $session = $this->Sessions->patchEntity($session, $this->request->getData());
            $session->user_id = $this->Auth->user('id');
            if ($this->Sessions->save($session)) {
                $this->Flash->success(__('Your session has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your session.'));
        }
        $this->set(
            'batches', 
            $this->Sessions->Batches->find('list', [
                'keyField' => 'id',
                'valueField' => 'name'
            ]
        ));
        $this->set('session', $session);
    }
    
    public function edit($id = null)
    {
        $session = $this->Sessions->get($id, ['contain' => ['Batches']]);
        if ($this->request->is(['post', 'put'])) {
            // Prior to 3.4.0 $this->request->data() was used.
            $session = $this->Sessions->patchEntity($session, $this->request->getData());
            $session->user_id = $this->Auth->user('id');
            if ($this->Sessions->save($session)) {
                $this->Flash->success(__('Your session has been updated.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to update your session.'));
        }
        $this->set(
            'batches', 
            $this->Sessions->Batches->find('list', [
                'keyField' => 'id',
                'valueField' => 'name'
            ]
        ));
        $list_of_batches = [];
        foreach($this->Sessions->SessionsBatches->find('all', ['conditions' => ['SessionsBatches.session_id' => $id]])->toArray() as $entity) {
            if(!in_array($entity['batch_id'], $list_of_batches)) {
                $list_of_batches[] = $entity['batch_id'];
            }
        }
        $this->set('selectedBatches', $list_of_batches);
        $this->set('session', $session);
    }
    
    public function delete($id)
    {
        $this->request->allowMethod(['post', 'delete']);

        $session = $this->Sessions->get($id);
        if ($this->Sessions->delete($session)) {
            $this->Flash->success(__('The session with id: {0} and name: {1} has been deleted. The associated information related to Batch has been deleted.', h($id), h($session['name'])));
            return $this->redirect(['action' => 'index']);
        }
    }

}

?>