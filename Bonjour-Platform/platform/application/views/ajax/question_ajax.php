
<div id = "question">
<?php foreach ($questions->result() as $question) {?>
	<h2><?=$question->content?></h2>
	<form id="question_form" action="" onclick = "add_score();" method="post">
		<input type="radio" name="choice" value="10" checked="checked"><?=$question->answer1?><br>
		<input type="radio" name="choice" value="20"><?=$question->answer2?><br> 
		<input type="radio" name="choice" value="50"><?=$question->answer3?><br> 
		<input type="radio" name="choice" value="100"><?=$question->answer4?><br>
		<input type="button" value="Submit" name="question_submission">
	</form>
<?php }?>

</div>

<h2 id = "calc_score" style = "display: none;">0</h2>

<script>

function add_score() {
	score = document.getElementById("calc_score").innerHTML;
	alert (score);
	$("calc_score").html(data);
}
</script>
