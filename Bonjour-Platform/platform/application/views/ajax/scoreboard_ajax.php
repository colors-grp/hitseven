<<<<<<< HEAD

	<?php
			$scoreboard = $_SESSION [ 'user_data' ];
			$all_users = $scoreboard ['all'];
			$top_users = $scoreboard ['top'];
	?>
	<table style = "text-align: left; width: 629px;">
		<tr style = "height: 45px;">
			<td style = "border-top:8px solid #ffa800; box-shadow: 0 2px 2px -1px gray;">
				<h4>
					<img class = "arrow" src="<?=base_url()?>/h7-assets/resources/img/main-icons/orange-arrow.png" alt="orange-arrow">Cards
					<a href = "#" style = "text-decoration: none; margin-left: 280px;margin-right: 10px">
						<img style = "height: 25px;" src = "<?=base_url()?>/h7-assets/resources/img/main-icons/friends_icon.png" alt = "friends">
						<font style = "font-size: 14px"> FRIENDS </font>
					</a>
					<a href = "#" style = "text-decoration: none;">
						<img style = "height: 25px;" src = "<?=base_url()?>/h7-assets/resources/img/main-icons/all_icons.png" alt = "all">
						<font style = "font-size: 14px"> ALL PLAYERS</font>
					</a>
				</h4>
=======
 <? // foreach ($last_round as $cntndex => $user_score ) { ?>
 <?php
	$scoreboard = $_SESSION [ 'user_data' ];
	$all_users = $scoreboard ['all'];
	$top_users = $scoreboard ['top'];
	for($i = 0; $i < count ( $top_users ); $i ++) {
		?>
<div class='score_rank'>
	<table width="100%" border="1" cellpadding="0" cellspacing="0" style = "border-color:#fff;">
		<div id = "medal-symbol">
			<h5>
				<?= $top_users[$i]->name; ?>
			</h5>
		</div>
		<tr>
			<td width="12%" align="right"><img
				src="https://graph.facebook.com/<?= $all_users[$i]->fb_id ?>/picture?type=large"></td>
			<td width="76%"><h1> <?= $all_users[$i]->name ?></h1>
				<h2> <?= $all_users[$i]->score ?></h2></td>
			<td width="12%" align="center"><img
				src="<?= base_url() ?>h7-assets/images/scoreboard/change/<?=$all_users[$i]->change?>"
				width="14" height="12" border="0" style="width: 14px; height: 12px"></td>
			<td>
				<img src="<?= base_url() ?>webassets/img/gold_1.png">
>>>>>>> bc7448ccaf71025d10bc3767d24edd95ca50bc32
			</td>
		</tr>
		<tr style = "height: 20px;"></tr>
	</table>
<<<<<<< HEAD
	<?php
	$min = count($all_users);
	if ($min > count($top_users))
		$min = count($top_users);
	for($i = 0; $i < $min; $i ++) {
		if ($i % 2 == 0) {
		?>
		<!-- GOLD TABLE -->
			<table>
				<tr style = "height: 20px;"></tr>
				<tr>
					<td rowspan = "2" style = "width: 190px; text-align: center;">
						<img src="<?=base_url()?>/h7-assets/resources/img/main-icons/<?= $top_users[$i]->name?>_icon.png" alt="gold" style = "width:70px; margin-left: 26px;">
						<img src="<?=base_url()?>/h7-assets/resources/img/main-icons/bigarrow_right_icon.png" alt="arrow" style = "width:80px; margin-left: -6px;">
					</td>
					<td rowspan = "2" class = "score-td" style = "width: 70px;">
						<img class = "score-profile-pic" src="http://graph.facebook.com/<?=$all_users[$i]->fb_id?>/picture?width=200&height=200" alt="profile-pic" >
					</td>
					<td class = "score-name" style = "width: 299px;">
						<img src="<?=base_url()?>/h7-assets/resources/img/main-icons/profile_icon.png" alt="profile-icon" >
						<?= $all_users[$i]->name?>
					</td>
					<td rowspan = "2" align = "center" class = "score-td" style = "width: 27px;">
						<img src="<?=base_url()?>/h7-assets/resources/img/main-icons/<?=$all_users[$i]->change?>_icon.png" alt="<?=$all_users[$i]->change?>">
					</td>
					<td rowspan = "2" style = "width: 13px;"></td>
				</tr>
				<tr>
					<td class = "score-td" style = "padding-left: 10px;"><img src="<?=base_url()?>/h7-assets/resources/img/main-icons/score_icon2.png" alt="score-icon" ><?= $all_users[$i]->score?></td>
				</tr>
				<tr style = "height: 20px;"></tr>
			</table>
		<!-- end of gbold table -->
	<?php } else {?>
			<table>
				<tr style = "height: 20px;"></tr>
				<tr>
					<td rowspan = "2" style = "width: 35px;"></td>
					
					<td rowspan = "2" class = "score-td" style = "width: 70px;">
						<img class = "score-profile-pic" src="http://graph.facebook.com/<?=$all_users[$i]->fb_id?>/picture?width=200&height=200" alt="profile-pic" >
					</td>
					<td class = "score-name" style = "width: 299px;">
						<img src="<?=base_url()?>/h7-assets/resources/img/main-icons/profile_icon.png" alt="profile-icon" >
						<?= $all_users[$i]->name?>
					</td>
					<td rowspan = "2" align = "center" class = "score-td" style = "width: 27px;">
						<img src="<?=base_url()?>/h7-assets/resources/img/main-icons/<?=$all_users[$i]->change?>_icon.png" alt="<?=$all_users[$i]->change?>">
					</td>
					<td rowspan = "2" style = "width: 190px; text-align: center;">
						<img src="<?=base_url()?>/h7-assets/resources/img/main-icons/bigarrow_left_icon.png" alt="arrow" style = "width:80px; margin-right: -6px;">
						<img src="<?=base_url()?>/h7-assets/resources/img/main-icons/<?= $top_users[$i]->name?>_icon.png" alt="silver" style = "width:70px; margin-right: 26px;">
					</td>
				</tr>
				<tr>
					<td class = "score-td" style = "padding-left: 10px;"><img src="<?=base_url()?>/h7-assets/resources/img/main-icons/score_icon2.png" alt="score-icon" ><?= $all_users[$i]->score?></td>
				</tr>
				<tr style = "height: 20px;"></tr>
			</table>
	<?php } }?>
	<!-- RANK TABLE -->
	<table id = "rank-table">
		<tr id = "rank-head">
			<td class = "first-col">Rank</td>
			<td style = "width: 235px;"><img src="<?=base_url()?>/h7-assets/resources/img/main-icons/profile_icon.png" alt="profile-icon"> Name</td>
			<td><img src="<?=base_url()?>/h7-assets/resources/img/main-icons/score_icon2.png" alt="score-icon"> Score</td>
			<td>Change</td>
		</tr>
		<?php 
		if ($min < count($all_users)) {
		for($i = count ( $top_users ); $i < count ( $all_users); $i ++) {
				$class = 'odd-row';
				if ($i % 2 == 0) {
					$class = 'even-row';
				} ?>
				<tr class = "<?=$class?>">
					<td class = "first-col"><?= ($i + 1)?></td>
					<td><?=$all_users[$i]->name?></td>
					<td><?=$all_users[$i]->score?></td>
					<td><img src="<?=base_url()?>/h7-assets/resources/img/main-icons/<?=$all_users[$i]->change ?>_icon.png" alt="<?=$all_users[$i]->change?>"></td>
				</tr>
		<?php } } else {
			echo 'No Users<br />';
		}?>
	</table>
	<!-- end of rank table -->
=======
</div>

<?}?>


