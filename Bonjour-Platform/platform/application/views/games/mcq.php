<html>
<head>
<script>
	function start_mcq() {
		game_page = "<?=base_url() ?>index.php?/game_center/get_mcq_questions";
		$.post(game_page, { card_id : <?=$card_id?>})
		.done(function( data ) {
			$("#question").html(data);
		});
	}
</script>
</head>
<body onload = "start_mcq();">
	<button onclick = "start_mcq();">Start Game</button>
<div id = "question">
	
</div>
</body>
</html>