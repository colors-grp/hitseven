<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );

class Scoreboard extends CI_Controller {
	public function __construct() {
		parent::__construct ();
	}
	function index() {
		$cat_id = $this->session->userdata ( 'current_category_id' );
		$this->load->model ( 'scoreboard_model' );
		$scoreboard = $this->scoreboard_model->get_scoreboard ( $cat_id );
		$session_array = array(
				'user_data' => $scoreboard,
		);
		$this->session->set_userdata($session_array);
		$this->load->view('ajax/scoreboard_ajax');
	}
}