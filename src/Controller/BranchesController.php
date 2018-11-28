<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Branches Controller
 *
 * @property \App\Model\Table\BranchesTable $Branches
 *
 * @method \App\Model\Entity\Branch[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BranchesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $branches = $this->Branches->find('all', [
            'conditions' => [
                'NOT' => ['is_deleted' => 1]
            ]
        ]);

        $this->set(compact('branches'));
    }

    /**
     * View method
     *
     * @param string|null $id Branch id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $branch = $this->Branches->get($id, [
            'contain' => []
        ]);

        $this->set('branch', $branch);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $branch = $this->Branches->newEntity();
        if ($this->request->is('post')) {
            $target_dir = "img/branches/";
            $target_file = $target_dir . basename($_FILES["image"]["name"]);
            move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
            $this->request->data['image'] = basename($_FILES["image"]["name"]);
            $branch = $this->Branches->patchEntity($branch, $this->request->getData());
            if ($this->Branches->save($branch)) {
                $this->Flash->success(__('The branch has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            // pr($branch->errors());exit;
            $this->Flash->error(__('The branch could not be saved. Please, try again.'));
        }
        $this->set(compact('branch'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Branch id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $branch = $this->Branches->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $target_dir = "img/branches/";
            $target_file = $target_dir . basename($_FILES["image"]["name"]);
            move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
            $this->request->data['image'] = basename($_FILES["image"]["name"]);
            $branch = $this->Branches->patchEntity($branch, $this->request->getData());
            if ($this->Branches->save($branch)) {
                $this->Flash->success(__('The branch has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The branch could not be saved. Please, try again.'));
        }
        $this->set(compact('branch'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Branch id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        if ($this->request->query['type'] == 'archive') {
            $this->Branches->updateAll(
                ['is_deleted' => 1],
                ['id' => $id]
            );
            $this->Flash->success('The product has been archived!');
        } else {
            $this->Branches->updateAll(
                ['is_deleted' => 0],
                ['id' => $id]
            );
            $this->Flash->success('The product has been restored!');
        }

        return $this->redirect($this->referer());
    }

    public function archive()
    {
        $branches = $this->Branches->find('all', [
            'conditions' => [
                'is_deleted' => 1
            ]
        ]);

        $this->set(compact('branches'));
    }
}
