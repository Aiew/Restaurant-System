<?php

  //echo 'Welcome, ' . $this->session->userdata('username');
  //echo '</br>';
  //echo '<a href="' .base_url('home/logout'). '">Logout</a>';

?>


<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo base_url('public'); ?>/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('public'); ?>/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <link rel="stylesheet" href="<?php echo base_url('public'); ?>/dist/css/skins/skin-blue.min.css">



    <link rel="stylesheet" href="<?php echo base_url('public'); ?>/dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo base_url('public'); ?>/plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="<?php echo base_url('public'); ?>/plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?php echo base_url('public'); ?>/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="<?php echo base_url('public'); ?>/plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo base_url('public'); ?>/plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="<?php echo base_url('public'); ?>/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <!-- Main Header -->
      <header class="main-header">

        <!-- Logo -->
        <a href="starter.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>S</b>KS</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Sukkasem</b></span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->


              <!-- User Account Menu -->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
                  <img src="<?php echo base_url('public'); ?>/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class="hidden-xs"><?php echo $this->session->userdata('username');?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  <li class="user-header">
                    <img src="<?php echo base_url('public'); ?>/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                    <p>
                      <?php echo $this->session->userdata('name');?>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <!--
                  <li class="user-body">
                    <div class="col-xs-4 text-center">
                      <a href="#">Followers</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Sales</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Friends</a>
                    </div>
                  </li>
                -->
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="<?php echo base_url('dashboard/profile'); ?>" class="btn btn-default btn-flat">ข้อมูลส่วนตัว</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?php echo base_url('home/logout')?>" class="btn btn-default btn-flat">ออกจากระบบ</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <!--<li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>-->
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- Sidebar user panel (optional) -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo base_url('public'); ?>/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <!--change name-->
              <p><?php echo $this->session->userdata('username');?></p>
              <!-- Status -->
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>

          <!-- search form (Optional) >
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          </.search form -->

          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
            <li class="header">เมนูหลัก</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active" ><a href="<?php echo site_url('dashboard'); ?>"><i class="fa fa-link"></i> <span>หน้าหลัก</span></a></li>
            <li><a href="<?php echo site_url('dashboard/profile'); ?>"><i class="fa fa-link"></i> <span>ข้อมูลส่วนตัว</span></a></li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-table"></i> <span>ลูกค้า</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo site_url('dashboard/memberList'); ?>"><i class="fa fa-circle-o"></i> รายชื่อลูกค้า</a></li>
                <li><a href="<?php echo site_url('dashboard/memberAdd'); ?>"><i class="fa fa-circle-o"></i> เพิ่มลูกค้า</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-table"></i> <span>พนักงาน</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo site_url('dashboard/employeeList'); ?>"><i class="fa fa-circle-o"></i> รายชื่อพนักงาน</a></li>
                <li><a href="<?php echo site_url('dashboard?employeeAdd'); ?>"><i class="fa fa-circle-o"></i> เพิ่มลูกค้า</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-table"></i> <span>สินค้า</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo site_url('dashboard/stock_list'); ?>"><i class="fa fa-circle-o"></i> รายชื่อสินค้า</a></li>
                <li><a href="<?php echo site_url('dashboard/stock_add'); ?>"><i class="fa fa-circle-o"></i> เพิ่มสินค้า</a></li>
              </ul>
            </li>
            <li ><a href="<?php echo site_url('dashboard/table'); ?>"><i class="fa fa-table"></i> <span>โต๊ะ</span></a></li>
            <li ><a href="<?php echo site_url('dashboard/reservation'); ?>"><i class="fa fa-table"></i> <span>การจอง</span></a></li>
          </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>
