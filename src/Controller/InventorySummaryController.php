<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * InventorySummary Controller
 *
 * @property \App\Model\Table\InventorySummaryTable $InventorySummary
 *
 * @method \App\Model\Entity\InventorySummary[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class InventorySummaryController extends AppController
{
    public function add()
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

        if ($this->request->is('post')) {
            // pr($this->request->data);exit;
            $inventoryTable = TableRegistry::get('InventorySummary');
            $totalCount = count($this->request->data['product_id']);
            for ($x = 0; $x < $totalCount; $x++) {
                $actual_quantity = $this->request->data['actual_quantity'][$x] != null ? $this->request->data['actual_quantity'][$x] : 0;
                $quantity =$this->request->data['quantity'][$x];

                $matchInv = $this->InventorySummary->find('all', [
                    'conditions' => [
                        'branch_id' => $this->request->data['branch_id'],
                        'product_id' => $this->request->data['product_id'][$x],
                        'created' => date('Y-m-d')
                    ]
                ])->first();

                if (!$matchInv) {
                    $inventory = $inventoryTable->newEntity();
                    $inventory->branch_id = $this->request->data['branch_id'];
                    $inventory->product_id = $this->request->data['product_id'][$x];
                    $inventory->actual_quantity = $actual_quantity;
                    $inventory->quantity = $quantity;
                    $inventory->variance = $actual_quantity - $quantity;
                    $inventory->created = date('Y-m-d');
                    
                    $inventoryTable->save($inventory);
                } else {
                    $this->InventorySummary->updateAll(
                        [
                            'actual_quantity' => $actual_quantity,
                            'quantity' => $quantity,
                            'variance' => $actual_quantity - $quantity
                        ],
                        [
                            'branch_id' => $this->request->data['branch_id'],
                            'product_id' => $this->request->data['product_id'][$x],
                            'created' => date('Y-m-d')
                        ]
                    );
                }
    
            }
            $this->Flash->success('Inventory successfully saved!');
            return $this->redirect(['action' => 'summary']);
        }

        $this->set(compact('inventorySummary', 'branches', 'products'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Inventory Summary id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $inventorySummary = $this->InventorySummary->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $inventorySummary = $this->InventorySummary->patchEntity($inventorySummary, $this->request->getData());
            if ($this->InventorySummary->save($inventorySummary)) {
                $this->Flash->success(__('The inventory summary has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The inventory summary could not be saved. Please, try again.'));
        }
        $branches = $this->InventorySummary->Branches->find('list', ['limit' => 200]);
        $products = $this->InventorySummary->Products->find('list', ['limit' => 200]);
        $this->set(compact('inventorySummary', 'branches', 'products'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Inventory Summary id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $inventorySummary = $this->InventorySummary->get($id);
        if ($this->InventorySummary->delete($inventorySummary)) {
            $this->Flash->success(__('The inventory summary has been deleted.'));
        } else {
            $this->Flash->error(__('The inventory summary could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function summary()
    {
        $auth = $this->request->session()->read('Auth.User');
        
        $inventories = $this->InventorySummary->find('all', [
            'conditions' => [
                'branch_id' => $auth['branch_id']
            ],
            'contain' => ['Products'],
            'order' => 'InventorySummary.created DESC'
        ]);

        foreach ($inventories as $inventory) {
              $inventorySummary[date('m-d-Y', strtotime($inventory->created))][] = $inventory;
          }

        // pr($inventorySummary);

        $this->set(compact('inventorySummary'));
    }
}
