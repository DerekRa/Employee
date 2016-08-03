<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {

		public function __construct(){
		parent::__construct();
		
		$this->load->helper(array('form','url','security'));
		$this->load->model('User_mod');
		$this->load->library(array('form_validation','session'));
	}

	public function index()
	{
		$title['titles'] = "Login Page";
		$username =  $this->input->post('username');
		$password =  $this->input->post('password');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean|min_length[5]|max_length[12]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|min_length[5]|max_length[250]');
        if ($this->form_validation->run() == FALSE)
        {
			$this->load->view('header',$title);
			$this->load->view('login');
			$this->load->view('footer');
		}else{
    		$check = $this->User_mod->login_check_cre($username,$password);
    		if ($check==TRUE) {
    			$result = $check[0]->id_user;
    			$data = $this->User_mod->get_userinfo($result);
				$this->session->set_userdata('isnow_logged_in',$data);
				$this->session->set_userdata('username',$username);
				$admin_check = $check[0]->admin_check;
				if ($admin_check==1) {
					redirect('DataAdminFunctioncont');
				} else {
					redirect('DataEmployeeFuncont');	
				}
    		}else{
    			$err['printerr']="Invalid Credentials";
    			$this->load->view('header',$title);
				$this->load->view('login',$err);
				$this->load->view('footer');
    		}
		}
	}

	function loginreg(){
		$title['titles'] = "Register Page";
		$this->load->view('header',$title);	
		$this->load->view('register/login_register/loginreg');	
		$this->load->view('footer');	
	}	

	function validate_logregister(){
		$this->form_validation->set_rules('firstname', 'Firstname', 'trim|required|xss_clean|min_length[2]');
		$this->form_validation->set_rules('lastname', 'Lastname', 'trim|required|xss_clean|min_length[2]');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean|min_length[5]|max_length[12]|is_unique[employee_user.username]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|min_length[5]|max_length[12]');
		$this->form_validation->set_rules('passwordconf', 'Password Confirmation', 'required|matches[password]');
        if ($this->form_validation->run() == FALSE)
        {
        	// echo "string";die;
        	$title['titles'] = "Register Page";
			$this->load->view('header',$title);
			$this->load->view('register/login_register/loginreg');
			$this->load->view('footer');	
		}else{
			$username=null;
			$password=null;
			$firstname=null;
			$lastname=null;
			$logreg=null;

			extract($_POST);

			$params['username'] = $username;
			$params['password'] = $password;
			$params['firstname'] = $firstname;
			$params['lastname'] = $lastname;
			if (isset($logreg)) {
				// echo "reach here";die;
				$this->User_mod->loginregupdate($params);
				$this->session->set_flashdata('message', 'Hello '.ucfirst($firstname).'! You have been Successfully Registered! You can now Log-In.');
				redirect('login');
			}
			
    		}
	}

}
