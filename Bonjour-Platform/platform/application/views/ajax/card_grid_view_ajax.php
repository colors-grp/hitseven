</div> <!-- card List view end -->
<div id="grid_view">
    <? foreach ($cards->result() as $card) {
       if (in_array($card->id, $user_cards)) { ?>
            <div class="view_card">
                <div class="grid-header">
                    <span class="grid-card-name"> <?= $card->name ?></span>
                    <span class="grid-card-point"> <?= $card->price ?> Points </span>
                </div>
                <a> <!-- on click should show card content -->
                    <img src = "<?=base_url()?>h7-assets/images/categories/<?=$cat_name?>/cards/<?=$card->id?>/ui/grid_view.png" width="241" height="308" border="0">
                </a>
            </div>
    <? } else { ?>
            <div class="view_card">
                <div class="grid-header">
                    <span class="grid-card-name"> <?= $card->name?></span>
                    <span class="grid-card-point"> <?= $card->price ?> Points </span>
                </div>
                <a>
                    <div class="view_card_get">&nbsp;</div>
                    <img src = "<?=base_url()?>h7-assets/images/categories/<?=$cat_name?>/cards/<?=$card->id?>/ui/grid_view.png"  width="241" height="308" border="0">
                </a>
            </div>
    <? } 
 } ?>
</div> <!-- card  Grid view end -->