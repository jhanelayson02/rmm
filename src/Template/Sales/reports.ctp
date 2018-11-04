<?php $auth = $this->request->session()->read('Auth.User');?>
    
<div class="col-md-10 col-sm-6 col-xs-12 col-md-offset-1 content">
    <br><br><br><br><br><br><br><br><br><br>
    <div class="x_panel">
      <div class="x_title">
        <h2> Sales Reports </h2>
         <div class="clearfix"></div>
      </div>
      <div class="x_content">
          <div class="row">
              <?= $this->Form->create('', ['url' => ['action' => 'reportXls']]); ?>
            <div class="col-md-3">
                <?= $this->Form->input('start_date', ['class' => 'form-control', 'id' => 'start_date', 'value' => date('Y-m-d')]); ?>
            </div>
            <div class="col-md-3">
                <?= $this->Form->input('end_date', ['class' => 'form-control', 'id' => 'end_date', 'value' => date('Y-m-d')]); ?>
            </div>
            <div class="col-md-3">
                <?php $users['All'] = 'All Cashiers'; asort($users); ?>
                <?= $this->Form->input('users', ['options' => $users, 'class' => 'form-control']); ?>
            </div>
            <div class="col-md-3"><br>
                <?= $this->Form->input('Generate', ['type' => 'submit', 'class' => 'btn btn-success col-md-12']); ?>
            </div>
            <?= $this->Form->end(); ?>
          </div>
      </div>
    </div>
</div>

<script>
    $('#start_date').datetimepicker({
        format: 'YYYY-MM-DD'
    });
    $('#end_date').datetimepicker({
        format: 'YYYY-MM-DD'
    });
</script>