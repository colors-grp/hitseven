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
		$this->load->model(array('account/account_facebook_model'));

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
			// 			$data['friends'] = $this->core_call->getFacebookFriends($this->session->userdata('account_id'));

			$fb = $this->account_facebook_model->get_by_account_id($this->session->userdata('account_id'));

			$_SESSION['fb_id'] = $fb[0]->facebook_id;
			log_message('error', 'redirect 3la platform, FB ID = ' . $_SESSION['fb_id']);
			redirect('platform');
		}

		// This is true for redirections from Core ...
		if($accountid)
		{
			log_message('error', 'bevore Sign in acc id == '.$accountid);
			$this->authentication->sign_in($accountid);
		}
		$this->load->model('scoreboard_model');
		$tmp = $data['scoreboard_home_view'] = $this->scoreboard_model->get_home_page_scoreboard();
		$data['sorted_cats'] = $this->scoreboard_model->get_sorted_cats();
		// 	gonna load the home view anyway ! ...
		$this->load->view('home_view', $data);
	}

}


/* End of file home.php */
/* Location: ./system/application/controllers/home.php */