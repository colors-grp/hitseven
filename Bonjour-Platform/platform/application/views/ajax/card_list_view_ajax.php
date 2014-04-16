<!-- Cards -->
<div id="list_view">
	<table id="cards" style="text-align: left;">
		<? $j = 0;foreach ($cards->result() as $card) {
			if ($j % 2 == 0) {
				?>
		<tr>
			<?php }?>
			<td>
				<div class="card-list">
					<a href="<?=base_url()?>index.php?/my_collection/get_my_collection/?cur_card_id=<?=$card->id?>">
						<div class="card-holder-list">
							<img
								src="<?=base_url()?>h7-assets/images/categories/<?=$cat_name?>/cards/<?=$card->id?>/ui/list_view.png"
								class="card-pic-small" alt="card">
							<h6 align="center" class="card-list-points">
								<?= $card->price ?>
								Hit Points
							</h6>
						</div>
					</a>
					<table class="card-list-details">
						<tr>
							<td colspan="5"><h4>
									<?= $card->name ?>
								</h4></td>
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
		<?php } $j ++;
}?>
	</table>
</div>
