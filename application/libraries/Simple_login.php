	<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Simple_login
	{
	protected $CI;

	public function __construct()
	{
	$this->CI =& get_instance();
	// load model user
	$this->CI->load->model('user_model');
	}

	// Function login
	public function auth($username,$password)
	{
	$check = $this->CI->user_model->auth($username,$password);
	// if data user exist, create login session
	if($check) {
	$user_id 		= $check->user_id;
	$name			= $check->name;	
	$access_level 	= $check->access_level;
	// create session
	$this->CI->session->set_userdata('user_id',$user_id);
	$this->CI->session->set_userdata('name',$name);
	$this->CI->session->set_userdata('username',$username);
	$this->CI->session->set_userdata('access_level',$access_level);
	// redirect to protection admin
	redirect(base_url('admin/dashboard'),'refresh');
	}else{
	// if not exist or wrong password and username, relogin
	$this->CI->session->set_flashdata('warning','Username atau Password Salah');
	redirect(base_url('auth'),'refresh');

	}
	}
	// Login Check
	public function auth_check()
	{
	// check if session exist, if not exist, redirect to login page
	if($this->CI->session->userdata('username') =="")
	{
	$this->CI->session->set_flashdata('warning','Anda Belum Login');
	redirect(base_url('auth'),'refresh');
	}
	}
	// Logout function
	public function logout()
	{
	// Destroy all session 
	$this->CI->session->unset_userdata('user_id');
	$this->CI->session->unset_userdata('name');
	$this->CI->session->unset_userdata('username');
	$this->CI->session->unset_userdata('access_level');
	// after unset session,redirect to login page
	$this->CI->session->set_flashdata('sukses','Anda Berhasil Logout');
	redirect(base_url('auth'),'refresh');
	}
	}

	/* End of file Simple_login.php */
	/* Location: ./application/libraries/Simple_login.php */
