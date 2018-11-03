<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Branch $branch
 */
?>
<nav class="col-md-offset-3 col-md-6 medium-4 columns" id="actions-sidebar">  
        <?= $this->Html->link(__('List Branches'), ['action' => 'index'],['class' => 'btn-success btn']) ?>
</nav>

<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 content">
<div class="x_panel">
  <div class="x_title">
    <div class="clearfix"></div>
  </div>
  <div class="x_content">

 <?= $this->Form->create($branch) ?>
    <fieldset>
        <legend><?= __('Add Branch') ?></legend>
        <?php
            echo $this->Form->control('name',['class' => 'form-control']);
            echo $this->Form->control('description',['class' => 'form-control']);
        ?>
    </fieldset>
    <?= $this->Form->button('Submit', ['class' => 'btn btn-success']) ?>
    <?= $this->Form->end() ?>

  </div>
</div>
</div>
