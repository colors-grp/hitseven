<!-- Cards -->
<div id="list_view">
	<table id="cards" style="text-align: left;">
		<tr>
			<td colspan = "2" style = "border-top: 8px solid #68c220; box-shadow: 0 2px 2px -1px gray;">
				<h4>
					<img class="arrow"
						src="<?=base_url()?>/h7-assets/resources/img/main-icons/green-arrow.png"
						alt="green-arrow">Cards
					<a href="javascript:void(0);" onclick="get_cards(-1,-1);" style = "text-decoration: none; margin-left: 353px;margin-right: 10px;"><img src = "<?=base_url()?>/h7-assets/resources/img/main-icons/list_icon.png" alt = "list"> LIST</a>
					<a href="javascript:void(0);" onclick="get_cards_grid_view();" style = "text-decoration: none;"><img src = "<?=base_url()?>/h7-assets/resources/img/main-icons/grid_icon.png" alt = "grid"> GRID</a>
				</h4>
			</td>
			
		</tr>
		
    <? $j = 0;foreach ($cards->result() as $card) {
    	if ($j % 2 == 0) {
        ?>
			<tr>
			<?php }?>
				<td>
					<div class="card-list">
						<div class="card-holder-list">
							<img
								src="<?=base_url()?>h7-assets/images/categories/<?=$cat_name?>/cards/<?=$card->id?>/ui/list_view.png"
								class="card-pic-small" alt="card">
							<h6 align="center" class="card-list-points"><?= $card->price ?> Hit Points</h6>
						</div>
						<table class="card-list-details">
							<tr>
								<td colspan="5"><h4><?= $card->name ?></h4></td>
							</tr>
							<tr>
								<td colspan="2">
									<div class="media-div">Media</div>
								</td>
								<td><img
									src="<?=base_url()?>/h7-assets/resources/img/main-icons/cards_photo.png"
									width="20">
								</td>
								<td><img
									src="<?=base_url()?>/h7-assets/resources/img/main-icons/cards_music.png"
									width="20">
								</td>
								<td><img
									src="<?=base_url()?>/h7-assets/resources/img/main-icons/cards_video.png"
									width="20">
								</td>
							</tr>
							<tr style="height: 10px;"></tr>
							<tr>
								<td colspan="2">
									<div class="Games-div">Games</div>
								</td>
								<?php $i = 3; while ($i --) {?>
									<td><img
										src="<?=base_url()?>/h7-assets/resources/img/main-icons/cards_games.png"
										width="20">
									</td>
								<?php }?>
							</tr>
						</table>
					</div>
				</td>
				<?php if ($j % 2 != 0) {?>
			</tr>
		<?php } $j ++;}?>
	</table>
</div>
