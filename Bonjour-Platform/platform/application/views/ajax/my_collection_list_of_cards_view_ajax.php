<div class="fav-container" id="mycollections_cards">
	<? if($cards!= FALSE) { 
	foreach ($cards->result() as $card) {?>
	<div class="viewport" style="width: 382px;">
		<ul class="nav nav-pills card-holder2">
			<li style="width : 167px "><a href="javascript:void(0);"
				onclick="show_card_content('<?=$card->category_id?>','<?=$card->id?>','<?=$card->name?>','<?=$card->price?>','<?=$card->score?>','<?=$category_name?>');">
					<img src="<?= base_url() ?>webassets/img/cards.png" style="background-position: inherit; background-position-x: 26px; background-position-y: 6px; background-repeat: no-repeat;background-image:url(<?=base_url()?>h7-assets/images/categories/<?=$category_name?>/cards/<?=$card->id?>/ui/list_view.png);" alt="Card" >
					<div class="card-info"
						style="position: relative; left: 24px; top: -175px;">
						<h5>
							<?= $card->name ?>
						</h5>
						<p class="color">
							<?= $card->score ?>
							Score
						</p>
						<p class="color-points">
							<?= $card->price ?>
							Price
						</p>
					</div>
			</a></li>
			<li class="mg-container" style="top:22px;width:190px;">
				<div>
					<h4 class="media-title">Media</h4>
					<ul class="nav nav-pills media">
						<li class="video"><a> <img
								src="<?= base_url() ?>webassets/img/cards_icons_photo.png"
								alt="Photo">
						</a></li>
						<li class="video"><a> <img
								src="<?= base_url() ?>webassets/img/cards_icons_music.png"
								alt="Music">
						</a>
						</li>
						<li class="video"><a> <img
								src="<?= base_url() ?>webassets/img/cards_icons_video.png"
								alt="Video">
						</a>
						</li>
						<li class="video"><a><img
								src="<?= base_url() ?>webassets/img/cards_icons_games_01.png"
								alt="Game"> </a>
						</li>
					</ul>
				</div>
			</li>
		</ul>
	</div>
	<?
		}
	}else { ?>
	<p>No Cards purchased in this category...</p>
<?	}
?>
</div>
