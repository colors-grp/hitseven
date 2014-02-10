<!doctype html>
<!--[if lt IE 7]> <html calss="ie ie6 no-js" lang="en"> <![endif]-->
<!--[if IE 7]>    <html calss="ie ie7 no-js" lang="en"> <![endif]-->
<!--[if IE 8]>    <html calss="ie ie8 no-js" lang="en"> <![endif]-->
<!--[if IE 9]>    <html calss="ie ie9 no-js" lang="en"> <![endif]-->
<!--[if gt IE 9]><!-->
<html class="no-js" lang="en">
    <!--<![endif]-->
    <!-- the "no-js" class is for bootstrap modernizer. !-->

    <head>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<!-- Simple Modal -->
		<script type='text/javascript' src= "<?= $this->config->item('platform_url');?>assets/js/simplemodal/js/jquery.simplemodal.js"></script>
		<script type='text/javascript' src= "<?= $this->config->item('platform_url');?>assets/js/simplemodal/js/basic.js"></script>
		<link rel="stylesheet" href= "<?= $this->config->item('platform_url');?>assets/js/simplemodal/css/basic.css">
		<!-- End of Simple Modal -->
		 
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta content="" name="author">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">    
        <title>The Color Compitition</title>
        <link rel="shortcut icon" href="#">
        <!-- Styles ==================================================================================================== -->
        <link rel="stylesheet" href="<?= base_url(); ?>webassets/css/bootstrap.css">
        <link rel="stylesheet" href="<?= base_url(); ?>webassets/css/bootstrap-theme.css">
        <!--<link rel="stylesheet" href="<?= base_url(); ?>webassets/css/jquery.custom-scrollbar.css">-->
        <link rel="stylesheet" href="<?= base_url(); ?>webassets/css/profile-custom-styles.css">
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300">
        <link rel="stylesheet" href="<?= base_url(); ?>webassets/css/style.css">

        <!-- HTML5 shim and Respond.js IE8 support for HTML5 elements and media quaries ================================ -->
        <!-- [if lt IE 9]>
            <script src="<?= base_url(); ?>webassets/js/html5shiv.js"></script>
            <script src="<?= base_url(); ?>webassets/js/respond.min.js"></script>
        <![endif]-->


    </head>
    <body>
    
<div class="container">
        
        
        <div class="header navbar navbar-static-top" style="position: fixed; top: 0;">
            
            <ul class="nav nav-pills navbar-right nav_top">
                <li>
                    <a href="#">
                        <img src="<?=base_url()?>webassets/img/profile.png" alt="Invite Friends">
                    </a>
                    <img class="indecator" src="<?=base_url()?>webassets/img/header_indecator_icon.png" alt="Header Indecator">
                </li>
                <li>
                    <a href="<?=base_url('message');?>">
                        <img src="<?=base_url()?>webassets/img/messages.png" alt="Notification">
                    </a>
                    <img class="indecator" src="<?=base_url()?>webassets/img/header_indecator_icon.png" alt="Header Indecator">
                </li>
                <li>
                    <a href="#">
                        <img src="<?=base_url()?>webassets/img/transactions.png" alt="Transactions">
                    </a>
                    <img class="indecator" src="<?=base_url()?>webassets/img/header_indecator_icon.png" alt="Header Indecator">
                </li>
                <li>
                    <a href="#">
                        <img src="<?=base_url()?>webassets/img/admin.png" alt="Admin">
                    </a>
                    <img class="indecator" src="<?=base_url()?>webassets/img/header_indecator_icon.png" alt="Header Indecator">
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle en" data-toggle="dropdown">
                        <img src="<?=base_url()?>webassets/img/global_en_icon.png" alt="English">
                    </a>
                    <ul class="dropdown-menu ar">
                        <li>
                            <a href="#">
                                <img src="<?=base_url()?>webassets/img/global_ar_icon.png" alt="Arabic">
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>

            <a href="#" class="navbar-brand">
                <img src="<?=base_url()?>webassets/img/logo.png" alt="The Color Competetion">
            </a>

        </div>


        <div class="jumbotron">
            
                <div class="cover-border">
                    <a href="#" class="cover">
                        <img src="https://graph.facebook.com/<?=$cover_id?>/picture" alt="" style="width: 852px; height: 308px;">
                    </a>
                </div>

                <ul class="nav nav-pills navbar-right cover-nav-right">
                    <li>
                        <a href="#">
                            <h3 class="marketbtn">Market</h3>
                            <img src="<?=base_url()?>webassets/img/buttons__not_active.png" alt="nonMarket">
                            <img class="activebtn" src="<?=base_url()?>webassets/img/buttons_active.png" alt="Market">
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <h3 class="mycollectionsbtn">My Collections</h3>
                            <img src="<?=base_url()?>webassets/img/buttons__not_active.png" alt="nonMy Collection">
                            <img class="activebtn" src="<?=base_url()?>webassets/img/buttons_active.png" alt="My Collection">
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <h3 class="scoreboardsbtn">Score Boards</h3>
                            <img src="<?=base_url()?>webassets/img/buttons__not_active.png" alt="nonScore Boards">
                            <img class="activebtn" src="<?=base_url()?>webassets/img/buttons_active.png" alt="Score Boards">
                        </a>
                    </li>
                </ul>

                <ul class="nav nav-pills cover-nav-user">
                    <li>
                        <div class="profile-pic-border">
                            <a href="#">
<!--                                <img src="https://graph.facebook.com/<?//=$fb_id?>/picture?type=large" alt="Profile Picture" style="width:140px; height:140px;">-->
                            	<img src = "<?= base_url()?>webassets/moi.jpg" alt="Profile Picture" style="width:140px; height:140px;">
                            </a>
                        </div>
                    </li>
                    <li><a href="#" class="username"> <?=$name?> </a></li>
                </ul>
        
        </div>
        <div style="clear: both"></div>
