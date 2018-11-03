<?php $auth = $this->request->session()->read('Auth.User');?>
    
<div class="col-md-10 col-sm-6 col-xs-12 col-md-offset-1 content">
    <div class="x_panel">
      <div class="x_title">
        <h2> Products </h2>
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
                    ['class' => 'btn btn-default col-md-12']
                    ); ?>
                </div>
              <?php } elseif ($auth['is_main'] == 0) { ?>
                <div class="col-md-6">
                  <?= $this->Html->link('Products', 
                  ['controller' => 'Products', 'action' => 'archive'],
                  ['class' => 'btn btn-info col-md-12']
                  ); ?>
                </div>
                <div class="col-md-6">
                    <?= $this->Html->link('Accounts', 
                    ['controller' => 'Users', 'action' => 'archive'],
                    ['class' => 'btn btn-default col-md-12']
                    ); ?>
                </div>
              <?php } ?>  
          </div>
      </div>
    </div>

    <div class="x_panel">
      <div class="x_content">
        <table id="datatable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Username</th>
                    <th scope="col">Role</th>
                    <th scope="col">Branch</th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= h($user->first_name) ?></td>
                    <td><?= h($user->last_name) ?></td>
                    <td><?= h($user->username) ?></td>
                    <td><?= h($user->role) ?></td>
                    <td><?= h($user->branch->name) ?></td>
                    <td class="actions">
                        <?= $this->Form->postLink(__('<i class="fa fa-window-restore"></i> Restore'), ['action' => 'delete', $user->id, '?' => ['type' => 'restore']], ['confirm' => __('Are you sure you want to archive '. $user->last_name .'?'), 'class' => 'text-danger', 'escape' => false]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

      </div>
    </div>
</div>
