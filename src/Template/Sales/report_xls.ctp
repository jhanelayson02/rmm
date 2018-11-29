<?php foreach ($users as $user) : ?>
        <table border=1 cellspacing="0" width="100%">
        <thead>
            <tr>
                <th colspan=6>Cashier: <?= $user->first_name . ' ' . $user->last_name ?></th>
            </tr>
            <tr>
                <th><?php echo __('Date and Time') ?></th>
                <th><?php echo __('Number') ?></th>
                <th><?php echo __('Customer') ?></th>
                <th><?php echo __('Discount') ?></th>
                <th><?php echo __('Number of Items') ?></th>
                <th><?php echo 'Total'; ?></th>
            </tr>
        </thead>
        <tbody>
        <?php
        $total = 0;
            foreach ($user->sales as $sale) :
            $total += $sale->amount;
        ?>
            <tr>
                <td><?= date('m-d-Y h:s:i A', strtotime($sale->created)) ?></td>
                <td><?= str_pad($sale->id, 8, '0', STR_PAD_LEFT); ?></td>
                <td><?= ($sale->cus_name == "" ? "Not Specified" : $sale->cus_name) ?></td>
                <td><?= $sale->discount ?> %</td>
                <td><?= count($sale->sale_items) ?></td>
                <td>P <?= number_format($sale->amount, 2) ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
            <th colspan=2>Summary:</th>
            <th colspan=2><?= count($user->sales) ?> Transactions</th>
            <th colspan=2>Gross Sale: P <?= number_format($total, 2) ?></th>
            </tr>
        </tfoot>
    </table><br>
<?php endforeach; 
header('Content-Type: application/force-download');
header('Content-disposition: attachment; filename= salesReport_'. date('m-d-Y') .'.xls');
header('Pragma: ');
header('CacheControl: ');
die;
?>