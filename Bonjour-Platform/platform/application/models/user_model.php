<?php
class User_model extends CI_Model {
	function get_user_id($fb_id) {
		$this->db->select('id');
		$this->db->where('fb_id', $fb_id);
		$query = $this->db->get('user');
		if ($query->num_rows() > 0)
			return $query;
		return FALSE;
	}
}