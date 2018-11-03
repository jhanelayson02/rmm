<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{


    public function login()
    {
        $auditTable = TableRegistry::get('Audit');
        $this->viewBuilder()->setLayout('');
        if($this->request->is('post')){
            $user = $this->Auth->identify();
            $userLoggedIn = $this->Users->get($user['id'], [
                'contain' => ['Branches']
            ]);
            // pr($userLoggedIn);exit;
            $user['is_main'] = $userLoggedIn['branch']['is_main']; 

            if($user){
                $this->Auth->setUser($user);
                $audit = $auditTable->newEntity();
                $audit->user_id = $user['id'];
                $audit->type = 'Log-in';
                $auditTable->save($audit);
                return $this->redirect(['Controller'=>'users','action'=>'index']);
            }
            $this->Flash->error(__('Invalid username or password, try again.'));
        }
    }

    public function logout(){
        $auth = $this->request->session()->read('Auth.User');
        $auditTable = TableRegistry::get('Audit');

        $audit = $auditTable->newEntity();
        $audit->user_id = $auth['id'];
        $audit->type = 'Log-out';
        $auditTable->save($audit);

        return $this->redirect($this->Auth->logout());
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $auth = $this->request->session()->read('Auth.User');

        if ($auth['role'] == 'cashier') {
            return $this->redirect(['controller' => 'BranchProducts', 'action' => 'pos']);
        }
        if ($auth['is_main']) {
            $users = $this->Users->find('all', [
                'contain' => ['Branches'],
                'conditions' => [
                    'Users.is_deleted' => 0
                ]
            ])->toArray();
        } else {
            $users = $this->Users->find('all', [
                'contain' => ['Branches'],
                'conditions' => [
                    'Users.branch_id' => $auth['branch_id'],
                    'Users.is_deleted' => 0
                ]
            ])->toArray();
        }
        // pr($users);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $auth = $this->request->session()->read('Auth.User');
        
        $this->loadModel('Branches');
        $condition = [];
        if (!$auth['is_main']) {
            $condition = ['id' => $auth['branch_id']];
        }
        $branches = $this->Branches->find('list', [
            'conditions' => $condition
        ]);

        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact(['user', 'branches']));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $auth = $this->request->session()->read('Auth.User');
        $this->loadModel('Branches');
        $condition = [];
        if (!$auth['is_main']) {
            $condition = ['id' => $auth['branch_id']];
        }
        $branches = $this->Branches->find('list', [
            'conditions' => $condition
        ]);

        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user', 'branches'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        if ($this->request->query['type'] == 'archive') {
            $this->Users->updateAll(
                ['is_deleted' => 1],
                ['id' => $id]
            );
            $this->Flash->success('The product has been archived!');
        } else {
            $this->Users->updateAll(
                ['is_deleted' => 0],
                ['id' => $id]
            );
            $this->Flash->success('The product has been restored!');
        }

        return $this->redirect($this->referer());
    }

    public function auditTrail()
    {
        $this->loadModel('Audit');
        $audits = $this->Audit->find('all', [
            'contain' => ['Users'],
            'order' => 'Audit.created DESC'
        ]);

        $this->set(compact('audits'));
    }

    public function archive()
    {
        $users = $this->Users->find('all', [
            'contain' => ['Branches'],
            'conditions' => [
                'Users.is_deleted' => 1
            ]
        ]);

        $this->set(compact('users'));
    }
}
