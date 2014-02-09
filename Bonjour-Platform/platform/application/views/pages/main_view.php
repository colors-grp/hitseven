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
                    <a class="getpoints" href="#">
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

        </div>


        <div class="row marketing">
            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                
                <div class="fav">
                    <div class="fav-categories-head">
                        <h1>
                            My Favorite Categories
                        </h1>
                        <img src="<?=base_url()?>webassets/img/my_fav_categories_background.png" alt="My Favorite Categories">
                    </div>
<div  id="cat_interest">
                    <div class="category-selection">
                        <div class="fav-container default-skin">
                            <div class="viewport" style="width:382px;"> 
                            <ul class="nav fav-circles sidebar" >
                            <? 
							if($interest_cats == ''){
								echo 'No Category';
							}else{
							foreach($interest_cats->result() as $int_cat){ ?>
                                <li>
  									<a href="javascript:void(0);" onclick="get_cards('<?=$int_cat->id;?>','<?=$int_cat->name?>');">    
                                            <ul class="nav nav-pills">
                                				<li>
                                                    <img src="<?=base_url()?>webassets/img/score.png" alt="Score">
                                                    <div class="score-num"><h4><?=$int_cat->total_score?></h4></div>
                                                </li>
                                				<li class="fav-categor">               				
                                                    <img class="categor-color" src="<?=base_url()?>webassets/img/category_color_circle_bck.png" alt="Category Color Circle" style="background-image:url(<?=base_url()?>h7-assets/images/categories/<?= $int_cat->name?>/main_icon.png);">   
                                                    <div class="name"><h4><?=$int_cat->name;?></h4></div>
                                                </li>
                                				  <li>
                                                    <img src="<?=base_url()?>webassets/img/rank.png" alt="Rank">
                                                    <div class="rank"><h4><?=$int_cat->total_score?></h4><p class="st">st</p></div>
                                                </li>
                                            </ul>
                                        <img src="<?=base_url()?>webassets/img/category_selection_2.png" class="category-selection-left">
                                    </a>
                                </li>
							<? } }?>
                               
                            </ul>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>

                <div class="categ">
                    <div class="categories-head">
                        <h1>
                            Categories
                        </h1>
                        <img src="<?=base_url()?>webassets/img/category_address_background.png" alt="Categories">
                    </div>

                    <div class="viewport" style="width:364px;">
                    <ul class="nav fav-circles sidebar">
                        <li class="first-categ">
                            <ul class="nav nav-pills">
                            
                            <? 
							if(!$not_interest_cats){
								echo 'No Category';
							}else{
							foreach($not_interest_cats as $not_int_cat){?>
                                <li id="cat_<?=$not_int_cat->id?>">
                                    <a href="javascript:void(0)" onclick="add_category(<?=$not_int_cat->id?>)">
                                        <img class="choose-category" src="<?=base_url()?>webassets/img/choose_category_icon.png" alt="choose_1" style="background-image:url(<?=base_url()?>h7-assets/images/categories/<?= $not_int_cat->name?>/main_icon.png);">
                                        <span><img src="<?=base_url()?>webassets/img/category_plus_icon.png" alt="Add Category"></span>
                                        <div class="categ-name"><h4><?=$not_int_cat->name;?></h4></div>
                                    </a>
                                </li>
                              <? } }?>
                            </ul>
                        </li>
                    </ul>
                    </div>
                </div>
                </div>


            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                <div class="Cards">
                    <div class="cards-head">
                        <h1 id="cat_name">
                            <?=$first_cat_name?>Cards
                        </h1>
                        <img src="<?=base_url()?>webassets/img/cards_address_background.png" alt="Cards">
                    </div>

                    <div class="viewport" style="width:576px;" id="card-ajax">
                    <? 
					if($cards != ''){
						foreach($cards as $card){ ?>
                    <ul class="nav nav-pills card-holder first">
                        <li>
                            <a href="<?=site_url('card/view/'.$card->card_id);?>" class="card">
                                <img src="<?=base_url()?>webassets/img/cards.png" alt="Card">
                                <img class="card-img" src="<?=base_url()?>webassets/uploads/cards/img/<?=$card->image ?>" alt="">
                                <div class="card-info">
                                <h5><?=$card->card_name?></h5>
                                <p class="color"><?=$card->card_score?> Scores</p>
                                <p class="color-points"><?=$card->card_points?> Points</p></div>
                            </a>
                        </li>
                        <li class="mg-container">
                            <div><h4 class="media-title">Media</h4>
                                <ul class="nav nav-pills media">
                                    <li class="photo"><a href="#"><img src="<?=base_url()?>webassets/img/cards_icons_photo.png" alt="Photo"></a></li>
                                    <li class="music"><a href="#"><img src="<?=base_url()?>webassets/img/cards_icons_music.png" alt="Music"></a></li>
                                    <li class="video"><a href="#"><img src="<?=base_url()?>webassets/img/cards_icons_video.png" alt="Video"></a></li>
                                </ul>
                            </div>
                            <div><h4 class="games-title">Games</h4>
                                <ul class="nav nav-pills games">
                                    <li class="game1"><a href="#"><img src="<?=base_url()?>webassets/img/cards_icons_games_01.png" alt="Game"></a></li>
                                    <li class="game2"><a href="#"><img src="<?=base_url()?>webassets/img/cards_icons_games_01.png" alt="Game"></a></li>
                                    <li class="game3"><a href="#"><img src="<?=base_url()?>webassets/img/cards_icons_games_01.png" alt="Game"></a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="card-status" >
                            <a href="#">
                                <img class="status" src="<?=base_url()?>webassets/img/trade_button.png" alt="Trade">
                            </a>
                        </li>
                    </ul>

                    <div class="card-break" id="card-sta-hide">
                        <img src="<?=base_url()?>webassets/img/cards_breaks.png" alt="Cards Break" style="width: 536px; height: 2px;">
                    </div>
                    <? }
                        }
                        ?>
                  
                    </div>
            </div>
            </div>
