
<div
	class="header navbar navbar-static middle-nav">

	<!-- 	View the list and grid small icons ... -->
	<ul class="nav nav-pills navbar-right grid-nav">
		<li><a href="javascript:void(0);" onclick="get_cards(-1,-1);"
			class="active"> <span><img
					src="<?=base_url()?>webassets/img/list_grid_view_selection.png"
					alt="List Icon Active" style="width: 50px; height: 48px;"> </span>
				<img src="<?=base_url()?>webassets/img/grid_list_icon_1.png"
				alt="List">
		</a>
		</li>
		<li><a href="javascript:void(0);" onclick="get_cards_grid_view();"> <span><img
					src="<?=base_url()?>webassets/img/list_grid_view_selection.png"
					alt="List Icon Active" style="width: 50px; height: 48px;"> </span>
				<img src="<?=base_url()?>webassets/img/grid_list_icon_2.png"
				alt="Grid">
		</a>
		</li>
	</ul>
	<!-- ------------------------------------------ -->

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
		<li class="buy"><a href="#" class="dropdown-toggle purchase"
			data-toggle="dropdown">
				<h6 class="purchasebtn">Purchased</h6> <img
				src="<?=base_url()?>webassets/img/filters_purchased_icon.png"
				alt="Purchased Filter"> <img
				src="<?=base_url()?>webassets/img/filters_box_icon.png" alt="Box">
		</a>
			<ul class="dropdown-menu missing-games">
				<li><a href="#">
						<h6 class="missbtn">
							Missing<br>Games
						</h6> <img
						src="<?=base_url()?>webassets/img/filters_games_icon.png"
						alt="Games">
				</a>
				</li>
			</ul>
		</li>
	</ul>

	<!-- 	Load the Buy Credit Popup ... -->
	<?php
	$this->load->view('popups/buy_credit_popup');
	?>

</div>


<div
	class="row marketing">
	<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
		<!-- LOAD FAVOURITE CATEGORIES-->
		<div class="fav">
			<div class="fav-categories-head">
				<h1>My Favorite Categories</h1>
				<img
					src="<?=base_url()?>webassets/img/my_fav_categories_background.png"
					alt="My Favorite Categories">
			</div>
			<div id="cat_interest"></div>
		</div>
		<!---------------------------------------------------------------------------------->
		<!-- LOAD OTHER CATEGORIES-->
		<div class="categ">
			<div class="categories-head">
				<h1>Categories</h1>
				<img
					src="<?=base_url()?>webassets/img/category_address_background.png"
					alt="Categories">
			</div>

			<div id="catss_not_interest" style="width: 364px;"></div>
		</div>
	</div>
	<!---------------------------------------------------------------------------------->
	<!-- LOAD SELECTED CATEGORY CARDS-->
	<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
		<div class="Cards">
			<div class="cards-head">
				<h1 id="cat_name">
					<?=$first_cat_name?>
					Cards
				</h1>
				<img src="<?=base_url()?>webassets/img/cards_address_background.png"
					alt="Cards">
			</div>
			<div class="viewport" style="width: 576px;" id="card-ajax"></div>
		</div>
	</div>
	<!---------------------------------------------------------------------------------->

<script>
function get_cards(cat_id,cat_name){
	//Load categories with selected catgory highlighted
	ajaxpage = "<?=base_url() ?>index.php?/ajax/category_highlight_ajax" ;
	$.post(ajaxpage , {cat_id : cat_id , cat_name : cat_name })
	.done(function(data){
		$("#cat_interest").html(data);
	});	
	//Load new cards
	ajaxpage = "<?= base_url()?>index.php?/ajax/get_card_by_category"  ;
	$('#card-ajax').html('Please Wait ...');
	$('#card-sta-hide').hide();
	$.post(ajaxpage, { cat_id: cat_id , cat_name: cat_name })
	.done(function( data ) {
		if(data){
			$('#card-ajax').html(data);
		}	
	});
	//Load new name
	if(cat_name == -1) {
		ajaxpage= "<?= base_url()?>index.php?/ajax/get_category_name";
		$.post(ajaxpage)
		.done(function( data ) {
			if(data){
				$('#cat_name').html(data + ' / Card');
			}	
		});
	}else {
		$('#cat_name').html(cat_name + ' / Card');
	}
}

function get_cards_grid_view() {
	ajaxpage = "<?= base_url()?>index.php?/ajax/get_card_grid_view";
	$('#card-ajax').html('Please Wait ...');
	$('#card-sta-hide').hide();
	$.post(ajaxpage)
	.done(function( data ) {
		if(data){
			$('#card-ajax').html(data);
		}	
	});
	//Load new name
	ajaxpage= "<?= base_url()?>index.php?/ajax/get_category_name";
	$.post(ajaxpage)
	.done(function( data ) {
		if(data){
			$('#cat_name').html(data + ' / Card');
		}	
	});

}


function get_not_interest_category(cat_id , cat_name ,  to_load){
	ajaxpage = "<?=base_url() ?>index.php?/ajax/load_not_interest_category";
	$.post(ajaxpage, {cat_id : cat_id  ,  to_load :  to_load  })
	.done(function( data ) {
		if(data){
			$('#catss_not_interest').html(data);
		}	
	});
	get_cards(cat_id , cat_name);
}

function show_card_content(cat_id, card_id,card_name , card_price,card_score) {
	ajaxpage = "<?=base_url() ?>index.php?/ajax/get_card_info_mycollection";
	$('#card-ajax').html('Please Wait ...' + cat_id);
	$('#card-sta-hide').hide();
	$.post(ajaxpage, { cat_id: cat_id , card_id: card_id , card_name : card_name , card_price : card_price, user_points : <?= $user_points?>  , card_score : card_score})
	.done(function( data ) {
		if(data){
			$('#card-ajax').html(data);
			$('#cat_name').html(cat_name + ' / Card');
		}	
	});
}

function onload_function(cat_id , cat_name, to_load) {
	get_cards(cat_id,cat_name);
	get_not_interest_category(cat_id , cat_name , to_load);
}

</script>