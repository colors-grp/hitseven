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
    <? } if ($cardinfo['media']['game']) { ?>  
        <div class="all_pakeg_gam">
            <h1>Games</h1>
            <div class="all">
                <div class="pakeg">
                    <?
                    foreach ($cardinfo['media']['game'] as $game) {
                        ?>
                        <div class="pakeg_item"> 
                        <? if ($game->game_type == 'image_puzzle') { ?>
                                <a href="javascript:;" title="Play !" class="play_game" onclick="open_win('<?= base_url("game/puzzel/$game->media_id/" . $cardinfo['info']->card_id); ?>');" >
                            <? } else if ($game->game_type == 'drag_drop_puzzel') { ?>
                                    <a href="javascript:;" title="Play !" class="play_game" onclick="open_win('<?= base_url("game/drage_drop/$game->media_id/" . $cardinfo['info']->card_id); ?>')">
                                <? } ?>
                                    <img src="<?= base_url(); ?>webassets/img/g1.jpg" border="0" class="img-circle">  
                                    <img src="<?= base_url(); ?>webassets/img/play.jpg" border="0">
                                </a>    
                        </div>
        <? }
    ?>
                </div>
            </div>
        </div>
        

<? } ?>
</div>


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