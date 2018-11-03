<?php $auth = $this->request->session()->read('Auth.User');?>
    
<div class="col-md-10 col-sm-6 col-xs-12 col-md-offset-1 content">
    <div class="x_panel">
      <div class="x_title">
        <h2> Products </h2>
         <div class="clearfix"></div>
      </div>
      <div class="x_content">
          <div class="row">
            <div class="col-md-4">
                <?= $this->Html->link('Products', 
                ['controller' => 'Products', 'action' => 'archive'],
                ['class' => 'btn btn-info col-md-12']
                ); ?>
            </div>
            <div class="col-md-4">
                <?= $this->Html->link('Branches', 
                ['controller' => 'Branches', 'action' => 'archive'],
                ['class' => 'btn btn-default col-md-12']
                ); ?>
            </div>
            <div class="col-md-4">
                <?= $this->Html->link('Accounts', 
                ['controller' => 'Users', 'action' => 'archive'],
                ['class' => 'btn btn-info col-md-12']
                ); ?>
            </div>
          </div>
      </div>
    </div>

    <div class="x_panel">
      <div class="x_content">
        <table id="datatable" class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($branches as $branch): ?>
                <tr>
                    <td><?= h($branch->name) ?></td>
                    <td><?= h($branch->description) ?></td>
                    <td class="actions">
                        <?= $this->Form->postLink(__('<i class="fa fa-window-restore"></i> Restore'), ['action' => 'delete', $branch->id, '?' => ['type' => 'restore']], ['confirm' => __('Are you sure you want to archive '. $branch->name .'?'), 'class' => 'text-danger', 'escape' => false]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
      </div>
    </div>
</div>
