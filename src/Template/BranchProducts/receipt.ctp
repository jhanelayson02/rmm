<?= $this->Html->css(['bootstrap', 'custom.min', 'font-awesome.min','dataTables.bootstrap.min', 'pos']) ?>
<?= $this->Html->script(['jquery.min']); ?>
<link href='https://fonts.googleapis.com/css?family=Anaheim' rel='stylesheet'>
<?php $auth = $this->request->session()->read('Auth.User'); ?>
<div class="row" style="padding:20px;font-family: 'Anaheim';font-size: 12px;text-align:center;">
  <div id="receipt" style="width: 20%;margin-left: 40%;">
    <div class="x_panel">
      <div class="x_content">
        <p><?= strtoupper($sale->branch->name) ?></p>
        <p><?= strtoupper($sale->branch->description) ?></p>
        <hr>
        <div class="row">
            <div class="col-md-1">Qty</div>
            <div class="col-md-6">Description</div>
            <div class="col-md-2">Price</div>
            <div class="col-md-3">Total</div>
        </div>
        <hr>
        <?php foreach ($sale->sale_items as $item) { ?>
        <div class="row">
            <div class="col-md-1"><?= $item->qty ?></div>
            <div class="col-md-6" style="text-align:left;"><?= strtoupper($item->product->name) ?></div>
            <div class="col-md-2" style="text-align:right;"><?= 'P' . number_format($item->cost / $item->qty,2) ?></div>
            <div class="col-md-3" style="text-align:right;"><?= 'P' . number_format($item->cost, 2) ?></div>
        </div>
        <?php } ?>
        <hr>
        <div class="row">
            <div class="col-md-6" style="text-align:left;">Amount</div>
            <div class="col-md-6" style="text-align:right;"><?= 'P' . number_format($sale->amount*0.88, 2) ?></div>
        </div>
        <div class="row">
            <div class="col-md-6" style="text-align:left;">VAT 12%</div>
            <div class="col-md-6" style="text-align:right;"><?= 'P' . number_format($sale->amount*0.12, 2) ?></div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6" style="text-align:left;">TOTAL</div>
            <div class="col-md-6" style="text-align:right;"><?= 'P' . number_format($sale->amount, 2) ?></div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-6" style="text-align:left;">Cash</div>
            <div class="col-md-6" style="text-align:right;"><?= 'P' . number_format($sale->cash, 2) ?></div>
        </div>
        <div class="row">
            <div class="col-md-6" style="text-align:left;">CHANGE</div>
            <div class="col-md-6" style="text-align:right;"><?= 'P' . number_format($sale->cash - $sale->amount, 2) ?></div>
        </div>
        <hr>
        
        <div class="row">
            <div class="col-md-12" style="text-align:left;">Receipt #: <?= str_pad($sale->id, 8, '0', STR_PAD_LEFT); ?></div>
        </div>
        <div class="row">
            <div class="col-md-12" style="text-align:left;">Transaction #: <?= str_pad(count($transactions[date('Y-m-d')]), 8, '0', STR_PAD_LEFT); ?></div>
        </div>
        <div class="row">
            <div class="col-md-12" style="text-align:left;">Cashier: <?= $sale->user->first_name . ' ' . $sale->user->last_name ?></div>
        </div>
        <div class="row">
            <div class="col-md-12" style="text-align:left;">Date: <?= date('M d, Y h:s:i A', strtotime($sale->created)) ?></div>
        </div>
        <hr>

        <div class="row">
            <div class="col-md-12" style="text-align:left;">Customer Name: <?= $sale->cus_name != '' ? $sale->cus_name : '_______________' ?></div>
        </div>
        <div class="row">
            <div class="col-md-12" style="text-align:left;">Address: <?= $sale->cus_add != '' ? $sale->cus_add : '_____________________' ?></div>
        </div>
        <div class="row">
            <div class="col-md-12" style="text-align:left;">Contact #: <?= $sale->cus_num != '' ? $sale->cus_num : '___________________' ?></div>
        </div>
        <hr>
        
        <div class="row">
            <div class="col-md-12">- THIS SERVES AS YOUR SALES INVOICE -</div>
            <div class="col-md-12">Thank you, come again!</div>
        </div>

      </div>
    </div>
  </div>
  <div style="width: 20%;margin-left: 40%;">
  
    <div class="row">
        <div class="col-md-6"><button class="col-md-12 btn btn-default" onclick="goBack()">Back to POS</button></div>
        <div class="col-md-6"><button class="col-md-12 btn btn-success" onclick="printThis()">Print</button></div>
    </div>
  </div>
</div>
<script>
    <?php $redirect = $this->request->query['redirect'] ?>
    function goBack() {
        window.location.href = <?= "'" . $redirect . "'" ?>;
    }

    function printThis() {
        var btn = document.getElementsByClassName('btn');
        $(btn).hide();
        $('#receipt').attr('style', 'width: 40%;margin-left: 30%;');
        window.print();
        $(btn).show();
        $('#receipt').attr('style', 'width: 20%;margin-left: 40%;');
    }
</script>
