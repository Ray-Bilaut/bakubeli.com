<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

// Login page
public function index()
{
// validasi
$this->form_validation->set_rules('username', 'Username', 'trim|required',
array('required' => '%s Harus diisi'));

$this->form_validation->set_rules('password', 'Password', 'trim|required',
array('required' => '%s Harus diisi'));

if($this->form_validation->run()) 
{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		// process to simple login
		$this->simple_login->auth($username,$password);

}

// end validasi

$data = array( 'title' => 'Login');
$this->load->view('auth/list.php', $data, FALSE);
}

// FUNCTION LOGOUT

// grab from simple_login
public function logout()
{
$this->simple_login->logout();
}
}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */