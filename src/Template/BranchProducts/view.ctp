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
                <?php
                    echo $this->Html->link(__('Edit Inventory'), ['action' => 'edit', $auth['branch_id']],['class' => 'btn-warning btn pull-right']);
                ?>
                <?= $this->Html->link(__('Actual Inventory'), ['controller' => 'InventorySummary', 'action' => 'add'],['class' => 'btn-success btn pull-right']) ?>
            </div>
        </div>
      </div>
      <div class="x_content">
        <div class="well">
            <h5>Note: Products with <span class="bg-danger" style="color:black;">RED</span> background are the stocks with less than 10 count or stocks that will expire in 2 days.</h5>
        </div>
        <table id="datatable" class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col" style="width:10%">Product Code</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Expiration</th>
                    <th scope="col" style="width: 10%">Quantity</th>

                </tr>
            </thead>
            <tbody>
            	<?= $this->Form->hidden('branch_id', ['value' => $auth['branch_id']]) ?>
                <?php
                foreach($products as $product) :
                    $quantity = isset($product['branch_products'][0]['quantity']) ? $product['branch_products'][0]['quantity'] : 0;
                    foreach ($borrows as $borrowed) {
                        if ($borrowed['branch_id'] == $auth['branch_id']) {
                            // echo 'pak';exit;
                            $quantity -= $borrowed['qty'];
                        } elseif ($borrowed['user']['branch_id'] == $auth['branch_id']) {
                            $quantity += $borrowed['qty'];
                        }
                    }
                    $expiration = !isset($product['branch_products'][0]['expired'])? date('Y-m-d') : date('Y-m-d', strtotime($product['branch_products'][0]['expired']));
                    $diff = date_diff(new DateTime($expiration), new DateTime());

                ?>
                <tr class="<?= $quantity <= 10 || $diff->format('%d') <2 ? 'bg-danger' : '' ?>">

                    <td><?= h($product->item_code) ?></td>
                    <td><?= h($product->name) ?></td>
                    <td><?= h($product->description) ?></td>
                    <td><?= h(date('M d, Y', strtotime($expiration))) ?></td>
                    <td><?= $quantity ?></td>

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
