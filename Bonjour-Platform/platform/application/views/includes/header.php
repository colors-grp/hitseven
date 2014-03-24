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
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1256">
	<title>The Colors Concorrenza</title>
	<link type="text/css" rel="stylesheet" href="<?=base_url()?>/h7-assets/resources/bootstrap/css/bootstrap.css"/>
	<link type="text/css" rel="stylesheet" href="<?=base_url()?>/h7-assets/resources/bootstrap/css/bootstrap-theme.css"/>
	<link type="text/css" rel="stylesheet" href="<?=base_url()?>/h7-assets/resources/css/style.css"/>
	
	<link href="http://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>/h7-assets/resources/css/demo.css">
<!-- 	Alertify -->
		<script src="<?=base_url()?>/h7-assets/resources/alertify/lib/alertify.min.js"></script>
    
    	<link rel="stylesheet" href="<?=base_url()?>/h7-assets/resources/alertify/themes/alertify.core.css" />
		<link rel="stylesheet" href="<?=base_url()?>/h7-assets/resources/alertify/themes/alertify.default.css" />
<!--     Alertify End -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>	
<!-- 	<script src="<?=base_url()?>/h7-assets/resources/bootstrap/js/bootstrap.min.js"></script> -->
	<script src="<?=base_url()?>/h7-assets/resources/bootstrap/js/dropdown.js"></script>
    <script type="text/javascript" src="<?=base_url()?>/h7-assets/resources/js/jquery.js"></script> 

<!-- Simple Modal -->
<script type='text/javascript'
	src="<?= $this->config->item('platform_url');?>assets/js/simplemodal/js/jquery.simplemodal.js"></script>
<script type='text/javascript'
	src="<?= $this->config->item('platform_url');?>assets/js/simplemodal/js/basic.js"></script>
<link rel="stylesheet"
	href="<?= $this->config->item('platform_url');?>assets/js/simplemodal/css/basic.css">
<!-- End of Simple Modal -->
    
<script>
	function alert_success(message){
    	alertify.success(message);
    	return false;
    }
    
    function alert_error(message){
    	alertify.error(message);
    	return false;
    }
    
    function alert_warning(message){
    	alertify.warning(message);
    	return false;
    }
    
    function alert_info(){
    	alertify.info(message);
    	return false;
    }
</script>
<!-- Header Begin -->
	<div class="navbar navbar-inverse navbar-fixed-top">
		 <div id = "header-container">
		 <div class="navbar-header">
			<h4 style = "color: white;">
				<img id = "header-pic" src = "http://graph.facebook.com/<?=$fb_id?>/picture" alt="Profile Picture">
				<?=$name?>
			</h4>
		 </div>
		 <ul class="nav nav-pills navbar-right" style = "height:40px;" >
		 	<li>
		 		<a href="#">
                	<img src="<?=base_url()?>/h7-assets/resources/img/main-icons/friends.png" alt="invite-friends" width = "30" >
                </a>
		 	</li>
		 	<li><img class = "indicator" src="<?=base_url()?>/h7-assets/resources/img/main-icons/header_indecator_icon.png" alt=""></li>
		 	<li>
		 		<a href="#">
                	<img src="<?=base_url()?>/h7-assets/resources/img/main-icons/notifications.png" alt="notifications" width = "30" >
                </a>
		 	</li>
		 	<li><img class = "indicator" src="<?=base_url()?>/h7-assets/resources/img/main-icons/header_indecator_icon.png" alt=""></li>
		 	<li>
		 		<a href="<?=base_url()?>index.php?/activity_log/show_log">
                	<img src="<?=base_url()?>/h7-assets/resources/img/main-icons/activitylog.png" alt="activity-log" width = "30" >
                </a>
		 	</li>
		 	<li><img class = "indicator" src="<?=base_url()?>/h7-assets/resources/img/main-icons/header_indecator_icon.png" alt=""></li>
		 	<li>
		 		<a href="<?= base_url()?>index.php?/admin_page">
                	<img src="<?=base_url()?>/h7-assets/resources/img/main-icons/admin.png" alt="admin-icon" width = "30" >
                </a>
		 	</li>
		 	<li><img class = "indicator" src="<?=base_url()?>/h7-assets/resources/img/main-icons/header_indecator_icon.png" alt=""></li>
		 	<li class="dropdown">
            	<a href="#" class="dropdown-toggle" data-toggle="dropdown" style = "height: 42px;">
                	<img id = "en-icon" src="<?=base_url()?>/h7-assets/resources/img/main-icons/en_icon.png" alt="English" width = "40">
                </a>
                <ul class="dropdown-menu ar">
                    <li>
                        <a href="#">
                        	<img src="<?=base_url()?>/h7-assets/resources/img/main-icons/ar_icon.png" alt="Arabic" width = "22">
                    	</a>
                	</li>
            	</ul>
         	</li>
         </ul>
         </div>
	</div>
<!-- 	Header End -->

