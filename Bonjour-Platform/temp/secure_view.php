<div id=session_data>
	<h2>This is in the session:</h2>
	<h3>You can always add more in the Controllers:</h3>
	<pre>
		<?php print_r($this->session->all_userdata()); ?>
	</pre>
</div>

<div id=examples>
	<h2>Examples</h2><!-- 	Set the urls for getting the fb data using FB graph API ...  anchor -> append the sub url ('secure/likes') to the base urlex: http://www.colors-grp.com/test1/ . "secure/likes"-->
	<?php echo anchor('secure/likes', 'My Likes'); ?> | <?php echo anchor('secure/friends', 'My Friends'); ?>
</div>

<div id=me_page>
	<h2>Dynamic Me Page</h2>
	<h3>/secure/me/<span style="color: red">$object</span>/</h3>
	<p>Modeled after https://graph.facebook.com/ID/CONNECTION_TYPE</p>
	<p>See https://developers.facebook.com/docs/reference/api/</p>
	<p>$object can be modeled after the following CONNECTION_TYPE's: likes, home, feed, movies, music, books, notes, permissions, photos, albums, videos, uploaded, events, groups, checkins, locations, etc.</p>
</div>

<div class=logout_box>
	<?php echo anchor('platform/logout', 'Logout'); ?>
</div>