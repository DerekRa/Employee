<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataAdminFunctioncont extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->helper(array('form','url','security'));
		$this->load->model('User_mod');
		$this->load->library(array('form_validation','session','pagination'));
	}

	public function index()
	{		
				if($this->session->userdata('isnow_logged_in')==FALSE){
					redirect('login');
				}	else {
				    	 $array['datainfo']=$this->session->userdata('isnow_logged_in');
				    	 $title['titles'] = "Register Page";
				    	 $this->load->helper('season_helper');

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
				    	// $array['empltables'] = $this->User_mod->getallemployees();
				    	//var_dump($employee);
				    	$title['titles'] = "Employee Table Page";
				    	//pagination
				    	$config["base_url"] = base_url() . "dataadminfunctioncont/employee_table";
						$config["total_rows"] = $this->User_mod->countallemployees();
						$config["per_page"] = 15;
						$config["uri_segment"] = 3;
						//config for bootstrap pagination class integration
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
				    	$this->load->view('header',$title);
				    	$this->load->view('sidebar',$array);
				    	$this->load->view('table/employeestable',$array);	
				    	$this->load->view('footer');		
				    	}
	}	
	// pdf table format
	function pdf_format()
	{
			if($this->session->userdata('isnow_logged_in')==FALSE){
					$this->load->view('login');
			}	else {
				    	$array['datainfo']=$this->session->userdata('isnow_logged_in');
				    	$title['titles'] = "Employee Table PDF";
				    	$array['empltables'] = $this->User_mod->getallemployeesforpdf();
						//load the view and saved it into $html variable
						// $html=$this->load->view('header',$title,TRUE);
				    	// $html=$this->load->view('sidebar',$array,TRUE);
				    	$html=$this->load->view('table/employeestablepdf',$array,TRUE);	
				    	// $html=$this->load->view('footer',TRUE);
						// $html=$this->load->view('welcome_message', $data, true);
				        //this the the PDF filename that user will get to download
				        $pdfFilePath = "employees_table.pdf";
				        //load mPDF library
				        $this->load->library('m_pdf');
				        //generate the PDF from the given html
				        $this->m_pdf->pdf->WriteHTML($html);
				        $this->m_pdf->pdf->Output();       
			}
	}
    //Edit / Delete employee table 
	function employee_tablefix()
	{		
				if($this->session->userdata('isnow_logged_in')==FALSE){
					redirect('login');
				}	else {
				    	$array['datainfo']=$this->session->userdata('isnow_logged_in');
				    	// $array['empltables'] = $this->User_mod->getallemployees();
				    	//var_dump($employee);
				    	$title['titles'] = "Employee Table Page";
				    	//pagination
				    	$config["base_url"] = base_url() . "dataadminfunctioncont/employee_tablefix";
				    	$config['first_url'] = '0';
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
						$array['count']=$this->User_mod->countallemployees();
				    	$this->load->view('header',$title);
				    	$this->load->view('sidebar',$array);
				    	$this->load->view('table/employeestable_editdel',$array);	
				    	$this->load->view('footer');		
				    	}
	}	
	// edit emplyee record by Admin
	function edit_employee()
	{
		if($this->session->userdata('isnow_logged_in')==FALSE){
					redirect('login');
				}	else {
						$username=null;	$password=null;	$id_user=null;$id_employee=null;$submit=null;$firstname=null;$lastname=null;$birthday=null;	$address=null;$salary=null;	$email=null;$submit=null;

						extract($_POST);

						$params['id_employee'] = $id_employee;
						$params['username'] = $username;
						$params['password'] = $password;
						$params['firstname'] = $firstname;
						$params['lastname'] = $lastname;
						$params['birthday'] = $birthday;
						$params['address'] = $address;
						$params['salary'] = $salary;
						$params['email'] = $email;
						$result = $id_employee;
						if (isset($submit)) {
								if (!empty($username)) {
											if (!empty($password)) {
											$this->User_mod->update_employee_cre($params);
											$title['titles'] = "Update Employee Page";
											$array['datainfo']=$this->session->userdata('isnow_logged_in');
											$array['alertsucc'] ='Successfully Updated Credentials!';
											$array['emplinfo'] = $this->User_mod->get_userinfo($result);
											$this->load->view('header',$title);
										    $this->load->view('sidebar',$array);
									    	$this->load->view('update/admin_update/update_employee',$array);
									    	$this->load->view('footer');
										} else {
											$title['titles'] = "Update Employee Page";
											$array['datainfo']=$this->session->userdata('isnow_logged_in');
											$array['emplinfo'] = $this->User_mod->get_userinfo($result);
											$array['alerterr'] = 'Please Fill Password Data ***';
											$this->load->view('header',$title);
										    $this->load->view('sidebar',$array);
									    	$this->load->view('update/admin_update/update_employee',$array);
									    	$this->load->view('footer');	
										} 	
								} else {
									$title['titles'] = "Update Employee Page";
									$array['datainfo']=$this->session->userdata('isnow_logged_in');
									$array['emplinfo'] = $this->User_mod->get_userinfo($result);
									$array['alerterr'] = 'Please Fill Username Data ***';
									$this->load->view('header',$title);
								    $this->load->view('sidebar',$array);
							    	$this->load->view('update/admin_update/update_employee',$array);	
							    	$this->load->view('footer');	
								} 
					    } else {
					    	$id = $this->input->post('user_id');
					    	if (!empty($id)) {
								$title['titles'] = "Update Employee Page";
								$array['datainfo']=$this->session->userdata('isnow_logged_in');
								$array['emplinfo'] = $this->User_mod->get_userinfo($id);
								$this->load->view('header',$title);
							    $this->load->view('sidebar',$array);
						    	$this->load->view('update/admin_update/update_employee',$array);	
						    	$this->load->view('footer');	
						    } else {
						    	$this->employee_table();
						    }
					    }
			    }
	}
	// delete and display form 
	function delete_employee()
	{
		if($this->session->userdata('isnow_logged_in')==FALSE){
					redirect('login');
				}	else {
						$submit=null;
						$id = $this->input->post('user_id');
						extract($_POST);
						if (isset($submit)) {
								$this->session->set_flashdata('id',$id);
								$this->User_mod->delete_employee($id);
								$title['titles'] = "Delete Employee Page";
								$array['alertsucc'] ='Congratulations!! It was deleted!';
								$array['datainfo']=$this->session->userdata('isnow_logged_in');
								$this->load->view('header',$title);
							    $this->load->view('sidebar',$array);
						    	$this->load->view('delete/delete_employee_succ',$array);	
						    	$this->load->view('footer');		
					    } else {
					    	if (!empty($id)) {
								$title['titles'] = "Delete Employee Page";
								$array['datainfo']=$this->session->userdata('isnow_logged_in');
								$array['emplinfo'] = $this->User_mod->get_userinfo($id);
								$this->load->view('header',$title);
							    $this->load->view('sidebar',$array);
						    	$this->load->view('delete/delete_employee',$array);	
						    	$this->load->view('footer');	
						    } else {
						    	$this->employee_table();
						    }
					    }
			    }
	}
	// delete permanently a record both tables
	function delete_employeeperm()
	{
		if($this->session->userdata('isnow_logged_in')==FALSE){
					redirect('login');
				}	else {

					$id = $this->input->post('user_id');
					$this->session->set_flashdata('id',$id);
					$this->User_mod->delete_employee_perm($id);
					$title['titles'] = "Delete Employee Page";
					$array['alertsucc'] ='Congratulations!! It was wipe out!';
					$array['datainfo']=$this->session->userdata('isnow_logged_in');
					$this->load->view('header',$title);
				    $this->load->view('sidebar',$array);
			    	$this->load->view('delete/delete_employee_succ',$array);	
			    	$this->load->view('footer');						
				}
	}
	//show profile
	function profile()
	{
		if($this->session->userdata('isnow_logged_in')==FALSE){
					redirect('login');
				}	else {
								$title['titles'] = "My Profile Page";
								$array['datainfo']=$this->session->userdata('isnow_logged_in');
								$this->load->view('header',$title);
							    $this->load->view('sidebar',$array);
						    	$this->load->view('profile/admin_prof/profile',$array);	
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
							    	$this->load->view('update/admin_update/profile_edit',$array);	
							    	$this->load->view('footer');	
						        } else {
						        	$this->session->unset_userdata('isnow_logged_in');
									$datanew = $this->User_mod->update_profile($params);
									$result = $id_employee;
									$data = $this->User_mod->get_userinfo($result);
									$this->session->set_userdata('isnow_logged_in',$data);
									// var_dump($data);die;
									$array['alertsucc'] ='Congratulations! It was Successful!';
									$array['datainfo']=$this->session->userdata('isnow_logged_in',$data);
									// var_dump($array);die;
									$this->load->view('header',$title);
								    $this->load->view('sidebar',$array);
							    	$this->load->view('profile/admin_prof/profile',$array);	
							    	$this->load->view('footer');	
							    	}	
					    } else {
								$array['datainfo']=$this->session->userdata('isnow_logged_in');
								$this->load->view('header',$title);
							    $this->load->view('sidebar',$array);
						    	$this->load->view('update/admin_update/profile_edit',$array);	
						    	$this->load->view('footer');	
					    }
			    }
	}
	//register new employee
	function register_employee()
	{
		if($this->session->userdata('isnow_logged_in')==FALSE){
					redirect('login');
				}	else {
								$this->form_validation->set_rules('firstname', 'Firstname', 'trim|required|xss_clean|alpha|min_length[2]',
									array(
							                'required'      => 'You have not provided %s.',
							                'min_length'     => '%s should be 2 Chars.',
							                'alpha'     => '%s should be Chars. only.'
							        ));
								$this->form_validation->set_rules('lastname', 'Lastname', 'trim|required|xss_clean|alpha|min_length[2]',
									array(
							                'required'      => 'You have not provided %s.',
							                'min_length'     => '%s should be 2+ Chars.',
							                'alpha'     => '%s should be Chars. only.'
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
								$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email|min_length[2]',
									array(
							                'required'      => 'You have not provided %s.',
							                'min_length'     => '%s should be 2+ Chars.',
							                'valid_email'	=> '%s: eg. example@example.com'
							        ));
								$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean|min_length[5]|max_length[12]|callback_username_check',
									array(
							                'required'      => 'You have not provided %s.',
							                'min_length'     => '%s should: 5< | >12 Chars.'
							        ));
								$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|min_length[5]|max_length[50]',
									array(
							                'required'      => 'You have not provided %s.',
							                'min_length'     => '%s should be 8+ Chars.'
							        ));
								$this->form_validation->set_rules('confirmpassword', 'Password Confirmation', 'required|matches[password]',
									array(
							                'required'      => 'You have not provided %s.',
							                'matches'     => '%s did not match.'
							        ));
								$title['titles'] = "Admin Register Page";
							        if ($this->form_validation->run() == FALSE)
							        {
							        	$array['datainfo']=$this->session->userdata('isnow_logged_in');
							        	
										$this->load->view('header',$title);
										$this->load->view('sidebar',$array);
										$this->load->view('register/admin_register/registernew_employee');
										$this->load->view('footer');
									}else{
										$username=null;	$password=null;	$id_user=null;$result=null;$submit=null;$firstname=null;$lastname=null;$birthday=null;	$address=null;$salary=null;	$email=null;$submit=null;

										extract($_POST);

										$params['id_employee'] = $result;
										$params['firstname'] = $firstname;
										$params['lastname'] = $lastname;
										$params['birthday'] = $birthday;
										$params['address'] = $address;
										$params['salary'] = $salary;
										$params['email'] = $email;
										$params['username'] = $username;
										$params['password'] = $password;
									if (isset($submit)) {
										$this->User_mod->register_employee($params);
										// unset($this->input->post('firstname'));
										// echo $firstname;die;
										// unset($firstname);

										$array['alertsucc'] = ucfirst($firstname).'! Have been Successfully Registered!';
										// unset($this->input->post('firstname'));

										$array['datainfo']=$this->session->userdata('isnow_logged_in');
										$this->load->view('header',$title);
										$this->load->view('sidebar',$array);
										$this->load->view('register/admin_register/registernew_employee');
										$this->load->view('footer');
									} else {
										// $array['datainfo']=$this->session->userdata('isnow_logged_in');
										$this->load->view('header',$title);
										$this->load->view('sidebar',$array);
										$this->load->view('register/admin_register/registernew_employee');
										$this->load->view('footer');
							}
				    	}
					}
	}
	//check username by callback
	function username_check($str)
    {
      		// $this->db->where('username', $str);
		    // $query = $this->db->get('employee_user');
        	// $str = $this->input->post('username');
        	$username=$this->session->userdata('isnow_logged_in');
        	//if it was your username
        	if ($str==$username[0]->username) {
        		// $this->form_validation->set_message('username_check', '{field} is your: '.$str);
          		//               return false;
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
	//register employee by two
	function register_employeebytwo()
	{
		if($this->session->userdata('isnow_logged_in')==FALSE){
					redirect('login');
				}	else {
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
								$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email|min_length[2]',
									array(
							                'required'      => 'You have not provided %s.',
							                'min_length'     => '%s should be 2+ Chars.',
							                'valid_email'	=> '%s: eg. example@example.com'
							        ));
								$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean|min_length[5]|max_length[12]|callback_username_check',
									array(
							                'required'      => 'You have not provided %s.',
							                'min_length'     => '%s should: 5< | >12 Chars.'
							        ));
								$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|min_length[8]|max_length[50]',
									array(
							                'required'      => 'You have not provided %s.',
							                'min_length'     => '%s should be 8+ Chars.'
							        ));
								$this->form_validation->set_rules('confirmpassword', 'Password Confirmation', 'required|matches[password]',
									array(
							                'required'      => 'You have not provided %s.',
							                'matches'     => '%s did not match.'
							        ));
								$this->form_validation->set_rules('firstnamesec', 'Firstname', 'trim|required|xss_clean|min_length[2]',
									array(
							                'required'      => 'You have not provided %s for 2nd.',
							                'min_length'     => '%s of 2nd should be 2 Chars.'
							        ));
								$this->form_validation->set_rules('lastnamesec', 'Lastname', 'trim|required|xss_clean|min_length[2]',
									array(
							                'required'      => 'You have not provided %s for 2nd.',
							                'min_length'     => '%s of 2nd should be 2+ Chars.'
							        ));
								$this->form_validation->set_rules('birthdaysec', 'Birthday', 'trim|required|xss_clean',
									array(
							                'required'      => 'You have not provided %s for 2nd.'
							        ));
								$this->form_validation->set_rules('addresssec', 'Address', 'trim|required|xss_clean|min_length[10]',
									array(
							                'required'      => 'You have not provided %s of 2nd.',
							                'min_length'     => '%s of 2nd should be 10+ Chars.'
							        ));
								$this->form_validation->set_rules('emailsec', 'Email', 'trim|required|xss_clean|valid_email|min_length[2]',
									array(
							                'required'      => 'You have not provided %s for 2nd.',
							                'min_length'     => '%s of 2nd should be 2+ Chars.',
							                'valid_email'	=> '%s of 2nd: eg. example@example.com'
							        ));
								$this->form_validation->set_rules('usernamesec', 'Username', 'trim|required|xss_clean|min_length[5]|max_length[12]|callback_username_check',
									array(
							                'required'      => 'You have not provided %s for 2nd.',
							                'min_length'     => '%s of 2nd should: 5< | >12 Chars.'
							        ));
								$this->form_validation->set_rules('passwordsec', 'Password', 'trim|required|xss_clean|min_length[8]|max_length[50]',
									array(
							                'required'      => 'You have not provided %s for 2nd. ',
							                'min_length'     => '%s of 2nd should be 8+ Chars.'
							        ));
								$this->form_validation->set_rules('confirmpasswordsec', 'Password Confirmation', 'required|matches[passwordsec]',
									array(
							                'required'      => 'You have not provided %s for 2nd.',
							                'matches'     => '%s of 2nd did not match.'
							        ));
								$title['titles'] = "Admin Register Page";
							        if ($this->form_validation->run() == FALSE)
							        {
							        	$array['datainfo']=$this->session->userdata('isnow_logged_in');
							        	
										$this->load->view('header',$title);
										$this->load->view('sidebar',$array);
										$this->load->view('register/admin_register/registernew_employeetwo');
										$this->load->view('footer');
									}else{
										$username=null;	$password=null;	$id_user=null; $result=null; $submit=null; $firstname=null; $lastname=null; $birthday=null; $address=null; $salary=null; $email=null;
										$usernamesec=null; $passwordsec=null; $id_usersec=null; $resultsec=null; $firstnamesec=null; $lastnamesec=null; $birthdaysec=null;	$addresssec=null; $salarysec=null; $emailsec=null;
										extract($_POST);										
										if (isset($submit)) {										
											$params['id_employee'] = $result;
											$params['firstname'] = $firstname;
											$params['lastname'] = $lastname;
											$params['birthday'] = $birthday;
											$params['address'] = $address;
											$params['salary'] = $salary;
											$params['email'] = $email;
											$params['username'] = $username;
											$params['password'] = $password;
											$params['id_employeesec'] = $resultsec;
											$params['firstnamesec'] = $firstnamesec;
											$params['lastnamesec'] = $lastnamesec;
											$params['birthdaysec'] = $birthdaysec;
											$params['addresssec'] = $addresssec;
											$params['salarysec'] = $salarysec;
											$params['emailsec'] = $emailsec;
											$params['usernamesec'] = $usernamesec;
											$params['passwordsec'] = $passwordsec;

											$this->User_mod->register_employeetwo($params);
											// unset($this->input->post('firstname'));
											// echo $firstname;die;
											// unset($firstname);
											$array['alertsucc'] = ucfirst($firstname).' and '.ucfirst($firstnamesec).' - Have been Successfully Registered!';
											// unset($this->input->post('firstname'));
											$array['datainfo']=$this->session->userdata('isnow_logged_in');
											$this->load->view('header',$title);
											$this->load->view('sidebar',$array);
											$this->load->view('register/admin_register/registernew_employeetwo');
											$this->load->view('footer');
										} else {
											$array['datainfo']=$this->session->userdata('isnow_logged_in');
											$this->load->view('header',$title);
											$this->load->view('sidebar',$array);
											$this->load->view('register/admin_register/registernew_employeetwo');
											$this->load->view('footer');
								}
				    	}
					}			
	}
	//logout
	function logout(){
		$this->session->unset_userdata('isnow_logged_in');
		$this->session->unset_userdata('username');
		redirect('login');
	}

	function excel_format(){
		 //load our new PHPExcel library
        $this->load->library('excel');
        //activate worksheet number 1
        $this->excel->setActiveSheetIndex(0);
        //name the worksheet
        $this->excel->getActiveSheet()->setTitle('Users list');
 
 		//set cell A1 content with some text
        $this->excel->getActiveSheet()->setCellValue('A1', 'Information Excel Sheet');
        $this->excel->getActiveSheet()->setCellValue('A4', 'Firstname');
        $this->excel->getActiveSheet()->setCellValue('B4', 'Lastname');
        $this->excel->getActiveSheet()->setCellValue('C4', 'Birthday');
        $this->excel->getActiveSheet()->setCellValue('D4', 'Address');
        $this->excel->getActiveSheet()->setCellValue('E4', 'Contact Number');
        $this->excel->getActiveSheet()->setCellValue('F4', 'Salary');
        $this->excel->getActiveSheet()->setCellValue('G4', 'Email');

        //merge cell A1 until C1
        $this->excel->getActiveSheet()->mergeCells('A1:C1');
        //set aligment to center for that merged cell (A1 to C1)
        $this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        //make the font become bold
        $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(16);
        $this->excel->getActiveSheet()->getStyle('A1')->getFill()->getStartColor()->setARGB('#333');
        for($col = ord('A'); $col <= ord('C'); $col++){
                //set column dimension
                $this->excel->getActiveSheet()->getColumnDimension(chr($col))->setAutoSize(true);
                 //change the font size
                $this->excel->getActiveSheet()->getStyle(chr($col))->getFont()->setSize(12);
                 
                $this->excel->getActiveSheet()->getStyle(chr($col))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        }
        // load database
        // $this->load->database();
 
        // load model
        // $this->load->model('userModel');
 
        // get all users in array formate
        // $users = $this->userModel->get_users();
        // $users = $this->User_mod->getallemployeesforexcel();
 		$array = $this->User_mod->getallemployeesforexcel();
 		// $exceldata="";
 		// var_dump($array); die;
 		 // foreach ($array as $row){
    //             // $exceldata[] = $row;
    //              $this->excel->getActiveSheet()->setCellValue('F4', 'Salary')
    //     }

        //Fill data 
                $this->excel->getActiveSheet()->fromArray($array[0],null,'A5');
                // $this->excel->getActiveSheet()->fromArray($array,null,'A5');
                 
                // $this->excel->getActiveSheet()->getStyle('A5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                // $this->excel->getActiveSheet()->getStyle('B5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                // $this->excel->getActiveSheet()->getStyle('C5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                // $this->excel->getActiveSheet()->getStyle('D5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                // $this->excel->getActiveSheet()->getStyle('E5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                // $this->excel->getActiveSheet()->getStyle('F5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                // $this->excel->getActiveSheet()->getStyle('G5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                 
 		// var_dump($array);die;
        // read data to active sheet
        //$this->excel->getActiveSheet()->fromArray($exceldata, TRUE);
 
        $filename='just_random_name.xls'; //save our workbook as this file name
 
        header('Content-Type: application/vnd.ms-excel'); //mime type
 
        header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
 
        header('Cache-Control: max-age=0'); //no cache
                    
        //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
        //if you want to save it as .XLSX Excel 2007 format
 
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
 
        //force user to download the Excel file without writing it to server's HD
        $objWriter->save('php://output');
}
}