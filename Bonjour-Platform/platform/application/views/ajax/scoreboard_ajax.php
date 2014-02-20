 <? // foreach ($last_round as $cntndex => $user_score ) { ?>
 <?php
	$cnt = 0;
	$medal = array (
			"gold",
			"silver",
			"bronz" 
	);
	$scoreboard = $this->session->userdata ( 'user_data' );
	foreach ( $scoreboard->result () as $rec ) {
		if ($cnt == 3)
			break;
		?>
<div class='<?=$medal[$cnt]?>'>
	<table width="100%" border="0" cellpadding="0" cellspacing="0">

		<tr>
			<td width="16%" align="right"><img
				src="https://graph.facebook.com/<?= $rec->fb_id ?>/picture?type=large"
				style="width: 54px; height: 72px" border="0"></td>
			<td width="70%"><h1> <?= $rec->user_name ?></h1>
				<h2> <?= $rec->score ?></h2></td>
			<td width="14%" align="center"><img
				src="<?= base_url() ?>h7-assets/images/scoreboard/change/<?=$rec->change?>"
				width="14" height="12" border="0" style="width: 14px; height: 12px"></td>
		</tr>
	</table>
</div>

<? $cnt ++;} ?>


<div class="scor_tab">
	<table width="100%" border="0" cellpadding="0"
		class="table table-bordered">
		<tr>
			<td width="14%" style="border-left: none;"><strong>Rank</strong></td>
			<td><img
				src="<?= base_url() ?>webassets/img/name-icon.png" width="16"
				height="17" border="0"></td>
			<td width="36%"> <strong> Name</strong></td>
			<td width="27%"><img src="<?= base_url() ?>webassets/img/chart.png"
				height="14" width="16"> <strong>Score</strong></td>
			<td width="23%" style="border-right: none;"><img
				src="<?= base_url() ?>webassets/img/g_arr.png" width="13"><strong>
					Change</strong></td>
		</tr>
                        <?
                        $i = 1; 
                        foreach ( $scoreboard->result () as $rec ) { ?>

                            <? if ($rec->score > 0) { ?>
                                <tr>
			<td style="border-left: none;"><?= $i++ ?> </td>
			<td><img
				src="https://graph.facebook.com/<?= $rec->fb_id ?>/picture?width=200&height=200"
				style="width: 21px; height: 28px"></td><td> &nbsp; <?= $rec->user_name ?> </td>
			<td><?= $rec->score ?></td>
			<td style="border-right: none;"><img
				src="<?= base_url() ?>h7-assets/images/scoreboard/change/<?=$rec->change ?>.png" width="14"
				height="12"></td>
		</tr>
                            <? } ?>
                        <? } ?>



                    </table>

</div>
