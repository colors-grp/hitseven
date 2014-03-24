
<!-- Container -->
<div
	class="container" id="My-container">
	<!-- Left Header -->
	<div id="left-header">
		<div id="logo">
			<img
				src="<?=base_url()?>/h7-assets/resources/img/main-icons/Logo.png"
				alt="Logo" style="margin-left: 11.5px;">
			<div id="profile">
				<div id="profile-white-background">
					<div id="profile-orange-background">
						<img
							src="http://graph.facebook.com/<?=$fb_id?>/picture?width=200&height=200"
							alt="profile picture" id="profile-pic">
						<div id="points-image">
							<img
								src="<?=base_url()?>/h7-assets/resources/img/main-icons/points_icon.png"
								alt="">
							<font id = "user_points"><?= $user_points?></font>
							Points <br /> <img
								src="<?=base_url()?>/h7-assets/resources/img/main-icons/arrow_icon.png"
								alt=""> <a id="getPointsButton" href="#"
								style="text-decoration: none;">Get More Points</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- 	Load the Buy Credit Popup ... -->
		<?php
		$this->load->view('popups/buy_credit_popup');
		?>
		<!-- 		Load Interset Categories -->
		<div id="cat_interest_my_collection"></div>
		<!-- 		Load Other Categories -->
		<div id="catss_not_interest_my_collection"></div>

	</div>
	<!-- end of left header -->
	<!-- Content -->
	<div id="content">

		<!-- pages bar -->
		<div id="pages-bar">
			<div class="row">
				<table style="margin-left: 25px; text-align: center;">
					<tr>
						<td style="width: 158px;"><a
							href="<?=base_url()?>index.php?/platform/index"
							style="text-decoration: none;"><h4>MARKET</h4> </a></td>
						<td><img
							src="<?=base_url()?>/h7-assets/resources/img/main-icons/separator.png"
							alt="separator"></td>
						<td style="width: 200px;"><a
							href="<?=base_url()?>index.php?/my_collection/get_my_collection"
							style="text-decoration: none;"><h4>MY COLLECTION</h4> </a></td>
						<td><img
							src="<?=base_url()?>/h7-assets/resources/img/main-icons/separator.png"
							alt="separator"></td>
						<td style="width: 200px;"><a
							href="<?=base_url()?>index.php?/scoreboard/index"
							style="text-decoration: none;"><h4>SCOREBOARDS</h4> </a></td>
					</tr>
				</table>
			</div>
		</div>
		<!-- end of pages bar -->

		<!-- 		Load Dashboard -->
		<?php $this->load->view('pages/dashboard_view')?>
		<!-- 		End of Dashboard -->
		
		
		<div id = "card-details">
		
			<!-- Category cards -->
				<div id="left_panel"></div>
			<!-- Category cards End -->
			
			<!-- Card Details -->
				<div id = "right_panel"></div>
			<!-- Card Details End -->
			
		</div>
	</div>
</div>


<script
	type="text/javascript"
	src="<?=base_url()?>/h7-assets/resources/js/kinetic.js"></script>
<script
	type="text/javascript"
	src="<?=base_url()?>/h7-assets/resources/js/jquery.final-countdown.js"></script>
<script type="text/javascript">
	$('.countdown').final_countdown({});
</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>


<script type="text/javascript">
function cutHex(h) {return (h.charAt(0)=='#') ? h.substring(1,7):h}

function hexToR(h) {return parseInt((cutHex(h)).substring(0,2),16)}

function hexToG(h) {return parseInt((cutHex(h)).substring(2,4),16)}

function hexToB(h) {return parseInt((cutHex(h)).substring(4,6),16)}

function get_cards_my_collection(cat_id,cat_name){
	//Load categories with selected catgory highlighted
	cur_cat_name = 'white';
	get_page = "<?=base_url() ?>index.php?/category/get_category_name_without_href" ;
	$.post(get_page, {})
	.done(function( data ) {
		if(data){
			cur_cat_name = data;
		}
		if (cat_name != '-1') {
			cur_cat_name = cat_name;
		}
	    var map = new Object();
	    map["yellow"] = "ffcc00";
	    map["white"] = "ffffff";
	    map["violet"] = "5856d6";
	    map["red"] = "ff3b30";
	    map["orange"] = "ff9500";
	    map["indigo"] = "4b0082";
	    map["green"] = "4cd964";
	    map["blue"] = "007aff";
	    h = map[cur_cat_name];
		r = hexToR(h);
		g = hexToG(h);
		b = hexToB(h);
		color = 'rgba(' + r + ',' + g + ',' + b + ',0.25)';
		ajaxpage = "<?=base_url() ?>index.php?/category/load_interest_category_my_collection" ;
		$.post(ajaxpage , {cat_id : cat_id , cat_name : cat_name , color : color})
		.done(function(data){
			$("#cat_interest_my_collection").html(data);
		});
	});
}

