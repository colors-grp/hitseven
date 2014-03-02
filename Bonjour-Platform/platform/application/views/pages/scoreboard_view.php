<?php $load_scoreboard = $this->session->userdata('load_scoreboard')?>
<div
	class="header navbar navbar-static middle-nav">
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


<div
	class="row marketing" style="margin-top: -80px">
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
			<h1> 7alawa </h1>
		</div>
	</div>
	<!---------------------------------------------------------------------------------->
	<!-- LOAD SELECTED CATEGORY SCOREBOARD-->
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

function scoreboard(){
	ajaxpage = "<?= base_url()?>index.php?/scoreboard/get_scoreboard_details"  ;
	alert (ajaxpage);
	$('#card-ajax').html('Please Wait ...');
	$.post(ajaxpage)
	.done(function( data ) {
			$('#card-ajax').html(data);
	});
}
function load_scoreboard(cat_id,cat_name){
	//Load categories with selected catgory highlighted
	ajaxpage = "<?=base_url() ?>index.php?/ajax/category_highlight_ajax" ;
	$.post(ajaxpage , {cat_id : cat_id , cat_name : cat_name })
	.done(function(data){
		$("#cat_interest").html(data);
	});
	scoreboard();
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

function onload_scoreboard(cat_id , cat_name, to_load) {
	load_scoreboard(cat_id,cat_name);
	// get_not_interest_category(cat_id , cat_name , to_load);
}

</script>