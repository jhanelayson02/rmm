<?php
namespace App\Controller;

use Cake\Network\Http\Client;
use Cake\Core\Configure;
use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * BuzzMessage Controller
 *
 * @property \App\Model\Table\BuzzMessageTable $BuzzMessage
 */
class BuzzMessageController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {

        $this->loadModel('Buildings');
        $this->loadModel('Staffs');
        $this->loadModel('BuzzMessages');
        $usernames = null;
        $allUsernames = null;
        $staff_ids = null;
        $buzzTable = TableRegistry::get('BuzzMessages');

        $message = $this->BuzzMessages->newEntity();

        $messages = $this->BuzzMessages->find('all');

        $buildings = $this->Buildings->find('all', [
          'contain' => ['Maps.Plots.Staffs', 'Workstations']
        ])->toArray();

        foreach ($buildings as $building ) {
          $listBuildings[$building['name']] = $building['name'];

          foreach ($building['workstations'] as $workstation) {
            $suites[$building['name']][$workstation['space']] = 'Suite';
          }

          foreach ($building['maps'] as $map) {
            if($map['phase_name'] != '0') {
              $listPhases[$building['name'] . ' - ' . $map['level_name'] . ' - ' . $map['phase_name']] = $building['name'] . ' - ' . $map['level_name'] . ' - ' . $map['phase_name'];
              $listLevels[$building['name']. ' - ' . $map['level_name']] = $building['name'] . ' - ' . $map['level_name'];
            }
          }

        }
        // pr($messages->toArray());exit;

