<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Cart Controller
 *
 * @property \App\Model\Table\CartTable $Cart
 *
 * @method \App\Model\Entity\Cart[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CartController extends AppController
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
        $cart = $this->paginate($this->Cart);

        $this->set(compact('cart'));
    }

    /**
     * View method
     *
     * @param string|null $id Cart id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->loadModel('Orders');
        $order = $this->Orders->get($id, [
            'contain' => ['Cart.Products', 'Users.Branches']
        ]);
        // pr($order);exit;

        $this->set(compact('order'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $auth = $this->request->session()->read('Auth.User');

        $ordersTable = TableRegistry::get('Orders');
        $order = $ordersTable->newEntity();
        $order->status = 'Backlog';
        $order->user_id = $auth['id'];
        $order = $ordersTable->save($order);
        // pr($this->request->data);exit;

        $counter = count($this->request->data['product_id']);
        for ($x=0;$x<$counter;$x++) {
            if ($this->request->data['quantity'][$x] != null) {
                $cartTable = TableRegistry::get('Cart');
                $cart = $cartTable->newEntity();
                $cart->branch_id = $this->request->data['branch_id'];
                $cart->order_id = $order['id'];
                $cart->product_id = $this->request->data['product_id'][$x];
                $cart->quantity = $this->request->data['quantity'][$x];
                $cart->is_pending = 1;
                $cart = $cartTable->save($cart);
            }
        }

        $this->Flash->success(__('The order has been saved.'));
        return $this->redirect(['action' => 'dashboard']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Cart id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cart = $this->Cart->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cart = $this->Cart->patchEntity($cart, $this->request->getData());
            if ($this->Cart->save($cart)) {
                $this->Flash->success(__('The cart has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cart could not be saved. Please, try again.'));
        }
        $branches = $this->Cart->Branches->find('list', ['limit' => 200]);
        $products = $this->Cart->Products->find('list', ['limit' => 200]);
        $this->set(compact('cart', 'branches', 'products'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Cart id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cart = $this->Cart->get($id);
        if ($this->Cart->delete($cart)) {
            $this->Flash->success(__('The cart has been deleted.'));
        } else {
            $this->Flash->error(__('The cart could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function dashboard()
    {
        $this->loadModel('Orders');
        $orders = $this->Orders->find('all', [
            'contain' => ['Cart', 'Users.Branches']
        ]);
        // pr($orders->toArray());exit;

        $this->set(compact('orders'));
    }

    public function changeStatus()
    {
      $this->loadModel('Orders');
      $this->loadModel('Branches');
      $this->loadModel('BranchProducts');
      $orders = $this->Cart->find('all', [
        'conditions' => [
            'order_id' => $this->request->data['order_id']
        ]
      ]);
      $this->Orders->updateAll(
        ['status' => $this->request->data['status']],
        ['id' => $this->request->data['order_id']]
      );
      // pr($orders->toArray());exit;

      $mainBranch = $this->Branches->find('all',[
        'contain' => ['BranchProducts'],
        'conditions' => [
          'is_main' => 1
        ]
      ])->first();

      if ($this->request->data['status'] == 'Received') {
        foreach ($orders as $order) {
            $cart = $this->BranchProducts->find('all', [
                'conditions' => [
                    'branch_id' => $order->branch_id,
                    'product_id' => $order->product_id
                ]
            ])->first();

            if ($cart) {
                $quantity = $cart->quantity + $order->quantity;
                $this->BranchProducts->updateAll(
                    ['quantity' => $quantity],
                    ['id' => $cart->id]
                );
            } else {
                $b_productsTable = TableRegistry::get('BranchProducts');
                $b_products = $b_productsTable->newEntity();
                $b_products->branch_id = $order->branch_id;
                $b_products->product_id = $order->product_id;
                $b_products->quantity = $order->quantity;
                $b_products = $b_productsTable->save($b_products);
            }
            

            $this->Cart->updateAll(
                ['is_pending' => 1],
                ['id' => $order->id]
            );
        }

      }

      $this->Flash->success('Order has been updated');
      $this->redirect($this->referer());
    }
}
