<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href='https://fonts.googleapis.com/css?family=Anaheim' rel='stylesheet'>
<?= $this->Html->css(['https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/ui-lightness/jquery-ui.css']) ?>
<?= $this->Html->css(['bootstrap', 'custom.min', 'font-awesome.min','dataTables.bootstrap.min', 'pos']) ?>
<?= $this->Html->script(['jquery.min', 'bootstrap.min', 'custom','jquery.dataTables.min','jquery.keyboard', 'jquery.mousewheel', 'keyboard']);?>
<?php $auth = $this->request->session()->read('Auth.User'); ?>
<div class="row" style="font-family:'Anaheim'">
    <div class="col-md-12">
        <div class="col-md-5"><br>
            <div class="x_panel" style="min-height:95%">
                <div class="x_content">
                    <?= $this->Form->create('') ?>
                    <div id="wrap">
                        <label for="">Customer(optional): </label>
                        <input type="text" name="cus_name" id="keyboard" class="form-control keyboard-normal">
                    </div>
                    <table class="table no-border">
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th style="text-align:center">Quantity</th>
                            <th>Total</th>
                        </tr>
                    </table>

                    <div class="order" style="height:296px; overflow-y:scroll;">
                        <div class="well empty"><h3>Empty List <small>(Select Product)</small></h3></div>

                    </div>

                    <table class="table border-striped">
                        <tr>
                            <td>SubTotal</td>
                            <td></td>
                            <td id="subTotal" style="text-align:right">P 0.00</td>
                        </tr>
                        <tr>
                            <td>Order Tax</td>
                            <td>12%</td>
                            <td id="tax" style="text-align:right">P 0.00</td>
                        </tr>
                        <tr>
                            <td>Discount</td>
                            <td>N/A</td>
                            <td style="text-align:right">P 0.00</td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            <td></td>
                            <td class="text-success" id="grandTotal" style="text-align:right">P 0.00</td>
                        </tr>
                    </table>

                    <!-- Small modal -->
                    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">

                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel2">Add Sale</h4>
                        </div>
                        <div class="modal-body">
                            <h4>Customer: </h4>
                            <p><h3>Total: <span id="grandTotal2"></span></h3></p>
                            <p>
                                <label for="">Paid:</label>
                                <input type="number" id="grandTotal3" name="payment" class="form-control" onchange="change(this)">
                                <input type="hidden" id="grandTotalInput" name="total" class="form-control">
                            </p>
                            <p>
                                Change: <span id="change" class="text-success">0</span>
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary submitForm">Submit</button>
                        </div>

                        </div>
                    </div>
                    </div>
                    <!-- /modals -->

                    <?= $this->Form->end() ?>
                    <?= $this->Form->button('CANCEL', ['class' => 'btn btn-danger col-md-5']) ?>
                    <button type="button" class="btn btn-success col-md-6" data-toggle="modal" data-target=".bs-example-modal-sm">PAYMENT</button>
                </div>
            </div>
        </div>
        
        <div class="col-md-7"><br>
            <div class="x_panel" style="min-height:95%">
                <div class="x_title">
                    <h3>Products <i class="fa fa-arrow-down"></i></h3>
                </div>
                <div class="x_content">
                    <div class="tabbable-panel margin-tops4 ">
                        <div class="tabbable-line">
                            <ul class="nav nav-tabs tabtop  tabsetting">
                            <li class="active"> <a href="#tab_default_1" data-toggle="tab"> <i class="fa fa-home"></i> </a> </li>
                            <li> <a href="#tab_default_2" data-toggle="tab">Pork Products</a> </li>
                            <li> <a href="#tab_default_3" data-toggle="tab">Chicken Products</a> </li>
                            <li> <a href="#tab_default_4" data-toggle="tab">Beef Products</a> </li>
                            <li> <a href="#tab_default_5" data-toggle="tab" class="thbada">Others Products</a> </li>
                            </ul>
                            <div class="tab-content margin-tops">
                            <div class="tab-pane active fade in" id="tab_default_1">
                            <?php foreach ($products as $product) { ?>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" onclick="add(this)" data-id="<?= $product->id ?>" data-name="<?= $product->name ?>" data-price="<?= $product->price ?>">
                                    <div class="hovereffect">
                                        <img class="img-responsive" src="/rmm/img/products/<?= $product->image ?>" alt="">
                                        <div class="overlay">
                                        <h2><?= $product->name ?></h2>
                                        <p class="info">P <?= $product->price ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            </div>
                            <div class="tab-pane fade" id="tab_default_2">
                            <?php foreach ($products as $product) {
                                if ($product->type == 'pork') { ?>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" onclick="add(this)" data-id="<?= $product->id ?>" data-name="<?= $product->name ?>" data-price="<?= $product->price ?>">
                                    <div class="hovereffect">
                                        <img class="img-responsive" src="/rmm/img/products/<?= $product->image ?>" alt="">
                                        <div class="overlay">
                                        <h2><?= $product->name ?></h2>
                                        <p class="info">P <?= $product->price ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php }} ?>
                            </div>
                            <div class="tab-pane fade" id="tab_default_3">
                            <?php foreach ($products as $product) {
                                if ($product->type == 'chicken' ) { ?>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" onclick="add(this)" data-id="<?= $product->id ?>" data-name="<?= $product->name ?>" data-price="<?= $product->price ?>">
                                    <div class="hovereffect">
                                        <img class="img-responsive" src="/rmm/img/products/<?= $product->image ?>" alt="">
                                        <div class="overlay">
                                        <h2><?= $product->name ?></h2>
                                        <p class="info">P <?= $product->price ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php }} ?>
                            </div>
                            <div class="tab-pane fade" id="tab_default_4">
                            <?php foreach ($products as $product) {
                                if ($product->type == 'beef') { ?>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" onclick="add(this)" data-id="<?= $product->id ?>" data-name="<?= $product->name ?>" data-price="<?= $product->price ?>">
                                    <div class="hovereffect">
                                        <img class="img-responsive" src="/rmm/img/products/<?= $product->image ?>" alt="">
                                        <div class="overlay">
                                        <h2><?= $product->name ?></h2>
                                        <p class="info">P <?= $product->price ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php }} ?>
                            </div>
                            <div class="tab-pane fade" id="tab_default_5">
                            <?php foreach ($products as $product) {
                                if ($product->type == 'value-added') { ?>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" onclick="add(this)" data-id="<?= $product->id ?>" data-name="<?= $product->name ?>" data-price="<?= $product->price ?>">
                                    <div class="hovereffect">
                                        <img class="img-responsive" src="/rmm/img/products/<?= $product->image ?>" alt="">
                                        <div class="overlay">
                                        <h2><?= $product->name ?></h2>
                                        <p class="info">P <?= $product->price ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php }} ?>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<script>
    function add(obj)
    {
        $('.empty').hide();
        if ($('#well' + $(obj).data('id')).length == 0) {
            $('.order').append('<div class="well" id="well'+ $(obj).data('id') +'"><div class="row"><div class="col-md-3">'+ $(obj).data('name') +'</div><div class="col-md-3">P '+ $(obj).data('price') +'</div><div class="col-md-3"><div class="input-group"><span class="input-group-btn"><button type="button" class="btn btn-danger btn-number"  data-type="minus" onclick="btnNum(this)" data-field="quant['+ $(obj).data('id') +']" data-priceName="prod_total['+ $(obj).data('id') +']" data-price="'+ $(obj).data('price') +'"><span class="glyphicon glyphicon-minus"></span></button></span><input type="text" name="quant['+ $(obj).data('id') +']" class="form-control input-number" value="1" min="1" max="100"><span class="input-group-btn"><button type="button" class="btn btn-success btn-number" data-type="plus" onclick="btnNum(this)" data-field="quant['+ $(obj).data('id') +']" data-priceName="prod_total['+ $(obj).data('id') +']" data-price="'+ $(obj).data('price') +'"><span class="glyphicon glyphicon-plus"></span></button></span></div></div><div class="col-md-3"><input type="text" class="total" style="width: -webkit-fill-available;" name="prod_total['+ $(obj).data('id') +']" value="'+ $(obj).data('price') +'" readonly></div></div></div>');
        }
        
        var totalPoints = 0;
        $('.total').each(function(){
            totalPoints += parseInt($(this).val()); //<==== a catch  in here !! read below
        });
        $('#subTotal').html('P ' + parseFloat(totalPoints*0.88).toFixed(2));
        $('#tax').html('P ' + parseFloat(totalPoints*0.12).toFixed(2));
        $('#grandTotal').html('P ' + parseFloat(totalPoints).toFixed(2));
        $('#grandTotal2').html('P ' + parseFloat(totalPoints).toFixed(2));
        $('#grandTotal3').val(parseFloat(totalPoints).toFixed(2));
        $('#grandTotalInput').val(parseFloat(totalPoints).toFixed(2));
    }
    
    function change(obj)
    {
        $('#change').html(parseFloat($(obj).val()-$('#grandTotalInput').val()).toFixed(2));

        if (($(obj).val()-$('#grandTotalInput').val()) < 0) {
            $('.submitForm').attr('disabled', true);
        } else {
            $('.submitForm').attr('disabled', false);
        }
    }
</script>