<?php
class User_model extends CI_Model {
	function get_user_id($user_id) {
		$this->db->select('*');
		$this->db->where('id', $user_id);
		$query = $this->db->get('a3m_account');
		if ($query->num_rows() > 0)
			return $query->row();
		return FALSE;
	}
	function get_card_parameters($card_id) {
		$this->db->select('*');
		$this->db->where('id', $card_id);
		$query = $this->db->get('card');
		if ($query->num_rows() > 0)
			return $query->row();
		return FALSE;
	}
}