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
