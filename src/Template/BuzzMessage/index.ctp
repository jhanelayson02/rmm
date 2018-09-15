<?php $auth = $this->request->session()->read('Auth.User'); ?>
<style type="text/css">
  .ui-autocomplete.ui-front
  {
  z-index: 1051;
  }
</style>
<script>
  function showDiv(){
        if($('#category').val() == 'building') {
            $('#buildings').show();
            $('#status').show();
            $('.status').show();
            $('.space').hide();
            $('#space').hide();
            $('.solo').hide();
            $('.cus_name').hide();
            $('#levels').hide();
            $('#phases').hide();
        } else if($('#category').val() == 'level') {
            $('#levels').show();
            $('#status').show();
            $('.status').show();
            $('.space').hide();
            $('#space').hide();
            $('#buildings').hide();
            $('.cus_name').hide();
            $('.solo').hide();
            $('#phases').hide();
        } else if($('#category').val() == 'phase') {
            $('#phases').show();
            $('#status').show();
            $('.status').show();
            $('.cus_name').hide();
            $('.space').hide();
            $('#space').hide();
            $('#levels').hide();
            $('.solo').hide();
            $('#buildings').hide();
        } else if($('#category').val() == 'solo') {
            $('.solo').show();
            $('.space').hide();
            $('#space').hide();
            $('#levels').hide();
            $('#phases').hide();
            $('.cus_name').hide();
            $('#buildings').hide();
            $('#status').hide();
            $('#status').val('In');
            $('.status').hide();
        } else if($('#category').val() == 'cus') {
            $('.cus_name').show();
            $('#space').hide();
            $('.space').hide();
            $('.solo').hide();
            $('#levels').hide();
            $('#phases').hide();
            $('#buildings').hide();
            $('#status').hide();
            $('#status').val('In');
            $('.status').hide();
        } else if($('#category').val() == 'space') {
            $('#buildings').show();
            $('.space').show();
            $('#space').show();
            $('.cus_name').hide();
            $('.solo').hide();
            $('#levels').hide();
            $('#phases').hide();
            $('#status').hide();
            $('#status').val('In');
            $('.status').hide();
        } else {
            $('#status').val('In');
            $('.solo').hide();
            $('.space').hide();
            $('#space').hide();
            $('#levels').hide();
            $('.cus_name').hide();
            $('#phases').hide();
            $('#buildings').hide();
            $('#status').hide();
            $('.status').hide();
        }
    };
