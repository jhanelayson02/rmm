<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 */
?>
<nav class="col-md-6 col-md-offset-3 col-sm-6 col-xs-12" id="actions-sidebar">
    
        <?= $this->Html->link(__('List Branch Products'), ['action' => 'index'], ['class' => 'btn btn-success']) ?>
        
</nav>
<div class="col-md-6 col-md-offset-3 col-sm-6 col-xs-12">
    <div class="x_panel">
            <div class="x_title">
                <h3><?= h($product->name) ?></h3> 
            </div>
        <div class="x_content">

        <table class="table table-bordered">
            <tr>
                <th scope="row"><?= __('Name') ?></th>
                <td><?= h($product->name) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Description') ?></th>
                <td><?= h($product->description) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Unit') ?></th>
                <td><?= h($product->unit) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Id') ?></th>
                <td><?= $this->Number->format($product->id) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Item Code') ?></th>
                <td><?= $this->Number->format($product->item_code) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Price') ?></th>
                <td><?= $this->Number->format($product->price) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Created') ?></th>
                <td><?= h($product->created) ?></td>
            </tr>
        </table>
            <div class="col-md-6 col-md-offset-3 col-sm-6 col-xs-12">
                
                <?php if (!empty($product->branch_products)): ?>
                <table cellpadding="0" cellspacing="0">
                    <tr>
                        <th scope="col"><?= __('Id') ?></th>
                        <th scope="col"><?= __('Branch Id') ?></th>
                        <th scope="col"><?= __('Product Id') ?></th>
                        <th scope="col"><?= __('Quantity') ?></th>
                        <th scope="col"><?= __('Created') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                    <?php foreach ($product->branch_products as $branchProducts): ?>
                    <tr>
                        <td><?= h($branchProducts->id) ?></td>
                        <td><?= h($branchProducts->branch_id) ?></td>
                        <td><?= h($branchProducts->product_id) ?></td>
                        <td><?= h($branchProducts->quantity) ?></td>
                        <td><?= h($branchProducts->created) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['controller' => 'BranchProducts', 'action' => 'view', $branchProducts->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['controller' => 'BranchProducts', 'action' => 'edit', $branchProducts->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'BranchProducts', 'action' => 'delete', $branchProducts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $branchProducts->id)]) ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>