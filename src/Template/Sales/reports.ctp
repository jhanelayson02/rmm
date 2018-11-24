<?php $auth = $this->request->session()->read('Auth.User');?>
    
<div class="col-md-10 col-sm-6 col-xs-12 col-md-offset-1 content">
    <div class="x_panel">
      <div class="x_title">
        <h2> Sales Reports </h2>
         <div class="clearfix"></div>
      </div>
      <div class="x_content">
          <div class="row">
              <?= $this->Form->create('', ['url' => ['action' => 'reportXls'], 'id' => 'reportForm']); ?>
            <div class="col-md-3">
                <?= $this->Form->input('start_date', ['class' => 'form-control', 'id' => 'startdate', 'value' => date('Y-m-d')]); ?>
            </div>
            <div class="col-md-3">
                <?= $this->Form->input('end_date', ['class' => 'form-control', 'id' => 'enddate', 'value' => date('Y-m-d')]); ?>
            </div>
            <div class="col-md-3">
                <?php $users['All'] = 'All Cashiers'; asort($users); ?>
                <?= $this->Form->input('users', ['options' => $users, 'class' => 'form-control']); ?>
            </div>
            <div class="col-md-3"><br>
                <?= $this->Form->input('Generate', ['type' => 'submit', 'class' => 'btn btn-success col-md-12']); ?>
                <button type="button" class="btn btn-success col-md-12" name="sales" onclick="viewReport(this)">View Report</button>
            </div>
            <?= $this->Form->end(); ?>
          </div>

          <?php if (isset($reportUsers)) {
            foreach ($reportUsers as $user) :
                if (count($user->sales) != 0) : ?>
                <table class="table table-bordered">
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
                <?php endif;
            endforeach; 
          } ?>

      </div>
    </div>



    <div class="x_panel">
      <div class="x_title">
        <h2> Billing Reports </h2>
         <div class="clearfix"></div>
      </div>
      <div class="x_content">
          <div class="row">
              <?= $this->Form->create('', ['url' => ['action' => 'billingXls'], 'id' => 'formBill']); ?>
            <div class="col-md-3">
                <?= $this->Form->input('start_date', ['class' => 'form-control', 'id' => 'startdate2', 'value' => date('Y-m-d')]); ?>
            </div>
            <div class="col-md-3">
                <?= $this->Form->input('end_date', ['class' => 'form-control', 'id' => 'enddate2', 'value' => date('Y-m-d')]); ?>
            </div>
            <div class="col-md-3">
                <?= $this->Form->input('branch', ['options' => $branches, 'class' => 'form-control']); ?>
            </div>
            <div class="col-md-3"><br>
                <?= $this->Form->input('Generate', ['type' => 'submit', 'class' => 'btn btn-success col-md-12']); ?>
                <button type="button" class="btn btn-success col-md-12" name="bills" onclick="viewReport(this)">View Report</button>
            </div>
            <?= $this->Form->end(); ?>
          </div>

          <?php if (isset($orders)) :
            $grandTotal = 0;
            $branch = null;
            foreach ($orders as $order) :
                $branch = $order->user->branch->name;
            ?>
                <table class="table table-bordered">
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
            <table class="table table-bordered">
                <tr>
                    <th>GRAND TOTAL</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>P <?= $grandTotal ?></th>
                </tr>
            </table>
          <?php endif; ?>

      </div>
    </div>
</div>
<script>
    $('#startdate').datetimepicker({
        format: 'YYYY-MM-DD',
        maxDate : 'now'
    });
    $('#enddate').datetimepicker({
        format: 'YYYY-MM-DD',
        maxDate : 'now'
    });

    $('#startdate2').datetimepicker({
        format: 'YYYY-MM-DD',
        maxDate : 'now'
    });
    $('#enddate2').datetimepicker({
        format: 'YYYY-MM-DD',
        maxDate : 'now'
    });

$(function () {
            $('#startdate,#enddate').datetimepicker({
                useCurrent: false,
                minDate: moment()
            });
            $('#startdate').datetimepicker().on('dp.change', function (e) {
                var incrementDay = moment(new Date(e.date));
                $('#enddate').data('DateTimePicker').minDate(incrementDay);
                $(this).data("DateTimePicker").hide();
            });

            $('#enddate').datetimepicker().on('dp.change', function (e) {
                var decrementDay = moment(new Date(e.date));
                $('#startdate').data('DateTimePicker').maxDate(decrementDay);
                 $(this).data("DateTimePicker").hide();
            });

            $('#startdate2,#enddate2').datetimepicker({
                useCurrent: false,
                minDate: moment()
            });
            $('#startdate2').datetimepicker().on('dp.change', function (e) {
                var incrementDay = moment(new Date(e.date));
                $('#enddate2').data('DateTimePicker').minDate(incrementDay);
                $(this).data("DateTimePicker").hide();
            });

            $('#enddate2').datetimepicker().on('dp.change', function (e) {
                var decrementDay = moment(new Date(e.date));
                $('#startdate2').data('DateTimePicker').maxDate(decrementDay);
                 $(this).data("DateTimePicker").hide();
            });

        });

    function viewReport(obj) {
        if ($(obj).attr('name') == 'bills') {
            $('#formBill').attr('action', '');
        } else {
            $('#reportForm').attr('action', '');
        }
        $(obj).attr('type', 'submit');
        $(obj).click();
    }
</script>