<?= $this->Html->css(['buttons']); ?>

<div class="col-md-8 col-md-offset-2">
    <div class="x_panel">
      <div class="x_title">
        <h3>Back-up and Restore</h3>
      </div>
      <div class="x_content" style="text-align:center;">
        <?= $this->Form->create('', ['type' => 'file']); ?>
        <div class="row">
          <div class="col-md-5">
            <i class="fa fa-download" style="font-size:258px;color:#009cd0"></i>
            <a href="#" class="btn col-md-12" onclick="dbase(this)" data-type="backup">
                <span class="btn-content">Export Database</span>
                <span class="icon"><i class="fa fa-angle-down" aria-hidden="true"></i></span>
            </a>
          </div>
          <div class="col-md-5 col-md-offset-2">
            <i class="fa fa-upload" style="font-size:258px;color:rgb(31, 161, 48)"></i>
            <a href="#" class="btn btn-remove btn-alt-color col-md-12" onclick="dbase(this)" data-type="restore">
                <span class="btn-content">Import Database</span>
                <span class="icon"><i class="fa fa-angle-up" aria-hidden="true"></i></span>
            </a> <br>
            <?= $this->Form->input('file', ['class' => 'form-control', 'type' => 'file', 'label' => false, 'id' => 'file']); ?>
          </div>
        </div>
        <button type="submit" name="backup" style="display:none;" id="backup">Submit</button>
        <button type="submit" name="restore" style="display:none;" id="restore">Submit</button>
        <?= $this->Form->end(); ?>
      </div>
    </div>
</div>
<script>
  function dbase(obj)
  {
    if ($(obj).data('type') == 'backup') {
      $("#file").attr('required', false);
      $("#backup").click();
    } else if ($(obj).data('type') == 'restore') {
      $("#file").attr('required', true);
      $("#restore").click();
    }
  }
</script>