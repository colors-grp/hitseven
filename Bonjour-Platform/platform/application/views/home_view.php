<html>
<head>
<meta http-equiv="Content-Type"
	content="text/html; charset=windows-1256">
<title>The Colors Concorrenza</title>

<link type="text/css" rel="stylesheet"
	href="<?=base_url()?>h7-assets/resources/bootstrap/css/bootstrap.css" />
<link type="text/css" rel="stylesheet"
	href="<?=base_url()?>h7-assets/resources/bootstrap/css/bootstrap-theme.css" />
<link type="text/css" rel="stylesheet"
	href="<?=base_url()?>h7-assets/resources/css/style.css" />

<link href="http://fonts.googleapis.com/css?family=Raleway:400,700"
	rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css"
	href="<?=base_url()?>h7-assets/resources/css/demo.css">

<script
	src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<script
	src="<?=base_url()?>h7-assets/resources/bootstrap/js/dropdown.js"></script>
<script type="text/javascript"
	src="<?=base_url()?>h7-assets/resources/js/jquery.js"></script>

<link rel="stylesheet" type="text/css"
	href="<?=base_url()?>h7-assets/resources/css/global.css">
<script src="<?=base_url()?>h7-assets/resources/js/slides.min.jquery.js"></script>

<script>
		function p_width(){
			var w = window.screen.availWidth - (window.outerWidth - window.innerWidth);
			var h = window.screen.availHeight - (window.outerHeight - window.innerHeight); 

 			document.getElementById("slides_container").style.height = (h - 125)+ "px";
 			
 			document.getElementById("Home-container").style.width = w + "px";
 			document.getElementById("Home-container").style.height = h + "px";
 			
			document.getElementById("slideshow-container").style.width = w + "px";
 			document.getElementById("slideshow-container").style.height = (h - 150)+ "px";
 			document.getElementById("slide-div").style.height = (h - 150)+ "px";

 			document.getElementById("slideshow-container2").style.width = w + "px";
 			document.getElementById("slideshow-container2").style.height = (h - 150)+ "px";
 			document.getElementById("slideshow-container2").style.backgroundSize = w +"px" + " " + (h - 150) +"px";
 			document.getElementById("slide-div2").style.height = (h - 150)+ "px";
 			
 			document.getElementById("slideshow-container3").style.width = w + "px";
 			document.getElementById("slideshow-container3").style.height = (h - 150)+ "px";
 			document.getElementById("slideshow-container3").style.backgroundSize = w +"px" + " " + (h - 150) +"px";
 			document.getElementById("slide-div3").style.height = (h - 150)+ "px";
 			
 			document.getElementById("slideshow-container4").style.width = w + "px";
 			document.getElementById("slideshow-container4").style.height = (h - 150)+ "px";
 			document.getElementById("slideshow-container4").style.backgroundSize = w +"px" + " " + (h - 150) +"px";
 			document.getElementById("slide-div4").style.height = (h - 150)+ "px";
		}
	</script>

<script>
		$(function(){
			// Set starting slide to 1
			var startSlide = 1;
			// Get slide number if it exists
			if (window.location.hash) {
				startSlide = window.location.hash.replace('#','');
			}
			// Initialize Slides
			$('#slides').slides({
				preload: true,
				preloadImage: '<?=base_url()?>h7-assets/resources/img/main-icons/loading.gif',
				generatePagination: true,
				play: 5000,
				pause: 2500,
				hoverPause: true,
				// Get the starting slide
				start: startSlide,
				animationComplete: function(current){
					// Set the slide number as a hash
					window.location.hash = '#' + current;
				}
			});
		});
	</script>

