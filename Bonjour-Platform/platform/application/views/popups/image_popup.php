
<div id="display_img" style="display: none;">
	<img id="img_id" src="">
</div>


<script>
	
function display_image(img_src) {
		<?php if($own_card!=FALSE ){?>
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
		<?php }else  {?>
			alert('Buy card ya 7abeeby l awl :P');ss
		<?php }?>
}

</script>
