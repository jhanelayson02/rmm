<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Branch[]|\Cake\Collection\CollectionInterface $branches
 */
?>
<div class="">
<nav class="col-md-offset-2 col-md-6 medium-4 columns" id="actions-sidebar">
    <?= $this->Html->link(__('New Branch'), ['action' => 'add'],['class' => 'btn-success btn']) ?>
</nav>

<div class="col-md-8 col-sm-6 col-xs-12 col-md-offset-2 content">
    <div class="x_panel">
      <div class="x_title">
        <h2> Branches </h2>
        <div class="clearfix"></div>
      </div>
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
                        <?= $this->Html->link(__('<i class="fa fa-edit"></i> Edit'), ['action' => 'edit', $branch->id], ['class' => 'text-success', 'escape' => false]) ?> &nbsp;|&nbsp;
                        <?= $this->Form->postLink(__('<i class="fa fa-archive"></i> Archive'), ['action' => 'delete', $branch->id, '?' => ['type' => 'archive']], ['confirm' => __('Are you sure you want to archive '. $branch->name .'?'), 'class' => 'text-danger', 'escape' => false]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

      </div>
    </div>
</div>   
</div>    
