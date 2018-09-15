<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * BranchProducts Controller
 *
 * @property \App\Model\Table\BranchProductsTable $BranchProducts
 *
 * @method \App\Model\Entity\BranchProduct[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BranchProductsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Branches', 'Products']
        ];
        $branchProducts = $this->paginate($this->BranchProducts);

        $this->set(compact('branchProducts'));
    }

    /**
     * View method
     *
     * @param string|null $id Branch Product id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $auth = $this->request->session()->read('Auth.User');
        $this->loadModel('Branches');
        $branch = $this->Branches->get($id, [
            'contain' => ['BranchProducts']
        ]);
        $products = $this->Products->find('all');

        pr($branch);exit;
        $this->set(compact('branchProduct'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $branchProduct = $this->BranchProducts->newEntity();
        if ($this->request->is('post')) {
            $branchProduct = $this->BranchProducts->patchEntity($branchProduct, $this->request->getData());
            if ($this->BranchProducts->save($branchProduct)) {
                $this->Flash->success(__('The branch product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The branch product could not be saved. Please, try again.'));
        }
        $branches = $this->BranchProducts->Branches->find('list', ['limit' => 200]);
        $products = $this->BranchProducts->Products->find('list', ['limit' => 200]);
        $this->set(compact('branchProduct', 'branches', 'products'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Branch Product id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $branchProduct = $this->BranchProducts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $branchProduct = $this->BranchProducts->patchEntity($branchProduct, $this->request->getData());
            if ($this->BranchProducts->save($branchProduct)) {
                $this->Flash->success(__('The branch product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The branch product could not be saved. Please, try again.'));
        }
        $branches = $this->BranchProducts->Branches->find('list', ['limit' => 200]);
        $products = $this->BranchProducts->Products->find('list', ['limit' => 200]);
        $this->set(compact('branchProduct', 'branches', 'products'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Branch Product id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $branchProduct = $this->BranchProducts->get($id);
        if ($this->BranchProducts->delete($branchProduct)) {
            $this->Flash->success(__('The branch product has been deleted.'));
        } else {
            $this->Flash->error(__('The branch product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function order()
    {
        $this->loadModel('Products');
        $products = $this->Products->find('all');

        $this->set(compact('products'));
    }

    public function pos()
    {
        $this->viewBuilder()->setLayout('');
        $this->loadModel('Products');
        $products = $this->Products->find('all');

        $this->set(compact('products'));
    }
}
