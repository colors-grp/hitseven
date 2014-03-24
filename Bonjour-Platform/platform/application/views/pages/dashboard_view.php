<!-- Dashboard -->
<div id = "Dashboard">
	<div id = "Orange-Background">
		<h3 style = "color: white; position: relative; top:5px;" align = "center">My Dashboard</h3>
			<div id = "White-Background">
			<table id = "counter">
				<tr style = "height: 100px;">
					<td style = "border-left:6px solid #68c220;">
						<img class = "arrow" src="<?=base_url()?>/h7-assets/resources/img/main-icons/green-arrow.png" alt="green-arrow" style = "position: relative;top: -22px;">
					</td>
					<td style = "width: 50px;">
						<h3>Next Results in</h3>
					</td>
					<!-- <td>
						<img src="<?=base_url()?>/h7-assets/resources/img/main-icons/counter.png" alt="counter" style = "margin-left: 15px;">
					</td>-->
					<td style = "width: 20px;"></td>
					<td>
						<div class="clock-item clock-days countdown-time-value" style = "width: 95px;">
							<div class="wrap">
								<div class="inner">
									<div id="canvas_days" class="clock-canvas">
									</div>
									<div class="text">
										<p class="val">0</p>
										<p class="type-days type-time">DAYS</p>
									</div>
								</div>
							</div> 
						</div>
					</td>
					<td style = "width: 15px;"></td>
					<td>
						<div class="clock-item clock-hours countdown-time-value" style = "width: 95px;">
						<div class="wrap">
						<div class="inner">
						<div id="canvas_hours" class="clock-canvas"></div>
						<div class="text">
						<p class="val">0</p>
						<p class="type-hours type-time">HOURS</p>
						</div>
						<!-- /.text --> 
						</div>
						<!-- /.inner --> 
						</div>
						<!-- /.wrap --> 
						</div>
						<!-- /.clock-item -->
					</td>
					<td style = "width: 15px;"></td>
					<td>
						<div class="clock-item clock-minutes countdown-time-value" style = "width: 95px;">
						<div class="wrap">
						<div class="inner">
						<div id="canvas_minutes" class="clock-canvas"></div>
						<div class="text">
						<p class="val">0</p>
						<p class="type-minutes type-time">MINUTES</p>
						</div>
						<!-- /.text --> 
						</div>
						<!-- /.inner --> 
						</div>
						<!-- /.wrap --> 
						</div>
						<!-- /.clock-item -->
					</td>
					<td style = "width: 15px;"></td>
					<td>
						<div class="clock-item clock-seconds countdown-time-value" style = "width: 95px;">
						<div class="wrap">
						<div class="inner">
						<div id="canvas_seconds" class="clock-canvas"></div>
						<div class="text">
						<p class="val">0</p>
						<p class="type-seconds type-time">SECONDS</p>
						</div>
						<!-- /.text --> 
						</div>
						<!-- /.inner --> 
						</div>
						<!-- /.wrap --> 
						</div>
						<!-- /.clock-item --> 
					</td>
				</tr>
			</table>
			
			<div class = "row">
				<table id = "score">
					<tr style = "border-bottom:6px solid #68c220;font-size: 13px;font-weight: bold;">
						<td style = "width: 180px;"></td>
						<td style = "width: 50px;">Score</td>
						<td style = "width: 50px;">Pos</td>
					</tr>
					<tr style = "height: 45px; border-bottom: 1px solid #E4E4E4;">
						<td class = "right-border-grey" style = "font-size: 12px;">
							<img width = "27" height = "27" src = "http://graph.facebook.com/<?=$fb_id?>/picture" alt="Profile Picture">
							<?=$name?>
						</td>
						<td>239</td>
						<td class = "left-border-grey"><div class = "triangle"></div></td>
					</tr>
					<tr style = "height: 45px; border-bottom: 1px solid #E4E4E4;">
						<td class = "right-border-grey" style = "font-size: 12px;">
							<img width = "27" height = "27" src = "http://graph.facebook.com/<?=$fb_id?>/picture" alt="Profile Picture">
							<?=$name?>
						</td>
						<td>239</td>
						<td class = "left-border-grey"><div class = "triangle"></div></td>
					</tr>
					<tr style = "height: 45px;">
						<td class = "right-border-grey" style = "font-size: 12px;">
							<img width = "27" height = "27" src = "http://graph.facebook.com/<?=$fb_id?>/picture" alt="Profile Picture">
							<?=$name?>
						</td>
						<td>239</td>
						<td class = "left-border-grey"><div class = "triangle"></div></td>
					</tr>
				</table>
				<table id = "rank">
					<thead>
						<tr style = "border-bottom:6px solid #68c220;font-size: 13px;font-weight: bold;">
							<td style = "width: 70px;"></td>
							<td style = "width: 70px;">Category</td>
							<td style = "width: 70px;">My Score</td>
							<td style = "width: 70px;">My Pos</td>
						</tr>
					</thead>
					<tbody id = "rank-body">
						<?php for ($i = 0; $i < count($dashboard) ; $i ++) {?>
							<tr style = "height: 45px; border-bottom: 1px solid #E4E4E4;">
								<td style = "width: 70px;">
									<img class = "cat-rank" src="<?=base_url()?>/h7-assets/resources/img/main-icons/<?= $dashboard[$i]['cat_name'] ?>.png" alt="<?= $dashboard[$i]['cat_name'] ?>-cat" >
									<?php 
										$ordinal = 'th';
										$mapper = array ('th', 'st', 'nd', 'rd');
										$rank = $dashboard[$i]['rank'];
										if ($rank % 10 < 4)
											$ordinal = $mapper[$rank % 10];
									?>
									<font class = "rank-text"><?= $rank . $ordinal?></font>
								</td>
								<td class = "right-border-grey" style = "width: 70px;">
									<?=$dashboard[$i]['cat_name']?>
								</td>
								<td style = "width: 70px;"><?= $dashboard[$i]['data']->score ?></td>
								<td class = "left-border-grey" style = "width: 70px;"><div class = "triangle_<?= $dashboard[$i]['data']->change ?>"></div></td>
							</tr>
						<?php }?>
					</tbody>
				</table>
			</div>
		</div>
		<!-- end of Orange-Background -->
	</div>
	<!-- end of Orange-Background -->
</div>
<!-- end of dashboard -->