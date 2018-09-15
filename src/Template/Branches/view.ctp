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
                        <h3><?= h($branch->name) ?></h3> 
                    </div>
        <div class="x_content">
            <table class="table table-bordered">
                <tr>
                    <th scope="row"><?= __('Name') ?></th>
                    <td><?= h($branch->name) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Description') ?></th>
                    <td><?= h($branch->description) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Id') ?></th>
                    <td><?= $this->Number->format($branch->id) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Created') ?></th>
                    <td><?= h($branch->created) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Is Main') ?></th>
                    <td><?= $branch->is_main ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
