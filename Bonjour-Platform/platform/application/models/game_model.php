<?php
class Game_model extends CI_Model{
	// Returns a certain card's games given category and card IDs
	function get_games($cat_id, $card_id) {
		$this->db->select('*');
		$this->db->from('category_card_game');
		$this->db->where('category_id', $cat_id);
		$this->db->where('card_id', $card_id);
		$this->db->join('game' ,'game.game_id = category_card_game.game_id');
		$query = $this->db->get();
		if ($query->num_rows() > 0)
			return $query;
		return FALSE;
	}
	// Update user total score
	function update_total_score($score) {
		$category_id = $_SESSION['current_category_id'];
		$user_id = $_SESSION['user_id'];
		$this->db->where('user_id', $user_id);
		$this->db->where('category_id', $category_id);
		$query = $this->db->get('user_category')->row();
		$total_score = $score + $query->score;
		$data = array('score' =>  ($total_score));
		$this->db->where('user_id', $user_id);
		$this->db->where('category_id', $category_id);
		$this->db->update('user_category', $data);
		return $total_score;
	}
	// Update best score for a certain user in a certain game
	function update_game_score($game_id, $score) {
		$user_id = $_SESSION['user_id'];
		$this->db->where('user_id', $user_id);
		$this->db->where('game_id', $game_id);
		$data = array('game_best_score' =>  $score);
		$this->db->where('user_id', $user_id);
		$this->db->where('game_id', $game_id);
		$this->db->update('user_game', $data);
	}
	function get_user_score($game_id, $score) {
		$score = intval($score);
		$user_id = $_SESSION['user_id'];
		$this->db->where('user_id', $user_id);
		$this->db->where('game_id', $game_id);
		$query = $this->db->get('user_game');
		if ($query->num_rows() > 0)
			return $query;
		return FALSE;
	}
	function add_mcq_question($question) {
		$this->db->insert('question', $question);
	}
	// Get question given certain category and card IDs
	function get_questions($category_id, $card_id) {
		$this->db->select('*');
		$this->db->from('game_question');
		$this->db->where('category_id', $category_id);
		$this->db->where('card_id', $card_id);
		$this->db->join('question' ,'question.id = game_question.question_id');
		$query = $this->db->get();
		if ($query->num_rows() > 0)
			return $query;
		return FALSE;
	}
}