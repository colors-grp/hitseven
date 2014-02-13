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
		log_message('error', 'model: '.$credit);
// 		$this->db->where('id', $uid);
// 		$this->db->select('credit');
// 		$query = $this->db->get('user_credit');
// 		foreach ($query->result() as $row)
// 			$credit = $row->credit;
		return $credit;
	}
	function buy_credit($fbid, $credit) {
		// Select user with facebook ID and put the record in 'query'
		$this->db->where('fb_id', $fbid);
		$this->db->select('id');
		$query = $this->db->get('user');
		// Get and return user credit using the ID
		foreach ($query->result() as $row)
			$uid = $row->id;
		$this->db->where('id', $uid);
		$this->db->select('credit');
		$query = $this->db->get('user_credit')->row();
		$old_credit = $query->credit;
		// Update database with new credit
		$credit += $old_credit;
		$query->credit = $credit;
		$this->db->where('id', $uid);
		$this->db->update('user_credit', $query);
	}
}