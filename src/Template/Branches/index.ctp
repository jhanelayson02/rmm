<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Branch[]|\Cake\Collection\CollectionInterface $branches
 */
?>
<div class="">
<nav class="col-md-offset-3 col-md-6 medium-4 columns" id="actions-sidebar">
    <?= $this->Html->link(__('New Branch'), ['action' => 'add'],['class' => 'btn-success btn']) ?>
</nav>

<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 content">
    <div class="x_panel">
      <div class="x_title">
        <h2> Branches </h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">

        <table id="datatable" class="table table-bordered">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_main') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($branches as $branch): ?>
            <tr>
                <td><?= $this->Number->format($branch->id) ?></td>
                <td><?= h($branch->name) ?></td>
                <td><?= h($branch->description) ?></td>
                <td><?= h($branch->is_main) ?></td>
                <td><?= h($branch->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $branch->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $branch->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $branch->id], ['confirm' => __('Are you sure you want to delete # {0}?', $branch->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

      </div>
    </div>
</div>   
</div>    
