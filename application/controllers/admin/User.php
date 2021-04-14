		<?php
		defined('BASEPATH') OR exit('No direct script access allowed');

		class User extends CI_Controller {

		public function __construct()
		{
		// load model
		parent::__construct();
		$this->load->model('user_model');
		// PROTEKSI HALAMAN
		$this->simple_login->auth_check();
		}
		// Data user
		public function index()
		{

		$user = $this->user_model->listing();
		$data = array (	'title' => 'Manajemen User',
						'user' => $user,
						'isi' => 'admin/user/list');	
		$this->load->view('admin/layout/wrapper', $data, FALSE);				
		}


		// add user
		public function add()
		{
		// Validasi Input User
		$valid = $this->form_validation;

		$valid -> set_rules('name', 'Nama Lengkap','required',
		array(	'required' => '%s Harus Diisi'));

		$valid -> set_rules('email', 'Email','required|valid_email',
		array(	'required' 		=> '%s Harus Diisi',
				'valid_email' 	=> '%s Tidak Valid'));

		$valid -> set_rules('username', 'Username','required|min_length[6]|max_length[32]|is_unique[users.username]',
		array(	'required' 		=> '%s Harus Diisi',
				'min_length' 	=> '%s Min 6 Karakter',
				'max_length' 	=> '%s Max 32 Karakter',
				'is_unique' 	=> '%s Sudah Ada'));

		$valid -> set_rules('password', 'Password','required|min_length[8]',
		array(	'required' 		=> '%s Harus Diisi',
				'min_length' 	=> '%s Min 8 Karakter'));

		if($valid->run()===FALSE) {
//end validasi
		$data = array( 'title'	=> 'Tambah User ', 
						'isi' 	=> 'admin/user/add'
													);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Database input
		}else{

			$i = $this->input;

			$data = array(  'name'   	    =>$i->post('name'),
							'email'			=>$i->post('email'),
							'username'		=>$i->post('username'),
							'password'	    =>SHA1($i->post('password')),
							'access_level'	=>$i->post('access_level')
							);
			$this->user_model->add($data);
			$this->session->set_flashdata('Sukses','Data Tersimpan');
			redirect(base_url('admin/user'),'refresh');
	}
	// End Input User
}

// edit user
		public function update($user_id)
		{

		$user = $this->user_model->detail($user_id);


		// Validasi Input User
		$valid = $this->form_validation;

		$valid -> set_rules('name', 'Nama Lengkap','required',
		array(	'required' => '%s Harus Diisi'));

		$valid -> set_rules('email', 'Email','required|valid_email',
		array(	'required' 		=> '%s Harus Diisi',
				'valid_email' 	=> '%s Tidak Valid'));

	    $valid -> set_rules('password', 'Password','required|min_length[8]',
		array(	'required' 		=> '%s Harus Diisi',
				'min_length' 	=> '%s Min 8 Karakter'));

		if($valid->run()===FALSE) {

		$data = array( 'title'	=> 'Edit User ',
						'user'  => $user,
						'isi' 	=> 'admin/user/update'
						);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Database input
		}else{

			$i = $this->input;

			$data = array( 	'user_id'		=>$user_id,
							'name'   	    =>$i->post('name'),
							'email'			=>$i->post('email'),
							'username'		=>$i->post('username'),
							'password'	    =>SHA1($i->post('password')),
							'access_level'	=>$i->post('access_level')
							);
			$this->user_model->update($data);
			$this->session->set_flashdata('Sukses','Data di Update');
			redirect(base_url('admin/user'),'refresh');
	}
	// End Update User
}

// Delete
public function delete($user_id)
{
	$data = array ('user_id' => $user_id);
	$this->user_model->delete($data);
	$this->session->set_flashdata('Sukses', 'Data Telah Dihapus');
	redirect(base_url('admin/user'),'refresh');
}

}

		/* End of file User.php */
		/* Location: ./application/controllers/admin/User.php */