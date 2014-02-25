<?php
class Scoreboard_model extends CI_Model {
	function get_all($cat_id) {
		$this->db->select('*');
		$this->db->from('user_category');
		$this->db->where('category_id', $cat_id);
		$this->db->join('user', 'user.id = user_category.user_id');
		$this->db->order_by('score', 'desc');
		$query = $this->db->get();
		return $query;
	}
	function get_top($cat_id) {
		$this->db->select('*');
		$this->db->from('category_rank');
		$this->db->where('category_id', $cat_id);
		$this->db->join('rank', 'rank.id = category_rank.rank_id');
		$query = $this->db->get();
		return $query;
	}
	function get_scoreboard($cat_id) {
		$query['all'] = $this->get_all($cat_id);
		$query['top'] = $this->get_top($cat_id);
		return $query;
	}
}