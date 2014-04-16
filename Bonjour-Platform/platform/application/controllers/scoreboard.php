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

		// Load the necessary stuff...
		$this->load->helper(array('language', 'url', 'form', 'account/ssl'));

		$this->load->library(array('account/authentication', 'account/authorization'));
		$this->load->model(array('account/account_model', 'session_model', 'core_call'));
		$this->load->model(array('account/account_details_model'));
		$this->load->model(array('account/account_facebook_model'));

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

	function get_dashboard_info($user_id, $interset_cats) {
		if (!$interset_cats)
			return FALSE;
		$result = array();
		$i = 0;
		foreach ($interset_cats->result() as $int_cat) {
			$query = $this->category_model->get_rank($user_id, $int_cat->id);
			$rank = 0;
			$prv = -1;
			$cnt = 1;
			foreach($query->result() as $row) {
				if ($row->score != $prv) {
					$rank = $cnt;
				}
				if ($row->id == $user_id) {
					$result[$i]['data'] = $row;
					break;
				}
				$prv = $row->score;
				$cnt ++;
			}
			$result[$i]['rank'] = $rank;
			$result[$i]['cat_name'] = $int_cat->name;
			$i ++;
		}
		return $result;
	}
	function index() {

		if (!$this->authentication->is_signed_in()) {
			redirect('home');
		}
		else {
			$_SESSION['user_id'] = $this->session->userdata('account_id');
			if ($_SESSION['fb_id'] == FALSE) {
				redirect('platform');
			}
			$comp_id = $_SESSION['competition_id'] = get_competition_id();
			$dates = get_start_end_dates($comp_id);
			$data['scoreboard_view']['start_date'] = to_time_stamp($dates['start']);
			$data['scoreboard_view']['end_date'] = to_time_stamp($dates['end']);

			//Set current page
			$data['page'] = 'scoreboard_view';
			$data['header_view']['page'] = 'scoreboard_view';
			
			// check whether the user is admin or not
			$user_type = get_user_type();
			$data['header_view']['is_admin'] = ($user_type == 'admin' ? true : false);

			$this->load->model('core_call');
			$me = $this->core_call->getMe($this->session->userdata('account_id'));
			// temporary hard coded ...
			$data['header_view']['name'] = $me->fullname;
			$data['header_view']['fb_id'] = $_SESSION['fb_id'];
			$user_id = $data['header_view']['user_id'] = $data['scoreboard_view']['user_id'] = $_SESSION['user_id'];
			$data['scoreboard_view']['fb_id'] = $_SESSION['fb_id'];
			$data['scoreboard_view']['name'] = $me->fullname;

			// Get user credit ...
			$data['scoreboard_view']['user_points'] = get_credit();

			// Get User favorite categories ...
			$interset_cats = $data['scoreboard_view']['interest_cats'] = $this->category_model->get_category_interst_by_userID($_SESSION['user_id']);
			
			if(!isset($_SESSION['current_category_id'] )) {
				//Get first category info to be set in the session array
				$first_cat = $this->get_first_category_info($data['my_collection_view']['interest_cats']);
					
				//Set first category ID and name only if they aren't already in session
				$_SESSION['current_category_id'] = $first_cat['id'];
				$_SESSION['current_category_name'] = $first_cat['name'];
			}
			$data['scoreboard_view']['dashboard'] = $this->get_dashboard_info($user_id, $interset_cats);
			//Set session data (current_category_id , current_category_name)
			$_SESSION ['current_page'] = 'scoreboard';

			//Load the template view
			$this->load->view('template', $data);
		}
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