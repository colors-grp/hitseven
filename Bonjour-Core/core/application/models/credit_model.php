<?php
class credit_model extends CI_Model {
	function get_credit($fbid) {
		// Select user with facebook ID and put the record in 'query'
		$this->db->where('fb_id', $fbid);
		$this->db->select('credit');
		$query = $this->db->get('user');
		// Get and return user credit using the ID
		foreach ($query->result() as $row)
			$credit = $row->credit;
		return $credit;
	}
	function buy_credit($fbid, $credit) {
		// Select user with facebook ID and put the record in 'query'
		log_message('error', 'credit model: '. $credit);
		$this->db->where('fb_id', $fbid);
		$this->db->select('credit');
		$query = $this->db->get('user')->row();
		// Get and return user credit using the ID
		// Update database with new credit
		$old_credit = $query->credit;
		$credit += $old_credit;
		$query->credit = $credit;
		$this->db->where('fb_id', $fbid);
		$this->db->update('user', $query);
		// Khairy_25Mar integration revisit ... you removed this in the new code ...
		if (($this->db->affected_rows() > 0))
			return true;
		else
			return false;
	}
}