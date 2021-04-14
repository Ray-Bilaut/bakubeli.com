<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->model('customer_model');
		$this->load->model('header_trans_model');
		$this->load->model('transaction_model');
		$this->load->model('rekening_model');
		//protect page
		$this->simple_customer->login_check();
	}

	public function index()
	{

		//Ambil data login pelanggan dari session
		$customer_id 	= $this->session->userdata('customer_id');
		$trans_header	= $this->header_trans_model->customer($customer_id);


		$data = array( 'title'		=> 'Beranda',
						'header'	=>  $trans_header, 
						'isi'		=> 'dashboard/list'
					);
		$this->load->view('dashboard/layout/wrapper', $data, FALSE);
	}


	public function history()
	{
		//Ambil data login pelanggan dari session
		$customer_id 	= $this->session->userdata('customer_id');
		$trans_header	= $this->header_trans_model->customer($customer_id);

		$data = array( 'title'		=> 'Riwayat Belanja',
						'header'	=>  $trans_header, 
						'isi'		=> 'dashboard/history'
					);
		$this->load->view('dashboard/layout/wrapper', $data, FALSE);
	}

	public function detail($transaction_code)

	{
			//Ambil data login pelanggan dari session
		$customer_id 	= $this->session->userdata('customer_id');
		$trans_header	= $this->header_trans_model->transaction_code($transaction_code);
		$transaksi		= $this->transaction_model->transaction_code($transaction_code);

		//pastikan bahwa pelanggan mengakses data transaksi sendiri	
		if ($trans_header->customer_id != $customer_id) {

			$this->session->set_flashdata('warning', '<small class="alert alert-danger" role="alert">Itu bukan data kamu!</small>');
			redirect(base_url('login'));
			
		}


		$data = array( 'title'		=> 'Detail Belanja',
						'header'	=>  $trans_header, 
						'trans'		=>  $transaksi,
						'isi'		=> 'dashboard/detail'
					);
		$this->load->view('dashboard/layout/wrapper', $data, FALSE);

	}

	public function profile()

	{
			//Ambil data login pelanggan dari session
		$customer_id 	= $this->session->userdata('customer_id');
		$customer 		= $this->customer_model->detail($customer_id);

		//Validasi update profile
		$valid = $this->form_validation;

		$valid->set_rules('customer_name', 'Namamu','required',
		array(	'required' => 'Oops! %s belum kamu isi!'));

		
		$valid->set_rules('phone', 'Nomor Telepon','required|trim|min_length[12]',
		array(	'required' 		=> 'Oops! %s Harus Diisi',
				'min_length' 	=> 'Oops! %s Min 12 Karakter'));

		
        $valid->set_rules('address', 'Alamat','required|trim',
		array(	'required' 		=> 'Oops! Kamu belum kamu isi %s',
				'min_length' 	=> 'Oops! %s Minimal 6 Karakter'));


		if($valid->run()===FALSE) {
//end validasi

		$data = array( 'title'			=> 'Profil',
						'customer'		=>  $customer,
						'isi'			=> 'dashboard/profile'
					);
		$this->load->view('dashboard/layout/wrapper', $data, FALSE);

	//Input database
		}else{
			$i = $this->input;

			//kalau password lebih dari 6. diganti
			if (strlen($i->post('password1')) >= 6) {
			
			$data = array (
            	'customer_id'			=> $customer_id,
                'customer_name' 		=> $i->post('customer_name'),
                'phone'					=> $i->post('phone'),	
                'password' 				=> SHA1($i->post('password1')),
                'address'			 	=> $i->post('address')
               	 );
			}else {
				//kalau kurang dari 6 tidak diganti
				$data = array (
            	'customer_id'			=> $customer_id,
                'customer_name' 		=> $i->post('customer_name'),
                'phone'					=> $i->post('phone'),	
                'address'			 	=> $i->post('address')
               	 );
			}
        //End update data
        $this->customer_model->update($data);  
        $this->session->set_flashdata('pesan', 
        'Yeay!! Profil kamu sudah diupdate!');
        redirect(base_url('customer/dashboard/profile'),'refresh');
        }
        //End input database
    }

    public function confirm($transaction_code)

    {

    	$rekening 		=	$this->rekening_model->listing();
	   	$header 		= 	$this->header_trans_model->transaction_code($transaction_code);


	   	// Validasi Input Product
		$valid = $this->form_validation;

		$valid -> set_rules('bank_name', 'Nama Bank','required',
		array(	'required' => '%s Harus Diisi'));

		$valid -> set_rules('pay_date', 'Tanggal Pembayaran','required',
		array(	'required' 	=> '%s Harus Diisi'));

		$valid -> set_rules('payment_value', 'Jumlah Bayar','required',
		array(	'required' 	=> '%s Harus Diisi'));

		$valid -> set_rules('payment_number', 'Nomor Rekening','required',
		array(	'required' 	=> '%s Harus Diisi'));

		$valid -> set_rules('customer_number', 'Pemilik Rekening','required',
		array(	'required' 	=> '%s Harus Diisi'));

		
		if($valid->run()) 
			// UPLOAD GAMBAR PRODUK
		{
		// Check jika gambar diganti
		if (! empty($_FILES['payment_bill']['name'])) {	
		$config['upload_path'] 		= './assets/upload/image/';
		$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
		$config['max_size']  		= '5000'; //dalam KB
		$config['max_width']  		= '3000'; //pixel
		$config['max_height']  		= '2024'; //pixel
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('payment_bill')){
		//End Validasi

    	$data 			= array ( 	'title'		=> 'Konfirmasi Pembayaran',
    								'header'	=>	$header,
    								'error'		=> $this->upload->display_errors(),
    								'rek'		=>	$rekening,
    								'isi'		=> 'dashboard/confirm'
    							);
    	$this->load->view('dashboard/layout/wrapper', $data, FALSE);

    	// Database input
		}else{

			$upload_image = array('upload_data' => $this->upload->data());

			// CREATE THUMBNAIL
				$config['image_library'] 	= 'gd2';
				$config['source_image'] 	= './assets/upload/image/'.$upload_image['upload_data']['file_name'];
				// LOKASI FOLDER THUMBNAIL
				$config['new_image']		='./assets/upload/image/thumbs';
				$config['create_thumb'] 	= TRUE;
				$config['maintain_ratio'] 	= TRUE;
				$config['width']         	= 250; //pixel
				$config['height']       	= 250;
				$config['thumb_marker']		= '';

				$this->load->library('image_lib', $config);

				$this->image_lib->resize();
			// END CREATE THUMBNAIL

			$i = $this->input;
			
			$data = array(  'trans_header_id'	=> $header->trans_header_id,
							'payment_status'	=> 'Sudah Bayar',
							'payment_value'		=> $i->post('payment_value'),
							'payment_number'	=> $i->post('payment_number'),
							'customer_number'	=> $i->post('customer_number'),
							//Simpan gambar
							'payment_bill'		=> $upload_image['upload_data']['file_name'],
							'id_rekening'		=> $i->post('id_rekening'),
							'pay_date'			=> $i->post('pay_date'),
							'bank_name'			=> $i->post('bank_name')
							);
			$this->header_trans_model->update($data);
			$this->session->set_flashdata('sukses','Pembayaran Selesai');
			redirect(base_url('customer/dashboard'),'refresh');
	}}else{
		// EDIT TANPA GANTI GAMBAR
		$i = $this->input;
			
			$data = array(  'trans_header_id'	=> $header->trans_header_id,
							'payment_status'	=> 'Sudah Bayar',
							'payment_value'		=> $i->post('payment_value'),
							'payment_number'	=> $i->post('payment_number'),
							'customer_number'	=> $i->post('customer_number'),
							//Simpan gambar
							// 'payment_bill'		=> $upload_image['upload_data']['file_name'],
							'id_rekening'		=> $i->post('id_rekening'),
							'pay_date'			=> $i->post('pay_date'),
							'bank_name'			=> $i->post('bank_name')
							);
			$this->header_trans_model->update($data);
			$this->session->set_flashdata('Sukses','Pembayaran Selesai');
			redirect(base_url('customer/dashboard'),'refresh');
			//END INPUT
}}
			$data 			= array ( 	'title'		=> 'Konfirmasi Pembayaran',
    									'header'	=>	$header,
    									'rek'		=>	$rekening,
    									'isi'		=> 'dashboard/confirm'//file yang ada di view
    							);
    		$this->load->view('dashboard/layout/wrapper', $data, FALSE);

}//END CONFIRM


 }

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */