<script src="http://code.highcharts.com/highcharts.js"></script>
<div class="col-md-10 col-md-offset-1">
  <div class="x_panel">
    <div class="x_title">
      <div class="row">
        <div class="col-md-6">
          <h2>Sale Summary <small>(<?= date('M d, Y') ?>)</small></h2>
        </div>
        <div class="col-md-6">
          <?= $this->Html->link('<i class="fa fa-newspaper-o"></i> Sales Reports', ['action' => 'reports'], ['class' => 'btn btn-info pull-right', 'escape' => false]); ?>
        </div>
      </div>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th><?php echo __('Number') ?></th>
                <th><?php echo __('Cashier') ?></th>
                <th><?php echo __('Customer') ?></th>
                <th><?php echo __('Discount') ?></th>
                <th><?php echo __('Number of Items') ?></th>
                <th><?php echo 'Total'; ?></th>
                <th><?php echo 'Action'; ?></th>
            </tr>
        </thead>
        <tbody>
          <?php $y = 0;
          foreach ($users as $user) :
          $y++; ?>
          
            <?php
            $total = 0;
              foreach ($user->sales as $sale) :
                $total += $sale->amount;
            ?>
                  <tr>
                    <td><?= str_pad($sale->id, 8, '0', STR_PAD_LEFT); ?></td>
                    <td><?= $user->first_name . ' ' . $user->last_name ?></td>
                    <td><?= ($sale->cus_name == "" ? "Not Specified" : $sale->cus_name) ?></td>
                    <td><?= isset($sale->discount) ? $sale->discount : 0 ?> %</td>
                    <td><?= count($sale->sale_items) ?></td>
                    <td>P <?= number_format($sale->amount, 2) ?></td>
                    <td>
                <?= $this->Html->link(__('<i class="fa fa-ticket"></i> Receipt'), ['controller' => 'BranchProducts', 'action' => 'receipt', $sale->id, '?' => ['redirect' => '/rmm/sales']], ['class' => 'text-success', 'escape' => false, 'target' => '_blank']) ?>
                    </td>
                  </tr>
              <?php
              endforeach;
            ?>
          <?php endforeach; //pr($buildings->toArray());exit; ?>
        </tbody>
        <tfoot>
          <tr>
            <th colspan=2>Summary:</th>
            <th colspan=2><?= count($user->sales) ?> Transactions</th>
            <th colspan=3>Gross Sale: P <?= number_format($total, 2) ?></th>
          </tr>
        </tfoot>
      </table>
        </div>
      </div>
    </div>
  </div>
</div>
