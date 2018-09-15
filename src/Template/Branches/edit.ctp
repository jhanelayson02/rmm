<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Branch $branch
 */
?>
<nav class="col-md-6 col-md-offset-3" id="actions-sidebar">

    <?= $this->Html->link(__('List Branches'), ['action' => 'index'],['class' => 'btn-success btn']) ?>
    
</nav>
<div class="col-md-6 col-md-offset-3 col-sm-6 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <?= $this->Form->create($branch) ?>
        </div>
        <div class="x_content">
                <fieldset>
                    <legend><?= __('Edit Branch') ?></legend>
                    <?php
                        echo $this->Form->control('name', ['class' => 'form-control']);
                        echo $this->Form->control('description', ['class' => 'form-control']);
                        echo $this->Form->control('is_main');
                    ?>
                </fieldset>
                <?= $this->Form->button('Submit',['class' => 'btn btn-success']) ?>
                <?= $this->Form->end() ?>
        </div>
    </div>
</div>
