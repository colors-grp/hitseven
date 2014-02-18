<div id="catss_not_interest" style="width: 364px;">
	<ul class="nav fav-circles sidebar">
		<li class="first-categ">
			<ul class="nav nav-pills">
				<? 
				if(!$not_interest_cats){
								echo 'No Category';
							}else{
							foreach($not_interest_cats as $not_int_cat){?>
				<li id="cat_<?=$not_int_cat->id?>"><a href="javascript:void(0)"
					onclick="get_not_interest_category('<?=$not_int_cat->id?>','<?= $not_int_cat->name?>')">
						<img class="choose-category" src="<?=base_url()?>webassets/img/choose_category_icon.png" alt="choose_1" style="background-image:url(<?=base_url()?>h7-assets/images/categories/<?= $not_int_cat->name?>/main_icon.png);">
						<span><img
							src="<?=base_url()?>webassets/img/category_plus_icon.png"
							alt="Add Category"> </span>
						<div class="categ-name">
							<h4>
								<?=$not_int_cat->name;?>
							</h4>
						</div>
				</a>
				</li>
				<? } 
}?>
			</ul>
		</li>
	</ul>
</div>
