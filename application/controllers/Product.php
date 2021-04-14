<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

// LOAD MODEL
	public function __construct()
	{
		parent::__construct();
		$this->load->model('product_model');
		$this->load->model('category_model');
		
	}

	public function index()
	{
		$site 		= $this->model_config->listing();
		$list_cat	= $this->product_model->listing_cat();

		// AMBIL TOTAL dari product_model
		$total 		= $this->product_model->total_product();
		//Paginasi start
		$this->load->library('pagination');
		
		$config['base_url'] 		= base_url().'product/index';
		$config['total_rows'] 		= $total->total;
		$config['use_page_number']	= TRUE;
		$config['per_page'] 		= 2;
		$config['uri_segment'] 		= 3;
		$config['num_links'] 		= 5;
		$config['full_tag_open'] 	= '<nav><ul class="pagination bg-light">';
		$config['full_tag_close'] 	= '</ul></nav>';
		$config['first_link'] 		= 'First';
		$config['first_tag_open'] 	= '<li class="page-item">';
		$config['first_tag_close'] 	= '</li>';
		$config['last_link'] 		= 'Last';
		$config['last_tag_open'] 	= '<li class="disable">';
		$config['last_tag_close'] 	= '<span class="sr-only"></span></li>';
		$config['next_link'] 		= '&raquo';
		$config['next_tag_open'] 	= '<li class="page-item">';
		$config['next_tag_close'] 	= '</li>';
		$config['prev_link'] 		= '&laquo;';
		$config['prev_tag_open'] 	= '<li class="page-item">';
		$config['prev_tag_close'] 	= '</li>';
		$config['cur_tag_open'] 	= '<li class="page-item active"><a class="page-link bg-warning" href="#">';
		$config['cur_tag_close'] 	= '</a></li>';
		$config['attributes']		= array('class' => 'page-link bg-light');
		$config['first_url']		= base_url().'/product/';
		$this->pagination->initialize($config);
		

		//Ambil data produk
		$page 		= $this->uri->segment(3);
		$product 	= $this->product_model->product($config['per_page'],$page);

		//Paginasi End

		$data = array( 'title'		=> 'Produk ' .$site->webname,
						'site'		=> $site, 
						'list_cat'	=> $list_cat,
						'product'	=> $product,
						'pagin'		=> $this->pagination->create_links(),
						'isi'		=> 'product/list'
					); 
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	// Listing data kategori
	public function category($slug_category)
	{
		// kategori detail\
		$category 	= $this->category_model->read($slug_category);
		$cat_id		= $category->category_id;

		$site 		= $this->model_config->listing();
		$list_cat	= $this->product_model->listing_cat();

		// AMBIL TOTAL dari product_model
		$total 		= $this->product_model->total_category($cat_id);
		//Paginasi start
		$this->load->library('pagination');
		
		$config['base_url'] 		= base_url().'/product/category/'.$slug_category.'/index/';
		$config['total_rows'] 		= $total->total;
		$config['use_page_number']	= TRUE;
		$config['per_page'] 		= 2;
		$config['uri_segment'] 		= 5;
		$config['num_links'] 		= 5;
		$config['full_tag_open'] 	= '<nav><ul class="pagination bg-light">';
		$config['full_tag_close'] 	= '</ul></nav>';
		$config['first_link'] 		= 'First';
		$config['first_tag_open'] 	= '<li class="page-item">';
		$config['first_tag_close'] 	= '</li>';
		$config['last_link'] 		= 'Last';
		$config['last_tag_open'] 	= '<li class="disable">';
		$config['last_tag_close'] 	= '<span class="sr-only"></span></li>';
		$config['next_link'] 		= '&raquo';
		$config['next_tag_open'] 	= '<li class="page-item">';
		$config['next_tag_close'] 	= '</li>';
		$config['prev_link'] 		= '&laquo;';
		$config['prev_tag_open'] 	= '<li class="page-item">';
		$config['prev_tag_close'] 	= '</li>';
		$config['cur_tag_open'] 	= '<li class="page-item active"><a class="page-link bg-warning" href="#">';
		$config['cur_tag_close'] 	= '</a></li>';
		$config['attributes']		= array('class' => 'page-link bg-light');
		$config['first_url']		= base_url().'/product/category/'.$slug_category;
		$this->pagination->initialize($config);
		

		//Ambil data produk
		$page 		= $this->uri->segment(5);
		$product 	= $this->product_model->category($cat_id, $config['per_page'],$page);

		//Paginasi End

		$data = array( 'title'		=>$category->category_name,
						'site'		=> $site, 
						'list_cat'	=> $list_cat,
						'product'	=> $product,
						'pagin'		=> $this->pagination->create_links(),
						'isi'		=> 'product/list'
					); 
		$this->load->view('layout/wrapper', $data, FALSE);
	}


public function detail($slug_product)
{

	$site 				= 	$this->model_config->listing();
	$product   			=	$this->product_model->read($slug_product);
	$product_id			=   $product->product_id;
	$images				=	$this->product_model->images($product_id);
	$product_related	= 	$this->product_model->home();


	$data = array( 		'title'			=> $product->product_name,
						'site'			=> $site, 
						'product'		=> $product,
						'prod_rel'		=> $product_related,
						'images'		=> $images,	
						'isi'			=> 'product/detail'
					); 
		$this->load->view('layout/wrapper', $data, FALSE);
}

}

/* End of file Product.php */
/* Location: ./application/controllers/Product.php */