<script src="http://code.highcharts.com/highcharts.js"></script>
<div class="col-md-10 col-md-offset-1">
  <div class="x_panel">
    <div class="x_title">
      <h2>Accuracy History</h2>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">

      <div class="" role="tabpanel" data-example-id="togglable-tabs">
            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">

              <?php $x = 0;
              foreach ($inventorySummary as $date => $result) :
                if($x<=13) :
                  $dates[] = $date;
              $x++; ?>
                <li role="presentation" class="<?= $x == 1 ? 'active': ''; ?>"><a href="#<?= $date . $x ?>" id="<?= $date ?>" <?= $x == 1 ? "role='tab'": ''; ?> data-toggle="tab" aria-expanded="<?= $x == 1 ? 'true': 'false'; ?>"><?= $date ?></a></li>
              <?php endif; endforeach; ?>
            </ul>
            <div id="myTabContent" class="tab-content">
              <?php $y = 0;
              foreach ($inventorySummary as $date => $result) :
                if($y<=13) :
              $y++;
              $correct = 0;
              $wrong = 0;?>
                <div role="tabpanel" class="tab-pane fade <?= $y == 1 ? 'active in': ''; ?>" id="<?= $date . $y ?>" aria-labelledby="<?= $date ?>">
                  <table id="<?= $date ?>_table" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th><?php echo __('Product') ?></th>
                            <th><?php echo __('Expected Quantity') ?></th>
                            <th><?php echo __('Actual Count') ?></th>
                            <th><?php echo 'Variance (Quantity)'; ?></th>
                            <th><?php echo 'Variance (Amount)'; ?></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $totalvq = 0;
                    $totalva = 0;
                      foreach ($result as $bname => $data) :
                        $totalvq += $data->variance;
                        $totalva += ($data->variance * $data->product->price);
                    ?>
                          <tr>
                            <td><?= $data->product->name ?></td>
                            <td><?= $data->quantity ?></td>
                            <td><?= $data->actual_quantity ?></td>
                            <td class="<?= $data->variance < 0 ? 'bg-danger' : 'bg-success' ?>"><?= $data->variance ?></td>
                            <td class="<?= $data->variance < 0 ? 'bg-danger' : 'bg-success' ?>">P <?= ($data->variance * $data->product->price) ?></td>
                          </tr>
                      <?php
                      endforeach;
                    ?>
                      <tr>
                        <th>TOTAL</th>
                        <th></th>
                        <th></th>
                        <th class="<?= $totalvq < 0 ? 'bg-danger' : 'bg-success' ?>"><?= $totalvq ?></th>
                        <th class="<?= $totalva ? 'bg-danger' : 'bg-success' ?>">P <?= $totalva ?></th>
                      </tr>
                    </tbody>
                </table>
              </div>
            <?php endif; endforeach; //pr($buildings->toArray());exit; ?>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
