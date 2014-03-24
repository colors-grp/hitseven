<<<<<<< HEAD
<!-- Cards -->
<div id="list_view">
	<table id="cards" style="text-align: left;">
		<tr>
			<td colspan = "3" style = "border-top: 8px solid #68c220; box-shadow: 0 2px 2px -1px gray;">
				<h4>
					<img class="arrow"
						src="<?=base_url()?>/h7-assets/resources/img/main-icons/green-arrow.png"
						alt="green-arrow">Cards
					<a href = "#" style = "text-decoration: none; margin-left: 353px;margin-right: 10px;"><img src = "<?=base_url()?>/h7-assets/resources/img/main-icons/list_icon.png" alt = "list"> LIST</a>
					<a href = "#" style = "text-decoration: none;"><img src = "<?=base_url()?>/h7-assets/resources/img/main-icons/grid_icon.png" alt = "grid"> GRID</a>
				</h4>
			</td>
			
		</tr>

		<?
		$i = 0;
		foreach ($cards->result() as $card) {
			if ($i % 3 == 0) {
    		if ($i != 0) {?>
		</tr>
		<?php }?>
		<tr align="center" style="height: 300px;">
			<?php }
			$i ++;
			?>
			<td><font class="card-name"><?= $card->name ?></font>
				<hr />
				<div class="card-holder">
					<img
						src="<?=base_url()?>h7-assets/images/categories/<?=$category_name?>/cards/<?=$card->id?>/ui/list_view.png"
						class="card-pic" alt="card">
					<table class="card-elements">
						<tr>
							<td><img
								src="<?=base_url()?>/h7-assets/resources/img/main-icons/white_images_icon.png"
								alt=""></td>
							<td><img
								src="<?=base_url()?>/h7-assets/resources/img/main-icons/white_music_icon.png"
								alt=""></td>
						</tr>
						<tr>
							<td><img
								src="<?=base_url()?>/h7-assets/resources/img/main-icons/white_video_icon.png"
								alt=""></td>
							<td><img
								src="<?=base_url()?>/h7-assets/resources/img/main-icons/white_games_icon.png"
								alt=""></td>
						</tr>
					</table>
					<?php if (in_array($card->id, $user_cards) ) {?>
						<a class="trade-button" style="text-decoration: none;">
					<?php } else {?>
						<a href = "javascript:void(0)" onclick = "buy_card_now('<?= $card->price ?>', '<?= $user_points?>' , '<?= $card->score ?>', '<?= $card->id ?>')"
						class="trade-button" style="text-decoration: none;">
					<?php }?>
					  
					 <img src="<?=base_url()?>/h7-assets/resources/img/main-icons/trade_icon.png" alt="" width="40">
					</a> <font color="#68c220" class="grid-card-points"><?= $card->score ?> Points</font><br />
					<font color="#68c220" class="grid-card-coins"><?= $card->price ?> Hit Coins</font>
				</div>
			</td>
		<?php }?>
		<tr style="height: 30px;"></tr>
	</table>
</div>
<script>

function buy_card_now(card_price, user_points,card_score, card_id) {
	platform_page = "<?=base_url() ?>index.php?/platform/buy_card";
	$('#card-ajax').html('Processing ...'); //want to load card view after this ...
	$('#card-sta-hide').hide();
	$.post(platform_page, { card_price : card_price, user_points : user_points , card_id : card_id , cat_id : <?= $cat_id?> , card_score : card_score})
	.done(function( data ) {
		if (data > -1) {
			alert_success("Succeeded");
    		$("#user_points").html(data);
		}
		else {
    		alert_error("No Enough Points :(");
		}
		get_cards("<?=$cat_id ?>", "<?=$cat_name ?>");
	});
}


</script>
=======
<!-- Card list view begin -->
<div id="list_view" >
    <? foreach ($cards->result() as $card) {
        ?>
        <ul class="nav nav-pills card-holder first">
            <li>
            	<a href="javascript:;" class="card">
                        <img src="<?= base_url() ?>webassets/img/cards.png" style="background-image:url(<?=base_url()?>h7-assets/images/categories/<?=$category_name?>/cards/<?=$card->id?>/ui/list_view.png);" alt="Card" class="c-img">
                        <div class="card-info">
                            <h5><?= $card->name ?></h5>
							<p class="color-points"><?= $card->price ?> Price</p>
                            <p class="color"><?= $card->score ?> Scores</p>
                        </div>
            	</a>
            </li>
            <li class="mg-container">
						<div>
							<h4 class="media-title">Media</h4>
							<ul class="nav nav-pills media">
								<li class="photo"><a href="#"><img
										src="<?=base_url()?>webassets/img/cards_icons_photo.png"
										alt="Photo"> </a></li>
								<li class="music"><a href="#"><img
										src="<?=base_url()?>webassets/img/cards_icons_music.png"
										alt="Music"> </a></li>
								<li class="video"><a href="#"><img
										src="<?=base_url()?>webassets/img/cards_icons_video.png"
										alt="Video"> </a></li>
							</ul>
						</div>
						<div>
							<h4 class="games-title">Games</h4>
							<ul class="nav nav-pills games">
								<li class="game1"><a href="#"><img
										src="<?=base_url()?>webassets/img/cards_icons_games_01.png"
										alt="Game"> </a></li>
								<li class="game2"><a href="#"><img
										src="<?=base_url()?>webassets/img/cards_icons_games_01.png"
										alt="Game"> </a></li>
								<li class="game3"><a href="#"><img
										src="<?=base_url()?>webassets/img/cards_icons_games_01.png"
										alt="Game"> </a></li>
							</ul>
						</div>
					</li>
					<li class="card-status">
					<?php if (in_array($card->id, $user_cards) ) { ?>
							<a href="javascript:void(0)" onclick="show_card_content('<?=$card->category_id;?>','<?=$card->id?>','<?=$card->name?>','<?=$card->price?>','<?=$card->score?>','<?=$category_name?>')">
								<img class="status" src="<?=base_url()?>webassets/img/done_button.png" alt="Get">
							</a>
						<?php } else { ?>
							<a href="javascript:void(0)" onclick="show_card_content('<?=$card->category_id;?>','<?=$card->id?>','<?=$card->name?>','<?=$card->price?>','<?=$card->score?>','<?=$category_name?>')">
								<img class="status" src="<?=base_url()?>webassets/img/get_button.png" alt="Get">
							</a>
							
						<?php }?>
					</li>
        </ul>
        <div class="card-break" id="card-sta-hide">
            <img src="<?= base_url() ?>webassets/img/cards_breaks.png" alt="Cards Break" style="width: 536px; height: 2px;">
        </div>
<? } ?>
</div> <!-- card List view end -->
>>>>>>> bc7448ccaf71025d10bc3767d24edd95ca50bc32
