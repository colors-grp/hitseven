<?php 
class Activity_log extends CI_Controller {
	function show_log() {
		//Set current page 
		$data['page'] = 'activity_view';
		$this->load->model('activity_model');
		
		// temporary hard coded ...
<<<<<<< HEAD
		$data['header_view']['name'] = 'Mohammed Khairy';
		$data['header_view']['user_id'] = $data['main_view']['user_id'] = $_SESSION['user_id'];
		$data['header_view']['cover_id'] = '748325228515155';
		$data['header_view']['fb_id'] = $_SESSION['fb_id'];
=======
		$data['header_view']['name'] = 'Heba Gamal Abu El-Ghar';
		$data['header_view']['user_id'] = $data['main_view']['user_id'] = $_SESSION['user_id'];
		$data['header_view']['cover_id'] = '748325228515155';
>>>>>>> bc7448ccaf71025d10bc3767d24edd95ca50bc32
	
		//Get Activity log for user
		$data['activity_view']['logs'] = $this->activity_model->get_log($_SESSION['user_id']);
		
		//Load default view 
		$this->load->view('template' , $data);
	}
}