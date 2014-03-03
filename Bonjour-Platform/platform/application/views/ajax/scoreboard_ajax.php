 <? // foreach ($last_round as $cntndex => $user_score ) { ?>
 <?php
	$scoreboard = $_SESSION [ 'user_data' ];
	$all_users = $scoreboard ['all'];
	$top_users = $scoreboard ['top'];
	for($i = 0; $i < count ( $top_users ); $i ++) {
		?>
<div class='score_rank'>
	<table width="100%" border="1" cellpadding="0" cellspacing="0" style = "border-color:#fff;">
		<div id = "medal-symbol">
			<h5>
				<?= $top_users[$i]->name; ?>
			</h5>
		</div>
		<tr>
			<td width="12%" align="right"><img
				src="https://graph.facebook.com/<?= $all_users[$i]->fb_id ?>/picture?type=large"></td>
			<td width="76%"><h1> <?= $all_users[$i]->name ?></h1>
				<h2> <?= $all_users[$i]->score ?></h2></td>
			<td width="12%" align="center"><img
				src="<?= base_url() ?>h7-assets/images/scoreboard/change/<?=$all_users[$i]->change?>"
				width="14" height="12" border="0" style="width: 14px; height: 12px"></td>
			<td>
				<img src="<?= base_url() ?>webassets/img/gold_1.png">
			</td>
		</tr>
	</table>
</div>

<?}?>


<div class="scor_tab">
	<table width="100%" border="0" cellpadding="0"
		class="table table-bordered">
		<tr>
			<td width="14%" style="border-left: none;"><strong>Rank</strong></td>
			<td><img src="<?= base_url() ?>webassets/img/name-icon.png"
				width="16" height="17" border="0"></td>
			<td width="36%"><strong> Name</strong></td>
			<td width="27%"><img src="<?= base_url() ?>webassets/img/chart.png"
				height="14" width="16"> <strong>Score</strong></td>
			<td width="23%" style="border-right: none;"><img
				src="<?= base_url() ?>webassets/img/g_arr.png" width="13"><strong>
					Change</strong></td>
		</tr>
                        <?
                        for($i = 0; $i < count ( $all_users); $i ++) {
						?>

                            <? if ($all_users[$i]->score > 0) { ?>
                                <tr>
			<td style="border-left: none;"><?= $i + 1 ?> </td>
			<td><img
				src="https://graph.facebook.com/<?= $all_users[$i]->fb_id ?>/picture?width=200&height=200"
				style="width: 21px; height: 28px"></td>
			<td> &nbsp; <?= $all_users[$i]->name ?> </td>
			<td><?= $all_users[$i]->score ?></td>
			<td style="border-right: none;"><img
				src="<?= base_url() ?>h7-assets/images/scoreboard/change/<?=$all_users[$i]->change ?>.png"
				width="14" height="12"></td>
		</tr>
                            <? } ?>
                        <? } ?>



                    </table>

</div>
