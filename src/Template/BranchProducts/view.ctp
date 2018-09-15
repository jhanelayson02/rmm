<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BranchProduct $branchProduct
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Branch Product'), ['action' => 'edit', $branchProduct->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Branch Product'), ['action' => 'delete', $branchProduct->id], ['confirm' => __('Are you sure you want to delete # {0}?', $branchProduct->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Branch Products'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Branch Product'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Branches'), ['controller' => 'Branches', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Branch'), ['controller' => 'Branches', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="branchProducts view large-9 medium-8 columns content">
    <h3><?= h($branchProduct->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Branch') ?></th>
            <td><?= $branchProduct->has('branch') ? $this->Html->link($branchProduct->branch->name, ['controller' => 'Branches', 'action' => 'view', $branchProduct->branch->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product') ?></th>
            <td><?= $branchProduct->has('product') ? $this->Html->link($branchProduct->product->name, ['controller' => 'Products', 'action' => 'view', $branchProduct->product->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($branchProduct->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quantity') ?></th>
            <td><?= $this->Number->format($branchProduct->quantity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($branchProduct->created) ?></td>
        </tr>
    </table>
</div>
