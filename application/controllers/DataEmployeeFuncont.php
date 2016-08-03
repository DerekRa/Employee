<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataEmployeeFuncont extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->helper(array('form','url','security'));
		$this->load->model('User_mod');
		$this->load->library(array('form_validation','session','pagination'));
	}

	public function index()
	{		
				if($this->session->userdata('isnow_logged_in')==FALSE){
					$this->load->view('login');
				}	else {
				    	 $array['datainfo']=$this->session->userdata('isnow_logged_in');
				    	 $title['titles'] = "Register Page";
				    	 $this->load->view('header',$title);
				    	 $this->load->view('sidebar',$array);
				    	 $this->load->view('profile/welcome',$array);			
				    	 }
	}
	// employee table 
	function employee_table()
	{		
				if($this->session->userdata('isnow_logged_in')==FALSE){
					redirect('login');
				}	else {
				    	$array['datainfo']=$this->session->userdata('isnow_logged_in');
				    	$title['titles'] = "Employee Table Page";
				    	//pagination
				    	$config["base_url"] = base_url() . "dataadminfunctioncont/employee_table";
						$config["total_rows"] = $this->User_mod->countallemployees();
						$config["per_page"] = 15;
						$config["uri_segment"] = 3;
				        $config['full_tag_open'] = '<ul class="pagination">';
				        $config['full_tag_close'] = '</ul>';
				        $config['first_link'] = false;
				        $config['last_link'] = false;
				        $config['first_tag_open'] = '<li>';
				        $config['first_tag_close'] = '</li>';
				        $config['prev_link'] = '&laquo';
				        $config['prev_tag_open'] = '<li class="prev">';
				        $config['prev_tag_close'] = '</li>';
				        $config['next_link'] = '&raquo';
				        $config['next_tag_open'] = '<li>';
				        $config['next_tag_close'] = '</li>';
				        $config['last_tag_open'] = '<li>';
				        $config['last_tag_close'] = '</li>';
				        $config['cur_tag_open'] = '<li class="active"><a href="#">';
				        $config['cur_tag_close'] = '</a></li>';
				        $config['num_tag_open'] = '<li>';
				        $config['num_tag_close'] = '</li>';
						$choice = $config["total_rows"];
						$config["num_links"] = round($choice);
						$this->pagination->initialize($config);
						$page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;
						$array['empltables'] = $this->User_mod->getallemployees($config["per_page"], $page);
						$array["links"] = $this->pagination->create_links();
						//end of pagination
				    	$this->load->view('header',$title);
				    	$this->load->view('sidebar',$array);
				    	$this->load->view('table/employeestable',$array);	
				    	$this->load->view('footer');		
				    	}
	}		
	//show profile
	function profile()
	{
		if($this->session->userdata('isnow_logged_in')==FALSE){
					redirect('login');
				}	else {
						$title['titles'] = "Employee Profile Page";
						$array['datainfo']=$this->session->userdata('isnow_logged_in');
						$this->load->view('header',$title);
					    $this->load->view('sidebar',$array);
				    	$this->load->view('profile/employee_prof/profile',$array);	
				    	$this->load->view('footer');	
			    }
	}
	//show edit profile
	function profile_edit()
	{
		if($this->session->userdata('isnow_logged_in')==FALSE){
					redirect('login');
				}	else {
						$username=null;	$password=null;	$id_user=null;$id_employee=null;$submit=null;$firstname=null;$lastname=null;$birthday=null;	$address=null;$salary=null;	$email=null;$submit=null;

						extract($_POST);

						$params['id_employee'] = $id_employee;
						$params['firstname'] = $firstname;
						$params['lastname'] = $lastname;
						$params['birthday'] = $birthday;
						$params['address'] = $address;
						$params['email'] = $email;
						$params['username'] = $username;
						$params['password'] = $password;
						$result = $id_employee;
						$title['titles'] = "My Profile Page";
						if (isset($submit)) {
								$this->form_validation->set_rules('firstname', 'Firstname', 'trim|required|xss_clean|min_length[2]',
									array(
							                'required'      => 'You have not provided %s.',
							                'min_length'     => '%s should be 2 Chars.'
							        ));
								$this->form_validation->set_rules('lastname', 'Lastname', 'trim|required|xss_clean|min_length[2]',
									array(
							                'required'      => 'You have not provided %s.',
							                'min_length'     => '%s should be 2+ Chars.'
							        ));
								$this->form_validation->set_rules('birthday', 'Birthday', 'trim|required|xss_clean',
									array(
							                'required'      => 'You have not provided %s.'
							        ));
								$this->form_validation->set_rules('address', 'Address', 'trim|required|xss_clean|min_length[10]',
									array(
							                'required'      => 'You have not provided %s.',
							                'min_length'     => '%s should be 10+ Chars.'
							        ));
								$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|min_length[2]',
									array(
							                'required'      => 'You have not provided %s.',
							                'min_length'     => '%s should be 2+ Chars.'
							        ));
								$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean|min_length[5]|max_length[12]|callback_username_check',
									array(
							                'required'      => 'You have not provided %s.',
							                'min_length'     => '%s should: 5< | >12 Chars.'
							        ));
								$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|min_length[5]|max_length[50]',
									array(
							                'required'      => 'You have not provided %s.',
							                'min_length'     => '%s should be 5+ Chars.'
							        ));
								$this->form_validation->set_rules('confirmpassword', 'Password Confirmation', 'required|matches[password]',
									array(
							                'required'      => 'You have not provided %s.',
							                'matches'     => '%s did not match.'
							        ));
						        if ($this->form_validation->run() == FALSE)
						        {
									$array['alertsucc'] ='Was not successful!';
									$array['datainfo']=$this->session->userdata('isnow_logged_in');
									$this->load->view('header',$title);
								    $this->load->view('sidebar',$array);
							    	$this->load->view('update/empl_update/profile_edit',$array);	
							    	$this->load->view('footer');	
						        } else {
						        	$this->session->unset_userdata('isnow_logged_in');
									$datanew = $this->User_mod->update_profile($params);
									$result = $result;
									$data = $this->User_mod->get_userinfo($result);
									$this->session->set_userdata('isnow_logged_in',$data);
									$array['alertsucc'] ='Congratulations! It was Successful!';
									$array['datainfo']=$this->session->userdata('isnow_logged_in',$data);
									$this->load->view('header',$title);
								    $this->load->view('sidebar',$array);
							    	$this->load->view('profile/employee_prof/profile',$array);	
							    	$this->load->view('footer');	
							    	}	
					    } else {
								$array['datainfo']=$this->session->userdata('isnow_logged_in');
								$this->load->view('header',$title);
							    $this->load->view('sidebar',$array);
						    	$this->load->view('update/empl_update/profile_edit',$array);	
						    	$this->load->view('footer');	
					    }
			    }
	}
	//pdf format
	function pdf_format()
	{
			if($this->session->userdata('isnow_logged_in')==FALSE){
					$this->load->view('login');
			}	else {
				    	$array['datainfo']=$this->session->userdata('isnow_logged_in');
				    	$title['titles'] = "Employee Table PDF";
				    	$array['empltables'] = $this->User_mod->getallemployeesforpdf();
						//load the view and saved it into $html variable
				    	$html=$this->load->view('table/employeestabletwopdf',$array,TRUE);	
				        //this the the PDF filename that user will get to download
				        $pdfFilePath = "employees_table.pdf";
				        //load mPDF library
				        $this->load->library('m_pdf');
				        //generate the PDF from the given html
				        $this->m_pdf->pdf->WriteHTML($html);
				        $this->m_pdf->pdf->Output();       
			}
	}
	//check username by callback
	function username_check($str)
    {
        	$username=$this->session->userdata('isnow_logged_in');
        	//if it was your username
        	if ($str==$username[0]->username) {
        			return true;
        	} else {
        	   $got=$this->User_mod->check_username($str);
        	   //if username already taken from others
                if ($got!=0)
                {
                     $this->form_validation->set_message('username_check', '{field} already taken: '.$str);
                     return FALSE;                      
                }
                else
                {
                	 return TRUE;
                }
            }
    }
	//logout
	function logout()
	{
		$this->session->unset_userdata('isnow_logged_in');
		$this->session->unset_userdata('username');
		redirect('login');
	}
}
