
<div
	class="header navbar navbar-static middle-nav">
	<ul class="nav nav-pills navbar-right grid-nav">
	</ul>
	<ul class="nav nav-pills points-nav">
		<li><a href="#"> <img class="point-bg"
				src="<?=base_url()?>webassets/img/points_button.png" alt="Points">
				<h1 class="points">
					<?= $user_points ?>
				</h1>
		</a>
		</li>
		<li class="get"><a id="getPointsButton" class="getpoints" href="#">
				<h3 class="getpointsbtn">Get More Points</h3> <img
				class="get-points"
				src="<?=base_url()?>webassets/img/get_more_points_button.png"
				alt="Get More Points">
		</a>
		</li>
	</ul>

	<!-- 	Load the Buy Credit Popup ... -->
	<?php
	$this->load->view('popups/buy_credit_popup');
	?>
</div>

<div class="all2" style="padding: 0px 0px 70px 0px; margin-top: -60px;">
	<?
	if ($interest_cats != FALSE) {
        foreach ($interest_cats->result() as $cat) {
    ?>
	<div class="round">
		<a href="javascript:void(0);" onclick= "on_load_my_collection('<?= $cat->id?>' , '<?= $cat->name?>');">
			<table width="100%" border="0" >
				<tr>
					<td><img
						src="<?=base_url()?>webassets/img/category_color_circle_bck.png"
						alt="Category Color Circle" border="0"> <img
						src="http://gloryette.org/heba/h7-assets/images/categories/<?= $cat->name?>/main_icon.png"
						style="position: relative; top: -109px;">
					</td>
				</tr>
				<tr>
					<td align="center"
						style="position: relative; top: -177px; color: white;"><?= $cat->name ?>
					</td>
				</tr>
			</table>
		</a>
	</div>
	<?} 
}?>
</div>
<div class="row marketing">

	<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">

		<div class="fav">
			<div class="fav-categories-head">
				<h1>Card</h1>
				<img
					src="<?= base_url() ?>webassets/img/my_fav_categories_background.png"
					alt="My Favorite Categories">
			</div>
			
			<div class="category-selection" id="category-cards">
				<div class="fav-container">
				</div>
			</div>
		
		</div>
	</div>


	<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
		<div class="Cards">
			<div class="cards-head">
				<h1>Card Information</h1>
				<img
					src="<?= base_url() ?>webassets/img/cards_address_background.png"
					alt="Cards">
			</div>
			<div class="viewport" style="height: 690px; width: 576px;"
				id="card_info"></div>
		</div>
	</div>
	
<script>
function on_load_my_collection(cat_id , cat_name) {
	ajaxpage = "<?=base_url() ?>index.php?/ajax/get_cards_my_collection_view";
	$('#fav-container').hide();
	$.post(ajaxpage, { cat_id: cat_id , cat_name : cat_name})
	.done(function( data ) {
		$('#category-cards').html(data);
	});

	show_card_content(cat_id , -1 , -1 , -1 , -1,cat_name);
}

function show_card_content(cat_id, card_id,card_name , card_price,card_score,cat_name) {
	if(card_id != -1) {
		ajaxpage = "<?=base_url() ?>index.php?/ajax/get_card_info_mycollection";
		$.post(ajaxpage, { cat_id: cat_id , card_id: card_id , card_name : card_name , card_price : card_price, user_points : <?= $user_points?>  , card_score : card_score , cat_name : cat_name})
		.done(function( data ) {
			if(data){
				$('#card_info').html(data);
			}	
		});
	}else {
		ajaxpage = "<?=base_url() ?>index.php?/ajax/on_load_get_card_info";
		$.post(ajaxpage, { cat_id: cat_id , cat_name : cat_name})
		.done(function( data ) {
			if(data){
				$('#card_info').html(data);
			}	
		});
	}
}
</script>