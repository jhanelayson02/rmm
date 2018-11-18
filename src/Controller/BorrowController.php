<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Borrow Controller
 *
 * @property \App\Model\Table\BorrowTable $Borrow
 *
 * @method \App\Model\Entity\Borrow[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BorrowController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->loadModel('Branches');
        $this->loadModel('Products');
        $auth = $this->request->session()->read('Auth.User');

        
        if ($auth['is_main'] == 1) {
            $borrow = $this->Borrow->find('all', [
                'contain' => ['Users.Branches', 'Branches', 'Products'],
                'conditions' => [
                    'NOT' => [
                        'Borrow.is_deleted' => 1
                    ]
                ]
            ]);
        } else {
            $borrow = $this->Borrow->find('all', [
                'contain' => ['Users.Branches', 'Branches', 'Products'],
                'conditions' => [
                    'OR' => [
                        'Users.branch_id' => $auth['branch_id'],
                        'Borrow.branch_id' => $auth['branch_id']
                    ],
                    'NOT' => [
                        'Borrow.is_deleted' => 1
                    ]
                ]
            ]);
        }

        $branches = $this->Branches->find('list', [
            'conditions' => [
                'NOT' => [
                    'id' => $auth['branch_id']
                ]
            ]
        ]);
        $products = $this->Products->find('list');

        $this->set(compact('borrow', 'branches', 'products'));
    }

    /**
     * View method
     *
     * @param string|null $id Borrow id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $borrow = $this->Borrow->get($id, [
            'contain' => ['Users', 'Branches', 'Products']
        ]);

        $this->set('borrow', $borrow);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $borrow = $this->Borrow->newEntity();
        if ($this->request->is('post')) {
            $borrow = $this->Borrow->patchEntity($borrow, $this->request->getData());
            if ($this->Borrow->save($borrow)) {
                $this->Flash->success(__('The request has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The request could not be saved. Please, try again.'));
        }
        $users = $this->Borrow->Users->find('list', ['limit' => 200]);
        $branches = $this->Borrow->Branches->find('list', ['limit' => 200]);
        $products = $this->Borrow->Products->find('list', ['limit' => 200]);
        $this->set(compact('borrow', 'users', 'branches', 'products'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Borrow id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $borrow = $this->Borrow->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $borrow = $this->Borrow->patchEntity($borrow, $this->request->getData());
            if ($this->Borrow->save($borrow)) {
                $this->Flash->success(__('The request has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The request could not be saved. Please, try again.'));
        }
        $users = $this->Borrow->Users->find('list', ['limit' => 200]);
        $branches = $this->Borrow->Branches->find('list', ['limit' => 200]);
        $products = $this->Borrow->Products->find('list', ['limit' => 200]);
        $this->set(compact('borrow', 'users', 'branches', 'products'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Borrow id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        if (isset($this->request->query['type']) && $this->request->query['type'] == 'archive') {
            $this->Borrow->updateAll(
                ['is_deleted' => 1],
                ['id' => $id]
            );
            $this->Flash->success('The request has been archived!');
        } elseif (isset($this->request->query['type']) && $this->request->query['type'] == 'restore') {
            $this->Borrow->updateAll(
                ['is_deleted' => 0],
                ['id' => $id]
            );
            $this->Flash->success('The request has been restored!');
        }

        if (isset($this->request->query['status'])) {
            $this->Borrow->updateAll(
                ['status' => $this->request->query['status']],
                ['id' => $id]
            );
            $this->Flash->success('The request has been updated!');
        }

        return $this->redirect($this->referer());
    }

    public function archive()
    {
        $auth = $this->request->session()->read('Auth.User');

        
        if ($auth['is_main'] == 1) {
            $borrow = $this->Borrow->find('all', [
                'contain' => ['Users.Branches', 'Branches', 'Products'],
                'conditions' => [
                    'Borrow.is_deleted' => 1
                ]
            ]);
        } else {
            $borrow = $this->Borrow->find('all', [
                'contain' => ['Users.Branches', 'Branches', 'Products'],
                'conditions' => [
                    'OR' => [
                        'Users.branch_id' => $auth['branch_id'],
                        'Borrow.branch_id' => $auth['branch_id']
                    ],
                    'Borrow.is_deleted' => 1
                ]
            ]);
        }

        $this->set(compact('borrow', 'branches', 'products'));
    }
}
