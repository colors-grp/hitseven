<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Platform extends CI_Controller {
	protected $CI;
	function __construct() {
		parent::__construct();
		$this->CI =& get_instance();
		
		// Load models ...
		$this->load->model('core_call');
		$this->load->model('category_model');
		$this->load->model('card_model');
		
		//Load credit helper
		$this->load->helper('credit');
		
		//Start session if it is not already started
		if (session_id() == '') 
			session_start();
	}

	//A function that returns the Id and name of first category
	function get_first_category_info($interest_categories) {
		if($interest_categories != FALSE) {
			$cat_info = $interest_categories->row(); 
			$info['id'] =  $cat_info->id;
			$info['name'] = $cat_info->name;
			return $info;
		}
	}

	// A function that returns categories user not interseted in 
	// given all categories and categories user interseted in
	function get_not_interst_categories($all_categories , $interest_categories) {
		$res = array();
		foreach ($all_categories->result() as $row) {
			$int = $interest_categories;
			$to_add = 1;
			if($int != false) {
				foreach ($int->result() as $row2)
					if($row->id == $row2->id)
					$to_add = 0;
			}

			if($to_add == 1)
				array_push($res , $row);
		}
		return $res;
	}

	// A controller proxy to helper functions needed from JavaScript ...
	function buy_credit()
	{
		buy_credit();
	}

	function buy_card()
	{
		$user_id = $this->get_user_id();
		buy_card($user_id);
	}

	// Get user ID ... Currently set to return a dummy value for testing ...
	function get_user_id() {
		return $this->config->item('test_facebook_id');
	}

	//Get user Facebook ID
	function get_fb_id() {
		return '100000147991301';
	}

	// Entry point for Platform ...
	function index() {
		$data['page'] = 'main_view';
		$data['header_view']['page'] = 'main_view';
		// temporary hard coded ...
		$data['header_view']['name'] = 'Heba Gamal Abu El-Ghar';
		$data['header_view']['user_id'] = $data['main_view']['user_id'] = $this->get_user_id();
		$data['header_view']['cover_id'] = '748325228515155';

		// Get user credit ...
		$data['main_view']['user_points'] = get_credit();

		// Get User favorite categories ...
		$data['main_view']['interest_cats'] = $this->category_model->get_category_interst_by_userID($this->get_user_id());

		// Get all categories ...
		$all_categories = $this->category_model->get_all_category();

		// Calculate which categories are not in Favorite panel ...
		$data['main_view']['not_interest_cats'] = $this->get_not_interst_categories($all_categories , $data['main_view']['interest_cats']);

		// Set the currently selected Category 
		if(!isset($_SESSION['current_category_id'] )) {
			//Get first category info to be set in the session array
			$first_cat = $this->get_first_category_info($data['main_view']['interest_cats']);
			
			//Set first category ID and name only if they aren't already in session
			$_SESSION['current_category_id'] = $first_cat['id'];
			$_SESSION['current_category_name'] = $first_cat['name'];
		}
		//Set session data 
		$_SESSION['user_id']= $this->get_user_id();
		$_SESSION['fb_id'] = $this->get_fb_id();
		$_SESSION['card_view'] = 'list';
		$_SESSION['current_page'] = 'market';

		//Load the template view
		$this->load->view('template', $data);
	}
}