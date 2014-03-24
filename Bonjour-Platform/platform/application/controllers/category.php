<?php 
class Category extends CI_Controller {
	public function __construct() {
		parent::__construct();
		//Load models needed
		$this->load->model('card_model');
		$this->load->model('category_model');
		$this->load->model('activity_model');
	
	}
	
	function get_category_name()  {
		$info['cat_id'] = $_SESSION['current_category_id'];
		$info['cat_name'] = $_SESSION['current_category_name'];
		$this->load->view('ajax/card_name_view_ajax' , $info);
	}
	
	function load_interest_category() {
		$info['cat_id'] = $this->input->post('cat_id');
		$info['cat_name'] = $this->input->post('cat_name');
		$info['user_id'] = $_SESSION['user_id'];
	
		//User session data are updated
		if($info['cat_id'] == '-1') {
			$info['cat_id'] =  $_SESSION['current_category_id'];
			$info['cat_name'] = $_SESSION['current_category_name'];
		}
	
		//Set new session variables
		$_SESSION['current_category_id'] = $info['cat_id'];
		$_SESSION['current_category_name'] = $info['cat_name'];
	
		$info['interest_cats'] = $this->category_model->get_category_interst_by_userID($info['user_id']);
		$info['current_page'] = $_SESSION['current_page'];
<<<<<<< HEAD
		$color = $info['color'] = $this->input->post('color');
		log_message('error', 'color ->        ' . $color);
		$this->load->view('ajax/load_interest_category_view_ajax' , $info);
	}
	function load_interest_category_my_collection() {
		$info['cat_id'] = $this->input->post('cat_id');
		$info['cat_name'] = $this->input->post('cat_name');
		$info['user_id'] = $_SESSION['user_id'];
	
		//User session data are updated
		if($info['cat_id'] == '-1') {
			$info['cat_id'] =  $_SESSION['current_category_id'];
			$info['cat_name'] = $_SESSION['current_category_name'];
		}
	
		//Set new session variables
		$_SESSION['current_category_id'] = $info['cat_id'];
		$_SESSION['current_category_name'] = $info['cat_name'];
	
		$info['interest_cats'] = $this->category_model->get_category_interst_by_userID($info['user_id']);
		$info['current_page'] = $_SESSION['current_page'];
		$color = $info['color'] = $this->input->post('color');
		log_message('error', 'color ->        ' . $color);
		$this->load->view('ajax/load_interest_category_my_collection_view_ajax' , $info);
	}
=======
		$this->load->view('ajax/load_interest_category_view_ajax' , $info);
	}
>>>>>>> bc7448ccaf71025d10bc3767d24edd95ca50bc32
	
	function load_not_interest_category() {
		$cat_id = $this->input->post('cat_id');
		$user_id = $_SESSION['user_id'];
		$to_load = $this->input->post('to_load');
		if($to_load == false) {
			$this->category_model->insert_user_category($cat_id , $user_id);
			//3 --> Follow new category
			$this->activity_model->insert_log( $user_id , 3);
		}
		//Get interest cats
		$interest_cats = $this->category_model->get_category_interst_by_userID($user_id);
		//Get All
		$all_cats = $this->category_model->get_all_category();
		//Get NOT interested
		$info['not_interest_cats'] = $this->get_not_interst_categories($all_cats, $interest_cats);
		$this->load->view('ajax/load_not_interest_category_view_ajax',$info);
	}
<<<<<<< HEAD
	function load_not_interest_category_my_collction() {
		$cat_id = $this->input->post('cat_id');
		$user_id = $_SESSION['user_id'];
		$to_load = $this->input->post('to_load');
		if($to_load == false) {
			$this->category_model->insert_user_category($cat_id , $user_id);
			//3 --> Follow new category
			$this->activity_model->insert_log( $user_id , 3);
		}
		//Get interest cats
		$interest_cats = $this->category_model->get_category_interst_by_userID($user_id);
		//Get All
		$all_cats = $this->category_model->get_all_category();
		//Get NOT interested
		$info['not_interest_cats'] = $this->get_not_interst_categories($all_cats, $interest_cats);
		$this->load->view('ajax/load_not_interest_category_my_collection_view_ajax',$info);
	}
=======
>>>>>>> bc7448ccaf71025d10bc3767d24edd95ca50bc32
	
	function get_not_interst_categories($all_categories , $interest_categories) {
		$res = array();
		foreach ($all_categories->result() as $row) {
			$int = $interest_categories;
			$to_add = 1;
			if($int != false) {
				foreach ($int->result() as $row2)
					if($row->id == $row2->id)
					$to_add = 0;
			}
			if($to_add == 1) {
				log_message('error', $row -> name);
				array_push($res , $row);
			}
		}
		return $res;
	}
<<<<<<< HEAD
	function get_category_name_without_href () {
		$data = $_SESSION['current_category_name'];
		echo $data;
	}
=======
>>>>>>> bc7448ccaf71025d10bc3767d24edd95ca50bc32
}