
<!-- Category cards -->
<table style="width: 629px;">
	<tr>
		<td
			style="border-top: 8px solid #68c220; box-shadow: 0 2px 2px -1px gray;">
			<h4>
				<img class="arrow"
					src="<?=base_url()?>h7-assets/resources/img/main-icons/green-arrow.png"
					alt="green-arrow"> Category Name <a href="#"
					style="text-decoration: none; margin-left: 130px; margin-right: 10px; font-size: 14px;">
					<img
					src="<?=base_url()?>/h7-assets/resources/img/main-icons/score_sort.jpg"
					alt="score-icon"> SORT BY SCORE
				</a> <a href="#" style="text-decoration: none; font-size: 14px;"> <img
					src="<?=base_url()?>/h7-assets/resources/img/main-icons/game_sort.png"
					alt="game-icon">SORT BY GAME
				</a>
			</h4>
		</td>
	</tr>
</table>

<table id="category-cards">

	<? if($cards!= FALSE) { 
		$i = 0;
	foreach ($cards->result() as $card) {
		if ($card->id == $card_id || ($card_id == '-1' && $i == 0)) {
			$i ++;
			?>
				<tr style="height: 110px; background :  <?=$color ?>;">
			<?php } else {?>
				<tr style="height: 110px; background :  rgba(255,255,255,0);">
			<?php }?>
		<td><a href="javascript:void(0);"
			onclick="on_load_my_collection('<?=$card->category_id?>','<?=$category_name?>','<?=$card->id?>','<?=$card->name?>','<?=$card->price?>','<?=$card->score?>');"
			style="text-decoration: none;">
				<div class="card-holder-small">
					<img
						src="<?=base_url()?>h7-assets/images/categories/<?=$category_name?>/cards/<?=$card->id?>/ui/list_view.png"
						class="card-pic-small" alt="card">
				</div>
		</a>
		</td>
	</tr>
	<tr>
		<td><?= $card->name ?></td>
	</tr>
	<tr style="height: 25px;"></tr>
	<?
	}
	}else { ?>
	<p>No Cards purchased in this category...</p>
	<?	}
	?>
</table>
<!-- end of category cards -->