function get_not_interest_category_my_collection(cat_id , cat_name ,  to_load){
	ajaxpage = "<?=base_url() ?>index.php?/category/load_not_interest_category_my_collction";
	$.post(ajaxpage, {cat_id : cat_id  ,  to_load :  to_load  })
	.done(function( data ) {
		if(data){
			$('#catss_not_interest_my_collection').html(data);
		}	
	});
	get_cards_my_collection(cat_id,cat_name);
}
function cutHex(h) {return (h.charAt(0)=='#') ? h.substring(1,7):h}

function hexToR(h) {return parseInt((cutHex(h)).substring(0,2),16)}

function hexToG(h) {return parseInt((cutHex(h)).substring(2,4),16)}

function hexToB(h) {return parseInt((cutHex(h)).substring(4,6),16)}

function on_load_my_collection(cat_id , cat_name, card_id, card_name, card_price, card_score) {
	get_cards_my_collection(cat_id,cat_name);
	get_not_interest_category_my_collection(cat_id , cat_name ,  true);
	cur_cat_name = 'white';
    var map = new Object();
    map["yellow"] = "ffcc00";
    map["white"] = "ffffff";
    map["violet"] = "5856d6";
    map["red"] = "ff3b30";
    map["orange"] = "ff9500";
    map["indigo"] = "4b0082";
    map["green"] = "4cd964";
    map["blue"] = "007aff";
	if (cat_name != '-1') {
		cur_cat_name = cat_name;
	    h = map[cur_cat_name];
		r = hexToR(h);
		g = hexToG(h);
		b = hexToB(h);
		color = 'rgba(' + r + ',' + g + ',' + b + ',0.25)';
		ajaxpage = "<?=base_url() ?>index.php?/card/get_cards_my_collection_view";
		$.post(ajaxpage, { cat_id: cat_id , cat_name : cat_name , color : color , card_id : card_id})
		.done(function( data ) {
			$('#left_panel').html(data);
			show_card_content(cat_id , card_id, card_name, card_price, card_score, cat_name);
		});
	}
	else {
		get_page = "<?=base_url() ?>index.php?/category/get_category_name_without_href" ;
		$.post(get_page, {})
		.done(function( data ) {
			cur_cat_name = data;
		    h = map[cur_cat_name];
			r = hexToR(h);
			g = hexToG(h);
			b = hexToB(h);
			color = 'rgba(' + r + ',' + g + ',' + b + ',0.25)';
			ajaxpage = "<?=base_url() ?>index.php?/card/get_cards_my_collection_view";
			$.post(ajaxpage, { cat_id: cat_id , cat_name : cat_name , color : color , card_id : card_id})
			.done(function( data ) {
				$('#left_panel').html(data);
				show_card_content(cat_id , card_id, card_name, card_price, card_score, cat_name);
			});
		});
	}
}

function show_card_content(cat_id, card_id, card_name, card_price, card_score, cat_name) {
	if(card_id != -1) {
		ajaxpage = "<?=base_url() ?>index.php?/card/get_card_info_mycollection";
		$.post(ajaxpage, { cat_id: cat_id , card_id: card_id , card_name : card_name , card_price : card_price, user_points : <?= $user_points?>  , card_score : card_score , cat_name : cat_name})
		.done(function( data ) {
			if(data){
				$('#right_panel').html(data);
			}	
		});
	}else {
		ajaxpage = "<?=base_url() ?>index.php?/card/on_load_get_card_info";
		$.post(ajaxpage, { cat_id: cat_id , cat_name : cat_name})
		.done(function( data ) {
			if(data){
				$('#right_panel').html(data);
			}	
		});
	}
}
</script>
