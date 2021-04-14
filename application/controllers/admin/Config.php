<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Config extends CI_Controller {

	// load model config
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_config');
	}

	// config umum
	public function index()
	{
		$config = $this->model_config->listing();

		// Validasi Input Category
$valid = $this->form_validation;

$valid -> set_rules('web_name', 'Nama Website','required',
array(	'required' 	=> '%s Harus Diisi'));



if($valid->run()===FALSE) {

$data = array( 'title'		=> 'Konfigurasi Website',
				'config' 	=> $config,
				'isi' 		=> 'admin/config/list'
);
$this->load->view('admin/layout/wrapper', $data, FALSE);
// Database input
}else{

$i = $this->input;

$data = array( 
'config_id' 				=>$config->config_id,
'webname'					=>$i->post('web_name'),
'tagline'   	    		=>$i->post('tagline'),
'email'   	    			=>$i->post('email'),
'website'					=>$i->post('website'),
'keywords'   	    		=>$i->post('keywords'),
'metatext'   	    		=>$i->post('metatext'),
'phone'   	    			=>$i->post('phone'),
'address'					=>$i->post('address'),
'facebook'   	    		=>$i->post('facebook'),
'instagram'   	    		=>$i->post('instagram'),
'description'   	    	=>$i->post('description'),
'payment_number'   	    	=>$i->post('payment_number')

);
$this->model_config->update($data);
$this->session->set_flashdata('Sukses','Data Telah di Update');
redirect(base_url('admin/config'),'refresh');
}


	}

	public function logo()
	// config logo
	{
		$configure = $this->model_config->listing();

			// Validasi Input Product
		$valid = $this->form_validation;

		$valid -> set_rules('webname', 'Nama Website','required',
		array(	'required' => '%s Harus Diisi'));

		
		if($valid->run()) 
			// UPLOAD GAMBAR PRODUK
		{
		// Check jika gambar diganti
		if (! empty($_FILES['logo']['name'])) {	


		$config['upload_path'] 		= './assets/upload/image/';
		$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
		$config['max_size']  		= '2400'; //dalam KB
		$config['max_width']  		= '2024';
		$config['max_height']  		= '2024';
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('logo')){
			
			//END VALIDASI 
			
		
		$data = array(  'title'		=> 'Konfigurasi Logo Website ',
						'config'	=> $configure,
						'error'		=> $this->upload->display_errors(),
						'isi' 		=> 'admin/config/logo'
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
		

	$data = array(  'config_id'	=> $configure->config_id,
					'webname'	=> $i->post('webname'),
					'logo'		=> $upload_image['upload_data']['file_name'],
						);
			$this->model_config->update($data);
			$this->session->set_flashdata('Sukses','Data Di Update');
			redirect(base_url('admin/config/logo'),'refresh');
	}}else{
		// EDIT TANPA GANTI GAMBAR
		$i = $this->input;
		$data = array(  'config_id'	=> $configure->config_id,
						'webname'	=> $i->post('webname'),
						//'logo'		=> $upload_image['upload_data']['file_name'],

	);
			$this->model_config->update($data);
			$this->session->set_flashdata('Sukses','Data Di Update');
			redirect(base_url('admin/config/logo'),'refresh');


}}
	// End update Product
	$data = array(  	'title'		=> 'Konfigurasi Logo Website ',
						'config'	=> $configure,
						'isi' 		=> 'admin/config/logo'
						);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function icon()
	// config logo
	{
		$configure = $this->model_config->listing();

			// Validasi Input Product
		$valid = $this->form_validation;

		$valid -> set_rules('webname', 'Nama Website','required',
		array(	'required' => '%s Harus Diisi'));

		
		if($valid->run()) 
			// UPLOAD GAMBAR PRODUK
		{
		// Check jika gambar diganti
		if (! empty($_FILES['icon']['name'])) {	


		$config['upload_path'] 		= './assets/upload/image/';
		$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
		$config['max_size']  		= '2400'; //dalam KB
		$config['max_width']  		= '2024';
		$config['max_height']  		= '2024';
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('icon')){
			
			//END VALIDASI 
			
		
		$data = array(  'title'		=> 'Konfigurasi Icon Website ',
						'config'	=> $configure,
						'error'		=> $this->upload->display_errors(),
						'isi' 		=> 'admin/config/icon'
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
		

	$data = array(  'config_id'	=> $configure->config_id,
					'webname'	=> $i->post('webname'),
					'icon'		=> $upload_image['upload_data']['file_name'],
						);
			$this->model_config->update($data);
			$this->session->set_flashdata('Sukses','Data Di Update');
			redirect(base_url('admin/config/icon'),'refresh');
	}}else{
		// EDIT TANPA GANTI GAMBAR
		$i = $this->input;
		$data = array(  'config_id'	=> $configure->config_id,
						'webname'	=> $i->post('webname'),
						//'logo'		=> $upload_image['upload_data']['file_name'],

	);
			$this->model_config->update($data);
			$this->session->set_flashdata('Sukses','Data Di Update');
			redirect(base_url('admin/config/icon'),'refresh');


}}
	// End update Product
	$data = array(  	'title'		=> 'Konfigurasi Icon Website ',
						'config'	=> $configure,
						'isi' 		=> 'admin/config/icon'
						);
		$this->load->view('admin/layout/wrapper', $data, FALSE);

	}

}

/* End of file Config.php */
/* Location: ./application/controllers/admin/Config.php */