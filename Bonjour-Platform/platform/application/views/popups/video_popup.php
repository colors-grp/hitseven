<div id = "show_vid" style = "display:none;">
		<video width="420" height="315" controls>
			<source id="video_id" src="" type="video/mp4"></source>
		</video>
</div>

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

</script>