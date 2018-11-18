<?php $auth = $this->request->session()->read('Auth.User'); ?>
<div class="">
  <div class="col-md-12">
    <div class="x_panel">
      <div class="x_title">
        <div class="row">
            <div class="col-md-6">
                <h3><?= __('Ticketing') ?></h3>
            </div>
            <div class="col-md-6">
                <button type="button" class="btn btn-info pull-right" id="validate" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-ticket"></i> New Ticket</button>
            </div>
        </div>
      </div>
      <div class="x_content">
        <table id="datatable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('tracker') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('subject') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('priority') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('Filed By') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('Assigned To') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
				<?php foreach($tickets as $ticket) : //pr($auth); exit; ?>
                <tr>
                    <td><?= h($ticket->type) . ' #' . $this->Number->format($ticket->id) ?></td>
                    <td><?= h($ticket->subject) ?></td>
                    <td><?= h($ticket->priority) ?></td>
                    <td><?= h($ticket->status) ?></td>
                    <td><?= $ticket->user->first_name.' '. $ticket->user->last_name . ' (' . $ticket->user->branch->name . ')' ?></td>
                    <td><?= $ticket->branch->name ?></td>
                    <td><?= h($ticket->created) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('<i class="fa fa-search"></i> View'), ['action' => 'view', $ticket->id] , ['class' => 'text-primary', 'escape' => false]) ?> &nbsp;|&nbsp;
                        <?= $this->Html->link(__('<i class="fa fa-edit"></i> Edit'), ['action' => 'edit', $ticket->id], ['class' => 'text-success', 'escape' => false]) ?> &nbsp;|&nbsp;
                        <?= $this->Form->postLink(__('<i class="fa fa-archive"></i> Archive'), ['action' => 'delete', $ticket->id, '?' => ['type' => 'archive']], ['confirm' => __('Are you sure you want to archive '. $ticket->name .'?'), 'class' => 'text-danger', 'escape' => false]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- Modal -->
        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                </button>
                <h4 class="modal-title" id="myModalLabel2">Add Ticket</h4>
                </div>
                <div class="modal-body">
                    <div class="users content">
                        <?= $this->Form->create('', ['url' => ['action' => 'add']]) ?>
                            <?php
                            echo $this->Form->hidden('user_id', ['value' => $auth['id']]);
                            echo $this->Form->input('type',[
                                'options' => [
                                    'Request' => 'Request',
                                    'Incident' => 'Incident',
                                    'Problem' => 'Problem',
                                ],
                                'class' => 'form-control',
                                'required' => true
                            ]);
                            
                            echo $this->Form->input('subject', [
                                'class' => 'form-control',
                                'required' => true
                            ]);
                            
                            echo $this->Form->input('description', [
                                'class' => 'form-control',
                                'type' => 'textarea',
                                'required' => true
                            ]);

                            echo $this->Form->input('priority',[
                                'options' => [
                                    'Normal' => 'Normal',
                                    'Low' => 'Low',
                                    'High' => 'High',
                                    'Urgent' => 'Urgent',
                                    'Immediate' => 'Immediate',
                                ],
                                'class' => 'form-control',
                                'required' => true
                            ]);

                            echo $this->Form->input('status',[
                                'options' => [
                                    'Backlog' => 'Backlog',
                                    'On-Queue' => 'On-Queue',
                                    'In-Progress' => 'In-Progress',
                                    'Resolved' => 'Resolved',
                                ],
                                'class' => 'form-control',
                                'required' => true
                            ]);

                            echo $this->Form->input('branch_id', [
                                'options' => $branches,
                                'class' => 'form-control',
                                'label' => 'Assigned to'
                            ]);
                            
                        ?>
                    </div>
                </div>
                <div class="modal-footer">
                <?php
                    echo $this->Form->button(__('Submit'), ['class' => 'btn btn-raised btn-info', 'id' => 'submitButtonId']);
                    echo $this->Form->end();
                ?>
                </div>

            </div>
            </div>
        </div>
        <!-- End Modal -->

      </div>
    </div>
  </div>
</div>
