<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
<nav class="col-md-6 medium-4 columns" id="actions-sidebar">
     <?= $this->Html->link(__('New User'), ['action' => 'add'],['class' => 'btn-success btn']) ?>
    
</nav>
<div class="">
  <div class="col-md-12">
    <div class="x_panel">
      <div class="x_title">
        <h3><?= __('Users') ?></h3>
      </div>
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
                        <?= $this->Html->link(__('<i class="fa fa-edit"></i> Edit'), ['action' => 'edit', $user->id], ['class' => 'text-success', 'escape' => false]) ?> &nbsp;|&nbsp;
                        <?= $this->Form->postLink(__('<i class="fa fa-archive"></i> Archive'), ['action' => 'delete', $user->id, '?' => ['type' => 'archive']], ['confirm' => __('Are you sure you want to archive '. $user->last_name .'?'), 'class' => 'text-danger', 'escape' => false]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

