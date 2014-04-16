<?php
class Scoreboard_model extends CI_Model {
	//Get all users in a certain category to be displayed in the scoreboard
	function get_all($cat_id) {
		$this->db->select('*');
		$this->db->from('user_category');
		$this->db->where('category_id', $cat_id);
		$this->db->join('a3m_account', 'a3m_account.id = user_category.user_id');
		$this->db->order_by('score', 'desc');
		$query = $this->db->get();
		if ($query->num_rows() > 0)
			return $query;
		return FALSE;
	}

	//Get top users in a certain category to be displayed in the scoreboard
	function get_top($cat_id) {
		$this->db->select('*');
		$this->db->from('category_rank');
		$this->db->where('category_id', $cat_id);
		$this->db->join('rank', 'rank.id = category_rank.rank_id');
		$query = $this->db->get();
		if ($query->num_rows() > 0)
			return $query;
		return FALSE;
	}

	//returns top users and all users in a certain category
	function get_scoreboard($cat_id) {
		$query['all'] = $this->get_all($cat_id);
		$query['top'] = $this->get_top($cat_id);
		return $query;
	}
	function get_home_page_scoreboard() {
		$res = array();
		for ($cat_id = 1; $cat_id <= 7; $cat_id ++) {
			$this->db->select('*');
			$this->db->where('id', $cat_id);
			$cat_name = $this->db->get('category')->row()->name;
			$query = $this->get_all($cat_id);
			$j = 0;
			$res[$cat_id - 1]['cat_name'] = $cat_name;
			$res[$cat_id - 1]['data'] = array();
			if ($query == FALSE) {
				continue;
			}
			foreach ($query->result() as $row) {
				$res[$cat_id - 1]['data'][$j] = $row;
				$j ++;
				if ($j == 3)
					break;
			}
			
		}
		return $res;
	}
	function get_sorted_cats() {
		$this->db->order_by('rank', 'asc');
		$query = $this->db->get('category');
		if ($query->num_rows() > 0)
			return $query;
		return FALSE;
	}
}