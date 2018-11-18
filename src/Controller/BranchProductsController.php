<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

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
     * Inventory method
     *
     * @param string|null $id Branch Product id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view()
    {
        $auth = $this->request->session()->read('Auth.User');
        $this->loadModel('Products');
        $products = $this->Products->find('all',[
            'contain' => [
                'BranchProducts' => [
                    'conditions' => [
                        'branch_id' => $auth['branch_id']
                    ]
                ], 
                'Borrow' => [
                    'conditions' => [
                        'status' => 'Received'
                    ]
                ]
            ]
        ]);

        // pr($products->toArray());exit;
        $this->set(compact('products'));
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
        $this->loadModel('Sales');
        $this->loadModel('SaleItems');
        $products = $this->Products->find('all');

        $auth = $this->request->session()->read('Auth.User');
        if ($this->request->is('post')) {
            // pr($this->request->data);exit;
            $salesTable = TableRegistry::get('Sales');
            $sale = $salesTable->newEntity();
            $sale->user_id = $auth['id'];
            $sale->cus_name = $this->request->data['cus_name'];
            $sale->branch_id = $auth['branch_id'];
            $sale->amount = $this->request->data['total'];
            $sale->cash_change = $this->request->data['payment'] - $this->request_data['total'];
            $sale->cash = $this->request->data['payment'];
            $salesTable->save($sale);
            // pr($sale->validationErrors);exit;

            foreach ($this->request->data['quant'] as $prod_id => $qty) {

                $itemsTable = TableRegistry::get('SaleItems');
                $item = $itemsTable->newEntity();
                $item->sale_id = $sale['id'];
                $item->product_id = $prod_id;
                $item->qty = $qty;
                $item->cost = $this->request->data['prod_total'][$prod_id];
                $itemsTable->save($item);

                $cart = $this->BranchProducts->find('all', [
                    'conditions' => [
                        'branch_id' => $auth['branch_id'],
                        'product_id' => $prod_id
                    ]
                ])->first();
    
                if ($cart) {
                    $quantity = $cart->quantity - $qty;
                    $this->BranchProducts->updateAll(
                        ['quantity' => $quantity],
                        ['id' => $cart->id]
                    );
                }
                    
            }
            $this->redirect(['action' => 'receipt', $sale['id'], '?' => ['redirect' => '/rmm/branch-products/pos']]);
            // return $this->Flash->success('Success');

        }
        $this->set(compact('products'));
    }

    public function receipt($id)
    {
        $this->viewBuilder()->setLayout('');
        $this->loadModel('Sales');

        $sale = $this->Sales->get($id, [
            'contain' => ['SaleItems.Products','Users','Branches']
        ]);
        // pr($sale);exit;

        $this->set(compact('sale'));
    }
}
