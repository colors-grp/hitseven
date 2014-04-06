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
			// 			maintain_ssl();
			$this->load->view('home');
		}
		else {
			$comp_id = $_SESSION['competition_id'] = get_competition_id();
			$dates = get_start_end_dates($comp_id);
			$data['my_collection_view']['start_date'] = to_time_stamp($dates['start']);
			$data['my_collection_view']['end_date'] = to_time_stamp($dates['end']);

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