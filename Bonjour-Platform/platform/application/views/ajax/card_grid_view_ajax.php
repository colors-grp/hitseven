<!-- Cards -->
<div id="list_view">
	<table id="cards" style="text-align: left;">

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
			<td><font class="card-name"><?= $card->name ?> </font>
				<hr />
				<div class="card-holder">
					<img
						src="<?=base_url()?>h7-assets/images/categories/<?=$cat_name?>/cards/<?=$card->id?>/ui/list_view.png"
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
					<a class="trade-button" style="text-decoration: none;"> <?php } else {?>
						<a href="javascript:void(0);"
						onclick="buy_card_now('<?= $card->price ?>', '<?= $user_points?>' , '<?= $card->score ?>', '<?= $card->id ?>')"
						class="trade-button" style="text-decoration: none;"> <?php }?> <img
							src="<?=base_url()?>/h7-assets/resources/img/main-icons/trade_icon.png"
							alt="" width="40">
					</a> <font color="#68c220" class="grid-card-points"><?= $card->score ?>
							Points</font><br /> <font color="#68c220" class="grid-card-coins"><?= $card->price ?>
							Hit Coins</font>
				
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
