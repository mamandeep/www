<?php 

namespace App\Controller;

class DepartmentsController extends AppController
{
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Flash'); // Include the FlashComponent
    }
    
    public function index()
    {
        $departments = $this->Departments->find('all', ['contain' => ['Schools']]);
        $this->set(compact('departments'));
    }
    
    public function view($id = null)
    {
    	$department = $this->Departments->get($id);
        $this->set(compact('department'));
    }
    
    public function add()
    {
        $department = $this->Departments->newEntity();
        if ($this->request->is('post')) {
            // Prior to 3.4.0 $this->request->data() was used.
            $department = $this->Departments->patchEntity($department, $this->request->getData());
            $department->user_id = $this->Auth->user('id');
            if ($this->Departments->save($department)) {
                $this->Flash->success(__('Your department has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your department.'));
        }
        $this->set(
            'schools', 
            $this->Departments->Schools->find('list', [
                'keyField' => 'id',
                'valueField' => 'name'
            ]
        ));
        $this->set('department', $department);
    }
    
    public function edit($id = null)
    {
        $department = $this->Departments->get($id, ['contain' => ['Schools']]);
        if ($this->request->is(['post', 'put'])) {
            // Prior to 3.4.0 $this->request->data() was used.
            $department = $this->Departments->patchEntity($department, $this->request->getData());
            $department->user_id = $this->Auth->user('id');
            if ($this->Departments->save($department)) {
                $this->Flash->success(__('Your department has been updated.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to update your department.'));
        }
        $this->set(
            'schools', 
            $this->Departments->Schools->find('list', [
                'keyField' => 'id',
                'valueField' => 'name'
            ]
        ));
        $this->set('department', $department);
    }
    
    public function delete($id)
    {
        $this->request->allowMethod(['post', 'delete']);

        $department = $this->Departments->get($id);
        if ($this->Departments->delete($department)) {
            $this->Flash->success(__('The department with id: {0} and name: {1} has been deleted.', h($id), h($department['name'])));
            return $this->redirect(['action' => 'index']);
        }
    }

}

?>