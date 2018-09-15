
<?= $this->Html->css(['bootstrap', 'custom.min', 'font-awesome.min','dataTables.bootstrap.min']) ?>
<?= $this->Html->script(['jquery.min', 'bootstrap.min', 'custom','jquery.dataTables.min']);?>
<?php $auth = $this->request->session()->read('Auth.User'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="col-md-9"><br>
            <div class="x_panel" style="height:95%">
                <div class="x_content">
                    <?= $this->Form->create('', ['url' => ['controller' => 'cart', 'action' => 'add']]) ?>
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Product Code</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Price</th>
                                <th scope="col" style="width: 10%">Quantity</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?= $this->Form->hidden('branch_id', ['value' => $auth['branch_id']]) ?>
                            <?php foreach($products as $product) : //pr($auth); exit; ?>
                            <tr>

                                <td><?= h($product->item_code) ?></td>
                                <td><?= h($product->name) ?></td>
                                <td><?= h($product->description) ?></td>
                                <td><?= 'P' . $product->price. '.00' ?></td>
                                <td>
                                    <?= $this->Form->input('quantity[]', [
                                        'class' => 'form-control',
                                        'label' => false,
                                        'placeholder' => 0
                                        ]) ?>
                                    <?= $this->Form->hidden('product_id[]', ['value' => $product->id]) ?>
                                </td>
                            
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?= $this->Form->end() ?>
                    <?= $this->Form->button('Checkout', ['class' => 'btn btn-success pull-right']) ?>
                </div>
            </div>
        </div>
        <div class="col-md-3"><br>
            <div class="x_panel" style="height:70%">
                <fieldset class="form-control" style="height:100%">
                    <legend>Order Summary:</legend>
                </fieldset>
            </div>
            <div class="x_panel" style="height:24%">
            <h3>Total:</h3><br>
            </div>
        </div>
    </div>
</div>