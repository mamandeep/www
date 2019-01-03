<?php 

namespace App\Controller;

class SemestersController extends AppController
{
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Flash'); // Include the FlashComponent
    }
    
    public function index()
    {
        $semesters = $this->Semesters->find('all', ['contain' => ['Batches']]);
        $this->set(compact('semesters'));
    }
    
    public function view($id = null)
    {
        $semester = $this->Semesters->get($id, ['contain' => ['Batches']]);
        $this->set(compact('semester'));
    }
    
    public function add()
    {
        $semester = $this->Semesters->newEntity();
        if ($this->request->is('post')) {
            // Prior to 3.4.0 $this->request->data() was used.
            $semester = $this->Semesters->patchEntity($semester, $this->request->getData());
            $semester->user_id = $this->Auth->user('id');
            if ($this->Semesters->save($semester)) {
                $this->Flash->success(__('Your semester has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your semester.'));
        }
        $this->set(
            'batches', 
            $this->Semesters->Batches->find('list', [
                'keyField' => 'id',
                'valueField' => 'name'
            ]
        ));
        $this->set('semester', $semester);
    }
    
    public function edit($id = null)
    {
        $semester = $this->Semesters->get($id, ['contain' => ['Batches']]);
        if ($this->request->is(['post', 'put'])) {
            // Prior to 3.4.0 $this->request->data() was used.
            $semester = $this->Semesters->patchEntity($semester, $this->request->getData());
            $semester->user_id = $this->Auth->user('id');
            if ($this->Semesters->save($semester)) {
                $this->Flash->success(__('Your semester has been updated.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to update your semester.'));
        }
        $this->set(
            'batches', 
            $this->Semesters->Batches->find('list', [
                'keyField' => 'id',
                'valueField' => 'name'
            ]
        ));
        $list_of_batches = [];
        foreach($this->Semesters->SemestersBatches->find('all', ['conditions' => ['SemestersBatches.semester_id' => $id]])->toArray() as $entity) {
            if(!in_array($entity['batch_id'], $list_of_batches)) {
                $list_of_batches[] = $entity['batch_id'];
            }
        }
        $this->set(
            'selectedBatches', $list_of_batches);
        $this->set('semester', $semester);
    }
    
    public function delete($id)
    {
        $this->request->allowMethod(['post', 'delete']);

        $semester = $this->Semesters->get($id);
        if ($this->Semesters->delete($semester)) {
            $this->Flash->success(__('The semester with id: {0} and name: {1} has been deleted.', h($id), h($semester['name'])));
            return $this->redirect(['action' => 'index']);
        }
    }

}

?>