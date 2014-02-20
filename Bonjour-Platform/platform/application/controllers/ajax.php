<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class ajax extends CI_Controller {

	private $user_id = NULL;

	public function __construct() {
		parent::__construct();
		//         $this->checksession();
	}

	private function checksession() {
		if ($this->session->userdata('hitseven_userfbid') == FALSE || $this->session->userdata('hitseven_userid') == FALSE) {
			redirect('login/userlogin');
		}else
			$this->user_id = $this->session->userdata('hitseven_userid');
	}
	//by heba & 5airy
	function get_card_by_category() {
		$cat_id = $this->input->post('cat_id');
		$cat_name = $this->input->post('cat_name');
		$info['cat_id'] = $cat_id;
		$user_id = $this->input->post('user_id');
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
		$card_id =$info['card_id'] = $this->input->post('card_id');
		$cat_id = $info['cat_id'] = $this->input->post('cat_id');
		$info['card_name'] = $this->input->post('card_name');
		$info['card_price'] = $this->input->post('card_price');
		$info['user_points'] = $this->input->post('user_points');
		$info['user_id'] = $this->input->post('user_id');
		$info['card_score'] = $this->input->post('card_score');
		//Get category name from database
		$this->load->model('category_model');
		$this->load->model('card_model');
		$name = $info['cat_name'] = $this->category_model->get_category_name_by_id($cat_id);
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
		$info['user_id'] = $this->input->post('user_id');
		$this->load->model('category_model');
		$info['interest_cats'] = $this->category_model->get_category_interst_by_userID(1);
		$this->load->view('ajax/load_interest_category_view_ajax' , $info);
	}

	//by heba & 5airy 4
	function load_not_interest_category() {
		$cat_id = $this->input->post('cat_id');
		$user_id = $this->input->post('user_id');
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
		log_message('error', 'Not Interest Cats');
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


	function add_category_to_user() {
		$cat_id = $this->input->post('cat_id');
		$user_id = $this->user_id;
		$this->load->model('category');
		$this->category->add_category_to_user($cat_id, $user_id);

		$info['interest_cats'] = $this->category->get_category_user_interest($this->user_id);
		if ($info['interest_cats'][0]) {
			$info['first_cat_name'] = $info['interest_cats'][0]['info']->category_name . ' / ';
			$this->load->view("ajax_category", $info);
		} else {
			echo 'no Result';
		}
	}

	function get_cats_after_rgister() {
		$interest_cats = $this->category->get_category_user_interest($this->user_id);
		return $interest_cats;
	}

	function chat($user1_id = NULL, $user2_id) {
		$this->load->model('messages');
		$this->messages->read_all($user2_id, $user1_id);
		$chat = $this->messages->get_chat_two_users($user1_id, $user2_id);
		// load view to chat
	}

	function save_mesage() {
		$face_id = $this->session->userdata('hitseven_userfbid');
		$data['user_id'] = $this->user_id;
		$data['recipient_id'] = $this->input->post('to');
		$data['message_body'] = $this->input->post('message_body');
		$data['created'] = date('Y-m-d H:i:s');
		$date = new DateTime($data['created']);
		$data['message_body'] = $this->input->post('message_body');
		$this->load->model(array('messages', 'users'));
		$user = $this->users->get_user_by_ID($data['recipient_id']);
		$this->messages->add_message($data);
		echo ' <div class="mes_chat">
				<div class="all">
				<div class="chat_pic"><img src="https://graph.facebook.com/' . $face_id . '/picture?type=large" width="103" height="105" border="0" class="img-circle1"> </div>
						<div class="message_box">' . $data['message_body'] . '</div>
								</div>
								<div class="chat_clock"> <img src="' . site_url() . 'webassets/img/clock.png" width="48" height="48" border="0"></div>
										<div class="message_clock">' . $date->format('H:i:s d-m-Y') . '</div>
												</div>';
	}

	function get_score_board_by_category() {

		$cat_id = $this->input->post('cat_id');
		$this->load->model(array('category','settings'));

		//        $info['score_board']['array'] = $this->category->users_with_rank($cat_id);
		//        ksort($info['score_board']['array']);
		//
		//        $info['score_board']['array'] = $this->return_one_sorted($info['score_board']['array']);
		//        $high_score = $this->category->get_hight_score_in_last_round($cat_id);
		//        $info['hiscore'] = array();
		//        foreach ($high_score as $hi) {
		//            $temp['user'] = $this->users->get_user_by_ID($hi->user_id);
		//            $temp['rank'] = $hi;
		//            array_push($info['hiscore'], $temp);
		//        }
		//        print_r($info['hiscore']);
		//        exit();
		$info['ranks'] = $this->category->get_ranks_cat($cat_id);
		$last_round = $this->settings->get_last_duration();
		$info['last_round'] = $this->category->get_top_users_last_round($cat_id, $last_round, sizeof($info['ranks']));
		$info['score_board']['array'] = $this->category->get_current_score_board($cat_id);
		$this->load->view('ajax_score_board', $info);
	}

	private function return_one_sorted($array) {
		$result = array();
		foreach ($array as $key => $value) {
			if (is_array($value)) {
				foreach ($value as $key2 => $value2) {
					array_push($result, $value2);
				}
			} else {
				array_push($result, $value);
			}
		}

		return $result;
	}

	function get_chat() {
		$chat_with_id = $this->input->post('user_id');
		$this->load->model('messages');
		$info['first_user_chat'] = $this->messages->get_chat_two_users($this->user_id, $chat_with_id);
		$info['first_user_id'] = $chat_with_id;
		$this->load->view('ajax_message', $info);
	}

	function change_com_name() {
		$name = $this->input->post('name');
		$this->load->model('settings');
		$this->settings->update_com_name($name);
	}

	function change_com_duration() {
		$val = $this->input->post('val');
		$this->load->model('settings');
		$this->settings->update_com_duration($val);
	}

	// admin functions
	function admin_get_ranks_by_cat_id() {
		$cat_id = $this->input->post('cat_id');
		$this->load->model('category');
		$info['ranks'] = $this->category->get_cat_rank_by_cat_id($cat_id);
		$info['cat_id'] = $cat_id;
		$this->load->view('admin/ajax_get_ranks', $info);
	}

	function admin_get_cards_by_cat_id() {
		$cat_id = $this->input->post('cat_id');
		$this->load->model('cards');
		$info['cards'] = $this->cards->get_card_admin_by_cat($cat_id);
		$info['cards_count'] = sizeof($info['cards']);
		$info['cat_id'] = $cat_id;
		$this->load->view('admin/ajax_get_cards', $info);
	}

	function get_card_by_category_mycollection() {
		$cat_id = $this->input->post('cat_id');
		$info['cat_id'] = $cat_id;
		$this->load->model('cards');
		$info['cards'] = $this->cards->get_cards_by_category($cat_id);
		if ($info['cards']) {
			$buy_cards = $this->cards->get_cards_user_by_category($this->user_id, $cat_id);
			$info['buy_cards'] = array();
			if (sizeof($buy_cards) > 0) {
				foreach ($buy_cards as $buy_card) {
					array_push($info['buy_cards'], $buy_card->card_id);
				}
			}
			$this->load->view('ajax_mycollects_cards', $info);
		} else {
			echo 'no Result';
		}
	}


	function purchased() {
		$this->session->set_userdata('filter', 'purchased');
		redirect('user');
	}

	function missing_game() {
		$this->session->set_userdata('filter', 'missinggame');
		redirect('user');
	}

}

/* End of file*/