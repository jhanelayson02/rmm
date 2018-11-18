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

      <div class="" role="tabpanel" data-example-id="togglable-tabs">
            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">

              <?php $x = 0;
              foreach ($users as $user) :
              $x++; ?>
                <li role="presentation" class="<?= $x == 1 ? 'active': ''; ?>"><a href="#<?= 'sale' . $x ?>" id="<?= 'sale' ?>" <?= $x == 1 ? "role='tab'": ''; ?> data-toggle="tab" aria-expanded="<?= $x == 1 ? 'true': 'false'; ?>"><?= $user['first_name'] . ' ' . $user['last_name'] ?></a></li>
              <?php endforeach; ?>
            </ul>
            <div id="myTabContent" class="tab-content">
              <?php $y = 0;
              foreach ($users as $user) :
              $y++; ?>
                <div role="tabpanel" class="tab-pane fade <?= $y == 1 ? 'active in': ''; ?>" id="<?= 'sale' . $y ?>" aria-labelledby="<?= 'sale' ?>">
                  <table id="<?= 'sale' . $y ?>_table" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th><?php echo __('Number') ?></th>
                            <th><?php echo __('Customer') ?></th>
                            <th><?php echo __('Discount') ?></th>
                            <th><?php echo __('Number of Items') ?></th>
                            <th><?php echo 'Total'; ?></th>
                            <th><?php echo 'Action'; ?></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $total = 0;
                      foreach ($user->sales as $sale) :
                        $total += $sale->amount;
                    ?>
                          <tr>
                            <td><?= str_pad($sale->id, 8, '0', STR_PAD_LEFT); ?></td>
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
                    </tbody>
                    <tfoot>
                      <tr>
                        <th colspan=2>Summary:</th>
                        <th colspan=2><?= count($user->sales) ?> Transactions</th>
                        <th colspan=2>Gross Sale: P <?= number_format($total, 2) ?></th>
                      </tr>
                    </tfoot>
                </table>
              </div>
            <?php endforeach; //pr($buildings->toArray());exit; ?>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
