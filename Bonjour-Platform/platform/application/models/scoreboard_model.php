<?php
class Scoreboard_model extends CI_Model {
	function get_scoreboard($cat_id) {
		$this->db->where ( 'category_id', $cat_id );
		$this->db->order_by('score', 'desc');
		$query = $this->db->get ( 'user_category' );
		return $query;
	}
}