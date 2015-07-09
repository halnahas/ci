<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
	public function index()
	{
		$this->login();
	}

	public function main_page()
	{
		if ($this->session->userdata('logged_in'))
			echo "You are logged in and you may use this lovely page";
		else {
			redirect('user/login');
		}
	}

	public function login()
	{
		
		$this->form_validation->set_rules('username', 'Username', 'required|trim|max_length[50]|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|max_length[50]|xss_clean');

		if ($this->form_validation->run() == FALSE)
			$this->load->view("view_login");
		else {
			// process their input and login the user
			extract($_POST);

			$user_id=$this->user_model->check_login($username,$password);
			

			if (!$user_id) {
				//failed error
				$this->session->set_flashdata('login_error',TRUE);
				redirect('user/login');

			}
			else {
				//logged in
				$login_data=array('logged_in'=>TRUE, 'user_id'=>$user_id);
				$this->session->set_userdata($login_data);
				redirect('user/main_page');

			}
		}
	}


	public function logout()
	{
		$this->session->set_userdata('logged_in', FALSE);

		$this->session->sess_destroy();
	}

	public function register()
	{
		$this->form_validation->set_rules('reg_username', 'Username', 'required|trim|alpha_numeric|min_length[6]|max_length[50]|xss_clean|strtolower|callback_check_new_username');
		$this->form_validation->set_rules('reg_name', 'Name', 'trim|min_length[6]|max_length[50]|xss_clean');
		$this->form_validation->set_rules('reg_email', 'Email Address', 'trim|min_length[6]|max_length[50]|valid_email|xss_clean|callback_check_new_email');
		$this->form_validation->set_rules('reg_password', 'Password', 'required|trim|min_length[6]|max_length[50]|xss_clean');
		$this->form_validation->set_rules('reg_conf_password', 'Password Confirmation', 'required|trim|min_length[6]|max_length[50]|matches[reg_password]|xss_clean');

		if ($this->form_validation->run() == FALSE)
			$this->load->view('view_register');
		else {
			// we are good. we will process the form
			extract($_POST);
			$this->user_model->register_user($reg_username, $reg_password, $reg_name, $reg_email);

			// Send activation email		
			$this->load->library('email');
            $this->email->from('doe9496@gmail.com', 'al');
            $this->email->to($reg_email);
            $this->email->subject('Registration Confirmation');
            $this->load->helper('string');
            $activation_code = random_string('alnum', 10);
            $this->email->message('Click the link below to activate your account' . anchor('http://localhost/codetwo/index.php/user/confirmation_activation/' . $activation_code,'Confirmation Register'));
            $this->email->send();
            
            echo "Activation email has been sent to $reg_email<br>";
            echo "You have successfully registered!";
		}
	}

	function check_new_username($reg_username)
	{
		$this->form_validation->set_message('check_new_username','This %s already exists. Choose a different Username!');
		if ($this->user_model->check_exists_username($reg_username))
			return false;
		else
			return true;
	}	

	function check_new_email($reg_email)
	{
		$this->form_validation->set_message('check_new_email','This %s already exists. Choose a different Email Address!');
		if ($this->user_model->check_exists_email($reg_email))
			return false;
		else
			return true;
	}	
}

?>

