
//database name: reg_login_tut
//table name: users
//change default controller in 'routes.php' to 'login'
//change database in 'database.php' to reg_login_tut
//add "$autoload['libraries'] = array('database', 'session');" and "$autoload['helper'] = array('url', 'form');" in "autoload.php"
<?php

class Login extends CI_Controller {

	function index() {
		$data['main_content'] = 'login_form';
		$this->load->view('includes/template', $data);
	}

	function validate_credentials() {
		$this->load->model('membership_model');
		$query = $this->membership_model->validate();

		if ($query) {	//User's Credentials Are Validated
			$data = array(
				'username' => $this->input->post('username'),'is_logged_in' => true
			);

			$this->session->set_userdata($data);
			redirect('site/members_area');
		}
		else // Incorrect Username/Password
		{
			$this->index();
			redirect('site/error_area');
		}
	}
	function signup() {
		$data['main_content'] = 'signup_form';
		$this->load->view('includes/template', $data);
	}

	function create_member() {
		$this->load->library('form_validation');
		//Validation Rules

		$this->form_validation->set_rules('first_name', 'Name', 'trim|required');
		$this->form_validation->set_rules('middle_name', 'Middle Name', 'trim|required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('email', 'EMail Address', 'trim|required|valid_email');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|max_length[15]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
		$this->form_validation->set_rules('password_confirm', 'Password Confirmation', 'trim|required|matches[password]');

		if ($this->form_validation->run() == FALSE) //DIDN'T VALIDATE
		{
			$this->load->view('signup_form');
		}
		else {
			$this->load->model('membership_model');

			if ($query = $this->membership_model->create_member()) {
				$data['main_content'] = 'signup_successful';
				$this->load->view('includes/template', $data);
			}
			else {
				$this->load->view('signup_form');
			}
		}
	}
}