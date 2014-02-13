<?php
class Card_model extends CI_Model {
	
	function get_cards_by_id($category_id) {
		$this->db->where('category_id' , $category_id);
		$query = $this->db->get('card');		
		if($query->num_rows() > 0)
			return $query;
		return FALSE;
	}
}