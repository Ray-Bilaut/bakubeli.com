<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends CI_Controller 
{

	// load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('product_model');
		$this->load->model('category_model');
		$this->load->model('model_config');
		$this->load->model('customer_model');
		$this->load->model('transaction_model');
		$this->load->model('header_trans_model');
		//load
		$this->load->helper('string');

	}

	public function index()
	

	{
		$shop = $this->cart->contents();

		$data = array  ( 'title'		=> 'Keranjang belanja kamu',
						  'shop'		=> $shop,
						  'isi'			=> 'shop/list'
						);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

// Add to shopping cart

	public function add()
	{
		// Ambil data form hidden product.php

		$id 			= $this->input->post('id');
		$qty 			= $this->input->post('qty');
		$price 			= $this->input->post('price');
		$name 			= $this->input->post('name');
		$redirect_page 	= $this->input->post('redirect_page');
		 
		//Proses memasukkan
		$data = array(  'id' 	=> $id,
						'qty'	=> $qty,
						'price'	=> $price,
						'name'	=> $name,
						'options' => array('Size' => 'L', 'Color' => 'Red')
					);
		$this->cart->insert($data);
		// Redirect page
		$this->session->set_flashdata('notif', 'Masuk dulu yuk!');
		redirect(base_url('login'));
	}

//update cart
public function update_cart($rowid)
{	
//jika ada data row id
	if ($rowid) {
		
		$data	= array(	'rowid'		=> $rowid,
							'qty'		=> $this->input->post('qty')
						);
		$this->cart->update($data);
		$this->session->set_flashdata('sukses', 'Keranjangmu sudah di update nih!');
		redirect(base_url('shop'),'refresh');
	}else{
//jika tidak ada data row id
		redirect(base_url('shop'),'refresh');
		
		}

}
//hapus semua isi cart
public function delete($rowid='')
{
	if ($rowid) {
		//hapus per item
	$this->cart->remove($rowid);
	$this->session->set_flashdata('sukses', 'Sudah di hapus!');
	redirect(base_url('shop'),'refresh');
		
	}else{
	//hapus semua
	$this->cart->destroy();
	$this->session->set_flashdata('sukses', 'Keranjang kamu masih kosong!');
	redirect(base_url('shop'),'refresh');

}
}

//checkout
public function checkout()
{
	

	//cek login pelanggan
	if ($this->session->userdata('email'))  
	{	
	 
        $email 			= $this->session->userdata('email');
		$customer_name	= $this->session->userdata('customer_name');
		$customer 		= $this->customer_model->already_login($email,$customer_name);


		$shop = $this->cart->contents();

		//validasi input
		$valid = $this->form_validation;

		$valid->set_rules('customer_name', 'Nama Lengkap','required',
		array(	'required' => 'Oops! %s Harus Diisi'));

		$valid->set_rules('email', 'Email','required|trim|valid_email',
		array(	'required' 		=> 'Oops! %s Harus Diisi',
				'valid_email' 	=> 'Oops! %s Tidak Valid'));

		$valid->set_rules('phone', 'Nomor Telepon','required|trim|min_length[12]',
		array(	'required' 		=> 'Oops! %s Harus Diisi',
				'min_length' 	=> 'Oops! %s Min 12 Karakter'));


		$valid->set_rules('address', 'Alamat','required|trim',
		array(	'required' 		=> 'Oops! %s Harus Diisi'));

	 
		if($valid->run()===FALSE) {
	//end validasi

		//Data judul halaman checkout
		$data = array  ( 'title'		=> 'Ringkasan belanja kamu',
						  'shop'		=> $shop,
						  'customer'	=> $customer,
						  'isi'			=> 'dashboard/shop/checkout'
						);
		$this->load->view('layout/wrapper', $data, FALSE);
	//Input database
	}else{
			$i = $this->input;

            $data = array (
            	'customer_id'			=> $customer->customer_id,
                'customer_name' 		=> htmlspecialchars($i->post('customer_name')),
                'email' 				=> htmlspecialchars($i->post('email')),
                'phone'					=> $i->post('phone'),	
                'address'				=> $i->post('address'),
                'transaction_code'		=> $i->post('transaction_code'),
                'transaction_date'		=> $i->post('transaction_date'),
                'transaction_value'		=> $i->post('transaction_value'),
                'payment_status'		=> 'Belum',
                'payment_status'		=> $i->post('transaction_value'),
                'post_date'	 	=> date('Y-m-d H:i:s')
               	 );

            //Masuk tabel header transaksi
          $this->header_trans_model->add($data);  
          //proses masuk tabel transaksi
          foreach ($shop as $shop) {
         
 			$subtotal = $shop['price']*$shop['qty'];
          	$data 		= array('customer_id'		=> $customer->customer_id,
          						'transaction_code'	=> $i->post('transaction_code'),
          						'product_id'		=> $shop['id'],
          						'price'				=> $shop['price'],
          						'value'				=> $shop['qty'],
          						'total_price'		=> $subtotal,
          						'transaction_date'	=> $i->post('transaction_date')
          	);

          	$this->transaction_model->add($data);

          	}
          //end transaksi
          //hapus cart
          $this->cart->destroy();

          $this->session->set_flashdata('pesan', '<small class="alert alert-success" role="alert"> Yeay!! Checkout berhasil!</small>');
            redirect(base_url('shop/success'),'refresh');
        }
        //End input database

	}else{
	//kalau belom login registrasi dulu
		$this->session->set_flashdata('pesan', '<small class="alert alert-danger">Silahkan login atau daftar dulu!</small>');
		redirect('register','refresh');
		
	}
}

  public function success()
{	

	$site = $this->model_config->listing();

    $data 		=  array( 	'title'	=> 'Berhasil checkout '.' | '.$site->webname,
    						'shop'	=> '$shop',
    						'site'	=> $site,
    						'isi'	=> 'shop/success'
    					);
    $this->load->view('layout/wrapper', $data, FALSE);

}

}

/* End of file Shop.php */
/* Location: ./application/controllers/Shop.php */