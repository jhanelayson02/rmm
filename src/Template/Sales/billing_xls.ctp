<?php
$grandTotal = 0;
$branch = null;
foreach ($orders as $order) :
    $branch = $order->user->branch->name;
?>
      <table class="table">
        <thead>
            <tr>
                <th colspan=5><h3>Billing Summary - <?= $order->created ?><h3></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $totalPrice = 0;
            foreach ($order['cart'] as $cart): 
                $totalPrice += $cart->product->price * $cart->quantity;
                $grandTotal += $cart->product->price * $cart->quantity;
            ?>
            <tr>
                <td><?= h($cart->quantity) ?></td>
                <td><?= h($cart->product->name) ?></td>
                <td>P <?= h($cart->product->price) ?></td>
                <td></td>
                <td>P <?= h($cart->product->price * $cart->quantity) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <th>TOTAL</th>
                <th></th>
                <th></th>
                <th></th>
                <th>P <?= $totalPrice ?></th>
            </tr>
        </tfoot>
      </table><br>
<?php endforeach; ?>
<table border=1>
    <tr>
        <th>GRAND TOTAL</th>
        <th></th>
        <th></th>
        <th></th>
        <th>P <?= $grandTotal ?></th>
    </tr>
</table>

<?php
header('Content-Type: application/force-download');
header('Content-disposition: attachment; filename= billingReport_'. $branch. '_' . date('m-d-Y') .'.xls');
header('Pragma: ');
header('CacheControl: ');
die;
?>