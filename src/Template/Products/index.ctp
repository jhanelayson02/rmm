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
                        <?= $this->Html->link(__('<i class="fa fa-edit"></i> Edit'), ['action' => 'edit', $product->id], ['class' => 'text-success', 'escape' => false]) ?> &nbsp;|&nbsp;
                        <?= $this->Form->postLink(__('<i class="fa fa-archive"></i> Archive'), ['action' => 'delete', $product->id, '?' => ['type' => 'archive']], ['confirm' => __('Are you sure you want to archive '. $product->name .'?'), 'class' => 'text-danger', 'escape' => false]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

      </div>
    </div>
</div>
