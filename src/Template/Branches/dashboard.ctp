<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<?php $auth = $this->request->session()->read('Auth.User'); ?>
<div class="row">
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="tile-stats">
        <div class="icon"><i class="fa fa-users"></i>
        </div>
        <div class="count"><?= count($users) ?></div>

        <h3>Users</h3>
        <p><?= $auth['branch_name'] ?></p>
    </div>
    </div>
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="tile-stats">
        <div class="icon"><i class="fa fa-cutlery"></i>
        </div>
        <div class="count"><?= count($products) ?></div>

        <h3>Products</h3>
        <p><?= $auth['branch_name'] ?></p>
    </div>
    </div>
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="tile-stats">
        <div class="icon"><i class="fa fa-shopping-cart"></i>
        </div>
        <div class="count"><?= count($transactions[date('Y-m-d')]) ?></div>

        <h3>Transactions</h3>
        <p><?= date('M d, Y') ?></p>
    </div>
    </div>
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="tile-stats">
        <div class="icon"><i class="fa fa-money"></i>
        </div>
        <?php
            $totalSales = 0;
            foreach ($transactions[date('Y-m-d')] as $transaction) {
                $totalSales += $transaction->amount;
            }
        ?>
        <div class="count">P <?= $totalSales ?></div>

        <h3>Sales</h3>
        <p><?= date('M d, Y') ?></p>
    </div>
    </div>
    <div id="container" class="col-md-12"></div>
</div>


<script>
Highcharts.chart('container', {

title: {
    text: 'Month Sales'
},

subtitle: {
    text: 'RMM Meatshop'
},

yAxis: {
    title: {
        text: 'Gross Sales'
    }
},
legend: {
    layout: 'vertical',
    align: 'right',
    verticalAlign: 'middle'
},
xAxis: {
    categories: [<?php foreach ($monthly as $month => $value) {
        echo "'".$month . "',";
    } ?>]
},

plotOptions: {
    series: {
        label: {
            connectorAllowed: false
        }
    }
},

series: [{
    name: '<?= $auth['branch_name'] ?>',
    data: [<?php foreach ($monthly as $month => $value) {
        echo $value . ",";
    } ?>]
}],

responsive: {
    rules: [{
        condition: {
            maxWidth: 500
        },
        chartOptions: {
            legend: {
                layout: 'horizontal',
                align: 'center',
                verticalAlign: 'bottom'
            }
        }
    }]
}

});
</script>