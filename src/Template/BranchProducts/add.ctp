<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BranchProduct $branchProduct
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Branch Products'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Branches'), ['controller' => 'Branches', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Branch'), ['controller' => 'Branches', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="branchProducts form large-9 medium-8 columns content">
    <?= $this->Form->create($branchProduct) ?>
    <fieldset>
        <legend><?= __('Add Branch Product') ?></legend>
        <?php
            echo $this->Form->control('branch_id', ['options' => $branches]);
            echo $this->Form->control('product_id', ['options' => $products]);
            echo $this->Form->control('quantity');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
