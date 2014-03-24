<div id="cat_interest">
<<<<<<< HEAD
		<table id="MyFav-cat">
			<tr id = "my-fav-cat-header">
				<td colspan="3"
					style="border-top: 8px solid #68c220; box-shadow: 0 2px 2px -1px gray;">
					<h4>
						<img class="arrow"
							src="<?=base_url()?>/h7-assets/resources/img/main-icons/green-arrow.png"
							alt="green-arrow">My Favorite Categories
					</h4>
				</td>
			</tr>
			<?php 
			$i = 0;
			$size = $interest_cats->num_rows();
			foreach ($interest_cats->result() as $int_cat) {?>
			<tr style="height: 10px;"></tr>
			<?php if ($int_cat->id == $cat_id) {?>
				<tr id="cat-<?=$i?>"style="height: 95px; background :  <?=$color ?>;">
			<?php } else {?>
				<tr id="cat-<?=$i?>"style="height: 95px; background :  rgba(255,255,255,,0);">
			<?php }?>
				<td colspan="3" style="border-radius: 3px;">
=======
	<div class="category-selection">
		<div class="fav-container default-skin">
			<div class="viewport" style="width: 382px;">
				<ul class="nav fav-circles sidebar">
					<? 
					if($interest_cats == ''){
								echo 'No Category';
							}else{
							foreach($interest_cats->result() as $int_cat){ ?>
					<li>
>>>>>>> bc7448ccaf71025d10bc3767d24edd95ca50bc32
					<?php if ($current_page == 'market') { ?>
							<a href="javascript:void(0);"
								onclick="get_cards('<?=$int_cat->id;?>','<?=$int_cat->name?>');">
								<?php } else {?>
							<a href="javascript:void(0);"
								onclick="load_scoreboard('<?=$int_cat->id;?>','<?=$int_cat->name?>');">
<<<<<<< HEAD
								<?php }?>
						<ul class="nav nav-pills">
							<li style = "height: 90px;">
								<img class = "circle-pic" src="<?=base_url()?>/h7-assets/resources/img/main-icons/score_icon.png" alt="circle"  style = "margin-top:13px;">
							 	<div class = "left-line"></div>
							 	<font id = "score-text">Score</font>
							 	<br />
							 	<font class = "user-score" id = "score-<?=$int_cat->id?>"><?=$int_cat->score?></font>
							</li>													
							<li style = "width: 83px; height: 90px;">
								<img class = "cat-pic" src="<?=base_url()?>/h7-assets/resources/img/main-icons/<?=$int_cat->name?>.png" alt="<?=$int_cat->name?>-cat" >
								<font class = "cat-name"><?=$int_cat->name?></font>
							</li>
							<li style = "height: 90px;">
								<font id = "rank-text">Cards</font>
								<br />
								<font id = "user-rank"><?=$int_cat->num_of_cards?></font>
							 	<div class = "right-line"></div>
								<img class = "circle-pic" src="<?=base_url()?>/h7-assets/resources/img/main-icons/score_icon.png" alt="circle" style = "margin-top: -39px;">
							</li>												
						</ul>
				</a>
				</td>
			</tr>
			<?php $i ++;
			}?>
		</table>
		
=======
								<?php }?>
							<ul class="nav nav-pills">
								<?php if($int_cat->id == $cat_id) {?>
								<img src="<?=base_url()?>webassets/img/category_selection_2.png"
									style="position: absolute;">
								<?php }?>
								<li><img src="<?=base_url()?>webassets/img/score.png"
									alt="Score">
									<div class="score-num">
										<h4>
											<?=$int_cat->score?>
										</h4>
									</div></li>
								<li class="fav-categor"><img class="categor-color" src="<?=base_url()?>webassets/img/category_color_circle_bck.png" alt="Category Color Circle" style="background-image:url(<?=base_url()?>h7-assets/images/categories/<?= $int_cat->name?>/main_icon.png);">
									<div class="name">
										<h4>
											<?=$int_cat->name;?>
										</h4>
									</div></li>
								<li><img src="<?=base_url()?>webassets/img/num_cards.png" alt="Rank">
									<div class="rank">
										<h4>
											<?=$int_cat->num_of_cards?>
										</h4>
									</div></li>
							</ul>
					</a></li>
					<? } 
				}?>
				</ul>
			</div>
		</div>
	</div>
>>>>>>> bc7448ccaf71025d10bc3767d24edd95ca50bc32
</div>
