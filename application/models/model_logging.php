<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_logging extends CI_Model {

	public function updateLog($type, $detail){
		// Enable or Disable can be set in 'configuration' table, in 'user_logging'
		$this->db->where('name', 'user_logging');
		$fetch_config = $this->db->get('configuration');
		if ($fetch_config->row()->value) {
			$raw_data = array(
				'owner_id'	=> $this->session->userdata('id'),
				'action'	=> $type,
				'detail'	=> $detail,
				'time'		=> time()
				);
			$this->db->insert('user_activity', $raw_data);
		}
		
	}
}