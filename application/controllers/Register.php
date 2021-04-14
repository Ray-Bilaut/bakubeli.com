<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('customer_model');
		$this->load->model('model_config');
	}


	//halaman register
	public function index()
{		
	$valid = $this->form_validation;

		$valid->set_rules('customer_name', 'Nama Lengkap','required',
		array(	'required' => 'Oops! %s Harus Diisi'));

		$valid->set_rules('email', 'Email','required|trim|valid_email|is_unique[customers.email]',
		array(	'required' 		=> 'Oops! %s Harus Diisi',
				'valid_email' 	=> 'Oops! %s Tidak Valid',
				'is_unique'		=> 'Oops! %s Sudah Terdaftar'
			));

		$valid->set_rules('phone', 'Nomor Telepon','required|trim|min_length[12]|is_unique[customers.phone]',
		array(	'required' 		=> 'Oops! %s Harus Diisi',
				'min_length' 	=> 'Oops! %s Min 12 Karakter',
				'is_unique' 	=> 'Oops! %s Sudah Terdaftar'));

		$valid->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]',
		 [
            'matches' 		=> '%s tidak cocok!',
            'min_length' 	=> '%s terlalu pendek!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');


		if($valid->run()===FALSE) {
//end validasi
		
		$site = $this->model_config->listing();

		$data = array(	'title'		=> 'Daftar'.' | '.$site->webname,
						'isi'		=> 'register/list'
						);
		$this->load->view('layout/wrapper', $data, FALSE);
	//Input database
	}else{
			$i = $this->input;

            $data = array (
            	'customer_status'		=> 'Pending',
                'customer_name' 		=> $i->post('customer_name'),
                'email' 				=> $i->post('email'),
                'phone'					=> $i->post('phone'),	
                'password' 				=> SHA1($i->post('password1')),
                'registration_date' 	=> date('Y-m-d H:i:s')
               	 );

          $this->customer_model->add($data);  
          
          //Create session user data
          $this->session->set_userdata('email',$i->post('email'));
          $this->session->set_userdata('customer_name',$i->post('customer_name'));
          //End create session

          $this->session->set_flashdata('pesan', '<small class="alert alert-success" role="alert"> Yeay!! Kamu berhasil daftar! Silahkan  login!</small>');
            redirect(base_url('register/success'),'refresh');
        }
        //End input database


    }

    public function success()
{	
	$site = $this->model_config->listing();

    $data 		=  array( 	'title'	=> 'Daftar '.' | '.$site->webname,
    						'isi'	=> 'register/success',
    						'site'	=> $site
    					);
    $this->load->view('layout/wrapper', $data, FALSE);
}
}

/* End of file Register.php */
/* Location: ./application/controllers/Register.php */