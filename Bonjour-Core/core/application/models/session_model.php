<?php
class session_model extends CI_Model {
	function get_sessiondata($sessionid) {
		// Select user with facebook ID and put the record in 'query'
		$this->db->where('session_id', $sessionid);
		$this->db->select('user_data');
		$query = $this->db->get('ci_sessions');
		// Get and return user credit using the ID
		foreach ($query->result() as $row)
			$user_data = $row->user_data;
		return $user_data;
	}
	
	function save_sessiondata()
	{
		
	}
}