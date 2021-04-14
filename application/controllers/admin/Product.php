		<?php
		defined('BASEPATH') OR exit('No direct script access allowed');

		class Product extends CI_Controller {

		public function __construct()
		{
		// load model
		parent::__construct();
		$this->load->model('product_model');
		$this->load->model('category_model');
		// PROTEKSI HALAMAN
		$this->simple_login->auth_check();
		}
		// Data product
		public function index()
		{

		$product = $this->product_model->listing();
		$data = array (	'title' => 'Manajemen Produk',
						'product' => $product,
						'isi' => 'admin/product/list');	
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		//$this->load->view('admin/layout/nav', $data, FALSE);				
		}

		// add product
		public function add()
		{

		// Ambil data kategori
		$kategori = $this->category_model->listing();
		// Validasi Input Product
		$valid = $this->form_validation;

		$valid -> set_rules('product_name', 'Nama Produk','required',
		array(	'required' => '%s Harus Diisi'));

		$valid -> set_rules('product_code', 'Kode Produk','required|is_unique[product.product_code]',
		array(	'required' 	=> '%s Harus Diisi',
				'is_unique' => '%s sudah ada. Buat satu yang baru'));

		if($valid->run()) 
			// UPLOAD GAMBAR PRODUK
		{
		$config['upload_path'] 		= './assets/upload/image/';
		$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
		$config['max_size']  		= '2400'; //dalam KB
		$config['max_width']  		= '2500';
		$config['max_height']  		= '3000';
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('images')){
			
			
			
		
		$data = array( 'title'		=> 'Tambah Produk ', 
						'kategori'	=> $kategori,
						'error'		=> $this->upload->display_errors(),
						'isi' 		=> 'admin/product/add'
													);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
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
			// SLUG PRODUK
			$slug_produk = url_title($this->input->post('product_name').'-'.$this->input->post('product_code'),'dash',TRUE);
			$data = array(  'user_id'		=> $this->session->userdata('user_id'),
							'category_id'	=> $i->post('category_id'),
							'product_code'	=> $i->post('product_code'),
							'product_name'	=> $i->post('product_name'),
							'slug_product'	=> $slug_produk,
							'note'			=> $i->post('note'),
							'keywords'		=> $i->post('keywords'),
							'price'			=> $i->post('price'),
							'stock'			=> $i->post('stock'),
							//Disimpan dalam file gambar
							'images'		=> $upload_image['upload_data']['file_name'],
							'weight'		=> $i->post('weight'),
							'size'			=> $i->post('size'),
							'product_status'=> $i->post('product_status'),
							'post_date'		=> date('Y-m-d H:i:s')
							);
			$this->product_model->add($data);
			$this->session->set_flashdata('Sukses','Data Tersimpan');
			redirect(base_url('admin/product'),'refresh');
	}
}
	// End Input Product
	$data = array( 		'title'		=> 'Tambah Produk ', 
						'kategori'	=> $kategori,
						'isi' 		=> 'admin/product/add'
													);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
}

public function images($product_id)
		{
			$product = $this->product_model->details($product_id);
			$images = $this->product_model->images($product_id);


			// Validasi Input Product
		$valid = $this->form_validation;

		$valid -> set_rules('images_title', 'Nama Gambar','required',
		array(	'required' => '%s Harus Diisi'));

		

		if($valid->run()) 
			// UPLOAD GAMBAR PRODUK
		{
		$config['upload_path'] 		= './assets/upload/image/';
		$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
		$config['max_size']  		= '2400'; //dalam KB
		$config['max_width']  		= '2024';
		$config['max_height']  		= '2024';
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('images')){
			
			
			
		
		$data = array( 'title'		=> 'Tambah Gambar Produk: '.$product->product_name, 
						'product'	=> $product,
						'images'	=> $images,
						'error'		=> $this->upload->display_errors(),
						'isi' 		=> 'admin/product/images'
													);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
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
				$config['height']       	=  250;
				$config['thumb_marker']		= '';

				$this->load->library('image_lib', $config);

				$this->image_lib->resize();
			// END CREATE THUMBNAIL

			$i = $this->input;
						$data = array(  
							'product_id'			=> $product_id,
							'images_title'			=> $i->post('images_title'),
							'images'				=> $upload_image['upload_data']['file_name']
							);
			$this->product_model->addimage($data);
			$this->session->set_flashdata('Sukses','Data Gambar Tersimpan');
			redirect(base_url('admin/product/images/'.$product_id),'refresh');
	}
}
	// End Input Product
	$data = array( 		'title'		=> 'Tambah Gambar Produk '.$product->product_name, 
						'product'	=> $product,
						'images'	=> $images,
						'isi' 		=> 'admin/product/images'
													);
		$this->load->view('admin/layout/wrapper', $data, FALSE);


		}


