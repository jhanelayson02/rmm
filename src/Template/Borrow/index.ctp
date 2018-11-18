<?php $auth = $this->request->session()->read('Auth.User'); ?>
<div class="">
  <div class="col-md-12">
    <div class="x_panel">
      <div class="x_title">
        <div class="row">
            <div class="col-md-6">
                <h3><?= __('Borrowing') ?></h3>
            </div>
            <div class="col-md-6">
                <button type="button" class="btn btn-info pull-right" id="validate" data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fa fa-book"></i> New Request</button>
            </div>
        </div>
      </div>
      <div class="x_content">
        <table id="datatable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Date Requested</th>
                    <th>Item Code</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Borrower</th>
                    <th>Lender</th>
                    <th>Status</th>
                    <th class="actions">Actions</th>
                </tr>
            </thead>
            <tbody>
				<?php foreach($borrow as $request) : //pr($auth); exit; ?>
                <tr>
                    <td><?= h($request->created) ?></td>
                    <td><?= h($request->product->item_code) ?></td>
                    <td><?= h($request->product->name) ?></td>
                    <td><?= h($request->qty) ?></td>
                    <td><?= $request->user->first_name.' '. $request->user->last_name . ' (' . $request->user->branch->name . ')' ?></td>
                    <td><?= $request->branch->name ?></td>
                    <td><?= $request->status ?></td>
                    <td class="actions">
                        <?php
                            if ($request->status == 'Backlog') {
                                echo $this->Form->postLink(__('<i class="fa fa-edit"></i> Mark as Received'), ['action' => 'delete', $request->id, '?' => ['status' => 'Received']], ['confirm' => __('Are you sure you want mark this request as Received?'), 'class' => 'text-success', 'escape' => false]);
                                echo "<br>";
                            } elseif ($request->status == 'Received') {
                                echo $this->Form->postLink(__('<i class="fa fa-edit"></i> Mark as Returned'), ['action' => 'delete', $request->id, '?' => ['status' => 'Returned']], ['confirm' => __('Are you sure you want mark this request as Returned?'), 'class' => 'text-success', 'escape' => false]);
                            }
                            
                            if ($request->status == 'Backlog') {
                                echo $this->Form->postLink(__('<i class="fa fa-trash"></i> Cancel'), ['action' => 'delete', $request->id, '?' => ['status' => 'Cancelled']], ['confirm' => __('Are you sure you want to cancel this request?'), 'class' => 'text-danger', 'escape' => false]);
                                echo "&nbsp;|&nbsp;";
                            }

                            if ($request->status == 'Returned' || $request->status == 'Backlog' ||  $request->status == 'Cancelled') {
                                echo $this->Form->postLink(__('<i class="fa fa-archive"></i> Archive'), ['action' => 'delete', $request->id, '?' => ['type' => 'archive']], ['confirm' => __('Are you sure you want to archive this request?'), 'class' => 'text-danger', 'escape' => false]);
                            }
                        ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- Modal -->
        <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-sm">
            <div class="modal-content">

                <div class="modal-header">
                </button>
                <h4 class="modal-title" id="myModalLabel2">Add Request</h4>
                </div>
                <div class="modal-body">
                    <div class="users content">
                        <?= $this->Form->create('', ['url' => ['action' => 'add']]) ?>
                            <?php
                            echo $this->Form->hidden('user_id', ['value' => $auth['id']]);
                            echo $this->Form->hidden('status',['value' => 'Backlog']);
                            echo $this->Form->input('product_id',[
                                'options' => $products,
                                'class' => 'form-control',
                                'required' => true
                            ]);
                            
                            echo $this->Form->input('qty', [
                                'class' => 'form-control',
                                'type' => 'number',
                                'step' => '0.01',
                                'label' => 'Quantity',
                                'required' => true
                            ]);

                            echo $this->Form->input('branch_id', [
                                'options' => $branches,
                                'class' => 'form-control',
                                'label' => 'Borrowing from'
                            ]);
                            
                        ?>
                    </div>
                </div>
                <div class="modal-footer">
                <?php
                    echo $this->Form->button(__('Submit'), ['class' => 'btn btn-raised btn-info', 'id' => 'submitButtonId']);
                    echo $this->Form->end();
                ?>
                </div>

            </div>
            </div>
        </div>
        <!-- End Modal -->

      </div>
    </div>
  </div>
</div>
