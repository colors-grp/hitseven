<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Platform extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->rest->initialize(array(
				'server' => $this->config->item('core_url'),
				'http_user' => '',
				'http_pass' => '',
				'http_auth' => 'basic' // or 'digest'
		));
	}

// 	// Go and get the login URL from Core ...
// 	function getLoginURL()
// 	{
// 		// initialize rest API ...
// 		$this->rest->initialize(array(
// 				'server' => $this->config->item('core_url'),
// 				'http_user' => '',
// 				'http_pass' => '',
// 				'http_auth' => 'basic' // or 'digest'
// 		));

// 		// Get the base Platform URL, encrypt it and send it as a parameter to Core ..
// 		//$platform_url = $this->platform_fbutils->encryptIt(base_url());

// 		// We should get this from a configuration value ...
// 		$platform_url = '1';
// 		//$site_url = $this->platform_fbutils->decryptIt($platform_url);

// 		//return $platform_url;

// 		// invoke Core loginurl method ... In h7fb.php loginurl_get ...
// 		return $this->rest->get('loginurl', array('platform_url' => $platform_url), 'json');
// 	}

// 	function handle_core_call($token, $fbuid)
// 	{
// 		/// load fb utils ...
// 		$this->load->model('platform_fbutils');

// 		// set access token ...
// 		$result = $this->platform_fbutils->set_access_token($token);

// 		//$result = $this->platform_fbutils->get_access_token();

// 		// check if it was set correctly ...
// 		if ($result['is_true']) {

// 			// set fb data in the session ...
// 			// This is imp, because all FB graph API calls will use this ...
// 			$this->session->set_userdata(array('access_token' => $token));
// 			$this->session->set_userdata(array('facebook_uid' => $fbuid));
// 			$this->session->set_userdata(array('is_logged_in' => TRUE));
// 			$this->session->set_userdata(array('core' => "0"));
// 			$appsecret_proof= hash_hmac('sha256', $token, $this->config->item('secret'));
// 			//$appsecret_proof= hash_hmac('sha256', $token, 'cd54e94fcc7509e7140def0b70fb4e59');
// 			$this->session->set_userdata(array('appsecret_proof' => $appsecret_proof));

// 			// Set the cookie ...
// 			// Prepare all data to be stored in cookie ...
// 			$user_data_array = $this->session->all_userdata();
// 			// overwrite facebook uid value with its' encrtypted string ...
// 			$user_data_array['facebook_uid'] = $this->platform_fbutils->encryptIt($fbuid);

// 			// encode the array as JSON string ...
// 			$user_data = json_encode($user_data_array);

// 			$some_cookie_array = array(
// 					'name'   => 'H7Cookie',
// 					'value'  => $user_data,
// 					'expire' => 86500 // initial duration in a web sample, we need to revisit ...
// 			);

// 			// write cookie
// 			$this->input->set_cookie($some_cookie_array);

// 		} else {

// 			$this->session->set_userdata(array('access_token' => FALSE));

// 		}

// 		// redirect user to the secure controller ...
// 		redirect('secure', 'refresh');
// 	}

// 	// Platform Entry point ...
// 	function index() {

// 		// Load the Platform Facebook Connectivity utilties library ...
// 		$this->load->model('platform_fbutils');

// 		// Load the cookie from user ...
// 		$cookie = $this->input->cookie('H7Cookie');

// 		$cookie = NULL;

// 		if ($cookie) {
// 			$user_data = json_decode($cookie, true);
// 			$this->session->set_userdata(array('access_token' => $user_data['access_token']));
// 			$this->session->set_userdata(array('facebook_uid' => $this->platform_fbutils->decryptIt($user_data['facebook_uid'])));
// 			$this->session->set_userdata(array('is_logged_in' => TRUE));
// 			$this->session->set_userdata(array('core' => "0"));
// 			//$appsecret_proof= hash_hmac('sha256', $real_token, 'cd54e94fcc7509e7140def0b70fb4e59');
// 			//$this->session->set_userdata(array('appsecret_proof' => $appsecret_proof));

// 			// we pass this parameter to test the Rest controllers
// 			$core = "0";
// 			$token = $user_data['access_token'];
// 			redirect('secure', 'refresh');
// 		}
// 		else {
// 			// we pass this parameter to test the Rest controllers
// 			$core = $this->input->get('core');
// 		}
// 		$core = NULL;
		
// 		if($core)
// 		{
// 			// This is a Redirect from Core ...
// 			// get token and fbuid from url parameters ...
// 			$token = $this->input->get('token');
// 			$fbuid = $this->input->get('fbuid');

// 			// handle core call ...
// 			$this->handle_core_call($token, $fbuid);
// 		}
// 		else
// 		{
// 			// We get here only if NO cookie (user not logged in before AND this is not an internal call from Core)
// 			// Set the view ...
// 			//$data['home_view']['loginurl'] = $this->getLoginUrl();
			
// 			$data['page'] = 'main_view';
// 			$data['header_view']['name'] = 'Heba Gamal Abu El-Ghar';
// 			$data['header_view']['cover_id'] = '748325228515155';
// //			$data['header_view']['fb_id'] = '100000130552768';
// 			$data['main_view']['user_points'] = 1000;			
			
// 			$this->load->model('category_model');
// 			$info = $this->category_model->get_all_category();
// 			print_r($info);
			
// 			$this->load->view('template', $data);
// 		}
// 	}

// 	function logout() {
// 		// load the cookie helper ...
// 		$this->load->helper('cookie');

// 		// delete the cookie ...
// 		delete_cookie('H7Cookie');
// 		// destroy the session ...
// 		$this->session->sess_destroy();
// 		session_destroy();

// 		// redirect to platform ...
// 		redirect(base_url());
// 	}

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
		// Get facebook user ID
		$fbid = '100000147991301';
		// Invoke the core to get user's credit from the database
		$credit = $this->rest->get('getcredit', array('fb_id' => $fbid), 'json');
		return $credit;
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
			$params['fb_id'] = '100000147991301';
			$params['credit'] = $credit;
			log_message('error', 'henahowan'.$credit);
			// Encode the parameters
			$jsn_params = json_encode($params);
			// Invoke the core to buy new credit for the user
			$this->rest->get('buycredit', array('params' => $jsn_params), 'json');
		}
		$cr = 0;
		$cr = $this->get_credit();
		echo $cr;
	}
	
	function index() {
		$data['page'] = 'main_view';
		$data['header_view']['name'] = 'Heba Gamal Abu El-Ghar';
		$data['header_view']['cover_id'] = '748325228515155';
		//			$data['header_view']['fb_id'] = '100000130552768';
		$credit = $this->get_credit();
		log_message('error', 'credit = '.$credit);
		$data['main_view']['user_points'] = $credit;
			
		$this->load->model('category_model');
		$this->load->model('card_model');
		$data['main_view']['interest_cats'] = $this->category_model->get_category_interst_by_userID("1");
		$all_categories = $this->category_model->get_all_category();
		$interest_categories = $data['main_view']['interest_cats'];
		$data['main_view']['not_interest_cats'] = $this->get_not_interst_categories($all_categories , $interest_categories);
		
		$data['main_view']['first_cat_name'] = $data['header_view']['first_cat_name'] = $this->get_first_category_name($interest_categories);		
		$cat_id = $data['main_view']['first_cat_id'] = $data['header_view']['first_cat_id'] = $this->get_first_category_id($interest_categories);
		
		$data['main_view']['cards'] = $this->card_model->get_cards_by_id($cat_id);
		
		$this->load->view('template', $data);
		
	}
}