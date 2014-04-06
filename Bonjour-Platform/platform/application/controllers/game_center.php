<?php
class Game_center extends CI_Controller {
	public function __construct() {
		parent::__construct();
		//Load models needed
		$this->load->model('game_model');
	}
	function load_game_view() {
		// Get post variables
		$card_id = $this->input->post('card_id');
		$card_name = $this->input->post('card_name');
		$game_id = $this->input->post('game_id');
		$game_name = $this->input->post('game_name');

		// Get needed Session variables
		$category_id =  $_SESSION['current_category_id'];
		$cat_name =  $_SESSION['current_category_name'];

		// Assign session variables for "update_score" function
		$_SESSION['game_id'] = $game_id;
		$_SESSION['card_id'] = $card_id;
		$info['cat_id'] = $category_id;
		$info['card_id'] = $card_id;
		$info['card_name'] = $card_name;
		$info['cat_name'] = $cat_name;
		$info['game_id'] = $game_id;
		if ($game_name == 'mcq') {
			$this->get_mcq_questions($card_id, $card_name);
		}
		else {
			$this->load->view('games/' . $game_name, $info);
		}
	}
	function update_score () {
		$score = $this->input->post('game_score');
		$score = intval($score);
		$game_id = $_SESSION['game_id'];
		$data = $this->game_model->get_user_score($game_id, $score)->row();
		$old_score = $data->game_best_score;
		log_message('error', 'update_score controller old score = ' . $old_score);
		$mx = 0;
		if ($score - $old_score > 0)
			$mx = $score - $old_score;
		$total_score = $this->game_model->update_total_score($mx);
		log_message('error', $total_score . ',,,,,'. $score . '  ' . $old_score);
		if ($score > $old_score) {
			$this->game_model->update_game_score($game_id, $score);
		}
		echo $total_score;
	}
	function get_mcq_questions($card_id, $card_name) {
		$category_id =  $_SESSION['current_category_id'];
		$questions = $this->game_model->get_questions($category_id, $card_id);
		if ($questions != FALSE) {
			$data['questions'] = $questions;
			$ques = array();
			$choice = array(array());
			$ans = array();
			$i = 0;
			foreach ($questions->result() as $row) {
				$ques[$i] = $row->content;
				$ans[$i] = $row->correct_answer;
				$choice[$i][0] = $row->choice1;
				$choice[$i][1] = $row->choice2;
				$choice[$i][2] = $row->choice3;
				$choice[$i][3] = $row->choice4;
				$i ++;
			}
			$data['ques'] = $ques;
			$data['choice'] = $choice;
			$data['ans'] = $ans;
			$data['card_id'] = $card_id;
			$data['card_name'] = $card_name;
			$data['cat_name'] = $_SESSION['current_category_name'];
			$data['cat_id'] = $category_id;
			$this->load->view('ajax/question_ajax', $data);
		}
		else {
			echo 'Failed to load ya jaloos el 6een';
		}
	}
}
