<div id="cat_interest">
	<div class="category-selection">
		<div class="fav-container default-skin">
			<div class="viewport" style="width: 382px;">
				<ul class="nav fav-circles sidebar">
					<? 
					if($interest_cats == ''){
								echo 'No Category';
							}else{
							foreach($interest_cats->result() as $int_cat){ ?>
					<li><a href="javascript:void(0);"
						onclick="get_cards('<?=$int_cat->id;?>','<?=$int_cat->name?>');">
							<ul class="nav nav-pills">
								<?php if($int_cat->id == $cat_id) {?>
								<img src="<?=base_url()?>webassets/img/category_selection_2.png"
									style="position: absolute;">
								<?php }?>
								<li><img src="<?=base_url()?>webassets/img/score.png"
									alt="Score">
									<div class="score-num">
										<h4>
											<?=$int_cat->total_score?>
										</h4>
									</div></li>
								<li class="fav-categor"><img class="categor-color" src="<?=base_url()?>webassets/img/category_color_circle_bck.png" alt="Category Color Circle" style="background-image:url(<?=base_url()?>h7-assets/images/categories/<?= $int_cat->name?>/main_icon.png);">
									<div class="name">
										<h4>
											<?=$int_cat->name;?>
										</h4>
									</div></li>
								<li><img src="<?=base_url()?>webassets/img/rank.png" alt="Rank">
									<div class="rank">
										<h4>
											<?=$int_cat->total_score?>
										</h4>
										<p class="st">st</p>
									</div></li>
							</ul>
					</a></li>
					<? } 
				}?>
				</ul>
			</div>
		</div>
	</div>
</div>

