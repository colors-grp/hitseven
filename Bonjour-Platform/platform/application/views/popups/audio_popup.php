<div id = "play_aud" style = "display:none;">
  		<embed id= "audio_id" height="100" width="300" src="">
</div>


<script>
function play_audio(audio_src) {
	// Opening animations
	<?php if($own_card!=FALSE ){?>
	document.getElementById("audio_id").src = audio_src; 
	$("#play_aud").modal({onOpen: function (dialog) {
		dialog.overlay.fadeIn('slow', function () {
			dialog.data.hide();
			dialog.container.fadeIn('slow', function () {
				dialog.data.slideDown('slow');	 
			});
		});
		
	}});
	<?php }else  {?>
		alert('Buy card ya 7abeeby l awl :P');ss
	<?php }?>
}

</script>