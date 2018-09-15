<?php $auth = $this->request->session()->read('Auth.User'); ?>
<div class="col-md-8 col-md-offset-2 content">
    <div class="x_panel">
      <div class="x_title">
        <div  class="row">
            <div class="col-md-4">
                <p><h2> Orders (<?= $order['status'] ?>) </h2></p><br><br>
                <p>Ordered by: <?= $order['user']['first_name'] . ' ' . $order['user']['last_name'] ?></p>
                <p>Date: <?= $order['created'] ?></p>
            </div>
            <?php 
                if ($auth['is_main'] == 1) {
                    $options = [
                        'Backlog' => 'Backlog',
                        'In-Progress' => 'In-Progress',
                        'Delivered' => 'Delivered',
                        'Received' => 'Received',
                    ];
                } else {
                    $options = $order['status'] == "Delivered" ? ['Received' => 'Received'] : false;
                }
            ?>

            <div class="col-md-8">
                <?= $this->Form->create('', ['url' => ['action' => 'changeStatus']]) ?>
                <?= $this->Html->link('Edit', ['action' => 'edit', $order['id']], ['class' => 'btn btn-warning pull-right']) ?>
                <?php if ($options) :?>
                    <?= $this->Form->button('Submit', ['class' => 'btn btn-success col-md-3 pull-right']) ?>
                    <?= $this->Form->hidden('order_id', ['value' => $order['id']]); ?>
                    <?= $this->Form->input('status', [
                        'options' => $options,
                        'class' => 'form-control col-md-9 pull-right',
                        'empty' => 'Change Status...',
                        'label' => false,
                        'style' => 'width:50%',
                        'required' => true
                    ]) ?>
                <?php endif ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">

        <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('Product Code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Product Name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Price') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Quantity') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($order['cart'] as $cart): ?>
            <tr>
                <td><?= h($cart->product->item_code) ?></td>
                <td><?= h($cart->product->name) ?></td>
                <td><?= h($cart->product->description) ?></td>
                <td><?= h($cart->product->price) ?></td>
                <td><?= h($cart->quantity) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

      </div>
    </div>
</div>
