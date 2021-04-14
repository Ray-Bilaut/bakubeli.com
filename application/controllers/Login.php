<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
 

 //load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('customer_model');
		$this->load->model('model_config');
	}

	
// Login page
public function index()
{
// validasi
$this->form_validation->set_rules('email', 'Email', 'trim|required',
array('required' => '%s Harus diisi'));

$this->form_validation->set_rules('password', 'Password', 'trim|required',
array('required' => '%s Harus diisi'));

if($this->form_validation->run()) 
{
		$email 		= $this->input->post('email');
		$password 	= $this->input->post('password');
		// process to simple login
		$this->simple_customer->login($email,$password);

}

// end validasi
		$gambar 		=	$this->model_config->listing();

		$data		= 	array(	'title'		=> 'Login',
								'isi'		=> 'login/list',
								'site'		=>  $gambar
							);
		$this->load->view('layout/wrapper',$data, FALSE);
		 
	}
//LOGOUT
	public function logout()
{	
	$this->simple_customer->logout();
}

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */