<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Core extends CI_Controller {
	
	// This method should get the code from platform, and evaluate it to a URL from the HitSeven Database ...
	function getSiteUrl($sitecode)
	{
		if($sitecode == '1')
			return 'http://gloryette.co/heba';
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
			}
		}
		else {  
			
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
				}
			}
	}

	function logout() {
		$this->auth->logout();
	}

}