<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BranchProduct[]|\Cake\Collection\CollectionInterface $branchProducts
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
    
        <li><?= $this->Html->link(__('List Branches'), ['controller' => 'Branches', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Branch'), ['controller' => 'Branches', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="branchProducts index large-9 medium-8 columns content">
    <h3><?= __('Branch Products') ?></h3>
    <table id="datatable" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('branch_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('product_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('quantity') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($branchProducts as $branchProduct): ?>
            <tr>
                <td><?= $this->Number->format($branchProduct->id) ?></td>
                <td><?= $branchProduct->has('branch') ? $this->Html->link($branchProduct->branch->name, ['controller' => 'Branches', 'action' => 'view', $branchProduct->branch->id]) : '' ?></td>
                <td><?= $branchProduct->has('product') ? $this->Html->link($branchProduct->product->name, ['controller' => 'Products', 'action' => 'view', $branchProduct->product->id]) : '' ?></td>
                <td><?= $this->Number->format($branchProduct->quantity) ?></td>
                <td><?= h($branchProduct->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $branchProduct->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $branchProduct->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $branchProduct->id], ['confirm' => __('Are you sure you want to delete # {0}?', $branchProduct->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
