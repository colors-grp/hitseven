<<<<<<< HEAD

<table id="card-details-table">
	<tr style="height: 10px;">
		<td colspan="3"></td>
	</tr>
	<tr>
		<td>
			<div id="card-details-background">
				<?= $card_name ?>
			</div>
		</td>
		<td>
			<div id="card-details-background">
				<?= $card_price ?>
				Hit Points
			</div>
		</td>
		<td>
			<div id="card-details-background">

				<?php if($own_card == FALSE) {?>
				<a href="javascript:void(0)"
					onclick="buy_card('<?= $card_price ?>', '<?= $user_points?>' , '<?= $card_score?>')">
					<img
					src="<?=base_url()?>h7-assets/resources/img/main-icons/trade_icon.png"
					alt="trade-icon" style="height: 25px; margin-right: 7px;">Trade
				</a>
				<?php } else {?>
				<img
					src="<?=base_url()?>h7-assets/resources/img/main-icons/trade_icon.png"
					alt="trade-icon" style="height: 25px; margin-right: 7px;">Done
				<?php }?>

			</div>
		</td>
	</tr>
	<tr style="height: 10px;">
		<td colspan="3"></td>
	</tr>
</table>

	<!-- 	Load the Image Popup ... -->
	<?php
	$this->load->view('popups/image_popup');
	?>
	
    <!-- 	Load the Audio Popup ... -->
	<?php
	$this->load->view('popups/audio_popup');
	?>
    
    <!-- 	Load the Video Popup ... -->
	<?php
	$this->load->view('popups/video_popup');
	?>
    <!-- 	Load the Game Popup ... -->
	<?php
	$this->load->view('popups/game_popup');
	?>
	

