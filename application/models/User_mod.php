<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User_mod extends CI_Model {

	protected $table = 'employee_user';
	protected $table2 = 'employee_information';
	public function __construct(){
		parent::__construct();

	}
	//LOGIN
	//--------------check the login in table1 database and return Results
	function login_check_cre($username,$password)
	{
		$fields = array(
				'username' => $username,
				'password' => md5($password),
				'delete_flag' => 0
			);
		$queryuser = $this->db->get_where($this->table,$fields);
		return $queryuser->result();
	}
	//-------------get single row of the info in table2 queried by ID // not used anymore
	function get_userinfo($result)
	{
		$this->db->select('*'); 
		$this->db->from($this->table);
		$this->db->join($this->table2, 'employee_information.user_id = employee_user.id_user and 
										employee_user.id_user='.$result);
		$queryuser = $this->db->get();
		return $queryuser->result();
	}
	//END LOGIN
	//TEMPORARY REGISTRATION
	//-------------update database table1 and table2 for employee temporary registration some are not updated
	function loginregupdate($params)
	{
		$fields = array(
				'username' => $params['username'],
				'password' => md5($params['password']),
				'created_date' => date('Y-m-d H:i:s')
			);

		$this->db->insert($this->table,$fields);
		
		$fields2 = array(
				'firstname' => $params['firstname'],
				'lastname' => $params['lastname'],
				'user_id' => $this->db->insert_id()	
			);

		$this->db->insert($this->table2,$fields2);
	}
	//END 
	//UPDATE
	//-------------update database table1 and table2 
	function update_employee_cre($params)
	{
		$condition = array(
			'id_user'=>$params['id_employee']
			);

		if (strlen($params['password'])==32) {
			$fields = array(
				'username' => $params['username'],
				'updated_date' => date('Y-m-d H:i:s')
			);
		} else {
		$fields = array(
				'username' => $params['username'],
				'password' => md5($params['password']),
				'updated_date' => date('Y-m-d H:i:s')
			);
		}

		$this->db->where($condition);
		$this->db->update($this->table,$fields);
		
		$conditiontwo = array(
			'user_id'=>$params['id_employee']
			);
		$fields2 = array(
				'firstname' => $params['firstname'],
				'lastname' => $params['lastname'],
				'birthday' => $params['birthday'],
				'address' => $params['address'],
				'salary' => $params['salary'],
				'user_id' => $params['id_employee'],	
				'email' => $params['email']		
			);
		$this->db->where($conditiontwo);
		$this->db->update($this->table2,$fields2);

	}
	//-------------check username if existed and return a count row[1,null]
	function checkbeforeupdate($params)
	{
		$fields1 = array(
				'username' => $params['username'],
				'delete_flag' => 0
			);
		$sql = $this->db->get_where($this->table,$fields1);

		$count = $sql->num_rows();
		return $count;
	}
	//END UPDATE
	//DELETE | UPDATE
	//-------------delete single employee record permanently
	function delete_employee_perm($id)
	{
		$condition = array(
			'id_user'=>$id
			);
		$fields = array(
			'delete_flag'=>1
			);
		$this->db->where($condition);
		$this->db->update($this->table,$fields);
		
		$conditiontwo = array(
			'user_id'=>$id
			);

		$this->db->where($conditiontwo);
		$this->db->delete($this->table2);
	}
	//-------------delete single employee record but keep history or just update flag
	function delete_employee($result)
	{
		$condition = array(
			'id_user'=>$result
			);
		$fields = array(
			'delete_flag'=>1
			);
		$this->db->where($condition);
		$this->db->update($this->table,$fields);
	}
	//-------------update admin profile
	function update_profile($params)
	{
		// var_dump($params); die;
		$condition = array(
			'id_user'=>$params['id_employee']
			);
		if (strlen($params['password'])==32) {
			$fields = array(
				'username' => $params['username'],
				'updated_date' => date('Y-m-d H:i:s')
			);
		}else {
		$fields = array(
				'username' => $params['username'],
				'password' => md5($params['password']),
				'updated_date' => date('Y-m-d H:i:s')
			);
		}
		$this->db->where($condition);
		$this->db->update($this->table,$fields);
		
		$conditiontwo = array(
			'user_id'=> $params['id_employee']
			);
		$fields2 = array(
				'firstname' => $params['firstname'],
				'lastname' => $params['lastname'],
				'birthday' => $params['birthday'],
				'address' => $params['address'],
				'user_id' => $params['id_employee'],	
				'email' => $params['email']		
			);
		$this->db->where($conditiontwo);
		$this->db->update($this->table2,$fields2);
	}
	//END DELETE UPDATE
	//SELECT
	//-------------get all active employees record for table
	function getallemployees($limit, $start)
	{
		$this->db->limit($limit, $start);
		$this->db->select('*'); 
		$this->db->from($this->table);
		$this->db->join($this->table2, 'employee_information.user_id = employee_user.id_user and 
										employee_user.admin_check=0 and employee_user.delete_flag=0');
	    $this->db->order_by("employee_user.id_user","desc");
		$query = $this->db->get();
		return $query->result();
	}
	//-------------get all active employee for pdf
	function getallemployeesforpdf()
	{
		$this->db->select('*'); 
		$this->db->from($this->table);
		$this->db->join($this->table2, 'employee_information.user_id = employee_user.id_user and 
										employee_user.admin_check=0 and employee_user.delete_flag=0');
		$query = $this->db->get();
		return $query->result();
	}
		//-------------get all active employee for excel
	function getallemployeesforexcel()
	{
		$this->db->select('firstname,lastname,birthday,address,contactnumber,salary,email'); 
		$this->db->from($this->table);
		$this->db->join($this->table2, 'employee_information.user_id = employee_user.id_user and 
										employee_user.admin_check=0 and employee_user.delete_flag=0');
		$query = $this->db->get();
		// print_r($query->result_array()); break;
		return $query->result_array();
	}
	//--------------count all active employees for table
	function countallemployees()
	{
		$this->db->where('delete_flag', '0');
		$this->db->from($this->table);
		return $this->db->count_all_results();
		// return $this->db->count_all();
	}
	//END SELECT
	//INSERT | SELECT
	//--------------register new employee by admin
	function register_employee($params)
	{
		$fields = array(
				'username' => $params['username'],
				'password' => md5($params['password']),
				'created_date' => date('Y-m-d H:i:s')
			);

		$this->db->insert($this->table,$fields);
		
		$fields2 = array(
				'firstname' => $params['firstname'],
				'lastname' => $params['lastname'],
				'birthday' => $params['birthday'],
				'address' => $params['address'],
				'salary' => $params['salary'],
				'lastname' => $params['lastname'],
				'user_id' => $this->db->insert_id(),
				'email' => $params['email'],
			);

		$this->db->insert($this->table2,$fields2);

		// unset($params);
	}
	//--------------check database of username used in callbacks
	function check_username($str2)
	{
		$fields = array(
				'username' => $str2,
				'delete_flag' => 0
			);
		$queryuser = $this->db->get_where($this->table,$fields);
		return $queryuser->num_rows();
	}
	//--------------register by two of employee used by admin
	function register_employeetwo($params)
	{
		$fields = array(
				array(
				'username' => $params['username'],
				'password' => md5($params['password']),
				'created_date' => date('Y-m-d H:i:s')
				),array(
				'username' => $params['usernamesec'],
				'password' => md5($params['passwordsec']),
				'created_date' => date('Y-m-d H:i:s')
				)
			);

		$this->db->insert_batch($this->table,$fields);

		$id = $this->db->insert_id();
		$idsec = $id + 1;
		$fields2 = array(
				array(
					'firstname' => $params['firstname'],
					'lastname' => $params['lastname'],
					'birthday' => $params['birthday'],
					'address' => $params['address'],
					'salary' => $params['salary'],
					'lastname' => $params['lastname'],
					'user_id' => $id,
					'email' => $params['email'],
				),array(
					'firstname' => $params['firstnamesec'],
					'lastname' => $params['lastnamesec'],
					'birthday' => $params['birthdaysec'],
					'address' => $params['addresssec'],
					'salary' => $params['salarysec'],
					'lastname' => $params['lastnamesec'],
					'user_id' => $idsec,
					'email' => $params['emailsec'],
				)
			);

		$this->db->insert_batch($this->table2,$fields2);
	}
	//END INSERT | SELECT
}
