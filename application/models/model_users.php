<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_users extends CI_Model {

	/**
	*** Login Functions [Start]
	**/
	// [Check] email and password is match?
	public function can_log_in() {
		// Mean where is username is equal to $this....
		//var_dump($this->input->post('password')."-".sha1($this->input->post('password')));
		//break;
		$this->db->where('USERNAME', $this->input->post('username'));
		$fetch_user = $this->db->get('USERS');
		//var_dump($fetch_user->row()->PASSWORD);
		//break;
		// Check found user? first

		if ($fetch_user->row()->PASSWORD == sha1($this->input->post('password'))){
			//$this->db->where('PASSWORD', sha1($this->input->post('password')));
			//$query = $this->db->get('USERS');
			//if ($query->num_rows() == 1) return true;
			//else return false;
			return true;
		} else return false;
	}

	// Create a session
	public function setSession(){
		// Set session from users table
		$this->db->where('USERNAME', $this->input->post('username'));
		$fetch_user = $this->db->get('USERS');
		$data = array(
			'id' => $fetch_user->row()->ID,
			'username' => $this->input->post('username'),
			'name' => $fetch_user->row()->NAME,
			'is_logged_in' => 1,
			'is_admin' => $fetch_user->row()->IS_ADMIN
			);
		$this->session->set_userdata($data);

	}
	/**
	*** Login Functions [End]
	**/


	/**
	*** Register Functions [Start]
	**/
	// [Insert] user after signup [inactivate]
	public function add_inactivate_user() {

		$this->db->select_max('ID');
		$query = $this->db->get('USERS');


		$this->load->model('model_functions');
		$data = array(
			'ID' => $query->row()->ID + 1,
			'EMAIL' => $this->input->post('email'),
			'USERNAME' => $this->input->post('username'),
			'PASSWORD' => sha1($this->input->post('password')),
			'ADDRESS' => $this->input->post('address'),
			'NAME' => $this->input->post('name'),
			'IS_ADMIN' => 0,
			'POINT' => 0,
			'PHONE' => $this->input->post('phone')
			);
		$query = $this->db->insert('USERS', $data);
		if ($query) return true;
		else return false;
	}


	/**
	*** Register Functions [End]
	**/


	/**
	*** Reset Password Functions [Begin]
	**/
	// [Check] is email exists
	public function is_email_exists(){
		$this->db->where('email', $this->input->post('email'));
		$query = $this->db->get('users');
		if ($query->num_rows() == 1) return true;
		else return false;
	}
	public function is_reset_password_token_valid($key){
		$this->db->where('lost_password_token', $key);
		$query = $this->db->get('users');

		if ($query->num_rows() == 1) return true;
		else return false;
	}
	public function reseted_password($token, $newPW, $salt){
		$this->load->model('model_functions');

		$data = array(
			'password' => $newPW,
			'salt' => $salt,
			'lost_password_token' => $this->model_functions->getRandomSalt()
			);
		$this->db->where('lost_password_token', $token);
		$query = $this->db->get('users');
		// In condition, mean if that found a user?
		if ($query->num_rows() == 1) {
			$this->db->where('lost_password_token', $token);
			$this->db->update('users', $data);
			return true;
		}
		else return false;
	}
	/**
	*** Reset Password Fuctions [End]
	**/





	/**
	*** Reserve Fuctions [Begin]
	**/
	public function insert_reserve(){
		$this->db->select_max('R_ID');
		$query = $this->db->get('RESERVATIONS');

		$month = substr($this->input->post('input_date'), 5, 2);
		$day = substr($this->input->post('input_date'), 8, 2);
		$year = substr($this->input->post('input_date'), 0, 4);
		if ($month == "01") $month_text = "JAN";
		else if ($month == "02") $month_text = "FEB";
		else if ($month == "03") $month_text = "MAR";
		else if ($month == "04") $month_text = "APR";
		else if ($month == "05") $month_text = "MAY";
		else if ($month == "06") $month_text = "JUN";
		else if ($month == "07") $month_text = "JUL";
		else if ($month == "08") $month_text = "AUG";
		else if ($month == "09") $month_text = "SEP";
		else if ($month == "10") $month_text = "OCT";
		else if ($month == "11") $month_text = "NOV";
		else if ($month == "12") $month_text = "DEC";
		$new_date = $day. "/" .$month_text. "/" .$year;
		//$new_date = "30-OCT-2015";
		//var_dump($new_date);

		$data = array(
			'R_ID' => $query->row()->R_ID + 1,
			'ARR_TIME' => $this->input->post('input_time'),
			'ARR_DATE' => $new_date,
			'TABLE_NO' => $this->input->post('input_seat_no'),
			'SEAT' => $this->input->post('input_pers'),
			'CUS_NO' => NULL,
			'CNAME' => $this->input->post('input_name'),
			'CTELE' => $this->input->post('input_tel'),
			'CEMAIL' => $this->input->post('input_email')
			);
		$query = $this->db->insert('RESERVATIONS', $data);
		if ($query) return true;
		else return false;
	}
	/**
	*** Reserve Fuctions [End]
	**/

}

?>
