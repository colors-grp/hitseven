<?php 
class My_collection extends CI_Controller {
	function get_first_category_name($interest_categories) {
		if($interest_categories != FALSE) {
			return $interest_categories->row()->name;
		}
	}
	
	function get_first_category_id($interest_categories) {
		if($interest_categories != FALSE) {
			return $interest_categories->row()->id;
		}
	}
	
	function get_my_collection() {
		if (session_id() == '') {
			session_start();
		}
		$_SESSION['current_page'] = 'my_collection';
		//Load credit helper
		$this->load->helper('credit');
		//Set page name to be sent to the template view
		$data['page'] = 'my_collection_view';
		$data['header_view']['page'] = 'my_collection_view';
		$data['header_view']['name'] = 'Heba Gamal Abu El-Ghar';
		$data['header_view']['user_id'] = $_SESSION['user_id'];
		$data['header_view']['cover_id'] = '748325228515155';
		// Get User favorite categories ...
		$this->load->model('category_model');
		$data['my_collection_view']['interest_cats'] = $this->category_model->get_category_interst_by_userID($data['header_view']['user_id'] );
	
		// Set the currently selected Category ...
		$data['header_view']['first_cat_name'] = $this->get_first_category_name($data['my_collection_view']['interest_cats'] );
		$data['header_view']['first_cat_id'] = $this->get_first_category_id($data['my_collection_view']['interest_cats'] );
	
		// Get user credit ...
		$data['my_collection_view']['user_points'] = get_credit();
	
		$this->load->view('template' , $data);
	}
}