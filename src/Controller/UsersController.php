<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    public function beforeFilter(Event $event)
    {
        // allow only login, forgotpassword
         $this->Auth->allow(['login', 'forgot', 'newpass']);
    }

    public function login()
    {
        $auditTable = TableRegistry::get('Audit');
        $this->viewBuilder()->setLayout('');
        if($this->request->is('post')){
            $user = $this->Auth->identify();

            if($user){

                if ($user['is_deleted'] == 1) {
                    $this->Flash->error(__('Your account has been archived! Please contact your admin.'));
                    return $this->redirect($this->Auth->logout());
                }

                $userLoggedIn = $this->Users->get($user['id'], [
                    'contain' => ['Branches']
                ]);
                // pr($userLoggedIn);exit;
                $user['is_main'] = $userLoggedIn['branch']['is_main'];
                $user['branch_name'] = $userLoggedIn['branch']['name'];
                $user['image'] = $userLoggedIn['branch']['image'];

                $this->Auth->setUser($user);
                $audit = $auditTable->newEntity();
                $audit->user_id = $user['id'];
                $audit->type = 'Log-in';
                $auditTable->save($audit);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Invalid username or password, try again.'));
        }
    }

    public function forgot()
    {
        $this->viewBuilder()->setLayout('');
        if ($this->request->is('post')) {
          $userMatch = $this->Users->find('all', [
            'conditions' => [
              'email' => $this->request->data['email']
            ]
          ])->first();
          // pr($userMatch);
          if (!isset($userMatch)) {

              $this->Flash->error('No record found! Please provide registered email.');
              return;
          }

          require_once(__DIR__.'/../../webroot/PHPmailer/class.phpmailer.php');
          $mail = new \PHPMailer();

          $mail->IsSMTP();
          $mail->SMTPAuth = true;
          $mail->SMTPSecure = "tls";
          $mail->Host = "smtp.gmail.com";
          $mail->Port = 587;
          $mail->Username = 'rmmmeatshop@gmail.com';
          $mail->Password = "rmmmeatshop2018";
          $mail->isHTML(true);
          $mail->From = "noreply@rmmmeatshop.com";
          $mail->FromName = "RMM Meatshop";
          $mail->Subject = "Change Password Request";
          $mail->AddAddress($this->request->data['email']);

          $mail->Body = "Hi $userMatch->first_name $userMatch->last_name,<br><br>You are receiving this email because we received a password reset request for your account.<br><br> You can reset your password by clicking the button below.<br> <a href='http://localhost/rmm/users/newpass/". str_replace('/','^',$userMatch->password) ."'><button>Reset Password</button></a><br>If you did not request a password reset, no further action is required<br><br>Thank you!<br><br>Regards,";
          if($mail->send()) {
            $this->Flash->success('Verification email was sent to you!');
          }

        }
    }

    public function newpass($pass)
    {
        $this->viewBuilder()->setLayout('');
        $userMatch = $this->Users->find('all', [
          'conditions' => [
            'password' => str_replace('^','/',$pass)
          ]
        ])->first();
        if (!isset($userMatch)) {

            $this->Flash->error('Please enter your email');
            $this->redirect(['action' => 'forgot']);
            return;
        }
        if ($this->request->is(['patch', 'post', 'put'])) {
          if ($this->request->data['password'] != $this->request->data['password2']) {
            $this->Flash->error('Password did not matched.');
            return;
          }
          $user = $this->Users->patchEntity($userMatch, $this->request->getData());
          if ($this->Users->save($user)) {
            $this->Flash->success('Password successfully updated!');
            $this->redirect(['action' => 'login']);
          }
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
            $password = $this->request->data['password'];
            $username = $this->request->data['username'];
            if( (!preg_match( '#[0-9]+#', $password) || !preg_match( '#[a-z]+#', $password) || !preg_match( '#[A-Z]+#', $password)) || (!preg_match( '#[0-9]+#', $username) || !preg_match( '#[a-z]+#', $username) || !preg_match( '#[A-Z]+#', $username)))
            {
                $this->Flash->error(__('The username and password must contain at least one lowercase letter, at least one uppercase letter and a number!'));
            } else {
                $user = $this->Users->patchEntity($user, $this->request->getData());
                if ($this->Users->save($user)) {
                    $this->Flash->success(__('The user has been saved.'));

                    $auditTable = TableRegistry::get('Audit');
                    $audit = $auditTable->newEntity();
                    $audit->user_id = $auth['id'];
                    $audit->type = 'Created an Account';
                    $auditTable->save($audit);

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
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
            $username = $this->request->data['username'];
            if((!preg_match( '#[0-9]+#', $username) || !preg_match( '#[a-z]+#', $username) || !preg_match( '#[A-Z]+#', $username)))
            {
                $this->Flash->error(__('Username must contain at least one lowercase letter, at least one uppercase letter and a number!'));
            } else {
                $user = $this->Users->patchEntity($user, $this->request->getData());
                if ($this->Users->save($user)) {
                    $this->Flash->success(__('The user has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
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
