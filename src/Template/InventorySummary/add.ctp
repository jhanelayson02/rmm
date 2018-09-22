<?php $auth = $this->request->session()->read('Auth.User'); ?>
<div class="">
  <div class="col-md-12">
    <div class="x_panel">
      <div class="x_title">
        <div class="row">
            <div class="col-md-6">
                <h3><?= __('Inventory') ?></h3>
            </div>
            <div class="col-md-6">
                <?= $this->Html->link(__('Inventory Summary'), ['action' => 'summary'],['class' => 'btn-success btn pull-right']) ?>
            </div>
        </div>
      </div>
      <div class="x_content">
      	<?= $this->Form->create() ?>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col" style="width:10%">Product Code</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Description</th>
                    <th scope="col" style="width: 10%">Quantity</th>
                    <th scope="col" style="width: 10%">Actual Count</th>
                    
                </tr>
            </thead>
            <tbody>
            	<?= $this->Form->hidden('branch_id', ['value' => $auth['branch_id']]) ?>
				<?php foreach($products as $product) : //pr($auth); exit; ?>
                <tr>
                    <?php $quantity = isset($product['branch_products'][0]['quantity']) ? $product['branch_products'][0]['quantity'] : 0; ?>
                    <td><?= h($product->item_code) ?></td>
                    <td><?= h($product->name) ?></td>
                    <td><?= h($product->description) ?></td>
                    <td><?= $quantity ?></td>
                    <td>
                    	<?= $this->Form->input('actual_quantity[]', [
                            'type' => 'number',
                    		'class' => 'form-control',
                    		'label' => false,
                    		'placeholder' => 0
                    		]) ?>
                    	<?= $this->Form->hidden('product_id[]', ['value' => $product->id]) ?>
                    	<?= $this->Form->hidden('quantity[]', ['value' => $quantity]) ?>
                    </td>
                   
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    	<?= $this->Form->button('Submit', ['class' => 'btn btn-success pull-right']) ?>
        <?= $this->Form->end() ?>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">

	function cart(obj)
	{
		console.log($(obj).parent().find('input').val());
		$(obj).attr('data-qty', $(obj).parent().find('input').val());
		window.location.href = "../cart/add?product_id=" + $(obj).data('prod') + "&branch_id=" + $(obj).data('branch') + "&quantity=" + $(obj).data('qty');
	}
</script>