// Update product
		public function update($product_id)
		{
		// Ambil data kategori
		$category   = $this->category_model->listing();
		// /Ambil data product yang diedit 
		$product 	= $this->product_model->details($product_id);

		// Validasi Input Product
		$valid = $this->form_validation;

		$valid -> set_rules('product_name', 'Nama Produk','required',
		array(	'required' => '%s Harus Diisi'));

		$valid -> set_rules('product_code', 'Kode Produk','required',
		array(	'required' 	=> '%s Harus Diisi'));

		if($valid->run()) 
			// UPLOAD GAMBAR PRODUK
		{
		// Check jika gambar diganti
		if (! empty($_FILES['images']['name'])) {	
		$config['upload_path'] 		= './assets/upload/image/';
		$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
		$config['max_size']  		= '2400'; //dalam KB
		$config['max_width']  		= '2024';
		$config['max_height']  		= '2024';
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('images')){
		//END VALIDASI	
			
			
		
		$data = array(  'title'		=> 'Update Produk '.$product->product_name, 
						'category'	=> $category,
						'product'	=> $product,
						'error'		=> $this->upload->display_errors(),
						'isi' 		=> 'admin/product/update'
													);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
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
				$config['height']       	=  250;
				$config['thumb_marker']		= '';

				$this->load->library('image_lib', $config);

				$this->image_lib->resize();
			// END CREATE THUMBNAIL

			$i = $this->input;
			// SLUG PRODUK
			$slug_produk = url_title($this->input->post('product_name').'-'.$this->input->post('product_code'),'dash',TRUE);
			$data = array(  'product_id'	=> $product_id,
							'user_id'		=> $this->session->userdata('user_id'),
							'category_id'	=> $i->post('category_id'),
							'product_code'	=> $i->post('product_code'),
							'product_name'	=> $i->post('product_name'),
							'slug_product'	=> $slug_produk,
							'note'			=> $i->post('note'),
							'keywords'		=> $i->post('keywords'),
							'price'			=> $i->post('price'),
							'stock'			=> $i->post('stock'),
							'images'		=> $upload_image['upload_data']['file_name'],
							'weight'		=> $i->post('weight'),
							'size'			=> $i->post('size'),
							'product_status'=> $i->post('product_status'),
							);
			$this->product_model->update($data);
			$this->session->set_flashdata('Sukses','Data Di Update');
			redirect(base_url('admin/product'),'refresh');
	}}else{
		// EDIT TANPA GANTI GAMBAR
		$i = $this->input;
			// SLUG PRODUK
			$slug_produk = url_title($this->input->post('product_name').'-'.$this->input->post('product_code'),'dash',TRUE);
			$data = array(  'product_id'	=> $product_id,
							'user_id'		=> $this->session->userdata('user_id'),
							'category_id'	=> $i->post('category_id'),
							'product_code'	=> $i->post('product_code'),
							'product_name'	=> $i->post('product_name'),
							'slug_product'	=> $slug_produk,
							'note'			=> $i->post('note'),
							'keywords'		=> $i->post('keywords'),
							'price'			=> $i->post('price'),
							'stock'			=> $i->post('stock'),
							// 'images'		=> $upload_image['upload_data']['file_name'],
							'weight'		=> $i->post('weight'),
							'size'			=> $i->post('size'),
							'product_status'=> $i->post('product_status'),
							);
			$this->product_model->update($data);
			$this->session->set_flashdata('Sukses','Data Di Update');
			redirect(base_url('admin/product'),'refresh');


}}
	// End update Product
	$data = array( 		'title'		=> 'Update Produk '.$product->product_name, 
						'category'	=> $category,
						'product'	=> $product,
						'isi' 		=> 'admin/product/update'
													);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		
		}
// End Update Product



// Delete
public function delete($product_id)
{
	// Proses Hapus Gambar
	$product = $this->product_model->details($product_id);
	unlink(FCPATH.'assets/upload/image/'.$product->images);
	unlink(FCPATH.'assets/upload/image/thumbs/'.$product->images);
	// END PROSES HAPUS
	$data = array ('product_id' => $product_id);
	$this->product_model->delete($data);
	$this->session->set_flashdata('Sukses', 'Data Telah Dihapus');
	redirect(base_url('admin/product'),'refresh');
}

public function delete_img($product_id,$images_id)
{
	// Proses Hapus Gambar
	$images = $this->product_model->img_details($images_id);
	unlink(FCPATH.'assets/upload/image/'.$images->images);
	unlink(FCPATH.'assets/upload/image/thumbs/'.$images->images);
	// END PROSES HAPUS
	$data = array ('images_id' => $images_id);
	$this->product_model->delete_img($data);
	$this->session->set_flashdata('Sukses', 'Data Gambar Telah Dihapus');
	redirect(base_url('admin/product/images/'.$product_id),'refresh');
}


}




		/* End of file Product.php */
		/* Location: ./application/controllers/admin/Product.php */