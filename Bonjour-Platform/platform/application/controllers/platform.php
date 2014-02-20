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
	}

	function get_first_category_name($interest_categories) {
		if($interest_categories != FALSE) {
			return $interest_categories->row()->name;
		}
	}

	function get_first_category_id($interest_categories) {
		if($interest_categories != FALSE) {
			return $interest_categories->row()->id;
		}
	}

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
	
	function get_fb_id() {
		return '100000147991301';
	}

	// Entry point for Platform ...
	function index() {
		$data['page'] = 'main_view';
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

		$interest_categories = $data['main_view']['interest_cats'];

		// Calculate which categories are not in Favorite panel ...
		$data['main_view']['not_interest_cats'] = $this->get_not_interst_categories($all_categories , $interest_categories);


		// Set the currently selected Category ...
		$data['main_view']['first_cat_name'] = $data['header_view']['first_cat_name'] = $this->get_first_category_name($interest_categories);
		$cat_id = $data['main_view']['first_cat_id'] = $data['header_view']['first_cat_id'] = $this->get_first_category_id($interest_categories);
		
		//Set session data (current_category_id , current_category_name)
		$session_array = array(
				'current_category_id' => $data['main_view']['first_cat_id'],
				'current_category_name' => $data['main_view']['first_cat_name'],
				'user_id' => $this->get_user_id(),
				'fb_id' => $this->get_fb_id()
		);
		$this->session->set_userdata($session_array);

		//Set session data (current_category_id , current_category_name)
		$session_array = array(
				'current_category_id' => $data['main_view']['first_cat_id'],
				'current_category_name' => $data['main_view']['first_cat_name'],
				'user_id' => $this->get_user_id()
				);
		$this->session->set_userdata($session_array);
		
		//Load the template view
		$this->load->view('template', $data);

	}
}