<div class="scor_tab">
	<table width="100%" border="0" cellpadding="0"
		class="table table-bordered">
		<?php if (count($all_users) - count($top_users) > 0) {?>
		<tr>
			<td width="14%" style="border-left: none;"><strong>Rank</strong></td>
			<td><img src="<?= base_url() ?>webassets/img/name-icon.png"
				width="16" height="17" border="0"></td>
			<td width="36%"><strong> Name</strong></td>
			<td width="27%"><img src="<?= base_url() ?>webassets/img/chart.png"
				height="14" width="16"> <strong>Score</strong></td>
			<td width="23%" style="border-right: none;"><img
				src="<?= base_url() ?>webassets/img/g_arr.png" width="13"><strong>
					Change</strong></td>
		</tr>
		<?php } else 
			echo "No Other Users";	
		 	for($i = count ( $top_users ); $i < count ( $all_users); $i ++) {
                         if ($all_users[$i]->score > 0) { ?>
		<tr>
			<td style="border-left: none;"><?= $i + 1 ?> </td>
			<td><img
				src="https://graph.facebook.com/<?= $all_users[$i]->fb_id ?>/picture?width=200&height=200"
				style="width: 21px; height: 28px"></td>
			<td> &nbsp; <?= $all_users[$i]->name ?> </td>
			<td><?= $all_users[$i]->score ?></td>
			<td style="border-right: none;"><img
				src="<?= base_url() ?>h7-assets/images/scoreboard/change/<?=$all_users[$i]->change ?>.png"
				width="14" height="12"></td>
		</tr>
			<? } 
		} ?>
	</table>
</div>
>>>>>>> bc7448ccaf71025d10bc3767d24edd95ca50bc32
