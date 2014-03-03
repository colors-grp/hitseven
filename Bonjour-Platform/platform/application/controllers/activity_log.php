<?php 
class Activity_log extends CI_Controller {
	function show_log() {
		$data['page'] = 'activity_view';
		$this->load->model('activity_model');
		// temporary hard coded ...
		$data['header_view']['name'] = 'Heba Gamal Abu El-Ghar';
		$data['header_view']['user_id'] = $data['main_view']['user_id'] = $this->session->userdata('user_id');
		$data['header_view']['cover_id'] = '748325228515155';
	
		$data['activity_view']['logs'] = $this->activity_model->get_log($this->session->userdata('user_id'));
		$this->load->view('template' , $data);
	}
}