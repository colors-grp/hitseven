
function get_cards(cat_id,cat_name){
	ajaxpage = "<?= base_url()?>index.php?/ajax/get_card_by_category"  ;
	$('#card-ajax').html('Please Wait ...' + cat_name);
	$('#card-sta-hide').hide();
	$.post(ajaxpage, { cat_id: cat_id , cat_name: cat_name , user_id : <?= $user_id?>})
	.done(function( data ) {
		if(data){
			$('#card-ajax').html(data);
			$('#cat_name').html(cat_name + ' / Card');
		}	
	});
	ajaxpage = "<?=base_url() ?>index.php?/ajax/category_highlight_ajax" ;
	$.post(ajaxpage , {cat_id : cat_id , cat_name : cat_name})
	.done(function(data){
		$("#cat_interest").html(data);
	});
}

function show_card_content(cat_id, card_id,card_name , card_price) {
	ajaxpage = "<?=base_url() ?>index.php?/card/get_card_info_mycollection";
	$('#card-ajax').html('Please Wait ...' + cat_id);
	$('#card-sta-hide').hide();
	$.post(ajaxpage, { cat_id: cat_id , card_id: card_id , card_name : card_name , card_price : card_price, user_points : <?= $user_points?> , user_id : <?= $user_id?>})
	.done(function( data ) {
		if(data){
			$('#card-ajax').html(data);
			$('#cat_name').html(cat_name + ' / Card');
		}	
	});
}


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

function play_audio(audio_src) {
	// Opening animations
	document.getElementById("audio_id").src = audio_src; 
	$("#play_aud").modal({onOpen: function (dialog) {
		dialog.overlay.fadeIn('slow', function () {
			dialog.data.hide();
			dialog.container.fadeIn('slow', function () {
				dialog.data.slideDown('slow');	 
			});
		});
		
	}});
}

function display_image(img_src) {
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
}

function buy_card(card_price, user_points) {
	platform_page = "<?=base_url() ?>index.php?/platform/buy_card";
	$('#card-ajax').html('Processing ...'); //want to load card view after this ...
	$('#card-sta-hide').hide();
	$.post(platform_page, { card_price : card_price, user_points : user_points , card_id : <?= $card_id?> , cat_id : <?= $cat_id?>})
	.done(function( data ) {
		if (data > -1) {
			alert ("succeeded");
    		$("h1.points").html(data);
		}
		else
    		alert ("No Enough Points :(");
	});
}
