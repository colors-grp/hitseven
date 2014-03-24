<?php 
class My_collection extends CI_Controller {
	function __construct() {
		parent::__construct();
		//Load credit helper
		$this->load->helper('credit');
			
		//Loading needed models
		$this->load->model('category_model');
	}
	function get_my_collection() {
		//Setting session variables
		$_SESSION['current_page'] = 'my_collection';
		
		//Set page name to be sent to the template view
		$data['page'] = 'my_collection_view';
		$data['header_view']['page'] = 'my_collection_view';
		
		// temporary hard coded ...
<<<<<<< HEAD
		$data['header_view']['name'] = 'Mohammed Khairy';
=======
		$data['header_view']['name'] = 'Heba Gamal Abu El-Ghar';
>>>>>>> bc7448ccaf71025d10bc3767d24edd95ca50bc32
		$data['header_view']['user_id'] = $_SESSION['user_id'];
		$data['header_view']['cover_id'] = '748325228515155';
		
		// Get User favorite categories ...
		$data['my_collection_view']['interest_cats'] = $this->category_model->get_category_interst_by_userID($data['header_view']['user_id'] );
		
		// Get user credit ...
		$data['my_collection_view']['user_points'] = get_credit();
<<<<<<< HEAD
		$data['my_collection_view']['fb_id'] = $_SESSION['fb_id'];
		$data['header_view']['fb_id'] = $_SESSION['fb_id'];
=======
>>>>>>> bc7448ccaf71025d10bc3767d24edd95ca50bc32
		
		//Loading default view 
		$this->load->view('template' , $data);
	}
}