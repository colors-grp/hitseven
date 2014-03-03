<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Scoreboard extends CI_Controller {
	public function __construct() {
		parent::__construct ();
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
	function index() {

		$data['page'] = 'scoreboard_view';
		$data['header_view']['page'] = 'scoreboard_view';
		// temporary hard coded ...
		$data['header_view']['name'] = 'Heba Gamal Abu El-Ghar';
		$data['header_view']['user_id'] = $data['scoreboard_view']['user_id'] = $this->session->userdata('user_id');
		$data['header_view']['cover_id'] = '748325228515155';

		// Get user credit ...
		$data['scoreboard_view']['user_points'] = get_credit();

		// Get User favorite categories ...
		$data['scoreboard_view']['interest_cats'] = $this->category_model->get_category_interst_by_userID($this->session->userdata('user_id'));

		// Get all categories ...
		$all_categories = $this->category_model->get_all_category();

		$interest_categories = $data['scoreboard_view']['interest_cats'];

		// Calculate which categories are not in Favorite panel ...
		$data['scoreboard_view']['not_interest_cats'] = $this->get_not_interst_categories($all_categories , $interest_categories);


		// Set the currently selected Category ...
		$data['scoreboard_view']['first_cat_name'] = $data['header_view']['first_cat_name'] = $this->get_first_category_name($interest_categories);
		$cat_id = $data['scoreboard_view']['first_cat_id'] = $data['header_view']['first_cat_id'] = $this->get_first_category_id($interest_categories);

		//Set session data (current_category_id , current_category_name)
		$_SESSION ['current_page'] = 'scoreboard';

		//Load the template view
		$this->load->view('template', $data);
	}
	function get_scoreboard_details() {
	
		$cat_id =$_SESSION ['current_category_id' ];
		$this->load->model ( 'scoreboard_model' );
		$scoreboard = $this->scoreboard_model->get_scoreboard ( $cat_id );
		$i = 0;
		foreach ( $scoreboard ['all']->result () as $row ) {
			$ret ['all'] [$i] = $row;
			$i ++;
		}
		$i = 0;
		foreach ( $scoreboard ['top']->result () as $row ) {
			$ret['top'][$i] = $row;
			$i ++;
		}
		$_SESSION ['user_data'] = $ret;
		$_SESSION ['current_page'] = 'scoreboard';
		$this->load->view ( 'ajax/scoreboard_ajax' );
	}
	function get_load_scoreboard_status() {
		$status = $_SESSION [ 'load_scoreboard' ];
		echo $status;
	}
}