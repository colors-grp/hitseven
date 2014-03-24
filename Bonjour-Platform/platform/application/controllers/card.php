<?php
class Card extends CI_Controller {
	public function __construct() {
		parent::__construct();
		//Load models needed
		$this->load->model('card_model');
		$this->load->model('category_model');
		$this->load->model('activity_model');
<<<<<<< HEAD
		$this->load->model('game_model');
		$this->load->helper('credit');
=======
>>>>>>> bc7448ccaf71025d10bc3767d24edd95ca50bc32
	}
	// Display user cards in a list format given certain category
	function get_card_list_view() {
		// Get user ID and Categoty Info (ID, Name)
		$user_id =$_SESSION['user_id'];
		$cat_id = $this->input->post('cat_id');
		$cat_name = $this->input->post('cat_name');
		// Check whether redirected from another view (eg: scoreboard, MyCollections) ...
		// Also cat_id == -1 if card view is changed (list/grid) ...
		if($cat_id == '-1') {
			$cat_id =  $_SESSION['current_category_id'];
			$cat_name = $_SESSION['current_category_name'];
			//Set that current view is list view
			$_SESSION['card_view'] = 'list';
		}
		// Check whether redirected from another view (eg: scoreboard, MyCollections) and previous card view was grid
		if ($_SESSION['card_view'] == 'grid') {
			$_SESSION['current_category_id'] = $cat_id;
			$_SESSION['current_category_name'] = $cat_name;
			return $this-> get_card_grid_view();
		}
		// Set session variables
		$_SESSION['current_category_id'] = $cat_id;
		$_SESSION['current_category_name'] = $cat_name;
		
		// Set parameters sent to view
		$info['cat_id'] = $cat_id;
		$info['category_name'] = $cat_name;
		$info['cards'] = $this->card_model->get_cards_by_id($cat_id);
		
		// Checks if there are cards in category or not
		if ($info['cards']) {
			$user_cards = $this->card_model->get_user_cards_by_id($cat_id, $user_id);
			$info['user_cards'] = array();
<<<<<<< HEAD
			$info['user_points'] = get_credit();
=======
>>>>>>> bc7448ccaf71025d10bc3767d24edd95ca50bc32
			// Prepare an array containing owned cards
			if ($user_cards != FALSE) {
				foreach ($user_cards->result() as $uc) {
					array_push($info['user_cards'], $uc->id);
				}
			}
<<<<<<< HEAD
			$info['cat_id'] = $_SESSION['current_category_id'];
			$info['cat_name'] = $_SESSION['current_category_name'];
=======
>>>>>>> bc7448ccaf71025d10bc3767d24edd95ca50bc32
			// Load Card List View
			$this->load->view('ajax/card_list_view_ajax', $info);
		} else {
			echo 'No Cards';
		}

	}
	
	// Display user cards in a grid format given certain category
	function get_card_grid_view() {
		//set current card view
		$_SESSION['card_view'] = 'grid';
			
		//Retrieve category information form session
		$cat_id = $_SESSION['current_category_id'];
		$cat_name = $_SESSION['current_category_name'];
		$user_id = $_SESSION['user_id'];
		
		// Set view parameters
		$info['cat_id'] = $cat_id;
		$info['cat_name'] = $cat_name;
		$this->load->model('card_model');
		$info['cards'] = $this->card_model->get_cards_by_id($cat_id);
		
		// Checks if there are cards in category or not
		if ($info['cards']) {
			$user_cards = $this->card_model->get_user_cards_by_id($cat_id, $user_id);
			$info['user_cards'] = array();
			// Prepare an array containing owned cards
			if ($user_cards != FALSE) {
				foreach ($user_cards->result() as $uc) {
					array_push($info['user_cards'], $uc->id);
				}
			}
			// Load Card Grid View
			$this->load->view('ajax/card_grid_view_ajax',$info);
		} else
			echo 'No Cards Bardo';
	}

	
	function get_cards_my_collection_view() {
		//Get category info (Name, ID) sent from view
		$cat_id = $this->input->post('cat_id');
		$info['category_name'] =  $this->input->post('cat_name');
		// Check if redirected from another view (Scoreboard, Market)
		if($cat_id == '-1') {
			$cat_id = $_SESSION['current_category_id'];
			$info['category_name'] = $_SESSION['current_category_name'];
		}
		// Get session variables
		$user_id = $_SESSION['user_id'];
<<<<<<< HEAD
		$info['color'] = $this->input->post('color');
		$info['card_id'] = $this->input->post('card_id');
=======

>>>>>>> bc7448ccaf71025d10bc3767d24edd95ca50bc32
		//Set session variables
		$_SESSION['current_category_id'] = $cat_id;
		$_SESSION['current_category_name'] = $info['category_name'];
		//Get cards info from database
		$this->load->model('card_model');
		$info['cards'] = $this->card_model->get_user_cards_by_id($cat_id , $user_id);
		// Load My Collections Cards View
		$this->load->view('ajax/my_collection_list_of_cards_view_ajax',$info);
	}
	
