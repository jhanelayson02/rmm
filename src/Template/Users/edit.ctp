<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="col-md-6 col-md-offset-3" id="actions-sidebar">

    <?= $this->Html->link(__('List Users'), ['action' => 'index'],['class' => 'btn-success btn']) ?>

</nav>
<div class="col-md-6 col-md-offset-3 col-sm-6 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <?= $this->Form->create($user) ?>
        </div>
        <div class="x_content">

            <fieldset>
                <legend><?= __('Edit User') ?></legend>
                <?php
                    echo $this->Form->control('first_name', ['class' => 'form-control']);
                    echo $this->Form->control('last_name', ['class' => 'form-control']);
                    echo $this->Form->control('username', ['class' => 'form-control']);
                    echo $this->Form->control('email', ['class' => 'form-control', 'type' => 'email']);
                    echo $this->Form->input('role', [
                      'options' => ['cashier' => 'Cashier', 'admin' => 'Admin'],
                      'class' => 'form-control',
                    ]);
                    echo $this->Form->input('branch_id', [
                      'options' => $branches,
                      'class' => 'form-control',
                    ]);
                ?>
            </fieldset>
            <br>
            <?= $this->Form->button('Submit', ['class' => 'btn btn-success'])   ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
