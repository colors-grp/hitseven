<?php
class Card_model extends CI_Model {
	//Get all cards in a certain category
	function get_cards_by_id($category_id) {
		$this->db->where('category_id', $category_id);
		$query = $this->db->get('card');
		if($query->num_rows() > 0)
			return $query;
		return FALSE;
	}
<<<<<<< HEAD

=======
	
>>>>>>> bc7448ccaf71025d10bc3767d24edd95ca50bc32
	//Given a user id and a category , returns cards that user owns in the category
	function get_user_cards_by_id($category_id , $user_id) {
		$this->db->select('*');
		$this->db->from('user_card');
		$this->db->where('user_card.category_id' , $category_id);
		$this->db->where('user_card.user_id' , $user_id);

		$this->db->join('card', 'user_card.card_id = card.id AND user_card.category_id = card.category_id');
		$query = $this->db->get();
		if($query->num_rows() > 0)
			return $query;
		return FALSE;
	}
<<<<<<< HEAD

=======
	
>>>>>>> bc7448ccaf71025d10bc3767d24edd95ca50bc32
	//check whether user owns the card
	function own_card($cat_id , $card_id ,$user_id ) {
		$this->db->where('category_id' , $cat_id);
		$this->db->where('card_id' , $card_id);
		$this->db->where('user_id' , $user_id);
		$query = $this->db->get('user_card');
		if($query->num_rows() > 0)
			return $query;
		return FALSE;
	}
<<<<<<< HEAD

=======
	
>>>>>>> bc7448ccaf71025d10bc3767d24edd95ca50bc32
	//Add card to user when card is bought
	function insert_user_card($category_id , $card_id , $user_id) {
		$data = array(
				'user_id' => $user_id ,
				'card_id' => $card_id ,
				'category_id' => $category_id
		);
		$this->db->insert('user_card', $data);
		
		// Insert new game for user
		$this->db->where('category_id', $category_id);
		$this->db->where('card_id', $card_id);
		$this->db->select('game_id');
		$query = $this->db->get('category_card_game');
		log_message('error', 'category_card_game');
		foreach ($query->result() as $row) {
			$game_id = $row->game_id;
			log_message('error', 'ele 1 ' . $game_id);
			$data = array(
					'user_id' => $user_id,
					'game_id' => $game_id,
					'game_best_score' => 0
			);
			$this->db->insert('user_game', $data);
		}
	}
}