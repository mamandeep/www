<?php 

namespace App\Controller;

class SchoolsController extends AppController
{
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Flash'); // Include the FlashComponent
    }
    
    public function index()
    {
        $schools = $this->Schools->find('all');
        $this->set(compact('schools'));
    }
    
    public function view($id = null)
    {
        $school = $this->Schools->get($id);
        $this->set(compact('school'));
    }
    
    public function add()
    {
        $school = $this->Schools->newEntity();
        if ($this->request->is('post')) {
            // Prior to 3.4.0 $this->request->data() was used.
            $school = $this->Schools->patchEntity($school, $this->request->getData());
            $school->user_id = $this->Auth->user('id');
            if ($this->Schools->save($school)) {
                $this->Flash->success(__('Your school has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your school.'));
        }
        $this->set('school', $school);
    }
    
    public function edit($id = null)
    {
        $school = $this->Schools->get($id);
        if ($this->request->is(['post', 'put'])) {
            // Prior to 3.4.0 $this->request->data() was used.
            $school = $this->Schools->patchEntity($school, $this->request->getData());
            $school->user_id = $this->Auth->user('id');
            if ($this->Schools->save($school)) {
                $this->Flash->success(__('Your school has been updated.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to update your school.'));
        }
        $this->set('school', $school);
    }
    
    public function delete($id)
    {
        $this->request->allowMethod(['post', 'delete']);

        $school = $this->Schools->get($id);
        if ($this->Schools->delete($school)) {
            $this->Flash->success(__('The school with id: {0} and name: {1} has been deleted.', h($id), h($school['name'])));
            return $this->redirect(['action' => 'index']);
        }
    }

}

?>