<?php $auth = $this->request->session()->read('Auth.User');?>
    
<div class="col-md-10 col-sm-6 col-xs-12 col-md-offset-1 content">
    <br><br><br><br><br>
    <div class="x_panel">
      <div class="x_title">
        <h2> Sales Reports </h2>
         <div class="clearfix"></div>
      </div>
      <div class="x_content">
          <div class="row">
              <?= $this->Form->create('', ['url' => ['action' => 'reportXls']]); ?>
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
            </div>
            <?= $this->Form->end(); ?>
          </div>
      </div>
    </div>

    <div class="x_panel">
      <div class="x_title">
        <h2> Billing Reports </h2>
         <div class="clearfix"></div>
      </div>
      <div class="x_content">
          <div class="row">
              <?= $this->Form->create('', ['url' => ['action' => 'billingXls']]); ?>
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
            </div>
            <?= $this->Form->end(); ?>
          </div>
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
</script>