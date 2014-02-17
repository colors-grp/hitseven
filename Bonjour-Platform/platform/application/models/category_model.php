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
		if($query->num_rows())
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
}