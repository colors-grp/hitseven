<?php 
class My_collection extends CI_Controller {
	function __construct() {
		parent::__construct();
		//Load credit helper
		$this->load->helper('credit');
			
		//Loading needed models
		$this->load->model('category_model');
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
	function get_my_collection() {

		if (!$this->authentication->is_signed_in()) {
			redirect('home');
		}
		else {
			$_SESSION['user_id'] = $this->session->userdata('account_id');
			$cur_card_id = $this->input->get('cur_card_id');
			$gd = 0;
			if ($cur_card_id) {
				$this->load->model('user_model');
				$query = $this->user_model->get_card_parameters($cur_card_id);
				if ($query) {
					$gd = 1;
					$data['header_view']['cur_card_id'] = $query->id;
					$data['header_view']['cur_card_name'] = $query->name;
					$data['header_view']['cur_card_score'] = $query->score;
					$data['header_view']['cur_card_price'] = $query->price;
				}
			}
			if (!$gd) {
				$data['header_view']['cur_card_id'] = '-1';
				$data['header_view']['cur_card_name'] = '-1';
				$data['header_view']['cur_card_score'] = '-1';
				$data['header_view']['cur_card_price'] = '-1';
			}

			$comp_id = $_SESSION['competition_id'] = get_competition_id();
			$dates = get_start_end_dates($comp_id);
			$data['my_collection_view']['start_date'] = to_time_stamp($dates['start']);
			$data['my_collection_view']['end_date'] = to_time_stamp($dates['end']);
			// check whether the user is admin or not
			$user_type = get_user_type();
			$data['header_view']['is_admin'] = ($user_type == 'admin' ? true : false);

			//Setting session variables
			$_SESSION['current_page'] = 'my_collection';

			//Set page name to be sent to the template view
			$data['page'] = 'my_collection_view';
			$data['header_view']['page'] = 'my_collection_view';
			
			// temporary hard coded ...
			$this->load->model('core_call');
			$me = $this->core_call->getMe($this->session->userdata('account_id'));
			$data['header_view']['name'] = $me->fullname;

			$user_id = $data['header_view']['user_id'] = $_SESSION['user_id'] = get_user_id();

			// Get User favorite categories ...
			$interset_cats = $data['my_collection_view']['interest_cats'] = $this->category_model->get_category_interst_by_userID($data['header_view']['user_id'] );
			
			if(!isset($_SESSION['current_category_id'] )) {
				//Get first category info to be set in the session array
				$first_cat = $this->get_first_category_info($data['my_collection_view']['interest_cats']);
					
				//Set first category ID and name only if they aren't already in session
				$_SESSION['current_category_id'] = $first_cat['id'];
				$_SESSION['current_category_name'] = $first_cat['name'];
			}
			// Get dashboard
			$data['my_collection_view']['dashboard'] = $this->get_dashboard_info($user_id, $interset_cats);

			// Get user credit ...
			$data['my_collection_view']['user_points'] = get_credit();
			$data['my_collection_view']['fb_id'] = $_SESSION['fb_id'];
			$data['header_view']['fb_id'] = $_SESSION['fb_id'];

			//Loading default view
			$this->load->view('template' , $data);
		}
	}
}