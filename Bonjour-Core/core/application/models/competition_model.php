<?php
class Competition_model extends CI_Model {
	//add new competitions to users
	function set_competition($user_id , $competition_id) {
		$tmp = array('user_id' =>  $user_id,'competition_id' => $competition_id);
		$this->db->insert('user_competition', $tmp);
	}
	
	//get all competitions of a certain user using his hit7 id
	function get_competition_by_user_id($id=NULL) {
		$this->db->where('user_id' , $id);
		$query = $this->db->get('user_competitions');
		if($query -> num_rows() > 0)
		return $query->result();
		return FALSE;
	}
	
	//get all competitions in hit7
	function get_all_competition() {
		$query = $this->db->get('competitions');
		if($query -> num_rows() > 0)
		return $query;
		return FALSE;
	}
}