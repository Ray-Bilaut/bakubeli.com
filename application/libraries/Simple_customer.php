	<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Simple_customer
	{
	protected $CI;

	public function __construct()
	{
	$this->CI =& get_instance();
	// load model user
	$this->CI->load->model('customer_model');
	}

	// Function login
	public function login($email,$password)
	{
	$check = $this->CI->customer_model->login($email,$password);
	// if data user exist, create login session
	if($check) {
	$customer_id 		= $check->customer_id;
	$customer_name		= $check->customer_name;	
	
	// create session
	$this->CI->session->set_userdata('customer_id',$customer_id);
	$this->CI->session->set_userdata('customer_name',$customer_name);
	$this->CI->session->set_userdata('email',$email);
	// redirect to protection admin
	redirect(base_url('customer/home'),'refresh');
	}else{
	// if not exist or wrong password and username, relogin
	$this->CI->session->set_flashdata('wrong','<small class="alert alert-danger" role="alert">Email atau Password Salah!</small>');
	redirect(base_url('login'),'refresh');

	}
	}
	// Login Check
	public function login_check()
	{
	// check if session exist, if not exist, redirect to login page
	if($this->CI->session->userdata('email') =="")
	{
	$this->CI->session->set_flashdata('not','<small class="alert alert-warning" role="alert">Anda Belum Login!</small>');
	redirect(base_url('login'),'refresh');
	}
	}
	// Logout function
	public function logout()
	{
	// Destroy all session 
	$this->CI->session->unset_userdata('customer_id');
	$this->CI->session->unset_userdata('customer_name');
	$this->CI->session->unset_userdata('email');

	// after unset session,redirect to login page
	$this->CI->session->set_flashdata('logout','<small class="alert alert-success" role="alert">Sampai jumpa!</small>');
	redirect(base_url('login'),'refresh');
	}
	}

	/* End of file Simple_login.php */
	/* Location: ./application/libraries/Simple_login.php */
