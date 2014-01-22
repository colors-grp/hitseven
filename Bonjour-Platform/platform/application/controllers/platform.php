<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Platform extends CI_Controller {

	// Go and get the login URL from Core ...
	function getLoginURL()
	{
		// initialize rest API ...
		$this->rest->initialize(array(
				'server' => $this->config->item('core_url'),
				'http_user' => '',
				'http_pass' => '',
				'http_auth' => 'basic' // or 'digest'
		));

		// Get the base Platform URL, encrypt it and send it as a parameter to Core ..
		//$platform_url = $this->platform_fbutils->encryptIt(base_url());
		
		// We should get this from a configuration value ...
		$platform_url = '1';
		//$site_url = $this->platform_fbutils->decryptIt($platform_url);
		
		//return $platform_url;
		
		// invoke Core loginurl method ... In h7fb.php loginurl_get ...
		return $this->rest->get('loginurl', array('platform_url' => $platform_url), 'json');
	}

	function handle_core_call($token, $fbuid)
	{
		/// load fb utils ...
		$this->load->model('platform_fbutils');

		// set access token ...
		$result = $this->platform_fbutils->set_access_token($token);

		//$result = $this->platform_fbutils->get_access_token();

		// check if it was set correctly ...
		if ($result['is_true']) {

			// set fb data in the session ... 
			// This is imp, because all FB graph API calls will use this ...
			$this->session->set_userdata(array('access_token' => $token));
			$this->session->set_userdata(array('facebook_uid' => $fbuid));
			$this->session->set_userdata(array('is_logged_in' => TRUE));
			$this->session->set_userdata(array('core' => "0"));
			$appsecret_proof= hash_hmac('sha256', $token, $this->config->item('secret'));
			//$appsecret_proof= hash_hmac('sha256', $token, 'cd54e94fcc7509e7140def0b70fb4e59');
			$this->session->set_userdata(array('appsecret_proof' => $appsecret_proof));

			// Set the cookie ...
			// Prepare all data to be stored in cookie ...
			$user_data_array = $this->session->all_userdata();
			// overwrite facebook uid value with its' encrtypted string ... 
			$user_data_array['facebook_uid'] = $this->platform_fbutils->encryptIt($fbuid);
			
			// encode the array as JSON string ... 
			$user_data = json_encode($user_data_array);

			$some_cookie_array = array(
					'name'   => 'H7Cookie',
					'value'  => $user_data,
					'expire' => 86500 // initial duration in a web sample, we need to revisit ...
			);

			// write cookie 
			$this->input->set_cookie($some_cookie_array);

		} else {

			$this->session->set_userdata(array('access_token' => FALSE));

		}
		
		// redirect user to the secure controller ... 
		redirect('secure', 'refresh');
	}

	// Platform Entry point ...
	function index() {
		
		// Load the Platform Facebook Connectivity utilties library ...
		$this->load->model('platform_fbutils');

		// Load the cookie from user ... 
		$cookie = $this->input->cookie('H7Cookie');


		if ($cookie) {
			$user_data = json_decode($cookie, true);
			$this->session->set_userdata(array('access_token' => $user_data['access_token']));
			$this->session->set_userdata(array('facebook_uid' => $this->platform_fbutils->decryptIt($user_data['facebook_uid'])));
			$this->session->set_userdata(array('is_logged_in' => TRUE));
			$this->session->set_userdata(array('core' => "0"));
			//$appsecret_proof= hash_hmac('sha256', $real_token, 'cd54e94fcc7509e7140def0b70fb4e59');
			//$this->session->set_userdata(array('appsecret_proof' => $appsecret_proof));

			// we pass this parameter to test the Rest controllers
			$core = "0";
			$token = $user_data['access_token'];
			redirect('secure', 'refresh');
		}
		else {
			// we pass this parameter to test the Rest controllers
			$core = $this->input->get('core');
		}

		if($core)
		{ 
			// This is a Redirect from Core ...
			// get token and fbuid from url parameters ... 
			$token = $this->input->get('token');
			$fbuid = $this->input->get('fbuid');
			
			// handle core call ... 
			$this->handle_core_call($token, $fbuid);
		}
		else
		{ 
			// We get here only if NO cookie (user not logged in before AND this is not an internal call from Core)
			// Set the view ...
			$data['page'] = 'home_view';
			
			// Put the loginurl in the data array so it can go to the view ...
			$data['loginurl'] = $this->getLoginUrl();
			$this->load->view('template', $data);
		}
	}

	function logout() {

		// load the cookie helper ...
		$this->load->helper('cookie');
		
		// delete the cookie ...
		delete_cookie('H7Cookie');
		// destroy the session ...
		$this->session->sess_destroy();
		session_destroy();
		
		// redirect to platform ...
		redirect(base_url());
	}
}