</head>
<body onload="p_width()" style="min-width: 1200px;">
	<div id="Home-container">
		<div id="Home-header">
			<div id="Home-header-content">
				<img
					src="<?=base_url()?>h7-assets/resources/img/main-icons/Logo.png"
					alt="Logo" style="width: 180px;">
				<table id="header-counter">
					<tr style="height: 85px;">
						<td style="border-left: 6px solid #68c220;"><img class="arrow"
							src="<?=base_url()?>h7-assets/resources/img/main-icons/green-arrow.png"
							alt="green-arrow" style="position: relative; top: -22px;"></td>
						<td style="width: 50px;">
							<h4>Next Results in</h4>
						</td>
						<td style="width: 20px;"></td>
						<td>
							<div class="clock-item clock-days countdown-time-value"
								style="width: 80px;">
								<div class="wrap">
									<div class="inner">
										<div id="canvas_days" class="clock-canvas"></div>
										<div class="text" style="position: relative; top: 3px;">
											<p class="val">0</p>
											<p class="type-days type-time">DAYS</p>
										</div>
									</div>
								</div>
							</div>
						</td>
						<td style="width: 15px;"></td>
						<td>
							<div class="clock-item clock-hours countdown-time-value"
								style="width: 80px;">
								<div class="wrap">
									<div class="inner">
										<div id="canvas_hours" class="clock-canvas"></div>
										<div class="text" style="position: relative; top: 3px;">
											<p class="val">0</p>
											<p class="type-hours type-time">HOURS</p>
										</div>
									</div>
								</div>
							</div>
						</td>
						<td style="width: 15px;"></td>
						<td>
							<div class="clock-item clock-minutes countdown-time-value"
								style="width: 80px;">
								<div class="wrap">
									<div class="inner">
										<div id="canvas_minutes" class="clock-canvas"></div>
										<div class="text" style="position: relative; top: 3px;">
											<p class="val">0</p>
											<p class="type-minutes type-time">MINUTES</p>
										</div>
									</div>
								</div>
							</div>
						</td>
						<td style="width: 15px;"></td>
						<td>
							<div class="clock-item clock-seconds countdown-time-value"
								style="width: 80px;">
								<div class="wrap">
									<div class="inner">
										<div id="canvas_seconds" class="clock-canvas"></div>
										<div class="text" style="position: relative; top: 3px;">
											<p class="val">0</p>
											<p class="type-seconds type-time">SECONDS</p>
										</div>
									</div>
								</div>
							</div>
						</td>
					</tr>
				</table>

				<?php if ($this->authentication->is_signed_in()) : ?>
				<li class="nav-header">Account Info</li>
				<li><?php echo anchor('StarQuell_profile', 'StarQuell Profile'); ?>
				</li>
				<li><?php echo anchor('account/account_profile', lang('website_profile')); ?>
				</li>
				<li><?php echo anchor('account/account_settings', lang('website_account')); ?>
				</li>
				<?php if ($account->password) : ?>
				<li><?php echo anchor('account/account_password', lang('website_password')); ?>
				</li>
				<?php endif; ?>
				<li><?php echo anchor('account/account_linked', lang('website_linked')); ?>
				</li>
				<?php if ($this->authorization->is_permitted( array('retrieve_users', 'retrieve_roles', 'retrieve_permissions') )) : ?>
				<li class="divider"></li>
				<li class="nav-header">Admin Panel</li>
				<?php if ($this->authorization->is_permitted('retrieve_users')) : ?>
				<li><?php echo anchor('account/manage_users', lang('website_manage_users')); ?>
				</li>
				<?php endif; ?>

				<?php if ($this->authorization->is_permitted('retrieve_roles')) : ?>
				<li><?php echo anchor('account/manage_roles', lang('website_manage_roles')); ?>
				</li>
				<?php endif; ?>

				<?php if ($this->authorization->is_permitted('retrieve_permissions')) : ?>
				<li><?php echo anchor('account/manage_permissions', lang('website_manage_permissions')); ?>
				</li>
				<?php endif; ?>
				<?php endif; ?>

				<li class="divider"></li>
				<li><?php echo anchor('account/sign_out', lang('website_sign_out')); ?>
				</li>
				<?php else : ?>
				<a
					href="<?php echo $this->config->item('core_url');?>?sitecode=1&mode=signin">
					<img
					src="<?=base_url()?>h7-assets/resources/img/main-icons/login_with_facebook.png"
					style="height: 40px; width: 300px; position: relative; top: -139px; left: 750px;" />
				</a>
				<?php endif; ?>
			</div>
		</div>


		<div id="slides">
			<div id="slides_container" class="slides_container">
				<div class="slide" id="slide-div">

					<div id="slideshow-container">
						<table
							style="width: 1150px; position: relative; top: 80px; margin-left: auto; margin-right: auto;">
							<tr>
								<td align="center"><?php
									if ($sorted_cats != FALSE) {
									$colors['green'] = '#00bc3f';
									$colors['yellow'] = '#ffff00';
									$colors['violet'] = '#d300c9';
									$colors['red'] = '#ff0000';
									$colors['orange'] = '#ff7f00';
									$colors['indigo'] = '#7a00e5';
									$colors['blue'] = '#0068ff';
									$ranks = array('first', 'snd', 'third', 'fourth', 'fifth', 'sixth', 'seventh');
									$i = 0;
									$rev_cats = array_reverse($sorted_cats->result());
									foreach ($rev_cats as $cats) {
										?> <img
										src="<?=base_url()?>h7-assets/resources/img/categories/<?=$cats->name?>.png"
										alt="<?= $cats->name?>-cat" id="<?=$ranks[7 - $i - 1]?>">
									<?php $i ++;}?>
									<?php 
									$i = 0;
									foreach ($sorted_cats->result() as $cats) {
										?>
										<div id="pos-<?=$i + 1?>" style = "border-color: <?=$colors[$cats->name]?>">
											<?=$i + 1?>
										</div> 
									<?php $i ++;}
									}?>
								</td>
							</tr>
						</table>
						<h3 style="margin: 0px auto; margin-top: -245px; width: 500px;">Play
							and collect cards for your favorite color</h3>
						<h3 style="margin: 10px auto; width: 300px;">Get the best score
							and win</h3>
					</div>
				</div>
				<div class="slide" id="slide-div2">
					<div id="slideshow-container2">
						<div id="medal-div">
							<img
								src="<?=base_url()?>h7-assets/resources/img/main-icons/gold_medal.png"
								id="medal-img">
							<h2 style="position: relative; top: -35px; left: 35px;"
								class="gold-reflected">GOLD WINNERS</h2>
						</div>
						<div id="top-table">
							<?php 
							$data = $scoreboard_home_view;
							$cnt = -1;
							if ($data != FALSE) {
								for ($i = 0; $i < count($data); $i ++) {
									if (count($data[$i]['data'])<=0)
										continue;
									$cnt ++;
									if ($cnt % 2 == 0) {
										?>
							<table class="left-cat">
								<tr>
									<td style="width: 190px; text-align: center;"><img
										src="<?=base_url()?>h7-assets/resources/img/categories/<?=$data[$i]['cat_name']?>.png"
										class="left-cat-pic"> <img
										src="<?=base_url()?>h7-assets/resources/img/main-icons/bigarrow_right_icon.png"
										alt="arrow" class="left-cat-arrow"></td>
								</tr>
							</table>
							<table>
								<tr style="height: 10px;"></tr>
								<tr style="height: 26px;">
									<td rowspan="2" class="score-td" style="width: 50px;"><img
										class="score-profile-pic-home"
										src="http://graph.facebook.com/<?=$data[$i]['data'][0]->fb_id;?>/picture"
										alt="profile-pic"></td>
									<td class="score-name" style="width: 299px; height: 25px;"><img
										src="<?=base_url()?>h7-assets/resources/img/main-icons/profile_icon.png"
										alt="profile-icon"> <?= $data[$i]['data'][0]->name?></td>
									<td rowspan="2" align="center" class="score-td"
										style="width: 20px;"><img
										src="<?=base_url()?>h7-assets/resources/img/main-icons/<?=$data[$i]['data'][0]->change?>_icon.png"
										alt="up"></td>
									<td rowspan="2" style="width: 13px;"></td>
								</tr>
								<tr>
									<td class="score-td" style="padding-left: 10px;"><img
										src="<?=base_url()?>h7-assets/resources/img/main-icons/score_icon2.png"
										alt="score-icon"> <?=$data[$i]['data'][0]->score?></td>
								</tr>
							</table>
							<?php } else {?>

							<table class="user-info-left">
								<tr style="height: 10px;"></tr>
								<tr style="height: 26px;">
									<td rowspan="2" class="score-td" style="width: 50px;"><img
										class="score-profile-pic-home"
										src="http://graph.facebook.com/<?=$data[$i]['data'][0]->fb_id;?>/picture"
										alt="profile-pic"></td>
									<td class="score-name" style="width: 299px; height: 25px;"><img
										src="<?=base_url()?>h7-assets/resources/img/main-icons/profile_icon.png"
										alt="profile-icon"> <?= $data[$i]['data'][0]->name?></td>
									<td rowspan="2" align="center" class="score-td"
										style="width: 20px;"><img
										src="<?=base_url()?>h7-assets/resources/img/main-icons/<?=$data[$i]['data'][0]->change?>_icon.png"
										alt="up"></td>
									<td rowspan="2" style="width: 13px;"></td>
								</tr>
								<tr>
									<td class="score-td" style="padding-left: 10px;"><img
										src="<?=base_url()?>h7-assets/resources/img/main-icons/score_icon2.png"
										alt="score-icon"> <?=$data[$i]['data'][0]->score?></td>
								</tr>
							</table>
							<table class="right-cat">
								<tr>
									<td style="width: 190px; text-align: center;"><img
										src="<?=base_url()?>h7-assets/resources/img/main-icons/bigarrow_left_icon.png"
										alt="arrow" class="right-cat-arrow"> <img
										src="<?=base_url()?>h7-assets/resources/img/categories/<?=$data[$i]['cat_name']?>.png"
										class="right-cat-pic"></td>
								</tr>
							</table>
							<?php } 
								}
							}
							 else  {?>
							<font>No Users in this Category</font>
							<?php }?>
						</div>
					</div>
				</div>
				<div class="slide" id="slide-div3">
					<div id="slideshow-container3">
						<div id="medal-div">
							<img
								src="<?=base_url()?>h7-assets/resources/img/main-icons/silver_medal.png"
								id="medal-img">
							<h2 style="position: relative; top: -35px; left: 35px;"
								class="silver-reflected">SILVER WINNERS</h2>
						</div>
						<div id="top-table">
							<?php 
							$data = $scoreboard_home_view;
							$cnt = -1;
							if ($data != FALSE) {
								for ($i = 0; $i < count($data); $i ++) {
									if (count($data[$i]['data'])<=1)
										continue;
									$cnt ++;
									if ($cnt % 2 == 0) {
										?>
							<table class="left-cat">
								<tr>
									<td style="width: 190px; text-align: center;"><img
										src="<?=base_url()?>h7-assets/resources/img/categories/<?=$data[$i]['cat_name']?>.png"
										class="left-cat-pic"> <img
										src="<?=base_url()?>h7-assets/resources/img/main-icons/bigarrow_right_icon.png"
										alt="arrow" class="left-cat-arrow"></td>
								</tr>
							</table>
							<table>
								<tr style="height: 10px;"></tr>
								<tr style="height: 26px;">
									<td rowspan="2" class="score-td" style="width: 50px;"><img
										class="score-profile-pic-home"
										src="http://graph.facebook.com/<?=$data[$i]['data'][1]->fb_id;?>/picture"
										alt="profile-pic"></td>
									<td class="score-name" style="width: 299px; height: 25px;"><img
										src="<?=base_url()?>h7-assets/resources/img/main-icons/profile_icon.png"
										alt="profile-icon"> <?= $data[$i]['data'][1]->name?></td>
									<td rowspan="2" align="center" class="score-td"
										style="width: 20px;"><img
										src="<?=base_url()?>h7-assets/resources/img/main-icons/<?=$data[$i]['data'][1]->change?>_icon.png"
										alt="up"></td>
									<td rowspan="2" style="width: 13px;"></td>
								</tr>
								<tr>
									<td class="score-td" style="padding-left: 10px;"><img
										src="<?=base_url()?>h7-assets/resources/img/main-icons/score_icon2.png"
										alt="score-icon"> <?=$data[$i]['data'][1]->score?></td>
								</tr>
							</table>
							<?php } else {?>

							<table class="user-info-left">
								<tr style="height: 10px;"></tr>
								<tr style="height: 26px;">
									<td rowspan="2" class="score-td" style="width: 50px;"><img
										class="score-profile-pic-home"
										src="http://graph.facebook.com/<?=$data[$i]['data'][1]->fb_id;?>/picture"
										alt="profile-pic"></td>
									<td class="score-name" style="width: 299px; height: 25px;"><img
										src="<?=base_url()?>h7-assets/resources/img/main-icons/profile_icon.png"
										alt="profile-icon"> <?= $data[$i]['data'][1]->name?></td>
									<td rowspan="2" align="center" class="score-td"
										style="width: 20px;"><img
										src="<?=base_url()?>h7-assets/resources/img/main-icons/<?=$data[$i]['data'][1]->change?>_icon.png"
										alt="up"></td>
									<td rowspan="2" style="width: 13px;"></td>
								</tr>
								<tr>
									<td class="score-td" style="padding-left: 10px;"><img
										src="<?=base_url()?>h7-assets/resources/img/main-icons/score_icon2.png"
										alt="score-icon"> <?=$data[$i]['data'][1]->score?></td>
								</tr>
							</table>
							<table class="right-cat">
								<tr>
									<td style="width: 190px; text-align: center;"><img
										src="<?=base_url()?>h7-assets/resources/img/main-icons/bigarrow_left_icon.png"
										alt="arrow" class="right-cat-arrow"> <img
										src="<?=base_url()?>h7-assets/resources/img/categories/<?=$data[$i]['cat_name']?>.png"
										class="right-cat-pic"></td>
								</tr>
							</table>
							<?php } 
								}
							}
							 else  {?>
							<font>No Users in this Category</font>
							<?php }?>
						</div>
					</div>
				</div>
				<div class="slide" id="slide-div4">
					<div id="slideshow-container4">
						<div id="medal-div">
							<img
								src="<?=base_url()?>h7-assets/resources/img/main-icons/bronze_medal.png"
								id="medal-img">
							<h2 style="position: relative; top: -35px; left: 35px;"
								class="bronze-reflected">BRONZE WINNERS</h2>
						</div>
						<div id="top-table">
							<?php 
							$data = $scoreboard_home_view;
							$cnt = -1;
							if ($data != FALSE) {
								for ($i = 0; $i < count($data); $i ++) {
									if (count($data[$i]['data'])<=2)
										continue;
									$cnt ++;
									if ($cnt % 2 == 0) {
										?>
							<table class="left-cat">
								<tr>
									<td style="width: 190px; text-align: center;"><img
										src="<?=base_url()?>h7-assets/resources/img/categories/<?=$data[$i]['cat_name']?>.png"
										class="left-cat-pic"> <img
										src="<?=base_url()?>h7-assets/resources/img/main-icons/bigarrow_right_icon.png"
										alt="arrow" class="left-cat-arrow"></td>
								</tr>
							</table>
							<table>
								<tr style="height: 10px;"></tr>
								<tr style="height: 26px;">
									<td rowspan="2" class="score-td" style="width: 50px;"><img
										class="score-profile-pic-home"
										src="http://graph.facebook.com/<?=$data[$i]['data'][2]->fb_id;?>/picture"
										alt="profile-pic"></td>
									<td class="score-name" style="width: 299px; height: 25px;"><img
										src="<?=base_url()?>h7-assets/resources/img/main-icons/profile_icon.png"
										alt="profile-icon"> <?= $data[$i]['data'][2]->name?></td>
									<td rowspan="2" align="center" class="score-td"
										style="width: 20px;"><img
										src="<?=base_url()?>h7-assets/resources/img/main-icons/<?=$data[$i]['data'][2]->change?>_icon.png"
										alt="up"></td>
									<td rowspan="2" style="width: 13px;"></td>
								</tr>
								<tr>
									<td class="score-td" style="padding-left: 10px;"><img
										src="<?=base_url()?>h7-assets/resources/img/main-icons/score_icon2.png"
										alt="score-icon"> <?=$data[$i]['data'][2]->score?></td>
								</tr>
							</table>
							<?php } else {?>

							<table class="user-info-left">
								<tr style="height: 10px;"></tr>
								<tr style="height: 26px;">
									<td rowspan="2" class="score-td" style="width: 50px;"><img
										class="score-profile-pic-home"
										src="http://graph.facebook.com/<?=$data[$i]['data'][2]->fb_id;?>/picture"
										alt="profile-pic"></td>
									<td class="score-name" style="width: 299px; height: 25px;"><img
										src="<?=base_url()?>h7-assets/resources/img/main-icons/profile_icon.png"
										alt="profile-icon"> <?= $data[$i]['data'][2]->name?></td>
									<td rowspan="2" align="center" class="score-td"
										style="width: 20px;"><img
										src="<?=base_url()?>h7-assets/resources/img/main-icons/<?=$data[$i]['data'][2]->change?>_icon.png"
										alt="up"></td>
									<td rowspan="2" style="width: 13px;"></td>
								</tr>
								<tr>
									<td class="score-td" style="padding-left: 10px;"><img
										src="<?=base_url()?>h7-assets/resources/img/main-icons/score_icon2.png"
										alt="score-icon"> <?=$data[$i]['data'][2]->score?></td>
								</tr>
							</table>
							<table class="right-cat">
								<tr>
									<td style="width: 190px; text-align: center;"><img
										src="<?=base_url()?>h7-assets/resources/img/main-icons/bigarrow_left_icon.png"
										alt="arrow" class="right-cat-arrow"> <img
										src="<?=base_url()?>h7-assets/resources/img/categories/<?=$data[$i]['cat_name']?>.png"
										class="right-cat-pic"></td>
								</tr>
							</table>
							<?php } 
								}
							}
							 else  {?>
							<font>No Users in this Category</font>
							<?php }?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>  -->
	<script type="text/javascript"
		src="<?=base_url()?>h7-assets/resources/js/kinetic.js"></script>
	<script type="text/javascript"
		src="<?=base_url()?>h7-assets/resources/js/jquery.final-countdown-home.js"></script>
	<script type="text/javascript">
	$('.countdown').final_countdown({});
</script>
	<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</body>
</html>
