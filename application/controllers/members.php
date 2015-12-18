<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Members extends CI_Controller {

	public function index()
	{
		if ($this->session->userdata('is_logged_in')){
			//var_dump($this->session->all_userdata());
			if ($this->session->userdata('is_admin'))
				redirect('dashboard');
			else {

				$this->db->where('ID', $this->session->userdata('id'));
				$fetch_user = $this->db->get('USERS');


				$data = array(
									'input_name'  => $fetch_user->row()->NAME,
									'input_email' => $fetch_user->row()->EMAIL,
									'input_address'   => $fetch_user->row()->ADDRESS,
									'input_telephone' => $fetch_user->row()->PHONE,
									'point' => $fetch_user->row()->POINT
								);

				$data['reserve_success'] = 0;
        $data['update_success'] = 0;
				$this->load->view('frontend/view_header');
				$this->load->view('backend/view_members', $data);
				$this->load->view('frontend/view_footer');
			}
		} else {
			$this->load->view('frontend/view_login');
		}
	}


	public function update_validation() {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('input_name', 'Name', 'required|min_length[2]|max_length[40]');
		$this->form_validation->set_rules('input_email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('input_address', 'Address', '');
		$this->form_validation->set_rules('input_telephone', 'Phone Number', 'trim|numeric');


		if ($this->form_validation->run()) {

			$data = array(
				'NAME' => $this->input->post('input_name'),
				'EMAIL' => $this->input->post('input_email'),
				'ADDRESS' => $this->input->post('input_address'),
				'PHONE' => $this->input->post('input_telephone')
			);
			$this->db->where('ID', $this->session->userdata('id'));
			$this->db->update('USERS', $data);

			//redirect('dashboard');

			$this->db->where('ID', $this->session->userdata('id'));
			$fetch_user = $this->db->get('USERS');


			$data = array(
								'input_name'  => $fetch_user->row()->NAME,
								'input_email' => $fetch_user->row()->EMAIL,
								'input_address'   => $fetch_user->row()->ADDRESS,
								'input_telephone' => $fetch_user->row()->PHONE,
								'point' => $fetch_user->row()->POINT
							);

			$data['reserve_success'] = 0;
			$data['update_success'] = 1;
			$this->load->view('frontend/view_header');
			$this->load->view('backend/view_members', $data);
			$this->load->view('frontend/view_footer');

		} else {
			$this->index();
		}
	}

	public function reserve_validation() {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('input_date', 'Date', 'required|trim');
		$this->form_validation->set_rules('input_time', 'Time', 'required|trim');
		$this->form_validation->set_rules('input_pers', 'Pers', 'required|trim|numeric');
		$this->form_validation->set_rules('input_seat_no', 'Seat No', 'required|trim|numeric');

		// Change error message
		$this->form_validation->set_message('is_unique', '%s already exists.');

		if ($this->form_validation->run()) {



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

			$this->db->where('ID', $this->session->userdata('id'));
			$user = $this->db->get('USERS');
			$data = array(
				'R_ID' => $query->row()->R_ID + 1,
				'ARR_TIME' => $this->input->post('input_time'),
				'ARR_DATE' => $new_date,
				'TABLE_NO' => $this->input->post('input_seat_no'),
				'SEAT' => $this->input->post('input_pers'),
				'CUS_NO' => $this->session->userdata('id'),
				'CNAME' => $user->row()->NAME,
				'CTELE' => $user->row()->PHONE,
				'CEMAIL' => $user->row()->EMAIL
				);
			$query = $this->db->insert('RESERVATIONS', $data);



			$this->db->where('ID', $this->session->userdata('id'));
			$fetch_user = $this->db->get('USERS');


			$data = array(
								'input_name'  => $fetch_user->row()->NAME,
								'input_email' => $fetch_user->row()->EMAIL,
								'input_address'   => $fetch_user->row()->ADDRESS,
								'input_telephone' => $fetch_user->row()->PHONE,
								'point' => $fetch_user->row()->POINT
							);


			$data['update_success'] = 0;
			$data['reserve_success'] = 1;
			$this->load->view('frontend/view_header');
			$this->load->view('backend/view_members', $data);
			$this->load->view('frontend/view_footer');

		} else {
			$this->index();
		}
	}


}
