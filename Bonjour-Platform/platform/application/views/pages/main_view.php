
		<div class="header navbar navbar-static middle-nav">
            
            <ul class="nav nav-pills navbar-right grid-nav">
                <li>
                    <a href="#" class="active">
                        <span><img src="<?=base_url()?>webassets/img/list_grid_view_selection.png" alt="List Icon Active" style="width: 50px; height: 48px;"></span>
                        <img src="<?=base_url()?>webassets/img/grid_list_icon_1.png" alt="List">
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span><img src="<?=base_url()?>webassets/img/list_grid_view_selection.png" alt="List Icon Active" style="width: 50px; height: 48px;"></span>
                        <img src="<?=base_url()?>webassets/img/grid_list_icon_2.png" alt="Grid">
                    </a>
                </li>
            </ul>

            <ul class="nav nav-pills points-nav">
                <li>
                    <a href="#">
                        <img class="point-bg" src="<?=base_url()?>webassets/img/points_button.png" alt="Points">
                        <h1 class="points"><?=$user_points; ?></h1>
                    </a>
                </li>
                <li class="get">
                    <a id = "getPointsButton" class="getpoints" href = "#">
                        <h3 class="getpointsbtn">Get More Points</h3>
                        <img class="get-points" src="<?=base_url()?>webassets/img/get_more_points_button.png" alt="Get More Points">
                    </a>
                </li>
                <li class="buy">
                    <a href="#" class="dropdown-toggle purchase" data-toggle="dropdown">
                        <h6 class="purchasebtn">Purchased</h6>
                        <img src="<?=base_url()?>webassets/img/filters_purchased_icon.png" alt="Purchased Filter">
                        <img src="<?=base_url()?>webassets/img/filters_box_icon.png" alt="Box">
                    </a>
                    <ul class="dropdown-menu missing-games">
                        <li>
                            <a href="#">
                                <h6 class="missbtn">Missing<br>Games</h6>
                                <img src="<?=base_url()?>webassets/img/filters_games_icon.png" alt="Games">
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
		<button id = "mainButton" type = "submit"> Press </button>
		<div id="buy_credit" style="display:none;">
		
			<h2>Choose the desired amount</h2>
			<form id="buy_credit_form" action="" method = "post">
				<input type="radio" name="credit" value="10" checked="checked">10<br>
				<input type="radio" name="credit" value="20">20<br> 
				<input type="radio" name="credit" value="50">50<br>
				<input type="radio" name="credit" value="100">100<br>
				<input type="radio" name="credit" value="200">200<br>
				<input type="radio" name="credit" value="500">500<br> 
				<input type="submit" value="Submit" name="credit_submission">
			</form>
		
		</div>
		<div id="dialog" style="display:none;">testt</div>
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
				$.post( "http://gloryette.org/khairy/index.php?/platform/buy_credit", $( "#buy_credit_form" ).serialize() ).done(function(data) {
					$.modal.close();
					$("h1.points").html(data);
				});
				return false;
			});
		</script>
        </div>