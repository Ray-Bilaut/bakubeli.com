		<?php
		defined('BASEPATH') OR exit('No direct script access allowed');

		class Dashboard extends CI_Controller {

			// LOAD MODEL

			public function __construct()
			{
				parent::__construct();
				$this->simple_login->auth_check();
				$this->load->model('model_config');
			}

		public function index()
		
		{
		
		$data = array('title' 	=> 'Halaman Administrator',
					    'isi'  	=> 'admin/dashboard/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		}

		

		}

		/* End of file Dasbor.php */
		/* Location: ./application/controllers/admin/Dasbor.php */