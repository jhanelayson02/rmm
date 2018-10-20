<?php $auth = $this->request->session()->read('Auth.User'); ?>
<div class="col-md-12">
  <div class="row">
    <div class="col-md-3">
      <div class="row">
        <div class="col-md-12">
          <?= $this->Form->button('Backlog', ['class' => 'btn btn-primary col-md-12']) ?>
          <?php 
          foreach ($orders as $order) :
            if ($order['status'] == 'Backlog' && ($auth['branch_id'] == $order['user']['branch_id'] || $auth['is_main'] == 1)) : 
          ?>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <a href="/rmm/cart/view/<?= $order['id'] ?>">
                      Ordered by: <?= $order['user']['first_name'] . ' ' . $order['user']['last_name'] ?>
                      <?php if ($auth['is_main'] == 1) { ?>
                        <br>Branch : <?= $order['user']['branch']['name'] ?>
                      <?php } ?>
                    </a>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    Date: <?= $order['created'] ?>
                  </div>
                </div>
              </div>
          <?php
            endif;
          endforeach;
          ?>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="row">
        <div class="col-md-12">
          <?= $this->Form->button('In-Progress', ['class' => 'btn btn-primary col-md-12']) ?>
          <?php 
          foreach ($orders as $order) :
            if ($order['status'] == 'In-Progress' && ($auth['branch_id'] == $order['user']['branch_id'] || $auth['is_main'] == 1)) : 
          ?>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <a href="/rmm/cart/view/<?= $order['id'] ?>">
                      Ordered by: <?= $order['user']['first_name'] . ' ' . $order['user']['last_name'] ?>
                      <?php if ($auth['is_main'] == 1) { ?>
                        <br>Branch : <?= $order['user']['branch']['name'] ?>
                      <?php } ?>
                    </a>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    Date: <?= $order['created'] ?>
                  </div>
                </div>
              </div>
          <?php
            endif;
          endforeach;
          ?>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="row">
        <div class="col-md-12">
          <?= $this->Form->button('Delivered', ['class' => 'btn btn-primary col-md-12']) ?>
          <?php 
          foreach ($orders as $order) :
            if ($order['status'] == 'Delivered' && ($auth['branch_id'] == $order['user']['branch_id'] || $auth['is_main'] == 1)) : 
          ?>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <a href="/rmm/cart/view/<?= $order['id'] ?>">
                      Ordered by: <?= $order['user']['first_name'] . ' ' . $order['user']['last_name'] ?>
                      <?php if ($auth['is_main'] == 1) { ?>
                        <br>Branch : <?= $order['user']['branch']['name'] ?>
                      <?php } ?>
                    </a>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    Date: <?= $order['created'] ?>
                  </div>
                </div>
              </div>
          <?php
            endif;
          endforeach;
          ?>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="row">
        <div class="col-md-12">
          <?= $this->Form->button('Received', ['class' => 'btn btn-primary col-md-12']) ?>
          <?php 
          foreach ($orders as $order) :
            if ($order['status'] == 'Received' && ($auth['branch_id'] == $order['user']['branch_id'] || $auth['is_main'] == 1)) : 
          ?>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <a href="/rmm/cart/view/<?= $order['id'] ?>">
                      Ordered by: <?= $order['user']['first_name'] . ' ' . $order['user']['last_name'] ?>
                      <?php if ($auth['is_main'] == 1) { ?>
                        <br>Branch : <?= $order['user']['branch']['name'] ?>
                      <?php } ?>
                    </a>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    Date: <?= $order['created'] ?>
                  </div>
                </div>
              </div>
          <?php
            endif;
          endforeach;
          ?>
        </div>
      </div>
    </div>
  </div>
</div>