        if($this->request->is('post')) {
            $http = new Client();
            $auth = $this->request->session()->read('Auth.User');
            $this->request->data['user_id'] = $auth['id'];

            if($this->request->data['category'] == 'building') {

                $staffs = $this->Staffs->find('all',[
                  'contain' => ['Plots.Maps.Buildings'],
                  'conditions' => ['Buildings.name' => $this->request->data['building']]
                ])->toArray();

                foreach($staffs as $staff) {
                    $emailParts = explode('@', $staff['email']);
                    $allUsernames = $usernames . ',' . $emailParts[0];
                    $user_ids[$staff['cib_id']] = $emailParts[0];
                    $staff_ids .= ',' . $staff['cib_id'];

                    $history = $buzzTable->newEntity();
                    $history->category = 'history';
                    $history->message = $this->request->data['message'];
                    $history->staff_id = $staff['id'];
                    $history->user_id = $auth['id'];
                    $buzzTable->save($history);
                }

                $response = $http->post(Configure::read('App.cibApiUrl')."/apiv1/timesheets/userLatestLog", [
                    'user_id' => $staff_ids
                  ],[
                    'headers' => ['Authorization' => $this->getToken()]
                  ])->body('json_decode');

                if($this->request->data['status'] == 'All') {
                    $usernames = $allUsernames;
                } elseif($this->request->data['status'] == 'In') {
                  if(isset($user_ids)) {
                    foreach ($user_ids as $key => $user) {
                        foreach ($response->data as $logs) {
                          if(($key == $logs->user_id) && ($logs->last_log_type == 'In' || $logs->last_log_type == 'BackFromLunch')) {
                              $usernames .= ',' . $user;
                          }
                        }
                    }
                  }
                } else {
                  if(isset($user_ids)) {
                    foreach ($user_ids as $key => $user) {
                        foreach ($response->data as $logs) {
                          if(($key == $logs->user_id) && ($logs->last_log_type == $this->request->data['status'])) {
                              $usernames .= ',' . $user;
                          }
                        }
                    }
                  }
                }
            } elseif($this->request->data['category'] == 'level') {

                $levelParts = explode(' - ', $this->request->data['level']);
                $staffs = $this->Staffs->find('all',[
                  'contain' => ['Plots.Maps.Buildings'],
                  'conditions' => [
                    'Maps.level_name' => $levelParts[1],
                    'Buildings.name' => $levelParts[0]
                  ]
                ])->toArray();

                $this->request->data['level'] = $levelParts[1];
                $this->request->data['building'] = $levelParts[0];

                foreach($staffs as $staff) {
                    $emailParts = explode('@', $staff['email']);
                    $allUsernames = $usernames . ',' . $emailParts[0];
                    $user_ids[$staff['cib_id']] = $emailParts[0];
                    $staff_ids .= ',' . $staff['cib_id'];

                    $history = $buzzTable->newEntity();
                    $history->category = 'history';
                    $history->message = $this->request->data['message'];
                    $history->staff_id = $staff['id'];
                    $history->user_id = $auth['id'];
                    $buzzTable->save($history);
                }

                $response = $http->post(Configure::read('App.cibApiUrl')."/apiv1/timesheets/userLatestLog", [
                    'user_id' => $staff_ids
                  ],[
                    'headers' => ['Authorization' => $this->getToken()]
                  ])->body('json_decode');

                if($this->request->data['status'] == 'All') {
                    $usernames = $allUsernames;
                } elseif($this->request->data['status'] == 'In') {
                  if(isset($user_ids)) {
                    foreach ($user_ids as $key => $user) {
                        foreach ($response->data as $logs) {
                          if(($key == $logs->user_id) && ($logs->last_log_type == 'In' || $logs->last_log_type == 'BackFromLunch')) {
                              $usernames .= ',' . $user;
                          }
                        }
                    }
                  }
                } else {
                  if(isset($user_ids)) {
                    foreach ($user_ids as $key => $user) {
                        foreach ($response->data as $logs) {
                          if(($key == $logs->user_id) && ($logs->last_log_type == $this->request->data['status'])) {
                              $usernames .= ',' . $user;
                          }
                        }
                    }
                  }
                }
            } elseif($this->request->data['category'] == 'phase') {

                $phaseParts = explode(' - ', $this->request->data['phase']);
                $staffs = $this->Staffs->find('all',[
                  'contain' => ['Plots.Maps.Buildings'],
                  'conditions' => [
                    'Maps.phase_name' => $phaseParts[2],
                    'Buildings.name' => $phaseParts[0],
                    'Maps.level_name' => $phaseParts[1]
                  ]
                ])->toArray();

                foreach($staffs as $staff) {
                    $emailParts = explode('@', $staff['email']);
                    $allUsernames = $usernames . ',' . $emailParts[0];
                    $user_ids[$staff['cib_id']] = $emailParts[0];
                    $staff_ids .= ',' . $staff['cib_id'];

                    $history = $buzzTable->newEntity();
                    $history->category = 'history';
                    $history->message = $this->request->data['message'];
                    $history->staff_id = $staff['id'];
                    $history->user_id = $auth['id'];
                    $buzzTable->save($history);
                }

                $response = $http->post(Configure::read('App.cibApiUrl')."/apiv1/timesheets/userLatestLog", [
                    'user_id' => $staff_ids
                  ],[
                    'headers' => ['Authorization' => $this->getToken()]
                  ])->body('json_decode');

                if($this->request->data['status'] == 'All') {
                    $usernames = $allUsernames;
                } elseif($this->request->data['status'] == 'In') {
                  if(isset($user_ids)) {
                    foreach ($user_ids as $key => $user) {
                        foreach ($response->data as $logs) {
                          if(($key == $logs->user_id) && ($logs->last_log_type == 'In' || $logs->last_log_type == 'BackFromLunch')) {
                              $usernames .= ',' . $user;
                          }
                        }
                    }
                  }
                } else {
                  if(isset($user_ids)) {
                    foreach ($user_ids as $key => $user) {
                        foreach ($response->data as $logs) {
                          if(($key == $logs->user_id) && ($logs->last_log_type == $this->request->data['status'])) {
                              $usernames .= ',' . $user;
                          }
                        }
                    }
                  }
                }
            } elseif($this->request->data['category'] == 'solo') {

                $emailParts = explode('@', $this->request->data['username']);
                $usernames = $emailParts[0];
                $staffMatch = $this->Staffs->find('all',[
                  'conditions' => [
                    'cib_id' => $this->request->data['emp_id']
                  ]
                ])->first();
                if($staffMatch) {
                  $this->request->data['staff_id'] = $staffMatch->id;
                }

            } elseif($this->request->data['category'] == 'cus') {

              $staffSearch = $http->post(Configure::read('App.cibApiUrl')."/apiv1/clients/getUsersPerClient", [
                  'client_id' => $this->request->data['cus_id'],
                  'status' => ['bench','engage']
                ],[
                  'headers' => ['Authorization' => $this->getToken()]
                ])->body('json_decode');

              foreach ($staffSearch->data as $staff) {
                 $emailParts = explode('@', $staff->email);
                 $usernames .= ',' . $emailParts[0];
              }
              // echo $usernames;exit;

            } elseif($this->request->data['category'] == 'space') {
                $this->loadModel('Workstations');
                $workstations = $this->Workstations->find('all',[
                  'contain' => ['Plots.Staffs', 'Buildings'],
                  'conditions' => [
                    'Workstations.space' => $this->request->data['space'],
                    'Buildings.name' => $this->request->data['building'],
                  ]
                ])->toArray();

                foreach ($workstations as $workstation ) {
                  foreach($workstation['plot']['staffs'] as $staff) {
                      $emailParts = explode('@', $staff['email']);
                      $usernames = $usernames . ',' . $emailParts[0];
                      $user_ids[$staff['cib_id']] = $emailParts[0];
                      $staff_ids .= ',' . $staff['cib_id'];

                      $history = $buzzTable->newEntity();
                      $history->category = 'history';
                      $history->message = $this->request->data['message'];
                      $history->staff_id = $staff['id'];
                      $history->user_id = $auth['id'];
                      $buzzTable->save($history);
                  }
                }

            } else {

                $staffs = $this->Staffs->find('all')->toArray();

                foreach($staffs as $staff) {
                    $emailParts = explode('@', $staff['email']);
                    $usernames = $usernames . ',' . $emailParts[0];
                    $user_ids[$staff['cib_id']] = $emailParts[0];
                    $staff_ids .= ',' . $staff['cib_id'];

                    $history = $buzzTable->newEntity();
                    $history->category = 'history';
                    $history->message = $this->request->data['message'];
                    $history->staff_id = $staff['id'];
                    $history->user_id = $auth['id'];
                    $buzzTable->save($history);
                }
            }

            $buzzMessage = $http->post("https://buzz.cloudstaff.com/apis/sendsms", [
                'to' => $usernames,
                'msg' => $this->request->data['message'],
                'token' => '15b741a1e3ef3a7f243aab636cd4dff0'
              ])->body('json_decode');

            $message = $this->BuzzMessages->patchEntity($message, $this->request->data);

            if($buzzMessage->results->status == 'success') {
                $this->Flash->success('Message has been sent.');
                $this->BuzzMessages->save($message);
                $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('Sending failed. Please try again.');
                $this->redirect(['action' => 'index']);
            }
        }

        $this->set(compact(['listBuildings', 'listPhases', 'listLevels', 'suites', 'message', 'messages']));
    }

}
