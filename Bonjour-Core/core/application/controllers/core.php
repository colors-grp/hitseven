<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Core extends CI_Controller {
	/**
	 * Constructor
	 */
	function __construct()
	{
		parent::__construct();
	
		// Load the necessary stuff...
		$this->load->config('account/account');
		$this->load->helper(array('language', 'account/ssl', 'url'));
		$this->load->library(array('account/authentication', 'account/authorization', 'account/facebook_lib'));
		$this->load->model(array('account/account_model', 'account/account_facebook_model'));
		$this->load->language(array('general', 'account/sign_in', 'account/account_linked', 'account/connect_third_party'));
	}
	
	// Core is called via : http://www.colors-studios.com/core"
	function index() {
		
		//Start session if it is not already started
		if (session_id() == '')
			session_start();
		
		// Sidecode is a numerical value that represent the site primary ID in Database
		// Replacing encryption of the HTTP URL with a numerical value to avoid creating invalid characters in URL ...
		$sitecode = $this->input->get('sitecode');
		$mode = $this->input->get('mode');
		$accountid = $this->input->get('accountid');
		$code = $this->input->get('code');
		
		// Load fb utils ...
		log_message('error', 'core.php: Site Code: '.$sitecode);
		log_message('error', 'core.php: Mode : '.$mode);
		
		// Platform sends a mode parameter = "signin" ... 
		// As now we only support Facebook Login, this code redirects to check Facebook login ...
		if($mode == 'signin')
		{
			log_message('error', 'core.php: mode ====== sign in : '.$mode);
			$_SESSION['sitecode'] = $sitecode;
			log_message('error', 'Added site code to session, redirecting to redirect_fb');
			// Load facebook redirect view
			redirect('account/redirect_fb');
		}
		
		// Handle a redirect coming from Facebook ...
		if($code){
			log_message('error', 'Code parameter is here, this is a redirect from Facebook ...');
			log_message('error', 'Still have the site code !! ?? = ' .$_SESSION['sitecode']);
			
			// For an unknown reason, the redirection back to redirect_fb do not preserve FB login ...
			// Here loading the Facebook UID after redirection from Facebook for no good reason ...
			$facebook = new Facebook(array(
					'appId' => '352621514881126',
					'secret' =>'cd54e94fcc7509e7140def0b70fb4e59',
					'cookie' =>true
			));
			
			log_message('error', 'Trying to get facebook ID from core.php ...');
			
			// Try to get a logged in facebook user ID ...
			$session = $facebook->getUser();
			
			log_message('error', 'facebook user id from core.php : ' . $session);
			
			// Load facebook redirect view ... When we redirect here, the User ID is obtained successfully in redirect_fb
			redirect('account/redirect_fb');
		}

		// Handle a redirect from Core (create_connect, or else) ...
		if($this->authentication->is_signed_in())
		{
			if($this->session->userdata('account_id'))
			{
				log_message('error', 'connect_create sent back to Core account id = ' .$this->session->userdata('account_id'));
			}
			else
			{
				log_message('error', 'connect_create sent back to Core  and cannot get account ID');
			}
			// Redirect to Platform with account ID parameter ...
			$redirect_url =  $this->authentication->getSiteUrl($_SESSION['sitecode']). '?accountid='.$this->session->userdata('account_id');
			redirect($redirect_url);
		}
			
		// This is a call from redirect_fb
		if($accountid)
		{
			log_message('error', 'redirect_fb sent back to Core account id = ' .$accountid);
			// Redirect to Platform with account ID parameter ...
			$redirect_url =  $this->getSiteUrl($sitecode). '?accountid='.$accountid;
			redirect($redirect_url);
		}
	}


	function logout() {
		$this->auth->logout();
	}

}