<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_functions extends CI_Model {

	// [Return] a current time in a DATETIME form [Year-Month-Day Hour-Minute-Second]
	public function getCurrentTime(){
		// For Thailand Timezone [+5]
		//$hour = intval(date('H')) + 5;
		//$timeValue = date('Y-m-d'). " " . $hour . "-" .date('i-s');
		return date('Y-m-d H-i-s');
	}

	// [Update] a last activity in 'users' table
	public function updateLastActivityTime(){
		$data = array(
			'last_activity_time' => $this->getCurrentTime()
            );
		$this->db->where('username', $this->session->userdata('username'));
		$this->db->update('users', $data); 
	}

	// [Return] salt
	public function getRandomSalt(){
		return substr(md5(uniqid(rand(), true)), 0, 9);
	}
}

?>