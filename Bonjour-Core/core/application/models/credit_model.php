<?php
class credit_model extends CI_Model {
	function get_credit($user_id) {
		// Select user with facebook ID and put the record in 'query'
		$this->db->where('id', $user_id);
		$this->db->select('credit');
		$query = $this->db->get('a3m_account');
		// Get and return user credit using the ID
		foreach ($query->result() as $row)
			$credit = $row->credit;
		return $credit;
	}
	function buy_credit($user_id, $credit) {
		// Select user with facebook ID and put the record in 'query'
		log_message('error', 'credit model: '. $credit);
		$this->db->where('id', $user_id);
		$this->db->select('credit');
		$query = $this->db->get('a3m_account')->row();
		// Get and return user credit using the ID
		// Update database with new credit
		$old_credit = $query->credit;
		$credit += $old_credit;
		$query->credit = $credit;
		$this->db->where('id', $user_id);
		$this->db->update('a3m_account', $query);
		// Khairy_25Mar integration revisit ... you removed this in the new code ...
		if (($this->db->affected_rows() > 0))
			return true;
		else
			return false;
	}
}