<?php $auth = $this->request->session()->read('Auth.User');?>
    
<div class="col-md-10 col-sm-6 col-xs-12 col-md-offset-1 content">
    <div class="x_panel">
      <div class="x_title">
        <h2> Borrowing </h2>
         <div class="clearfix"></div>
      </div>
      <div class="x_content">
          <div class="row">
              <?php if ($auth['is_main'] == 1) { ?>
                <div class="col-md-4">
                    <?= $this->Html->link('Products', 
                    ['controller' => 'Products', 'action' => 'archive'],
                    ['class' => 'btn btn-info col-md-12']
                    ); ?>
                </div>
                <div class="col-md-4">
                    <?= $this->Html->link('Branches', 
                    ['controller' => 'Branches', 'action' => 'archive'],
                    ['class' => 'btn btn-info col-md-12']
                    ); ?>
                </div>
                <div class="col-md-4">
                    <?= $this->Html->link('Accounts', 
                    ['controller' => 'Users', 'action' => 'archive'],
                    ['class' => 'btn btn-info col-md-12']
                    ); ?>
                </div>

                <?php } elseif ($auth['is_main'] == 0) { ?>
                    <div class="col-md-6">
                        <?= $this->Html->link('Products', 
                        ['controller' => 'Products', 'action' => 'archive'],
                        ['class' => 'btn btn-default col-md-12']
                        ); ?>
                    </div>
                    <div class="col-md-6">
                        <?= $this->Html->link('Accounts', 
                        ['controller' => 'Users', 'action' => 'archive'],
                        ['class' => 'btn btn-info col-md-12']
                        ); ?>
                    </div>
                <?php } ?>  

                <div class="col-md-4 col-md-offset-2">
                    <?= $this->Html->link('Support', 
                    ['controller' => 'Tickets', 'action' => 'archive'],
                    ['class' => 'btn btn-info col-md-12']
                    ); ?>
                </div>
                <div class="col-md-4">
                    <?= $this->Html->link('Borrowing', 
                    ['controller' => 'Borrow', 'action' => 'archive'],
                    ['class' => 'btn btn-default col-md-12']
                    ); ?>
                </div> 

          </div>
      </div>
    </div>

    <div class="x_panel">
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
                            echo $this->Form->postLink(__('<i class="fa fa-archive"></i> Restore'), ['action' => 'delete', $request->id, '?' => ['type' => 'restore']], ['confirm' => __('Are you sure you want to restore this request?'), 'class' => 'text-success', 'escape' => false]);
                        ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

      </div>
    </div>
</div>
