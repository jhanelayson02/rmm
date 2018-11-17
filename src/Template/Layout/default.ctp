<?php
$auth = $this->request->session()->read('Auth.User');

$cakeDescription = 'RMM';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css(['jquery-ui.min','bootstrap.min', 'dataTables.bootstrap', 'custom.min', 'bootstrap-datetimepicker.min']) ?>
    <link href='https://fonts.googleapis.com/css?family=Anaheim' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <?= $this->Html->script(['jquery.min', 'bootstrap.min', 'custom.min', 'jquery.dataTables.min', 'moment.min', 'bootstrap-datetimepicker.min']);?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body class="nav-md">
    <div class="container body" style="background-color: #f7f7f7;">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a class="site_title"><i class="fa fa-cutlery"></i> <span>RMM Meatshop</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <?= $this->Html->image('img.jpg', ['class' => 'img-circle profile_img']) ?>
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?= $auth['first_name'] . " " . $auth['last_name'] ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu"style="min-height: -webkit-fill-available;">
                <div class="menu_section">
                    <ul class="nav side-menu">
                        <li><?= $this->Html->link('<i class="fa fa-tachometer"></i> Dashboard  <span class="fa fa-chevron-right"></span>', ['controller' => 'cart', 'action' => 'dashboard'], ['escape' => false]); ?>
                        </li>

                        <li> <?= $this->Html->link('<i class="fa fa-users"></i> Accounts  <span class="fa fa-chevron-right"></span>', ['controller' => 'users', 'action' => 'index'], ['escape' => false]); ?>
                        </li>

                        <li><?= $this->Html->link('<i class="fa fa-file"></i> Inventory  <span class="fa fa-chevron-right"></span>', ['controller' => 'BranchProducts', 'action' => 'view', $auth['branch_id']], ['escape' => false]); ?>
                        </li>

                        <li><?= $this->Html->link('<i class="fa fa-shopping-cart"></i> Order  <span class="fa fa-chevron-right"></span>', ['controller' => 'BranchProducts', 'action' => 'order'], ['escape' => false]); ?>
                        </li>

                        <li><?= $this->Html->link('<i class="fa fa-money"></i> Sales  <span class="fa fa-chevron-right"></span>', ['controller' => 'Sales', 'action' => 'index'], ['escape' => false]); ?>
                        </li>
                        
                        <li><?= $this->Html->link('<i class="fa fa-ticket"></i> Tickets  <span class="fa fa-chevron-right"></span>', ['controller' => 'Tickets', 'action' => 'index'], ['escape' => false]); ?>
                        </li>

                        <?php if ($auth['is_main']) { ?>
                        <li><?= $this->Html->link('<i class="fa fa-sitemap"></i> Branches  <span class="fa fa-chevron-right"></span>', ['controller' => 'branches', 'action' => 'index'], ['escape' => false]); ?>
                        </li>

                        <li><?= $this->Html->link('<i class="fa fa-cutlery"></i> Products  <span class="fa fa-chevron-right"></span>', ['controller' => 'products', 'action' => 'index'], ['escape' => false]); ?>
                        </li>

                        <li><?= $this->Html->link('<i class="fa fa-cloud-download"></i> Backup and Restore  <span class="fa fa-chevron-right"></span>', ['controller' => 'Products', 'action' => 'backup'], ['escape' => false]); ?>
                        </li>

                        <li><?= $this->Html->link('<i class="fa fa-archive"></i> Archive <span class="fa fa-chevron-right"></span>', ['controller' => 'Products', 'action' => 'archive'], ['escape' => false]); ?>
                        </li>
                        <?php } ?>
                        
                        <li><?= $this->Html->link('<i class="fa fa-shopping-cart"></i> Audit Trail  <span class="fa fa-chevron-right"></span>', ['controller' => 'Users', 'action' => 'auditTrail'], ['escape' => false]); ?>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /sidebar menu -->

          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <?= $this->Html->image('img.jpg', ['alt' => '']) ?><?= $auth['first_name'] . " " . $auth['last_name'] ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><?= $this->Html->link('<i class="fa fa-sign-out pull-right"></i> Log Out', ['controller' => 'users', 'action' => 'logout'], ['escape' => false]); ?></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->
        <div class="right_col" role="main" style="min-height: 707px;">
            <div class="col-md-4 col-md-offset-8">
              <?= $this->Flash->render() ?>
            </div> 
            <?= $this->fetch('content') ?>
        </div>
        </div>
        </div>
        <footer>
          <div class="pull-right">
            © RMM Meeat Shop 2018. All Rights Reserved.
          </div>
          <div class="clearfix"></div>
        </footer>
</body>
</html>
