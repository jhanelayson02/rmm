<?php $auth = $this->request->session()->read('Auth.User');?>
    
<div class="col-md-10 col-sm-6 col-xs-12 col-md-offset-1 content">
    <div class="x_panel">
      <div class="x_title">
        <h2> Support </h2>
         <div class="clearfix"></div>
      </div>
      <div class="x_content">
          <div class="row">
              <?php if ($auth['is_main'] == 1) { ?>
                <div class="col-md-4">
                    <?= $this->Html->link('Products', 
                    ['controller' => 'Products', 'action' => 'archive'],
                    ['class' => 'btn btn-info col-md-12']
                    ); ?>
                </div>
                <div class="col-md-4">
                    <?= $this->Html->link('Branches', 
                    ['controller' => 'Branches', 'action' => 'archive'],
                    ['class' => 'btn btn-info col-md-12']
                    ); ?>
                </div>
                <div class="col-md-4">
                    <?= $this->Html->link('Accounts', 
                    ['controller' => 'Users', 'action' => 'archive'],
                    ['class' => 'btn btn-info col-md-12']
                    ); ?>
                </div>

                <?php } elseif ($auth['is_main'] == 0) { ?>
                    <div class="col-md-6">
                        <?= $this->Html->link('Products', 
                        ['controller' => 'Products', 'action' => 'archive'],
                        ['class' => 'btn btn-default col-md-12']
                        ); ?>
                    </div>
                    <div class="col-md-6">
                        <?= $this->Html->link('Accounts', 
                        ['controller' => 'Users', 'action' => 'archive'],
                        ['class' => 'btn btn-info col-md-12']
                        ); ?>
                    </div>
                <?php } ?>  

                <div class="col-md-4 col-md-offset-2">
                    <?= $this->Html->link('Support', 
                    ['controller' => 'Tickets', 'action' => 'archive'],
                    ['class' => 'btn btn-default col-md-12']
                    ); ?>
                </div>
                <div class="col-md-4">
                    <?= $this->Html->link('Borrowing', 
                    ['controller' => 'Borrow', 'action' => 'archive'],
                    ['class' => 'btn btn-info col-md-12']
                    ); ?>
                </div> 

          </div>
      </div>
    </div>

    <div class="x_panel">
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
                        <?= $this->Form->postLink(__('<i class="fa fa-archive"></i> Restore'), ['action' => 'delete', $ticket->id, '?' => ['type' => 'restore']], ['confirm' => __('Are you sure you want to restore '. $ticket->name .'?'), 'class' => 'text-success', 'escape' => false]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

      </div>
    </div>
</div>
