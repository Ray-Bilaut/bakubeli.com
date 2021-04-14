<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {



	// load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('product_model');
		$this->load->model('category_model');
		$this->load->model('model_config');
		//protect page
		$this->simple_customer->login_check();
	}
	// Homepage
	public function index()
	{
		$site = $this->model_config->listing();
		$cat = $this->model_config->product_nav();
		$prod = $this->product_model->home();

		$data = array(	'title' 		=> $site->webname. ' | ' .$site->tagline,
						'keywords'		=> $site->keywords,
						'description'	=> $site->description,
						'site'			=> $site,
						'category'		=> $cat,
						'product'		=> $prod,
						'isi' 			=> 'dashboard/home/list'
						);
		$this->load->view('dashboard/layout/wrapper', $data, FALSE);
		
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */