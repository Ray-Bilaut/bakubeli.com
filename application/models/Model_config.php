<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_config extends CI_Model 
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function listing()

	{

		$query = $this->db->get('config');
		return $query->row();
	}

	// update
	public function update($data)

	{

		$this->db->where('config_id', $data['config_id']);
		$this->db->update('config',$data);
	}


//LOAD MENU KATEORI PRODUK 
	public function product_nav()

	{
		$this->db->select('product.*,
					  category.category_name,
					  category.slug_category,
					 COUNT(product.product_id) AS total');
	$this->db->from('product');
	// DB JOIN

	$this->db->join('category', 'category.category_id = product.category_id', 'left');
		// END JOIN
	$this->db->group_by('product.category_id');
	$this->db->order_by('category.position','ASC');
	$query = $this->db->get();
    return $query->result();
	}

	public function countRow()
	{
		$query = $this->db->query("SELECT *,count(product_id) AS tot_prod FROM product");
		// print_r($query->result());
		return $query->result();
	}
}

/* End of file Model_config.php */
/* Location: ./application/models/Model_config.php */