<?php 

namespace App\Controller;

class ProgrammesController extends AppController
{
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Flash'); // Include the FlashComponent
    }
    
    public function index()
    {
        $programmes = $this->Programmes->find('all', ['contain' => ['Departments']]);
        $this->set(compact('programmes'));
    }
    
    public function view($id = null)
    {
        $programme = $this->Programmes->get($id, ['contain' => ['Departments']]);
        $this->set(compact('programme'));
    }
    
    public function add()
    {
        $programme = $this->Programmes->newEntity();
        if ($this->request->is('post')) {
            // Prior to 3.4.0 $this->request->data() was used.
            $programme = $this->Programmes->patchEntity($programme, $this->request->getData());
            $programme->user_id = $this->Auth->user('id');
            if ($this->Programmes->save($programme)) {
                $this->Flash->success(__('Your programme has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your programme.'));
        }
        $this->set(
            'departments', 
            $this->Programmes->Departments->find('list', [
                'keyField' => 'id',
                'valueField' => 'name'
            ]
        ));
        $this->set('programme', $programme);
    }
    
    public function edit($id = null)
    {
        $programme = $this->Programmes->get($id, ['contain' => ['Departments']]);
        if ($this->request->is(['post', 'put'])) {
            // Prior to 3.4.0 $this->request->data() was used.
            $programme = $this->Programmes->patchEntity($programme, $this->request->getData());
            $programme->user_id = $this->Auth->user('id');
            if ($this->Programmes->save($programme)) {
                $this->Flash->success(__('Your programme has been updated.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to update your programme.'));
        }
        $this->set(
            'departments', 
            $this->Programmes->Departments->find('list', [
                'keyField' => 'id',
                'valueField' => 'name'
            ]
        ));
        $this->set('programme', $programme);
    }
    
    public function delete($id)
    {
        $this->request->allowMethod(['post', 'delete']);

        $programme = $this->Programmes->get($id);
        if ($this->Programmes->delete($programme)) {
            $this->Flash->success(__('The programme with id: {0} and name: {1} has been deleted.', h($id), h($programme['name'])));
            return $this->redirect(['action' => 'index']);
        }
    }

}

?>