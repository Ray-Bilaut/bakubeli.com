	<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Category extends CI_Controller {

	public function __construct()
	{
	// load model
	parent::__construct();
	$this->load->model('category_model');
	// PROTEKSI HALAMAN
	$this->simple_login->auth_check();
	}
	// Data category
	public function index()
	{

	$category = $this->category_model->listing();
	$data = array (	'title' 	=> 'Kategori Produk',
					'category' 	=> $category,
					'isi' 		=> 'admin/category/list');	
	$this->load->view('admin/layout/wrapper', $data, FALSE);				
	}


	// add category
	public function add()
	{
	// Validasi Input Category
	$valid = $this->form_validation;

	$valid -> set_rules('name', 'Nama Kategori','required|is_unique[category.category_name]',
	array(	'required' 	=> '%s Harus Diisi',
			'is_unique'	=> '%s sudah ada. buat satu yang baru'));



	if($valid->run()===FALSE) {

	$data = array( 'title'	=> 'Tambah Kategori Produk ', 
					'isi' 	=> 'admin/category/add'
			);
	$this->load->view('admin/layout/wrapper', $data, FALSE);
	// Database input
	}else{

	$i = $this->input;
	$slug_category = url_title($this->input->post('name'), 'dash', TRUE);
	$data = array(  
	'slug_category'				=>$slug_category,
	'category_name'   	    	=>$i->post('name'),
	'position'					=>$i->post('urutan')
	
	);
	$this->category_model->add($data);
	$this->session->set_flashdata('Sukses','Data Tersimpan');
	redirect(base_url('admin/category'),'refresh');
	}
	// End Input Category
	}

	// edit category
	public function update($category_id)
	{

	$category = $this->category_model->detail($category_id);


	// Validasi edit Category
	$valid = $this->form_validation;


	$valid -> set_rules('name', 'Nama Kategori','required',
	array(	'required' 	=> '%s Harus Diisi',));

	if($valid->run()===FALSE) {

	$data = array( 	'title'		=> 'Edit Kategori Produk ',
					'category'  => $category,
					'isi' 		=> 'admin/category/update'
	);
	$this->load->view('admin/layout/wrapper', $data, FALSE);
	// Database input
	}else{

	$i = $this->input;
	$slug_category = url_title($this->input->post('name'), 'dash', TRUE);
	$data = array(  
			'category_id'				=>$i->post('category_id'),
			'slug_category'				=>$slug_category,
			'category_name'   	    	=>$i->post('name'),
			'position'					=>$i->post('urutan')
	);
	$this->category_model->update($data);
	$this->session->set_flashdata('Sukses','Data di Update');
	 redirect(base_url('admin/category'),'refresh');
	}
	// End Update Category
	}

	// Delete
	public function delete($category_id)
	{
	$data = array ('category_id' => $category_id);
	$this->category_model->delete($data);
	$this->session->set_flashdata('Sukses', 'Data Telah Dihapus');
	redirect(base_url('admin/category'),'refresh');
	}

	}

	/* End of file Category.php */
	/* Location: ./application/controllers/admin/Category.php */