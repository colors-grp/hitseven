<?php
class Card_model extends CI_Model {	
	function get_cards_by_id($category_id) {
		$this->db->where('category_id' , $category_id);
		$query = $this->db->get('card');		
		if($query->num_rows() > 0)
			return $query;
		return FALSE;
	}
	
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
	function get_card_media($card_id , $category_id) {
		$this->db->select('*');
		$this->db->from('card');
		$this->db->where('card.category_id' , $category_id);
		$this->db->where('card.id' , $card_id);
		$this->db->join('media' , 'media.card_id = card.id AND media.category_id = card.category_id');
		$query = $this->db->get();
		if($query->num_rows() > 0)
			return $query;
		return FALSE;
	}
	function insert_user_card($category_id , $card_id , $user_id) {
		$data = array(
				'user_id' => $user_id ,
				'card_id' => $card_id ,
				'category_id' => $category_id
		);
		$this->db->insert('user_card', $data);
	}
}