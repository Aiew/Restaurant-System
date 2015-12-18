<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		//$this->login();
		$this->homepage();
	}

	public function login()
	{
		if ($this->session->userdata('is_logged_in')){
			redirect('dashboard');
		} else {
			$this->load->view('frontend/view_header');
			$this->load->view('frontend/view_login');
			$this->load->view('frontend/view_footer');
		}
	}

	public function homepage()
	{
		if ($this->session->userdata('is_logged_in')){
			redirect('dashboard');
		} else {
			$this->load->view('frontend/view_header');
			$this->load->view('frontend/view_home');
			$this->load->view('frontend/view_footer');
		}
	}

	public function register(){
		if ($this->session->userdata('is_logged_in')){
			redirect('dashboard');
		} else {
			$this->load->view('frontend/view_header');
			$this->load->view('frontend/view_register');
			$this->load->view('frontend/view_footer');
		}
	}

	public function logout() {
		$this->session->sess_destroy();
		redirect('home');
	}

	public function about(){
		$this->load->view('frontend/view_header');
		$this->load->view('frontend/view_about');
		$this->load->view('frontend/view_footer');
	}

	public function menu(){
		$this->load->view('frontend/view_header');
		$this->load->view('frontend/view_menu');
		$this->load->view('frontend/view_footer');
	}

	public function reserve(){
		if ($this->session->userdata('is_logged_in')){
			redirect('members');
		} else {
			$data['success'] = 0;
			$this->load->view('frontend/view_header');
			$this->load->view('frontend/view_reserve', $data);
			$this->load->view('frontend/view_footer');
		}
	}

	public function reserve_success(){
		$this->load->view('frontend/view_header');
		$this->load->view('frontend/view_reserve_success');
		$this->load->view('frontend/view_footer');
	}

	public function login_validation() {
		//var_dump($this->input->post('username'));
		$this->load->library('form_validation');
		// In required | is a extra options
		// callback_validate_credentials is call a function "validate_credentials"
		$this->form_validation->set_rules('username', 'Username', 'required|trim|callback_validate_credentials');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		// Ic condition, it required you to enter the correct input that you set_rules
		// from above, the command that check is run()
		if ($this->form_validation->run()){
			// Set session
			$this->load->model('model_users');
			$this->model_users->setSession();
			// Set logged in time
			$this->load->model('model_users');
			// For view a session component
			// var_dump($this->session->userdata('session_id'));
			redirect('dashboard');
		} else {
			$this->login();
		}
		// For debug, it will show a POST value
		// echo $this->input->post('password');
	}
	// Check User Info
	public function validate_credentials(){
		$this->load->model('model_users');
		if ($this->model_users->can_log_in()) {
			return true;
		} else {
			$this->form_validation->set_message('validate_credentials', 'Incorrect Username or Password');
			return false;
		}
	}


	public function register_validation() {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[USERS.EMAIL]');
		$this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[4]|max_length[15]|is_unique[USERS.USERNAME]');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]|max_length[30]');
		$this->form_validation->set_rules('repassword', 'Confirm Password', 'required|trim|matches[password]');
		$this->form_validation->set_rules('name', 'Name', 'required|min_length[2]|max_length[40]');
		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('phone', 'Phone Number', 'required|trim|numeric');

		// Change error message
		$this->form_validation->set_message('is_unique', '%s already exists.');

		if ($this->form_validation->run()) {

			// Add them to the temp_users db
			$this->load->model('model_users');

			$this->model_users->add_inactivate_user();

			$this->load->model('model_users');
			$this->model_users->setSession();
			redirect('dashboard');

		} else {
			// Register has Failed
			$this->register();
		}
	}


	public function reserve_validation() {
		//var_dump($this->input->post());
		//break;
		$this->load->library('form_validation');

		$this->form_validation->set_rules('input_date', 'Date', 'required|trim');
		$this->form_validation->set_rules('input_time', 'Time', 'required|trim');
		$this->form_validation->set_rules('input_pers', 'Pers', 'required|trim|numeric');
		$this->form_validation->set_rules('input_name', 'Guest Name', 'required|trim|alpha');
		$this->form_validation->set_rules('input_tel', 'Telephone', 'required|trim|numeric');
		$this->form_validation->set_rules('input_email', 'Email', 'required|trim|valid_email');
		// Ic condition, it required you to enter the correct input that you set_rules
		// from above, the command that check is run()


		if ($this->form_validation->run()){
			// Set session
			$this->load->model('model_users');
			$this->model_users->insert_reserve();
			$data['success'] = 1;
			$this->load->view('frontend/view_header');
			$this->load->view('frontend/view_reserve', $data);
			$this->load->view('frontend/view_footer');
		} else {
			$this->reserve();
		}
		// For debug, it will show a POST value
		// echo $this->input->post('password');
	}


}
