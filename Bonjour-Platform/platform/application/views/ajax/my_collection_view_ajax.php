<div class="colle">
    <div class="all">
        <div class="card_name"> <?= $card_name ?> <span> <?= $card_price ?> CC </span></div>
        <div class="trade"> <img src="<?= base_url(); ?>webassets/img/done.png" width="43" height="42" border="0"> Buy</div>
    </div>
    
	<div id = "play_aud" style = "display:none;">
  		<embed id= "audio_id" height="100" width="300" src="http://gloryette.org/heba/h7-assets/images/categories/blue/cards/1/audio/bohahahaha.mp3">
	</div>
	<div id = "show_vid" style = "display:none;">
		<video width="420" height="315" controls>
			<source id="video_id" src="" type="video/mp4"></source>
		</video>
	</div>
	<div id = "display_img" style = "display:none;">
		<img id = "img_id" src = "">
	</div>
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

<script type="text/javascript" charset="utf-8">
    $(document).ready(function(){
        $("area[rel^='prettyPhoto']").prettyPhoto();
				
        $(".gallery:first a[rel^='prettyPhoto']").prettyPhoto(
        {animation_speed:'normal',slideshow:3000, autoplay_slideshow: false,social_tools:false});
				
        $(".gallery:gt(0) a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'fast',slideshow:10000, hideflash: true ,social_tools:false});
    });
</script>
<script>

function show_video(video_src) {
		// Opening animations
		document.getElementById("video_id").src = video_src; 
		$("#show_vid").modal({onOpen: function (dialog) {
			dialog.overlay.fadeIn('slow', function () {
				dialog.data.hide();
				dialog.container.fadeIn('slow', function () {
					dialog.data.slideDown('slow');	 
				});
			});
			
		}});
}

function play_audio(audio_src) {
	// Opening animations
	document.getElementById("audio_id").src = audio_src; 
	$("#play_aud").modal({onOpen: function (dialog) {
		dialog.overlay.fadeIn('slow', function () {
			dialog.data.hide();
			dialog.container.fadeIn('slow', function () {
				dialog.data.slideDown('slow');	 
			});
		});
		
	}});
}
function display_image(img_src) {
	// Opening animations
	document.getElementById("img_id").src = img_src; 
	$("#display_img").modal({onOpen: function (dialog) {
		dialog.overlay.fadeIn('slow', function () {
			dialog.data.hide();
			dialog.container.fadeIn('slow', function () {
				dialog.data.slideDown('slow');	 
			});
		});
		
	}});
}
</script>