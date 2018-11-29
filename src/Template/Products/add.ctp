<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 */
?>
<nav class="col-md-offset-3 col-md-6 columns" id="actions-sidebar">

        <?= $this->Html->link(__('List Products'), ['action' => 'index'],['class' => 'btn-success btn']) ?>

</nav>

<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 content">
<div class="x_panel">
  <div class="x_title">
    <div class="clearfix"></div>
  </div>
  <div class="x_content">


        <?= $this->Form->create($product, ['type' => 'file']) ?>
<fieldset>
    <legend><?= __('Add Product') ?></legend>
    <?php
        echo $this->Form->input('item_code',['class' => 'form-control']);
        echo $this->Form->control('name',['class' => 'form-control']);
        echo $this->Form->control('description',['class' => 'form-control']);
        echo $this->Form->control('type',[
            'options' => [
                'pork' => 'Pork Products',
                'chicken' => 'Chicken Products',
                'beef' => 'Beef Products',
                'value-added' => 'Value-Added Products'
            ],
            'class' => 'form-control'
        ]);
        echo $this->Form->control('o_price',['label' => 'Original Price','class' => 'form-control']);
        echo $this->Form->control('price',['class' => 'form-control']);
        echo $this->Form->control('unit',[
            'options' => [
                'kg' => 'kg',
                'pcs' => 'pcs',
                'pack/s' => 'pack/s',
                'lbs' => 'lbs',
                'kg' => 'kg',
            ],
            'class' => 'form-control']);
        echo $this->Form->input('image',['class' => 'form-control', 'type' => 'file']);

    ?>
</fieldset>
    <br><?= $this->Form->button('Submit', ['class' => 'btn btn-success']) ?>
    <?= $this->Form->end() ?>

    </div>
</div>
</div>
