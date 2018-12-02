<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Borrow $borrow
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Borrow'), ['action' => 'edit', $borrow->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Borrow'), ['action' => 'delete', $borrow->id], ['confirm' => __('Are you sure you want to delete # {0}?', $borrow->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Borrow'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Borrow'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Branches'), ['controller' => 'Branches', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Branch'), ['controller' => 'Branches', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="borrow view large-9 medium-8 columns content">
    <h3><?= h($borrow->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $borrow->has('user') ? $this->Html->link($borrow->user->id, ['controller' => 'Users', 'action' => 'view', $borrow->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Branch') ?></th>
            <td><?= $borrow->has('branch') ? $this->Html->link($borrow->branch->name, ['controller' => 'Branches', 'action' => 'view', $borrow->branch->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product') ?></th>
            <td><?= $borrow->has('product') ? $this->Html->link($borrow->product->name, ['controller' => 'Products', 'action' => 'view', $borrow->product->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($borrow->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($borrow->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Qty') ?></th>
            <td><?= $this->Number->format($borrow->qty) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Deleted') ?></th>
            <td><?= $this->Number->format($borrow->is_deleted) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($borrow->created) ?></td>
        </tr>
    </table>
</div>
