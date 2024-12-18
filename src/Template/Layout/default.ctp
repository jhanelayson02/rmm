<?php
$auth = $this->request->session()->read('Auth.User');
// pr($auth);exit;
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

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

    <!-- <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet"> -->
    <?= $this->Html->css(['bootstrap', 'custom.min', 'font-awesome.min','dataTables.bootstrap.min']) ?>

    <?= $this->Html->script(['jquery.min', 'bootstrap.min', 'custom','jquery.dataTables.min']);?>

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
              <a class="site_title"><i class="fa fa-paw"></i> <span>RMM Meatshop</span></a>
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
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                <div class="menu_section">
                    <ul class="nav side-menu">
                        <li><?= $this->Html->link('<i class="fa fa-tachometer"></i> Dashboard  <span class="fa fa-chevron-right"></span>', ['controller' => 'cart', 'action' => 'dashboard'], ['escape' => false]); ?>
                        </li>

                        <li> <?= $this->Html->link('<i class="fa fa-users"></i> Accounts  <span class="fa fa-chevron-right"></span>', ['controller' => 'users', 'action' => 'index'], ['escape' => false]); ?>
                        </li>

                        <li><?= $this->Html->link('<i class="fa fa-sitemap"></i> Branches  <span class="fa fa-chevron-right"></span>', ['controller' => 'branches', 'action' => 'index'], ['escape' => false]); ?>
                        </li>

                        <li><?= $this->Html->link('<i class="fa fa-file"></i> Inventory  <span class="fa fa-chevron-right"></span>', ['controller' => 'BranchProducts', 'action' => 'view', $auth['branch_id']], ['escape' => false]); ?>
                        </li>

                        <li><?= $this->Html->link('<i class="fa fa-cutlery"></i> Products  <span class="fa fa-chevron-right"></span>', ['controller' => 'products', 'action' => 'index'], ['escape' => false]); ?>
                        </li>

                        <li><?= $this->Html->link('<i class="fa fa-shopping-cart"></i> Order  <span class="fa fa-chevron-right"></span>', ['controller' => 'BranchProducts', 'action' => 'order'], ['escape' => false]); ?>
                        </li>

                        <li><?= $this->Html->link('<i class="fa fa-shopping-cart"></i> Audit Trail  <span class="fa fa-chevron-right"></span>', ['controller' => 'Users', 'action' => 'auditTrail'], ['escape' => false]); ?>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
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
        <div class="right_col" role="main">
            <?= $this->Flash->render() ?>
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
