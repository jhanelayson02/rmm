<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 */
?>
<nav class="col-md-6 col-md-offset-3 col-sm-6 col-xs-12" id="actions-sidebar">
       
        <?= $this->Html->link(__('List Branch Products'), ['action' => 'index'], ['class' => 'btn btn-success' ]) ?>
    
</nav>
<div class="col-md-6 col-md-offset-3 col-sm-6 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <?= $this->Form->create($product) ?>
        </div>
        <div class="x_content">
   
        <fieldset>
            <legend><?= __('Edit Product') ?></legend>
            <?php
                echo $this->Form->control('item_code', ['class' => 'form-control']);
                echo $this->Form->control('name', ['class' => 'form-control']);
                echo $this->Form->control('description', ['class' => 'form-control']);
                echo $this->Form->control('price', ['class' => 'form-control']);
                echo $this->Form->control('unit', ['class' => 'form-control']);
            ?>
        </fieldset>

        <br>
        <?= $this->Form->button('Submit', ['class' => 'btn btn-success']) ?>
        <?= $this->Form->end() ?>
        </div>
    </div>
</div>, 