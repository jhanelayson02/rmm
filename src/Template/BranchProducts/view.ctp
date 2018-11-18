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
                <?php if ($auth['is_main'] == 1) {
                    echo $this->Html->link(__('Edit Inventory'), ['action' => 'edit', $auth['branch_id']],['class' => 'btn-warning btn pull-right']);
                } ?>
                <?= $this->Html->link(__('Actual Inventory'), ['controller' => 'InventorySummary', 'action' => 'add'],['class' => 'btn-success btn pull-right']) ?>
            </div>
        </div>
      </div>
      <div class="x_content">
        <div class="well">
            <h5>Note: Products with <span class="bg-danger" style="color:black;">RED</span> background are the stocks with less than 10 count.</h5>
        </div>
        <table id="datatable" class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col" style="width:10%">Product Code</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Description</th>
                    <th scope="col" style="width: 10%">Quantity</th>
                    
                </tr>
            </thead>
            <tbody>
            	<?= $this->Form->hidden('branch_id', ['value' => $auth['branch_id']]) ?>
                <?php 
                foreach($products as $product) :
                    $product['branch_products'][0]['quantity'] = isset($product['branch_products'][0]['quantity']) ? $product['branch_products'][0]['quantity'] : 0;
                    foreach ($product['borrow'] as $borrowed) {
                        $product['branch_products'][0]['quantity'] -= $borrowed['qty'];
                    }
                ?>
                <tr class="<?= $product['branch_products'][0]['quantity'] <= 10 ? 'bg-danger' : '' ?>">

                    <td><?= h($product->item_code) ?></td>
                    <td><?= h($product->name) ?></td>
                    <td><?= h($product->description) ?></td>
                    <td><?= $product['branch_products'][0]['quantity'] ?></td>
                   
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">

    $('#datatable').dataTable( {
        "pageLength": 50
    } );
	function cart(obj)
	{
		console.log($(obj).parent().find('input').val());
		$(obj).attr('data-qty', $(obj).parent().find('input').val());
		window.location.href = "../cart/add?product_id=" + $(obj).data('prod') + "&branch_id=" + $(obj).data('branch') + "&quantity=" + $(obj).data('qty');
	}
</script>