</script>
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel">
            <div class="panel-heading">
              <div class="row">
                <div class="col-md-6">
                  <h3><?= __('Buzz Staffs') ?></h3>
                </div>
                <div class="col-md-6">
                  <button type="button" class="btn pull-right" id="validate" data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fa fa-edit"></i> New Message</button>
                </div>
              </div>

                <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-sm">
                    <div class="modal-content">

                      <div class="modal-header">
                        </button>
                        <h4 class="modal-title" id="myModalLabel2">Buzz Message</h4>
                      </div>
                      <div class="modal-body">
                          <div class="users content">
                              <?= $this->Form->create($message) ?>
                                  <?php
                                    echo $this->Form->input('category',[
                                        'options' => [
                                          'all' => 'All Staffs',
                                          'solo' => 'Single Staff',
                                          'cus' => 'Per Customer',
                                          'space' => 'Per Space',
                                          'phase' => 'Per Phase',
                                          'level' => 'Per level',
                                          'building' => 'Per Building',
                                        ],
                                        'empty'=> 'Please select category...',
                                        'class' => 'form-control',
                                        'id' => 'category',
                                        'onclick' => 'showDiv()',
                                        'required' => true
                                    ]);
                                    echo '<br>';
                                    echo $this->Form->hidden('username', ['id' => 'hdnUsername']);
                                    echo $this->Form->hidden('employee', ['id' => 'employeeId', 'name' => 'emp_id', 'class' => 'emp']);
                                    echo '<input id="relocateStaff1" type="text" name="staff_name" class="solo form-control col-lg-12" placeholder="Search Staff..." style="display:none; padding-bottom: 5px; font-size: 18px;margin-top: 8px;" pattern="[a-zA-Z ,.-]{1,50}" title="Please search valid staff name (special characters and numbers are not allowed)">';


                                    echo $this->Form->hidden('cus_id', ['id' => 'cus_id']);
                                    echo $this->Form->input('Customer(optional)',[
                                        'id' => 'searchCus',
                                        'class' => 'form-control col-lg-12 cus_name',
                                        'placeholder' => 'Search customer...',
                                        'style' => 'display:none',
                                        'name' => 'cus_name',
                                        'label' => false
                                    ]);

                                    echo $this->Form->input('building',[
                                        'options' => $listBuildings,
                                        'empty'=> 'Please select building...',
                                        'class' => 'form-control buildings',
                                        'id' => 'buildings',
                                        'style' => 'display:none',
                                        'label' => false,
                                        'onchange' => 'getData(this)',
                                    ]);
                                    ?>
                                    <label class="space" style="display:none">Suite/Space</label>
                                    <select class="form-control" id="space" style="display:none" name="space">
                                        <option value="">Select a building first....</option>
                                    </select>
                                    <?php
                                    echo $this->Form->input('level',[
                                        'options' => $listLevels,
                                        'empty'=> 'Please select level...',
                                        'class' => 'form-control',
                                        'id' => 'levels',
                                        'style' => 'display:none',
                                        'label' => false
                                    ]);
                                    echo $this->Form->input('phase',[
                                        'options' => $listPhases,
                                        'empty'=> 'Please select phase...',
                                        'class' => 'form-control',
                                        'id' => 'phases',
                                        'style' => 'display:none',
                                        'label' => false
                                    ]);
                                    echo '<br>';
                                    echo $this->Form->input('status',[
                                        'options' => [
                                          'All' => 'All Staffs',
                                          'In' => 'Logged-In/Back-from-Lunch',
                                          'OutToLunch' => 'Out-to-Lunch',
                                          'Out' => 'Logged-Out'
                                        ],
                                        'empty'=> 'Please select status...',
                                        'class' => 'form-control',
                                        'id' => 'status',
                                        'label' => ['class' => 'status'],
                                        'required' => true
                                    ]);
                                    echo '<br>';
                                    echo $this->Form->input('message',[
                                        'class' => 'form-control',
                                        'id' => 'input1',
                                        'type' => 'textarea',
                                        'placeholder' => 'Your message here...'
                                    ]);

                                ?>
                          </div>
                      </div>
                      <div class="modal-footer">
                        <?php
                            echo $this->Form->button(__('Submit'), ['class' => 'btn btn-raised btn-info', 'id' => 'submitButtonId', 'disabled' => 'disabled']);
                            echo $this->Html->link(__('Cancel'), ['controller' => 'BuzzMessage', 'action' => 'index'] ,['class' => 'btn btn-raised btn-default', 'style' => 'margin-left: 15px;']);
                            echo $this->Form->end();
                        ?>
                      </div>

                    </div>
                  </div>
                </div>
            </div>
            <div class="panel-body">
              <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                  <thead>
                      <tr>
                          <th><?php echo __('Recipent/s') ?></th>
                          <th><?php echo __('Status') ?></th>
                          <th><?php echo __('Message') ?></th>
                          <th><?php echo __('Date') ?></th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php foreach ($messages as $buzz):
                        if($buzz->user_id == $auth['id'] && $buzz->category != "history"): ?>
                      <tr>
                          <td>
                            <?php
                              echo $buzz->building != null ? $buzz->building : "";
                              echo $buzz->level != null ? " - " . $buzz->level : "";
                              echo $buzz->space != null ? " - " . $buzz->space : "";
                              echo $buzz->phase != null ? $buzz->phase : "";
                              echo $buzz->staff_name != null ? $buzz->staff_name : "";
                            ?>
                          </td>
                          <td><?php echo $buzz->status != null ? $buzz->status : "In" ?></td>
                          <td><?php echo h($buzz->message) ?></td>
                          <td><?php echo h($buzz->created) ?></td>
                      </tr>
                      <?php endif; endforeach; ?>
                  </tbody>
              </table>
            </div>
        </div>
    </div>


</div>
<script>
    $(document).ready(function() {
        $('#datatable-responsive').dataTable( {
                "aaSorting": [[ 3, "desc" ]]
            } );
    });

    $(':input').bind('keyup change', function(){

      if ($('#input1').val() != '' && $('#input2').val() != '' && $('#input3').val() != '' && $('#input4').val() != '')
      {
        $("#submitButtonId").prop('disabled', this.value == "" ? true : false);
      }
    });

    function getData(obj) {
      // console.log($(obj));
      if($(obj).val() != "") {
        $('#space').html('');
        $('#space').append('<option value="">Select space number</option>');
        <?php foreach ($suites as $key => $spaces): ?>
            if('<?= $key ?>' == $(obj).val()) {
              <?php ksort($spaces); ?>
              <?php foreach($spaces as $k => $space): ?>
              $('#space').append('<option value="' + '<?= $k ?>' + '">Space : ' + '<?= $k ?>' + '</option>');
              <?php endforeach; ?>
            }
        <?php endforeach ?>
      } else {
        $('#space').html('');
        $('#space').append('<option value="">Select a building first...</option>');
      }
    };
</script>
