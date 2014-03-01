<?php
class Category_model extends CI_Model{
	/*
	 * Missing: check if category is in the valid time before returning it
	*/
	function get_category_interst_by_userID($user_id) {
		$this->db->select('*');
		$this->db->from('category');
		$this->db->join('user_category' ,'user_category.category_id = category.id');
		$this->db->where('user_id' , $user_id);
		$query = $this->db->get();
		if($query->num_rows() > 0)
			return $query;
		return FALSE;
	}

	/*
	 * Missing: check if category is in the valid time before returning it
	*/
	function get_all_category() {
		$query = $this->db->get('category');
		if($query->num_rows())
			return $query;
		return FALSE;
	}

	function get_category_name_by_id($cat_id) {
		$this->db->where('id' , $cat_id);
		$query = $this->db->get('category');
		if($query -> num_rows() > 0)
			return $query->row()->name;
		return  FALSE;
	}

	function insert_user_category($cat_id , $user_id) {
		$data = array(
				'user_id' => $user_id ,
				'category_id' => $cat_id
		);
		$this->db->insert('user_category', $data);
	}

	function update_user_score_category($cat_id , $user_id,$new_score) {
		$this->db->select('score,	num_of_cards');
		$this->db->where('category_id' , $cat_id);
		$this->db->where('user_id' , $user_id);
		$query = $this->db->get('user_category');
		
		$this->db->where('category_id' , $cat_id);
		$this->db->where('user_id' , $user_id);
		$res = $query->row();
		$new_score += $res->score;
		$new_num_of_cards = $res->num_of_cards + 1;
		$data = array('score' =>  $new_score , 'num_of_cards' => $new_num_of_cards);
		$this->db->update('user_category' , $data);
		return $new_score;
	}
}