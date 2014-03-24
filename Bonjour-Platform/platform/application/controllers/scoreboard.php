<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Scoreboard extends CI_Controller {
	public function __construct() {
		parent::__construct ();
		// Load needed models
		$this->load->model('category_model');
		$this->load->model ( 'scoreboard_model' );
		
		//Load credit helper
		$this->load->helper('credit');
	}

	function index() {
		//Set current page
		$data['page'] = 'scoreboard_view';
		$data['header_view']['page'] = 'scoreboard_view';
		
		// temporary hard coded ...
		$data['header_view']['name'] = 'Mohammed Khairy';
		$data['header_view']['fb_id'] = $_SESSION['fb_id'];
		$data['header_view']['user_id'] = $data['scoreboard_view']['user_id'] = $_SESSION['user_id'];
		$data['header_view']['cover_id'] = '748325228515155';
		$data['scoreboard_view']['fb_id'] = $_SESSION['fb_id'];
		$data['scoreboard_view']['name'] = 'Mohammed Khairy';

		// Get user credit ...
		$data['scoreboard_view']['user_points'] = get_credit();

		// Get User favorite categories ...
		$data['scoreboard_view']['interest_cats'] = $this->category_model->get_category_interst_by_userID($_SESSION['user_id']);

		//Set session data (current_category_id , current_category_name)
		$_SESSION ['current_page'] = 'scoreboard';

		//Load the template view
		$this->load->view('template', $data);
	}
	
	function get_scoreboard_details() {
		//Get current seleced category from session to load its scoreboard
		$cat_id =$_SESSION ['current_category_id' ];
		
		//Get scoreboard contents according to current category
		$scoreboard = $this->scoreboard_model->get_scoreboard ( $cat_id );
		
		//Get all ranks
		$i = 0;
		foreach ( $scoreboard ['all']->result () as $row ) {
			$ret ['all'] [$i] = $row;
			$i ++;
		}
		//Get ranks on top of each category
		$i = 0;
		foreach ( $scoreboard ['top']->result () as $row ) {
			$ret['top'][$i] = $row;
			$i ++;
		}
		
		//Set session data
		$_SESSION ['user_data'] = $ret;
		$_SESSION ['current_page'] = 'scoreboard';
		
		//Load scoreboard ajax view
		$this->load->view ( 'ajax/scoreboard_ajax' );
	}
}