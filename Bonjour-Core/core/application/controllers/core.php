<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Core extends CI_Controller {
	
	// This method should get the code from platform, and evaluate it to a URL from the HitSeven Database ...
	function getSiteUrl($sitecode)
	{
		if($sitecode == '1')
			// replaced explicit setting of Platform with config entry
			return $this->config->item('platform_url');
			//return 'http://gloryette.org/amr';
	}
	
	// Call facebook to get the login URL and pass it back to the platform ...
	function getLoginUrl()
	{
		// Load core_fbutils ...
		$this->load->model('core_fbutils');
			
		// Set the redirect URL which facebook will return to after logging in ...
		// base_url (is the URL of the CORE -> send you to Core.php.index())
		// Add Sitecode parameter to send the platform URL to Core
		// ex: "http://www.colors-studios.com/core" . '?' . "&sitecode=" . encrypted ("http://www.colors-grp.com/test1") ...
		// 		$redirect_uri = base_url() . '?'. '&sitecode=' . $this->get('platform_url');
		$redirect_uri = base_url();
	
		// 		$redirect_uri = base_url();
	
		// get the login url from facebook with the configured return uri
		$loginurl = $this->facebook->getLoginUrl(array('redirect_uri' => "$redirect_uri", 'scope' => 'email,read_friendlists')); // , 'sitecode' => $this->get('platform_url')
	
		
		if($loginurl)
		{
			return $loginurl;
		}
	
		else
		{
			return 'Couldn\'t find any users!';
		}
	}
	
	function addCookie($cookie_name, $sitecode)
	{
	
		$some_cookie_array = array(
				'name'   => $cookie_name,
				'value'  => $sitecode,
				'expire' => 86500 // initial duration in a web sample, we need to revisit ...
		);
	
		// write cookie
		$this->input->set_cookie($some_cookie_array);
	}
	
	// Core is called via : http://www.colors-studios.com/core"
	function index() {
		
		// Load fb utils ... 
		
		// we pass this parameter to test the Rest controllers
		$rest = $this->input->get('rest');
		
		// Sidecode is a numerical value that represent the site primary ID in Database
		// Replacing encryption of the HTTP URL with a numerical value to avoid creating invalid characters in URL ...
		$sitecode = $this->input->get('sitecode');

		// if site code exists, means that the caller is Facebook ...
		if($sitecode) // This means it is a self-redirect that was configured in h7fb ...
		{
			
			$loginurl = $this->getLoginUrl();
			
			// Add sitecode value to session variables ..
			$this->session->set_userdata('sitecode', $sitecode);
			
			// get session data ...
			$data = $this->session->all_userdata();
			
			$user_session = json_encode($data);
			
			$message = 'Before Facebook = ' . $data['ip_address'];
			$message = 'Before Facebook = ' . $data['session_id'];
			
			$this->addCookie('h7'.$data['ip_address'], $sitecode);
			
			log_message('error', $message);
			//log_message('error', $user_session);
			
			redirect($loginurl);
/*			
			// get user from facebook.. 
			$this->load->model('core_fbutils');
		
			$user_data = $this->core_fbutils->get_user();
			
			$platform_url = $this->getSiteUrl($sitecode);
			
			if ($user_data['is_true']) {
				
				// Set the session variables with Facebook information ...
 				$this->session->set_userdata(array('facebook_uid' => $user_data['facebook_uid'], 'is_logged_in' => TRUE));
 				
 				// Get facebook access token 
  				$access_token = $this->core_fbutils->get_access_token();
  				
  				$fb_uid = $user_data['facebook_uid'];
  				
  				// Set the Platform URL again to redirect to Platform ...
  				// "http://www.colors-grp.com/test1/?token= access_token . &fbuid= .$fbuid . "&core=1 ...
  				$site_url = $platform_url . "?token=" .$access_token['access_token'] . "&fbuid=" .$fb_uid . "&core=" ."1";
  				
  				// redirect back to platform with configured parameters ...
  				redirect($site_url);
			}
			else
			{
				$site_url = $platform_url . "?token=" .$access_token['access_token'] . "&fbuid=" .$fb_uid . "&core=" ."1";
				
				echo 'The URL is INVALID, Please check: ' . $site_url;
			}*/
		}
		else {  
			
			$code = $this->input->get('code');
			
			$data = $this->session->all_userdata();
			
			$user_session = json_encode($data);
			
			$message = 'After Facebook = ' . $data['ip_address'];
			$message = 'After Facebook = ' . $data['session_id'];
			
			// Load the cookie from user ...
			$cookie = $this->input->cookie('h7'.$data['ip_address']);
			
			
			if ($cookie) {
				$user_data = json_decode($cookie, true);
				log_message('error', 'AFter FB sitecode === '. $user_data['sitecode']);
			}
			else {
				echo 'cannot find cookie  :  ' .'h7'.$data['ip_address']; 
			}
			
			log_message('error', $message);
			
			//log_message('error', $user_session);
			
// 				$data = $this->session->all_userdata();
// 				print_r($data);
// 				echo '--------------';
// 				echo $data['session_id'];
				echo $code;
		
			/*
			/// lao wa7ed da7'al 3ala el core mn bet-hom ...
			
				/// This loads the home page of HitSeven Core ...
				// current code is a working core sample of logging to facebook
				// to be changed to have the hitseven home website ...
				$this->load->model('core_fbutils');
				$result = $this->core_fbutils->get_user();

				if ($result['is_true']) {
					//			echo "user is logged in ... ";
					$this->session->set_userdata(array('facebook_uid' => $result['facebook_uid'], 'is_logged_in' => TRUE));
					redirect('secure', 'refresh');
				} else {
					$data['page'] = 'home_view';
					$this->load->view('template', $data);
				}*/
			}
	}

	function logout() {
		$this->auth->logout();
	}

}