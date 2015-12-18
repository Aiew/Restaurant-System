<!DOCTYPE html>
<!--[if IE 7 ]> <html class="ie ie7"> <![endif]-->
<!--[if IE 8 ]> <html class="ie ie8"> <![endif]-->
<!--[if IE 9 ]> <html class="ie ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html class="" lang="en"> <!--<![endif]-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">

    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Playfair+Display:400,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Quattrocento+Sans:400,400italic,700,700italic' rel='stylesheet' type='text/css'>

    <!-- CSS LIBRARY -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('public'); ?>/css/lib/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('public'); ?>/css/lib/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('public'); ?>/css/lib/font-awesome.min.css">

    <!-- ANIMATION -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('public'); ?>/css/awe-fonts.css">

    <!-- PAGE STYLE -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('public'); ?>/css/style.css">
    <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->

    <title>Sukhasem</title>
</head>
<body>

<!-- PRELOADER -->
<!--
<div class="preloader">
    <div class="inner">
        <div class="item item1"></div>
        <div class="item item2"></div>
        <div class="item item3"></div>
    </div>
</div>
-->
<!-- END / PRELOADER -->

<!-- PAGE WRAP -->
<div id="page-wrap">

    <!-- HEADER -->
    <header id="header" class="header header-1">
        <div class="container">
            <!-- LOGO -->
            <div class="logo"><a href="./"><img src="<?php echo base_url('public')?>/images/logo.png" alt=""></a></div>
            <!-- END / LOGO -->

            <!-- OPEN MENU MOBILE -->
            <div class="open-menu-mobile">
                <span>Toggle menu mobile</span>
            </div>
            <!-- END / OPEN MENU MOBILE -->

            <!-- NAVIGATION -->
            <nav class="navigation text-right" data-menu-type="1200">
                <!-- NAV -->
                <ul class="nav text-uppercase">
                    <?php $currpage = uri_string();?>
                    <li <?php if($currpage=='home')  {echo 'class="current-menu-item"';} ?>><a href="<?php echo base_url('home') ?>">Home</a></li>
                    <li <?php if($currpage=='home/about') {echo 'class="current-menu-item"';} ?>><a href="<?php echo base_url('home/about') ?>">About</a></li>
                    <li <?php if($currpage=='home/menu')  {echo 'class="current-menu-item"';} ?>><a href="<?php echo base_url('home/menu') ?>">Menu</a></li>
                    <li <?php if($currpage=='home/reserve') {echo 'class="current-menu-item"';}?>><a href="<?php echo base_url('home/reserve') ?>">Reservation</a></li>
                    <?php
                      if ($this->session->userdata('is_logged_in')){
                        echo '<li><a href="' .base_url('home/logout'). '">Logout</a></li>';
                      } else {
                        echo '<li><a href="' .base_url('home/login'). '">Login</a></li>';
                        echo '<li><a href="' .base_url('home/register'). '">Register</a></li>';
                      }
                    ?>
                </ul>
                <!--li <?php if($currpage=='home/login') {echo 'class="current-menu-item"';}?>><a href="<?php echo base_url('home/login') ?>">Login</a></li>
                <li <?php if($currpage=='home/register') {echo 'class="current-menu-item"';}?>><a href="<?php echo base_url('home/register') ?>">Register</a></li-->

                <!-- END / NAV -->
                <!-- MINICART -->
                <!--
                <div class="minicart-wrap">
                    <div class="toggle-minicart active">
                        <span class="text-uppercase">Cart</span>
                    </div>
                    <div class="minicart-body">
                        <h4 class="xsm text-uppercase text-center">Your cart</h4>
                        <ul class="minicart-list">
                            <li>
                                <div class="product-thumb">
                                    <img src="images/shop/img-2.jpg" alt="">
                                </div>
                                <div class="product-name">
                                    <a href="#">Name of the Dish ( L )</a>
                                </div>
                                <div class="qty-wrap">
                                    <span class="product-quantity">
                                        <span class="quantity">2</span> serves.
                                    </span>
                                    <span class="amount">$48</span>
                                </div>
                                <div class="product-remove">
                                    <a href="#"><i class="icon awe_close"></i></a>
                                </div>
                            </li>

                            <li>
                                <div class="product-thumb">
                                    <img src="images/shop/img-2.jpg" alt="">
                                </div>
                                <div class="product-name">
                                    <a href="#">Name of the Dish ( L )</a>
                                </div>
                                <div class="qty-wrap">
                                    <span class="product-quantity">
                                        <span class="quantity">2</span> serves.
                                    </span>
                                    <span class="amount">$48</span>
                                </div>
                                <div class="product-remove">
                                    <a href="#"><i class="icon awe_close"></i></a>
                                </div>
                            </li>
                        </ul>
                        <div class="minicart-total">
                            Total
                            <span class="amount pull-right">$120</span>
                        </div>

                        <div class="minicart-footer">
                            <a href="checkout.html" class="awe-btn awe-btn-1 awe-btn-default text-uppercase">Check out</a>
                        </div>

                    </div>
                </div>
            -->
                <!-- END / MINICART -->

                <!-- SOCIAL -->
                <!--
                <div class="head-social">
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-pinterest"></i></a>
                    <a href="#"><i class="fa fa-facebook"></i></a>
                </div>
            -->
                <!-- END / SOCIAL -->
            </nav>
            <!-- END / NAVIGATION -->
        </div>

    </header>
