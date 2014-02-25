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
		$i = 0;
		foreach ( $scoreboard ['all']->result () as $row ) {
			$ret ['all'] [$i] = $row;
			$i ++;
		}
		$i = 0;
		foreach ( $scoreboard ['top']->result () as $row ) {
			$ret['top'][$i] = $row;
			$i ++;
		}
		$session_array = array (
				'user_data' => $ret,
				'load_scoreboard' => TRUE 
		);
		$this->session->set_userdata ( $session_array );
		$this->load->view ( 'ajax/scoreboard_ajax' );
	}
	function get_load_scoreboard_status() {
		$status = $this->session->userdata ( 'load_scoreboard' );
		echo $status;
	}
}