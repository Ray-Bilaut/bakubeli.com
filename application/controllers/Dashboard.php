<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->model('customer_model');
		//protect page
		$this->simple_customer->login_check();
	}

	public function index()
	{
		$data = array( 'title'		=> 'Beranda',
						'isi'		=> 'home/list'
					);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */