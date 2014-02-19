<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Platform extends CI_Controller {
	function __construct() {
		parent::__construct();
		// Load the core call model (accessing the Core functionality) ...
		$this->load->model('core_call');
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
			foreach ($int->result() as $row2)
				if($row->id == $row2->id)
				$to_add = 0;
				
			if($to_add == 1)
				array_push($res , $row);
		}
		return $res;
	}

	function get_credit() {
			
		log_message('error', 'core URL = '.$this->config->item('core_url'));
		// Get facebook user ID
		$fbid = '100000130552768';
			
		log_message('error', 'fbid = '.$fbid);
		// Invoke the core to get user's credit from the database
		// 			$credit = $this->rest->get('getcredit', array('fb_id' => $fbid), 'json');
		$credit = $this->core_call->getUserCredit($fbid);
		log_message('error', 'el raseeed, el raseeed: '.$credit);
		return $credit;
	}

	function get_user_id() {
		return 1;
	}

	function buy_credit() {
		// Check whether the user chose a value from the radio button or not
		$data['header_view']['name'] = 'Mohammed Khairy';
		$data['header_view']['cover_id'] = '772975899384003';
		log_message('error', 'henahowan');
		if (isset($_POST['credit'])) {
			// Get radio button value
			$credit = $_POST['credit'];
			// Get facebook user ID
			// Set needed parameters values
			$params['fb_id'] = '100000130552768';
			$params['credit'] = $credit;
			log_message('error', 'henahowan'.$credit);
			// Encode the parameters
			$jsn_params = json_encode($params);
			// Invoke the core to buy new credit for the user
			// 				$this->rest->get('buycredit', array('params' => $jsn_params), 'json');
			$this->core_call->buy_credit($jsn_params);
		}
		$cr = 0;
		$cr = $this->get_credit();
		log_message('error', 'buycredit, new credit: '.$cr);
		echo $cr;
	}

	function take_credit($value) {
		// Set needed parameters values
		$params['fb_id'] = '100000130552768';
		$params['credit'] = $value;
		// Encode the parameters
		$jsn_params = json_encode($params);
		// Invoke the core to buy new credit for the user
		// 			$this->rest->get('buycredit', array('params' => $jsn_params), 'json');
		$this->core_call->buy_credit($jsn_params);
	}

	function buy_card() {
		$card_price = intval($this->input->post('card_price'));
		$user_points = intval($this->input->post('user_points'));
		$card_id = intval($this->input->post('card_id'));
		$cat_id = intval($this->input->post('cat_id'));
		if ($user_points >= $card_price) {
			$this->take_credit($card_price * -1);
			$this->load->model('card_model');
			$this->card_model->insert_user_card($cat_id , $card_id , $this->get_user_id());
			echo $this->get_credit();
		}
		else
			echo -1;
	}

	// Entry point for Platform ...
	function index() {
		$data['page'] = 'main_view';
		$data['header_view']['name'] = 'Heba Gamal Abu El-Ghar';
		$data['header_view']['user_id'] = $data['main_view']['user_id'] = $this->get_user_id();
		$data['header_view']['cover_id'] = '748325228515155';
		//			$data['header_view']['fb_id'] = '100000130552768';
		$credit = $this->get_credit();
		log_message('error', 'credit = '.$credit);
		$data['main_view']['user_points'] = $credit;

		$this->load->model('category_model');
		$this->load->model('card_model');
		$data['main_view']['interest_cats'] = $this->category_model->get_category_interst_by_userID($this->get_user_id());
		$all_categories = $this->category_model->get_all_category();
		$interest_categories = $data['main_view']['interest_cats'];
		$data['main_view']['not_interest_cats'] = $this->get_not_interst_categories($all_categories , $interest_categories);

		$data['main_view']['first_cat_name'] = $data['header_view']['first_cat_name'] = $this->get_first_category_name($interest_categories);
		$cat_id = $data['main_view']['first_cat_id'] = $data['header_view']['first_cat_id'] = $this->get_first_category_id($interest_categories);

		$data['main_view']['cards'] = $this->card_model->get_cards_by_id($cat_id);

		$this->load->view('template', $data);

	}
}