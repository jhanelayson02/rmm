<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class TicketsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $auth = $this->request->session()->read('Auth.User');
        $this->loadModel('Branches');

        $branches = $this->Branches->find('list', [
            'conditions' => [
                'NOT' => [
                    'id' => $auth['branch_id']
                ]
            ]
        ]);
        if ($auth['is_main'] == 1) {
            $tickets = $this->Tickets->find('all', [
                'contain' => ['Users.Branches', 'Branches'],
                'conditions' => [
                    'NOT' => [
                        'Tickets.is_deleted' => 1
                    ]
                ]
            ]);
        } else {
            $tickets = $this->Tickets->find('all', [
                'contain' => ['Users.Branches', 'Branches'],
                'conditions' => [
                    'OR' => [
                        'Users.branch_id' => $auth['branch_id'],
                        'Tickets.branch_id' => $auth['branch_id']
                    ],
                    'NOT' => [
                        'Tickets.is_deleted' => 1
                    ]
                ]
            ]);
        }
        
        // pr($auth);

        $this->set(compact('tickets', 'branches'));
    }

    /**
     * View method
     *
     * @param string|null $id Ticket id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->loadModel('TReply');
        $ticket = $this->Tickets->get($id, [
            'contain' => ['Users', 'Branches', 'TReply.Users']
        ]);
        // pr($ticket);

        if ($this->request->is('post')) {
            $replyTable = TableRegistry::get('TReply');
            $reply = $replyTable->newEntity();
            $reply->user_id = $this->request->data['user_id'];
            $reply->ticket_id = $this->request->data['ticket_id'];
            $reply->message = $this->request->data['message'];
            if ($reply = $replyTable->save($reply)) {
                $this->Flash->success(__('Reply has been sent.'));
                return $this->redirect('');
            }
            $this->Flash->error(__('Reply could not be send. Please, try again.'));
        }

        $this->set(compact('ticket', 'reply'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ticket = $this->Tickets->newEntity();
        if ($this->request->is('post')) {
            $ticket = $this->Tickets->patchEntity($ticket, $this->request->getData());
            if ($this->Tickets->save($ticket)) {
                $this->Flash->success(__('The ticket has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ticket could not be saved. Please, try again.'));
            return $this->redirect(['action' => 'index']);
        }
        $users = $this->Tickets->Users->find('list', ['limit' => 200]);
        $branches = $this->Tickets->Branches->find('list', ['limit' => 200]);
        $this->set(compact('ticket', 'users', 'branches'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Ticket id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ticket = $this->Tickets->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ticket = $this->Tickets->patchEntity($ticket, $this->request->getData());
            if ($this->Tickets->save($ticket)) {
                $this->Flash->success(__('The ticket has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ticket could not be saved. Please, try again.'));
        }
        $users = $this->Tickets->Users->find('list', ['limit' => 200]);
        $branches = $this->Tickets->Branches->find('list', ['limit' => 200]);
        $this->set(compact('ticket', 'users', 'branches'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Ticket id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        if ($this->request->query['type'] == 'archive') {
            $this->Tickets->updateAll(
                ['is_deleted' => 1],
                ['id' => $id]
            );
            $this->Flash->success('The ticket has been archived!');
        } else {
            $this->Tickets->updateAll(
                ['is_deleted' => 0],
                ['id' => $id]
            );
            $this->Flash->success('The ticket has been restored!');
        }

        return $this->redirect($this->referer());
    }

    public function archive()
    {
        $auth = $this->request->session()->read('Auth.User');
        
        if ($auth['is_main'] == 1) {
            $tickets = $this->Tickets->find('all', [
                'contain' => ['Users.Branches', 'Branches'],
                'conditions' => [
                    'Tickets.is_deleted' => 1
                ]
            ]);
        } else {
            $tickets = $this->Tickets->find('all', [
                'contain' => ['Users.Branches', 'Branches'],
                'conditions' => [
                    'OR' => [
                        'Users.branch_id' => $auth['branch_id'],
                        'Tickets.branch_id' => $auth['branch_id']
                    ],
                    'Tickets.is_deleted' => 1
                ]
            ]);
        }
        
        // pr($auth);

        $this->set(compact('tickets', 'branches'));
    }
}
