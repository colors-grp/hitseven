<div class="colle">
    <div class="all">
        <div class="card_name"> <?= $card_name ?> <span> <?= $card_price ?> CC </span></div>
        <div class="trade"> <img src="<?= base_url(); ?>webassets/img/done.png" width="43" height="42" border="0"> Buy</div>
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
                                    <a href="<?= base_url(); ?>/h7-assets/images/categories/<?=$cat_name?>/cards/<?= $card_id?>/image/<?= $img?>" rel="prettyPhoto[gallery2]" title="image_name">             
                                    <img src="<?= base_url(); ?>/h7-assets/images/categories/<?=$cat_name?>/cards/<?= $card_id?>/image/<?= $img?>" border="0" class="img-circle" style="width: 80px;height: 80px;"> 
                                    <br>Girls</a>
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

                    <ul>
                        <?
                        foreach ($cardinfo['media']['vedio'] as $vedio) {
                            ?>
                            <li> 
                                <div class="pakeg_item"> 
                                    <a href="<?= $vedio->link ?>" rel="prettyPhoto[video1]" title="<?= $vedio->media_name ?>">
                                        <img src="<?= base_url(); ?>webassets/uploads/cards/media/icons/<?= $vedio->icon ?>" border="0" class="img-circle" style="width: 80px;height: 80px;"> 
                                        <img src="<?= base_url(); ?>webassets/img/play.jpg" border="0">
                                    </a> 
                                    I <a href="javascript:;"><img src="<?= base_url(); ?>webassets/img/down.jpg" border="0"></a>  
                                </div>
                            </li> 
                            <?
                        }
                        ?>


                    </ul>

                </div>
            </div>
        </div>
    <? }if ($audios != false) {
        ?>

        <div class="all_pakeg_mu">
            <h1>Music</h1>
            <div class="all">
                <div class="pakeg">
                    <ul >
                        <?
                        foreach ($cardinfo['media']['audio'] as $audio) {
                            ?>
                            <li>
                                <div class="pakeg_item"> 
                                    <a href="<?= base_url(); ?>soundplayer.php?titles=<?= $audio->media_name ?>&link=<?= $audio->file ?>&width=47%&height=70%&iframe=true" rel="prettyPhoto[iframeSs]" title="<?= $audio->media_name ?>">
                                        <img src="<?= base_url(); ?>webassets/uploads/cards/media/icons/<?= $audio->icon ?>" border="0" class="img-circle" style="width: 80px;height: 80px;"> 
                                        <img src="<?= base_url(); ?>webassets/img/play.jpg" border="0"></a> I <a href="javascript:;"><img src="<?= base_url(); ?>webassets/img/down.jpg" border="0"></a>  

                                </div>
                            </li>
                            <? }
                        ?>

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
