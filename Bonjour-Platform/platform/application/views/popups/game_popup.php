
<div id="display_game" style="display: none;"></div>


<script>
	
function open_game(card_id, game_id, game_name) {
	<?php if($own_card!=FALSE ){?>
	game_page = "<?=base_url() ?>index.php?/game_center/load_game_view";
	wid = 0.9 * $(window).width();
	hit = 0.9 * $(window).height();
	
	$.post(game_page , {card_id : card_id, game_id : game_id, game_name : game_name})
	.done(function( data ) {
		$('#display_game').html(data);
		if(data){
			$("#display_game").modal({
				minHeight:hit,
				minWidth: wid,
				onOpen: function (dialog) {
				dialog.overlay.fadeIn('slow', function () {
					dialog.data.hide();
						dialog.container.fadeIn('slow', function () {
							dialog.data.slideDown('slow');
						});
					});
				}
			});
		}	
	});
	<?php }else  {?>
		alert('Buy card ya 7abeeby l awl :P');
	<?php }?>
}

</script>
