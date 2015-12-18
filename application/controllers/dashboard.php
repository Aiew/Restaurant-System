<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		if ($this->session->userdata('is_logged_in')){
			//var_dump($this->session->all_userdata());
			if ($this->session->userdata('is_admin')) {
				$data['order_success'] = 0;
				$this->load->view('backend/view_header');
				$this->load->view('backend/view_dashboard', $data);
				$this->load->view('backend/view_footer');
			}
			else {
				redirect('members');
			}
		} else {
			$this->load->view('frontend/view_register');
		}
	}

	public function employeeAdd(){
		$data['add_success'] = 0;
		$this->load->view('backend/view_header');
		$this->load->view('backend/view_employee_add', $data);
		$this->load->view('backend/view_footer');
	}

	public function employeeList(){
		$this->load->view('backend/view_header');
		$this->load->view('backend/view_employee_list');
		$this->load->view('backend/view_footer');
	}

	public function memberAdd(){
		$this->load->view('backend/view_header');
		$this->load->view('backend/view_member_add');
		$this->load->view('backend/view_footer');
	}

	public function memberList(){
		$this->load->view('backend/view_header');
		$this->load->view('backend/view_member_list');
		$this->load->view('backend/view_footer');
	}

	public function profile(){
		$this->load->view('backend/view_header');
		$this->load->view('backend/view_profile');
		$this->load->view('backend/view_footer');
	}

	public function profile_edit(){
		$this->load->view('backend/view_header');
		$this->load->view('backend/view_profile_edit');
		$this->load->view('backend/view_footer');
	}

	public function reservation(){
		$this->load->view('backend/view_header');
		$this->load->view('backend/view_reservation');
		$this->load->view('backend/view_footer');
	}

	public function stock_add(){
		$data['add_success'] = 0;
		$this->load->view('backend/view_header');
		$this->load->view('backend/view_stock_add', $data);
		$this->load->view('backend/view_footer');
	}

	public function stock_list(){
		$this->load->view('backend/view_header');
		$this->load->view('backend/view_stock_list');
		$this->load->view('backend/view_footer');
	}

	public function food_list(){
		$this->load->view('backend/view_header');
		$this->load->view('backend/view_food_list');
		$this->load->view('backend/view_footer');
	}

	public function receipt_list(){
		$this->load->view('backend/view_header');
		$this->load->view('backend/view_receipts_list');
		$this->load->view('backend/view_footer');
	}public function serve_list(){
		$this->load->view('backend/view_header');
		$this->load->view('backend/view_serve_list');
		$this->load->view('backend/view_footer');
	}

	public function table(){
		$this->load->view('backend/view_header');
		$this->load->view('backend/view_table');
		$this->load->view('backend/view_footer');
	}

	public function checkIn($table){
		$data = array(
			'STATUS' => 1
		);
		$this->db->where('T_ID', $table);
		$this->db->update('TABLES', $data);
		$this->table();
	}

	public function checkInMember($table){
		$data = array(
			'STATUS' => 1,
			'E_NO' => $this->input->post('cus_id')
		);
		$this->db->where('T_ID', $table);
		$this->db->update('TABLES', $data);
		$this->table();
	}

	public function checkOut($table){


				$this->db->select_max('B_ID');
				$query = $this->db->get('RECEIPTS');

				$this->db->where('TABLE_NUM',$table);
				$query2 = $this->db->get('SERVE_TO');
				$total = 0;
				foreach($query2->result() as $row)
				{
					$this ->db->where('F_ID',$row->FOOD_NO);
					$query3 = $this->db->get('FOODS');
					$total += $query3->row()->PRICE * $row->QUAN;
				}
				$data2 = array(
					'B_ID' => $query->row()->B_ID+1,
					'TOTAL' => $total,
					'E_NUM' => 69,
					'DATES'=> date('d-M-y')
					);
				$this->db->insert('RECEIPTS',$data2);
				

				$this->db->where('T_ID', $table);
				$t = $this->db->get('TABLES');
				$cus = $t->row()->E_NO;

				$this->db->where('ID', $cus );
				$c = $this->db->get('USERS');

				$up = array(
					'POINT' => $c->row()->POINT + ($data2['TOTAL']/100)
				);
				$this->db->where('ID', $cus );
				$this->db->update('USERS', $up);



				$this->db->where('TABLE_NUM', $table);
				$this->db->delete('SERVE_TO');


		$data = array(
			'STATUS' => 0
		);
		$this->db->where('T_ID', $table);
		$this->db->update('TABLES', $data);
		$this->table();
	}

	public function add_employee_validation() {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('input_name', 'Name', 'required|trim|is_unique[EMPLOYEES.E_NAME]');
		$this->form_validation->set_rules('input_salary', 'Salary', 'required|trim|numeric');
		$this->form_validation->set_rules('input_position', 'Position', 'required|trim');
		$this->form_validation->set_rules('input_hire_date', 'Hire Date', 'required|trim');

		// Change error message
		$this->form_validation->set_message('is_unique', '%s already exists.');

		if ($this->form_validation->run()) {



			$this->db->select_max('E_ID');
			$query = $this->db->get('EMPLOYEES');

			$month = substr($this->input->post('input_hire_date'), 5, 2);
			$day = substr($this->input->post('input_hire_date'), 8, 2);
			$year = substr($this->input->post('input_hire_date'), 0, 4);
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
			else $month_text = "DEC";
			$new_date = $day. "/" .$month_text. "/" .$year;
			//$new_date = "30-OCT-2015";
			//var_dump($new_date);

			$data = array(
				'E_ID' => $query->row()->E_ID + 1,
				'E_NAME' => $this->input->post('input_name'),
				'SALARY' => $this->input->post('input_salary'),
				'JOB' => $this->input->post('input_position'),
				'HIRE_DATE' => $new_date
				);
			$query = $this->db->insert('EMPLOYEES', $data);



			$this->db->where('ID', $this->session->userdata('id'));
			$fetch_user = $this->db->get('USERS');


			$data = array(
								'input_name'  => $fetch_user->row()->NAME,
								'input_email' => $fetch_user->row()->EMAIL,
								'input_address'   => $fetch_user->row()->ADDRESS,
								'input_telephone' => $fetch_user->row()->PHONE,
								'point' => $fetch_user->row()->POINT
							);


			$data['add_success'] = 1;
			$this->load->view('backend/view_header');
			$this->load->view('backend/view_employee_add', $data);
			$this->load->view('backend/view_footer');

		} else {
			$this->employeeAdd();
		}
	}


	public function add_ingredient_validation() {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('input_name', 'Name', 'required|trim|is_unique[INGREDIENT.I_NAME]');
		$this->form_validation->set_rules('input_expire_date', 'Expire date', 'required|trim');
		$this->form_validation->set_rules('input_quatity', 'Quatity', 'required|trim|numeric');


		if ($this->form_validation->run()) {



			$this->db->select_max('I_ID');
			$query = $this->db->get('INGREDIENT');

			$month = substr($this->input->post('input_expire_date'), 5, 2);
			$day = substr($this->input->post('input_expire_date'), 8, 2);
			$year = substr($this->input->post('input_expire_date'), 0, 4);
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
			else $month_text = "DEC";
			$new_date = $day. "/" .$month_text. "/" .$year;
			//$new_date = "30-OCT-2015";
			//var_dump($new_date);

			$data = array(
				'I_ID' => $query->row()->I_ID + 1,
				'I_NAME' => $this->input->post('input_name'),
				'QUANTITY' => $this->input->post('input_quatity'),
				'EXP_DATE' => $new_date
				);
			$query = $this->db->insert('INGREDIENT', $data);


			$data['add_success'] = 1;
			$this->load->view('backend/view_header');
			$this->load->view('backend/view_stock_add', $data);
			$this->load->view('backend/view_footer');

		} else {
			$this->stock_add();
		}
	}


	public function ordering_validation(){

		$this->load->library('form_validation');
		$this->form_validation->set_rules('table_ID', 'Table No', 'required|trim|numeric|callback_check_table_id');
		$this->form_validation->set_rules('food_ID', 'Food No', 'required|trim|numeric|callback_check_food_id');
		$this->form_validation->set_rules('quantity', 'Quantity', 'required|trim|numeric');


		if ($this->form_validation->run()) {



			/*$data = array(
				'I_ID' => $query->row()->I_ID + 1,
				'I_NAME' => $this->input->post('input_name'),
				'QUANTITY' => $this->input->post('input_quatity'),
				'EXP_DATE' => $new_date
				);
			$query = $this->db->insert('INGREDIENT', $data);*/

			//var_dump($this->input->post());
			$table = (int)$this->input->post('tableID');
			$data = array(
				'TABLE_NUM' => $this->input->post('table_ID'),
				'FOOD_NO' => $this->input->post('food_ID'),
				'QUAN' => $this->input->post('quantity')
				);
			$query = $this->db->insert('SERVE_TO', $data);


			$data['order_success'] = 1;
			$this->load->view('backend/view_header');
			$this->load->view('backend/view_dashboard', $data);
			$this->load->view('backend/view_footer');

		} else {
			$this->index();
		}


	}
	public function check_table_id(){
		$this->db->where('T_ID', $this->input->post('table_ID'));
		$fetch = $this->db->get('TABLES');
		$maxTable = $this->db->count_all('TABLES');
		if ($this->input->post('table_ID') > $maxTable) {
			$this->form_validation->set_message('check_table_id', 'No Table!');
			return false;
		} else {
			if ($fetch->row()->STATUS){
				return true;
			} else {
				$this->form_validation->set_message('check_table_id', 'Nobody at the table!');
				return false;
			}
		}
	}
	public function check_food_id(){
		$this->db->where('F_ID', $this->input->post('food_ID'));
		$fetch = $this->db->get('FOODS');
		if ($fetch->num_rows() == 1){
			return true;
		} else {
			$this->form_validation->set_message('check_food_id', 'Wrong food ID!');
			return false;
		}
	}


}