<? if ($images != false) { ?>
<table id="card-photos">
	<tr>
		<td colspan="4" style="border-bottom: 2px solid #68c220;"><img
			src="<?=base_url()?>h7-assets/resources/img/main-icons/cards_photo.png"
			style="margin-right: 7px; margin-left: 7px; margin-bottom: 7px;" />Photos
		</td>
	</tr>
	<tr align="center">
		<? foreach($images as $img) { ?>
		<td class="photo-padding">
			<a href="javascript:void(0)"
				onclick="display_image('<?= base_url(); ?>h7-assets/images/categories/<?=$cat_name?>/cards/<?= $card_id?>/image/<?= $img?>')">
					<img
					src="<?= base_url(); ?>h7-assets/images/categories/<?=$cat_name?>/cards/<?= $card_id?>/image/<?= $img?>"
					border="0" class="img-circle" style="width: 40px; height: 40px;">
			</a>
		
		</td>
		<?php }?>
	</tr>
</table>
<? } if ($videos != false) { ?>
<table id="card-videos">
	<tr>
		<td colspan="4" style="border-bottom: 2px solid #68c220;"><img
			src="<?=base_url()?>h7-assets/resources/img/main-icons/cards_video.png"
			style="margin-right: 7px; margin-left: 7px; margin-bottom: 7px;" />Videos
		</td>
	</tr>
	
	<tr align="center">
		<? foreach ($videos as $video) { ?>
		<td class="photo-padding">
			<a href="javascript:void(0)" onclick ="show_video('<?=base_url();?>h7-assets/images/categories/<?=$cat_name?>/cards/<?= $card_id?>/video/<?= $video?>')">
				<img src="<?= base_url() ?>/webassets/img/vid.jpg" border="0" class="img-circle">
			</a> 
		</td>
		<?php }?>
	</tr>
</table>
<? } if ($audios != false) { ?>
<table id="card-music">
	<tr>
		<td colspan="4" style="border-bottom: 2px solid #68c220;"><img
			src="<?=base_url()?>h7-assets/resources/img/main-icons/cards_music.png"
			style="margin-right: 7px; margin-left: 7px; margin-bottom: 7px;" />Music
		</td>
	</tr>
	<tr align="center">
		<? foreach ($audios as $audio) {  ?>
		<td class="photo-padding">
			<a href="javascript:void(0)" onclick ="play_audio('<?=base_url();?>h7-assets/images/categories/<?=$cat_name?>/cards/<?= $card_id?>/audio/<?= $audio?>')">
				<img src="<?= base_url(); ?>webassets/img/mu.jpg" border="0" class="img-circle" > 
			</a>
		</td>
		<?php }?>
	</tr>
	
</table>
<? } if ($games != false) { ?>

<table id="card-game">
	<tr>
		<td colspan="4" style="border-bottom: 2px solid #68c220;"><img
			src="<?=base_url()?>h7-assets/resources/img/main-icons/cards_game.png"
			style="margin-right: 7px; margin-left: 7px; margin-bottom: 7px;" />Games
		</td>
	</tr>
	
	<tr align="center">
		<? foreach ($games->result() as $game) {  ?>
		<td class="photo-padding">
			<a href="javascript:void(0)" onclick ="open_game('<?=$card_id?>', '<?= $game->game_id?>','<?= $game->game_name?>')">
				<img src="<?= base_url(); ?>webassets/img/gam.jpg" border="0" class="img-circle" > 
			</a>
		</td>
		<?php }?>
	</tr>
</table>
<?php }?>
=======
<div class="colle">
    <div class="all">
        <div class="card_name"> <?= $card_name ?> <span> <?= $card_price ?> CC </span></div>
        <?php if($own_card == FALSE) {?>
        <div class="trade">
        	<a href = "javascript:void(0)" onclick = "buy_card('<?= $card_price ?>', '<?= $user_points?>' , '<?= $card_score?>')">
        	<img src="<?= base_url(); ?>webassets/img/done.png" width="43" height="42" border="0">
        	</a>
        	Buy
        </div>
        <?php } else {?>
        <div class="trade">
        	<img src="<?= base_url(); ?>webassets/img/done.png" width="43" height="42" border="0">
        	Done
        </div>
        <?php }?>
    </div>
    
    <!-- 	Load the Image Popup ... -->
	<?php
	$info['own_card'] = $own_card;
	$this->load->view('popups/image_popup');
	?>
	
    <!-- 	Load the Audio Popup ... -->
	<?php
	$info['own_card'] = $own_card;
	$this->load->view('popups/audio_popup');
	?>
    
    <!-- 	Load the Video Popup ... -->
	<?php
	$info['own_card'] = $own_card;
	$this->load->view('popups/video_popup');
	?>
	
    
    <? if ($images != false) { ?>
        <div class="all_pakeg_ph">
            <h1>Photos </h1>
            <div class="all">
                <div class="pakeg">
                    <ul style="list-style-type:none;">
                        <? foreach($images as $img) { ?>
                            <li>
                                <div class="pakeg_item"> 
                                    <a href="javascript:void(0)" onclick = "display_image('<?= base_url(); ?>h7-assets/images/categories/<?=$cat_name?>/cards/<?= $card_id?>/image/<?= $img?>')" >             
	                                    <img src="<?= base_url(); ?>h7-assets/images/categories/<?=$cat_name?>/cards/<?= $card_id?>/image/<?= $img?>" border="0" class="img-circle" style="width: 80px;height: 80px;"> 
	                                    <br>Girls
                                    </a>
                                </div>
                            </li>
                        <? } ?>
                    </ul>
                </div>
            </div>
        </div>

    <? } if ($videos != false) { ?>
        <div class="all_pakeg_vi">
            <h1> Video</h1>
            <div class="all">
                <div class="pakeg">
                    <ul style="list-style-type:none;">
                        <? foreach ($videos as $video) { ?>
                            <li> 
                                <div class="pakeg_item"> 
                                    <a href="javascript:void(0)" onclick ="show_video('<?=base_url();?>h7-assets/images/categories/<?=$cat_name?>/cards/<?= $card_id?>/video/<?= $video?>')">
                                        <img src="<?= base_url() ?>/webassets/img/vid.jpg" border="0" class="img-circle" style="width: 80px;height: 80px;"> 
                                        <img src="<?= base_url(); ?>webassets/img/play.jpg" border="0">
                                    </a> 
                                    <a href="javascript:;"><img src="<?= base_url(); ?>webassets/img/down.jpg" border="0"></a>  
                                </div>
                            </li> 
                            <?
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    <? }if ($audios != false) { ?>
        <div class="all_pakeg_mu">
            <h1>Music</h1>
            <div class="all">
                <div class="pakeg">
                    <ul style="list-style-type:none;">
                        <? foreach ($audios as $audio) {  ?>
                            <li>
                                <div class="pakeg_item"> 
									<a href="javascript:void(0)" onclick ="play_audio('<?=base_url();?>h7-assets/images/categories/<?=$cat_name?>/cards/<?= $card_id?>/audio/<?= $audio?>')">
	                                    <img src="<?= base_url(); ?>webassets/img/mu.jpg" border="0" class="img-circle" style="width: 80px;height: 80px;"> 
	                                    <img src="<?= base_url(); ?>webassets/img/play.jpg" border="0"> I <a href="javascript:;"><img src="<?= base_url(); ?>webassets/img/down.jpg" border="0"></a>
                                    </a>
                                </div>
                            </li>
                         <? } ?>
                    </ul> 
                </div>
            </div>
        </div>
    <? } ?></div>


<script>

function buy_card(card_price, user_points,card_score) {
	platform_page = "<?=base_url() ?>index.php?/platform/buy_card";
	$('#card-ajax').html('Processing ...'); //want to load card view after this ...
	$('#card-sta-hide').hide();
	$.post(platform_page, { card_price : card_price, user_points : user_points , card_id : <?= $card_id?> , cat_id : <?= $cat_id?> , card_score : card_score})
	.done(function( data ) {
		if (data > -1) {
			alert ("succeeded");
    		$("h1.points").html(data);
		}
		else {
    		alert ("No Enough Points :(");
		}
		get_cards("<?=$cat_id ?>", "<?=$cat_name ?>");
	});
}


</script>
>>>>>>> bc7448ccaf71025d10bc3767d24edd95ca50bc32
