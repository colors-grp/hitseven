
<div class="header navbar navbar-static middle-nav">

	<ul class="nav nav-pills navbar-right grid-nav">
		<li><a href="#" class="active"> <span><img
					src="<?=base_url()?>webassets/img/list_grid_view_selection.png"
					alt="List Icon Active" style="width: 50px; height: 48px;"> </span>
				<img src="<?=base_url()?>webassets/img/grid_list_icon_1.png"
				alt="List">
		</a>
		</li>
		<li><a href="#"> <span><img
					src="<?=base_url()?>webassets/img/list_grid_view_selection.png"
					alt="List Icon Active" style="width: 50px; height: 48px;"> </span>
				<img src="<?=base_url()?>webassets/img/grid_list_icon_2.png"
				alt="Grid">
		</a>
		</li>
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
	<div id="buy_credit" style="display: none;">

		<h2>Choose the desired amount</h2>
		<form id="buy_credit_form" action="" method="post">
			<input type="radio" name="credit" value="10" checked="checked">10<br>
			<input type="radio" name="credit" value="20">20<br> <input
				type="radio" name="credit" value="50">50<br> <input type="radio"
				name="credit" value="100">100<br> <input type="radio" name="credit"
				value="200">200<br> <input type="radio" name="credit" value="500">500<br>
			<input type="submit" value="Submit" name="credit_submission">
		</form>

	</div>
	<div id="pic" style="display: none;">
		<img src="<?=base_url()?>webassets/vidz/1.mpg" alt="pics">
	</div>
	<div id="vid" style="display: none;">
		<video width="420" height="315" controls>
			<source src="<?=base_url()?>webassets/vidz/1.mp4" type="video/mp4"></source>
		</video>
	</div>
	<div id="sound" style="display: none;">
		<embed height="100" width="300"
			src="<?=base_url()?>webassets/sound/1.mp3">
	
	</div>
	<div id="stream" style="display: none;">
		<object data="movie.mp4" width="320" height="240"
			type="application/x-shockwave-flash">
			<embed src="<?=base_url()?>webassets/vidz/1.mp4" width="320"
				height="240">
		
		</object>
	</div>
	<script>
				$("#getPointsButton").on('click',function(e){
					e.preventDefault();
					// Opening animations
					$("#buy_credit").modal({onOpen: function (dialog) {
						dialog.overlay.fadeIn('slow', function () {
							dialog.data.hide();
							dialog.container.fadeIn('slow', function () {
								dialog.data.slideDown('slow');	 
							});
						});
						
					}});
				});
				$("#buy_credit_form").on('submit',function(){
					$.post( "<?= base_url() ?>index.php?/platform/buy_credit", $( "#buy_credit_form" ).serialize() ).done(function(data) {
						$.modal.close();
						$("h1.points").html(data);
					});
					return false;
				});
	</script>
</div>


<div class="row marketing">
	<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">

		<div class="fav">
			<div class="fav-categories-head">
				<h1>My Favorite Categories</h1>
				<img
					src="<?=base_url()?>webassets/img/my_fav_categories_background.png"
					alt="My Favorite Categories">
			</div>
			<div id="cat_interest">
			</div>
		</div>

		<div class="categ">
			<div class="categories-head">
				<h1>Categories</h1>
				<img
					src="<?=base_url()?>webassets/img/category_address_background.png"
					alt="Categories">
			</div>

			<div class="viewport" style="width: 364px;">
				<ul class="nav fav-circles sidebar">
					<li class="first-categ">
						<ul class="nav nav-pills">

							<? 
							if(!$not_interest_cats){
								echo 'No Category';
							}else{
							foreach($not_interest_cats as $not_int_cat){?>
							<li id="cat_<?=$not_int_cat->id?>"><a href="javascript:void(0)"
								onclick="add_category(<?=$not_int_cat->id?>)"> <img class="choose-category" src="<?=base_url()?>webassets/img/choose_category_icon.png" alt="choose_1" style="background-image:url(<?=base_url()?>h7-assets/images/categories/<?= $not_int_cat->name?>/main_icon.png);">
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
		</div>
	</div>


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
	<script>
function get_cards(cat_id,cat_name){
	ajaxpage = "<?= base_url()?>index.php?/ajax/get_card_by_category"  ;
	$('#card-ajax').html('Please Wait ...' + cat_name);
	$('#card-sta-hide').hide();
	$.post(ajaxpage, { cat_id: cat_id , cat_name: cat_name , user_id : <?= $user_id?>})
	.done(function( data ) {
		if(data){
			$('#card-ajax').html(data);
			$('#cat_name').html(cat_name + ' / Card');
		}	
	});
	ajaxpage = "<?=base_url() ?>index.php?/ajax/category_highlight_ajax" ;
	$.post(ajaxpage , {cat_id : cat_id , cat_name : cat_name})
	.done(function(data){
		$("#cat_interest").html(data);
	});
}

function show_card_content(cat_id, card_id,card_name , card_price) {
	ajaxpage = "<?=base_url() ?>index.php?/ajax/get_card_info_mycollection";
	$('#card-ajax').html('Please Wait ...' + cat_id);
	$('#card-sta-hide').hide();
	$.post(ajaxpage, { cat_id: cat_id , card_id: card_id , card_name : card_name , card_price : card_price, user_points : <?= $user_points?> , user_id : <?= $user_id?>})
	.done(function( data ) {
		if(data){
			$('#card-ajax').html(data);
			$('#cat_name').html(cat_name + ' / Card');
		}	
	});
}

</script>