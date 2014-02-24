<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class ajax extends CI_Controller {

	public function __construct() {
		parent::__construct();
		//         $this->checksession();
	}

	//by heba & 5airy
	function get_card_by_category() {
		$user_id = $this->session->userdata('user_id');
		$cat_id = $this->input->post('cat_id');
		$cat_name = $this->input->post('cat_name');
		if($cat_id == '-1') {
			$cat_id =  $this->session->userdata('current_category_id');
			$cat_name = $this->session->userdata('current_category_name');
			//Set that current view is list view
			$this->session->set_userdata('card_view' , 'list');
		}
		if ($this->session->userdata('card_view') == 'grid') {
			$session_array = array(
					'current_category_id' => $cat_id,
					'current_category_name' => $cat_name
			);
			$this->session->set_userdata($session_array);
			return $this-> get_card_grid_view();
		}
		$info['cat_id'] = $cat_id;
		$session_array = array(
				'current_category_id' => $cat_id,
				'current_category_name' => $cat_name
		);
		$this->session->set_userdata($session_array);
		$info['category_name'] = $cat_name;
		$this->load->model('card_model');
		$info['cards'] = $this->card_model->get_cards_by_id($cat_id);
		if ($info['cards']) {
			$user_cards = $this->card_model->get_user_cards_by_id($cat_id, $user_id);
			$info['user_cards'] = array();
			if ($user_cards != FALSE) {
				foreach ($user_cards->result() as $uc) {
					array_push($info['user_cards'], $uc->id);
				}
			}
			$this->load->view('ajax/card_list_view_ajax', $info);
		} else {
			echo 'no Result';
		}

	}

	//by heba & 5airy 2
	function get_card_info_mycollection() {
		$info['user_id'] = $this->session->userdata('user_id');

		$card_id =$info['card_id'] = $this->input->post('card_id');
		$cat_id = $info['cat_id'] = $this->input->post('cat_id');
		$info['card_name'] = $this->input->post('card_name');
		$info['card_price'] = $this->input->post('card_price');
		$info['user_points'] = $this->input->post('user_points');
		$info['card_score'] = $this->input->post('card_score');
		$name = $info['cat_name'] = $this->input->post('cat_name');
		//Get category name from database
		$this->load->model('category_model');
		$this->load->model('card_model');

		$info['own_card'] = $this->card_model->own_card($cat_id , $card_id ,$info['user_id'] );
		//Load Directory helper to traverse media in each media item
		$this->load->helper('directory');
		$info['images'] = directory_map('./h7-assets/images/categories/'.$name.'/cards/'.$card_id.'/image/');
		$info['audios'] = directory_map('./h7-assets/images/categories/'.$name.'/cards/'.$card_id.'/audio/');
		$info['videos'] = directory_map('./h7-assets/images/categories/'.$name.'/cards/'.$card_id.'/video/');
			
		$this->load->view('ajax/my_collection_view_ajax', $info);
	}
	//by heba & 5airy 3
	function category_highlight_ajax() {
		$info['cat_id'] = $this->input->post('cat_id');
		$info['cat_name'] = $this->input->post('cat_name');
		$info['user_id'] = $this->session->userdata('user_id');

		//User session data are updated
		if($info['cat_id'] == '-1') {
			$info['cat_id'] =  $this->session->userdata('current_category_id');
			$info['cat_name'] = $this->session->userdata('current_category_name');
		}

		//Set new session variables
		$session_array = array(
				'current_category_id' => $info['cat_id'],
				'current_category_name' => $info['cat_name']
		);
		$this->session->set_userdata($session_array);

		$this->load->model('category_model');
		$info['interest_cats'] = $this->category_model->get_category_interst_by_userID($info['user_id']);
		$this->load->view('ajax/load_interest_category_view_ajax' , $info);
	}

	//by heba & 5airy 4
	function load_not_interest_category() {
		$cat_id = $this->input->post('cat_id');
		$user_id = $this->session->userdata('user_id');
		$to_load = $this->input->post('to_load');
		$this->load->model('category_model');
		if($to_load == false) {
			$this->category_model->insert_user_category($cat_id , $user_id);
		}
		//Get interest cats
		$interest_cats = $this->category_model->get_category_interst_by_userID($user_id);
		//Get All
		$all_cats = $this->category_model->get_all_category();
		//Get NOT interested
		$info['not_interest_cats'] = $this->get_not_interst_categories($all_cats, $interest_cats);
		$this->load->view('ajax/load_not_interest_category_view_ajax',$info);
	}
	//BY HEBA
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

	//by heba & 5airy b ro7o 5 :D
	function get_card_grid_view() {
		//set current card view
		$this->session->set_userdata('card_view' , 'grid');
			
		//Retrieve category information form session
		$cat_id = $this->session->userdata('current_category_id');
		$cat_name = $this->session->userdata('current_category_name');
		$user_id = $this->session->userdata('user_id');

		$info['cat_id'] = $cat_id;
		$info['cat_name'] = $cat_name;
		$this->load->model('card_model');
		$info['cards'] = $this->card_model->get_cards_by_id($cat_id);
		if ($info['cards']) {
			$user_cards = $this->card_model->get_user_cards_by_id($cat_id, $user_id);
			$info['user_cards'] = array();
			if ($user_cards != FALSE) {
				foreach ($user_cards->result() as $uc) {
					array_push($info['user_cards'], $uc->id);
				}
			}
			$this->load->view('ajax/card_grid_view_ajax',$info);
		} else
			echo 'no Result';
	}

	function get_category_name()  {
		$info['cat_id'] = $this->session->userdata('current_category_id');
		$info['cat_name'] = $this->session->userdata('current_category_name');
		$this->load->view('ajax/card_name_view_ajax' , $info);
	}

}

/* End of file*/