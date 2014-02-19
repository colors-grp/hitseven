
<div id="buy_credit" style="display: none;">

	<h2>Choose the desired amount</h2>
	<form id="buy_credit_form" action="" method="post">
		<input type="radio" name="credit" value="10" checked="checked">10<br>
		<input type="radio" name="credit" value="20">20<br> <input
			type="radio" name="credit" value="50">50<br> <input type="radio"
			name="credit" value="100">100<br> <input type="radio" name="credit"
			value="200">200<br> <input type="radio" name="credit" value="500">500<br>
		<input type="submit" value="Submit" name="credit_submission">
	</form>

</div>

<script>
$("#getPointsButton").on('click',function(e){
	e.preventDefault();
	// Opening animations
	$("#buy_credit").modal({onOpen: function (dialog) {
		dialog.overlay.fadeIn('slow', function () {
			dialog.data.hide();
			dialog.container.fadeIn('slow', function () {
				dialog.data.slideDown('slow');
			});
		});

	}});
});
$("#buy_credit_form").on('submit',function(){
	$.post( "<?= base_url() ?>index.php?/platform/buy_credit", $( "#buy_credit_form" ).serialize() ).done(function(data) {
		$.modal.close();
		$("h1.points").html(data);
	});
	return false;
});
</script>
