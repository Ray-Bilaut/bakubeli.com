	<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Rekening extends CI_Controller {

	public function __construct()
	{
	// load model
	parent::__construct();
	$this->load->model('rekening_model');
	// PROTEKSI HALAMAN
	
	}
	// Data rekening
	public function index()
	{

	$rekening = $this->rekening_model->listing();

	$data = array (	'title' 	=> 'Data Rekening',
					'rekening' 	=> $rekening,
					'isi' 		=> 'admin/rekening/list');	
	$this->load->view('admin/layout/wrapper', $data, FALSE);				
	}


	// add rekening
	public function add()
	{
	// Validasi Input Rekening
	$valid = $this->form_validation;

	$valid -> set_rules('bank_name', 'Nama Bank','required',
	array(	'required' 	=> '%s Harus Diisi'));

	$valid -> set_rules('rek_number', 'Nomor Rekening','required|is_unique[rekening.rek_number]',
	array(	'required' 	=> '%s Harus Diisi',
			'is_unique'	=> '%s sudah ada. buat satu yang baru'));

	$valid -> set_rules('pemilik_rek', 'Nama Pemilik','required',
	array(	'required' 	=> '%s Harus Diisi'));



	if($valid->run()===FALSE) {

	$data = array( 'title'	=> 'Tambah Rekening', 
					'isi' 	=> 'admin/rekening/add'
			);
	$this->load->view('admin/layout/wrapper', $data, FALSE);
	// Database input
	}else{

	$i = $this->input;
	
	$data = array(  
	'bank_name'					=>$i->post('bank_name'),
	'rek_number'	   	    	=>$i->post('rek_number'),
	'pemilik_rek'				=>$i->post('pemilik_rek')
	);
	$this->rekening_model->add($data);
	$this->session->set_flashdata('Sukses','Data Rekening Tersimpan');
	redirect(base_url('admin/rekening'),'refresh');
	}
	// End Input Rekening
	}

	// edit rekening
	public function update($id_rekening)
	{

	$rekening = $this->rekening_model->detail($id_rekening);


	// Validasi edit Rekening
	$valid = $this->form_validation;


	$valid -> set_rules('bank_name', 'Nama Bank','required',
	array(	'required' 	=> '%s Harus Diisi',));

	$valid -> set_rules('rek_number', 'Nomor Rekening','required',
	array(	'required' 	=> '%s Harus Diisi'));

	$valid -> set_rules('pemilik_rek', 'Nama Pemilik','required',
	array(	'required' 	=> '%s Harus Diisi'));

	if($valid->run()===FALSE) {

	$data = array( 	'title'		=> 'Edit Rekening',
					'rekening'  => $rekening,
					'isi' 		=> 'admin/rekening/update'
	);
	$this->load->view('admin/layout/wrapper', $data, FALSE);
	// Database input
	}else{

	$i = $this->input;
	
	$data = array(  
			'id_rekening'				=>$i->post('id_rekening'),
			'bank_name'					=>$i->post('bank_name'),
			'rek_number'   	    		=>$i->post('rek_number'),
			'pemilik_rek'				=>$i->post('pemilik_rek')
	);
	$this->rekening_model->update($data);
	$this->session->set_flashdata('Sukses','Data di Update');
	 redirect(base_url('admin/rekening'),'refresh');
	}
	// End Update Rekening
	}

	// Delete
	public function delete($id_rekening)
	{
	$data = array ('id_rekening' => $id_rekening);
	$this->rekening_model->delete($data);
	$this->session->set_flashdata('Sukses', 'Data Telah Dihapus');
	redirect(base_url('admin/rekening'),'refresh');
	}

	}

	/* End of file Rekening.php */
	/* Location: ./application/controllers/admin/Rekening.php */