<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="col-md-offset-3 col-md-6 medium-4 columns" id="actions-sidebar">  

    <?= $this->Html->link(__('List Users'), ['action' => 'index'],['class' => 'btn-success btn']) ?>
       
</nav>
<div class="col-md-6 col-md-offset-3 col-sm-6 col-xs-12">
    <div class="x_panel">
            <div class="x_title">
                <h3><?= h($user->id) ?></h3> 
            </div>
        <div class="x_content">
                <table class="table table-bordered">
                    <tr>
                        <th scope="row"><?= __('First Name') ?></th>
                        <td><?= h($user->first_name) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Last Name') ?></th>
                        <td><?= h($user->last_name) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Username') ?></th>
                        <td><?= h($user->username) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Id') ?></th>
                        <td><?= $this->Number->format($user->id) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Created') ?></th>
                        <td><?= h($user->created) ?></td>
                    </tr>
                </table>
        </div>
    </div>
</div>
