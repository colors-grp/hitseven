<?php

class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		// Load the necessary stuff...
		$this->load->helper(array('language', 'url', 'form', 'account/ssl'));
		
		$this->load->library(array('account/authentication', 'account/authorization'));
		$this->load->model(array('account/account_model', 'session_model', 'core_call'));
		$this->load->model(array('account/account_details_model'));
		
		// Facebook connections are banned from Platform ...
		
		//$this->load->model(array('account/account_facebook_model'));
		//$this->load->model(array('facebook_utils'));
	}

	function index()
	{
		
		maintain_ssl();

		$accountid = $this->input->get('accountid');
		
		// If the user is signed in ... 
		if ($this->authentication->is_signed_in())
		{
			log_message('error', 'signed in and back home !!! account id = '. $this->session->userdata('account_id'));
			$data['account'] = $this->account_model->get_by_id($this->session->userdata('account_id'));
			$data['account_details'] = $this->account_details_model->get_by_account_id($this->session->userdata('account_id'));
			log_message('error', 'data ====== '.json_encode($data));
			$data['friends'] = $this->core_call->getFacebookFriends($this->session->userdata('account_id'));
		}
		
		// This is true for redirections from Core ...
		if($accountid)
		{
			log_message('error', 'bevore Sign in acc id == '.$accountid);
			$this->authentication->sign_in($accountid);
		}
		
		// gonna load the home view anyway ! ...
		$this->load->view('home', isset($data) ? $data : NULL);
	}

}


/* End of file home.php */
/* Location: ./system/application/controllers/home.php */