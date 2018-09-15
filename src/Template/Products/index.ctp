<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product[]|\Cake\Collection\CollectionInterface $products
 */
?>
    
<div class="col-md-10 col-sm-6 col-xs-12 col-md-offset-1 content">
    <div class="x_panel">
      <div class="x_title">
        <h2> Products </h2>
        <?= $this->Html->link(__('New Product'), ['action' => 'add'],['class' => 'btn-success btn pull-right']) ?>

        <div class="clearfix"></div>
      </div>
      <div class="x_content">
         <table id="datatable" class="table table-bordered">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('item_code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('price') ?></th>
                <th scope="col"><?= $this->Paginator->sort('unit') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
            <tr>
                <td><?= $product->item_code ?></td>
                <td><?= h($product->name) ?></td>
                <td><?= h($product->description) ?></td>
                <td><?= $this->Number->format($product->price) ?></td>
                <td><?= h($product->unit) ?></td>
                <td><?= h($product->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $product->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $product->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete # {0}?', $product->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

      </div>
    </div>
</div>
