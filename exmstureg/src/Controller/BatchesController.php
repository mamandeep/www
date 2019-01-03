<?php 

namespace App\Controller;

class BatchesController extends AppController
{
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Flash'); // Include the FlashComponent
    }
    
    public function index()
    {
        $batches = $this->Batches->find('all', ['contain' => 'Semesters']);
        $this->set(compact('batches'));
    }
    
    public function view($id = null)
    {
        $batch = $this->Batches->get($id, ['contain' => 'Semesters']);
        $this->set(compact('batch'));
    }
    
    public function add()
    {
        $batch = $this->Batches->newEntity();
        if ($this->request->is('post')) {
            // Prior to 3.4.0 $this->request->data() was used.
            $batch = $this->Batches->patchEntity($batch, $this->request->getData());
            //debug($batch); return null;
            $batch->user_id = $this->Auth->user('id');
            $users = $this->Batches->saveAssociated($batch);
            if ($this->Batches->save($batch)) {
                $this->Flash->success(__('Your batch has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your batch.'));
        }
        
        $this->set('batch', $batch);
    }
    
    public function edit($id = null)
    {
        $batch = $this->Batches->get($id);
        if ($this->request->is(['post', 'put'])) {
            // Prior to 3.4.0 $this->request->data() was used.
            $batch = $this->Batches->patchEntity($batch, $this->request->getData());
            $batch->user_id = $this->Auth->user('id');
            if ($this->Batches->save($batch)) {
                $this->Flash->success(__('Your batch has been updated.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to update your batch.'));
        }
        $this->set(
            'semesters', 
            $this->Batches->Semesters->find('list', [
                'keyField' => 'id',
                'valueField' => 'name'
            ]
        ));
        $list_of_sem_ids = [];
        foreach($this->Batches->SemestersBatches->find('all', ['conditions' => ['SemestersBatches.batch_id' => $id]])->toArray() as $entity) {
            if(!in_array($entity['semester_id'], $list_of_sem_ids)) {
                $list_of_sem_ids[] = $entity['semester_id'];
            }
        }
        $this->set(
            'selectedSemesters', $list_of_sem_ids);
            /*    'keyField' => 'semester_id',
                'valueField' => function ($semester_batch) {
                    return $this->Batches->Semesters->get($semester_batch['semester_id'])->name;
                },
                'conditions' => ['SemestersBatches.batch_id' => $id]
            ]
        ));*/
        $this->set('batch', $batch);
    }
    
    public function delete($id)
    {
        $this->request->allowMethod(['post', 'delete']);

        $batch = $this->Batches->get($id);
        if ($this->Batches->delete($batch)) {
            $this->Flash->success(__('The batch with id: {0} and name: {1} has been deleted. The associated data of semesters has been deleted too.', h($id), h($batch['name'])));
            return $this->redirect(['action' => 'index']);
        }
    }

}

?>