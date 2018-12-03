<?php
namespace App\Controller;

use App\Controller\AppController;
use DatabaseBackup\Utility\BackupExport;

/**
 * Products Controller
 *
 * @property \App\Model\Table\ProductsTable $Products
 *
 * @method \App\Model\Entity\Product[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $products = $this->Products->find('all', [
            'conditions' => [
                'NOT' => ['is_deleted' => 1]
            ]
        ]);
        // pr($products->toArray());
        $this->set(compact('products'));
    }

    /**
     * View method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => ['BranchProducts']
        ]);

        $this->set('product', $product);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {

        $product = $this->Products->newEntity();
        if ($this->request->is('post')) {
            $target_dir = "img/products/";
            $target_file = $target_dir . basename($_FILES["image"]["name"]);
            move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
            $this->request->data['image'] = basename($_FILES["image"]["name"]);
            // pr($this->request->data);exit;
            $product = $this->Products->patchEntity($product, $this->request->data);
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $this->set(compact('product'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $product = $this->Products->patchEntity($product, $this->request->getData());
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $this->set(compact('product'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        if ($this->request->query['type'] == 'archive') {
            $this->Products->updateAll(
                ['is_deleted' => 1],
                ['id' => $id]
            );
            $this->Flash->success('The product has been archived!');
        } else {
            $this->Products->updateAll(
                ['is_deleted' => 0],
                ['id' => $id]
            );
            $this->Flash->success('The product has been restored!');
        }

        return $this->redirect($this->referer());
    }

    public function backup()
    {
        if ($this->request->is('post')) {
            // pr($this->request->data);exit;
            $db = new \mysqli('localhost', 'root', '', 'rmm');
            if (isset($this->request->data['backup'])) {
                $dump = new \MySQLDump($db);
                $fname = 'dbase' . DS . 'rmm_'. date("m_d_y_h_s_i") .'.sql';
                $dump->save($fname);

                $filePath = WWW_ROOT . $fname;
                // echo $filePath;exit;
                $this->response->file($filePath ,
                    array('download'=> true));

                return $this->response;
            } elseif (isset($this->request->data['restore'])) {
                $fileParts = explode('.', basename($_FILES["file"]["name"]));
                if (strtolower($fileParts[1]) == 'sql') {
                    $import = new \MySQLImport($db);

                    $target_dir = "dbase/";
                    $target_file = $target_dir . basename($_FILES["file"]["name"]);
                    move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
                    $this->request->data['file'] = basename($_FILES["file"]["name"]);

                    $import->load('dbase/' . $this->request->data['file']);
                    $this->Flash->success('Database has been restored.');
                } else {
                    $this->Flash->error('Please upload sql format only.');
                }

            }

        }

    }

    public function archive()
    {
        $products = $this->Products->find('all', [
            'conditions' => [
                'is_deleted' => 1
            ]
        ]);

        $this->set(compact('products'));
    }
}