	// Load initial cards when load my collections page
	function on_load_get_card_info() {
		// Get variables sent from view
		$cat_id = $this->input->post('cat_id');
		$name = $info['cat_name'] = $this->input->post('cat_name');
		// Check if redirected from another view (Scoreboard, Market)
		if($cat_id == '-1') {
			$cat_id = $info['cat_id'] =  $_SESSION['current_category_id'];
			$name = $info['cat_name'] = $_SESSION['current_category_name'];
		}
		// Get and Set some session variables
		$user_id = $info['user_id'] = $_SESSION['user_id'];
		$_SESSION['current_category_id'] = $cat_id;
		$_SESSION['current_category_name'] = $name;

		// Get user cards from database
		$this->load->model('card_model');
		$cards = $this->card_model->get_user_cards_by_id($cat_id , $user_id);
		// Check if user has cards or not in current category
		if($cards!= FALSE) {
			// Get first card data to load in view
			$first_card = $cards->row();
			$card_id =$info['card_id'] = $first_card ->id;
			$info['card_name'] = $first_card->name;
			$info['card_price'] = $first_card->price;
			$info['card_score'] = $first_card->score;
			// Assign own_card to TRUE [[fakss]]
			$info['own_card'] = TRUE;
			//Load Directory helper to traverse media in each media item
			$this->load->helper('directory');
			$info['images'] = directory_map('./h7-assets/images/categories/'.$name.'/cards/'.$card_id.'/image/');
			$info['audios'] = directory_map('./h7-assets/images/categories/'.$name.'/cards/'.$card_id.'/audio/');
			$info['videos'] = directory_map('./h7-assets/images/categories/'.$name.'/cards/'.$card_id.'/video/');
<<<<<<< HEAD
			$info['games'] = $this->game_model->get_games($cat_id, $card_id);
			
			$this->load->view('ajax/my_collection_view_ajax', $info);

		}else { // User doesn't have any cards in the current category
			echo ' ';
=======

			$this->load->view('ajax/my_collection_view_ajax', $info);

		}else { // User doesn't have any cards in the current category
			echo 'No cards purchased in this category !!';
>>>>>>> bc7448ccaf71025d10bc3767d24edd95ca50bc32
		}
	}

	function get_card_info_mycollection() {
		// Get variables sent from view
		$card_id =$info['card_id'] = $this->input->post('card_id');
		$cat_id = $info['cat_id'] = $this->input->post('cat_id');
		$name = $info['cat_name'] = $this->input->post('cat_name');
		// Check if redirected from another view (Scoreboard, Market)
		if($cat_id == '-1') {
			$cat_id = $info['cat_id'] =  $_SESSION['current_category_id'];
			$name = $info['cat_name'] = $_SESSION['current_category_name'];
		}
		// Get and Set some session variables
		$info['user_id'] = $_SESSION['user_id'];
		$_SESSION['current_category_id'] = $cat_id;
		$_SESSION['current_category_name'] = $name;
		// Set view parameters 
<<<<<<< HEAD
		$info['card_id'] = $this->input->post('card_id');
=======
>>>>>>> bc7448ccaf71025d10bc3767d24edd95ca50bc32
		$info['card_name'] = $this->input->post('card_name');
		$info['card_price'] = $this->input->post('card_price');
		$info['user_points'] = $this->input->post('user_points');
		$info['card_score'] = $this->input->post('card_score');
		// Check whether user owns this card or not ...
		$info['own_card'] = $this->card_model->own_card($cat_id , $card_id ,$info['user_id'] );
		//Load Directory helper to traverse media in each media item
		$this->load->helper('directory');
		$info['images'] = directory_map('./h7-assets/images/categories/'.$name.'/cards/'.$card_id.'/image/');
		$info['audios'] = directory_map('./h7-assets/images/categories/'.$name.'/cards/'.$card_id.'/audio/');
		$info['videos'] = directory_map('./h7-assets/images/categories/'.$name.'/cards/'.$card_id.'/video/');
<<<<<<< HEAD
		$info['games'] = $this->game_model->get_games($cat_id, $card_id);
=======
>>>>>>> bc7448ccaf71025d10bc3767d24edd95ca50bc32
			
		$this->load->view('ajax/my_collection_view_ajax', $info);
	}
}