</head>
<<<<<<< HEAD
<body 
	<?php if($page == 'main_view') {?>
		onload ="onload_function('<?='-1'?>','<?='-1'?>','<?=true?>');">
	<?php } else if($page == 'my_collection_view') {?>
		onload ="on_load_my_collection('<?='-1'?>','<?='-1'?>','<?='-1'?>','<?='-1'?>','<?='-1'?>','<?='-1'?>');">
	<?php }else if ($page == 'scoreboard_view') {?>
		onload ="onload_scoreboard('<?='-1'?>','<?='-1'?>','<?=true?>');">
	<?php }?>
=======
<body
	<?php if($page == 'main_view') {?>
		onload ="onload_function('<?='-1'?>','<?='-1'?>','<?=true?>');">
	<?php } else if($page == 'my_collection_view') {?>
		onload ="on_load_my_collection('<?='-1'?>','<?='-1'?>','<?=true?>');">
	<?php }else if ($page == 'scoreboard_view') {?>
		onload ="onload_scoreboard('<?='-1'?>','<?='-1'?>','<?=true?>');">
	<?php }?>
	<div class="container">
		<div class="header navbar navbar-static-top"
			style="position: fixed; top: 0;">
			<ul class="nav nav-pills navbar-right nav_top">
				<li><a href="#"> <img src="<?=base_url()?>webassets/img/profile.png"
						alt="Invite Friends">
				</a> <img class="indecator"
					src="<?=base_url()?>webassets/img/header_indecator_icon.png"
					alt="Header Indecator"></li>
				<li><a href="<?=base_url('message');?>"> <img
						src="<?=base_url()?>webassets/img/messages.png" alt="Notification">
				</a> <img class="indecator"
					src="<?=base_url()?>webassets/img/header_indecator_icon.png"
					alt="Header Indecator"></li>
				<li><a href="<?=base_url()?>index.php?/activity_log/show_log"> <img
						src="<?=base_url()?>webassets/img/transactions.png"
						alt="Transactions">
				</a> <img class="indecator"
					src="<?=base_url()?>webassets/img/header_indecator_icon.png"
					alt="Header Indecator"></li>
				<li><a href="<?= base_url()?>index.php?/admin_page"> <img src="<?=base_url()?>webassets/img/admin.png"
						alt="Admin">
				</a> <img class="indecator"
					src="<?=base_url()?>webassets/img/header_indecator_icon.png"
					alt="Header Indecator"></li>
				<li class="dropdown"><a href="#" class="dropdown-toggle en"
					data-toggle="dropdown"> <img
						src="<?=base_url()?>webassets/img/global_en_icon.png"
						alt="English">
				</a>
					<ul class="dropdown-menu ar">
						<li><a href="#"> <img
								src="<?=base_url()?>webassets/img/global_ar_icon.png"
								alt="Arabic">
						</a></li>
					</ul></li>
			</ul>
			<a href="#" class="navbar-brand"> <img
				src="<?=base_url()?>webassets/img/logo.png"
				alt="The Color Competetion">
			</a>
		</div>

		<div class="jumbotron">

			<div class="cover-border">
				<a href="#" class="cover"> <img
					src="https://graph.facebook.com/<?=$cover_id?>/picture" alt=""
					style="width: 852px; height: 308px;">
				</a>
			</div>

			<ul class="nav nav-pills navbar-right cover-nav-right">
				<li><a href="<?=base_url()?>index.php?/platform/index">
						<h3 class="marketbtn">Market</h3> <img
						src="<?=base_url()?>webassets/img/buttons__not_active.png"
						alt="nonMarket"> <img class="activebtn"
						src="<?=base_url()?>webassets/img/buttons_active.png" alt="Market">
				</a></li>
				<li><a href="<?=base_url()?>index.php?/my_collection/get_my_collection">
						<h3 class="mycollectionsbtn">My Collections</h3> <img
						src="<?=base_url()?>webassets/img/buttons__not_active.png"
						alt="nonMy Collection"> <img class="activebtn"
						src="<?=base_url()?>webassets/img/buttons_active.png"
						alt="My Collection">
				</a></li>
				<li><a href="<?=base_url()?>index.php?/scoreboard/index">
						<h3 class="scoreboardsbtn">Score Boards</h3> <img
						src="<?=base_url()?>webassets/img/buttons__not_active.png"
						alt="nonScore Boards"> <img class="activebtn"
						src="<?=base_url()?>webassets/img/buttons_active.png"
						alt="Score Boards">
				</a></li>
			</ul>

			<ul class="nav nav-pills cover-nav-user">
				<li>
					<div class="profile-pic-border">
						<a href="#"> <!--                                <img src="https://graph.facebook.com/<?//=$fb_id?>/picture?type=large" alt="Profile Picture" style="width:140px; height:140px;">-->
							<img src="<?= base_url()?>webassets/moi.jpg"
							alt="Profile Picture" style="width: 140px; height: 140px;">
						</a>
					</div>
				</li>
				<li><a href="#" class="username"> <?=$name?> </a></li>
			</ul>

		</div>
		<div style="clear: both"></div>
>>>>>>> bc7448ccaf71025d10bc3767d24edd95ca50bc32
